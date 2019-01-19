<?php

	require_once('init.php');

	$dbh = connectionDB();
	$username;
	$password;
	$token;
	$error_message = "";


	$csrf_token = generate_token();
	$smarty_obj->assign("csrf_token", $csrf_token);

	//登録ボタンを押された場合の処理
	if (isset($_POST["sign_up"])){
		$userid = htmlspecialchars($_POST["user_id"]);
		$username = htmlspecialchars($_POST["user_name"]);
		$password = htmlspecialchars($_POST["password"]);
		$token = htmlspecialchars($_POST["token"]);

		//エラーチェック
		if($token != $csrf_token){ //トークンのチェック
			$error_message = "<p id=\"error\" class=\"alert alert-danger\"><strong>不正な送信です。</strong></p>";
		}else if(empty($_POST["user_id"]) || empty($_POST["user_name"]) || empty($_POST["password"])){ //値のチェック
			$error_message = "<p id=\"error\" class=\"alert alert-danger\"><strong>入力されていないフィールドがあります。</strong></p>";
		}else if(strlen($userid) > 240 || strlen($username) > 240 || strlen($password) > 240){
			$error_message = "<p id=\"error\" class=\"alert alert-danger\"><strong>文字数上限を超えた入力があります。</strong></p>";
		}else if(preg_match("/^[a-zA-Z0-9_]+$/", $userid) != 1 || preg_match("/^[0-9A-Za-z]+$/", $password) != 1){
			$error_message = "<p id=\"error\" class=\"alert alert-danger\"><strong>入力形式が違うフィールドがあります。</strong></p>";
		}else{
		
		//重複しているユーザIDの有無をチェック
		$sth = $dbh->prepare('SELECT COUNT(*) FROM users WHERE user_id=?;');
        	$sth->execute(array($userid));
        	$result = $sth->fetch();
		$check = (int) $result[0];
		if($check!= 0){
			$error_message = "<p id=\"error\" class=\"alert alert-danger\"><strong>このユーザーIDはすでに登録されています。</strong></p>";
		}else{
			//データベースに登録
        	$password = password_hash($password, PASSWORD_DEFAULT);
            $sth = $dbh->prepare('INSERT INTO users(user_id, user_name, password, img_path) VALUES(?, ?, ?, ?);');
			$sth->execute(array($userid, $username, $password, "img/users_img/unknown.jpg"));
			$_SESSION['username'] = $username;
			$_SESSION['userid'] = $userid;
			$error_mesage = "";
            header("Location:./index.php");
            exit;
		}
	}
	$smarty_obj->assign("error_message", $error_message);
	$smarty_obj->assign("userid", $userid);
    	$smarty_obj->assign("username", $username);
    	$smarty_obj->assign("password", $password);
}
$smarty_obj->display("user_sign_up.tpl");
