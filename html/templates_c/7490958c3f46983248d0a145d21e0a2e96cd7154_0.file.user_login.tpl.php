<?php
/* Smarty version 3.1.32, created on 2019-01-18 05:40:37
  from '/var/www/html/templates/user_login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5c4166d51324a8_06272570',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7490958c3f46983248d0a145d21e0a2e96cd7154' => 
    array (
      0 => '/var/www/html/templates/user_login.tpl',
      1 => 1547789955,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c4166d51324a8_06272570 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/user_login.css"> </head>
<body>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8" id="content">
            <form action="" method="post">
                <h2>ユーザーログイン</h2> <?php echo $_smarty_tpl->tpl_vars['error_message']->value;?>

                <div class="form-group row"> <label for="user_id" class="col-sm-2 col-form-label">ユーザーID</label>
                    <div class="col-sm-10"> <input type="text" class="form-control" name="user_id" id="user_id" pattern="^[a-zA-Z0-9_]+$" maxlength='80' title="英数字とアンダーバーのみで８０文字以内で入力してください" placeholder="ユーザー名" value="<?php echo $_smarty_tpl->tpl_vars['userid']->value;?>
"> </div>
                </div>
                <div class="form-group row"> <label for="password" class="col-sm-2 col-form-label">パスワード</label>
                    <div class="col-sm-10"> <input type="password" class="form-control" name="password" id="password" pattern="^[0-9A-Za-z]+$" maxlength='80' title="英数字で８０文字以内で入力してください" placeholder="パスワード" value="<?php echo $_smarty_tpl->tpl_vars['password']->value;?>
"> </div>
                </div>
                <div class="float-right" id="login_btn"> <a href="user_sign_up.php" id="sign_in">新規登録</a> <input type="submit" class=" float-right btn btn-primary" id="login" name="login" value="ログイン"> </div> <input type="hidden" name="token" value="<?php echo $_smarty_tpl->tpl_vars['csrf_token']->value;?>
"> </form>
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
