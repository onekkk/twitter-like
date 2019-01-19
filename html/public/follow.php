<?php
	header('Content-type: text/plain; charset= UTF-8');
	require_once('init.php');
    $dbh = connectionDB();
	

	$follow = "";
	$follower = "";
	if(isset($_POST['follow']) && isset($_POST['follower'])){
		$follow = htmlspecialchars($_POST['follow'], ENT_QUOTES);
		$follower = htmlspecialchars($_POST['follower'], ENT_QUOTES);
		$follow_is = htmlspecialchars($_POST['follow_is'], ENT_QUOTES);

		if($follow_is == "false"){ //フォローしていない場合の処理
			$sth = $dbh->prepare('INSERT INTO follow(follow_id, follower_id) VALUES(?, ?);');
            $sth->execute(array($follow, $follower));
		}else{ //フォローしていた場合の処理
			$sth = $dbh->prepare('DELETE FROM follow WHERE follow_id = ? && follower_id = ? ; ');
            $sth->execute(array($follow, $follower));
		}
	}


