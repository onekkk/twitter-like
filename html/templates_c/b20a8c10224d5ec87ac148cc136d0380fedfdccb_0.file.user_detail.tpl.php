<?php
/* Smarty version 3.1.32, created on 2019-01-19 01:37:41
  from '/var/www/html/templates/user_detail.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5c427f658952a6_19520873',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b20a8c10224d5ec87ac148cc136d0380fedfdccb' => 
    array (
      0 => '/var/www/html/templates/user_detail.tpl',
      1 => 1547861828,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c427f658952a6_19520873 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE>
<html>
	<head>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="css/user_detail.css">
		<?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha384-3ceskX3iaEnIogmQchP8opvBy3Mi7Ce34nWjpBIwVTHfGYWQS9jwHDVRnpKKHJg7" crossorigin="anonymous"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"><?php echo '</script'; ?>
>
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
					<button id="follow_btn"><?php if ($_smarty_tpl->tpl_vars['follow_is']->value) {?> フォローをはずす <?php } else { ?> フォローする<?php }?></button>
					<p>自己紹介</p>
					<p><?php echo $_smarty_tpl->tpl_vars['user_info']->value['body'];?>
</p>
				</div>
			</div>
			<div class="col-md-6" id="content">
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tweets']->value, 'tweet');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['tweet']->value) {
?> 
					<div class="tweet">
						<div class="">
							<img src="<?php echo $_smarty_tpl->tpl_vars['tweet']->value['user_img'];?>
" alt="" class="img_circle">
							<a href=""><?php echo $_smarty_tpl->tpl_vars['tweet']->value['user_name'];?>
</a>
						</div>
						<div class="tw_content">
							<p><?php echo $_smarty_tpl->tpl_vars['tweet']->value['body'];?>
</p><?php if ($_smarty_tpl->tpl_vars['tweet']->value['img_path'] != NULL) {?>
							<img src="<?php echo $_smarty_tpl->tpl_vars['tweet']->value['img_path'];?>
" alt=""><?php }?> 
						</div>
					</div>
				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?> 
			</div>
			<div class="col-md-3"></div>
		</div> 
		<?php echo '<script'; ?>
>
$(function(){
	var follow = <?php if ($_smarty_tpl->tpl_vars['follow_is']->value) {?>true<?php } else { ?>false<?php }?>;
    // Ajax button click
    $('#follow_btn').on('click',function(){
    	$.ajax({
    	    url:'./follow.php',
    	    type:'POST',
	        data:{
	            'follow':"<?php echo $_smarty_tpl->tpl_vars['user_id']->value;?>
",
	            'follower':"<?php echo $_smarty_tpl->tpl_vars['detail_user']->value;?>
",
				'follow_is':follow,
			}
	    })
	    // Ajaxリクエストが成功した時発動
	    .done( (data) => {
	        $('.result').html(data);
	        console.log(data);
	        //console.log(follow);
	    })
	    // Ajaxリクエストが失敗した時発動
	    .fail( (data) => {
	        $('.result').html(data);
	        console.log(data);
	    })
	    // Ajaxリクエストが成功・失敗どちらでも発動
	    .always( (data) => {

	    });

	    if(follow){
			$('#follow_btn').text("フォローする");
			follow = false;
    	}else{
    	 	$('#follow_btn').text("フォローをはずす");
			follow = true;	   
    	}
    });
});

<?php echo '</script'; ?>
> 
	</body>
</html><?php }
}
