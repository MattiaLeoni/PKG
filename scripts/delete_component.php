<?php 

if (!isset ( $argv[1] ) ) { 
    echo 'Missing component name'; 
    return false; 
};

$has_error = false;

$component_slug = $argv[1];

$components_directory = 'content/themes/white-timber/templates/components/';
$component_directory = $components_directory.$component_slug;

//sass file
$sass_file = $components_directory.'_components.style.scss';
$sass_content = file_get_contents($sass_file);
$sass_content = str_replace("@import '$component_slug/$component_slug.style';", '', $sass_content);
if(!file_put_contents($sass_file, $sass_content)){
    echo "Failed to remove dependency from sass file\n";
    $has_error = true;
}

//include file
$include_file = $components_directory.'include.php';
$include_content = file_get_contents($include_file);
$include_content = str_replace("include('$component_slug/$component_slug.component.php');", '', $include_content);
if(!file_put_contents($include_file, $include_content)){
    echo "Failed to remove dependency from php file\n";
    $has_error = true;
}

array_map('unlink', glob("$component_directory/*.*"));
if(!rmdir($component_directory)){
    echo "Couldn't remove component folder\n";
    return false;
}

if(!$has_error) echo "Component $component_slug removed";

return;