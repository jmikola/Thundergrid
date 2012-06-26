<?php

require '../thundergrid.php';

if (isset($_POST['submit'])) {
    $admin = new Admin();
    $uploadedId = $admin->upload();
}

?>
<!doctype html>
<html>
<head>
    <title>Thundergrid Administration Panel</title>
    <link rel="stylesheet" href="../lib/style/style.css" type="text/css">
</head>

<body>
    <div id="header"><img src="../lib/images/thundergrid_logo.png"></div>

    <div class="upload">
        Upload a file to your database:<br><br>

        <form method="post" enctype="multipart/form-data" action="index.php" id="newad">
            <label for="pic">File 1:</label>
            <input type="file" name="pic">
            <input name="submit" id="submit" type="submit">
        </form>

        <br><br>

        <?php if (!empty($uploadedId)): ?>
            Successfully Uploaded!
        <?php endif; ?>

        <br><br>

        <span class="font: 1px Arial;">Powered by <a href="http://thundergrid.fusionstrike.com">Thundergrid</a> &middot; Developed by <a href="http://www.fusionstrike.com">Fusion Strike</a></span>
    </div>
</body>
</html>
