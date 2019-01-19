<?php
	require_once('init.php');

	$dbh = connectionDB();
	$error_flg = -1;
	$userid = $_SESSION['userid'];

	$csrf_token = generate_token();
	$smarty_obj->assign("csrf_token", $csrf_token);

	if(!login_check()){
		header("Location:./user_login.php");
	}

	$detail_user = $_SESSION['userid'];

	$sth = $dbh->prepare('SELECT user_name, body, user_id, img_path FROM users where users.user_id = ?;');
	$sth->execute(array($detail_user));
	$user_info = $sth->fetch();
	//tweet表示

	
	$sth = $dbh->prepare('SELECT tweet.* , users.user_name,  users.img_path as user_img FROM tweet, users where users.user_id = ? AND tweet.user_id = users.user_id;');
	$sth->execute(array($detail_user));
	$result = $sth->fetchAll();

	$smarty_obj->assign("user_info", $user_info);
	$smarty_obj->assign("tweets", $result);
	$smarty_obj->assign("error_message", $error_message);

	$smarty_obj->display("profile.tpl");
