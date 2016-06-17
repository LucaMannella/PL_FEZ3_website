<?php /** Created by Luca on Date: 15/06/2016 at Time: 00:16 **/ ?>

<div id="sidebar">
    <?php
        if( isset($goodbye) && ($goodbye) ) {
            echo "<blockquote style='padding: 0 0 0 1px;'><h6>Goodbye:</h6>",
                "<p style='padding: 0 0 0 5px;'>$username</p></blockquote>";
            $loggedIn   = false;
            $goodbye    = false;
        }
        elseif( isset($loggedIn) && ($loggedIn) )
            echo "<blockquote style='padding: 0 0 0 1px;'><h6>Welcome:</h6>",
                "<p style='padding: 0 0 0 5px;'>$username</p></blockquote>";
    ?>
    <h2> Main Menu </h2>
    <ul class="sidemenu">
        <li><a id="home" href="./index.php"> Home </a></li>
        <?php
        if( isset($loggedIn) && ($loggedIn) ) {
            echo "<li><a id='personalpage' href='./personalPage.php'> Personal Page </a></li>";
            echo "<li><a id='logout' href='./logout.php'> Logout </a></li>";
        }
        else {
            echo "<li><a id='signup' href='./signUp.php'> Sign Up </a></li>";
            echo "<li><a id='login' href='./login.php'> Login </a></li>";
        }
        ?>
        <li><a id="about" href="./about.php"> About </a></li>
    </ul>
</div>