<?php

class Controller {
    protected $grid;

    public function __construct(Mongo $mongo = null, $database = 'thundergrid') {
        if (null === $mongo) {
            $mongo = new Mongo();
        }

        $this->grid = $mongo->selectDB($database)->getGridFS();
    }
}

class Gallery extends Controller {
    function getLinks() {
        $links = array();

        foreach ($this->grid->find() as $file) {
            $id = (string) $file->file['_id'];
            $filename = htmlspecialchars($file->file["filename"]);
            $filetype = isset($file->file["filetype"]) ? $file->file["filetype"] : 'application/octet-stream';

            $links[] = sprintf('<a href="lib/download.php?id=%s">%s</a> | %s', $id, $filename, $filetype);
        }

        return $links;
    }
}

class Download extends Controller {
    function getFile($id) {
        return $this->grid->findOne(array('_id' => new MongoId($id)));
    }
}

class Admin extends Controller {
    function upload() {
        $filetype = image_type_to_mime_type(exif_imagetype($_FILES['pic']['tmp_name']));
        return $this->grid->storeUpload('pic', array('filetype' => $filetype));
    }
}
