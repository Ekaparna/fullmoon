<?php
include'core/init.php';
protect_page();

?>

<?php include'includes/overall/header.php';
if(empty($_POST)===false){
	
	
	
	$required_fields=array('post_title','post_author','post_keywords','post_image','post_content','post_cat');
    //echo '<pre>',print_r($_POST,true),'</pre>'; Testing line
		foreach($_POST as $key=>$value){
			if(empty($value)&&in_array($value,$required_fields)===true){
				$errors[]='Field Marked with asteriks are required.';
				break 1;//it will come out of this loop abnd continue the execution.
			}
			
				
		}
		
		
		
		if (empty($errors)===true){

			/*
			if(user_exists($a) === 1||user_exists($c) >1){
				$errors[]='Sorry, The Username  \''.htmlentities($_POST['username']).'\' is already taken.';
				
				
			}
			if(preg_match("/\\s/",$_POST['username'])==true){
				//$regular_expression=preg_match("/\\s/",$_POST['username']);
				//var_dump($regular_expression); This pregmatch return 1 if the statement is true.
				$errors[]='Sorry, The Username  \''.htmlentities($_POST['username']).'\' Contains space.We don\'t allow spaces in username';
				
			}
			if(email_exists($c) === 1||email_exists($c) >1){
				$errors[]='Sorry, The email id \''.htmlentities($_POST['email']).'\' is already in use.';
				
			}
			if(strlen($_POST['password'])<6){
				$errors[]='Sorry, The password must be atleast 6 characters';
				
				
			}
			if(strlen($_POST['password'])>30){
				$errors[]='Sorry, The password can be atmax 30 characters';
				
				
			}
			if($_POST['password']!== $_POST['repeatpassword']){
				
				$errors[]='Sorry, The password didn\'t matched.';
				
				
			}
			if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)===false){
				
				$errors[]='A valid Email address is required.';
			}
			if($_POST['gender']==='male'){
				$profilepic="images/profile/defaultmale.jpg";
			}
			else if($_POST['gender']==='female'){
				$profilepic="images/profile/defaultfemale.jpg";
				
			}
			
			*/
				
		}
		
		
	}
	
	




?>
			<h1>Insert New Post</h1>
	<?php 
	if(isset($_GET['success'])&&empty($_GET['success'])){
		
		echo 'Post has been published successfully.';
	}
	
	else{
	if(empty($errors)=== true && empty($_POST)===false){
		$post_image=$_FILES['post_image']['name'];
		$post_image_tmp=$_FILES['post_image']['tmp_name'];
		

	move_uploaded_file($post_image_tmp,"../images/$post_image");
	insert_post($insert_data);
	
	/*$insert_posts="insert into posts (category_id,post_title,post_date,post_author,post_keywords,post_image,post_content) values ('$post_cat','$post_title','$post_date','$post_author',
	'$post_keywords','$post_image','$post_content')";
	
	$run_insert=mysqli_query($insert_posts);
	if(mysqli_query($run_posts)){
		
		echo "<script>alert('Post has been published')</script>";
		echo "<script>window.open('insert_post.php','_self')</script>";
	}*/
	

	
	header('Location:profile.php?username=$username');
	exit();
	
	}
	else if(empty($errors)=== false){
		
	?>
	<h2>We tried to Publish the post, but</h2>
<?php

echo output_errors($errors);
}
	

	?>