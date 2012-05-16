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
                $arr = array($_FILES["file"], $_FILES["file2"], $_FILES["file3"], $_FILES["file4"], $_POST['height'], $_POST['width'] ); //Begins the array for the file uploads
                    foreach ($arr as &$value) {
                    
                        if ($value["error"] > 0){
                            //Error uploading the file, script stops here
                        }else{
                        
                        if (file_exists($upload_dir . $value["name"])){
                            //Error uploading the file, a file with the same name already exists, script stops here
                         } else {
                            move_uploaded_file($value["tmp_name"], $upload_dir. $value["name"]);
                            $successful = 1; //Sets the upload flag to 1, will display sucsess message below upload form      
                      
                            $url = "/uploads/" . $value["name"]; //Places the Upload Path into the URL varliable
                            $unique_id = "content".rand(); //Generates a random ID and stores in within the unique_id variable
                            
                            $obj = array( "url" => $url, "unique_id" => $unique_id, "height" => $height, "width" => $width ); //Adds the URL and Random ID to Mongo
                            $collection->insert($obj);
                                }
                            }
        } unset($value); }else{ }
    ?>
    
    <body>
        <div id='header'>
            <img src='/../thundergallery/core/thundergallery_logo.png'>
        </div>  
        
        <div class='upload'>
            Upload an image to your gallery:<br/><br/>
            <form name="newad" method="post" enctype="multipart/form-data"  action="upload.php">
                <br/>
                <label for="file">Image 1:</label>
                <input type="file" name="file" id="file" />
                
                <label for="file">Image 2:</label>
                <input type="file" name="file2" id="file2" />

                <label for="file">Image 3:</label>
                <input type="file" name="file3" id="file3" />
                
                <label for="file">Image 4:</label>
                <input type="file" name="file4" id="file4" />
                <br/><br/>
                <input type="submit" class='upload-button' name="submit" value="Upload" />  
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