<div id="new_post_Area">

	<form action="insert_new_post.php" method="post">
						<ul>
						<?php
		if($user_id==$session_user_id){
			?>
						<!--textarea name="post_content"  required="required" placeholder="Speak Your mind"></textarea-->
						<li>
						<input type="text" name="new_post_content" required="required"
						class="tfield" id="new_post" placeholder="Speak your mind">
						 </li><br>
						 <!--li>
						 <form action=" " method="POST" enctype="multipart/form-data">
		<p>Upload Snapshot</p>
		<input type="file" name="snaps">
		<input type="submit" name="Submit">
		</form></li-->
		
		<li>
		<input type="submit" name="post" value="post">
		</li>
		<?php
		}
		?>
		<br>
		</ul>
	</form>	
	
	</div>