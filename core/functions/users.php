<?php

/*To define a function in php, syntax must be like

function function_name(){
	
	definition of the function
}

*/

//Check user status whether he is online or not




/*
function online_status($user_id){
	$online_status_data=user_data($user_id,'online','username','status','active');
	if($online_status_data['online']==1){
		$online_status=1;
	}
	else{
		$online_status=0;
	}
	return $online_status;
}*/
/********************************************************************************************************************************************************************************/
/********************************************************************************************************************************************************************************/
/********************************************************************************************************************************************************************************/

//To check status - whether ONLINE FUNCTIONS



function online_status($user_id){
	$con = mysqli_connect("localhost","root","","users");
	$result=$con->query("SELECT online from users WHERE user_id='$user_id' ")	;	
	$row= $result->fetch_array(MYSQLI_BOTH);
	$online_status=$row['online'];
	return $online_status;
}
function set_status_offline($user_id){
	
	$con = mysqli_connect("localhost","root","","users");
	$user_id=(int)$user_id;
	

	$query="UPDATE `users` SET `online`=0 WHERE `user_id`=$user_id ";
	
	mysqli_query($con,$query);
	
}

function set_status_online($user_id){
	$con = mysqli_connect("localhost","root","","users");
	$user_id=(int)$user_id;
	

	$query="UPDATE `users` SET `online`=1 WHERE `user_id`=$user_id ";
	
	mysqli_query($con,$query);
	
}


/********************************************************************************************************************************************************************************/
/********************************************************************************************************************************************************************************/
/********************************************************************************************************************************************************************************/
function user_profile_image($user_id,$file_temp,$file_extn){
	$file_name=substr(md5(time()),0,10).'.'.$file_extn;
	$file_path='images/profile/'.substr(md5(time()),0,10).'.'.$file_extn;
	//echo $file_path;
	move_uploaded_file($file_temp,$file_path);
	$con = mysqli_connect("localhost","root","","users");
	
	$query = "UPDATE `users` SET `profile`= '".$file_path."' WHERE `user_id`=".$user_id 	; 
	mysqli_query($con,$query);
	
}
function change_profile_image($user_id,$file_temp,$file_extn){
	$file_name=substr(md5(time()),0,10).'.'.$file_extn;
	$file_path='images/profile/'.substr(md5(time()),0,10).'.'.$file_extn;
	//echo $file_path;
	move_uploaded_file($file_temp,$file_path);
	$con = mysqli_connect("localhost","root","","users");
	
	$query = "UPDATE `users` SET `profile`= '".$file_path."' WHERE `user_id`=".$user_id 	; 
	mysqli_query($con,$query);
	
}
//checkpoint6
//Function to ease the access of profile Image, you yourself can edit it
/*function access_profile_image($user_id){
	move_uploaded_file($file_temp,$file_path);
	$con = mysqli_connect("localhost","root","","users");
	
	$query = "UPDATE `users` SET `profile`= '".$file_path."' WHERE `user_id`=".$user_id 	; 
	mysqli_query($con,$query);
	
}
*/


function mail_users($subject,$body){//checkpoint 5
	$con = mysqli_connect("localhost","root","","users");
	
	$query = "SELECT `email`,`first_name` FROM `users` WHERE `allow_email`=1	"; 
	$result=mysqli_query($con,$query);
	
	while(($row=mysqli_fetch_assoc($result))!==false){
		email($row['email'],$subject, "Hello ". $row['first_name'].",\n\n".$body);
		
		
	}
}
function update_password_recover($user_id,$newpassword ){
	
	$con = mysqli_connect("localhost","root","","users");
	$user_id=(int)$user_id;
	

	$query="UPDATE `users` SET `password_recover`=1 WHERE `user_id`=$user_id ";
	$query_text="UPDATE `users` SET `password_recover_text`=$newpassword WHERE `user_id`=$user_id ";

	mysqli_query($con,$query);
	mysqli_query($con,$query_text);
	
	

}


