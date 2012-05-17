 <?php  if(isset($_POST['submit'])) {                    $conn = new Mongo;
            $db = $conn->thundergallery;
            $grid = $db->getGridFS();
$grid->storeUpload("pic", array("unique_id" => $unique_id));

    $m = new Mongo();
    $dbgo = $m->thundergallery;
    $collection = $dbgo->images;
    $cursor = $collection->find();
    $obj = array( "unique_id" => $unique_id); //Adds the URL and Random ID to Mongo
    $collection->insert($obj); 
    
 }
?>

            <form name="newad" method="post" enctype="multipart/form-data"  action="newupload.php">
                 <br/>
                 <label for="pic">Image 1:</label>
                 <input type="file" name="pic"/>
                 <input name='submit' id='submit' type="submit"/>
            </form>