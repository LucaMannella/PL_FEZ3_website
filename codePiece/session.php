<?php	/** --- session.php --- **/
	/** Created by Luca on Date: 15/06/2016 at Time: 00:13 **/

	session_start();
	$SessionTime = 120;	#time in seconds (the requirement is 2 minutes)
	
	require_once 'destroySession.php';
	
	/** Check if the user is already loggedIn,
		if the timeout was expired the session is destroyed **/
	if( isset($_SESSION['userFEZ03']) ) {
		$username = $_SESSION['userFEZ03'];
		$loggedIn = TRUE;
	
		if( isset($_SESSION['timeFEZ03']) ) {
			$diff = time() - $_SESSION['timeFEZ03'];	#difference between actual time and last interaction time
			if($diff > $SessionTime) {
				$loggedIn = FALSE;
				destroySession();
				$TimeoutExpired = TRUE;
			}
			else
				$_SESSION['timeFEZ03'] = time();
		}
		else
			$_SESSION['timeFEZ03'] = time();
	}
	else
		$loggedIn = FALSE;
?>