<section class="secondary-nav">
 
<nav id="case-studies-nav">
<h3>FILTER OUR CASE STUDIES</h3>
<ul>
<li>
 <?php 


$term = null;
 $term_name = null;
global $wp_query;
if( isset( $wp_query->query_vars['term'])) {
   $term_name = $wp_query->query_vars['term'];
}

$sector_args = array(
  'parent'      => 7,
  'orderby'     => 'name', 
  'order'       => 'ASC',
  'hide_empty'  => true
  );

$category_args = array(
  'parent'      => 8,
  'orderby'     => 'name', 
  'order'       => 'ASC',
  'hide_empty'  => true
  );

if($sectors = get_terms( 'casestudies_category', $sector_args)):
  $c=0;
foreach($sectors as $sector):
  $current = $term_name==strtolower($sector->name) ? ' class="current"' : '';
if($c>0) echo ', ';
 ?>
<a href="<?php echo get_term_link($sector)?>"<?php echo $current ?>><?php echo $sector->name ?></a>
<?php $c++; ?>
<?php endforeach ?>
<?php endif ?>
</li>
<li>
<?php
if($categories = get_terms( 'casestudies_category', $category_args)):
 $c=0;
foreach($categories as $category):
  if(get_field('filter_option',$category)!='no'):
   $current = $term_name==strtolower($category->name) ? ' class="current"' : '';
if($c>0) echo ', ';
?>
<a href="<?php echo get_term_link($category)?>"<?php echo $current ?>><?php echo $category->name ?></a>
<?php $c++; ?>
<?php endif; ?>
<?php endforeach ?>
<?php endif ?>
</li>
</ul>
  </nav>
<?php get_template_part('includes/utility-nav') ?>
</section>