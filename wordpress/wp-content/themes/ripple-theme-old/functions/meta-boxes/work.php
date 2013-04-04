<?php

/*
* Meta boxes for the work post type
*/


$info=array(
	'box_name' => 'work-meta-box',
	'title' => 'Work Details',
	'location' => array('work')
);


$options=array(
	
array(
	"type" => "text",
	"title" => "Name",
	"name" => "ansimuz_work_name",				
	"desc" => "The name of this project client",
	"default" => "" ),
	
array(
	"type" => "text",
	"title" => "Project Date",
	"name" => "ansimuz_work_date",				
	"desc" => "Completion date of this project",
	"default" => "" ),

array(
	"type" => "text",
	"title" => "URL",
	"name" => "ansimuz_work_url",				
	"desc" => "Link to this project if any",
	"default" => "" ),
	
array(
	"type" => "text",
	"title" => "Services",
	"name" => "ansimuz_work_services",				
	"desc" => "Services made on this project",
	"default" => "" ),
	
array(
	"type" => "text",
	"title" => "Video",
	"name" => "ansimuz_work_video",				
	"desc" => "You can display a video (vimeo or youtube) by entering the url in this box",
	"default" => "" )
	

	
);

$metabox_post = new ansimuz_meta_box($info, $options);