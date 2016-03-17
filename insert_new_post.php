<?php
include'core/init.php';

	if(empty($_POST)===false){
			
	$required_fields=array('new_post_content');
    //echo '<pre>',print_r($_POST,true),'</pre>'; Testing line
		foreach($_POST as $key=>$value){
			if(empty($value)&&in_array($value,$required_fields)===true){
				$errors[]='Field Marked with asteriks are required.';
				break 1;//it will come out of this loop abnd continue the execution.
			}
			
				
		}
		if (empty($errors)===false){
			echo output_errors($errors);
			
		}
		
		
	}
	if(empty($errors)=== true && empty($_POST)===false){
		$last_postid=getpostid($session_user_id);
		$post_id=$last_postid+1;
	$insert_data=array(
		'post_date' 	=> $post_date,
		'post_content'		=> $_POST['new_post_content'],
		'user_id'=>$session_user_id,
		'user_post_id'=>$post_id
		//'post_author' 	=> $_POST['post_author'],
		//'post_keywords' 	=> $_POST['post_keywords'],
		//'post_image' 		=> $_FILES['post_image']['name'],
		
		//'category_id'			=> $_POST['post_cat']
		
	);	
		update_last_post_id($session_user_id,$post_id);
		insert_new_post($insert_data);
		
	header("Location:index.php");
	}
		?>