
					<div id="profilepic">
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
					
					user_profile_image($user_id,$file_temp,$file_extn);
					header('Location:'.$current_file);
				}
				else{
					
					echo 'Incorrect File Type. Allowed: ';
					echo implode(',',$allowed);
				}
				
				
			}
		}
		
		if(empty($profile_data['profile'])===false){
			echo '<img src="',$profile_data['profile'],'" alt="',$profile_data['first_name'],'\'s Profile Image" >';
			//echo 'profilepic';
			}
		else{
		
		?>
		
		<!--form action=" " method="POST" enctype="multipart/form-data">
		<p>Upload Profile Pic</p>
		<input type="file" name="profile">
		<input type="submit" name="Submit">
		</form-->
		
		<?php
		
		}
		
		?>
	</div>