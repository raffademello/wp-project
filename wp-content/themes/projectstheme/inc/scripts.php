<?php
function kq_theme_scripts_styles() {
	wp_enqueue_style('main-style', get_template_directory_uri() . '/dist/main.min.css', '', '1');
  }
  
  add_action( 'wp_enqueue_scripts', 'kq_theme_scripts_styles' );
  
 
  function smartwp_remove_wp_block_library_css(){
	  wp_dequeue_style( 'wp-block-library' );
	  wp_dequeue_style( 'wp-block-library-theme' );
	  wp_dequeue_style( 'wc-block-style' );
  } 
  add_action( 'wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css', 100 );

  function custom_css() {
	wp_enqueue_style( 'tailwindcss_output', get_template_directory_uri() . '/dist/output.css', array() );
	wp_enqueue_style( 'custom_css', get_template_directory_uri() . '/assets/css/custom.css', array() );
}
add_action( 'wp_enqueue_scripts', 'custom_css' );

function custom_scripts_method()
{
wp_register_script('customscripts', get_template_directory_uri() . '/assets/js/jquery.js', array('jquery'), '1.0.0', true);
wp_enqueue_script('customscripts');
}

add_action('wp_enqueue_scripts', 'custom_scripts_method');

$GLOBALS['my_query_filters'] = array( 
    'field_65679089164fa'   => 'categoria'
);

// action
function my_pre_get_posts( $query ) {
    if( is_admin() ) return;
    if( !$query->is_main_query() ) return;
    $meta_query = $query->get('meta_query');
    foreach( $GLOBALS['my_query_filters'] as $key => $name ) {
        if( empty($_GET[ $name ]) ) {
            continue;   
        }

        $value = explode(',', $_GET[ $name ]);

        $meta_query = array(
            array(
                'key'       => $name,
                'value'     => $value,
                'compare'   => 'IN',
            )
        );

    } 

    $query->set('meta_query', $meta_query ); 
}
add_action('pre_get_posts', 'my_pre_get_posts', 10, 1);

add_filter( 'wpcf7_autop_or_not', '__return_false' );

?>
