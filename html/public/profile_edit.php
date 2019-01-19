<?php
	require_once('init.php');

	$dbh = connectionDB();
	$error_flg = -1;
	$error_message = "";
	$userid = $_SESSION['userid'];
	$user_info = array();

	$csrf_token = generate_token();
	$smarty_obj->assign("csrf_token", $csrf_token);

	if(!login_check()){
		header("Location:./user_login.php");
	}
	
	$detail_user = $_SESSION['userid'];

	if (isset($_POST["edit"])){
		$token = htmlspecialchars($_POST["token"]);
		$user_name = htmlspecialchars($_POST["user_name"]);
		$user_body = htmlspecialchars($_POST["user_body"]);

		if($token != $csrf_token){ //トークンの確認
        	$error_flg = 0;
        }else if(empty($_POST["user_name"]) && empty($_POST["user_body"]) && is_uploaded_file($_FILES['user_img']['tmp_name'])){ //値が入っているかの確認
        	$error_flg = 1;
        }else if(empty($_POST['user_name'])){
        	$error_flg = 2;
        }else if(strlen($user_name) > 240 || strlen($user_body) > 1000){
			$error_flg = 3;
		}else if(is_uploaded_file($_FILES['user_img']['tmp_name'])){		
			$error_is = img_error_check('user_img');
			if($error_is[0]){ //画像でエラーが出た場合
				$error_flg = 4;
				$error_message = $error_is[1];
			}
	    }

	    if($error_flg == 0){ //トークンエラー
	    	$error_message = "<p id=\error\" class=\"alert alert-danger\"><strong>不正な送信です。</strong></p>";
	    }else if($error_flg == 1){ //フィールが入力されていない
	    	$error_message = "<p id=\"error\" class=\"alert alert-danger\"><strong>入力されていないフィールドがあります。</strong></p>";
	    }else if($error_flg == 2){ //画像エラー
	    	$error_message = "<p id=\"error\" class=\"alert alert-danger\"><strong>入力必須のフィールドがあります。</strong></p>";
	    }else if($error_flg == 3){ //文字数上限エラー
	    	$error_message = "<p id=\"error\" class=\"alert alert-danger\"><strong>文字数上限を超えた入力があります。</strong></p>";
	    }else if($error_flg == 4){ //画像エラー
	    	$error_message = "<p id=\"error\" class=\"alert alert-danger\"><strong>".$error_message."</strong></p>";
	    }else{

	    	if(is_uploaded_file($_FILES['user_img']['tmp_name'])){//画像をアップロードした場合
	    		$sth = $dbh->prepare('SELECT id FROM users where user_id = ?;');
	    		$sth->execute(array($detail_user));
				$result = $sth->fetch();

	    		$extension=img_type('user_img'); //画像の拡張子を調べる関数
	    		$file_name = "img/users_img/" . ((int)$result['id']) . $extension;
	    		$sth = $dbh->prepare('UPDATE users SET user_name = ?, body = ?, img_path = ?;');
	    		$sth->execute(array($user_name, $user_body, $file_name));
	    		move_uploaded_file($_FILES['user_img']['tmp_name'], $file_name);
	    	}else{//画像をアップロードしていない場合
	    		$sth = $dbh->prepare('UPDATE users SET user_name = ?, body = ?');
	    		$sth->execute(array($user_name, $user_body));
	    	}
	    	header("Location:./profile.php");
	    }
	    $user_info['name'] = $user_name;
	    $user_info['body'] = $user_body;

	}else{
		$sth = $dbh->prepare('SELECT user_name, body FROM users where users.user_id = ?;');
		$sth->execute(array($detail_user));
		$result = $sth->fetch();

		$user_info['name'] = $result['user_name'];
	    $user_info['body'] = $result['body'];
	}

	$smarty_obj->assign("user_info", $user_info);
	$smarty_obj->assign("error_message", $error_message);

	$smarty_obj->display("profile_edit.tpl");
