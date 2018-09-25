<?php

/*
*  Instance Configuration
*  ----------------------
*  Edit this file and not config.php for imageboard configuration.
*
*  You can copy values from config.php (defaults) and paste them here.
*/


	$config['db']['server'] = 'localhost';
	$config['db']['database'] = 'cae';
	$config['db']['prefix'] = 'board_';
	$config['db']['user'] = 'cae';
	$config['db']['password'] = '123poop';


	$config['cookies']['mod'] = 'mod';
	$config['cookies']['salt'] = 'YmIyMWQ5MDAwNDVkNjcwZDE3NmQ2Nz';

	$config['flood_time'] = 10;
	$config['flood_time_ip'] = 120;
	$config['flood_time_same'] = 30;
	$config['max_body'] = 1800;
	$config['reply_limit'] = 250;
	$config['max_links'] = 20;
	$config['max_filesize'] = 10485760;
	$config['thumb_width'] = 255;
	$config['thumb_height'] = 255;
	$config['max_width'] = 10000;
	$config['max_height'] = 10000;
	$config['threads_per_page'] = 10;
	$config['max_pages'] = 10;
	$config['threads_preview'] = 5;
	$config['root'] = '/cae/';
	$config['secure_trip_salt'] = 'MjY5MjFhNjk4MWE0ZTZkNWJmZGNlND';

