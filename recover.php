<?php 
include'core/init.php';
redirect_index();


include'includes/overall/header.php';?>
			<h1>Recover</h1>
	<?php
	if(isset($_GET['success'])===true&& empty($_GET['success'])===true){
		?>
		
		<p>Thanks, We Have Emailed you.Check your inbox and spam folder too.</p>
		
		
		<?php
	}
	else{
		
	$mode_allowed=array('username','password');
	
	if(isset($_GET['mode'])===true && in_array($_GET['mode'],$mode_allowed)===true){
		
		if(isset($_POST['email'])===true && empty($_POST['email'])===false){
			
			if(email_exists($_POST['email'])==1){
				
				$flag_recovery=recover($_GET['mode'],$_POST['email']);
				if($flag_recovery==1){
				header('Location:recover.php?success');
				}
				exit();
			}
			else{
				
				echo '<p>Oops, we couldn\'t find that email address! </p>';
			}
		}
		
		?>
		<form action="" method="post">
			<ul><li>Please Enter your email address:<br></li>
			<li><input type="email" name="email" required="required" 
						class="tfield" id="email" placeholder="Email Id">
						 </li><br>
						  <li><br>
						 <input type="submit" value="Submit Email">
						 </li><br>
						 </ul>
		</form>

		
<?php
		
	}
	else{
		
		header('Location:index.php');
		exit();
	}
	
}
	?>		


			
<?php include 'includes/overall/footer.php';
?>

		