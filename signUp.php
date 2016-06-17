<?php	/** --- signUp.php --- **/
	require_once './codePiece/session.php';
	require_once './codePiece/intro.php';
	require_once './library/util.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
		<title>LMS Security Systems</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" href="images/styles.css" type="text/css" />
        <script type="text/javascript" src="library/checks.js"></script>
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
    		    <?php if(!$loggedIn) echo "<h1><span class='darkgray'>Enter</span> <span class='gray'>Your</span> Data</h1>"; ?>
      			<blockquote>
      			<?php if($loggedIn): ?>
      				<h2>You are already <span class='darkgray'>logged in</span>.</h2>
      				<p>If you want to create a <span class='darkgray'>new account</span>, you must do the <a href='./logout.php'><span class='darkgray'>log out</span></a>.</p>
     			<?php else: ?>
      				<form id="UserData" method="post" action="registration.php" >
						<label for="MAC"> MAC address: </label>
						<input type="text" id="MAC" name="mac" minlength="17" maxlength="17" placeholder="Enter the pin of your system" style="width: 200px;">
	        			<label for="Email"> Email address: </label>
	        			<input type="text" id="Email" name="email" maxlength="100" placeholder="Enter your email address" style="width: 200px;">
	        			<label for="Pin"> PIN: </label>
	        			<input type="password" id="Pin" name="pin" minlength="8" maxlength="8" placeholder="Choose your PIN" style="width: 200px;">
	        			<label for="ConfirmPin"> Confirm PIN: </label>
	        			<input type="password" id="ConfirmPin" name="confirmpin" minlength="8" maxlength="8" placeholder="Re-enter the same PIN" onkeyup="checkPinsEqual();" style="width: 200px;">
	        			<img id="imgpwd" class="no-border" src="" style="height: 25px; width: 25px; position: relative; margin-left: 10px; margin-top: -5px; visibility: hidden;">
	        			<br><br>
	        			<button type="submit" class="button" onclick="return checkRegistrationValues()"> Sign Up </button>
	        			<button type="button" class="button" onclick="resetForm()"> Reset </button>
     				</form>
     			<?php endif ?>
     			</blockquote>
      		</div>
		</div>
	  	<?php include_once './codePiece/footer.php'; ?>
	</div>

    <script type="text/javascript">
        setCurrent(document.getElementById("SignUp"));
        setSpan(document.getElementById("signup"), "Sign Up");
        document.forms[0].MAC.focus();

        function resetForm(){
            document.getElementById("imgpwd").style.visibility = "hidden";
            document.getElementById('UserData').reset();
            document.forms[0].MAC.focus();
        }
    </script>

	</body>
</html>
