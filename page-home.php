<?php get_header(); ?>

<div class="row">
	<div class="col-12">
	</div>
	<div class="col-12 col-sm-8">
		<h2>Latest Post</h2>
		<?php 
			// Retrieve the most current post.
			$theBlogs = new WP_Query('type=post&posts_per_page=1');
			if($theBlogs->have_posts()):
				echo '<div class="row">';
				while($theBlogs->have_posts()): $theBlogs->the_post();
					echo '<div class="col-12">';
					get_template_part('content-format-feature-post',get_post_format());
					echo '</div>'; 
				endwhile;
				echo '</div>';
			endif;
			wp_reset_postdata(); // Clean the query post, so other query posts are not affected.
		 ?>
		 <hr />
		 <h2>Second and Third Post</h2>
		<?php 
			// Retrieve two posts, skipping the first post.
			$theBlogs = new WP_Query('type=post&offset=1&posts_per_page=2');
			if($theBlogs->have_posts()) :
				echo '<div class="row">';
				while($theBlogs->have_posts()): $theBlogs->the_post();
					echo '<div class="col-12">';
					get_template_part('content-format-post-thumb-right',get_post_format()); 
					echo '</div>';
				endwhile;
				echo '</div>';
			endif;
			wp_reset_postdata(); // Clean the query post, so other query posts are not affected.
		 ?>
		 <hr />
		 <h2>All posts for the category Jerez</h2>	
		<?php 
			// Retrieve All posts from Category Madrid.
			// posts_per_page=-1		- All posts.
			// cat=3					- Only from the category id 3.
			// category_name=jerez		- Only from the category named Jerez.
			// category__in = array ( 1, 2, 3) - Only posts from these categories.
			// category__not_in = array ( 4 )  - Excluding posts from these categories.
			// last post from each category
			$args = array(
				'type' => 'post',
				'posts_per_page'=> -1,
				'cat'=> 16
			);
			$theBlogs = new WP_Query($args);
			if($theBlogs->have_posts()):			
				echo '<div class="row">';
				while($theBlogs->have_posts()): $theBlogs->the_post();
					echo '<div class="col-12 col-sm-6">';
					get_template_part('content-format-pillar-post',get_post_format()); 
					echo '</div>';
				endwhile;
				echo '</div>';
			endif;
			wp_reset_postdata(); // Clean the query post, so other query posts are not affected.
		 ?>
		 <h2>Loop Thru Categories.  Most recent post of each category</h2>	
		<?php 

			$args_cats = array(
				'include' => '16, 7, 13'
			);
			$categories = get_categories($args_cats);
			echo '<div class="row">';
				foreach($categories as $category) :
					$args = array(
						'type' => 'post',
						'posts_per_page'=> 1,
						'category__in'=> $category->term_id
					);
					$theBlogs = new WP_Query($args);
					if($theBlogs->have_posts()):			
						while($theBlogs->have_posts()): $theBlogs->the_post();
							echo '<div class="col-6 col-sm-4">';
							get_template_part('content-format-pillar-post',get_post_format()); 
							echo '</div>';
						endwhile;
					endif;
					wp_reset_postdata(); // Clean the query post, so other query posts are not affected.	
				endforeach;	
			echo '</div>';
		 ?>
	</div>
	<div class="col-12 col-sm-4">	
		<?php get_sidebar(); ?>
	</div>
</div>
	
<?php get_footer(); ?>