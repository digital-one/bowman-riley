<?php get_header() ?>
<?php
	$queried_object = get_queried_object();
    $term_id = $queried_object->term_id;
	$term = get_term($term_id,'people_category');

	$term_name= $term->name;
	$theme = get_field('theme',$term);
?>

	<?php
	if($terms = get_terms('people_category',array('hide_empty' => 0))):
		foreach($terms as $term):
if($term->term_id != $term_id):
$other_terms[] =$term;
	endif;
endforeach;
	?>
<?php endif ?>


  <main id="page-wrap" role="main">

<section id="our-people-sector" class="
<?php
$queried_object = get_queried_object();
    $term_id = $queried_object->term_id;
	$term = get_term($term_id,'people_category');
echo get_field('theme',$term);?> section fixed" data-anchor="<?php echo $term->slug ?>">
	

<div class="main column width-45-pct" role="main">
  <h1>Our<br /><?php echo $term_name ?> Team</h1>
  <?php echo get_field('term_long_description',$term) ?>

<?php get_template_part('includes/secondary-nav-people') ?>
</div>
<aside class="beta column width-55-pct">
<div class="inner">
	<?php 
$term = null;
     global $wp_query;
    if( isset( $wp_query->query_vars['term'])) {
        $term_name = $wp_query->query_vars['term'];
    }

$args = array( 
  'post_type' => 'people',
  'posts_per_page' => -1,
  'post_status' => 'publish',
  'taxonomy' => 'people_category',
  'term' => $term_name,
  'orderby' => 'menu_index',
  'order' => 'ASC'
);

$people = get_posts($args);
$current_cell=0;
$current_person=0;
$link=0;
$link_cells = [1,3];
$double_img_cells = [6];
$total = count($people);
for($i=0; $i<$total; $i++):
	if(in_array($current_cell, $link_cells)):
		?>
	<div class="cell one-third square"><a href="<?php echo get_term_link($other_terms[$link]) ?>" class="push-link fit-cell inverted <?php echo get_field('theme',$other_terms[$link]);?>"><?php echo $other_terms[$link]->description?></a></div>
	<?php $current_cell++ ?>
	<?php $link++; ?>
<?php endif ?>

<?php
$class="one-third square";
if(in_array($current_cell, $double_img_cells)):
	$class="two-thirds half-height";
endif;
?>

	<div class="cell <?php echo $class?>"><a href="" class="overlay <?php echo $theme;?> people-link select"><ul class="case-study-meta"><li><?php echo $people[$current_person]->post_title ?></li><li><?php echo get_field('position',$people[$current_person]->ID) ?></li></ul><?php echo $people[$current_person]->post_content ?></a><img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($people[$current_person]->ID)); ?>" /></div>

<?php $current_person++ ?>
<?php $current_cell++ ?>
<?php endfor; ?>


</div>
</aside>
</section>
</main>
<?php get_footer() ?>