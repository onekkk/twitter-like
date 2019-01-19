<?php
/* Smarty version 3.1.32, created on 2019-01-18 14:32:35
  from '/var/www/html/templates/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5c41e383c9c5d8_44006393',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ac0d80c9f5195a4b1349fd7984fb80fa80c14534' => 
    array (
      0 => '/var/www/html/templates/index.tpl',
      1 => 1547821922,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c41e383c9c5d8_44006393 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE>
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
					<img src="<?php echo $_smarty_tpl->tpl_vars['user_info']->value['img_path'];?>
" alt="" class="col-md-10">
					<p id="user_name">
						<strong><?php echo $_smarty_tpl->tpl_vars['user_info']->value['user_name'];?>
</strong>
						<br>@<?php echo $_smarty_tpl->tpl_vars['user_info']->value['user_id'];?>
 
					</p>
					<p>自己紹介</p>
					<p><?php echo $_smarty_tpl->tpl_vars['user_info']->value['body'];?>
</p>
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
						<form action="" method="post" enctype="multipart/form-data" id="tw_form"><?php echo $_smarty_tpl->tpl_vars['error_message']->value;?>
 
							<div class="form-group row">
								<label for="user_name" class="col-sm-2 col-form-label">ツイート</label>
								<div class="col-sm-10">
									<textarea type="text" class="form-control" name="body" id="body" maxlength='80' title="140文字以内で入力してください" placeholder=""><?php echo $_smarty_tpl->tpl_vars['body']->value;?>
</textarea>
								</div>
							</div>
							<div class="form-group row">
								<label for="tweet_img" class="col-sm-2 col-form-label">画像</label>
								<div class="col-sm-10">
									<input type="file" name="tweet_img" class="" accept=".jpg,.gif,.png,image/gif,image/jpeg,image/png">
								</div>
							</div>
							<input type="submit" class=" float-right btn btn-primary" id="contribution" name="contribution" value="投稿">
							<input type="hidden" name="token" value="<?php echo $_smarty_tpl->tpl_vars['csrf_token']->value;?>
">
						</form><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tweets']->value, 'tweet');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['tweet']->value) {
?> 
						<div class="tweet">
							<div class="tw_user">
								<img src="<?php echo $_smarty_tpl->tpl_vars['tweet']->value['user_img'];?>
" alt="" width="50px" class="img_circle">
								<a href="user_detail.php?detail_user=<?php echo $_smarty_tpl->tpl_vars['tweet']->value['user_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['tweet']->value['user_name'];?>
 
									<strong>@<?php echo $_smarty_tpl->tpl_vars['tweet']->value['user_id'];?>
</strong>
								</a>
							</div>
							<div>
								<p><?php echo $_smarty_tpl->tpl_vars['tweet']->value['body'];?>
</p><?php if ($_smarty_tpl->tpl_vars['tweet']->value['img_path'] != NULL) {?>
								<img src="<?php echo $_smarty_tpl->tpl_vars['tweet']->value['img_path'];?>
" alt=""><?php }?> 
							</div>
						</div><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?> 
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<!-- <form action="" method="get" class="col-md-12">
					<div class="input-group" id="serach_bar">
						<input type="text" class="form-control" name="serach_text" placeholder="" value="<?php echo $_smarty_tpl->tpl_vars['search_text']->value;?>
">
						<div class="input-group-append">
							<input class="btn btn-primary" type="submit" name="serach" value="検索">
						</div>
					</div>
				</form> -->
			</div>
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
