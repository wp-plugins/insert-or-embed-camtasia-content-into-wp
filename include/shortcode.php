<?php
#shortcode handler

function camtasia_iframe_handler($attr,$content)
{
$opt=get_camtasia_embeder_options();
$cbox_themes=camtasia_embeder_get_colorbox_themes();
//echo "<pre>"; print_r( $opt); echo "</pre>";
$link_text='<img src="'.WP_camtasia_EMBEDER_PLUGIN_URL.'launch_presentation.gif" alt="Launch Presentation" />'; #a button image, will be reset if short have link_text option
extract($attr); #http://php.net/manual/en/function.extract.php
if( ! isset($width) ) {
$width = '80%';
}
if( ! isset($height) ) {
$height = '80%';
}
if( ! isset($border) ) {
$border= '0';
}
if(isset($button) && ""!=trim($button))
{
$link_text='<img src="'.$button.'" alt="Launch Presentation" />';
}

		#creating content to send
		if($type==""){$type="iframe";}
			switch($type)
			{
			  case 'iframe':
			  {
			  $return_content= "<iframe src='$src' width='$width' height='$height' frameborder='$border'></iframe>";
			  $href=$src;
			  break;
			  }
			  case 'lightbox':
			  {
				  if($opt["lightbox_script"]=="nivo_lightbox")
				  {
				  $return_content= '<a class="nivo_lightbox_iframe" data-lightbox-type="iframe" title="'.$title.'" href="'.$href.'">'.$link_text.'</a>';
				  }
				  else
				  {
				  // try to get mp4 dimensions
				  //require( ABSPATH . WPINC . '/ID3/getid3.php' );
				  //$getID3 = new getID3;
				  //$ThisFileInfo = $getID3->analyze($href);
				  //"<pre>"; print_r( $ThisFileInfo); echo "</pre>";
				$media_dims = '';
				$media_height = '';
				$media_width = '';
				//$post = $href;
				// if ( isset( $entryName['width'], $entryName['height'] ) )
				global $post;

				if(isset($href['height']) || isset($href['width']))
				{
					$media_dims .= "<span id='media-dims-$post->ID'>{$href['width']}&nbsp;&times;&nbsp;{$href['height']}</span> ";
					$media_height = $href['height'];
					$media_width = $href['width'];
				}

				/** This filter is documented in wp-admin/includes/media.php */
				$media_dims = apply_filters( 'media_meta', $media_dims, $post );
				  //echo "<pre>"; print_r( $cbox_themes); echo "</pre>";
				  if(isset($colorbox_theme) && $colorbox_theme != "")
				  {
				  	if(array_key_exists($colorbox_theme, $cbox_themes)){ global $camtasia_embeder_colorbox_theme;$camtasia_embeder_colorbox_theme=$colorbox_theme;}}
				  		$return_content = '<a class="colorbox_iframe"';
				  		if(isset($title))
				  		{
				  			$return_content .= ' title="'.$title.'"';
				  		}
				  		$return_content .= ' href="'.$href.'">'.$link_text.'</a>';
				  }
				  if(isset($size_opt)){global $camtasia_embeder_size_opt; $camtasia_embeder_size_opt=$size_opt;}
				  if(isset($width) && isset($height)){global $camtasia_embeder_width;$camtasia_embeder_width=$width;global $camtasia_embeder_height;$camtasia_embeder_height=$height; }
				  if(isset($scrollbar) && $scrollbar=="no"){global $camtasia_embeder_scrollbar; $camtasia_embeder_scrollbar="no";}


			  break;
			  }
			  case 'open_link_in_new_window':
			  {
			  $return_content= '<a target="_blank" href="'.$href.'">'.$link_text.'</a>';
			  break;
			  }
			  case 'open_link_in_same_window':
			  {
			  $return_content= '<a href="'.$href.'">'.$link_text.'</a>';
			  break;
			  }

			}// end switch($type)


	#return
	return $return_content;

}

add_shortcode( 'camtasia_iframe_loader', 'camtasia_iframe_handler' );
?>
