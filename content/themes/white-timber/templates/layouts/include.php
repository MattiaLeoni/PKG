<?php 

    include('header/header.component.php'); 
    include('footer/footer.component.php'); 

    function layout_scripts()  { 
        wp_enqueue_script( 'floating_header', get_template_directory_uri() . '/templates/layouts/headerFloating/headerFloating.controller.js', array( 'jquery' ));
    } 
    add_action( 'wp_enqueue_scripts', 'layout_scripts' ); 
    

?>