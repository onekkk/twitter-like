<?php
/* Smarty version 3.1.32, created on 2019-01-19 01:39:36
  from '/var/www/html/templates/profile.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5c427fd8731f47_68737008',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4fac946b5f68be48fe49ab1d193bb8e4b9e66f5e' => 
    array (
      0 => '/var/www/html/templates/profile.tpl',
      1 => 1547861742,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c427fd8731f47_68737008 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE>

<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="css/profile.css">
</head>
<body>
<div class="row">
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-3">
				<div id="user_info" class="col-md-12">
					<img src="<?php echo $_smarty_tpl->tpl_vars['user_info']->value['img_path'];?>
" alt="" class="col-md-10">
					<p id="user_name"><strong><?php echo $_smarty_tpl->tpl_vars['user_info']->value['user_name'];?>
</strong><br>
					@<?php echo $_smarty_tpl->tpl_vars['user_info']->value['user_id'];?>
</p>
					<h2>プロフィール文</h2>
					<p id="user_info_bd"><?php echo $_smarty_tpl->tpl_vars['user_info']->value['body'];?>
</p>
					<a href="profile_edit.php">プロフィール編集</a>
				</div>
			</div>
			<div class="col-md-6" id="content">
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tweets']->value, 'tweet');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['tweet']->value) {
?>
					<div class="tweet">
	                	<div class="tw_user">
	                		<img src="<?php echo $_smarty_tpl->tpl_vars['tweet']->value['user_img'];?>
" alt="" class="img_circle">
	                    	<a href=""><?php echo $_smarty_tpl->tpl_vars['tweet']->value['user_name'];?>
<strong>@<?php echo $_smarty_tpl->tpl_vars['tweet']->value['user_id'];?>
</strong></a>
	                    </div>
	                    <div class="tw_content">
	                    	<p><?php echo $_smarty_tpl->tpl_vars['tweet']->value['body'];?>
</p>
	                    	<?php if ($_smarty_tpl->tpl_vars['tweet']->value['img_path'] != NULL) {?>
	                    		<img src="<?php echo $_smarty_tpl->tpl_vars['tweet']->value['img_path'];?>
" alt="">
	                    	<?php }?>
	                    </div>
					</div>
				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			</div>
			<div class="col-md-3"></div>
		</div>
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
</html>

<?php }
}
