<?php 

function re_order_menu () {
    global $menu; 
    $separator = [ '', 'read', 'separator99', '', 'wp-menu-separator' ];
    // var_dump($menu);
    
    // ------- Put away items 
    $posts = $menu[5];
    $media = $menu[10];
    $links = $menu[15];
    $pages = $menu[20];


    // -------- Reset menu items
    unset($menu[4]);
    unset($menu[5]);
    unset($menu[10]);
    unset($menu[15]);
    unset($menu[20]);
    unset($menu[25]);

    // -------- Re-order menu as you want
    $menu[4] = $separator;
    $menu[5] = $pages;
    $separator[2] = 'separator98';
    $menu[6] = $separator;
    $separator[2] = 'separator97';
    $menu[14] = $separator;
    $menu[15] = $posts;
    $separator[2] = 'separator96';
    $menu[25] = $separator;
    $menu[33] = $separator;
    $menu[36] = $media;
    $menu[37] = $links;
    $separator[2] = 'separator95';

    //UNISCI PLUGIN IN SOTTOCARTELLA
    $menu[91] = array('Plugins Options', 'manage_options', 'plugins-menu', 'Plugins', 'menu-top', '#', 'dashicons-block-default');
    $menu[90] = $separator;
    $plugins_pages = array(
        'edit.php?post_type=acf-field-group', //acf
        'cptui_main_menu', //cpt ui
        'wpseo_dashboard', //seo
        'vc-general', //visual composer
        'mlang', //polylang
        'cfdb7-list.php', //cfdb
        'iubenda',//iubenda
        'vc-welcome', //VC for editor
        'wpseo_workouts', //seo for editor
        'ninja-forms',
    );
    $plugins = [];
    foreach($menu as $i => $menu_item){
        if(in_array($menu_item[2], $plugins_pages)){
            $plugins[] = $menu_item;
            unset($menu[$i]);
        }
    }
    global  $pagenow ;
    foreach($plugins as $plugin){
        if($pagenow.'?'.implode('&', array_map(
            function ($v, $k) {
                if(is_array($v)){
                    return $k.'[]='.implode('&'.$k.'[]=', $v);
                }else{
                    return $k.'='.$v;
                }
            }, 
            $_GET, 
            array_keys($_GET)
        )) == $plugin[2] || $_GET['page'] == $plugin[2]){
            $menu[99] = $plugin;
        }    
    }

    global $submenu;
    foreach($plugins as $plugin){
        $submenu['plugins-menu'][] = array($plugin[0], $plugin[1], $plugin[2]);
    }
    // array($plugin[0], $plugin[1], $plugin[2])$customfields;
    // $submenu['plugins-menu'][] = $wpbakery;
} 
add_action('admin_menu', 're_order_menu'); 

