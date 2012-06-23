<?php
try {
	$posted_id = $_GET['unique_id'];
	header('Content-type: image/jpeg');
	$conn = new Mongo;
	$db = $conn->thundergallery;
	$grid = $db->getGridFS();
	$file = $grid->findOne(array('unique_id' => $posted_id));
	echo $file->getBytes();
	exit;
	$conn->close();
}catch(MongoConnectionException $e){
	die('Error connecting to MongoDB server');
}catch(MongoException $e){
	die('Error: ' . $e->getMessage());
}
?>