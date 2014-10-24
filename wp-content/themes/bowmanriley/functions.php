<?php 

ini_set('zlib.output_handler', '');

//AJAX

function ajax_get_pages(){
    if( isset($_GET['action'])&& $_GET['action'] == 'ajax_get_pages'):
    //get child pages
     // die($_GET['url']);
    $page_id = url_to_postid($_GET['url']);
     $front_id = get_option('page_on_front');
//echo $_GET['url'];
//echo $page_id;
//echo home_url();
     $single_page=0;
if($page_id==$front_id && $_GET['url']!=home_url()): //catch single pages routing through homepage
$single_page=1;
endif;

 
if(rtrim($_GET['url'], "/") == home_url()):
      $page_id=$front_id;
    endif;

       $output_pages[0] = $_GET['url'];

    if($page_id and !$single_page): //if url is a page (not a taxonomy,archive etc) get sub pages

$args = array(
    'post_type' => 'page',
    'numberposts' => -1,
    'post_status' => 'publish',
    'post_parent' => $page_id,
    'orderby' => 'menu_index',
    'order' => 'ASC'
    );

 //if not front page load in parent page

 if($pages = get_posts($args)):
      foreach($pages as $page):
        $output_pages[] = get_permalink($page->ID);
        endforeach;
endif;
endif;
//die(print_r($output_pages));
 echo json_encode($output_pages);

  die();
endif;
}

add_action('init', 'ajax_get_pages');


add_action('after_setup_theme', 'load_custom_post_types');

if( !function_exists('load_custom_post_types')):
function load_custom_post_types(){
	$cpt_files = apply_filters('load_custom_post_type_files', array(
		//'post_types/product',
		'post_types/people',
    'post_types/case-studies',
    'post_types/news'
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

// Retina image support 

get_template_part('functions/retina-images');

// Theme support
add_theme_support('post-thumbnails');
add_theme_support('menus');
add_image_size('featured-image-landscape', 1200, 800, true);
add_image_size('featured-image-portrait', 800, 1200, true);
add_image_size('large-image', 600,600, true);
add_image_size('square-tn', 120,120, true);
add_image_size('landscape-tn', 180,120, true);
add_image_size('portrait-tn', 120,180, true);
add_image_size('case-study-tn', 300,200, true); // news and archive feature
set_post_thumbnail_size( 180, 120,true); 

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


add_action( 'wp_enqueue_scripts', 'retina_support_enqueue_scripts' );

add_filter( 'admin_post_thumbnail_html', 'add_featured_image_instruction');
function add_featured_image_instruction( $content ) {
 global $post;
 $post_type = $post->post_type;
 if(is_admin()):
  $template = get_page_template_slug( $post->ID );
 if($template=='template-columns-2-links.php'):
     return $content .= '<p>Upload jpg image 800x1200 pixels @ 72dpi</p>';
   else:
return $content .= '<p>Upload jpg image 1200x800 pixels @ 72dpi</p>';
    endif;
 return $content;
 endif;
}

?>