function update_user($update_data){
	global $session_user_id;
	$update=array();
	array_walk($update_data,'array_sanitize');
	$con = mysqli_connect("localhost","root","","users");
	
	foreach($update_data as $field=>$data){
		$update[]='`'.$field .'`=\''.$data.'\'';
		
	}
		
       echo implode(',',$update);
	
	$query="UPDATE `users` SET ".implode(',',$update)." WHERE `user_id`=$session_user_id";
	mysqli_query($con,$query);
		
}
function register_user($register_data){
	array_walk($register_data,'array_sanitize');
	$con = mysqli_connect("localhost","root","","users");
	
	$register_data['password']=md5($register_data['password']);
		$data='\'' .implode('\',\'',$register_data). '\'';

	$fields='`'.implode('`,`',array_keys($register_data)).'`';
	$query="INSERT INTO `users` ($fields) VALUES ($data)";

	mysqli_query($con,$query);
	
}

function change_password($user_id,$password){
	
	$con = mysqli_connect("localhost","root","","users");
	$user_id=(int)$user_id;
	$password=md5($password);

	$query="UPDATE `users` SET `password`='$password' WHERE `user_id`=$user_id ";

	mysqli_query($con,$query);
	
}
function update_first_name($user_id,$first_name){
	
	$con = mysqli_connect("localhost","root","","users");
	$user_id=(int)$user_id;
	

	$query="UPDATE `users` SET `first_name`='$first_name' WHERE `user_id`=$user_id ";

	mysqli_query($con,$query);
	
}
function update_yes_recieve_email($user_id){
	
	$con = mysqli_connect("localhost","root","","users");
	$user_id=(int)$user_id;
	

	$query="UPDATE `users` SET `allow_email`=1 WHERE `user_id`=$user_id ";

	mysqli_query($con,$query);
	
}
function update_no_recieve_email($user_id){
	
	$con = mysqli_connect("localhost","root","","users");
	$user_id=(int)$user_id;
	

	$query="UPDATE `users` SET `allow_email`=0 WHERE `user_id`=$user_id ";

	mysqli_query($con,$query);
	
}
function update_last_name($user_id,$last_name){
	
	$con = mysqli_connect("localhost","root","","users");
	$user_id=(int)$user_id;
	

	$query="UPDATE `users` SET `last_name`='$last_name' WHERE `user_id`=$user_id ";

	mysqli_query($con,$query);
	

}
function update_email($user_id,$email){
	
	$con = mysqli_connect("localhost","root","","users");
	$user_id=(int)$user_id;
	

	$query="UPDATE `users` SET `email`='$email' WHERE `user_id`=$user_id ";

	mysqli_query($con,$query);
	
}
function change_state_inactive($user_id){//deactivate the user
	
	$con = mysqli_connect("localhost","root","","users");
	$user_id=(int)$user_id;
	

	$query="UPDATE `users` SET `state`=0 WHERE `user_id`=$user_id ";

	mysqli_query($con,$query);
	
}
function change_state_active($user_id){
	//activate the user
	$con = mysqli_connect("localhost","root","","users");
	$user_id=(int)$user_id;


	$query="UPDATE `users` SET `state`=1 WHERE `user_id`=$user_id ";

	mysqli_query($con,$query);
	
}

function user_count(){
	$con = mysqli_connect("localhost","root","","users");
	$query="SELECT * FROM `users` WHERE `active`=1 ";
	$result= mysqli_query($con,$query);
	$count=mysqli_num_rows($result);
	return $count;
}
function all_user_count(){
	$con = mysqli_connect("localhost","root","","users");
	$query_all="SELECT * FROM `users` ";
	$result_all= mysqli_query($con,$query_all);
	
	
	$count_all=mysqli_num_rows($result_all);
	return $count_all;
}
function active_state_user_count(){
	$con = mysqli_connect("localhost","root","","users");
	$query_state="SELECT * FROM `users` WHERE `state`=1 ";
	$result_state= mysqli_query($con,$query_state);
	
	
	$count_state=mysqli_num_rows($result_state);
	return $count_state;
}
/*--------------------------------------------------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------------------------------------------------------*/

function user_data($user_id){//this function can accept & return n number of parameter.
	$data=array();
	$con = mysqli_connect("localhost","root","","users");
	$user_id= (int)$user_id;
	$func_num_args = func_num_args();
	// echo $func_num_args; //To check number of arguments we passed
	$func_get_args = func_get_args();
	//echo $func_get_args; // To check the arguments we passed
	if($func_num_args>1){
		unset($func_get_args[0]);
	$fields= '`'.implode('`,`',$func_get_args).'`';
	
	$query="SELECT $fields FROM `users` WHERE  `user_id` =$user_id";
	 
	$result= mysqli_query($con,$query);
	$data=mysqli_fetch_assoc($result);
	//print_r($data); To retrieve all the data
	
	return $data;
	
	}

	
}




