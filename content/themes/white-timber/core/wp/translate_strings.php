<?php 

$strings_to_translate = array(
    'Menu',
    'Chiudi',
    'Cerca',
    'Nessun risultato.',
    'Ricerca',
    'footer_text',
);

$utility_translations = array(
    'lang',
    'pagina_contatti',
);

if(function_exists('pll_register_string')){
    foreach($strings_to_translate as $string){
            pll_register_string(preg_replace("/[^a-zA-Z]+/", "", $string), $string, 'theme_strings');
    }
    foreach($utility_translations as $string){
        pll_register_string(strtolower(preg_replace("/[^a-zA-Z]+/", "", $string)), $string, 'theme_utility');
    }
}
