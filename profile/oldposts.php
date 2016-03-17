<script>
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
<?php
require_once 'sql.php';
?>
<div>
		<?php
		 echo $data;
		 //echo $session_user_id;
		?>
		</div>
		<div class="loadmore">
		<button class="btn btn-primary ">Load More</button>
		</div>