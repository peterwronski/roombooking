<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BookARoom@RGU</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

    <link rel="stylesheet" href="style.css">


</head>
<body>

<script>
    //SOURCE: http://stackoverflow.com/questions/14667829/how-to-create-a-sticky-navigation-bar-that-becomes-fixed-to-the-top-after-scroll -->
    $(document).ready(function() {
        var img = document.getElementById('logo');
        var height = img.clientHeight;
        $(window).scroll(function () {
            //if you hard code, then use console
            //.log to determine when you want the
            //nav bar to stick.
            console.log($(window).scrollTop())
            if ($(window).scrollTop() > height+1 ) {
                $('#nav_bar').addClass('navbar-fixed-top');
            }
            if ($(window).scrollTop() < height ) {
                $('#nav_bar').removeClass('navbar-fixed-top');
            }
        });
    });
</script>

<script>
    // handle links with @href started with '#' only
    $(document).on('click', 'a[href^="#"]', function(e) {
        // target element id
        var id = $(this).attr('href');

        // target element
        var $id = $(id);
        if ($id.length === 0) {
            return;
        }

        // prevent standard hash navigation (avoid blinking in IE)
        e.preventDefault();

        // top position relative to the document
        var pos = $id.offset().top;

        // animated top scrolling
        $('body, html').animate({scrollTop: pos});
    });
</script>




<div id="top"></div>
<div id="logobg">
<img src="img/logoblack.png" width="60%" height="60%" class="center-block img-responsive" id="logo"/>
</div>
<nav id="nav_bar" class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
           <!-- <a class="navbar-brand" href="index.php"><img src="img/logowhite.png" width="250px"/></a> -->
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">

                <?php
                $_SESSION['currentpage'] = $_SERVER['REQUEST_URI'];

                //this changes links - if user is on index.php, smooth scrolling is enabled (for some reason the smooth scrolling script only works with # links)
                if ($_SESSION['currentpage'] == '/index.php' OR $_SESSION['currentpage'] == '/'){
                    echo '<li><a href="#top">Home</a></li>
                <li><a href="#rooms">Our Rooms</a></li>
                <li><a href="#booking">Book a Room</a></li>
                <li><a href="#rooms">Check Your Bookings</a></li>
                ';
                }
                else {
                    echo '<li><a href="index.php#top">Home</a></li>
                <li><a href="index.php#rooms">Our Rooms</a></li>
                <li><a href="index.php#booking">Book a Room</a></li>
                <li><a href="index.php#rooms">Check Your Bookings</a></li>';
                }

                ?>
            </ul>


            <ul class="nav navbar-nav navbar-right">
                <?php
                if (isset($_SESSION['userloggedin'])&&(($_SESSION['userloggedin']) == true)) {
                    echo'<li><a href="useraccount.php">Welcome ' .$_SESSION['userloggedin'].'</a></li>
                <li><a href="logout.php"><span class="glyphicon glyphicon-user"></span> Log out</a></li>';
                }
                else{
                    echo'<li><a href="#loginpage"><span class="glyphicon glyphicon-user"></span> Sign Up / Login</a></li>';
                };
                ?>
            </ul>
        </div>
    </div>
</nav>
