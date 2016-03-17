
<?php 
include'core/init.php';
protect_page();

include'includes/overall/header.php';
$user2=$session_user_id;//jo logged in hai
				//$user_id=user_id_from_email($email);
				$chat_data =user_data($user2,'first_name','last_name','email','username','profile','enrollment_id','gender','age','type');
				
?>

<div class="chat_box">

<div class="chat_head">
Chat Box
</div>
<div class="chat_body">
<div class="user"><?php echo $chat_data['first_name']; ?></div>
<div class="user"><?php echo $chat_data['last_name']; ?></div>
</div>
</div>
<div class="msg_box" style="right:290px;">


<div class="msg_head">
<?php  echo $chat_data['first_name']; ?>

<div class="close">x</div>
</div>
<div class="msg_wrap">
<div class="msg_body">
<div class="msg_a">This message is from A</div>
<div class="msg_b">This message is from B</div>
<div class="msg_insert">

</div>
</div>
<div class="msg_footer">
<textarea class="msg_input"  rows="4"></textarea></div>
</div>
</div>
<?php
include 'includes/overall/footer.php';?>
