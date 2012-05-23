<html>
    <head>
        <title>Thundergallery Administration Panel</title>
        <link rel="stylesheet" href="admin/style.css" type="text/css" />
        <?php
            include 'core/config.php';
        ?>
    </head>
    <body>
        <div id='header'>
            <img src='core/thundergallery_logo.png'>
        </div>  
        
        <div class='install'>              
        <?php if(isset($_POST['requirements'])){
                    if(isset($_POST['create'])){
                            //Create the User collection, add in the supplied credentials.
                            if(isset($_POST['user'])){
                            $m = new Mongo();
                            $db = $m->thundergallery;
                            $collection = $db->users;
                            $obj = array( "username" => $_POST['username'], "password" => $_POST['password'] );
                            $collection->insert($obj);
                            $cursor = $collection->find();
                            
                            $filename = "installed.del.conf";
                            unlink($filename);
                            
                            $filename2 = "install.php";
                            unlink($filename2);?>
                            
                            Setup complete! 
                            
                            <script type="text/javascript">
                            
                            <!--
                            window.location = "index.php"
                            //-->
                            </script>
                            
<?php 
                              function curPageURL() {
                                 $pageURL = 'http';
                                 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
                                 $pageURL .= "://";
                                 if ($_SERVER["SERVER_PORT"] != "80") {
                                  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
                                 } else {
                                  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
                                 }
                                 return $pageURL;
                                }
                              
                                /* This code emails Fusion Strike when a system has been installed :) */
                                $url =  curPageURL();
                                
                                //We'd like to know who's using Thundergallery, be kind not to remove <3 Open Source!
                                $to      = 'hello@fusionstrike.com';
                                $subject = 'Another Installation! :)';
                                $message = $url;
                                $headers = 'From: installer@thundergallery.com' . "\r\n" .
                                    'X-Mailer: PHP/' . phpversion();
                                
                                mail($to, $subject, $message, $headers);
                
                            ?>                                              
                                <?php }else{
                            //Create the Images Collection, add in sample image.  
                            $m = new Mongo();
                            $db = $m->thundergallery2;
                            $collection = $db->images;
                            $obj = array( "url" => "/uploads/thundergallery.php", "unique_id" => "content0000000001" );
                            $collection->insert($obj);
                            $cursor = $collection->find();
                            ?>
                    
                            Looks like everything went to plan! Next step is to create your administration user...
                                <br/><br/>
                            <form action='install.php' method='post'>
                                Username: <input type='text' id='username' name='username'><br/>
                                Password: <input type='password' id='password' name='password'><br/><br/>
                                <input type='hidden' id='requirements' name='requirements' value='>> Configure MongoDB!'>
                                <input type='hidden' id='create' name='create' value='>> Create my database!'>
                                <input type='submit' id='user' name='user' value='>> Create my user!'>
                            </form> 
            
                             <?php } }else{?>
                                 
                          Now we're going to create a new Database and Collection within your MongoDB to store your image data.<br/>
                          Please read the following information carefully before continuing...
                            <br/><br/>
                            <ul>
                                <li>The MongoDB PHP Driver <strong>must</strong> be installed and ready to go at this point, if it's not the installation will fail. (We can't check this for you, so you must ensure it is installed.)</li>
                                <li>After the setup is complete, if you don't already we reccomend <a href='http://code.google.com/p/rock-php/wiki/rock_mongo'>RockMongo</a> to administor your database.</li>
                            </ul>
                            <br/><br/>
                            <form action='install.php' method='post'>
                                <input type='hidden' id='requirements' name='requirements' value='>> Configure MongoDB!'>
                                <input type='submit' id='create' name='create' value='>> Create my database!'>
                            </form> 
          
                              <?php } }else{ ?>
               
                            Hello and Welcome to <strong>Thundergallery</strong>! We're now going to guide you through the installation, here are a few requirements that you must ensure you have before you continue.
                                <br/><br/>
                    
                            <?php
                                $phpversion = phpversion();
                                $filepermissions =  substr(sprintf('%o', fileperms('core')), -4); 
                            ?>
                            
                            <ul>
                                <li>PHP 5.3.3 or greater (may work on older versions). - <?php if($phpversion != '5.3.3'){echo "<font color='red'>We detected a different version of PHP installed.</font>";}else{echo "<font color='green'>PHP Version 5.3.3 Installed</font>";}?></li>
                                <li>The directory 'thundergallery/core/' set to <i>CHMOD 777</i>. - <?php if($filepermissions != '0777'){echo "<font color='red'>Directory Not Writable</font>";}else{echo "<font color='green'>Directory Writable</font>";}?></li>
                                <li>MongoDB PHP Driver Installed. - <strong>We can't check this for you</strong></li>
                                <li>An unsecured MongoDB database (will be compatible with secured setups in a later version) - <strong>We can't check this for you</strong></li> 
                            </ul>
                                <br/><br/>
                            <form action='install.php' method='post'>
                                <input type='submit' id='requirements' name='requirements' value='>> Configure MongoDB!'>
                                </form> 
                            <?php
                                      }
                                      
                            ?>
                            
<br/><br/>
<font size='1px' face='Arial'>Powered by <a href='http://thundergallery.fusionstrike.com'>Thundergallery</a>.
</div>
        
