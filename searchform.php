<!--  
		Filename:searchform.php
		Overrides the default search form for Wordpress
-->		
<form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<input type="search" class="form-control" placeholder="Search" value="<?php echo get_search_query(); ?>" name="s" title="Search">
</form>