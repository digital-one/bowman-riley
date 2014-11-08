<!--scripts-->

<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>
<!-- Load jQuery from a local copy if loading from Google fails -->
<script>window.jQuery || document.write('<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery-ui.min.js"><\/script>')</script>
<script src="//maps.google.com/maps/api/js?sensor=true"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.gmap.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.easing.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.slimscroll.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.fullPage.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/twitter-fetcher.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/fancybox/jquery.fancybox.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/owlcarousel/owl.carousel.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.scrollTo.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/scripts.js"></script>
<!--/scripts-->
<script type="text/javascript">
$(function(){
if($('#map').length){
<?php
if(get_field('office_locations',$post->ID)):
	$i=1;
while(the_repeater_field('office_locations')): 
	$location = get_sub_field('office_location');
?>
   $('.map-<?php echo $i ?>').on('click',function(e){
   	e.preventDefault();
    $('#directions').remove();
     $('#map').css({height:'100%'}).attr('data-lat','<?php echo $location['lat']?>').attr('data-lng','<?php echo $location['lng']?>').empty().gmap({
        markers: [{'latitude': <?php echo $location['lat']?>,'longitude': <?php echo $location['lng']?>}],
        markerFile: '<?php echo get_template_directory_uri() ?>/images/marker.png',
        markerWidth:140,
        markerHeight:164,
        markerAnchorX:68,
        markerAnchorY:162
    });
     });
   <?php
   $i++;
   endwhile;
   endif;
   ?>
   //load first map
   <?php
   $rows = get_field('office_locations',$post->ID ); // get all the rows
$first_office = $rows[0]; // get the first row
$lat = $first_office['office_location']['lat']; 
$lng = $first_office['office_location']['lng']; 
?>
$('#map').gmap({
        markers: [{'latitude': '<?php echo $lat ?>','longitude': '<?php echo $lng ?>'}],
        markerFile: '<?php echo get_template_directory_uri() ?>/images/marker.png',
        markerWidth:140,
        markerHeight:164,
        markerAnchorX:68,
        markerAnchorY:162
    });

   }
});
 </script>   
<?php wp_footer() ?>
</body>
</html>