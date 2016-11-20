<?php
/**
 * Register Custom Post Type & Taxonomy
 */
 
function latte_portfolio_type() {

	$labels = array(
		'name'				=> _x( 'Portfolios', 'Post Type General Name', 'latte' ),
		'singular_name'	   => _x( 'Portfolio', 'Post Type Singular Name', 'latte' ),
		'menu_name'		   => __( 'Portfolio', 'latte' ),
		'name_admin_bar'	  => __( 'Portfolio', 'latte' ),
		'parent_item_colon'   => __( 'Parent Item:', 'latte' ),
		'all_items'		   => __( 'All Portfolio Items', 'latte' ),
		'add_new_item'		=> __( 'Add Portfolio Item', 'latte' ),
		'add_new'			 => __( 'Add New', 'latte' ),
		'new_item'			=> __( 'New Portfolio Item', 'latte' ),
		'edit_item'		   => __( 'Edit Portfolio Item', 'latte' ),
		'update_item'		 => __( 'Update Portfolio Item', 'latte' ),
		'view_item'		   => __( 'View Portfolio Item', 'latte' ),
		'search_items'		=> __( 'Search Portfolio Item', 'latte' ),
		'not_found'		   => __( 'Not found', 'latte' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'latte' ),
	);
	$args = array(
		'label'			   => __( 'Portfolio', 'latte' ),
		'description'		 => __( 'Portfolio post type for Latte.', 'latte' ),
		'labels'			  => $labels,
		'supports'			=> array( 'title', 'editor', 'thumbnail', ),
		'taxonomies'		  => array( 'portfolio_category' ),
		'hierarchical'		=> false,
		'public'			  => true,
		'show_ui'			 => true,
		'show_in_menu'		=> true,
		'menu_position'	   => 5,
		'menu_icon'		   => 'dashicons-category',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'		  => true,
		'has_archive'		 => true,		
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'capability_type'	 => 'page',
	);
	register_post_type( 'portfolio', $args );

}
add_action( 'init', 'latte_portfolio_type', 0 );

function latte_portfolio_category() {

	$labels = array(
		'name'					   => _x( 'Categories', 'Taxonomy General Name', 'latte' ),
		'singular_name'			  => _x( 'Category', 'Taxonomy Singular Name', 'latte' ),
		'menu_name'				  => __( 'Categories', 'latte' ),
		'all_items'				  => __( 'All Categories', 'latte' ),
		'parent_item'				=> __( 'Parent Category', 'latte' ),
		'parent_item_colon'		  => __( 'Parent Category:', 'latte' ),
		'new_item_name'			  => __( 'New Category Name', 'latte' ),
		'add_new_item'			   => __( 'Add New Category', 'latte' ),
		'edit_item'				  => __( 'Edit Categories', 'latte' ),
		'update_item'				=> __( 'Update Categories', 'latte' ),
		'view_item'				  => __( 'View Categories', 'latte' ),
		'separate_items_with_commas' => __( 'Separate categories with commas', 'latte' ),
		'add_or_remove_items'		=> __( 'Add or remove categories', 'latte' ),
		'choose_from_most_used'	  => __( 'Choose from the most used', 'latte' ),
		'popular_items'			  => __( 'Popular Categories', 'latte' ),
		'search_items'			   => __( 'Search Categories', 'latte' ),
		'not_found'				  => __( 'Not Found', 'latte' ),
	);
	$args = array(
		'labels'					 => $labels,
		'hierarchical'			   => true,
		'public'					 => true,
		'show_ui'					=> true,
		'show_admin_column'		  => true,
		'show_in_nav_menus'		  => false,
		'show_tagcloud'			  => false,
	);
	register_taxonomy( 'portfolio_category', array( 'portfolio' ), $args );

}
add_action( 'init', 'latte_portfolio_category', 0 );
?>