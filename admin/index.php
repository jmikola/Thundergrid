        <?php
$filename = '../installed.del.conf';

if (file_exists($filename)) {?>
        <script type="text/javascript">
        <!--
        window.location = "../index.php"
        //-->
        </script>
        Not Installed.
        <?php }?>
<html>
	<head>
		<title>Thundergallery Administration Panel</title>
		<link rel="stylesheet" href="style.css" type="text/css" />
	</head>
		<?php
			require '../core/config.php';
		?>
	</head>
	
<?php
	if(isset($_SESSION['authentication'])){?>
		<script type="text/javascript">
        <!--
        window.location = "main.php"
        //-->
        </script>
        You're already logged in, redirecting you.
	<?php }else{
	
		if(isset($_POST['login'])){
		
			$postedUsername = $_POST['username']; //Gets the posted username, put's it into a variable.
			$postedPassword = $_POST['password']; //Gets the posted password, put's it into a variable.
			$userDatabaseSelect = $m->thundergallery->users; //Selects the user collection
			$userDatabaseFind = $userDatabaseSelect->find(array('username' => $postedUsername)); //Does a search for Usernames with the posted Username Variable
				
				//Iterates through the found results
				foreach($userDatabaseFind as $userFind) {
				    $storedUsername = $userFind['username'];
				    $storedPassword = $userFind['password'];
				}
	
				if($postedUsername == $storedUsername && $postedPassword == $storedPassword){ 
					$_SESSION['authentication'] = 1;
					?>
					
					<script type="text/javascript">
					<!--
					window.location = "main.php"
					//-->
					</script> <?php
					
				}else{
					
					$wrongflag = 1;
				}
				
			}else{}
?>
    <body>
        <div id='header'>
            <img src='/../thundergallery/core/thundergallery_logo.png'>
        </div>  
              
        <div class='login'>
            <form action='index.php' method='post'>
               <br/> You must be logged in to manage the gallery. <br/><br/>
                <?php if($wrongflag == 1){ echo "<font size='2px' color='red' face='Arial'> Wrong Username/Password </font><br/>";} ?>
                <input class='login-text' type='text' name='username' value='Username' onFocus="if(this.value == 'Username') {this.value = '';}" onBlur="if (this.value == '') {this.value = 'Username';}">
                <input class='login-text' type='password' name='password' value='Password' onFocus="if(this.value == 'Password') {this.value = '';}" onBlur="if (this.value == '') {this.value = 'Password';}">
                <input class='login-button' type='submit' name='login' value='Login'>
            </form>
        
            <br/><br/>
        <font size='1px'>Powered by <a href='http://thundergallery.fusionstrike.com'>Thundergallery</a>, developed by <a href='http://www.fusionstrike.com'>Fusion Strike</a>.
    </div>
<?php
    }
?>
    </body>
</html>

