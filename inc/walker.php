<?php 

		/* Collection of Walker Nav Classes */	

class Walker_Nav_Primary extends Walker_Nav_menu {

	function start_lvl( &$output, $depth = 0, $args = array() ) { //ul
		//& maintains the output values.
		//If the $depth is null, then set to 0.
		//If the $args is null, then set to empty array.
		$indent = str_repeat("\t",$depth);
		$submenu = ($depth > 0) ? ' sub-menu' : ''; //If we are in a submenu.
		$output .= "\n$indent<ul class=\"dropdown-menu$submenu depth_$depth\">\n";		
	}

	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) { //li a span 
		$indent = ( $depth ) ? str_repeat("\t",$depth) : ''; //If $depth is defined.
		$li_attributes = '';
		$class_name = ' ';
		$value = '';
		//The classes array is going to contain all of our custom classes.
		$classes = empty( $item->classes ) ? array() : (array) $item->classes; //If $item->classes array is empty.

		//[] merges the array.
		//$args->walker->has_children. If true the li has an ul inside, then use the class dropdown.
		$classes[] = ($args->walker->has_children) ? 'dropdown' : '';								
		//If the item, or one of if childrens is active, then use the class active.
		$classes[] = ($item->current || $item->current_item_anchestor) ? 'active' : '';
		$classes[] = 'menu-item-' . $item->ID;
		if ( $depth && $args->walker->has_children ) {
			$classes[] = 'dropdown-submenu'; //Bootstrap class.
		}
		//join all of the classes with a space as sparator.
		//apply_filters edits and adapts all the custom classes so wordpress can manage the classes.
		//array_filter loops and applies filters to all the elements of the array.
		$class_name = join( ' ', apply_filters('nav_menu_css_class', array_filter( $classes ), $item, $args) );
		$class_name = ' class="'. esc_attr( $class_name ) .'"';

		$id = apply_filters('nav_menu_item_id', 'menu-item-'.$item->ID, $item, $args);
		$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';
		$output .= $indent . '<li' . $id . $value . $class_name . $li_attributes . '>';

		$attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) . '"' : ''; 
		$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) . '"' : '';
		$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) . '"' : '';
		$attributes .= ! empty( $item->url ) ? ' title="' . esc_attr( $item->url ) . '"' : ''; 
		//if the argument has children
		$attributes .= $args->walker->has_children ? ' class="dropdown-toggle" data-toggle="dropdown"' : '';

		$item_output = $args->before;
		$item_output .= '<a' . $attributes . '>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_ouptut .= ( $depth == 0 && $args->walker->has_children ) ? '<b class="caret"></b></a>' : '</a>';
		$item_output .= $args->after; 

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}

/*
	function end-lvl() { //closing ul

	}

	function end-el() { //closing li a span

	}
*/
}

?>