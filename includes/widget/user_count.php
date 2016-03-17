<?php 


?>
<?php 
	$user_count=user_count();
	$suffix=($user_count!=1)?'s':'';?>
<div class="widget">
	<h2>Users</h2>
	<div class="inner">
	We currently have <?php echo $user_count; 
	?> registered user<?php echo $suffix;?>.
	</div>
</div>	
