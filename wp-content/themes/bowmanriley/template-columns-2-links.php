<?php /* Template Name: Column layout with 2 links */ ?>
<?php get_header() ?>
  <main id="page-wrap" role="main">
    <!--overview-->
<section class="section <?php echo get_field('theme',$post->ID)?>"  data-title="<?php wp_title()?>" data-anchor="<?php echo $post->post_name?>">
<div class="main column width-45-pct" role="main">
  <div class="main-content">
<?php echo $post->post_content ?>
</div>
<?php get_template_part('includes/secondary-nav') ?>
<?php if($post->post_parent==0): ?>
<div class="arrow-divide"><a href=""><img data-no-retina src="<?php echo get_template_directory_uri(); ?>/images/arrow-down.svg" /></a></div>
<?php endif ?>
</div>
<aside class="beta column width-55-pct">
  <div class="inner">
  <div class="column width-two-thirds gutter masked bg-fill-cell" style="background-image:url('<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>');">
  </div>
  <div class="column width-one-third masked" style="background-color:#fff;">
    <div class="row height-40-pct gutter">
        <?php
switch(get_field('link_1_type')){
  case 'page':
  $val = get_field('link_1_label',$post->ID);
  $label = !empty($val) ? get_field('link_1_label',$post->ID) : $page->post_title;
  $permalink = get_field('link_1_page',$post->ID);
  $arrow_direction = 'right';
  $target = "_parent";
  break;
  case 'case-study-category':
  $val = get_field('link_1_label',$post->ID);
  $label = !empty($val) ? get_field('link_1_label',$post->ID) : $page->post_title;
  $term = get_field('link_1_case_study_category',$post->ID);
  $permalink = get_term_link($term);
  $arrow_direction = 'right';
  $target = "_parent";
  break;
  case 'people-category':
  $val = get_field('link_1_label',$post->ID);
  $label = !empty($val) ? get_field('link_1_label',$post->ID) : $page->post_title;
  $term = get_field('link_1_people_category',$post->ID);
  $permalink = get_term_link($term);
  $arrow_direction = 'right';
  $target = "_parent";
  break;
  case 'anchor':
  $post_id = url_to_postid(get_field('link_1_anchor',$post->ID));
  $page = get_post($post_id);
  $val = get_field('link_1_label',$post->ID);
  $label = !empty($val) ? get_field('link_1_label',$post->ID) : $page->post_title;
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
      <a href="<?php echo $permalink ?>" target="<?php echo $target ?>" class="push-link fit-cell <?php echo get_field('theme')?> <?php echo $arrow_direction ?>"><?php echo $label ?></a>

    </div>
     <div class="row height-60-pct">
        <?php
switch(get_field('link_2_type')){
  case 'page':
  $val = get_field('link_2_label',$post->ID);
  $label = !empty($val) ? get_field('link_2_label',$post->ID) : $page->post_title;
  $permalink = get_field('link_2_page',$post->ID);
  $arrow_direction = 'right';
  $target = "_parent";
  break;
  case 'case-study-category':
  $val = get_field('link_2_label',$post->ID);
  $label = !empty($val) ? get_field('link_2_label',$post->ID) : $page->post_title;
  $term = get_field('link_2_case_study_category',$post->ID);
  $permalink = get_term_link($term);
  $arrow_direction = 'right';
  $target = "_parent";
  break;
  case 'people-category':
  $val = get_field('link_2_label',$post->ID);
  $label = !empty($val) ? get_field('link_2_label',$post->ID) : $page->post_title;
  $term = get_field('link_2_people_category',$post->ID);
  $permalink = get_term_link($term);
  $arrow_direction = 'right';
  $target = "_parent";
  break;
  case 'anchor':
  $post_id = url_to_postid(get_field('link_2_anchor',$post->ID));
  $page = get_post($post_id);
  $val =get_field('link_2_label',$post->ID);
  $label = !empty($val) ? get_field('link_2_label',$post->ID) : $page->post_title;
  if($page->post_parent==0):
    $permalink = get_permalink($page->ID); //if the target page is the parent page
  else:
    $permalink = get_permalink($page->parent); //if the target page is a child page
  endif;
  $permalink = $permalink.'#'.$page->post_name;
  $arrow_direction = get_field('link_2_arrow_direction',$post->ID);
  $target = "_parent";
  break;
  case 'download':
  $permalink = get_field('link_2_file',$post->ID);
  $label = get_field('link_2_label',$post->ID);
  $arrow_direction = 'down';
  $target = "_blank";
  break;
}
?>
<a href="<?php echo $permalink?>" target="<?php echo $target ?>" class="push-link fit-cell grey <?php echo $arrow_direction ?>"><?php echo $label ?></a>

    </div>
  </div>
</div>
</aside>
</section>
  <!--/overview-->
</main>
<?php get_footer() ?>