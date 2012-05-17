<?php session_start();

	$thunderpath = "http://thundergallery.fusionstrike.com/thundergallery";
	$m = new Mongo();
	$db = $m->thundergallery;
	$collection = $db->images;
	$cursor = $collection->find();
    
    
    // GridFS
    $grid = $db->getGridFS();

?>
<!DOCTYPE html> 

<!-- Shouldn't modify this section, it's the engine -->
<script src="http://code.jquery.com/jquery-1.6.2.min.js"></script>
<script src="../thundergallery/core/lightbox.js"></script>
<!-- You can feel safe editing anything pas here -->

