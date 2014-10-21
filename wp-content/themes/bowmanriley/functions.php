<?php 

ini_set('zlib.output_handler', '');

//AJAX

function ajax_get_pages(){
    if( isset($_GET['action'])&& $_GET['action'] == 'ajax_get_pages'){
    
    //get child pages
    $page_id = url_to_postid($_GET['url']);
    $front_id = get_option('page_on_front');
    
    //echo $_GET['url'];
    //echo $page_id;
    if($page_id==0){
      //$page_id = get_option('page_on_front');
        $page_id=$front_id; //override so sub pages of home are from about us section
    }
    //$page_id=$parent->ID;
$args = array(
    'post_type' => 'page',
    'numberposts' => -1,
    'post_status' => 'publish',
    'post_parent' => $page_id,
    'orderby' => 'menu_index',
    'order' => 'ASC'
    );

  $sub_pages[0] = get_permalink($page_id); //if not front page load in parent page

  // print_r($sub_pages);
 if($pages = get_posts($args)):
      foreach($pages as $page):
        $sub_pages[] = get_permalink($page->ID);
        endforeach;
        endif;

  echo json_encode($sub_pages);
  die();
}
}

add_action('init', 'ajax_get_pages');


add_action('after_setup_theme', 'load_custom_post_types');

if( !function_exists('load_custom_post_types')):
function load_custom_post_types(){
	$cpt_files = apply_filters('load_custom_post_type_files', array(
		//'post_types/product',
		'post_types/event',
    'post_types/offer',
    'post_types/review',
    'post_types/activity'
	));
	foreach($cpt_files as $cpt_file) get_template_part($cpt_file);
}
endif;

//includes
get_template_part('functions/sidebars');

// load widgets
get_template_part('widgets/widget_signpost');
get_template_part('widgets/widget_scroller');
get_template_part('widgets/widget_staff_login');
get_template_part('widgets/widget_need_help');
get_template_part('widgets/widget_featured_event');
get_template_part('widgets/widget_featured_news');
get_template_part('widgets/widget_welcome');
get_template_part('widgets/widget_rate_service');
get_template_part('widgets/widget_banner');
get_template_part('widgets/widget_service_search');
get_template_part('widgets/widget_service_categories');
get_template_part('widgets/widget_archive');

// Theme support
add_theme_support('post-thumbnails');
add_theme_support('menus');
add_image_size('large-image', 370, 264, true);
add_image_size('tn-image', 214,154, true);
add_image_size('news-tn', 230,250, true); // news and archive feature
add_image_size('scroller-image', 464,240, true); // scroller image
set_post_thumbnail_size( 214, 154,true); 

function custom_image_sizes($sizes) {
      unset( $sizes['medium']);
      unset( $sizes['large']);
	 //unset( $sizes['full'] ); // removes full size if needed
$myimgsizes = array(
	   		  "large-image" => __("Large Image" ),
              "tn-image" => __("Thumbnail Image" ),
              "news-tn" => __("News Thumbnail" ),
              "scroller-image" => __("Scroller Image" )
              );
     
       $newimgsizes = array_merge($sizes, $myimgsizes);
	    return $newimgsizes;
}
add_filter('image_size_names_choose', 'custom_image_sizes');
//
	
//Menus


register_nav_menus( array(
		'main_nav' => __('Main Navigation')
));


?>