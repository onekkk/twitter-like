<!DOCTYPE>
<html>
	<head>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="css/profile_edit.css">
	</head>
	<body>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<form action="" method="post" enctype="multipart/form-data" id="content">
					<h2>プロフィール編集</h2>
					{$error_message}
					<div class="form-group row">
						<label for="user_name" class="col-sm-2 col-form-label">ユーザー名</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="user_name" id="user_id" maxlength='80' placeholder="ユーザー名" value="{$user_info['name']}">
						</div>
					</div>
					<div class="form-group row">
						<label for="user_body" class="col-sm-2 col-form-label">自己紹介</label>
						<div class="col-sm-10">
							<textarea name="user_body" id="" class="form-control" cols="30" rows="10">{$user_info['body']}</textarea>
						</div>
					</div>
					<div class="form-group row">
						<label for="user_img" class="col-sm-2 col-form-label">プロフィール画像</label>
						<div class="col-sm-10">
							<input type="file" name="user_img" class="" accept=".jpg,.gif,.png,image/gif,image/jpeg,image/png">
						</div>
					</div>
					<div class="float-right">
						<input type="submit" class=" float-right btn btn-primary" id="login" name="edit" value="変更">
					</div>
					<input type="hidden" name="token" value="{$csrf_token}">
				</form>
			</div>
			<div class="col-md-2"></div>
		</div>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
	</body>
</html>