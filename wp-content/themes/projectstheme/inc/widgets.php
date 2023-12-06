<?php 
function register_widgets() {

  register_sidebar( array(
    'name'          => 'Footer Widgets',
    'id'            => 'footer_widgets',
    'before_widget' => '<div>',
    'after_widget'  => '</div>',
    'before_title'  => '<h5>',
    'after_title'   => '</h5>',
  ) );

  register_sidebar( array(
    'name'          => 'Blog Sidebar',
    'id'            => 'sidebar-1',
    'before_widget' => '<div>',
    'after_widget'  => '</div>',
    'before_title'  => '<h4>',
    'after_title'   => '</h4>',
  ) );

}
add_action( 'widgets_init', 'register_widgets' );