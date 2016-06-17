<?php	/** --- login.php --- **/
	/** Created by Luca on Date: 15/06/2016 at Time: 01:06 **/
	require_once './codePiece/sessionMandatory.php';
	require_once './codePiece/intro.php';
	require_once './library/util.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
		<title>LMS Security Systems</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" href="images/styles.css" type="text/css" />
        <script type="text/javascript" src="library/checks.js "></script>
        <script type="application/javascript" src="library/graphics.js"></script>
    </head>
	
	<body>
	<div id="wrap">
        <?php require_once './codePiece/header.php'; ?>
  		
  		<div id="content-wrap">
            <img src="images/security.jpg" width="950" height="250" alt="headerphoto" class="no-border" />
            <?php require_once './codePiece/sidebar.php'; ?>
    		
    		<div id="main">
    			<?php require_once './codePiece/noscript.php';	?>
      			<?php if( isset($loggedIn) && ($loggedIn) ): ?>
      				<blockquote> <h2>You are already <span class='darkgray'>logged in</span>.</h2></blockquote>
     			<?php else: 
     				if( (isset($_GET["msg"])) && ($_GET["msg"]=="SessionTimeOutExpired") )
     					echo "<p class='red'>Tmeout expired! You have not interacted with our server for too much time!<br>Please, login again! </p>";	?>
     				<h1><span class='darkgray'>Enter</span> <span class='gray'>Your</span> Data</h1>
     				<blockquote>
     				<form id="UserData" method="post" action="./logon.php" >
	        			<label for="Email"> Email: </label>
	        			<input type="text" id="Email" name="email" maxlength="100" placeholder="Insert your email address here" style="width: 200px;">
	        			<label for="Pin"> Pin: </label>
	        			<input type="password" id="Pin" name="pin" minlength="8" maxlength="8" placeholder="Insert your pin here" style="width: 200px;">
	        			<br><br>
	        			<button type="submit" class="button" onclick="return checkLoginValues()"> Log In </button>
     				</form>
     				</blockquote>
				<?php endif ?>
      		</div>
		</div>
  		<?php include_once './codePiece/footer.php'; ?>
	</div>

    <script type="text/javascript">
        setCurrent(document.getElementById("Login"));
        setSpan(document.getElementById("login"), "Login");
        document.forms[0].Email.focus();
    </script>

	</body>
</html>