/*--------------------------------------------------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------------------------------------------------------*/
function logged_in(){

/*
if (isset($_SESSION['user_id'])){
				
				echo 'Logged in';
			}
			else {
				echo 'Not Logged in   ';
			}
*/			
			return (isset($_SESSION['user_id']))? true : false;
}
/*--------------------------------------------------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------------------------------------------------------*/			
//To check whether user exists or not
function user_exists($username){
	$con = mysqli_connect("localhost","root","","users");

	$username= sanitize($username);
	
	$sql_username = "SELECT * FROM `users` WHERE `username`='$username' ";
	$query_username = mysqli_query($con, $sql_username); 
	$username_check = mysqli_num_rows($query_username);
	
	
	
	
	return $username_check;
	
	/*
	$username= sanitize($username);
	$query=mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `username` = '$username' ");
	
	return (mysql_result($query,0)==1)?true:false;
	*/
	
	/*
	return (condition)?true:false;
	*/
	
	/*
	$sql_username = "SELECT user_id FROM users WHERE username='$username' LIMIT 1";
	$query_username = mysqli_query($con, $sql_username); 
	$username_check = mysqli_num_rows($query_username);
	echo $username_check;
	*/
	
}

/*How to use the above function*/
/*Check weather user exists or not */	
			/*
			
			
			if(user_exists($username) != 1){
				$errors[]='We can\'t find that username, Have you registered yourself yet';
				echo "<span style='height:36px;padding:5px;background-color: rgb(255, 156, 0);'>'Username does not exists.'</span>";
				exit();
			}
			
			
			*/

/*--------------------------------------------------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------------------------------------------------------*/			
	//To check whether user with the given email id exists or not
		
function email_exists($email){
	$con = mysqli_connect("localhost","root","","users");

	$email= sanitize($email);
	
	$sql_email = "SELECT * FROM `users` WHERE `email`='$email' ";
	$query_email = mysqli_query($con, $sql_email); 
	$email_check = mysqli_num_rows($query_email);
	

	return $email_check;
	
}	

/*How to use the above function*/
/*Check weather Email id exists or not */	
			/*
			
			
			if(email_exists($email) != 1){
				$errors[]='We can\'t find that username, Have you registered yourself yet';
				echo "<span style='height:36px;padding:5px;background-color: rgb(255, 156, 0);'>'Username does not exists.'</span>";
				exit();
			}
			if(email_exists($email) === 1){
				$errors[]='Sorry, The email id\''.$_POST['email'].'\' already taken.';
				
			}
			
			*/

/*--------------------------------------------------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------------------------------------------------------*/			
//To check account linked with email id is active or not..			
function email_active($email){
	$con = mysqli_connect("localhost","root","","users");

	$email= sanitize($email);
	
	$sql_email = "SELECT user_id FROM users WHERE email='$email' AND active='1' LIMIT 1";
	$query_email = mysqli_query($con, $sql_email); 
	$email_check = mysqli_num_rows($query_email);
	return $email_check;
	
}	
function email_state($email){
	$con = mysqli_connect("localhost","root","","users");

	$username= sanitize($username);
	
	$sql_email_state = "SELECT user_id FROM users WHERE email='$email' AND state='1' ";
	$query_email_state = mysqli_query($con, $sql_email_state); 
	$email_state_check = mysqli_num_rows($query_email_state);
	return $email_state_check;
	
}	


/*How to use the above function*/
/*Check weather Email id exists or not */	
			/*
			
			
			 if(email_active($email)!=1){
					$errors[]='You have not activated your account yet with us. Check your inbox or spam folder to activate your account through Email id.';
					//echo "<span style='height:36px;padding:5px;background-color: rgb(255, 156, 0);'>You have not activated your account yet with us. Check your inbox or spam folder to activate your account through Email id.'</span>";
					
				}
			
			
			*/			

