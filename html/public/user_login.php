<?php

	require_once('init.php');

	$dbh = connectionDB();
	$username;
	$userid;
	$password;
	$error_message = "";

	$csrf_token = generate_token();
	$smarty_obj->assign("csrf_token", $csrf_token);

	//ログインボタンを押された場合の処理
	if (isset($_POST["login"])){
    	$userid = htmlspecialchars($_POST["user_id"]);
        $password = htmlspecialchars($_POST["password"]);
        $token = htmlspecialchars($_POST["token"]);

		//エラーチェック
        if($token != $csrf_token){ //トークンの確認
        	$error_message = "<p id=\"error\" class=\"alert alert-danger\"><strong>不正な送信です。</strong></p>";
        }else if(empty($_POST["user_id"]) || empty($_POST["password"])){ //値が入っているかの確認
        	$error_message = "<p id=\"error\" class=\"alert alert-danger\"><strong>入力されていないフィールドがあります。</strong></p>";
		}else if(strlen($userid) > 240 || strlen($password) > 240){
			$error_message = "<p id=\"error\" class=\"alert alert-danger\"><strong>文字数上限を超えた入力があります。</strong></p>";
		}else if(preg_match("/^[a-zA-Z0-9_]+$/", $userid) != 1 || preg_match("/^[0-9A-Za-z]+$/", $password) != 1){
                $error_message = "<p id=\"error\" class=\"alert alert-danger\"><strong>入力形式が違うフィールドがあります。</strong></p>";
		}else{
			//データーベースにユーザが存在するかの確認
			$sth = $dbh->prepare('SELECT * FROM users WHERE user_id=?');
			$sth->execute(array($userid));
			$result = $sth->fetch();
			//ユーザーとパスワードのチェック
			if($result['user_id'] == $userid && password_verify($password, $result['password'])){
				session_regenerate_id(true);
				$_SESSION['username'] = $result['user_name'];
				$_SESSION['userid'] = $userid;
				header("Location:./index.php");
               	exit;
			}else{
				$error_message = "<p id=\"error\" class=\"alert alert-danger\"><strong>IDもしくはパスワードが間違っています。</strong></p>";
			}	
        }
		$smarty_obj->assign("error_message", $error_message);
		$smarty_obj->assign("userid", $userid);
		$smarty_obj->assign("password", $password);
        
	}
	$smarty_obj->display("user_login.tpl");
