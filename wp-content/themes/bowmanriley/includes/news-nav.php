<section class="secondary-nav">
 
<nav id="case-studies-nav">
<h3>ARCHIVE</h3>
<ul>
  <li>
    <a href="<?php echo get_permalink(32)?>archive/all">ALL</a>
<?php
$args = array(
    'post_type' => 'news',
    'type'      => 'yearly',
    'echo'      =>  0,
    'format'    => 'custom',
    'order'     => 'DESC',
    'limit'     => 10,
    'before'     => ', '
);
$archive = wp_get_archives($args);
//echo $archive;
echo trim($archive,',');



?>
</li>
</ul>
</nav>
<?php get_template_part('includes/utility-nav') ?>
</section>