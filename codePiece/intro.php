<?php	/** --- intro.php --- **/
	/** Created by Luca on Date: 15/06/2016 at Time: 00:12 **/

	#Call this file after have calling one from session.php or sessionMandatory.php

 	/** Force the connection on HTTPS **/
 	if($_SERVER["HTTPS"] != "on") {
 		header("HTTP/1.1 301 Moved Permanently");
 		header( "Location: https://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"] );
 		exit();
 	}
	
	/** cookie **/
	if ( !isset($_SERVER["HTTP_COOKIE"]) )
	{	# If I have a cookie it's impossible to enter in this "if"
		if( isset($_GET["ExistCookie"]) )	# If I have this GET and I don't have the cookie, the cookies are disabled!
			die("<p style='color:red'> Your cookies <strong>are disabled</strong>!<br>
				<strong>Without cookies you can't navigate on this website!</strong>.<br>
				<a href='http://www.whatarecookies.com/enable.asp'>Here</a> are the instructions how to enable cookies in all most famous web browser.</p>
				<p>After enabling cookies, please reload the page!</p>");
		else {	# This statement should be executed only the first time that the user visit the page and after the logout
            if( isset($_GET["msg"]))
			    header("Location: http://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]."&ExistCookie=TestValue");
            else
                header("Location: http://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]."?ExistCookie=TestValue");
			exit();
		}
	}

	$db_host = "localhost";
	$db_user = "root";
	$db_pass = "";
    $db_name = "pl_fez03";

	$salt = "lms_fez03";
?>