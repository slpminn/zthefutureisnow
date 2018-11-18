<?php
	/*
		==================================================
			Retrieve Custom Taxanomy.
		==================================================	
	 */
	function zthefutureisnow_get_custom_taxanomy($post, $term) {

		$term_list_cat = wp_get_post_terms($post, $term);
		$output = "";	
		$i = 0;	
		foreach( $term_list_cat as $term ) {	
			$i++;
			if($i > 1) {$output .= ', ';}
			$output .= $term->name;	
		} 
		return $output;
	}	
?>