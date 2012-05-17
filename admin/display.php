<?php
    $m = new Mongo();
    $db = $m->thundergallery;
    $collection = $db->images;
    $cursor = $collection->find();

    foreach ($cursor as $obj) {
        $unique_id = $obj['test'];
        echo "<img height='100px' width='100px' src='getimage.php?unique_id=".$unique_id."'>";
    }
?>