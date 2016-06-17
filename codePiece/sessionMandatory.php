<?php	/** --- sessionMandatory.php --- **/
	/** Created by Luca on Date: 15/06/2016 at Time: 00:15 **/

	session_start();
	$SessionTime = 120;	#time in seconds (the requirement is 2 minutes)
	
	require_once 'destroySession.php';
	
	/** Check if the user is already loggedIn,
		if the timeout was expired the session is destroyed and the user will be redirect to the login page **/
	if( isset($_SESSION['userFEZ03']) ) {
		$username = $_SESSION['userFEZ03'];
	
		if( isset($_SESSION['timeFEZ03']) ) {
			$diff = time() - $_SESSION['timeFEZ03'];	#difference between actual time and last interaction time
			if($diff > $SessionTime) {
				$loggedIn = FALSE;
				destroySession();
				header('HTTP/1.1 307 temporary redirect');	#redirect client to login page
				header('Location:login.php?msg=SessionTimeOutExpired');
				exit;
			}
		}
	
		$_SESSION['timeFEZ03'] = time();
		$loggedIn = TRUE;
	}
	else
		$loggedIn = FALSE;
?>