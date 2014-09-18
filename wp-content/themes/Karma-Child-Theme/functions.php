<?php 

function remove_more_jump_link($link) { 
$offset = strpos($link, '#more-');
if ($offset) {
$end = strpos($link, '"',$offset);
}
if ($end) {
$link = substr_replace($link, '', $offset, $end-$offset);
}
return $link;
}
add_filter('the_content_more_link', 'remove_more_jump_link');

/**
 * Use to generate image for portfolio page templates.
 * 
 * @since 2.3
 *
 * @param string $image_src, contains image url
 * @param int $image_width, contains width of image
 * @param int $height_height, contains height of image.
 * @param string $linkpost, contains url of post link
 * @param string $portfolio_full, contains url link for lightbox, can be videos too.
 * @param string $posttitle, image title attribute.
 * @paran $zoon_image_extension, for constructing zoom image according to size.
 * @return string $html, output of image and its lightbox or link.
 */

function truethemes_generate_portfolio_image_smc($image_src,$image_width,$image_height,$linkpost,$portfolio_full,$phototitle,$zoom_image_extension){

//Allow plugins/themes to override this layout.
//refer to http://codex.wordpress.org/Function_Reference/add_filter for usage
$html = apply_filters('truethemes_generate_portfolio_image_filter','',$image_src,$image_width,$image_height,$linkpost,$portfolio_full,$phototitle,$zoom_image_extension);
if ( $html != '' ){
	return $html;
}

		
//began normal layout		

if(empty($linkpost)){
//regular portfolio item.

$html .= "<a href='$portfolio_full' class='attachment-fadeIn' data-gal='prettyPhoto[gal]' title='$phototitle'>";

}else{
//portfolio that links to url.

$html .= "<a href='$linkpost' class='attachment-fadeIn' title='$phototitle'>";

}

if(empty($linkpost)){
//regular portfolio item, we show zoom image.

$template_directory_uri = get_template_directory_uri();

global $post;
$title = get_the_title($post->ID);

$html .="<img src='$template_directory_uri/images/_global/img-zoom-$zoom_image_extension.png' style='position:absolute; display: none;' alt='$title' />";

}else{
//post link to url, we show arrow image.

$template_directory_uri = get_template_directory_uri();

global $post;
$title = get_the_title($post->ID);

$html .="<img src='/wp-content/themes/Karma-Child-Theme/images/img-zoom-link-3_smc.png' style='position:absolute; display: none;' alt='$title' />";

}

//this is the actual image.
$html .= "<img src='$image_src' width='$image_width' height='$image_height' alt='$title' />";


//there is a link tag, we have to end it.
$html .='</a>';


//that's all!
return $html;

}

/**
 * Use to generate image for content-blog.php content-blog-single.php and archive.php
 * 
 * @since 2.3
 *
 * @param string $image_src, contains image url
 * @param int $image_width, contains width of image
 * @param int $height_height, contains height of image.
 * @param string $blog_image_frame, determine whether to use css class post_thumb_shadow_load or post_thumb_load for div.
 * @param string $linkpost, contains url of link to external site.
 * @param string $permalink, contains post permalink
 * @return string $html, output of image or video.
 */
 
 
