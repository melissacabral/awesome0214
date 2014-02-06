<?php 
//turn on sleeping features
add_theme_support( 'post-thumbnails' );
add_theme_support( 'post-formats', 
	array( 'gallery', 'video', 'audio', 'image', 'link', 'quote' ) );

//add more image sizes
add_image_size( 'home-banner', 1120, 330, true );


//no close PHP