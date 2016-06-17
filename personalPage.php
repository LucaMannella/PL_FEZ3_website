<?php	/** --- personalPage.php --- **/
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
    		<?php if($loggedIn):

                /**********************************/
                /******* REMOVE RESERVATION *******/
                /**********************************/
/*              if(count($_POST)!==0) {
                    if(isset($_POST['id'])) {
                        $id = $_POST['id'];

                        $conn = connectToDB($db_host, $db_user, $db_pass, $db_name);
                        if($conn !== false) {
                            $id = sanitizeString($conn, $id);
                            try {
                                if(!mysqli_autocommit($conn, FALSE))
                                    throw new Exception("DEBUG - Impossible to set autocommit to FALSE");

                                $res = mysqli_query($conn, "SELECT * FROM booking WHERE id=$id AND username='$username' FOR UPDATE ");
                                if(!$res)	# Fetch data from the database
                                    throw new Exception("DEBUG - Query 1 (fetch reservation's info) failed!");
                                $row = mysqli_fetch_array($res);
                                if($row==NULL)
                                    throw new Exception("<p class='red'>The desired reservation does not exist anymore!</p>");
                                mysqli_free_result($res);

                                $res = mysqli_query($conn, "DELETE FROM booking WHERE id=$id");
                                if(!$res)	# Remove reservation from the database
                                    throw new Exception("DEBUG - Query 2 (delete reservation) failed!");

                                if(!mysqli_commit($conn))
                                    throw new Exception("<p style='color:red'>Impossible to commit the operation!</p>");

                                if(!mysqli_autocommit($conn, TRUE))
                                    throw new Exception("DEBUG - Impossible to set autocommit to TRUE");
                            }
                            catch (Exception $e) {
                                mysqli_rollback($conn);
                                mysqli_autocommit($conn, TRUE);
                                echo $e->getMessage();
                            }
                            mysqli_close($conn);
                        }
                    }
	    		}
*/
                /***********************************/
                /********* DISPLAY PICTURES ********/
                /***********************************/
                $conn = connectToDB($db_host, $db_user, $db_pass, $db_name);

                $query = "SELECT Path
                          FROM suspicious_pictures SP, customers C
                          WHERE SP.MAC = C.MAC AND C.email = '$username';";
                $res = mysqli_query($conn, $query);
                if (!$res):
                    echo "<p>Error during the download of the reservations!</p>";
                else:
                    $row = mysqli_fetch_array($res);
                    if($row==NULL)
                        echo "<BLOCKQUOTE><p><span class='darkgray'>There are no suspicious pictures right now.</span></h3></p></BLOCKQUOTE>";
                    else {
                        $counter = 1;
                        while ($row != NULL) {
                            $picture_path = $row["Path"];
                            echo  "<img src='$picture_path' alt='picture$counter'>";

                            $row = mysqli_fetch_array($res);
                            $counter++;
                        }
                        if($counter == 1)
                            echo "<BLOCKQUOTE><p><span class='darkgray'>There are no suspicious pictures right now!</span></h3></p></BLOCKQUOTE>";
                    }
                    mysqli_free_result($res);
                endif;

                mysqli_close($conn);

      		else:
      			echo "<h3>You can't see this page if you are not a registered user!</h3>";
      			echo "<h4>Go <strong><a href='signUp.php'>here</a></strong> for create a new account!</h4>";
      			echo "<h4>If you are already registered, please <strong><a href='login.php'>log in</a></strong>!</h4>";
      		endif; ?>
      		</div>
		</div>
  		
	  	<?php include_once './codePiece/footer.php'; ?>
	</div>

    <script type="text/javascript">
        setCurrent(document.getElementById("PersonalPage"));
        setSpan(document.getElementById("personalpage"), "Personal Page");

        function showTooltip(ObjId) {
            ObjId.style.visibility="visible";
        }

        function hideTooltip(ObjId) {
            ObjId.style.visibility="hidden";
        }
    </script>

	</body>
</html>