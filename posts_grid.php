<?php
/**
 * Plugin Name: Posts Grid
 * Plugin URI: https://overflownetworks.com 
 * Description: Display posts with image on the left, and text, and description on the right.
 * Version: 0.2
 * Author: Justin Tharpe
 */
 

function wpse_load_plugin_css() {
    $plugin_url = plugin_dir_url( __FILE__ );

    wp_enqueue_style( 'style1', $plugin_url . 'css/1586480001.css' );
}


 function tbare_wordpress_plugin_demo($atts) {
    
   
    $args = array(
        'numberposts'	=> 20,
        //'category'		=> 4
    );
    $my_posts = get_posts( $args );
    
    if( ! empty( $my_posts ) ){
        //$output = '<body>';
        $output = '<div class="wrapper">';
        //$output .= '<ul>';
        foreach ( $my_posts as $p ){
            $tumbs = get_the_post_thumbnail($p->ID, 'medium');
            $output .= '<div class="content">';
            //$output .= '<li>';
            $output .= '<a href="' . get_permalink( $p->ID ) . '">' . $p->post_title . '</a></li>';
            $output .= get_post_field('post_content', $p->ID);
            $output .= '</div>';
            $output .= '<div class="left">';
            $output .= $tumbs;
            $output .= '</div>';
        }
        //$output .= '</ul>';
        $output .= '</div>';
    }

    //$Content .= $output;


    return $output;


}

add_action( 'wp_enqueue_scripts', 'wpse_load_plugin_css' );
add_shortcode('tbare-plugin-demo', 'tbare_wordpress_plugin_demo');

?>