/*--------------------------------------------------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------------------------------------------------------*/			
//To check that user Has activated the account or not
function user_active($username){
	$con = mysqli_connect("localhost","root","","users");

	$username= sanitize($username);
	
	$sql_user_active = "SELECT user_id FROM users WHERE username='$username' AND active='1' LIMIT 1";
	$query_user_active = mysqli_query($con, $sql_user_active); 
	$user_active_check = mysqli_num_rows($query_user_active);
	return $user_active_check;
	
}	
//Check the active status of user
function user_state($username){
	$con = mysqli_connect("localhost","root","","users");

	$username= sanitize($username);
	
	$sql_user_state = "SELECT user_id FROM users WHERE username='$username' AND state='1' LIMIT 1";
	$query_user_state = mysqli_query($con, $sql_user_state); 
	$user_state_check = mysqli_num_rows($query_user_state);
	return $user_state_check;
	
}	

/*How to use the above function*/
/*Check weather Email id exists or not */	
			/*
			
			
			if(user_active($username)!=1){
					$errors[]='You have not activated your account yet with us. Check your inbox or spam folder to activate your account through Email id.';
					//echo "<span style='height:36px;padding:5px;background-color: rgb(255, 156, 0);'>You have not activated your account yet with us. Check your inbox or spam folder to activate your account through Email id.'</span>";
					
				}
			
			
			*/

/*--------------------------------------------------------------------------------------------------------------------------------------------------------
----	------------------------------------------------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------------------------------------------------------*/			

/*Check the login process Through username*/			
function login_username($username,$password){
	$con = mysqli_connect("localhost","root","","users");

	$user_id=user_id_from_username($username);
	$username=sanitize($username);
	$password=md5($password);
	$sql_checkpassword_user = "SELECT user_id FROM users WHERE password='$password' AND username='$username' LIMIT 1";
				$query_checkpassword_user = mysqli_query($con, $sql_checkpassword_user); 
				$password_check_user = mysqli_num_rows($query_checkpassword_user);
		if($password_check_user === 1){		
	
	return  $user_id;
	
		}
		else {
			return false;
		}
}	

/*How to use the above function*/
/*Check the login process through username */	
			/*
			
			
			if(email_exists($email) != 1){
				$errors[]='We can\'t find that username, Have you registered yourself yet';
				echo "<span style='height:36px;padding:5px;background-color: rgb(255, 156, 0);'>'Username does not exists.'</span>";
				exit();
			}
			
			
			*/		

/*--------------------------------------------------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------------------------------------------------------*/			

/*Check the login process Through Email id*/			
function login_email($email,$password){
	$con = mysqli_connect("localhost","root","","users");

	$user_id=user_id_from_email($email);
	$email=sanitize($email);
	$password=md5($password);
	$sql_checkpassword_emailid = "SELECT user_id FROM users WHERE password='$password' AND email='$email' LIMIT 1";
				$query_checkpassword_emailid = mysqli_query($con, $sql_checkpassword_emailid); 
				$password_check_emailid = mysqli_num_rows($query_checkpassword_emailid);
		if($password_check_emailid>0){		
	return  $user_id;
		}
		else {
			return false;
		}
	
}	

/*How to use the above function*/
/*Check The login process through email id */	
			/*
			
			
			if(email_exists($email) != 1){
				$errors[]='We can\'t find that username, Have you registered yourself yet';
				echo "<span style='height:36px;padding:5px;background-color: rgb(255, 156, 0);'>'Username does not exists.'</span>";
				exit();
			}
			
			
			*/					


/*--------------------------------------------------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------------------------------------------------------*/			
//To ger user id from username
function user_id_from_username($username){

	$con = mysqli_connect("localhost","root","","users");
	$username=sanitize($username);
	//$sql_user_id_from_username = "SELECT user_id FROM users WHERE  username='$username' ";
				//$query_user_id_from_username = mysqli_query($con, $sql_checkpassword_username); 
				
					$result=$con->query("SELECT user_id from users WHERE username='$username' ")	;	
					$row= $result->fetch_array(MYSQLI_BOTH);
					$user_id_from_username=$row['user_id'];
					return $user_id_from_username;
}

/*How to use the above function*/
/*To extract userid from username */	
			/*
			
			
			$user_id=user_id_from_username($username);
			
			
			*/	

