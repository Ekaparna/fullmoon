<aside>
				<?php 
				if(logged_in()===true){
					
					include'includes/widget/loggedin.php';
					//include'includes/widget/logout.php';
					//include'includes/widget/deactivate.php';
				}
				else{
				include'includes/widget/login.php';
				}
				include'includes/widget/user_count.php';
				?>
			
			</aside> 