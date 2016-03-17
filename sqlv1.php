<?php

error_reporting(0);

class Feeds{
	
	public function query($from,$to){
	
$session_user_id=$_SESSION['user_id'];			
		$con= mysqli_connect("localhost","root","","users")or die('error');
		$query= "select * from post where `user_post_id`>$from and `user_post_id`<$to and `user_id`=$session_user_id";
		$result=mysqli_query($con,$query);
		$count=mysqli_num_rows($result);
		$data='';
		if($count>0)
		{
			//echo $query;
			while($row=mysqli_fetch_array($result))
			{
				$id=$row['user_post_id'];
				$feed=$row['post_content'];
				//return $feed;
				//$data=$data.'<blockquote><p>'.$feed.'</p></blockquote>';
				$data = $data.'<div class="wrap"><div class="post_wrap">'.$feed.'</div><div class="action_wrap"><ul><li><input type=\'submit\' name=\'like\' value=\'Upvote\'><input type=\'submit\' name=\'like\' value=\'Downvote\'></li></ul></div><div class="comment_wrap"></div></div>';
		
			}
			$data=$data.'<div class="final" val="'.$id.'"></div>';
			return $data;
		}
		else{
			return '0';
			
		}
	}
	
	public function main(){
		if(isset($_POST['from'])){
		$from= $_POST['from'];
		$to= $from+4;
		$data=$this->query($from,$to);
		echo $data;
		}
		else{
		$data=$this->query(0,4);
			return $data;
		}
		
		
		
	}
}

$obj= new Feeds();
$data=$obj->main();
?>