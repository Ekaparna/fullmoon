<?php
//include 'core/init.php';
?><html>
<head>
	<title>
	Jquery loadmore
	</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<script type="text/javascript" src="js/jquery-1.4.1.min.js"></script>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script>
		/*
		$(function(){
			$('.loadmore').click(function(){
				var val=$('.$final').attr('val');
				
				$.post('sql.php',{'from':val},function(data){
					
					
					$(data).insertBefore('.loadmore');
				});
				
			});
			
		}); 
		
		*/
		
		
		 $(function(){
			$('.loadmore').click(function(){
				
				var val=$('.final').attr('val');
				//alert(val);
				$.post('sql.php',{'from':val},function(data){
					if(!isFinite(data)){
							//alert(data);
							$('.final').remove();
							$(data).insertBefore('.loadmore');
					}
					else{
						$('<div class="well">No more feeds</div>').insertBefore('.loadmore');
						$('.loadmore').remove();
						
						 
					}
				});
				
				
				//alert('clicked loadmore');
			});
		 });
	</script>
	<style>
		body{
			background:#16a085;
		}
		.container{
			background:white;
			margin:40px auto;
			padding:30px;
			width:500px;
		}
	</style>
	
	</head>
<?php 
require_once 'sql.php';


?>
<body>
	<div class="container">
		<div class="well">
			<h1>Profile</h1>
			<p>This is a demo Profile Page</p>
		</div>
		<div>
		<?php
		 echo $data;
		 //echo $session_user_id;
		?>
		</div>
		<div class="loadmore">
		<button class="btn btn-primary ">Load More</button>
		</div>
	</div>

	 
</body>
</html>