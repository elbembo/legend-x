<?php

/**
 * Wordpress Child Theme
 *
 * @package  Child Theme
 * @author Emad Issa
 * @link https://www.emadissa.com
 */

/**
 * Child Theme constants
 * You can change below constants
 */

// white label

define('WHITE_LABEL', false);

/**
 * Enqueue Styles
 */

function mfnch_enqueue_styles()
{
	// enqueue the parent stylesheet
	// however we do not need this if it is empty
	// wp_enqueue_style('parent-style', get_template_directory_uri() .'/style.css');

	// enqueue the parent RTL stylesheet

	if (is_rtl()) {
		wp_enqueue_style('mfn-rtl', get_template_directory_uri() . '/rtl.css');
	}

	// enqueue the child stylesheet

	wp_dequeue_style('style');
	wp_enqueue_style('style', get_stylesheet_directory_uri() . '/style.css');
}
add_action('wp_enqueue_scripts', 'mfnch_enqueue_styles', 101);

/**
 * Load Textdomain
 */

function mfnch_textdomain()
{
	load_child_theme_textdomain('betheme', get_stylesheet_directory() . '/languages');
	load_child_theme_textdomain('mfn-opts', get_stylesheet_directory() . '/languages');
}
add_action('after_setup_theme', 'mfnch_textdomain');
add_filter('get_custom_logo', 'change_logo_class');


function change_logo_class($html)
{

	$html = str_replace('custom-logo', 'navbar-brand ', $html);


	return $html;
}
// Function that will return our Wordpress menu
function print_menu_shortcode($atts, $content = null)
{
	extract(shortcode_atts(array('name' => null, 'class' => null), $atts));
	return wp_nav_menu(array('menu' => $name, 'menu_class' => 'myclass', 'echo' => true));
}

add_shortcode('menu', 'print_menu_shortcode');
add_filter( 'wp_insert_post_data' , 'filter_post_data' , '99', 2 );

function filter_post_data( $data , $postarr ) {
	$menu_x = "";
	$logo_x = get_custom_logo();
	foreach(wp_get_nav_menu_items("legend-home") as $mneu_item) { 
		$menu_x .= '<a href="'.$mneu_item->url.'" class="list-group-item list-group-item-action">'.$mneu_item->title.'</a>';
	}
	$data['post_content']= str_replace("[[MENU]]",$menu_x,$data['post_content']);
	$data['post_content']= str_replace("[[LOGO]]",$logo_x,$data['post_content']);

    return $data;
}