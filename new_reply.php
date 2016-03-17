<?php
include'core/init.php';

	if(empty($_POST)===false){
			
	$required_fields=array('new_comment');
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
		$comment_id=$_POST['comment_id'];
		$last_replyid=getlastreplyid($comment_id);
		$comment_reply_id=$last_replyid+1;
	$insert_data=array(
		//'comment_date' 	=> $post_date,
		'reply'		=> $_POST['new_reply'],
		'replier_id'=>$session_user_id,
		'comment_id'=>$_POST['comment_id'],
		'comment_reply_id'=>$comment_reply_id
		
		//'post_author' 	=> $_POST['post_author'],
		//'post_keywords' 	=> $_POST['post_keywords'],
		//'post_image' 		=> $_FILES['post_image']['name'],
		
		//'category_id'			=> $_POST['post_cat']
		
	);	
		insert_new_reply($insert_data);
		update_last_reply_id($comment_id,$comment_reply_id);
		
		
	header("Location:index.php");
	}
		?>