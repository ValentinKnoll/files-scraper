<?php
/*
An example of starting a PHP server:
- $ php -S localhost:8000 files-scraper.php
- $ php -S 0.0.0.0:8000 files-scraper.php

Or via console: php files-scraper.php
*/


$from = '';
$to = '';
$extension = '';



if(!$from || !$to || !$extension) exit('Missing parameters!');

include 'DirIterator.php';

$tree = DirIterator::GetTree($from);

if(!is_dir($to)) mkdir($to);
$i = 1;

function scrap_files($tree){
	global $i,$to,$extension;
	foreach ($tree as $key => $value) {
		if(is_array($value)){
			scrap_files($value);
			continue;
		}
		if(pathinfo($value, PATHINFO_EXTENSION) == $extension){
			switch ($i) {
				case $i < 100:
					$prefix = '00000'.$i;
					break;
				case $i < 1000:
					$prefix = '0000'.$i;
					break;	
				case $i < 10000:
					$prefix = '000'.$i;
					break;	
				case $i < 100000:
					$prefix = '00'.$i;
					break;	
				case $i < 1000000:
					$prefix = '0'.$i;
					break;			
				default:
					$prefix = $i;
					break;
			}
			copy($value, $to.DIRECTORY_SEPARATOR.$prefix.'_'.basename($value));
			$i++;
		}
		
	}
}

try{
	set_time_limit(0);
	echo "Please wait ... ";
	scrap_files($tree);
	echo ' Done!';
}catch(Exception $e){
	echo $e->getMessage();
}



