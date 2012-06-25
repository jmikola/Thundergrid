<?php

try {
	$posted_id = $_GET['unique_id'];
	$conn = new Mongo;
	$db = $conn->thundergrid;
	$grid = $db->getGridFS();
	$file = $grid->findOne(array('unique_id' => $posted_id));
	foreach ($file as $obj) {
		$unique_id = $obj['unique_id'];
		$filename = $obj["filename"];
		$filetype = $obj["filetype"];
		header('Content-Description: File Transfer');
		header("Content-type: ".$filetype."");
		header("Content-disposition: attachment; filename= ".$filename."");
		echo $file->getBytes();
	}
	exit;
	$conn->close();
}catch(MongoConnectionException $e){
	die('Error connecting to MongoDB server');
}catch(MongoException $e){
	die('Error: ' . $e->getMessage());
}
?>