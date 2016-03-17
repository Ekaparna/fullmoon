<?php 
include'core/init.php';
protect_page();
	 
	session_start();
	
	$action= $_GET['action'];
	$user=$_GET['user'];//jiska username dala hai
	$type=$_GET['type'];//jo type hai
	$id=$_GET['id'];//post ka hai
	$votes=$_GET['votes'];//no. of votes
	$ovotes=$_GET['ovotes'];//no. of votes
	$user2=$session_user_id;//jo loggedin hai
			
$user_data =user_data($user,'first_name','last_name','email','username','profile','enrollment_id','gender','age','type');
if($type=='post'){
	if($action=='upvote'){
			if(user_post_upvote_exists($user2,$id) === 1){
					$con->query("DELETE FROM upvote_post WHERE `who_id`='$user2' AND `post_id`='$id' ");
					$votes--;
					$queryy="UPDATE `post` SET `post_upvotes`='$votes' WHERE `post_id`='$id' ";
						mysqli_query($con,$queryy);
			}
			else if(user_post_downvote_exists($user2,$id) === 1){
					$con->query("DELETE FROM downvote_post WHERE `who_id`='$user2' AND `post_id`='$id' ");
			$con->query("INSERT INTO upvote_post VALUES('','$user2','$id' )");
			$votes++;
			$ovotes--;
			$queryy="UPDATE `post` SET `post_upvotes`='$votes' WHERE `post_id`='$id' ";
						mysqli_query($con,$queryy);
			$queryz="UPDATE `post` SET `post_downvotes`='$ovotes' WHERE `post_id`='$id' ";
						mysqli_query($con,$queryz);
			}
			else{
				$con->query("INSERT INTO upvote_post VALUES('','$user2','$id' )");
			$votes++;
			$queryy="UPDATE `post` SET `post_upvotes`='$votes' WHERE `post_id`='$id' ";
						mysqli_query($con,$queryy);
			}
			}
	
	else if($action=='downvote'){
		
		
			if(user_post_downvote_exists($user2,$id) === 1){
					$con->query("DELETE FROM downvote_post WHERE `who_id`='$user2' AND `post_id`='$id' ");
			$votes--;
			$queryy="UPDATE `post` SET `post_downvotes`='$votes' WHERE `post_id`='$id' ";
			mysqli_query($con,$queryy);
			}
			else if(user_post_upvote_exists($user2,$id) === 1){
			$con->query("DELETE FROM upvote_post WHERE `who_id`='$user2' AND `post_id`='$id' ");
			$con->query("INSERT INTO downvote_post VALUES('','$user2','$id' )");
			$votes++;
			$queryy="UPDATE `post` SET `post_downvotes`='$votes' WHERE `post_id`='$id' ";
			mysqli_query($con,$queryy);
			$ovotes--;
			$queryz="UPDATE `post` SET `post_upvotes`='$ovotes' WHERE `post_id`='$id' ";
						mysqli_query($con,$queryz);
			}
			else{
				$con->query("INSERT INTO downvote_post VALUES('','$user2','$id' )");
				$votes++;
			$queryy="UPDATE `post` SET `post_downvotes`='$votes' WHERE `post_id`='$id' ";
						mysqli_query($con,$queryy);
			}
			
			}
				
				}
				

				

	header('location: profile.php?username='.$user_data['username']);
	
	
	
	?>