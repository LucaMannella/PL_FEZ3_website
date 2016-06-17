<?php	/** --- logout.php --- **/
	/** Created by Luca on Date: 16/06/2016 at Time: 17:52 **/
	require_once './codePiece/sessionMandatory.php';
	require_once './codePiece/intro.php';
	
	if( !isset($loggedIn) || (!$loggedIn) ){
		$result = "<h2>You are not logged in!</h2>";
		if( isset($TimeoutExpired)&&($TimeoutExpired) )
			$result = $result."<p class='red'>Timeout expired! You have not interacted with our server for too much time!</p>";
	}
	else {
		destroySession();
		$result = "<h2>You have been successfully logged out.</h2>"
				."<p class='darkgray'>Did you make a mistake? Click <a href='./login.php'>here</a> to login again!</p>";
        $goodbye = true;
	}
    $loggedIn = false;
?>


<!DOCTYPE html>
<html lang="en">
    <head>
		<title>LMS Security Systems</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" href="images/styles.css" type="text/css" />
        <script type="text/javascript" src="library/checks.js"></script>
    </head>
	
	<body>
	<div id="wrap">
        <?php require_once './codePiece/header.php'; ?>
  		
  		<div id="content-wrap">
            <img src="images/security.jpg" width="950" height="250" alt="headerphoto" class="no-border" />
            <?php require_once './codePiece/sidebar.php'; ?>
    		
    		<div id="main">
    			<?php require_once './codePiece/noscript.php';	?>
      			<blockquote> <?php echo $result; ?>	</blockquote>
      		</div>
		</div>
		<?php include_once './codePiece/footer.php'; ?>
	</div>
	</body>
</html>
