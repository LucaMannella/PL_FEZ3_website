<?php /** Created by Luca on Date: 15/06/2016 at Time: 00:20 **/ ?>

<div id='header'>
    <h1 id='logo'><span class='darkgray'>LMS</span> <span class="gray">Security</span> Systems</h1>
        <h2 id='slogan'>Security &amp; protection for your entire family!</h2>
        <ul id='MenuAlto'>
            <li id='Home'><a href='./index.php'><span>Home</span></a></li>
            <?php
            if(isset($loggedIn) && ($loggedIn)) {
                echo "<li id='PersonalPage'><a href='./personalPage.php'><span>Personal Page</span></a></li>";
                echo "<li id='Logout'><a href='./logout.php'><span>Logout</span></a></li>";
            }
            else {
                echo "<li id='SignUp'><a href='./signUp.php'><span>Sign Up</span></a></li>";
                echo "<li id='Login'><a href='./login.php'><span>Login</span></a></li>";
            }
                echo "<li id='About'><a href='./about.php'><span>About</span></a></li>";
            ?>
    </ul>
</div>