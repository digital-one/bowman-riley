<?php /* Template Name: Row layout with 3 links */ ?>
<?php get_header() ?>
<main id="page-wrap" role="main">
<!-- our story section -->
<section class="section <?php echo get_field('theme',$post->ID)?>"  data-title="<?php wp_title()?>" data-anchor="<?php echo $post->post_name?>">
<div class="main column width-45-pct" role="main">
		<div class="main-content">
<?php echo $post->post_content ?>
</div>
<?php get_template_part('includes/secondary-nav') ?>
<?php
$children = get_pages("child_of=$post->post_parent&sort_column=menu_order&sort_order=DESC");
$lastchild = $children[0];
if($post->ID != $lastchild->ID):
?>
<div class="arrow-divide"><a href=""><img data-no-retina src="<?php echo get_template_directory_uri(); ?>/images/arrow-down.svg" /></a></div>
<?php endif ?>
</div>
<aside class="beta column width-55-pct split">
  <div class="inner">
<!--top row-->

<?php 
$val = get_field('case_study',$post->ID);
if(!empty($val)):
$cs = get_field('case_study',$post->ID);
$image_id = $cs->ID;
$has_case_study = true;
else:
$image_id = $post->ID;
$has_case_study = false;
	endif;
	?>
<div class="row height-60-pct bg-fill-cell" style="background-image:url('<?php echo wp_get_attachment_url(get_post_thumbnail_id($image_id)); ?>');">
	<?php if($has_case_study): ?>
  <a href="<?php echo get_permalink($cs->ID)?>" class="main overlay <?php echo get_field('theme',$post->ID)?> push-link">
<ul class="case-study-meta">
<li class="client"><?php echo $cs->post_title?></li>
<li class="location"><?php echo get_field('location',$cs->ID) ?></li>
</ul>
<p><?php echo $cs->post_excerpt ?></p>
  </a>
<?php endif ?></div>
<!--/top row-->
<!--bottom row-->
<div class="row height-40-pct split">
  <!--left column-->
<div class="column width-40-pct">

