<?php 
include'core/init.php';
protect_page();
admin_protect();

include'includes/overall/header.php';?>
			<h1>Email all Users</h1>
			
			<?php
			if(isset($_GET['success'])===true&&empty($_GET['success'])===true){
		?>
	<p>	'E-Mail has been sent successfully.'</p>
	<?php 
	}
	
			else{ 
			if(empty($_POST)===false){//if form is submitted
				
				
				if(empty($_POST['subject'])=== true){
					$errors[]='subject is required';
				}
				if(empty($_POST['body'])=== true){
					$errors[]='Body is required';	
				}
				if(empty($errors)===false){
					
					echo output_errors($errors);
				}
				else{
					mail_users($_POST['subject'],$_POST['body']);
					header('Location:mail.php?success');
					exit();
				}
				
				
			}
			
			?>
			<form action="" method="post">
				<ul>
					<li>
					Subject*: <br>
					<input type="text" name="subject" required="required">
					</li>
					<li>
					Body*: <br>
					<textarea name="body" required="required"></textarea>
					</li>
					<li>
					
					<input type="submit" name="Send" >
					</li>
					
				</ul>
			</form>


			
<?php
			}
 include 'includes/overall/footer.php';
?>

		