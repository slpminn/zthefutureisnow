<?php get_header(); ?>

<div id="primary" class="container">
	<main id="main" class="site-main" role="main">
		<section class="error-404 not-found">
			<header class="page-header">
				<h1 class="page-title">Sorry, page not found!</h1>
			</header>
			<div class="page-content">
				<h2>The page you are looking for can't be found. Please click on a link below or search.</h2>
				<?php get_search_form() ?>
				<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>
				<div class="widget widget_categories">
					<h3>Check the categories</h3>
					<ul>
						<?php wp_list_categories( 
							array( 
								'orderby' => 'count',
								'order' => 'DESC',
								'showcount' => 1, //1 true, 0 false.
								'title_li' => '',
								'number' => 5 //number of categories. 
								) 
							); 
						?>	
					</ul>
				</div>
				<?php the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content"); ?>
			</div>		
		</section>	
	</main>
</div>	
	
<?php get_footer(); ?>