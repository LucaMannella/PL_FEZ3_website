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
                <form id="UserData" method="post" action="./personalPage.php" >
                    <label style="display:inline">Press this button to remove all your pictures </label>
                    <input type="text" name="DeleteAll" style="visibility: hidden; display: inline" >
                    <button type="submit" class="button" style="display:inline"> Remove Pictures </button>
                </form>

    		<?php require_once './codePiece/noscript.php';	?>
    		<?php if($loggedIn):

                /**********************************/
                /******* REMOVE RESERVATION *******/
                /**********************************/
                if(count($_POST)!==0) {
                    if(isset($_POST['DeleteAll'])) {
                        $conn = connectToDB($db_host, $db_user, $db_pass, $db_name);

                        if($conn !== false)
                        {
                            $query = "SELECT MAC FROM customers WHERE email = '".$username."';";
                                      
                            $res = mysqli_query($conn, $query);

                            if($res) {
                                $row = mysqli_fetch_array($res);
                                if($row != null) {
                                    $myMac = $row["MAC"];
                                    // in this case I suppose that for one email there is only one MAC

                                    $query = "DELETE FROM suspicious_pictures WHERE MAC = '".$myMac."';";

                                    $res = mysqli_query($conn, $query);
                                    if (!$res): ?>
                                        <script type="text/javascript">
                                            window.alert("Impossible to delete the pictures from the database!");
                                        </script>
                                    <?php else:
                                        $myMac = str_replace("-","", $myMac);
                                        $myPath = getcwd()."/suspicious_pictures/".$myMac."/";
                                        $ok = DeleteDirectory($myPath);
                                        if($ok) { ?>
                                        <script type="text/javascript">
                                            window.alert("Pictures successfully deleted!");
                                        </script>
                                    <?php }
                                    endif;
                                }
                            }
                            mysqli_close($conn);
                        }
                    }
	    		}

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