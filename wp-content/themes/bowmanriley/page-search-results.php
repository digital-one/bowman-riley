<?php get_header() ?>

 <main id="page-wrap" role="main">
<!-- our story section -->
<section id="downloads" class="section fixed">
<div class="main column width-45-pct" role="main">
 <h1>SEARCH RESULTS</h1>
 <?php get_template_part('includes/secondary-nav') ?>
</div>
<aside class="beta column width-55-pct">
  <div class="inner">
  
<?php
    if ( isset( $_REQUEST[ 'search' ] ) ) {
        // run search query
        $search = $_REQUEST['search'];
      $args = array(
        'post_type' => 'page',
        's' => $search
		);
query_posts($args);

 if ( have_posts() ):
?>
<ul id="post-list">
	<?php
 	while ( have_posts() ) :
	the_post(); 
?>
<li><a href="<?php the_permalink() ?>" class="push-link"><h3><?php the_title() ?></h3><?php the_excerpt() ?>
<span class="more">More</span>
</a></li>
<?php
endwhile;
?>
</ul>
<?php
endif;
}
?>
</div>
</aside>
</section>
</main>
<?php get_footer() ?>