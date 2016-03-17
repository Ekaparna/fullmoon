<?php

include'core/init.php';
protect_page();
	 
	session_start();
	
	$action= $_GET['action'];
	$user=$_GET['user'];//jiska username dala hai
	$type=$_GET['type'];//jiska username dala hai
	$id=$_GET['id'];//jiska username dala hai
	$user2=$session_user_id;//jo loggedin hai
	$votes=$_GET['votes'];//no. of votes
	$ovotes=$_GET['ovotes'];//no. of votes
			
$user_data =user_data($user,'first_name','last_name','email','username','profile','enrollment_id','gender','age','type');
 if($type=='comment'){
	if($action=='upvote'){
		
			
			if(user_comment_upvote_exists($user2,$id) === 1){
					$con->query("DELETE FROM upvote_comment WHERE `who_id`='$user2' AND `comment_id`='$id' ");
			$votes--;
					$queryy="UPDATE `comment_post` SET `upvote`='$votes' WHERE `comment_id`='$id' ";
						mysqli_query($con,$queryy);
			}
			else if(user_comment_downvote_exists($user2,$id) === 1){
					$con->query("DELETE FROM downvote_comment WHERE `who_id`='$user2' AND `comment_id`='$id' ");
			$con->query("INSERT INTO upvote_comment VALUES('','$user2','$id' )");
			$votes++;
			$ovotes--;
			$queryy="UPDATE `comment_post` SET `upvote`='$votes' WHERE `comment_id`='$id' ";
						mysqli_query($con,$queryy);
			$queryz="UPDATE `comment_post` SET `downvote`='$ovotes' WHERE `comment_id`='$id' ";
						mysqli_query($con,$queryz);
			}
			else{
				$con->query("INSERT INTO upvote_comment VALUES('','$user2','$id' )");
			$votes++;
			$queryy="UPDATE `comment_post` SET `upvote`='$votes' WHERE `comment_id`='$id' ";
						mysqli_query($con,$queryy);
			}
			
			}
	
	
	
	else if($action=='downvote'){
			if(user_comment_downvote_exists($user2,$id) === 1){
					$con->query("DELETE FROM downvote_comment WHERE `who_id`='$user2' AND `comment_id`='$id' ");
			$votes--;
			$queryy="UPDATE `comment_post` SET `downvote`='$votes' WHERE `comment_id`='$id' ";
			mysqli_query($con,$queryy);
			}
			else if(user_comment_upvote_exists($user2,$id) === 1){
					$con->query("DELETE FROM upvote_comment WHERE `who_id`='$user2' AND `comment_id`='$id' ");
			$con->query("INSERT INTO downvote_comment VALUES('','$user2','$id' )");
			$votes++;
			$ovotes--;
			$queryy="UPDATE `comment_post` SET `upvote`='$ovotes' WHERE `comment_id`='$id' ";
						mysqli_query($con,$queryy);
			$queryz="UPDATE `comment_post` SET `downvote`='$votes' WHERE `comment_id`='$id' ";
						mysqli_query($con,$queryz);
			}
			else{
				$con->query("INSERT INTO downvote_comment VALUES('','$user2','$id' )");
			$votes++;
			$queryy="UPDATE `comment_post` SET `downvote`='$votes' WHERE `comment_id`='$id' ";
			mysqli_query($con,$queryy);
			}			
			}
				
				}
				
				
				

	header('location: profile.php?username='.$user_data['username']);
				?>