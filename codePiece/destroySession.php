<?php	/** --- destroySession.php --- **/
	/** Created by Luca on Date: 15/06/2016 at Time: 00:01 **/

	function destroySession() {
		$_SESSION=array();
	
		if (session_id() != "" || isset($_COOKIE[session_name()]))
			setcookie(session_name(), '', time()-2592000, '/');
	
		session_unset(); 	// empty session
		session_destroy();	// destroy session
	}
?>