<div id="sub_nav">
<?php dynamic_sidebar("Toolbar - Left Side"); ?></div><!-- end sidebar -->

<?php
function removeEmptyTags($html_replace)
{
$pattern = "/<[^\/>]*>([\s]?)*<\/[^>]*>/";
return preg_replace($pattern, '', $html_replace);
}
?>