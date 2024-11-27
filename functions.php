<?php

// adding style files to header 
function add_styles () {
    wp_enqueue_style( 'style',  get_template_directory_uri() . '/style.css');
    wp_enqueue_style( 'tailwind',  get_template_directory_uri() . '/dist/output.css');
    wp_enqueue_style( 'font-awesome',  get_template_directory_uri() . '/dist/font-awesome/css/all.min.css');
}

// adding js files to page
function add_scripts () {
    
    // deregister and register the jquery libirary to send it to footer on use it as wordpress send it to header 
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', get_include_path() . '/js/jquery/jquery.js' . '' , args:["in_footer" => true] );
    
    wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js' , deps:['jquery']  , args: ["in_footer" => true]);
    wp_enqueue_script( 'font-awesome',  get_template_directory_uri() . '/dist/font-awesome/js/all.min.js' , args:["in_footer" => true]);
}

add_action( 'wp_enqueue_scripts', 'add_styles' );
add_action( 'wp_enqueue_scripts', 'add_scripts' );