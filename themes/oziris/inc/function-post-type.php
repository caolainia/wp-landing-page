<?php

// remove post tag
function dn_unregister_tags() {
    unregister_taxonomy_for_object_type('post_tag', 'post');
}
add_action('init', 'dn_unregister_tags');


add_action( 'init', 'codex_partner_init' );
function codex_partner_init() {
	$labels = array(
		'name'               => _x( 'Partners', 'post type general name', 'digitalnoir' ),
		'singular_name'      => _x( 'Partner', 'post type singular name', 'digitalnoir' ),
		'menu_name'          => _x( 'Partners', 'admin menu', 'digitalnoir' ),
		'name_admin_bar'     => _x( 'Partner', 'add new on admin bar', 'digitalnoir' ),
		'add_new'            => _x( 'Add New', 'partner', 'digitalnoir' ),
		'add_new_item'       => __( 'Add New Partner', 'digitalnoir' ),
		'new_item'           => __( 'New Partner', 'digitalnoir' ),
		'edit_item'          => __( 'Edit Partner', 'digitalnoir' ),
		'view_item'          => __( 'View Partner', 'digitalnoir' ),
		'all_items'          => __( 'All Partners', 'digitalnoir' ),
		'search_items'       => __( 'Search Partners', 'digitalnoir' ),
		'parent_item_colon'  => __( 'Parent Partners:', 'digitalnoir' ),
		'not_found'          => __( 'No partners found.', 'digitalnoir' ),
		'not_found_in_trash' => __( 'No partners found in Trash.', 'digitalnoir' )
	);

	$args = array(
		'labels'             => $labels,
    'description'        => __( 'Description.', 'digitalnoir' ),
		'public'             => true,
		'publicly_queryable' => false,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'partner' ),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => 5,
		'menu_icon'					 => 'dashicons-groups',
		'supports'           => array( 'title', 'editor','thumbnail',)
	);

	register_post_type( 'partner', $args );
}

add_action( 'init', 'create_partner_cat_taxonomies', 0 );
function create_partner_cat_taxonomies() {
	
	$labels = array(
		'name'              => _x( 'Categories', 'taxonomy general name' ),
		'singular_name'     => _x( 'Category', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Categories' ),
		'all_items'         => __( 'All Categories' ),
		'parent_item'       => __( 'Parent Category' ),
		'parent_item_colon' => __( 'Parent Category:' ),
		'edit_item'         => __( 'Edit Category' ),
		'update_item'       => __( 'Update Category' ),
		'add_new_item'      => __( 'Add New Category' ),
		'new_item_name'     => __( 'New Category Name' ),
		'menu_name'         => __( 'Category' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'partner-cat' ),
	);

	register_taxonomy( 'partner_cat', array( 'partner' ), $args );
}