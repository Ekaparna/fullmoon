<?php 
include'core/init.php';
protect_page();
	 
	session_start();
	
	$action= $_GET['action'];
	$user=$_GET['user'];
	$user2=$session_user_id;
			
$user_data =user_data($user,'first_name','last_name','email','username','profile','enrollment_id','gender','age','type');
				
	if($action=='connect'){
		
		 $con->query("INSERT INTO acquaintances_request VALUES('','$user2','$user' )");
			$flagA=1;
			}
			else if($action=='undoreqconnection'){
		
		 $con->query("DELETE FROM acquaintances_request WHERE `from`='$user2' AND `to`='$user' ");
			
			$flagB=1;			
				
	}
	else if($action=='acceptconnection'){
		$con->query("DELETE FROM acquaintances_request WHERE `from`='$user' AND `to`='$user2' ");
		
		 $con->query("INSERT INTO acquaintances VALUES('','$user','$user2' )");
			
			$flagD=1;			
				
	}
	else if($action=='ignoreconnection'){
		
		 $con->query("DELETE FROM acquaintances_request WHERE `from`='$user' AND `to`='$user2' ");
			
			$flagC=1;			
				
	}
	else if($action=='send'){
		//$con->query("DELETE FROM `acquaintances` WHERE (`user_one`='$user2' AND `user_two`='$user') OR (`user_one`='$user' AND `user_two`='$user2') " );
		
		 $con->query("INSERT INTO friend_request VALUES('','$user2','$user' )");
		 
			$flaga=1;
			}
						
	else if($action=='cancel'){
		
		 $con->query("DELETE FROM friend_request WHERE `from`='$user2' AND `to`='$user' ");
		//	$con->query("INSERT INTO acquaintances VALUES('','$user','$user2' )");
		
			$flagb=1;			
				
	}
	
	
	else if($action=='ignore'){
		
		 $con->query("DELETE FROM friend_request WHERE `from`='$user' AND `to`='$user2' ");
			//$con->query("INSERT INTO acquaintances VALUES('','$user','$user2' )");
		
			$flagc=1;			
				
	}
	
	
	else if($action=='accept'){
		$con->query("DELETE FROM `friend_request` WHERE `from`='$user' AND `to`='$user2' ");
		$con->query("DELETE FROM `acquaintances` WHERE (`user_one`='$user2' AND `user_two`='$user') OR (`user_one`='$user' AND `user_two`='$user2') " );
			
		 $con->query("INSERT INTO friends VALUES('','$user','$user2' )");
			
			$flagd=1;			
				
	}
	
	else if($action=='unfriend'){
		
		  $con->query("DELETE FROM `friends` WHERE (`user_one`='$user2' AND `user_two`='$user') OR (`user_one`='$user' AND `user_two`='$user2') " );
			$con->query("INSERT INTO acquaintances VALUES('','$user','$user2' )");
		
			$flage=1;				
				
	}
	
	
	header('location: profile.php?username='.$user_data['username']);
	
	
	
	?>