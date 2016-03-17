<div id="profilebutton">
					<?php
					if($user_id==$session_user_id)
					{
						?>
					<ul>
						<li><?php echo "<a href='profile.php?user=$id'>Dashboard</a>"?> </li>
						<li><?php echo "<a href='profile.php?user=$id'>About</a>"?> </li>
						<li><?php echo "<a href='actions.php?action=unfriend&user=$user1'>Friends</a>"?> </li>
						<li><?php echo "<a href='profile.php?user=$id'>Clubs</a>"?> </li>
						<li><?php echo "<a href='profile.php?user=$id'>More</a>"?> </li>
								
								
							
						
					</ul>
					<?php
					}
					else {
						$sqlc_friend="SELECT id FROM friends WHERE (user_one='$user1' AND user_two='$user2') OR (user_one='$user2' AND user_two='$user1')";
	$queryc_friend = mysqli_query($con, $sqlc_friend);
	$check_friend_query = mysqli_num_rows($queryc_friend);
   
	$sqlfrom_friend="SELECT `id` FROM friend_request WHERE `from`='$user1' AND `to`='$user2'" ;
	$queryfrom_friend = mysqli_query($con, $sqlfrom_friend);
	$from_query_friend = mysqli_num_rows($queryfrom_friend);
	//echo $from_query;
	$sqlto_friend="SELECT `id` FROM friend_request WHERE  `from`='$user2'  AND `to`= '$user1'";
	$queryto_friend = mysqli_query($con, $sqlto_friend);
	$to_query_friend= mysqli_num_rows($queryto_friend);
	
	$sqlc_acquaintances="SELECT id FROM acquaintances WHERE (user_one='$user1' AND user_two='$user2') OR (user_one='$user2' AND user_two='$user1')";
	$queryc_acquaintances = mysqli_query($con, $sqlc_acquaintances);
	$check_acquaintances_query = mysqli_num_rows($queryc_acquaintances);
   
	$sqlfrom_acquaintances="SELECT `id` FROM acquaintances_request WHERE `from`='$user1' AND `to`='$user2'" ;
	$queryfrom_acquaintances = mysqli_query($con, $sqlfrom_acquaintances);
	$from_query_acquaintances = mysqli_num_rows($queryfrom_acquaintances);
	//echo $from_query;
	$sqlto_acquaintances="SELECT `id` FROM acquaintances_request WHERE  `from`='$user2'  AND `to`= '$user1'";
	$queryto_acquaintances = mysqli_query($con, $sqlto_acquaintances);
	$to_query_acquaintances= mysqli_num_rows($queryto_acquaintances);
	
						if($check_friend_query==1){?>
						<ul>
						<li><?php echo "<a href='profile.php?user=$id'>Friend</a>"?> </li>
						<li><?php echo "<a href='actions.php?action=unfriend&user=$user1'>Unfriend</a>"?> </li>
						<li><?php echo "<a href='profile.php?user=$id'>About</a>"?> </li>
						<li><?php echo "<a href='message.php'>Message</a>"?> </li>
						<li><?php echo "<a href='profile.php?user=$id'>Clubs</a>"?> </li>
								
								
							
						
					</ul>
					<?php
						}

						else if($from_query_friend==1){?>
						<ul>
						<li><?php echo "<a href='actions.php?action=accept&user=$user1'>Accept Friendship</a>"?> </li>
						<li><?php echo "<a href='actions.php?action=ignore&user=$user1'>Ignore</a>"?> </li>
						<li><?php echo "<a href='profile.php?user=$id'>About</a>"?> </li>
						<li><?php echo "<a href='profile.php?user=$id'>Links</a>"?> </li>
						<li><?php echo "<a href='profile.php?user=$id'>Clubs</a>"?> </li>
								
								
							
						
					</ul>
					<?php
						}

						else  if($to_query_friend==1){?>
						<ul>
						<li><?php echo "<a href='actions.php?action=cancel&user=$user1'>Cancel Friend Request</a>"?> </li>
						<li><?php echo "<a href='profile.php?user=$id'>About</a>"?> </li>
						<li><?php echo "<a href='profile.php?user=$id'>Links</a>"?> </li>
						<li><?php echo "<a href='profile.php?user=$id'>Clubs</a>"?> </li>
								
								
							
						
					</ul>
					<?php
						}
						else if($check_acquaintances_query==1){?>
						<ul>
						<li><?php echo "<a href='actions.php?action=send&user=$user1'>Offer Friendship</a>"?> </li>
						<li><?php echo "<a href='profile.php?user=$id'>About</a>"?> </li>
						<li><?php echo "<a href='profile.php?user=$id'>Links</a>"?> </li>
						<li><?php echo "<a href='profile.php?user=$id'>Clubs</a>"?> </li>
								
								
							
						
					</ul>
					<?php
						}
						
						else if($from_query_acquaintances==1){?>
						<ul>
						<li><?php echo "<a href='actions.php?action=acceptconnection&user=$user1'>Accept Connection</a>"?> </li>
						<li><?php echo "<a href='actions.php?action=ignoreconnection&user=$user1'>Ignore</a>"?> </li>
						<li><?php echo "<a href='profile.php?user=$id'>About</a>"?> </li>
						<li><?php echo "<a href='profile.php?user=$id'>Links</a>"?> </li>
						<li><?php echo "<a href='profile.php?user=$id'>Clubs</a>"?> </li>
								
								
							
						
					</ul>
					<?php
						}
						else if($to_query_acquaintances==1){?>
						<ul>
						<li><?php echo "<a href='actions.php?action=undoreqconnection&user=$user1'>Cancel Connection Request</a>"?> </li>
						<li><?php echo "<a href='profile.php?user=$id'>About</a>"?> </li>
						<li><?php echo "<a href='profile.php?user=$id'>Links</a>"?> </li>
						<li><?php echo "<a href='profile.php?user=$id'>Clubs</a>"?> </li>
								
								
							
						
					</ul>
					<?php
						}
						else {
						?>
						<ul>
						<li><?php echo "<a href='actions.php?action=connect&user=$user1'>Connect</a>"?> </li>
						<li><?php echo "<a href='profile.php?user=$id'>About</a>"?> </li>
						<li><?php echo "<a href='profile.php?user=$id'>Links</a>"?> </li>
						<li><?php echo "<a href='profile.php?user=$id'>Clubs</a>"?> </li>
								
								
							
						
					</ul>
					<?php	
							
							
						}
						
					}
					?>
				</div>
	
	