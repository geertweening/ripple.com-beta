<?php

/*
 *
 * Template for the front page options
 *
 */ 

// Information

$info = array(
	'name' => 'front-options',  // The options page identifier
	'pagename' => 'front-options', // The page slug
	'title' => 'Front page settings',
	'sublevel' => 'yes'
);

// Options and array of arguments


// Create a list of all post categories
$all_categories=get_categories('hide_empty=0&orderby=name');
$cat_options=array();
$cat_options[] = '-Any category-';
foreach ($all_categories as $category_list ) {
    $cat_options[] = $category_list->cat_name;
}




$options = array(
	
	// Tagline
	
	array(
		"type" => "heading",
		"name" => "Front Page Tagline" 	
	),
	
	array(
		"type" => "textarea",
		"name" => "Tagline Content Text",
		"id" => "ansimuz_tagline",
		"desc" => "Text displayed next to the slideshow in the front page.",
		"default" => "" 	
	),
	
	// Slides
	
	array(
		"type" => "heading",
		"name" => "Slides" 	
	),
	
	
	
	
	
	
	
	
);

$optionspage = new ansimuz_options_page($info, $options);

/* Options arguments

	"type" => "text | textarea | image | ",
	"name" => "",
	"id" => "", 
	"desc" => "",
	"default" => ""
	
	
	"type" => "checkbox",
	"name" => "",
	"id" => array(),
	"options" => array(),					
	"desc" => "",
	"default" => array( "checked","not")
	
	
	"type" => "select | radio",
	"name" => "",
	"id" => "",
	"options" => array( ""),					
	"desc" => "",
	"default" => "" 
	
*/