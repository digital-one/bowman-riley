<?php get_header() ?>
<main id="page-wrap" role="main">
  <section class="section">
<div class="main column width-45-pct" role="main">
  <?php echo $post->post_content ?>
<div id="offices">
<ul>
	<li><div><h4>Leeds</h4><p>Tel: <a href="tel:01133917570">0113 391 7570</a><br />e-mail: <a href="mailto:info@bowmanriley.com">info@bowmanriley.com</a></p></div><ul class="links"><li><a href="">Get directions</a></li><li><a href="" class="map-1">Show map</a></li><li><a href="">Download info</a></li></ul></li>
	<li><div><h4>London</h4><p>Tel: <a href="tel:01133917570">0113 391 7570</a><br />e-mail: <a href="mailto:info@bowmanriley.com">info@bowmanriley.com</a></p></div><ul class="links"><li><a href="">Get directions</a></li><li><a href="" class="map-2">Show map</a></li><li><a href="">Download info</a></li></ul></li>
	<li><div><h4>Skipton</h4><p>Tel: <a href="tel:01133917570">0113 391 7570</a><br />e-mail: <a href="mailto:info@bowmanriley.com">info@bowmanriley.com</a></p></div><ul class="links"><li><a href="">Get directions</a></li><li><a href=""  class="map-3">Show map</a></li><li><a href="">Download info</a></li></ul></li>
</ul>
</div>
<?php get_template_part('includes/secondary-nav') ?>
</div>
<aside id="map" class="beta column width-55-pct">
</aside>
</section>
</main>
<?php get_footer() ?>