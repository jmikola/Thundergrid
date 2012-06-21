<html>
    <head>
        <title>Thundergallery Administration Panel</title>
        <link rel="stylesheet" href="style.css" type="text/css" />
        <?php
require '../core/config.php';
?>
    </head>

    <?php
if(isset($_SESSION['authentication'])){ //Checks if user is authetnticated & logged in
	$upload_dir = "../uploads/"; //Specified the upload directory

	if(isset($_POST['submit'])){ //Checks if the upload form has been submitted, if so, continue

		$unique_id = "content".rand(); //Generates a random ID and stores in within the unique_id variable

		$conn = new Mongo;
		$db = $conn->thundergallery;
		$grid = $db->getGridFS();
		$grid->storeUpload("pic", array("unique_id" => $unique_id));

		$m = new Mongo();
		$dbgo = $m->thundergallery;
		$collection = $dbgo->images;
		$cursor = $collection->find();
		$obj = array( "unique_id" => $unique_id);
		$collection->insert($obj);
		$successfulUpload = 1;
	}
?>

    <body>
        <div id='header'>
            <img src='/../thundergallery/core/thundergallery_logo.png'>
        </div>

        <div class='upload'>
            Upload an image to your gallery:<br/><br/>

            <form name="newad" method="post" enctype="multipart/form-data"  action="upload.php">
                 <br/>
                 <label for="pic">Image 1:</label>
                 <input type="file" name="pic"/>
                 <input name='submit' id='submit' type="submit"/>
            </form>
        <br/><br/>

    <?php
	if($successfulUpload == 1){
		echo "Successfully Uploaded!";
	}else{ }
?>

        <br/><br/>
        <font size='1px' face='Arial'>Powered by <a href='http://thundergallery.fusionstrike.com'>Thundergallery</a> &middot <a href='logout.php'>Logout (Reccomended)</a>.
        </div>

    <?php }else{ ?>
        <script type="text/javascript">
        <!--
        window.location = "index.php"
        //-->
        </script>
        You're not logged in, redirecting you.
    <?php } ?>
</body>
</html>