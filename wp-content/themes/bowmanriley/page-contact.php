<?php get_header() ?>
<main id="page-wrap" role="main">
  <section class="section">
<div class="main column width-45-pct" role="main">
  <?php echo $post->post_content ?>
<div id="offices">
<ul>
	<?php
if(get_field('office_locations',$post->ID)):
	$i=1;
while(the_repeater_field('office_locations')): 

	$directions_link = get_sub_field('office_directions_link');
	$directions_pdf = get_sub_field('office_directions_pdf');
?>
	<li><div><h4><?php echo get_sub_field('office_title')?></h4><p>Tel: <a href="tel:<?php echo str_replace(' ','',get_sub_field('office_telephone'))?>"><?php echo get_sub_field('office_telephone')?></a><br />e-mail: <a href="mailto:<?php echo get_sub_field('office_email_address')?>"><?php echo get_sub_field('office_email_address')?></a></p></div><ul class="links">
		<?php if(!empty($directions_link)): ?>
		<li><a href="<?php echo $directions_link ?>">Get directions</a></li>
	<?php endif ?>
		<li><a href="" class="map-<?php echo $i ?>">Show map</a></li>
		<?php if(!empty($directions_pdf)): ?>
		<li><a href="<?php echo $directions_pdf ?>" target="_blank">Download info</a></li>
		<?php endif ?>
	</ul></li>
<?php
$i++;
endwhile;
endif;
?>
</ul>
</div>
<?php get_template_part('includes/secondary-nav') ?>
</div>
<aside id="map" class="beta column width-55-pct">
</aside>
</section>
</main>
<?php get_footer() ?>