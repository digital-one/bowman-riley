<?php
//
// People Post Type related functions.
//

add_action('init', 'create_cpt_people');
add_filter("manage_edit-people_columns", "add_cpt_people_columns");   
add_action("manage_people_posts_custom_column",  "add_cpt_people_custom_columns",10,2); 
//add_action('init', 'add_cpt_people_rewrite_rules');
//add_filter('query_vars', 'add_cpt_people_query_vars');

/*
add_action('admin_init', 'ci_add_cpt_gallery_meta');
add_action('save_post', 'ci_update_cpt_gallery_meta');
*/

if( !function_exists('create_cpt_people') ):
function create_cpt_people(){
	$labels = array(
		'name' => _x('People', 'post type general name', 'dc_theme'),
		'singular_name' => _x('People', 'post type singular name', 'br_theme'),
		'add_new' => __('New Person', 'dc_theme'),
		'add_new_item' => __('Add new person', 'br_theme'),
		'edit_item' => __('Edit People', 'br_theme'),
		'new_item' => __('New People', 'br_theme'),
		'view_item' => __('View People', 'br_theme'),
		'search_items' => __('Search People', 'br_theme'),
		'not_found' =>  __('No activities found', 'br_theme'),
		'not_found_in_trash' => __('No people found in the trash', 'br_theme'), 
		'parent_item_colon' => __('Parent People Item:', 'br_theme')
	);

	$args = array(
		'labels' => $labels,
		'singular_label' => __('People', 'br_theme'),
		'public' => true,
		'show_ui' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'has_archive' => true,
		'rewrite' => array('slug' => 'people/archive'),
		'menu_position' => 5,
		'taxonomies' => array('people_category'),
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail','post-thumbnails','page-attributes')
		
	);

	register_post_type( 'people' , $args );
}



add_action( 'init', 'cpt_people_taxonomies');


if( !function_exists('cpt_people_taxonomies') ):
function cpt_people_taxonomies() {
	//
	// Create all taxonomies here.
	//
	$labels = array(
		'name' => _x( 'People Category', 'taxonomy general name', 'dc_theme' ),
		'singular_name' => _x( 'People Category', 'taxonomy singular name', 'dc_theme' ),
		'search_items' =>  __( 'Search people Categories', 'dc_theme' ),
		'all_items' => __( 'All People Categories', 'dc_theme' ),
		'parent_item' => __( 'Parent People Categories', 'dc_theme' ),
		'parent_item_colon' => __( 'Parent People Categories:', 'dc_theme' ),
		'edit_item' => __( 'Edit People Category', 'dc_theme' ), 
		'update_item' => __( 'Update People Category', 'dc_theme' ),
		'add_new_item' => __( 'Add People Category', 'dc_theme' ),
		'new_item_name' => __( 'New Category Name', 'dc_theme' ),
	); 	
	register_taxonomy(
		"people_category", 
		"people", 
		array(
			"hierarchical" => true, 
			"labels" => $labels,
			'rewrite' => array('slug' => 'people/category'),
			'query_var' => true,
                        'public' => true,
                        'publicly_queryable' => true,
                        'exclude_from_search' => FALSE,
		));

}
endif;


function add_cpt_people_columns($columns){
        $columns = array(
           "cb" => "<input type=\"checkbox\" />",
           "title" => "Name",
            "position" => "Position",
           "department" =>"Department",
           "date" => "Publish Date"
        );  
	return $columns;
}

function add_cpt_people_custom_columns($column,$id){
        global $post;
        switch ($column){
        	case "position":
        	echo get_field('position',$id);
        	break;
				 case "department":
                 $terms = get_the_terms( $id, 'people_category');
                $list="";
                foreach($terms as $term):
                     if(!empty($list)) $list.=", ";
                     $list.= $term->name;
                endforeach;
                echo $list;
                break;	               
 			}
			} 

function add_cpt_people_rewrite_rules(){ 

add_rewrite_rule('^news-peoples/peoples/archive/yr/([^/]*)/?', 'index.php?pagename=news-peoples/peoples&yr=$matches[1]','top');

}

function add_cpt_people_query_vars($public_query_vars) {
	  $public_query_vars[] = "yr";
	return $public_query_vars; 
}

endif;

?>
