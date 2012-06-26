<?php

require '../thundergrid.php';

try {
    $download = new Download();
    $file = $download->getFile($_GET['id']);

    if (null === $file) {
        header('HTTP/1.0 404 Not Found');
        exit;
    }

    $filename = $file->file["filename"];
    $filetype = isset($file->file["filetype"]) ? $file->file["filetype"] : 'application/octet-stream';

    header('Content-Description: File Transfer');
    header('Content-type: '.$filetype);
    header('Content-disposition: attachment; filename='.$filename);
    echo $file->getBytes();
} catch(MongoConnectionException $e) {
    die('Error connecting to MongoDB server');
} catch(MongoException $e) {
    die('Error: ' . $e->getMessage());
}
