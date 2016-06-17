<?php /** --- index.php --- **/
	/** Created by Luca on Date: 15/06/2016 at Time: 00:28 **/

	require_once './codePiece/session.php';
	require_once './codePiece/intro.php';
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>LMS Security Systems</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="images/styles.css" type="text/css" />
        <script type="application/javascript" src="library/graphics.js" ></script>
	</head>
	
	<body>
	<div id="wrap">
        <?php require_once './codePiece/header.php'; ?>

  		<div id="content-wrap">
            <img src="images/security.jpg" width="950" height="250" alt="headerphoto" class="no-border" />
            <?php require_once './codePiece/sidebar.php'; ?>
    		
    		<div id="main">
    			<?php require_once './codePiece/noscript.php';	?>
      			<h1>Welcome!</h1>
      			<p><strong>Welcome</strong> to our website!<br>
      				We believe that everyone have the right to live in a safe world. For that reason we develop our
					systems to provide you the best security experience with the maximum confort at a resonable price.</p>
				<p>Do you have already bougth one of our productus?<BR>
                    After a <a href="./signUp.php"><strong>free</strong> registration</a> you can start using your security system!<br>
      				If you already have an account but you bougth a new security system you have to register it anyway
					but you can use the same email address.<BR></p>
				<img src="images/LMS_Logo.png" width="280" height="151" alt="Logo" class="border: 1px solid" style="margin:0 0 0 0;" />
				<p>Our company is available for any questions, feel free to <a href="mailto:info@lms.com">contact us</a>!</p>
				<p>&nbsp;</p>
				<div class="float-left">
      				<h2 class="aligh-left">Our Security Systems</h2>
      				<img class="float-left" src="images/sistema_allarme.jpg" width="350" height="265" alt="Our security systems" class="border: 1px solid" style="margin:0 0 0 0;" /><p>&nbsp;</p>
      			</div>
      			<div class="float-right">
					<h2 class="aligh-right">Our staff</h2>
      				<img class="float-right" src="images/security_man.jpg" width="300" height="193" alt="Our Staff" class="border: 1px solid" style="margin:0 8px 0 0;" /><p>&nbsp;</p>
      			</div>
                <div class="float-left">
                    <h2> Protect your family and your business </h2>
                    <img src="images/skyline.jpg" width="660" height="300" alt="Room" class="border: 1px solid" style="margin:0 0 0 0;" /><p>&nbsp;</p>
                </div>
      		</div>
		</div>
		<?php include_once './codePiece/footer.php'; ?>
	</div>

    <script type="text/javascript">
        setCurrent(document.getElementById("Home"));
        setSpan(document.getElementById("home"), "Home");
    </script>
	</body>
</html>
