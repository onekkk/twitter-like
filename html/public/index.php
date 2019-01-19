<?php
	require_once('init.php');

	$dbh = connectionDB();
	$error_flg = -1;
	$error_message = "";
	$userid = $_SESSION['userid'];

	$csrf_token = generate_token();
	$smarty_obj->assign("csrf_token", $csrf_token);

	if(!login_check()){
		header("Location:./user_login.php");
	}


	//投稿ボタンが押された場合
	if (isset($_POST["contribution"])){
		//エラーチェック
		$body = htmlspecialchars($_POST["body"]);
		$token = htmlspecialchars($_POST["token"]);

		if($token != $csrf_token){ //トークンの確認
        	$error_flg = 0;
        }else if(empty($_POST["body"])){ //値が入っているかの確認
        	$error_flg = 1;
		}else if(strlen($userid) > 240 || strlen($password) > 240){
			$error_flg = 2;
		}else if(is_uploaded_file($_FILES['tweet_img']['tmp_name'])){		
			$error_is = img_error_check('tweet_img');
			if($error_is[0]){ //画像でエラーが出た場合
				$error_flg = 3;
				$error_message = $error_is[1];
			}
	    }

	    if($error_flg == 0){ //トークンエラー
	    	$error_message = "<p id=\error\" class=\"alert alert-danger\"><strong>不正な送信です。</strong></p>";
	    }else if($error_flg == 1){ //フィールが入力されていない
    	$error_message = "<p id=\"error\" class=\"alert alert-danger\"><strong>入力されていないフィールドがあります。</strong></p>";
	    }else if($error_flg == 2){ //文字数上限エラー
	    	$error_message = "<p id=\"error\" class=\"alert alert-danger\"><strong>文字数上限を超えた入力があります。</strong></p>";
	    }else if($error_flg == 3){ //画像エラー
	    	$error_message = "<p id=\"error\" class=\"alert alert-danger\"><strong>".$error_message."</strong></p>";
	    }else{
	    	//データベースの登録処理
	    	if(is_uploaded_file($_FILES['tweet_img']['tmp_name'])){//画像をアップロードした場合
	    		$sth = $dbh->query('SELECT MAX(id) FROM tweet');
				$result = $sth->fetch();
				if($result == null){
					$result = -1;
				}
	    		$extension=img_type('tweet_img'); //画像の拡張子を調べる関数
	    		$file_name = "img/tweet_img/" . ((int)$result[0] + 1) . $extension;
	    		$sth = $dbh->prepare('INSERT INTO tweet(user_id, body, img_path) VALUES(?, ?, ?);');
	    		$sth->execute(array($userid, $body, $file_name));
	    		move_uploaded_file($_FILES['tweet_img']['tmp_name'], $file_name);
	    	}else{//画像をアップロードしていない場合
	    		$sth = $dbh->prepare('INSERT INTO tweet(user_id, body) VALUES(?, ?);');
	    		$sth->execute(array($userid, $body));
	    	}
	    }
	}	

	//ユーザー情報の取得
	$detail_user = $_SESSION['userid'];

	$sth = $dbh->prepare('SELECT user_name, body, user_id, img_path FROM users where users.user_id = ?;');
	$sth->execute(array($detail_user));
	$user_info = $sth->fetch();

	//tweet表示
	
	$sth = $dbh->prepare('
		SELECT tweet.* , users.user_name,  users.img_path as user_img
		FROM tweet, users
		WHERE
			users.user_id = ?
			AND tweet.user_id = users.user_id
			OR tweet.user_id = (
				SELECT follower_id FROM follow where follow_id = ?
			) 
		ORDER BY id DESC;
	');
	$sth->execute(array($userid, $userid));
	$result = $sth->fetchAll();

	$smarty_obj->assign("user_info", $user_info);
	$smarty_obj->assign("tweets", $result);
	$smarty_obj->assign("error_message", $error_message);

	$smarty_obj->display("index.tpl");
