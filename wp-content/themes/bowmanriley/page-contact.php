<?php get_header() ?>
  <?php
   $rows = get_field('office_locations',$post->ID ); // get all the rows
$first_office = $rows[0]; // get the first row
$lat = $first_office['office_location']['lat']; 
$lng = $first_office['office_location']['lng']; 
?>

<main id="page-wrap" role="main">
  <section class="section fixed">
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
	$office_lat  = get_sub_field('office_location')['lat'];
	$office_lng  = get_sub_field('office_location')['lng'];
?>
	<li><div><h4><?php echo get_sub_field('office_title')?></h4><p>Tel: <a href="tel:<?php echo str_replace(' ','',get_sub_field('office_telephone'))?>"><?php echo get_sub_field('office_telephone')?></a><br />e-mail: <a href="mailto:<?php echo get_sub_field('office_email_address')?>"><?php echo get_sub_field('office_email_address')?></a></p></div><ul class="links">
		
		<li><a href="<?php echo $directions_link ?>" class="directions-link" data-lat="<?php echo $office_lat ?>" data-lng="<?php echo $office_lng ?>">Get directions</a></li>

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
<form id="calculate-route" name="calculate-route" action="#" method="get">
	<ul>
		<li>
  <input type="text" id="from" name="from" required="required" placeholder="Enter your address" size="30" />	<button type="submit">Submit</button>
</li>
<li>
  <a href="#" id="from-link" class="align-left">Get your current location</a><a href="#" id="reset" class="align-right">Reset</a>
</li>
</ul>
</form>
<?php get_template_part('includes/secondary-nav') ?>
</div>
<aside class="beta column width-55-pct"  >
	<div id="map" data-lat="<?php echo $lat ?>" data-lng="<?php echo $lng ?>" style="width:100%; height:100%; display:block;"></div>
	
</aside>
</section>
</main>
<?php get_footer() ?>