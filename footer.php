<?php /* 
		Name: footer.php
		Description: Contains the code to display the main footer.
		Functions:
			The script calls the funtion wp_footer(); which loads the default scripts and the scripts defined in the zthefutureisnow_script_enqueue associated to the footer.
		Called by:	
			Function get_footer();
*/ ?>

		<footer>
		
			This is the footer

			<?php wp_nav_menu(array('theme_location'=>'footermenu')); ?>

		</footer>

		<?php  wp_footer(); ?>
	
	</div>	<!-- End Content Fluid --.

	</body>
	
</html>