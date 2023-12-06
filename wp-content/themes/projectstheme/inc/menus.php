<?php 
function register_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Main Menu' ),
      'footer-menu' => __( 'Footer Menu' )
    )
  );
}
add_action( 'init', 'register_menus' );

class Bootstrap_Walker extends Walker_Nav_Menu {
  function start_el(&$output, $item, $depth=0, $args=array(), $id = 0) { 
    $object = $item->object;
    $type = $item->type;
    $title = $item->title;
    $description = $item->description;
    $permalink = $item->url;
    $output .= "<li class='nav-item " .  implode(" ", $item->classes) . "'>";
  } 
}