<!--link href="css/profile.css" -->
<!--change no.1-->
<script>
$(function(){
			$('.loadmore').click(function(){
				
				var val=$('.final').attr('val');
				//alert(val);
				$.post('sql.php',{'from':val},function(data){
					if(!isFinite(data)){
							//alert(data);
							$('.final').remove();
							$(data).insertBefore('.loadmore');
					}
					else{
						$('<div class="well">No more feeds</div>').insertBefore('.loadmore');
						$('.loadmore').remove();
						
						 
					}
				});
				
				
				//alert('clicked loadmore');
			});
		 });
	</script>
	<!--change no.1 ends here-->
<?php 
include'core/init.php';
protect_page();

include'includes/overall/header.php';
if(isset($_GET['username'])===true&&empty($_GET['username'])===false){
	$username=$_GET['username'];
	if(user_exists($username) == 1){
				$user_id=user_id_from_username($username);
				$user1=$user_id;//jiska username dala hai
				$user2=$session_user_id;//jo logged in hai
				//$user_id=user_id_from_email($email);
				$profile_data =user_data($user_id,'first_name','last_name','email','username','profile','enrollment_id','gender','age','type');
					
					if(user_state($username)!=1){
					$errors[]='Sorry! The page is not accessible at the moment.Link might have destroyed or broken.';
					
				}
					?>

					
					
					<?php 
					
			}
	else{
		$errors[]='We can\'t find that Page on this link.You might be accessing a broken link.';
				
	}
			
}
if(empty($errors)=== false){
		
	?>
	<h2>We tried to Find the Page, but</h2>
<?php

echo output_errors($errors);?>
<?php

}

else{
	
	

?>
				
		
			
		<?php include 'includes/profilepic.php';?>
		<?php include 'profile/enrollment.php';?>
		
	<div id="profileinfo">
	
	<h1 ><div id="profilename"><?php echo $profile_data['first_name'];echo ' '.$profile_data['last_name'];?></h1>
					<p><?php echo $profile_data['email'];?></p>
					<p><?php echo $school;?></p>
					<p><?php echo $branch;?></p>
					<p><?php echo $batch;?></p></div>
				<?php include 'profilebutton.php';?>
	</div>
	
	<?php include 'profile/newpost.php';?>
	<?php //include 'profile/oldpost.php';?>
	<div id="old_posts_Area">
		
<?php
require_once 'sql.php';
?>
<div>
		<?php
		 echo $data;
		 //echo $session_user_id;
		?>
		</div>
		<div class="loadmore">
		<button class="btn btn-primary ">Load More</button>
		</div>
		<!--ul>
		
		<li>
		<input type="submit" name="like" value="Upvote">
		<input type="submit" name="unlike" value="Downvote">
		</li>
		</ul-->	
	</div>
	
	
	
	
<?php 
}
include 'includes/overall/footer.php';?>