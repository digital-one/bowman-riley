<?php /* Template Name: Row layout with 2 links */ ?>
<?php get_header() ?>
 <main id="page-wrap" role="main">
  <!--overview-->
<section class="section <?php echo get_field('theme',$post->ID)?>" data-anchor="<?php echo $post->post_name?>">
<div class="main column width-45-pct" role="main">
	<div class="main-content">
<?php echo $post->post_content ?>
</div>
<?php get_template_part('includes/secondary-nav') ?>
<?php
//$children = get_pages("child_of=$post->post_parent&parent=0&sort_column=menu_order&sort_order=DESC");
$page_id = $post->ID;
if($post->post_parent!=0):
$page_id = $post->post_parent;
endif;
$args = array(
     'child_of' => $page_id,
     'parent' => $page_id,
     'sort_order' => 'DESC',
     'sort_column' => 'menu_order'
     );

$children = get_pages($args);
$isSingle=0;
$lastchild = sizeof($children)>0 ? $children[0]->ID : 0;
$isLastChild = $post->ID != $lastchild ? 0 : 1;
if($post->post_parent==0 and count($children)<1) $isSingle=1;

if(!$isLastChild and !$isSingle):
?>
<div class="arrow-divide"><a href=""><img data-no-retina src="<?php echo get_template_directory_uri(); ?>/images/arrow-down.svg" /></a></div>
<?php endif ?>
</div>
<aside class="beta column width-55-pct">
  <div class="inner">
  	  	<?php 
  	  	$case_study = get_field('case_study',$post->ID);
  	  	if(!empty($case_study)):
$cs = get_field('case_study',$post->ID);
$image_id = $cs->ID;
$has_case_study = true;
else:
$image_id = $post->ID;
$has_case_study = false;
	endif;
	?>
	<?php
if(get_field('image_slider',$post->ID)):
	?>
<div class="row height-60-pct gutter slider">
	<?php while(the_repeater_field('image_slider')):  ?>
	<?php list($src,$w,$h) = wp_get_attachment_image_src(get_sub_field('slider_image'), 'full'); ?>
<div class="image-slide" class="bg-fill-cell" style="background-image:url('<?php echo $src ?>');"></div>
<?php endwhile ?>
</div>
<?php else: ?>
  <div class="row height-60-pct gutter masked bg-fill-cell" style="background-image:url('<?php echo wp_get_attachment_url(get_post_thumbnail_id($image_id)); ?>');">
  <?php if($has_case_study):?>
  <a href="<?php echo get_permalink($cs->ID)?>" class="main overlay push-link <?php echo get_field('theme',$post->ID)?>">
<ul class="case-study-meta">
<li class="client"><?php echo $cs->post_title?></li>
<li class="location"><?php echo get_field('location',$cs->ID) ?></li>
</ul>
<p><?php echo $cs->post_excerpt ?></p>
  </a>
<?php endif ?>
</div>
<?php endif ?>
  <div class="row height-40-pct">
 
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
	case 'image':
	list($src,$w,$h) = wp_get_attachment_image_src(get_field('link_1_image',$post->ID), 'full');
	break;
	case 'logo':
	$src = get_field('link_1_logo',$post->ID);
	$box_colour = get_field('link_1_logo_box_colour',$post->ID);
	break;
}
?>
 	<?php if(get_field('link_1_type')=='image'): ?>
 	 <div class="column width-40-pct bg-fill-cell" style="background-image:url('<?php echo $src; ?>');"></div>
 	<?php elseif(get_field('link_1_type')=='logo'): ?>
 	<div class="column width-40-pct logo <?php echo $box_colour ?>"><img src="<?php echo $src ?>" /></div>
 <?php else: ?>
  <div class="column width-40-pct">
 	<a href="<?php echo $permalink?>" target="<?php echo $target?>" class="<?php echo $class ?> fit-cell <?php echo $arrow_direction?> grey"><?php echo $label ?></a>
 </div>
<?php endif ?>

 	<?php
switch(get_field('link_2_type')){
	case 'page':
	$val = get_field('link_2_label',$post->ID);
	$label = !empty($val) ? get_field('link_2_label',$post->ID) : $page->post_title;
	$permalink = get_field('link_2_page',$post->ID);
	$arrow_direction = 'right';
	$target = "_parent";
	$form_id = '';
	break;
	case 'case-study-category':
	$val = get_field('link_2_label',$post->ID);
	$label = !empty($val) ? get_field('link_2_label',$post->ID) : $page->post_title;
	$term = get_field('link_2_case_study_category',$post->ID);
	$permalink = get_term_link($term);
	$arrow_direction = 'right';
	$target = "_parent";
	$form_id = '';
	break;
	case 'people-category':
	$val = get_field('link_2_label',$post->ID);
	$label = !empty($val) ? get_field('link_2_label',$post->ID) : $page->post_title;
	$term = get_field('link_2_people_category',$post->ID);
	$permalink = get_term_link($term);
	$arrow_direction = 'right';
	$target = "_parent";
	$form_id = '';
	break;
	case 'anchor':
	$post_id = url_to_postid(get_field('link_2_anchor',$post->ID));
	$page = get_post($post_id);
	$val = get_field('link_2_label',$post->ID);
	$label = !empty($val) ? get_field('link_2_label',$post->ID) : $page->post_title;
	if($page->post_parent==0):
		$permalink = get_permalink($page->ID); //if the target page is the parent page
	else:
		$permalink = get_permalink($page->parent); //if the target page is a child page
	endif;
	$permalink = $permalink.'#'.$page->post_name;
	$arrow_direction = get_field('link_2_arrow_direction',$post->ID);
	$target = "_parent";
	$form_id = '';
	break;
	case 'download':
	$form_id = '';
	$permalink = get_field('link_2_file',$post->ID);
	$label = get_field('link_2_label',$post->ID);
	$arrow_direction = 'down';
	$target = "_blank";
	$action="";
	break;
	case 'form':
	$form_id = get_field('link_2_form',$post->ID);
	$gform = get_field('link_2_form',$post->ID);
	//print_r($gform);
	$permalink = "#fancyboxID-".$gform->id;
	$label = get_field('link_2_label',$post->ID);
	$arrow_direction = 'right';
	$target = "_blank";
	break;
	case 'image':
	list($src,$w,$h) = wp_get_attachment_image_src(get_field('link_2_image',$post->ID), 'full');
	break;
	case 'logo':
	$src = get_field('link_2_logo',$post->ID);
	$box_colour = get_field('link_2_logo_box_colour',$post->ID);
	break;
}
?>
<?php $class = !empty($form_id) ? 'fancybox' : 'push-link' ?>

<?php if(get_field('link_2_type')=='image'): ?>
 	 <div class="column width-60-pct bg-fill-cell" style="background-image:url('<?php echo $src; ?>');"></div>
 	<?php elseif(get_field('link_2_type')=='logo'): ?>
 	<div class="column width-40-pct logo <?php echo $box_colour ?>"><img src="<?php echo $src ?>" /></div>
 <?php else: ?>
  <div class="column width-60-pct">
 	<a href="<?php echo $permalink?>" target="<?php echo $target?>" class="<?php echo $class ?> fit-cell <?php echo $arrow_direction?> grey"><?php echo $label ?></a>
 </div>
<?php endif ?>
  </div>
</div>
</aside>
</section>
  <!--/overview-->
</main>
<?php get_footer() ?>