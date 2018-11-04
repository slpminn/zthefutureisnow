<article id="post-cthe_ID(); ?>" <?php post_class(); ?> >
	<header class="entry-header">		
	<?php $breaking_news = get_post_meta( get_the_ID(), 'zthefutureisnow_breaking_news', true ); ?>
	<?php if ( isset( $breaking_news ) && $breaking_news == 1 ) : ?>
		<div id="breakingNews" class="breaking-news mocked">
			<div class="row">
		  		<div class="col-4 col-sm-2 text-right breaking-left">
		  			<h2 class="responsive">
		      			<span class="breaking-small">Breaking</span><br>
		      			<span class="breaking-large">News</span>
		    		</h2>
		  		</div>
		  		<div class="col-8 col-sm-10 breaking-right">
		    		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s">', esc_url(get_permalink()) ),'</a></h2>'); ?>
				    <!--  <button type="button" class="btn btn-danger btn-xs">Read More 
				        <i class="glyphicon glyphicon-arrow-right"></i>
				      </button> -->
		  		</div>
			</div>
		</div>
	<?php else : ?>
	    <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s">', esc_url(get_permalink()) ),'</a></h2>'); ?>	
	<?php endif; ?>
	</header>
	<div class="row">
		<div class="col-12">
			<div class="thumbnail">
				<a href="<?php esc_url(get_permalink()) ?>" />
					<?php the_post_thumbnail("full",array( 'class' => 'img-fluid' ) ); ?>		
				</a>				
			</div>
		</div>
		<div class="col-12">
			<small>Posted on: <?php echo get_post_time("F d, Y g:i a"); ?></small>	
			<?php if (get_post_time() != get_post_modified_time()) : ?>
				<br /><small>Modified on: <?php echo get_post_modified_time("F d, Y g:i a"); ?></small>
			<?php endif; ?>	
			<?php echo the_excerpt() ; //Get the entire post ?>
		</div>
	</div>								
</article>	
