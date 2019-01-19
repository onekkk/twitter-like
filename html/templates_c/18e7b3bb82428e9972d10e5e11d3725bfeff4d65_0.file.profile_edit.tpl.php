<?php
/* Smarty version 3.1.32, created on 2019-01-18 13:49:36
  from '/var/www/html/templates/profile_edit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5c41d970356ee5_22248520',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '18e7b3bb82428e9972d10e5e11d3725bfeff4d65' => 
    array (
      0 => '/var/www/html/templates/profile_edit.tpl',
      1 => 1547819374,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c41d970356ee5_22248520 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE>
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
					<?php echo $_smarty_tpl->tpl_vars['error_message']->value;?>

					<div class="form-group row">
						<label for="user_name" class="col-sm-2 col-form-label">ユーザー名</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="user_name" id="user_id" maxlength='80' placeholder="ユーザー名" value="<?php echo $_smarty_tpl->tpl_vars['user_info']->value['name'];?>
">
						</div>
					</div>
					<div class="form-group row">
						<label for="user_body" class="col-sm-2 col-form-label">自己紹介</label>
						<div class="col-sm-10">
							<textarea name="user_body" id="" class="form-control" cols="30" rows="10"><?php echo $_smarty_tpl->tpl_vars['user_info']->value['body'];?>
</textarea>
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
					<input type="hidden" name="token" value="<?php echo $_smarty_tpl->tpl_vars['csrf_token']->value;?>
">
				</form>
			</div>
			<div class="col-md-2"></div>
		</div>
		<?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"><?php echo '</script'; ?>
>
	</body>
</html><?php }
}
