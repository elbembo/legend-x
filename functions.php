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
	$html = str_replace('https://www.legendegy.com/wp-content/uploads', 'https://cdn.legendegy.com', $html);


	return $html;

}
// Function that will return our Wordpress menu
function legend_menu_shortcode($atts)
{
	$nav_ele = "";
	$nav_ele .= '<nav class="main-navigation">
					<ul>';
					foreach(wp_get_nav_menu_items($atts['menu']) as $mneu_item) {
						$nav_ele .= '<li><a href="'.$mneu_item->url.'" class="list-group-item list-group-item-action"><span>'.$mneu_item->title.'</span></a></li>';
					}
	$nav_ele .= 	'</ul>
				</nav>';
  return $nav_ele;
}
add_shortcode('menu', 'legend_menu_shortcode');
function legend_logo_shortcode()
{
  return get_custom_logo();
}
add_shortcode('logo', 'legend_logo_shortcode');
add_filter( 'pre_option_upload_url_path', 'upload_url' );

function upload_url() {
    return 'https://cdn.legendegy.com';
}
update_option('upload_url_path', 'https://cdn.legendegy.com');
// function bembo_nav_menu($nav){

// 	$nav_ele = "";
// 	$nav_ele .= '<nav class="main-navigation">
// 					<ul>';

// 					foreach(wp_get_nav_menu_items($nav) as $mneu_item) { 
// 						$nav_ele .= '<li><a href="'.$mneu_item->url.'" class="list-group-item list-group-item-action">'.$mneu_item->title.'</a></li>';
// 					}
// 	$nav_ele .= 	'</ul>
// 				</nav>';
//   return $nav_ele;

// }
