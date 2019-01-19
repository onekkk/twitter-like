<!DOCTYPE>
<html>
	<head>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="css/user_detail.css">
		<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha384-3ceskX3iaEnIogmQchP8opvBy3Mi7Ce34nWjpBIwVTHfGYWQS9jwHDVRnpKKHJg7" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
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
					<button id="follow_btn">{if $follow_is} フォローをはずす {else} フォローする{/if}</button>
					<p>自己紹介</p>
					<p>{$user_info['body']}</p>
				</div>
			</div>
			<div class="col-md-6" id="content">
				{foreach from=$tweets item=tweet} 
					<div class="tweet">
						<div class="">
							<img src="{$tweet['user_img']}" alt="" class="img_circle">
							<a href="">{$tweet['user_name']}</a>
						</div>
						<div>
							<p>{$tweet['body']}</p>{if $tweet['img_path'] neq NULL}
							<img src="{$tweet['img_path']}" alt="">{/if} 
						</div>
					</div>
				{/foreach} 
			</div>
			<div class="col-md-3"></div>
		</div>{literal} 
		<script>
$(function(){
	var follow = {/literal}{if $follow_is}true{else}false{/if}{literal};
    // Ajax button click
    $('#follow_btn').on('click',function(){
    	$.ajax({
    	    url:'./follow.php',
    	    type:'POST',
	        data:{
	            'follow':"{/literal}{$user_id}{literal}",
	            'follower':"{/literal}{$detail_user}{literal}",
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

</script>{/literal} 
	</body>
</html>