<form action="new_reply.php" method="post" >
						<ul>
						<!--textarea name="post_content"  required="required" placeholder="Speak Your mind"></textarea-->
						<li>
						<input type="text" name="new_reply" required="required"
						class="tfield" id="new_post" placeholder="Reply Here">
						 </li><br>
						 <li>
						 <!--form action=" " method="POST" enctype="multipart/form-data">
		<p>Upload Snapshot</p>
		<input type="file" name="snaps">
		<input type="submit" name="Submit">
		</form--></li>
		<li>
		<input type="hidden" name='comment_id' value='<?php  echo "{$rows->comment_id}"; ?>'>
		</li>
		<li>
		<input type="submit" name="reply" value="Reply" >
		</li>
		<br>
		</ul>
	</form>