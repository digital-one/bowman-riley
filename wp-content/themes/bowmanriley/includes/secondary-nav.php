<section class="secondary-nav">
 <?php 
 	$parent_id = $post->post_parent;
 	if($parent_id==0):
		$parent_id=$post->ID;
	endif;
 	$children = wp_list_pages('title_li=&echo=0&child_of=' . $post->ID);
 	$single_page=false;
 	if(!$children and $post->post_parent==0) $single_page=true;
if($parent_id !=2 and !$single_page):
 		?>
<nav id="sub-nav">
	<?php


	$parent_page = get_post($parent_id);
	$parent_permalink = get_permalink($parent_id);
	$args = array(
		'child_of' => $parent_id,
		'parent' => $parent_id,
		'sort_order' => 'ASC',
		'sort_column' => 'menu_order'
	);
	

$current = $post->ID==$parent_id ? ' class="current-menu-item"' : '';
?>
		<li<?php echo $current ?>><a href="<?php echo $parent_permalink?><?php echo $parent_page->post_name?>"><?php echo $parent_page->post_title ?><span><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
   viewBox="0 0 55.4 49.7" enable-background="new 0 0 55.4 49.7" xml:space="preserve">
<path class="icon" fill="#615E60" d="M22.8,11.8l6.1,6.1h-22C3.1,17.9,0,21,0,24.8v0c0,3.8,3.1,6.9,6.9,6.9h22l-6.1,6.1c-2.7,2.7-2.7,7.1,0,9.8
  l0,0c2.7,2.7,7.1,2.7,9.8,0l22.8-22.8L32.6,2c-2.7-2.7-7.1-2.7-9.8,0l0,0C20.1,4.7,20.1,9.1,22.8,11.8z"/>
</svg></span></a></li>
<?php
	if($pages = get_pages($args)):
		//if($pages = get_posts($args2)):
		foreach($pages as $page):
			$current = $post->ID==$page->ID ? ' class="current-menu-item"' : '';
$permalink = get_permalink($page->ID);
		//$permalink = get_field('scrolling_page_load',$page->ID)=='no' ? get_permalink($page->ID) : $parent_permalink.'#'.$page->post_name;
			?>
<li<?php echo $current ?>><a href="<?php echo $permalink ?>"<?php if(get_field('scrolling_page_load',$page->ID)=='no'):?> class="push-link"<?php endif ?>><?php echo $page->post_title ?><span><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
   viewBox="0 0 55.4 49.7" enable-background="new 0 0 55.4 49.7" xml:space="preserve">
<path class="icon" fill="#615E60" d="M22.8,11.8l6.1,6.1h-22C3.1,17.9,0,21,0,24.8v0c0,3.8,3.1,6.9,6.9,6.9h22l-6.1,6.1c-2.7,2.7-2.7,7.1,0,9.8
  l0,0c2.7,2.7,7.1,2.7,9.8,0l22.8-22.8L32.6,2c-2.7-2.7-7.1-2.7-9.8,0l0,0C20.1,4.7,20.1,9.1,22.8,11.8z"/>
</svg></span></a></li>
			<?php endforeach; ?>
		<?php endif ?>
	
<ul>
<!--
<li class="current-menu-item"><a href="">Overview<span><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
   viewBox="0 0 55.4 49.7" enable-background="new 0 0 55.4 49.7" xml:space="preserve">
<path class="icon" fill="#615E60" d="M22.8,11.8l6.1,6.1h-22C3.1,17.9,0,21,0,24.8v0c0,3.8,3.1,6.9,6.9,6.9h22l-6.1,6.1c-2.7,2.7-2.7,7.1,0,9.8
  l0,0c2.7,2.7,7.1,2.7,9.8,0l22.8-22.8L32.6,2c-2.7-2.7-7.1-2.7-9.8,0l0,0C20.1,4.7,20.1,9.1,22.8,11.8z"/>
</svg></span></a></li>
<li><a href="">Services<span><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
   viewBox="0 0 55.4 49.7" enable-background="new 0 0 55.4 49.7" xml:space="preserve">
<path class="icon" fill="#615E60" d="M22.8,11.8l6.1,6.1h-22C3.1,17.9,0,21,0,24.8v0c0,3.8,3.1,6.9,6.9,6.9h22l-6.1,6.1c-2.7,2.7-2.7,7.1,0,9.8
  l0,0c2.7,2.7,7.1,2.7,9.8,0l22.8-22.8L32.6,2c-2.7-2.7-7.1-2.7-9.8,0l0,0C20.1,4.7,20.1,9.1,22.8,11.8z"/>
</svg></span></a></li>
-->
</ul>
  </nav>
<?php endif ?>
<?php get_template_part('includes/utility-nav') ?>
</section>