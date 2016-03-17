<style>

.chat_box{
	position:fixed;
	right:20px;
	bottom:0px;
	width:250px;
}
.chat_body{
	background:white;
	height:400px;
	padding:5px 0px;
}

.chat_head,.msg_head{
	background:#f39c12;
	color:white;
	padding:15px;
	font-weight:bold;
	cursor:pointer;
	border-radius:5px 5px 0px 0px;
}

.msg_box{
	position:fixed;
	bottom:-5px;
	width:250px;
	background:white;
	border-radius:5px 5px 0px 0px;
}

.msg_head{
	background:#3498db;
}

.msg_body{
	background:white;
	height:200px;
	font-size:12px;
	padding:15px;
	overflow:auto;
	overflow-x: hidden;
}
.msg_input{
	width:100%;
	border: 1px solid white;
	border-top:1px solid #DDDDDD;
	-webkit-box-sizing: border-box; /* Safari/Chrome, other WebKit */
	-moz-box-sizing: border-box;    /* Firefox, other Gecko */
	box-sizing: border-box;  
}

.close{
	float:right;
	cursor:pointer;
}
.minimize{
	float:right;
	cursor:pointer;
	padding-right:5px;
	
}

.user{
	position:relative;
	padding:10px 30px;
}
.user:hover{
	background:#f8f8f8;
	cursor:pointer;

}
.user:before{
	content:'';
	position:absolute;
	background:#2ecc71;
	height:10px;
	width:10px;
	left:10px;
	top:15px;
	border-radius:6px;
}

.msg_a{
	position:relative;
	background:#FDE4CE;
	padding:10px;
	min-height:10px;
	margin-bottom:5px;
	margin-right:10px;
	border-radius:5px;
}
.msg_a:before{
	content:"";
	position:absolute;
	width:0px;
	height:0px;
	border: 10px solid;
	border-color: transparent #FDE4CE transparent transparent;
	left:-20px;
	top:7px;
}


.msg_b{
	background:#EEF2E7;
	padding:10px;
	min-height:15px;
	margin-bottom:5px;
	position:relative;
	margin-left:10px;
	border-radius:5px;
}
.msg_b:after{
	content:"";
	position:absolute;
	width:0px;
	height:0px;
	border: 10px solid;
	border-color: transparent transparent transparent #EEF2E7;
	right:-20px;
	top:7px;
}</style>
<script>
$(document).ready(function(){

	$('.chat_head').click(function(){
		$('.chat_body').slideToggle('slow');
	});
	$('.msg_head').click(function(){
		$('.msg_wrap').slideToggle('slow');
	});
	
	$('.close').click(function(){
		$('.msg_box').hide();
	});
	
	$('.user').click(function(){

		$('.msg_wrap').show();
		$('.msg_box').show();
	});
	
	$('textarea').keypress(
    function(e){
        if (e.keyCode == 13) {
            var msg = $(this).val();
			$(this).val('');
			if(msg!='')
			$('<div class="msg_b">'+msg+'</div>').insertBefore('.msg_push');
			$('.msg_body').scrollTop($('.msg_body')[0].scrollHeight);
        }
    });
	
});
</script>
<?php

include'core/init.php';
protect_page();

include 'includes/overall/header.php';
 ?> <div class="chat_box">
	<div class="chat_head"> Chat Box</div>
	<div class="chat_body"> 
	<div class="user" id="<?php echo $user_id?>"> Krishna Teja</div>
	<div class="user" id="<?php echo $user_id?>"> Rajiv Jha</div>
	</div>
  </div>

<div class="msg_box" style="right:290px">
	<div class="msg_head">Krishna Teja
	<div class="close">x</div>
	</div>
	<div class="msg_wrap">
		<div class="msg_body">
			<div class="msg_a">This is from A	</div>
			<div class="msg_b">This is from B, and its amazingly kool nah... i know it even i liked it :)</div>
			<div class="msg_a">Wow, Thats great to hear from you man </div>	
			<div class="msg_push"></div>
		</div>
	<div class="msg_footer"><textarea class="msg_input" rows="4"></textarea></div>
</div>
</div>