<?php
switch(get_field('link_1_type')){
	case 'page':
	$val = get_field('link_1_label',$post->ID);
	$label = !empty($val) ? get_field('link_1_label',$post->ID) : $post->post_title;
	$permalink = get_field('link_1_page',$post->ID);
	$arrow_direction = 'right';
	$target = "_parent";
	$anchor_class="page";
	break;
	case 'case-study-category':
	$val = get_field('link_1_label',$post->ID);
	$label = !empty($val) ? get_field('link_1_label',$post->ID) : $post->post_title;
	$term = get_field('link_1_case_study_category',$post->ID);
	$permalink = get_term_link($term);
	$arrow_direction = 'right';
	$target = "_parent";
	$anchor_class="case-study-category";
	break;
	case 'people-category':
	$val = get_field('link_1_label',$post->ID);
	$label = !empty($val) ? get_field('link_1_label',$post->ID) : $post->post_title;
	$term = get_field('link_1_people_category',$post->ID);
	$permalink = get_term_link($term);
	$arrow_direction = 'right';
	$target = "_parent";
	$anchor_class="people-category";
	break;
	case 'anchor':
	$post_id = url_to_postid(get_field('link_1_anchor',$post->ID));
	$page = get_post($post_id);
	get_field('link_1_label',$post->ID);
	$label = !empty($val) ? get_field('link_1_label',$post->ID) : $post->post_title;
	//if($page->post_parent==0):
		$permalink = get_permalink($page->ID); //if the target page is the parent page
	/*else:
		$permalink = get_permalink($page->parent); //if the target page is a child page
	endif;*/
	//$permalink = $permalink.'#'.$page->post_name;
	$arrow_direction = get_field('link_1_arrow_direction',$post->ID);
	$target = "_parent";
	$anchor_class="anchor";
	break;
	case 'download':
	$permalink = get_field('link_1_file',$post->ID);
	$label = get_field('link_1_label',$post->ID);
	$arrow_direction = 'down';
	$target = "_blank";
	$anchor_class="download";
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

<?php $class = !empty($form_id) ? 'fancybox' : 'push-link' ?>
<?php if(get_field('link_1_type')=='image'): ?>
 	 <div class="row height-60-pct bg-fill-cell" style="background-image:url('<?php echo $src; ?>');"></div>
 	<?php elseif(get_field('link_1_type')=='logo'): ?>
 	<div class="row height-60-pct logo <?php echo $box_colour ?>"><img src="<?php echo $src ?>" /></div>
 <?php else: ?>
  <div class="row height-60-pct">
 	<a href="<?php echo $permalink?>" target="<?php echo $target?>" class="<?php echo $class ?> <?php echo $anchor_class ?> fit-cell <?php echo $arrow_direction?> <?php echo get_field('theme',$post->ID)?>"><?php echo $label ?></a>
 </div>
<?php endif ?>


<?php
switch(get_field('link_2_type')){
	case 'page':
	$val = get_field('link_2_label',$post->ID);
	$label = !empty($val) ? get_field('link_2_label',$post->ID) : $post->post_title;
	$permalink = get_field('link_2_page',$post->ID);
	$arrow_direction = 'right';
	$target = "_parent";
	$anchor_class="page";
	break;
	case 'case-study-category':
	$val = get_field('link_2_label',$post->ID);
	$label = !empty($val) ? get_field('link_2_label',$post->ID) : $post->post_title;
	$term = get_field('link_2_case_study_category',$post->ID);
	$permalink = get_term_link($term);
	$arrow_direction = 'right';
	$target = "_parent";
	$anchor_class="case-study-category";
	break;
	case 'people-category':
	$val = get_field('link_2_label',$post->ID);
	$label = !empty($val) ? get_field('link_2_label',$post->ID) : $post->post_title;
	$term = get_field('link_2_people_category',$post->ID);
	$permalink = get_term_link($term);
	$arrow_direction = 'right';
	$target = "_parent";
	$anchor_class="people-category";
	break;
	case 'anchor':
	$post_id = url_to_postid(get_field('link_2_anchor',$post->ID));
	$page = get_post($post_id);
	$val = get_field('link_2_label',$post->ID);
	$label = !empty($val) ? get_field('link_2_label',$post->ID) : $post->post_title;
	//if($page->post_parent==0):
		$permalink = get_permalink($page->ID); //if the target page is the parent page
	//else:
	//	$permalink = get_permalink($page->parent); //if the target page is a child page
	//endif;
	//$permalink = $permalink.'#'.$page->post_name;
	$arrow_direction = get_field('link_2_arrow_direction',$post->ID);
	$target = "_parent";
	$anchor_class="anchor";
	break;
	case 'download':
	$permalink = get_field('link_2_file',$post->ID);
	$label = get_field('link_2_label',$post->ID);
	$arrow_direction = 'down';
	$target = "_blank";
	$anchor_class="download";
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
 	 <div class="row height-40-pct bg-fill-cell" style="background-image:url('<?php echo $src; ?>');"></div>
 	<?php elseif(get_field('link_2_type')=='logo'): ?>
 	<div class="row height-40-pct logo <?php echo $box_colour ?>"><img src="<?php echo $src ?>" /></div>
 <?php else: ?>
  <div class="row height-40-pct">
 	<a href="<?php echo $permalink?>" target="<?php echo $target?>" class="<?php echo $class ?> <?php echo $anchor_class ?> fit-cell <?php echo $arrow_direction?> white"><?php echo $label ?></a>
 </div>
<?php endif ?>

	
</div>
<!--/left column-->
<!--right column-->
		<?php
switch(get_field('link_3_type')){
	case 'page':
	$val = get_field('link_3_label',$post->ID);
	$label = !empty($val) ? get_field('link_3_label',$post->ID) : $post->post_title;
	$permalink = get_field('link_3_page',$post->ID);
	$arrow_direction = 'right';
	$target = "_parent";
	$anchor_class="page";
	break;
	case 'case-study-category':
	$val = get_field('link_3_label',$post->ID);
	$label = !empty($val) ? get_field('link_3_label',$post->ID) : $post->post_title;
	$term = get_field('link_3_case_study_category',$post->ID);
	$permalink = get_term_link($term);
	$arrow_direction = 'right';
	$target = "_parent";
	$anchor_class="case-study-category";
	break;
	case 'people-category':
	$val = get_field('link_3_label',$post->ID);
	$label = !empty($val) ? get_field('link_3_label',$post->ID) : $post->post_title;
	$term = get_field('link_3_people_category',$post->ID);
	$permalink = get_term_link($term);
	$arrow_direction = 'right';
	$target = "_parent";
	$anchor_class="people-category";
	break;
	case 'anchor':
	//$post_id = get_field('link_3_anchor',$post->ID);
	$post_id = url_to_postid(get_field('link_3_anchor',$post->ID));
	$page = get_post($post_id);
	$val = get_field('link_3_label',$post->ID);
	$label = !empty($val) ? get_field('link_3_label',$post->ID) : $post->post_title;
	//if($page->post_parent==0):
		$permalink = get_permalink($page->ID); //if the target page is the parent page
	/*else:
		$permalink = get_permalink($page->parent); //if the target page is a child page
	endif;*/
	//$permalink = $permalink.'#'.$page->post_name;
	$arrow_direction = get_field('link_3_arrow_direction',$post->ID);
	$target = "_parent";
	$anchor_class="anchor";
	break;
	case 'download':
	$permalink = get_field('link_3_file',$post->ID);
	$label = get_field('link_3_label',$post->ID);
	$arrow_direction = 'down';
	$target = "_blank";
	$anchor_class="download";
	break;
	case 'image':
	list($src,$w,$h) = wp_get_attachment_image_src(get_field('link_3_image',$post->ID), 'full');
	break;
	case 'logo':
	$src = get_field('link_3_logo',$post->ID);
	$box_colour = get_field('link_3_logo_box_colour',$post->ID);
	break;
}
?>
<?php $class = !empty($form_id) ? 'fancybox' : 'push-link' ?>
<?php if(get_field('link_3_type')=='image'): ?>
 	 <div class="column width-60-pct bg-fill-cell" style="background-image:url('<?php echo $src; ?>');"></div>
 	<?php elseif(get_field('link_3_type')=='logo'): ?>
 	<div class="column width-60-pct logo <?php echo $box_colour ?>"><img src="<?php echo $src ?>" /></div>
 <?php else: ?>
  <div class="column width-60-pct">
 	<a href="<?php echo $permalink?>" target="<?php echo $target?>" class="<?php echo $class ?> <?php echo $anchor_class ?> fit-cell <?php echo $arrow_direction?> grey"><?php echo $label ?></a>
 </div>
<?php endif ?>

<!--/right column-->
</div>
<!--/bottom row-->
</div>
</aside>
</section>
<!-- our story section -->
</main>
<?php get_footer() ?>