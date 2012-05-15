<html>
	<head>
		<title>Thundergallery - A lightening fast & Open PHP Image Gallery</title>
		<meta name="description" content="A rock solid, lightning fast, PHP Gallery System, Open Source & Easily Customizable." />
	</head>

	<body>
		<img src='../thundergallery/core/thundergallery_logo.png'><br/><br/><br/>	
		
		<?php
$filename = 'installed.del.conf';

if (file_exists($filename)) {?>
  
		<font face='Arial' size='2px'>
			<center><strong>Thundergallery</strong> is not installed.<br/><br/>
						<a href='../thundergallery/install.php'>Run the installer</a>
</center>	
		</font>
<?php
} else {?>
	
		<font face='Arial' size='2px'>
			<center>To get started with <strong>Thundergallery</strong> you must include the 'thundergallery.php' file within the page you wish it to be displayed on.<br/><br/>
						Add this line to the page you wish to display your gallery: <br/><br/><i>&lt;?php require '../thundergallery/thundergallery.php'; ?&gt;</i><br/><br/><br/>
						You can then delete index.php from the /thundergallery directory.<br/><br/><br/>
						If you're having problems getting Thundergallery to work, check out the documentation included with your download! (guide.rtf)
</center>	
		</font>
		
		<?php }
?>
					

		<br/><br/>
		

</body>
</html>
