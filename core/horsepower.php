<?php require 'config.php'; ?>
<link rel="stylesheet" href="../thundergallery/themes/default/style.css" type="text/css" />

<?php 
    	function displayGallery(){
            $m = new Mongo();
            $db = $m->thundergallery;
            $collection = $db->images;
            $cursor = $collection->find();
        
            foreach ($cursor as $obj) {
                $unique_id = $obj['unique_id'];
                echo " <a href='core/getimage.php?unique_id=".$unique_id."' class='lightbox_trigger'><img height='100px' width='100px' src='core/getimage.php?unique_id=".$unique_id."'></a> ";
            }	
    	}
?>



