<!DOCTYPE>
<html>
	<head>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="css/index.css">
		<!-- <link rel="stylesheet" type="text/css" href="../css/index.css"> -->
	</head>
	<body>
		<div class="row">
			<div class="col-md-3">
				<div id="user_info" class="col-md-12">
					<img src="{$user_info['img_path']}" alt="" class="col-md-10">
					<p id="user_name">
						<strong>{$user_info['user_name']}</strong>
						<br>@{$user_info['user_id']} 
					</p>
					<p>自己紹介</p>
					<p>{$user_info['body']}</p>
					<ul class="nav nav-pills nav-justified" id="nav_btn">
						<li class="nav-item">
							<a class="nav-link" href="profile.php" id="bt_pf">プロフィール</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="user_logout.php" id="bt_lg">ログアウト</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-md-6">
				<div class="row">
					<div class="col-md-12" id="contents">
						<form action="" method="post" enctype="multipart/form-data" id="tw_form">{$error_message} 
							<div class="form-group row">
								<label for="user_name" class="col-sm-2 col-form-label">ツイート</label>
								<div class="col-sm-10">
									<textarea type="text" class="form-control" name="body" id="body" maxlength='80' title="140文字以内で入力してください" placeholder="">{$body}</textarea>
								</div>
							</div>
							<div class="form-group row">
								<label for="tweet_img" class="col-sm-2 col-form-label">画像</label>
								<div class="col-sm-10">
									<input type="file" name="tweet_img" class="" accept=".jpg,.gif,.png,image/gif,image/jpeg,image/png">
								</div>
							</div>
							<input type="submit" class=" float-right btn btn-primary" id="contribution" name="contribution" value="投稿">
							<input type="hidden" name="token" value="{$csrf_token}">
						</form>{foreach from=$tweets item=tweet} 
						<div class="tweet">
							<div class="tw_user">
								<img src="{$tweet['user_img']}" alt="" width="50px" class="img_circle">
								<a href="user_detail.php?detail_user={$tweet['user_id']}">{$tweet['user_name']} 
									<strong>@{$tweet['user_id']}</strong>
								</a>
							</div>
							<div>
								<p>{$tweet['body']}</p>{if $tweet['img_path'] neq NULL}
								<img src="{$tweet['img_path']}" alt="">{/if} 
							</div>
						</div>{/foreach} 
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<!-- <form action="" method="get" class="col-md-12">
					<div class="input-group" id="serach_bar">
						<input type="text" class="form-control" name="serach_text" placeholder="" value="{$search_text}">
						<div class="input-group-append">
							<input class="btn btn-primary" type="submit" name="serach" value="検索">
						</div>
					</div>
				</form> -->
			</div>
		</div>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
	</body>
</html>