/*--------------------------------------------------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------------------------------------------------------*/			
function user_id_from_email($email){
	$con = mysqli_connect("localhost","root","","users");
	$email=sanitize($email);
	//$sql_user_id_from_username = "SELECT user_id FROM users WHERE  username='$username' ";
				//$query_user_id_from_username = mysqli_query($con, $sql_checkpassword_username); 
				
					$result=$con->query("SELECT user_id from users WHERE email='$email' ")	;	
					$row= $result->fetch_array(MYSQLI_BOTH);
					$user_id_from_email=$row['user_id'];
					return $user_id_from_email;
	
}

/*How to use the above function*/
/*To extract user_id From email id */	
			/*
			
			
			if(email_exists($email) != 1){
				$errors[]='We can\'t find that username, Have you registered yourself yet';
				echo "<span style='height:36px;padding:5px;background-color: rgb(255, 156, 0);'>'Username does not exists.'</span>";
				exit();
			}
			
			
			*/	

			
/*--------------------------------------------------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------------------------------------------------------*/			
//check whether user is admin function
//checkpoint 3
		function is_admin($user_id){
			
			$user_id=(int)$user_id;
			//$query="SELECT COUNT(`user_id`) FROM `users` WHERE `user_id`=$user_id AND `type`=1 ";
			//$result=mysqli_query($con, $query);
			//return (mysql_result($result,0)==1)? true :false;
			$sql_checkadmin = "SELECT COUNT(`user_id`) 	FROM `users` WHERE `user_id`=$user_id AND `type`=1 ";
				$query_checkadmin = mysqli_query($con, $sql_checkadmin); 
				$status_checkadmin= mysqli_num_rows($query_checkadmin);
		if($status_checkadmin>0){		
	return $status_checkadmin;
		}
		else {
			return false;
		}
		}


/*--------------------------------------------------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------------------------------------------------------*/			
//checkpoint 2 is recover password function
//checkpoint 1 is Email function
function recover($mode,$email){
	$flag_recovery=0;
	$mode=sanitize($mode);
	$email=sanitize($email);
	$user_id=user_id_from_email($email);
	$user_data=user_data($user_id,'first_name','username');
	if($mode='username'){
		//email($email,'Your Username',"Hello ". $user_data['first_name']. " , \n\n Your Username is :" .$user_data['username'] ."\n\n - Rajivjha.in ");
		echo $user_data['username'];
		$flag_recovery=1;
	}
	else if($mode='password'){
		$user_id=user_id_from_email($email);
		$generated_password=substr(md5(rand(999,999999)),0,8);
		change_password($user_id,$generated_password);
		echo $generated_password;
		update_password_recover($user_id,$generated_password);
		$flag_recovery=1;
		//email($email,'Your Password',"Hello ". $user_data['first_name']. " , \n\n Your New Password is :" .$generated_password ."\n\n - Rajivjha.in ");
		
	}
	
	return $flag_recovery;
}

/*--------------------------------------------------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------------------------------------------------------------*/			
//Functions Regarding Profile page

function getlastpostid($user_id){//earlier the name was getpost id

	$con = mysqli_connect("localhost","root","","users");
	//$sql_user_id_from_username = "SELECT user_id FROM users WHERE  username='$username' ";
				//$query_user_id_from_username = mysqli_query($con, $sql_checkpassword_username); 
				
					$result=$con->query("SELECT last_post_id from last_post_id WHERE user_id='$user_id' ")	;	
					$row= $result->fetch_array(MYSQLI_BOTH);
					$last_post_id=$row['last_post_id'];
					return $last_post_id;
}

