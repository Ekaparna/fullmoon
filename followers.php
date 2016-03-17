<?php 
include'core/init.php';
protect_page();


include'includes/overall/header.php';
?>

	 
	 
	 <h3></h3>
	 <div id="friendsbutton">
	 <ul>
						<li><?php echo "<a href='friends.php'>Friends</a>"?> </li>
						<li><?php echo "<a href='acquaintances.php'>Acquaintances</a>"?> </li>
						<li><?php echo "<a href='following.php'>Following</a>"?> </li>
						<li><?php echo "<a href='followers.php'>Followers</a>"?> </li>
						<li><?php echo "<a href='alumnus.php'>Alumni</a>"?> </li>
						<li><?php echo "<a href='faculty.php'>Faculty</a>"?> </li>
								
								
							
						
					</ul>
					</div>
	 <?php
	     $user2= $_SESSION['user_id'];
		 
		 $querya="SELECT `who_id`,`whom_id` FROM follow WHERE (`whom_id`='$user2') ";
		 $friends_query=mysqli_query( $con ,$querya);
		 
		 $flag=1;
		 while($run_mem = mysqli_fetch_array($friends_query)){
		 $user_one=$run_mem['who_id'];
		 $user_two=$run_mem['whom_id'];
			 
				 $usera=$user_one;
				 
			 
			 
		 // getuser via $field 
			$sqli = "SELECT * FROM `users` WHERE `user_id`='$usera' ";
			$queryy = mysqli_query($con, $sqli); 
			
			while($run_memo = mysqli_fetch_array($queryy))
	         {
				 if($flag%2==0){
										 ?>
										 <div class="right_friend">
										 <?php
								 $usernamee=$run_memo['username'];
								 $firstname=$run_memo['first_name'];
								 $lastname=$run_memo['last_name'];
								 echo "<br><br>";
									?>
									 <div class="profilepic">
										<?php
								echo '<img src="',$run_memo['profile'],'" alt="',$run_memo['first_name'],'\'s Profile Image" >';
							 
							
							?>
							</div>
									<?php 
									
									echo "<br><br>";
									echo "<a href='profile.php?username=$usernamee'class='box' style='display:block;'>$firstname $lastname</a>";
									  if(online_status($usera)==1){
				 echo "<img src='images/online.jpg' alt='Online' height='10' width='10'>";
			 }else{
				 echo "<img src='images/offline.png' alt='Offline' height='10' width='10'>";
			  }
									?>
									 </div>
									 <?php
									  $flag=1;
				 }
				 
				else{
										?>
									 <div class="left_friend">
									 <?php
							 $usernamee=$run_memo['username'];
							 $firstname=$run_memo['first_name'];
							 $lastname=$run_memo['last_name'];
							 echo "<br><br>";
								?>
								 <div class="profilepic">
									<?php
							echo '<img src="',$run_memo['profile'],'" alt="',$run_memo['first_name'],'\'s Profile Image" >';
						 
						
						?>
						</div>
								<?php
								echo "<br><br>";
								echo "<a href='profile.php?username=$usernamee'class='box' style='display:block;'>$firstname $lastname</a>";
								  if(online_status($usera)==1){
				 echo "<img src='images/online.jpg' alt='Online' height='10' width='10'>";
			 }else{
				 echo "<img src='images/offline.png' alt='Offline' height='10' width='10'>";
			  }
								?>
								 </div>
								 <?php	
								 $flag=2;
				}
				
				
			 }
			
		 
 }
		 
		/* $req_query=$con->query("SELECT `from` FROM friend_request WHERE  `to`='$user2' ");
		 while($run_req=mysqli_fetch_array($req_query)){
			 $from =  $run_req['from'];
			 $from_username=getuseridname($from);
			 echo $from_username;
			 
			 
		 }
		 
		  $sql = "SELECT `user_one` FROM friend_request WHERE  `to`='$user2' ";
	  $query = mysqli_query($con, $sql); 
	
	 while($run_mem = mysqli_fetch_array($query)){
		 $id=$run_mem['from'];
		 // getuser via $field 
		 $sqli = "SELECT * FROM users WHERE id='$id' ";
	 $queryy = mysqli_query($con, $sqli); 
	 while($run_memo = mysqli_fetch_array($queryy)){
	 $usernamee=$run_memo['username'];
		 echo "<a href='profile.php?user=$id'class='box' style='display:block;'>$usernamee</a>";
		 echo "<br><br><br>";
		 
	 }
	
		 
 }*/
	 
	 ?>
	 
		
<?php include 'includes/overall/footer.php';
?>

