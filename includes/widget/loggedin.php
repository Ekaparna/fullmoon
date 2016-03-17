<?php 

	
?>
<div class="widget">
	<!--h2>Hello, <?php// echo $user_data['first_name'];
	?>!</h2-->
	<div class="inner">
		<div class="profile">
		
		<?php
		if(isset($_FILES['profile'])===true){
			if(empty($_FILES['profile']['name'])===true){
				
				echo 'Please Choose a file!';
			}
			else{
				//
				$allowed=array('jpeg','jpg','png','gif');
				
				$file_name=$_FILES['profile']['name'];
				
				$file_extn= strtolower(end(explode('.',$file_name)));
				
				$file_temp=$_FILES['profile']['tmp_name'];
				$file_size=$_FILES['profile']['size'];
				
				if(in_array($file_extn,$allowed)===true){
					
					user_profile_image($session_user_id,$file_temp,$file_extn);
					header('Location:'.$current_file);
				}
				else{
					
					echo 'Incorrect File Type. Allowed: ';
					echo implode(',',$allowed);
				}
				
				
			}
		}
		
		if(empty($user_data['profile'])===false){
			echo '<img src="',$user_data['profile'],'" alt="',$user_data['first_name'],'\'s Profile Image" >';
		}
		else{
		
		?>
		<form action=" " method="POST" enctype="multipart/form-data">
		<p>Upload Profile Pic</p>
		<input type="file" name="profile">
		<input type="submit" name="Submit">
		</form>
		
		<?php
		
		}
		
		?>
		</div>
	<ul>
	
		<li><a href="<?php echo $user_data['username'];?>"><?php echo $user_data['first_name'];?></a></li>
		
		<li><a href="changepassword.php">Change Password</a></li>
		<li><a href="changeprofilepic.php">Change Profile Pic</a></li>
		<li><a href="notifications.php">Notifications<?php getnoofnotification($session_user_id); ?></a></li>
		<li><a href="messages.php">Messages<?php getnoofmessages($session_user_id); ?></a></li>
		<li><a href="friends.php">My Links</a></li>
		<li><a href="requests.php">Requests</a></li>
		<li><a href="members.php">All Members</a></li>
		<li><a href="searchmembers.php">Search Members</a></li>
		<li><a href="alumni.php">Connect Alumni</a></li>
		<li><a href="settings.php">Settings</a></li>
		<li><a href="privacysettings.php">Privacy Settings</a></li>
		<li><a href="chatsettings.php">Chat Settings</a></li>
		<li><a href="deactivate.php">Deactivate</a></li>
		<li><a href="Logout.php">Logout</a></li>
	</ul>
	</div>
</div>	
