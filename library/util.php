<?php	/** Created by Luca on Date: 15/06/2016 at Time: 00:55 **/

define("PIN_LENGTH",  8);
define("MAC_LENGTH", 17);

/**
 * This function sanitize the string from possible problems.
 * @param $conn
 * @param $var
 * @return string
 */
function sanitizeString($conn, $var) {
	$var = strip_tags($var);
	$var = htmlentities($var);
	$var = stripslashes($var);
	$var = mysqli_real_escape_string($conn, $var);
	return $var;
}

/**
 * This function create a link to database,
 * if it's impossible to create the connection or it's impossible to set the charset utf-8 the method return false.
 * Otherwise the method return the link to the connection.
 *
 * @param string $server
 * @param string $user
 * @param string $pass
 * @param string $database
 *
 * @return boolean|object Returns an object that represent a link to the database, false if something wrong happens.
 */
function connectToDB($server, $user, $pass, $database){
	$conn = mysqli_connect($server, $user, $pass, $database);
	if($conn == false){
		echo "Connection Error (".mysqli_connect_errno().")".mysqli_connect_error();
		return false;
	}
	if( !mysqli_set_charset($conn, "utf8") ) {
		echo "Error loading set utf8:" . mysqli_error($conn);
		mysqli_close($conn);
		return false;
	}

	return $conn;
}

/**
 * This function checks if all the values necessary for the registration of a new device are set in $_POST variable.<BR>
 * This function prints also on the client screen all the missing values.
 * @return bool - True if all the values are not empty, false otherwise.
 */
function validRegistrationValues() {
	# empty() { return (isset($var) || $var == false) }
	# my previous check --> if ( !isset($_POST['mac']) )||( $_POST['mac']==="" )
	$toReturn = true;

	if( empty($_POST['mac']) ) {
		echo "<p>The mac is not set!</p>";
		$toReturn = false;
	}
	else if( (strlen($_POST["mac"]) != 17) || (!isValidMac($_POST["mac"])) ){
		echo "<p>The mac is not correctly set up!</p>";
		$toReturn = false;
	}
	if( empty($_POST['email']) ) {
		echo "<p>The email is not set!</p>";
		$toReturn = false;
	}
	else if( !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) ) {
		echo "<p>The inserted email is not valid!</p>";
		$toReturn = false;
	}
	if( empty($_POST["pin"]) || (strlen($_POST["pin"]) != PIN_LENGTH) ) {
		echo "<p>The PIN is not correctly set!</p>";
		$toReturn = false;
	}
	if( empty($_POST["confirmpin"]) || (strlen($_POST["confirmpin"]) != PIN_LENGTH) ) {
		echo "<p>The confirmation PIN is not correctly set!</p>";
		$toReturn = false;
	}
	if($_POST['confirmpin'] !== $_POST['pin']) {
		echo "<p> The 2 pins must be equal!</p>";
		$toReturn = false;
	}
	return $toReturn;
}

/**
 * This function checks if a mac is already present in the database or not.
 *
 * @param $conn - The connection to the database.
 * @param $table - The name of the table in which the check will be performed.
 * @param $mac - The inserted mac.
 *
 * @return bool - True if the mac doesn't exist, false otherwise.
 */
function isMACRegistered($conn, $table, $mac) {
	$toReturn = false;
	$res = mysqli_query($conn, "SELECT * FROM $table WHERE MAC='$mac'");
	if (!$res)
		echo "<p>Error during mac checking!</p>";
	else {
		$row = mysqli_fetch_array($res);
		if( empty($row['mac']) )
			$toReturn = true;
	}
	mysqli_free_result($res);
	return $toReturn;
}

/**
 * This function checks if all the values necessary for the login are set in $_POST variable.<BR>
 * (Actually Commented) This function prints also on the client screen all the missing values.
 *
 * @return bool - True if all the values are not empty, false otherwise.
 */
function validLoginValues() {
	if( empty($_POST["email"]) || !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) )
		return false;
	if( empty($_POST["pin"]) || (strlen($_POST["pin"]) != PIN_LENGTH) )
		return false;

	return true;
}

/**
 * This function checks if there is a user with the inserted email and pin
 * in the customers table.
 *
 * @param $conn - The connection to the database.
 * @param $email - The inserted email.
 * @param $pin - The inserted pin.
 *
 * @return bool - True if the email doesn't exist, false otherwise.
 */
function validLogin($conn, $email, $pin) {
	$toReturn = true;
	$res = mysqli_query($conn, "SELECT * FROM customers WHERE email='$email' AND pin='$pin'");
	if ($res==false) {
		echo "<p>Error during email checking!</p>";
		$toReturn = false;
	}
	else {
		$row = mysqli_fetch_array($res);
		if(( empty($row['email']) ) || ( empty($row['pin']) ))
			$toReturn = false;
		if(( $email != $row['email'] ) || ( $pin != $row['pin'] ))
			$toReturn = false;
		mysqli_free_result($res);
	}
	return $toReturn;
}

function isValidMac($mac)
{
	// 01:23:45:67:89:ab
	if (preg_match('/^([a-fA-F0-9]{2}:){5}[a-fA-F0-9]{2}$/', $mac))
		return true;
	// 01-23-45-67-89-ab
	else if (preg_match('/^([a-fA-F0-9]{2}\-){5}[a-fA-F0-9]{2}$/', $mac))
		return true;
	else
		return false;
}
?>