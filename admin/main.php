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

 ?>
    <body>
        <div id='header'>
            <img src='/../thundergallery/core/thundergallery_logo.png'>
        </div>  
        
        <div class='upload'>
            <?php include 'update.php'; ?>
            Hello! Welcome to your administration.<br/>
            It's important to note that images are not stored in your file system, but they are stored within Mongo itself. <br/><br/>
            <a href='upload.php'><img src='images/upload.PNG'></a> <a href='settings.php'><img src='images/settings.PNG'></a>

        

        <br/><br/>
        <font size='1px' face='Arial'>Powered by <a href='http://thundergallery.fusionstrike.com'>Thundergallery</a> &middot <a href='logout.php'>Logout (Reccomended)</a>.
        </div>
        
<?php
}else{?>
        <script type="text/javascript">
        <!--
        window.location = "index.php"
        //-->
        </script>
        You're not logged in, redirecting you.
<?php }
?>