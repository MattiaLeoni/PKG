<?php


register_sidebar( array(
    'name'          => 'Footer testo iniziale',
    'id'            => 'footer_area_one',
    'description'   => 'Testo che compare a fianco del modulo di contatti',
    'before_widget' => '<section class="footer-area-one ">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
  ));
  