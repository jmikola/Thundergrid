<?php
session_start();
require '../thundergrid.php';
$upload_dir = "../uploads/"; //Specified the upload directory
if(isset($_POST['submit'])){ //Checks if the upload form has been submitted, if so, continue
	$admin = new Admin();
	$upload = $admin->upload();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
    <title>Thundergrid Administration Panel</title>
    <link rel="stylesheet" href="../lib/style/style.css" type="text/css">
</head>

<body>
    <div id='header'><img src='../lib/images/thundergrid_logo.png'></div>

    <div class='upload'>
        Upload a file to your database:<br>
        <br>

        <form method="post" enctype="multipart/form-data" action="index.php" id="newad">
            <br>
            <label for="pic">File 1:</label> <input type="file" name="pic"> <input name='submit' id='submit' type="submit">
        </form><br>
        <br>
        <?php
if($successfulUpload == 1){
	echo "Successfully Uploaded!";
}else{ }

?><br>
        <br>
        <font size='1px' face='Arial'>Powered by <a href='http://thundergrid.fusionstrike.com'>Thundergrid</a> &middot; Developed by <a href='http://www.fusionstrike.com'>Fusion Strike</a>.</font>
    </div>
</body>
</html>
