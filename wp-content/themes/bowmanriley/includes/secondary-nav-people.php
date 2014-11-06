<section class="secondary-nav">
 
<nav id="sub-nav" class="people-categories">

<?php
 $current_term='';
 if(is_tax( 'people_category')):
  $queried_object = get_queried_object();
    $term_id = $queried_object->term_id;
  $term = get_term($term_id,'people_category');
  $current_term= $term->name;
endif;
?>
<ul>
 

  <?php
  $args = array(
  'hide_empty' => 0
  );
  if($terms = get_terms('people_category',$args)): 
    foreach($terms as $term):
      $current = $current_term == $term->name ? ' class="current-menu-item"' : '';
      if(has_term( $term->name,'people_category')):
        $current = ' class="current-menu-item"';
      endif;
  ?>
<li<?php echo $current ?>><a href="<?php echo get_term_link($term) ?>"><?php echo $term->name ?> team<span><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
   viewBox="0 0 55.4 49.7" enable-background="new 0 0 55.4 49.7" xml:space="preserve">
<path class="icon" fill="#615E60" d="M22.8,11.8l6.1,6.1h-22C3.1,17.9,0,21,0,24.8v0c0,3.8,3.1,6.9,6.9,6.9h22l-6.1,6.1c-2.7,2.7-2.7,7.1,0,9.8
  l0,0c2.7,2.7,7.1,2.7,9.8,0l22.8-22.8L32.6,2c-2.7-2.7-7.1-2.7-9.8,0l0,0C20.1,4.7,20.1,9.1,22.8,11.8z"/>
</svg></span></a></li>
<?php endforeach ?>
<?php endif ?>
<!--
<li><a href="">Services<span><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
   viewBox="0 0 55.4 49.7" enable-background="new 0 0 55.4 49.7" xml:space="preserve">
<path class="icon" fill="#615E60" d="M22.8,11.8l6.1,6.1h-22C3.1,17.9,0,21,0,24.8v0c0,3.8,3.1,6.9,6.9,6.9h22l-6.1,6.1c-2.7,2.7-2.7,7.1,0,9.8
  l0,0c2.7,2.7,7.1,2.7,9.8,0l22.8-22.8L32.6,2c-2.7-2.7-7.1-2.7-9.8,0l0,0C20.1,4.7,20.1,9.1,22.8,11.8z"/>
</svg></span></a></li>
-->
</ul>
  </nav>
<?php get_template_part('includes/utility-nav') ?>
</section>