function truethemes_generate_blog_image_smc($image_src,$image_width,$image_height,$blog_image_frame,$linkpost,$permalink,$video_url){

//Allow plugins/themes to override this layout.
//refer to http://codex.wordpress.org/Function_Reference/add_filter for usage
$html = apply_filters('truethemes_generate_blog_image_filter','',$image_src,$image_width,$image_height,$blog_image_frame,$linkpost,$permalink,$video_url);
if ( $html != '' ){
	return $html;
}


//began normal layout.

if(!empty($image_src)): //there is either post thumbnail of external image


$html .= '<div class="modern_img_frame_smc modern_banner_small_smc">';

//determine which div css class to use.
if($blog_image_frame == 'shadow'){
$html.= '<div class="post_thumb_shadow_load_smc">';
}else{
$html.= '<div class="modern_preload_small_smc">';
} 

//determine link to post or link to external site.
//added checks for single.php @since version 2.6
if ($linkpost == ''){
    //there is no link to external url
	if(!is_single()){
	//if not single we link to post
	$truethemeslink = $permalink;
	}else{
	//else we link to nothing;
	$truethemeslink = '';
	}
	
}elseif($linkpost!=''){
    //there is an external url link, we assign it.
	$truethemeslink = $linkpost;
	
}else{
    //do nothing, this is for closing the if statement only.
}

//get post title for image title. 
global $post;
$title = get_the_title($post->ID);

if(!empty($truethemeslink))://show image link only if there is a link assigned.
//start link
$html .= "<a href='$truethemeslink' title='$title' class='attachment-fadeIn'>";
endif;

//image
$html .= "<img src='$image_src' width='$image_width' height='$image_height' alt='$title' />";

if(!empty($truethemeslink)): //show image link only if there is a link assigned.
//close link
$html.= "</a>";
endif;

//close divs
$html .= "</div><!-- end post_thumb_load -->";
$html .= "</div><!-- end post_thumb -->";


else: // no featured image, we show featured video or nothing at all!

//show video embed only if there is featured video url.
if(!empty($video_url)){
$embed_video = apply_filters('the_content', "[embed width=\"538\" height=\"418\"]".$video_url."[/embed]");
$html .= $embed_video;
} 

endif;


//that's all!
return $html;

}

/**
 * Use to generate image for content-blog.php content-blog-single.php and archive.php
 * 
 * @since 2.3
 *
 * @param string $image_src, contains image url
 * @param int $image_width, contains width of image
 * @param int $height_height, contains height of image.
 * @param string $blog_image_frame, determine whether to use css class post_thumb_shadow_load or post_thumb_load for div.
 * @param string $linkpost, contains url of link to external site.
 * @param string $permalink, contains post permalink
 * @return string $html, output of image or video.
 */
 
 
function truethemes_generate_blog_image_smc2($image_src,$image_width,$image_height,$blog_image_frame,$linkpost,$permalink,$video_url){

//Allow plugins/themes to override this layout.
//refer to http://codex.wordpress.org/Function_Reference/add_filter for usage
$html = apply_filters('truethemes_generate_blog_image_filter','',$image_src,$image_width,$image_height,$blog_image_frame,$linkpost,$permalink,$video_url);
if ( $html != '' ){
	return $html;
}


//began normal layout.

if(!empty($image_src)): //there is either post thumbnail of external image


$html .= '<div class="modern_img_frame_smc2 modern_banner_small_smc2">';

//determine which div css class to use.
if($blog_image_frame == 'shadow'){
$html.= '<div class="post_thumb_shadow_load_smc2">';
}else{
$html.= '<div class="modern_preload_small_smc2">';
} 

//determine link to post or link to external site.
//added checks for single.php @since version 2.6
if ($linkpost == ''){
    //there is no link to external url
	if(!is_single()){
	//if not single we link to post
	$truethemeslink = $permalink;
	}else{
	//else we link to nothing;
	$truethemeslink = '';
	}
	
}elseif($linkpost!=''){
    //there is an external url link, we assign it.
	$truethemeslink = $linkpost;
	
}else{
    //do nothing, this is for closing the if statement only.
}

//get post title for image title. 
global $post;
$title = get_the_title($post->ID);

if(!empty($truethemeslink))://show image link only if there is a link assigned.
//start link
$html .= "<a href='$truethemeslink' title='$title' class='attachment-fadeIn'>";
endif;

//image
$html .= "<img src='$image_src' width='$image_width' height='$image_height' alt='$title' />";

if(!empty($truethemeslink)): //show image link only if there is a link assigned.
//close link
$html.= "</a>";
endif;

//close divs
$html .= "</div><!-- end post_thumb_load -->";
$html .= "</div><!-- end post_thumb -->";


else: // no featured image, we show featured video or nothing at all!

//show video embed only if there is featured video url.
if(!empty($video_url)){
$embed_video = apply_filters('the_content', "[embed width=\"538\" height=\"418\"]".$video_url."[/embed]");
$html .= $embed_video;
} 

endif;


//that's all!
return $html;

}


register_nav_menu('sub-menu', 'sub-menu');

function custom_excerpt_length( $length ) {
	return 25;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


?>