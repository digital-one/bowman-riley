<?php get_template_part('header'); ?> 

<!-- content -->
<div id="content">
   
<div class="container clearfix">
<div id="breadcrumbs">You are here: <a href="">SHSC Home</a> > Search</div>
	<!-- left column -->
<aside class="four columns first">
<?php get_sidebar('search') ?>
</aside>
<!-- /left column -->
<!-- right column -->
<div id="main" class="twelve columns" role="main">
<?php
$results = $wp_query->found_posts;
$search_query = get_search_query();
 ?>
<article class="tile intro"><div class="inner"><h3 class="label large">Search Results</h3>
<?php  if($results): ?>
<p><?php echo $results ?> results were found matching your search term '<?php echo $search_query?>'</p>
<?php else: ?>matching your search term '<?php echo $search_query?>'</p>
    <?php endif; ?>
</div><div class="tile-shadow"><div class="shadow-inner">&nbsp;</div></div></article>
<?php
if (have_posts()) : ?>
<?php while ( have_posts() ) : the_post();
switch($post->post_type){
    case 'page':
    $label = 'Visit page';
    break;
    case 'service':
    $label = 'find out more about this service';
    break;
    case 'news':
    $label = 'Read article';
    break;
    case 'event':
    $label = 'Find out more about this event';
    break;
}
?>
<!-- item -->
<article class="tile hover"><a href="<?php the_permalink()?>" class="inner"><h3 class="label large"><?php the_title()?></h3><p><?php the_excerpt() ?></p><p><span class="button"><?php echo $label ?></span></p></a><div class="tile-shadow"><div class="shadow-inner">&nbsp;</div></div></article>
<!-- /item -->
<?php endwhile ?>
<?php else: ?>
<article class="tile"><div class="inner"><p>No services currently available matching your search criteria</div></article>
<?php endif ?>

</div>
<!-- /right column -->
	
</div>
<!-- /wrapper -->
</div>
<!-- /content -->
<?php get_template_part('footer'); ?> 
</body>
</html>