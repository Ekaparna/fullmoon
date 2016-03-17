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
if($type=='reply'){
	if($action=='upvote'){
		if(user_reply_upvote_exists($user2,$id) === 1){
					$con->query("DELETE FROM upvote_reply WHERE `who_id`='$user2' AND `reply_id`='$id' ");
			$votes--;
			$queryy="UPDATE `reply_comment` SET `upvotes`='$votes' WHERE `reply_id`='$id' ";
			mysqli_query($con,$queryy);
			}
			else if(user_reply_downvote_exists($user2,$id) === 1){
					$con->query("DELETE FROM downvote_reply WHERE `who_id`='$user2' AND `reply_id`='$id' ");
			$con->query("INSERT INTO upvote_reply VALUES('','$user2','$id' )");
			$votes++;
			$ovotes--;
			$queryy="UPDATE `reply_comment` SET `upvotes`='$votes' WHERE `reply_id`='$id' ";
						mysqli_query($con,$queryy);
			$queryz="UPDATE `reply_comment` SET `downvotes`='$ovotes' WHERE `reply_id`='$id' ";
						mysqli_query($con,$queryz);
			}
			else{
				$con->query("INSERT INTO upvote_reply VALUES('','$user2','$id' )");
			$votes++;
			$queryy="UPDATE `reply_comment` SET `upvotes`='$votes' WHERE `reply_id`='$id' ";
			mysqli_query($con,$queryy);
			}
			
			}
	
	
	else if($action=='downvote'){
			if(user_reply_downvote_exists($user2,$id) === 1){
					$con->query("DELETE FROM downvote_reply WHERE `who_id`='$user2' AND `reply_id`='$id' ");
			$votes--;
			$queryy="UPDATE `reply_comment` SET `downvotes`='$votes' WHERE `reply_id`='$id' ";
			mysqli_query($con,$queryy);
			}
			else if(user_reply_upvote_exists($user2,$id) === 1){
					$con->query("DELETE FROM upvote_reply WHERE `who_id`='$user2' AND `reply_id`='$id' ");
			$con->query("INSERT INTO downvote_reply VALUES('','$user2','$id' )");
			$votes++;
			$ovotes--;
			$queryy="UPDATE `reply_comment` SET `upvotes`='$ovotes' WHERE `reply_id`='$id' ";
						mysqli_query($con,$queryy);
			$queryz="UPDATE `reply_comment` SET `downvotes`='$votes' WHERE `reply_id`='$id' ";
						mysqli_query($con,$queryz);
			}
			else{
				$con->query("INSERT INTO downvote_reply VALUES('','$user2','$id' )");
			$votes++;
			$queryy="UPDATE `reply_comment` SET `downvotes`='$votes' WHERE `reply_id`='$id' ";
			mysqli_query($con,$queryy);
			}					
			}
			
				

	header('location: profile.php?username='.$user_data['username']);
				
				}?>