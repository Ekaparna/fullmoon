<form action="new_comment.php" method="post" >
						<ul>
						<!--textarea name="post_content"  required="required" placeholder="Speak Your mind"></textarea-->
						<li>
						<input type="text" name="new_comment" required="required"
						class="tfield" id="new_post" placeholder="Comment Here">
						 </li><br>
						 <li>
						 <!--form action=" " method="POST" enctype="multipart/form-data">
		<p>Upload Snapshot</p>
		<input type="file" name="snaps">
		<input type="submit" name="Submit">
		</form--></li>
		<li>
		<input type="hidden" name='post_id' value='<?php  echo "{$row->post_id}"; ?>'>
		</li>
		<li>
		<input type="submit" name="comment" value="Comment" >
		</li>
		<br>
		</ul>
	</form>