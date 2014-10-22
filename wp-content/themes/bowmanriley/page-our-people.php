<?php get_header() ?>
<main id="page-wrap" role="main">
<!-- our people -->
<section id="people" class="section" data-anchor="our-people">
<div class="main column width-45-pct" role="main">
  <h1>Our People</h1>
<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>
<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>
<?php get_template_part('includes/secondary-nav') ?>
<div class="arrow-divide"><a href=""><img src="images/arrow-down.svg" /></a></div>
</div>
<aside class="beta column width-55-pct">
  <div class="inner">
  	<?php if($terms = get_terms('people_category',array('hide_empty' => 0))): ?>
  <div class="column width-two-thirds">
<div class="cell half square">
<?php  echo wp_get_attachment_image( get_field('image', $terms[0]), 'full'); ?>
</div>
<div class="cell half square"><a href="<?php echo get_term_link($terms[0]->slug, $terms[0]->taxonomy);?>" class="push-link fit-cell orange"><?php echo $terms[0]->description ?></a></div>
<div class="cell half square"><a href="<?php echo get_term_link($terms[1]->slug, $terms[1]->taxonomy);?>" class="push-link fit-cell purple"><?php echo $terms[1]->description ?></a></div>
<div class="cell half square"><?php  echo wp_get_attachment_image( get_field('image', $terms[1]), 'full'); ?></div>
<div class="cell half-height"><?php  echo wp_get_attachment_image( get_field('image', $terms[2]), 'full'); ?></div>
  </div>
  <div class="column width-one-third">
    <div class="row twice-height"><a href="http://bowmanriley.localhost/work-with-us.php" class="push-link fit-cell brown">Interested in a career of internship at Bowman Riley?</a></div>
     <div class="row square"><a href="<?php echo get_term_link($terms[2]->slug, $terms[2]->taxonomy);?>" class="push-link fit-cell blue"><?php echo $terms[2]->description ?></a></div>
  </div>
<?php endif ?>
</div>
</aside>
</section>
<!-- /our people -->
</main>
<?php get_footer() ?>