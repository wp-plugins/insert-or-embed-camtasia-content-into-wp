<?php
/*
Plugin Name: Insert or Embed Camtasia Content into Wordpress Trial
Plugin URI: http://www.elearningplugins.com
Description: Quickly embed or insert Camtasia content into a post or page. Built for Camtasia, but works with any MP4 file!
Version: 1.0
Author: elearningplugins.com
Author URI: http://www.elearningplugins.com
*/

define ( 'WP_camtasia_EMBEDER_PLUGIN_DIR', dirname(__FILE__)); // Plugin Directory
define ( 'WP_camtasia_EMBEDER_PLUGIN_URL', plugin_dir_url(__FILE__)); // Plugin URL (for http requests)

global $wpdb;
require_once("settings_file.php");
require_once("functions.php");
include_once(WP_camtasia_EMBEDER_PLUGIN_DIR."/include/shortcode.php");





register_activation_hook(__FILE__,'camtasia_embeder_install'); 


register_deactivation_hook( __FILE__, 'camtasia_embeder_remove' );

function camtasia_embeder_install() {

@mkdir(camtasia_getUploadsPath());
@file_put_contents(camtasia_getUploadsPath()."index.html","");

}
function camtasia_embeder_remove() {

$camtasia_upload_path=camtasia_getUploadsPath();
if(file_exists($camtasia_upload_path."/.htaccess")){unlink($camtasia_upload_path."/.htaccess");}

}


add_action( 'wp_ajax_camtasia_upload', 'wp_ajax_camtasia_upload' );
add_action( 'wp_ajax_camtasia_del_dir', 'wp_ajax_camtasia_del_dir' );
add_action( 'wp_ajax_camtasia_rename_dir', 'wp_ajax_camtasia_rename_dir');


function wp_camtasia_media_button() {
	$wp_camtasia_media_button_image = camtasia_getPluginUrl().'camtasia.png';
	echo '<a href="media-upload.php?type=camtasia_upload&TB_iframe=true&tab=upload" class="thickbox">
  <img src="'.$wp_camtasia_media_button_image.'"  width=15 height=15 /></a>';
}

function media_upload_camtasia_form()
{
	camtasia_print_tabs();
	echo '<div class="wrap" style="margin-left:20px;  margin-bottom:50px;">';
		echo '<div id="icon-upload" class="icon32"><br></div><h2>Upload File</h2>';
		camtasia_print_upload();
	echo "</div>";

}
function media_upload_camtasia_content()
{
	camtasia_print_tabs();
	echo '<div class="wrap" style="margin-left:20px;  margin-bottom:50px;">';
		echo '<div id="icon-upload" class="icon32"><br></div><h2>Camtasia Content Library</h2>';
		camtasia_printInsertForm();
	echo "</div>";
}



function media_upload_camtasia()
{
	wp_iframe( "media_upload_camtasia_content" );
}

function media_upload_camtasia_upload()
{
	if ( isset( $_REQUEST[ 'tab' ] ) && strstr( $_REQUEST[ 'tab' ], 'camtasia') )
	{
	wp_iframe( "media_upload_camtasia_content" );
	}
	else
	{
	wp_iframe( "media_upload_camtasia_form" );
	}
}

function camtasia_print_tabs()
{

	
	function camtasia_tabs($tabs) 
	{
	$newtab1 = array('upload' => 'Upload File');
	$newtab2 = array('camtasia' => 'Content Library');
	return array_merge($newtab1,$newtab2);
	}
add_filter('media_upload_tabs', 'camtasia_tabs');
media_upload_header();

}


add_action('media_upload_camtasia_upload','media_upload_camtasia_upload');
add_action('media_upload_camtasia','media_upload_camtasia');
add_action( 'media_buttons', 'wp_camtasia_media_button',100);


/* added by oneTarek --*/
//add_action('wp_head','camtasia_embeder_wp_head');
add_action('wp_footer','camtasia_embeder_wp_head');

function camtasia_embeder_enqueue_script() {
	wp_enqueue_script('jquery');
}    
 
add_action('wp_enqueue_scripts', 'camtasia_embeder_enqueue_script');

include_once(WP_camtasia_EMBEDER_PLUGIN_DIR."/admin_page.php");



?>