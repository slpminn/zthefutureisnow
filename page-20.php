	<?php get_header(); ?>

	<div class="row">
		<div class="col-12 col-sm-8">	
			<h1>About Us</h1>
			<h3>zthefutureisnow/page-20.php</h3>	
			<h4>About this Page</h4>
			<ul>
				<li>By adding the hook get_header(), WordPress will include the content of the header.php</li>
				<li>By creating a php file with the name: page-[post-ID].php, WordPress will display that page and not the index.php</li>
				<li>By adding the hook get_footer(), WordPress will include the content of the footer.php</li>
			</ul>		
		</div>
		<div class="col-12 col-sm-4">	
			<?php get_sidebar(); ?>
		</div>
	</div>
	
	<?php get_footer(); ?>		