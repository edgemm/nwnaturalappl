<div class="portfolio_layout">

<?php
remove_filter('pre_get_posts','wploop_exclude');
$portfolio_count = get_post_meta($post->ID, "_sc_port_count_value", $single = true);
$posts_p_p = stripslashes($portfolio_count);
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$category_id = '32';
$query_string ="posts_per_page=$posts_p_p&cat=$category_id&paged=$paged&order=ASC";
query_posts($query_string);



$count = 0; $col = 0;

if (have_posts()) : while (have_posts()) : the_post();

$count++; $col ++; $mod = ($count % 4 == 0) ? 0 : 4 - $count % 4;




?>

<?php

//retrieve all post meta of posts in the loop.
 
$linkpost = get_permalink( $id );
$portfolio_full = get_post_meta($post->ID, "_portimage_full_value", $single = true);
$phototitle = get_post_meta($post->ID, "_portimage_desc_value", $single = true);
$external_image_url = get_post_meta($post->ID,'truethemes_external_image_url',true);

//prepare to get image
$thumb = get_post_thumbnail_id();
$image_width = 190;
$image_height = 111;

//use truethemes image croping script, function moved to truethemes_framework/global/basic.php
$image_src = truethemes_crop_image($thumb,$external_image_url,$image_width,$image_height);

?>
 
<div class="one_fourth<?php if($col == 4){  echo '_last'; $col = 0; } ?>">

<div class="portfolio_content_top_four">
<div class="port_img_four">

<?php if(!empty($image_src)): //there is either post thumbnail of external image ?>

<div class="preload preload_four">


<?php 
//function truethemes_generate_portfolio_image() in basic.php
$html = truethemes_generate_portfolio_image($image_src,$image_width,$image_height,$linkpost,$portfolio_full,$phototitle,'4'); 

echo $html;

?>


</div><!-- end preload_four -->

<?php endif; ?>

</div><!-- end port_img_four -->
</div><!-- end portfolio_content_top_four -->
    
	
<?php $permalink = get_permalink( $id ); ?>    
	
<div class="portfolio_content">
<h3><?php the_title(); ?></h3>
<?php the_excerpt(); ?><a href="<?php echo $permalink ?>">Read More →</a>
    
    </div><!-- end portfolio_content -->

</div><!-- end one_fourth -->


<?php if ( $mod == 0 ){ echo '<br class="clear" />';}endwhile; endif;

// Reset Query
wp_reset_query();

?>
</div>