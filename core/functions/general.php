<?php
function protect_page(){
	if(logged_in()===false){
	header('Location:protected.php');	
	exit();
	}
	
}
function email($to,$subject,$body){
	
	mail($to,$subject,$body,'From: rajivjha1996@gmail.com ');
}

function protect_unlogged_page(){
	if(logged_in()===true){
	header('Location:protected_unloggedin.php');	
	exit();
	}
	
}
function admin_protect(){
	global $user_data;
	if($user_data['type']!=1){
		
		//else if(is_admin($user_data['user_id'])===false){
		header('Location:index.php');	
	exit();
	}
}
function club_protect(){
	global $user_data;
	if($user_data['type']!=2){
		header('Location:index.php');	
	exit();
	}
}
function alumni_protect(){
	global $user_data;
	if($user_data['type']!=3){
		header('Location:index.php');	
	exit();
	}
}
function faculty_protect(){
	global $user_data;
	if($user_data['type']!=4){
		header('Location:index.php');	
	exit();
	}
}
function redirect_index(){
	if(logged_in()===true){
	header('Location:index.php');	
	exit();
	}
	
}
function array_sanitize(&$item){
	
	$item=htmlentities(strip_tags(mysql_real_escape_string($item)));
	
}
function sanitize($data){
	
	return htmlentities(strip_tags(mysql_real_escape_string($data)));

}

function output_errors($errors){
	
		$output=array();
		foreach($errors as $error){
			$output[]='<li>'. $error .'</li>'; 
		}
		return '<ul>'.  implode('',$output) . '</ul>';
}	


?>