function getpostid($user_id){//earlier the name was getpost id, I am keeping this function in order to keep any bug off the shore.

	$con = mysqli_connect("localhost","root","","users");
	//$sql_user_id_from_username = "SELECT user_id FROM users WHERE  username='$username' ";
				//$query_user_id_from_username = mysqli_query($con, $sql_checkpassword_username); 
				
					$result=$con->query("SELECT last_post_id from last_post_id WHERE user_id='$user_id' ")	;	
					$row= $result->fetch_array(MYSQLI_BOTH);
					$last_post_id=$row['last_post_id'];
					return $last_post_id;
}
function getlastcommentid($post_id){//earlier the name was getpost id, I am keeping this function in order to keep any bug off the shore.

	$con = mysqli_connect("localhost","root","","users");
	$result=$con->query("SELECT last_comment_id from last_comment_id WHERE post_id='$post_id' ")	;	
	$row= $result->fetch_array(MYSQLI_BOTH);
	$last_comment_id=$row['last_comment_id'];
	return $last_comment_id;
}
function getlastreplyid($comment_id){//earlier the name was getpost id, I am keeping this function in order to keep any bug off the shore.

	$con = mysqli_connect("localhost","root","","users");
	$result=$con->query("SELECT last_reply_id from last_reply_id WHERE comment_id='$comment_id' ")	;	
	$row= $result->fetch_array(MYSQLI_BOTH);
	$last_reply_id=$row['last_reply_id'];
	return $last_reply_id;
}
function getuserid($post_id){//earlier the name was getpost id, I am keeping this function in order to keep any bug off the shore.

	$con = mysqli_connect("localhost","root","","users");
	$result=$con->query("SELECT user_id from post WHERE post_id='$post_id' ")	;	
	$row= $result->fetch_array(MYSQLI_BOTH);
	$user_id=$row['user_id'];
	return $user_id;
}


//Function to get the data of user post
function user_post_data($post_id){//this function can accept & return n number of parameter.
	$data=array();
	$con = mysqli_connect("localhost","root","","users");
	$user_id= (int)$user_id;
	$func_num_args = func_num_args();
	// echo $func_num_args; //To check number of arguments we passed
	$func_get_args = func_get_args();
	//echo $func_get_args; // To check the arguments we passed
	if($func_num_args>1){
		unset($func_get_args[0]);
	$fields= '`'.implode('`,`',$func_get_args).'`';
	
	$query="SELECT $fields FROM `post` WHERE  `post_id` =$post_id";
	 
	$result= mysqli_query($con,$query);
	$data=mysqli_fetch_assoc($result);
	//print_r($data); To retrieve all the data
	
	return $data;
	
	}

	
}


//Function to insert post
function insert_post($insert_data){
	//array_walk($register_data,'array_sanitize');
	$conp = mysqli_connect("localhost","root","","mycms");
	
		$data='\'' .implode('\',\'',$insert_data). '\'';

	$fields='`'.implode('`,`',array_keys($insert_data)).'`';
	$query="INSERT INTO `posts` ($fields) VALUES ($data)";

	mysqli_query($conp,$query);
	
}	

//Function to insert New Post
function insert_new_post($insert_data){
	//array_walk($register_data,'array_sanitize');
	$conp = mysqli_connect("localhost","root","","users");
	
		$data='\'' .implode('\',\'',$insert_data). '\'';

	$fields='`'.implode('`,`',array_keys($insert_data)).'`';
	$query="INSERT INTO `post` ($fields) VALUES ($data)";

	mysqli_query($conp,$query);
	
}

//Function to insert status
function insert_status($insert_status){
	//array_walk($register_data,'array_sanitize');
	$conp = mysqli_connect("localhost","root","","users");
	
		$data='\'' .implode('\',\'',$register_data). '\'';

	$fields='`'.implode('`,`',array_keys($register_data)).'`';
	$query="INSERT INTO `posts` ($fields) VALUES ($data)";

	mysqli_query($conp,$query);
	
}

//Insert New Comment
function insert_new_comment($insert_data){
	//array_walk($register_data,'array_sanitize');
	$conp = mysqli_connect("localhost","root","","users");
	
		$data='\'' .implode('\',\'',$insert_data). '\'';

	$fields='`'.implode('`,`',array_keys($insert_data)).'`';
	$query="INSERT INTO `comment_post` ($fields) VALUES ($data)";

	mysqli_query($conp,$query);
	
	
}
//Insert New Reply

function insert_new_reply($insert_data){
	//array_walk($register_data,'array_sanitize');
	$conp = mysqli_connect("localhost","root","","users");
	
		$data='\'' .implode('\',\'',$insert_data). '\'';

	$fields='`'.implode('`,`',array_keys($insert_data)).'`';
	$query="INSERT INTO `reply_comment` ($fields) VALUES ($data)";

	mysqli_query($conp,$query);
	
	
}
//update last post id
function update_last_post_id($user_id,$post_id){
	
	$con = mysqli_connect("localhost","root","","users");
	

	$query="UPDATE `last_post_id` SET `last_post_id`=$post_id WHERE `user_id`=$user_id ";
	
	mysqli_query($con,$query);
	
	

}

