<?php 

if (!isset ( $argv[1] ) ) { 
    echo 'Missing component name'; 
    return false; 
};

$has_error = false;

$component_slug = $argv[1];

$component_name = isset($argv[2]) ? $argv[2] : $component_slug;
$component_category = isset($argv[3]) ? $argv[3] : 'ML';

$components_directory = 'content/themes/white-timber/templates/components/';
$component_directory = $components_directory.$component_slug;
$create_directory = mkdir($component_directory, 0775, false);

if(!$create_directory){
    echo "Failed to create directory"; 
    return false;
}


//php file
$copy_component_file = 'scripts/component_slug/component_slug.component.php';
$component_file = $component_directory.'/'.$component_slug.'.component.php';

if (!copy($copy_component_file, $component_file)) {
    echo "Failed to copy $component_file\n";
    return false;
}

$file_content=file_get_contents($component_file);
$file_content=str_replace('component_slug', $component_slug, $file_content);
$file_content=str_replace('component_name', $component_name, $file_content);
$file_content=str_replace('component_category', $component_category, $file_content);
if(!file_put_contents($component_file, $file_content)){
    echo "Couldn't rename on component file\n";
    $has_error = true;
}

//twig file
$copy_twig_file = 'scripts/component_slug/component_slug.template.twig';
$twig_file = $component_directory.'/'.$component_slug.'.template.twig';

if (!copy($copy_twig_file, $twig_file)) {
    echo "Failed to copy $twig_file\n";
    $has_error = true;
}

$file_content=file_get_contents($twig_file);
$file_content=str_replace('component_slug', $component_slug, $file_content);
if(!file_put_contents($twig_file, $file_content)){
    echo "Failed to rename on twig file\n";
    $has_error = true;
}

//sass file
$copy_sass_file = 'scripts/component_slug/_component_slug.style.scss';
$sass_file = $component_directory.'/_'.$component_slug.'.style.scss';

if (!copy($copy_sass_file, $sass_file)) {
    echo "Failed to copy $sass_file\n";
    $has_error = true;
}

$file_content=file_get_contents($sass_file);
$file_content=str_replace('component_slug', $component_slug, $file_content);
if(!file_put_contents($sass_file, $file_content)){
    echo "Failed to rename on sass file\n";
    $has_error = true;
}

//add include to include.php
$add_content = PHP_EOL . "include('".$component_slug."/".$component_slug.".component.php');";
if(!file_put_contents($components_directory.'include.php', $add_content, FILE_APPEND)){
    echo "Failed to add component to php include\n";
    $has_error = true;
}

//add include to _components.style.scss
$add_content = PHP_EOL . "@import '".$component_slug."/".$component_slug.".style';";
if(!file_put_contents($components_directory.'_components.style.scss', $add_content, FILE_APPEND)){
    echo "Failed to add component to sass include\n";
    $has_error = true;
}

if(!$has_error) echo "Component $component_slug added";
return;

