<link rel="stylesheet" href="../thundergallery/themes/default/style.css" type="text/css" />

<?php 
require 'config.php';
	function displayGallery(){
		//Make Mongo connections global
		global $m;
		global $db;
		global $collection;
		global $cursor;
		global $collection;		
		
		// Iterate through the found image results
		foreach ($cursor as $obj) {
			echo "
			
	<a href='http://thundergallery.fusionstrike.com/thundergallery" . $obj["url"] ."' class='lightbox_trigger'><img src='http://thundergallery.fusionstrike.com/thundergallery" . $obj["url"] . "' height='". $obj["height"] ."px' width='". $obj["width"] ."px'></a>
			
			";
			 
		}
		
		
		}
?>