//update last comment id
function update_last_comment_id($post_id,$comment_id){
	
	$con = mysqli_connect("localhost","root","","users");
	

	$query="UPDATE `last_comment_id` SET `last_comment_id`=$comment_id WHERE `post_id`=$post_id ";
	
	mysqli_query($con,$query);
	
	

}
//Update last reply Id
function update_last_reply_id($comment_id,$reply_id){
	
	$con = mysqli_connect("localhost","root","","users");
	

	$query="UPDATE `last_reply_id` SET `last_reply_id`=$reply_id WHERE `comment_id`=$comment_id ";
	
	mysqli_query($con,$query);
	
	

}

//To check user upvoted the post or not
function user_post_upvote_exists($user,$id){
	$con = mysqli_connect("localhost","root","","users");
	
	$sql_email = "SELECT * FROM `upvote_post` WHERE `who_id`='$user' AND `post_id`=$id ";
	$query_email = mysqli_query($con, $sql_email); 
	$upvote_post_check= mysqli_num_rows($query_email);
	return $upvote_post_check;
	
}
function user_post_downvote_exists($user,$id){
	$con = mysqli_connect("localhost","root","","users");
	
	$sql_email = "SELECT * FROM `downvote_post` WHERE `who_id`='$user' AND `post_id`=$id ";
	$query_email = mysqli_query($con, $sql_email); 
	$downvote_post_check = mysqli_num_rows($query_email);
	return $downvote_post_check;
	
}	
//To check user upvoted the comment or not
function user_comment_upvote_exists($user,$id){
	$con = mysqli_connect("localhost","root","","users");
	
	$sql_email = "SELECT * FROM `upvote_comment` WHERE `who_id`='$user' AND `comment_id`=$id ";
	$query_email = mysqli_query($con, $sql_email); 
	$upvote_comment_check= mysqli_num_rows($query_email);
	return $upvote_comment_check;
	
}
function user_comment_downvote_exists($user,$id){
	$con = mysqli_connect("localhost","root","","users");
	
	$sql_email = "SELECT * FROM `downvote_comment` WHERE `who_id`='$user' AND `comment_id`=$id ";
	$query_email = mysqli_query($con, $sql_email); 
	 $downvote_comment_check= mysqli_num_rows($query_email);
	return  $downvote_comment_check;
	
}	//To check user upvoted the post or not
function user_reply_upvote_exists($user,$id){
	$con = mysqli_connect("localhost","root","","users");
	
	$sql_email = "SELECT * FROM `upvote_reply` WHERE `who_id`='$user' AND `reply_id`=$id ";
	$query_email = mysqli_query($con, $sql_email); 
	$upvote_reply_check = mysqli_num_rows($query_email);
	return  $upvote_reply_check;
	
}
function user_reply_downvote_exists($user,$id){
	$con = mysqli_connect("localhost","root","","users");
	
	$sql_email = "SELECT * FROM `downvote_reply` WHERE `who_id`='$user' AND `reply_id`=$id ";
	$query_email = mysqli_query($con, $sql_email); 
	$downvote_reply_check = mysqli_num_rows($query_email);
	return $downvote_reply_check;
	
}	

//get notifications

function getnoofnotification($user_id){
$con = mysqli_connect("localhost","root","","users");
	
	$sql_notifications = "SELECT * FROM `notifications` WHERE `user_id`='$user_id' AND `status_read`= 0 ";
	$query_notifications = mysqli_query($con, $sql_notifications); 
	$notifications_check = mysqli_num_rows($query_notifications);
	echo "(".$notifications_check.")";
}
function getnoofmessages($user_id){
$con_chat = mysqli_connect("localhost","root","","users");
	
	$sql_messages = "SELECT * FROM `$user_id` WHERE `status_read`=0 ";
	$query_messages = mysqli_query($con_chat, $sql_messages); 
	$messages_check = mysqli_num_rows($query_messages);
	echo "(".$messages_check.")";
}

function markreadmessage($user_id,$message_id){
	$con = mysqli_connect("localhost","root","","users");
	

	$query="UPDATE `$user_id` SET `status_read`=0 WHERE `message_id`=$message_id ";
	
	mysqli_query($con,$query);
}
?>