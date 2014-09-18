<?php get_header(); ?>
</div><!-- header-area -->
</div><!-- end rays -->
</div><!-- end header-holder -->
</div><!-- end header -->

<?php truethemes_before_main_hook();// action hook, see truethemes_framework/global/hooks.php ?>

<div id="main">
<?php
$ka_404title = get_option('ka_404title');
$ka_404message = get_option('ka_404message');
$ka_404sitemap = get_option('ka_404sitemap');
$ka_searchbar = get_option('ka_searchbar');
$ka_crumbs = get_option('ka_crumbs');
?>
<div class="main-area">
<div class="tools">
<div class="holder">
<div class="frame">

<?php truethemes_before_article_title_hook();// action hook, see truethemes_framework/global/hooks.php ?>

<h1><?php echo $ka_404title; ?></h1>
<?php if ($ka_searchbar == "true"){get_template_part('searchform','childtheme');} else {} ?>
<?php if ($ka_crumbs == "true"){ $bc = new simple_breadcrumb;} else {} ?>


<?php truethemes_after_searchform_hook();// action hook, see truethemes_framework/global/hooks.php ?>


</div><!-- end frame -->
</div><!-- end holder -->
</div><!-- end tools -->



<div class="main-holder">
<div id="content" class="content_full_width">
<div class="four_error">
<div class="four_message">
<h1 class="four_o_four"><?php echo $ka_404title;?></h1>
<ul>
  <li id="menu-item-11" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-11"><a href="http://nwnaturalappliances.com/" >Home</a></li>
<li id="menu-item-153" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-153"><a href="http://nwnaturalappliances.com/about-us/" >About Us</a></li>
<li id="menu-item-154" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-154"><a href="http://nwnaturalappliances.com/contact/" >Contact</a></li>
<li id="menu-item-154" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-154"><a href="http://nwnaturalappliances.com/sitemap_index.xml" >Sitemap</a></li>
  </ul></div><!-- end four_message -->
</div><!-- end four_error -->

</div><!-- end content -->
</div><!-- end main-holder -->
</div><!-- main-area -->



<?php get_footer(); ?>