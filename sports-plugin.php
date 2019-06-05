<?php
/*
Plugin Name: Sports Plugin
Plugin URI:  http://localhost/wordpress
Description: Basic WordPress Plugin Header Comment
Version:     1.0
Author:      Anjani Anusuri
Author URI:  http://localhost/wordpress
Text Domain: wporg
Domain Path: /languages
License:     GPL2

{Plugin Name} is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

{Plugin Name} is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with {Plugin Name}. If not, see {License URI}.
*/

function test_plugin_setup_menu(){
        add_menu_page( 'Test Plugin Page', 'Test Plugin', 'manage_options', 'test-plugin', 'test_init' );
}

function test_init(){
        echo "<h1>Hello World!</h1>";
}

function anjani_custom_posttypes() {

    // Sports Post type

    $labels = array(
      'name'              => 'Sports',
      'singular_name'     => 'Sport',
      'menu_name'         => 'Sports',
      'new_admin_bar'     => 'Sport',
      'add_new'           => 'Add New',
      'new_item'          => 'Add New Sport',
      'edit_item'         => 'Edit Sport',
      'view_item'         => 'Edit Sport',
      'all_items'         => 'All Sports',
      'search_item'       => 'Search Sports',
      'parent_item_colon' => 'Parent Sports',
      'not_found'         => 'No sports found.',
      'not_found_in_trash'=> 'No sports found in Trash.',
    );

    $args = array(
      'labels'            => $labels,
      'public'            => true,
      'publicly_queryable'=> true,
      'show_ui'           => true,
      'show_in_menu'      => true,
      'menu_position'     => 5,
      'menu_icon'         => 'dashicons-sos',
      'query_var'         => true,
      'rewrite'           => array('slug' => 'sports'),
      'capability_type'   => 'post',
      'has_archive'       => true,
      'heirarchical'      => false,
      'supports'          => array('title', 'editor', 'thumbnail', 'excerpt'),
      'taxonomies'        => array('category', 'post-tag'),
      'show_in_rest'      => true
    );

    register_post_type('sports', $args);

  // Careers Post Type

  $labels = array(
    'name'              => 'Careers',
    'singular_name'     => 'Career',
    'menu_name'         => 'Careers',
    'new_admin_bar'     => 'Career',
    'add_new'           => 'Add New',
    'new_item'          => 'Add New Career',
    'edit_item'         => 'Edit Career',
    'view_item'         => 'Edit Career',
    'all_items'         => 'All Careers',
    'search_item'       => 'Search Careers',
    'parent_item_colon' => 'Parent Careers',
    'not_found'         => 'No careers found.',
    'not_found_in_trash'=> 'No careers found in Trash.',
  );

  $args = array(
    'labels'            => $labels,
    'public'            => true,
    'publicly_queryable'=> true,
    'show_ui'           => true,
    'show_admin_column' => true,
    'show_in_menu'      => true,
    'menu_position'     => 6,
    'menu_icon'         => 'dashicons-awards',
    'query_var'         => true,
    'rewrite'           => array('slug' => 'careers'),
    'capability_type'   => 'post',
    'has_archive'       => true,
    'heirarchical'      => false,
    'supports'          => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),
    'show_in_rest'      => true
  );

  register_post_type('careers', $args);

}

add_action('init', 'anjani_custom_posttypes');

function my_rewrite_flush() {
    // First, we "add" the custom post type via the above written function.
    // Note: "add" is written with quotes, as CPTs don't get added to the DB,
    // They are only referenced in the post_type column with a post entry,
    // when you add a post of this CPT.
    anjani_custom_posttypes();

    // ATTENTION: This is *only* done during plugin activation hook in this example!
    // You should *NEVER EVER* do this on every page load!!
    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'my_rewrite_flush' );

/* Custom Taxonomies */

function anjani_custom_taxonomies() {

  /* Type of Career*/

  $labels = array(
        'name'              => 'Career Type',
        'singular_name'     => 'Career Type',
        'search_items'      => 'Search Career Type',
        'all_items'         => 'All Careers',
        'parent_item'       => 'Parent Career',
        'parent_item_colon' => 'Parent Career:',
        'edit_item'         => 'Edit Career',
        'update_item'       => 'Update Career',
        'add_new_item'      => 'Add new career',
        'new_item_name'     => 'New career name',
        'menu_name'         => 'Career Type',
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'public'            => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_rest'      => true,
        'show_tagcloud'     => false,
        'query_var'         => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'career-type' ),
    );

    register_taxonomy( 'career-type', array( 'careers' ), $args );

  /* Income Range */

  $labels = array(
        'name'              => 'Income Range',
        'singular_name'     => 'Income Range',
        'search_items'      => 'Search Income Ranges',
        'all_items'         => 'All Income Ranges',
        'parent_item'       => 'Parent income range',
        'parent_item_colon' => 'Parent income range:',
        'edit_item'         => 'Edit income range',
        'update_item'       => 'Update income range',
        'add_new_item'      => 'Add new income range',
        'new_item_name'     => 'New Income Range Name',
        'menu_name'         => 'Income Range',
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'public'            => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_rest'      => true,
        'show_tagcloud'     => false,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'income-range' ),
    );

    register_taxonomy( 'income-range', array( 'careers' ), $args );

      /* Location */

      $labels = array(
            'name'              => 'Location',
            'singular_name'     => 'Location',
            'search_items'      => 'Search Location',
            'all_items'         => 'All Locations',
            'parent_item'       => 'Parent Location',
            'parent_item_colon' => 'Parent Location:',
            'edit_item'         => 'Edit Location',
            'update_item'       => 'Update Location',
            'add_new_item'      => 'Add new Location',
            'new_item_name'     => 'New Location Name',
            'menu_name'         => 'Location',
        );

        $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'public'            => true,
            'show_ui'           => true,
            'show_admin_column' => true,
            'show_in_rest'      => true,
            'show_tagcloud'     => false,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'location' ),
        );

        register_taxonomy( 'location', array( 'careers' ), $args );

}

add_action('init', 'anjani_custom_taxonomies');
