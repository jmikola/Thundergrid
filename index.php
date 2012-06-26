<?php

require 'thundergrid.php';

$gallery = new Gallery();
$links = $gallery->getLinks();

?>
<!doctype html>
<html>
<head>
    <title>Thundergrid</title>
</head>
<body>
    <img src='lib/images/thundergrid_logo.png'><br><br>

    <?php if (empty($links)): ?>
        <p>There are no files in GridFS.</p>
    <?php else: ?>
        <?php foreach ($links as $link): ?>
            <?php echo $link; ?><br>
        <?php endforeach; ?>
    <?php endif ?>
</body>
</html>
