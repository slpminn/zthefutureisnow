<div id="sidebar" class="widgets-area">
	
	<?php 

		$zthefutureisnow_return_id = zthefutureisnow_get_post_id();

		if ( $zthefutureisnow_return_id == 20 ) :
			dynamic_sidebar('sidebar-2'); 
		elseif ($post_id != '20') :	
			dynamic_sidebar('sidebar-1'); 
		endif;
			
	/*	if (g$post_id == '20') :
			dynamic_sidebar('sidebar-2'); 
		else :
			dynamic_sidebar('sidebar-1'); 
		endif;	*/	
	
	?>

</div>	