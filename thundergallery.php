<?php
class Gallery extends Mongo{
		function uniqueID(){
			$db = $this->thundergallery;
			$collection = $db->images;
			$cursor = $collection->find();
				foreach ($cursor as $obj) {
				$unique_id = $obj['unique_id'];
				echo " <a href='lib/getimage.php?unique_id=".$unique_id."' class='lightbox_trigger'><img height='100px' width='100px' src='lib/getimage.php?unique_id=".$unique_id."'></a> ";
				}
		}
}

?>