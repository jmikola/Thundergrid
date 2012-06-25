<?php
global $successfulUpload;

class Gallery extends Mongo{
	function uniqueID(){
		$db = $this->thundergrid;
		$collection = $db->images;
		$cursor = $collection->find();
		foreach ($cursor as $obj) {
			$unique_id = $obj['unique_id'];
			$filename = $obj["filename"];
			$filetype = $obj["filetype"];

			$parts = explode(".",$filename);
			$extension = end($parts);
			$name = ucwords(str_replace("." . $extension,"",$filename));
			echo "<a href='lib/download.php?unique_id=".$unique_id."'>".$name."</a> | ".$filetype."<br/>";
		}
	}
}

class Admin extends Mongo{
	function upload(){

		$filetype = $_FILES["pic"]["type"];
		$filename = $_FILES["pic"]["name"];
		$unique_id = "content".rand(); //Generates a random ID and stores in within the unique_id variable

		$conn = new Mongo;
		$db = $conn->thundergrid;
		$grid = $db->getGridFS();
		$grid->storeUpload("pic", array("unique_id" => $unique_id, "filetype" => $filetype, "filename" => $filename));

		$m = new Mongo();
		$dbgo = $m->thundergrid;
		$collection = $dbgo->images;
		$cursor = $collection->find();
		$obj = array( "unique_id" => $unique_id, "filetype" => $filetype, "filename" => $filename);
		$collection->insert($obj);
		$successfulUpload = 1;
	}
}

?>