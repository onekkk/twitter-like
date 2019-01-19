<?php
	require_once('init.php');

	$dbh = connectionDB();
	$error_flg = -1;
	$userid = $_SESSION['userid'];
	$follow_is = true;

	$csrf_token = generate_token();
	$smarty_obj->assign("csrf_token", $csrf_token);

	if(!login_check()){
		header("Location:./user_login.php");
	}

	$detail_user = htmlspecialchars($_GET["detail_user"]);

	if($detail_user == $_SESSION['userid']){
		header("Location:./profile.php");
	}

	$sth = $dbh->prepare('SELECT user_name, body, user_id, img_path FROM users where users.user_id = ?;');
	$sth->execute(array($detail_user));
	$user_info = $sth->fetch();

	//フォローチェック
	$sth = $dbh->prepare('SELECT COUNT(*) FROM follow WHERE follow_id = ? && follower_id = ? ;');
    $sth->execute(array($userid, $detail_user));
    $result = $sth->fetch();

    if((int)$result[0] == 0){
    	$follow_is = false;
    }else{
    	$follow_is = true;
    }


	//tweet表示
	

	$sth = $dbh->prepare('SELECT tweet.* , users.user_name,  users.img_path as user_img FROM tweet, users where users.user_id = ? AND tweet.user_id = users.user_id;');
	$sth->execute(array($detail_user));
	$result = $sth->fetchAll();

	$smarty_obj->assign("detail_user", $detail_user);
	$smarty_obj->assign("follow_is", $follow_is);
	$smarty_obj->assign("user_info", $user_info);
	$smarty_obj->assign("user_id", $userid);
	$smarty_obj->assign("tweets", $result);
	$smarty_obj->assign("error_message", $error_message);

	$smarty_obj->display("user_detail.tpl");
