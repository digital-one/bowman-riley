<?php get_header() ?>
<?php
$page = get_post(32);
?>
  <main id="page-wrap" role="main">
<!-- our story section -->
<section id="news" class="section fixed <?php echo get_field('theme',$post->ID)?>">
<div class="main column width-45-pct" role="main">
  <?php echo $page->post_content?>
<?php //include('secondary-nav.php') ?>
</div>
<aside class="beta column width-55-pct">
  <div class="inner no-cell">
  <div class="row height-45-pct bg-fill-cell masked gutter-2x " style="background-image:url('images/primark.jpg');">
    image
  </div>
  <div class="row height-55-pct  gutter-2x">

<article class="single column gutter-2x">
  <h2>News Item Headline</h2>
  <p><time datetime="2014-10-11">11<sup>th</sup> October 2014</time></p>
<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>
<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>
<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>
<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>
<a href="http://bowmanriley.localhost/latest-news.php" class="close">Close</a>
  </article>
  </div>
</div>
</aside>
</section>
</main>
<?php get_footer() ?>