<!--link href="css/profile.css" -->
<!--change no.1-->

	<!--change no.1 ends here-->
<?php 
include'core/init.php';
include 'sqlv1.php';
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
					$user_post_data= user_post_data($user_id,'user_id','user_post_id','post_time','post_keywords','post_image','post_content','post_date','post_id');
	$last_post_id=$user_post_data['user_post_id'];
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
					
				<?php
				 if(online_status($user1)==1){
				 echo "<img src='images/online.jpg' alt='Online' height='10' width='10'>";
			 }else{
				 echo "<img src='images/offline.png' alt='Offline' height='10' width='10'>";
			  }	
				include 'profilebutton.php';?>
	</div>
	
	<?php include 'profile/newpost.php';?>
	<?php //include 'profile/oldpost.php';?>
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
	<div id="old_posts_Area">
	
	<?php
	$last_post_id=getlastpostid($user_id);
	//echo $user_post_data['post_content'];
	
/* let's write our query, we'll select everyone, showing the oldest first. */
//selecting all the posts from the table of user
$query = "SELECT * FROM `post` where `user_id`=$user1 ORDER BY `user_post_id` DESC;";
$result = $con->query($query);
while ( $row = $result->fetch_object() ) {
   $post_idd=$row->post_id;
   $post_upvotes=$row->post_upvotes;
   $post_downvotes=$row->post_downvotes;
   //displayed the post
   echo "{$row->post_content}.<br />";
	?><br><div id='button'>
		<ul>
		<li><?php if(user_post_upvote_exists($user2,$post_idd) === 1){echo "<a href='action.php?action=upvote&user=$user1&type=post&id=$post_idd&votes=$post_upvotes&ovotes=$post_downvotes'>Upvoted</a>";}else{
			echo "<a href='action.php?action=upvote&user=$user1&type=post&id=$post_idd&votes=$post_upvotes&ovotes=$post_downvotes'>Upvote</a>";
		}
		if($post_upvotes!=0){
		echo "($post_upvotes)";
		}?> </li>	
		<li><?php if(user_post_downvote_exists($user2,$post_idd) === 1){echo "<a href='action.php?action=downvote&user=$user1&type=post&id=$post_idd&votes=$post_downvotes&ovotes=$post_upvotes'>Downvoted</a>";}else{
			echo "<a href='action.php?action=downvote&user=$user1&type=post&id=$post_idd&votes=$post_downvotes&ovotes=$post_upvotes'>Downvote</a>";
		}
		if($post_downvotes!=0){
		echo "($post_downvotes)";
		}?> </li>
	
		</ul>				
		</div>
		<?php
	//fetched the post id
	
	//Checkpoint 8 : query is not fetching who id , hence i am creating new table to make it fetch who id
	
	//fetching comments
				
	//selecting all comments from the comment table of the post
	$querycomment = "SELECT * FROM `comment_post` where `post_id`=$post_idd ORDER BY `post_comment_id` ASC;";
$resultcomment = $con->query($querycomment);

while ( $rows = $resultcomment->fetch_object() ) {
	//echo $profile_data['username'];
	$poster_id=$rows->poster_id;
	$comment_id=$rows->comment_id;
	$comment_upvote=$rows->upvote;
	$comment_downvote=$rows->downvote;
$commentator_data =user_data($poster_id,'first_name','last_name','email','username','profile','enrollment_id','gender','age','type');
	 $user=$commentator_data['username'];
echo "<a href='profile.php?username=$user'>{$commentator_data['first_name']} {$commentator_data['last_name']}</a> said : {$rows->comment}... Comment on post above, styling need to be done.<br />";
	?><br><div id='button'>
		<ul>
		<li><?php if(user_comment_upvote_exists($user2,$comment_id) === 1){echo "<a href='actionc.php?action=upvote&user=$user1&type=comment&id=$comment_id
		&ovotes=$comment_downvote&votes=$comment_upvote'>Upvoted</a>";}else{
			echo "<a href='actionc.php?action=upvote&user=$user1&type=comment&id=$comment_id&ovotes=$comment_downvote&votes=$comment_upvote'>Upvote</a>";
		}
		if($comment_upvote!=0){
		echo "($comment_upvote)";
		}?> </li>	
		<li><?php if(user_comment_downvote_exists($user2,$comment_id) === 1){echo "<a href='actionc.php?action=downvote&user=$user1&type=comment&id=$comment_id&
		votes=$comment_downvote&ovotes=$comment_upvote'>Downvoted</a>";}else{
			echo "<a href='actionc.php?action=downvote&user=$user1&type=comment&id=$comment_id&votes=$comment_downvote&ovotes=$comment_upvote'>Downvote</a>";
		}
		if($comment_downvote!=0){
		echo "($comment_downvote)";
		}
		?> 
		</li>
		</ul>			
		</div>
		<?php

	//========================================================================================================================================================================
	//========================================================================================================================================================================
	//========================================================================================================================================================================
	//========================================================================================================================================================================
	//selecting all Reply from the reply table of the comment
	
	$queryreply = "SELECT * FROM `reply_comment` where `comment_id`=$comment_id ORDER BY `reply_id` ASC;";
$resultreply = $con->query($queryreply);

while ( $rowa = $resultreply->fetch_object() ) {
	//echo $profile_data['username'];
	$replier_id=$rowa->replier_id;
	$reply_id=$rowa->reply_id;
	$reply_upvotes=$rowa->upvotes;
	$reply_downvotes=$rowa->downvotes;
$replier_data =user_data($replier_id,'first_name','last_name','email','username','profile','enrollment_id','gender','age','type');
	 $userreplied=$replier_data['username'];
echo "<a href='profile.php?username=$userreplied'>{$replier_data['first_name']} {$replier_data['last_name']}</a> replied : {$rowa->reply}... Reply on comment above, styling need to be done.<br />";
?><br><div id='button'>
		<ul>
		<li><?php if(user_reply_upvote_exists($user2,$reply_id) === 1)
		{echo "<a href='actionr.php?action=upvote&user=$user1&type=reply&id=$reply_id&ovotes=$reply_downvotes&votes=$reply_upvotes'>Upvoted</a>";
	}else{
			echo "<a href='actionr.php?action=upvote&user=$user1&type=reply&id=$reply_id&ovotes=$reply_downvotes&votes=$reply_upvotes'>Upvote</a>";
		}
		if($reply_upvotes!=0)
		{echo "($reply_upvotes)";
		}
		?> </li>	
		<li><?php if(user_reply_downvote_exists($user2,$reply_id) === 1){echo "<a href='actionr.php?action=downvote&user=$user1&type=reply&id=$reply_id&votes=$reply_downvotes&ovotes=$reply_upvotes'>Downvoted</a>";}else{
			echo "<a href='actionr.php?action=downvote&user=$user1&type=reply&id=$reply_id&votes=$reply_downvotes&ovotes=$reply_upvotes'>Downvote</a>";
		}
		if($reply_downvotes!=0)
		{echo "($reply_downvotes)";
		}
		//echo "(2)";
		?> </li>
		
		</ul>				
		</div>
		<?php
}
include 'newreply.php';


}
	include 'newcomment.php';
}
 
