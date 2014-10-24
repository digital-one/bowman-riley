<?php get_header() ?>
<main id="page-wrap" role="main">
<!-- our people -->
<section id="people" class="section" data-anchor="our-people">
<div class="main column width-45-pct" role="main">
 <?php echo $post->post_content ?>
<?php get_template_part('includes/secondary-nav-people') ?>
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
    <div class="row twice-height">
	<?php
switch(get_field('link_1_type')){
	case 'page':
	$label = !empty(get_field('link_1_label',$post->ID)) ? get_field('link_1_label',$post->ID) : $page->post_title;
	$permalink = get_field('link_1_page',$post->ID);
	$arrow_direction = 'right';
	$target = "_parent";
	break;
	case 'anchor':
	$post_id = url_to_postid(get_field('link_1_anchor',$post->ID));
	$page = get_post($post_id);
	$label = !empty(get_field('link_1_label',$post->ID)) ? get_field('link_1_label',$post->ID) : $page->post_title;
	if($page->post_parent==0):
		$permalink = get_permalink($page->ID); //if the target page is the parent page
	else:
		$permalink = get_permalink($page->parent); //if the target page is a child page
	endif;
	$permalink = $permalink.'#'.$page->post_name;
	$arrow_direction = get_field('link_1_arrow_direction',$post->ID);
	$target = "_parent";
	break;
	case 'download':
	$permalink = get_field('link_1_file',$post->ID);
	$label = get_field('link_1_label',$post->ID);
	$arrow_direction = 'down';
	$target = "_blank";
	break;
}
?>

    	<a href="<?php echo $permalink?>" target="<?php echo $target ?>" class="push-link fit-cell brown <?php echo $arrow_direction?>"><?php echo $label ?></a>



    </div>
     <div class="row square"><a href="<?php echo get_term_link($terms[2]->slug, $terms[2]->taxonomy);?>" class="push-link fit-cell blue"><?php echo $terms[2]->description ?></a></div>
  </div>
<?php endif ?>
</div>
</aside>
</section>
<!-- /our people -->
</main>
<?php get_footer() ?>