<?php get_header() ?>
 <main id="page-wrap" role="main">
<!-- our story section -->
<section id="downloads" class="section fixed">
<div class="main column width-45-pct" role="main">
 <h1>SEARCH RESULTS*</h1>
</div>
<aside class="beta column width-55-pct">
  <div class="inner">
  
<?php
/*
<?php
if(get_field('download_files')):?>
<ul id="post-list">
<?php
while(the_repeater_field('download_files',$post->ID)): 
list($src,$w,$h) = wp_get_attachment_image_src(get_sub_field('download_image'), 'large-image');
?>
 <li><a href="<?php echo get_sub_field('download_file') ?>"><figure><img src="<?php echo $src ?>"/></figure><div class="content"><h3><?php echo get_sub_field('download_label') ?></h3><p><?php echo  get_sub_field('download_description') ?></p>
 </div>
  <span>Download</span>
</a></li>
 <?php endwhile ?>
</ul>
<?php endif ?>
*/
?>
</div>
</aside>
</section>
</main>
<?php get_footer() ?>