/* if you prefer to use associative arrays, you can do the following 
while ( $row = $result->fetch_assoc() ) {
    echo " {$row['post_content']}.<br />";
}*/
 
	?>
	<!--form action="new_comment.php" method="post" >
						<ul>
						<!--textarea name="post_content"  required="required" placeholder="Speak Your mind"></textarea->
						<li>
						<input type="text" name="new_comment" required="required"
						class="tfield" id="new_post" placeholder="Comment Here">
						 </li><br>
						 <li>
						 <!--form action=" " method="POST" enctype="multipart/form-data">
		<p>Upload Snapshot</p>
		<input type="file" name="snaps">
		<input type="submit" name="Submit">
		</form-></li>
		<li>
		<input type="hidden" name='post_id' value='<?php// echo $last_post_id ?>'>
		</li>
		<li>
		<input type="submit" name="comment" value="Comment" >
		</li>
		<br>
		</ul>
	</form-->	
	

 	
	
		<!--The peice of code from jquery loadmore file-->
		<?php
		/*echo $data;
		*/
		?>
		
		<!--div class="wrap">
		<?php
		 /*echo $data;
		 echo "<ul>
		
		<li>
		<input type='submit' name='like' value='Upvote'>
		<input type='submit' name='like' value='Downvote'>
		</li>
		</ul>	";
		*/
		
		?>
		<div class="post_wrap">
			Post Here
		</div>
		<div class="action_wrap">
		<ul>
		
		<li>
		<input type='submit' name='like' value='Upvote'>
		<input type='submit' name='like' value='Downvote'>
		</li>
		</ul>	
		</div>
		<div class="comment_wrap"></div>
	
		</div>
		 -->
		<div class="loadmore">
		<button class="btn btn-primary ">Load More</button>
		</div>
		
	</div>
	
	
	
	
<?php 
}
include 'includes/overall/footer.php';?>