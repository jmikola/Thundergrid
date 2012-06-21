<html>
    <head>
        <title>Thundergallery Administration Panel - System Settings</title>
        <link rel="stylesheet" href="style.css" type="text/css" />
        <?php
require '../core/config.php';
?>
    </head>

    <?php
if(isset($_SESSION['authentication'])){ //Checks if user is authetnticated & logged in
	$upload_dir = "../uploads/"; //Specified the upload directory

	if(isset($_POST['update-dimensions'])){
		foreach ($cursor as $obj) {
			$unique_id = $obj['unique_id'];
			$height = $_POST["height"];
			$width = $_POST["width"];
			$collection->update(array('unique_id' => $unique_id), array('$set' => array('height' => $height, 'width' => $width)));
			$successfulUpdate = 1; //Sets the update flag to 1, will display sucsess message below upload form
		}
	}else{}
?>

    <body>
        <div id='header'>
            <img src='/../thundergallery/core/thundergallery_logo.png'>
        </div>

        <div class='upload'>
        Manage your system settings:<br/><br/>
        <form action='main.php' method='post'>
                <strong>Image Sizes:</strong>
                Height: <input type="text" style="width:80px;" name="height" id="height">px
                Width: <input type="text" style="width:80px;" name="width" id="width">px<br/><br/>
               <input type="submit" class='upload-button' name="update-dimensions" value="Update" />
        </form><br/>

        <?php
	if($successfulUpdate == 1){
		echo "Successfully Updated!";
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