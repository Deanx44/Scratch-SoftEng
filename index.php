<?php
session_start();
session_regenerate_id();

if (isset($_GET['logout'])) {
    unset($_SESSION['userid']);
    echo "<script>window.location.href='index.php?index';</script>";
}

if (isset($_GET['Logout'])) {
    unset($_SESSION['adminid']);
    echo "<script>window.location.href='index.php';</script>";
}


// if(isset($_SESSION['userid'])) {
//     header("Location:dashboard.php?userid=$_SESSION[userid]");
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/base6.css">
    <link rel="stylesheet" href="../CSS/user6.css">
    <?php include "../inc/cdn.php" ?>
    <title>Login</title>
    <style>
        .row,
        .col {
            margin: 0;
            padding: 0;
        }

        ul a {
            transition: 0.3s;
        }

        ul .hover:hover {
            opacity: 0.8;
        }
    </style>
    <style>
        body {
            background: linear-gradient(135deg, #e0f7fa 0%, #fffde4 100%);
            font-family: 'Segoe UI', 'Arial', sans-serif;
            color: #254252;
        }
        .wrapper {
            background: rgba(255,255,255,0.93);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.09);
            border-radius: 18px;
            margin: 30px auto 0 auto;
            padding: 0 0 20px 0;
            max-width: 2400px;
        }
        .header {
            background: linear-gradient(90deg, #26c6da 0%, #ffb88c 100%);
            border-radius: 18px 18px 0 0;
            box-shadow: 0 2px 8px rgba(38,198,218,0.09);
            padding: 20px 0 10px 0;
        }
        .header ul li a {
            color: #fff;
            font-weight: 600;
            letter-spacing: 0.5px;
            padding: 8px 18px;
            border-radius: 6px;
            transition: background 0.3s, color 0.3s;
        }
        .header ul li a:hover, .header ul .hover:hover a {
            background: #fff;
            color: #26c6da;
        }
        .logo h1 {
            color: #26c6da;
            font-family: 'Montserrat', 'Segoe UI', sans-serif;
            font-size: 2.7rem;
            letter-spacing: 2px;
            margin-bottom: 0.5rem;
        }
        .logo h2 {
            color: #ffb88c;
            font-size: 1.4rem;
            letter-spacing: 1px;
            margin-top: 0;
        }
        .gallery {
            background: #fff;
            border-radius: 14px;
            box-shadow: 0 4px 16px rgba(38,198,218,0.07);
            padding: 18px 0 12px 0;
            margin: 24px 0;
        }
        .slide-gallery img {
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(255,184,140,0.13);
            margin: 0 10px 10px 0;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .slide-gallery img:hover {
            transform: scale(1.04);
            box-shadow: 0 6px 24px rgba(38,198,218,0.13);
        }
        .choose-us, .best-offers {
            background: linear-gradient(120deg, #fffde4 0%, #f7e9e3 100%);
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(255,184,140,0.09);
            margin: 24px 0;
            padding: 24px 12px;
        }
        .choose-us img, .best-offers img {
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(38,198,218,0.11);
        }
        button, .button button {
            background: linear-gradient(90deg, #26c6da 0%, #ffb88c 100%);
            color: #fff;
            font-weight: 600;
            border: none;
            border-radius: 8px;
            padding: 10px 24px;
            box-shadow: 0 2px 8px rgba(38,198,218,0.09);
            transition: background 0.3s, color 0.3s, box-shadow 0.3s;
        }
        button:hover, .button button:hover {
            background: #fff;
            color: #26c6da;
            box-shadow: 0 4px 16px rgba(255,184,140,0.13);
        }
        .carousel-inner, .carousel-item {
            border-radius: 14px;
            background: #e0f7fa;
        }
        .feed-back h1 {
            color: #ffb88c;
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }
        .feed-back h3 {
            color: #26c6da;
            font-size: 1.2rem;
        }
        /* Subtle travel icons or patterns could be added as background images for further enhancement */
    </style>
</head>
<!-- ***************************************************************************** -->
<body>
    <?php
    include "../inc/Include.php";
    ?>


    <div class="wrapper">
        <div class="header">
            <div class="row" style="align-items: center;">
                <div class="col">
                    <div class="col">
                        <img src="../Assets/cuyo.png" alt="Isla de Cuyo Travel Ease-logo" width="260px" style="margin-left: 40px;">
                    </div>
                </div>
                <div class="col">
                    <ul>
                        <li class="hover"><a href="#info">Contact us</a></li>
                        <li class="hover"><a href="#" data-toggle="modal" data-target="#sign-up">Create Account</a></li>
                        <li>
                            <div class="dropdown dropleft">
                                <a href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false" style="color: white;">
                                    <i class="fa-solid fa-bars fa-fw"></i>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <h2 class="dropdown-header">Sign in as</h2>
                                    <a class="dropdown-item" href="#" data-toggle="modal"
                                        data-target="#sign-in">User</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="logo">
            <div class="row one">
                <div class="col" style="text-align:center;">
                    <h1>Isla de Cuyo Travel Ease</h1>
                    <h2 style="font-family: Analouge;">Your connection to the world</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="gallery">
        <div class="slide-gallery">
            <img src="../Assets/1.webp" alt="tourist-spot">
            <img src="../Assets/2.webp" alt="tourist-spot">
            <img src="../Assets/3.webp" alt="tourist-spot">
            <img src="../Assets/4.webp" alt="tourist-spot">
            <img src="../Assets/5.webp" alt="tourist-spot">
            <img src="../Assets/6.webp" alt="tourist-spot">
            <img src="../Assets/7.webp" alt="tourist-spot">
            <img src="../Assets/8.webp" alt="tourist-spot">
            <img src="../Assets/9.webp" alt="tourist-spot">
            <img src="../Assets/10.webp" alt="tourist-spot">
        </div>

        <div class="slide-gallery">
            <img src="../Assets/1.webp" alt="tourist-spot">
            <img src="../Assets/2.webp" alt="tourist-spot">
            <img src="../Assets/3.webp" alt="tourist-spot">
            <img src="../Assets/4.webp" alt="tourist-spot">
            <img src="../Assets/5.webp" alt="tourist-spot">
            <img src="../Assets/6.webp" alt="tourist-spot">
            <img src="../Assets/7.webp" alt="tourist-spot">
            <img src="../Assets/8.webp" alt="tourist-spot">
            <img src="../Assets/9.webp" alt="tourist-spot">
            <img src="../Assets/10.webp" alt="tourist-spot">
        </div>
    </div>

    <div class="choose-us">
        <div class="row choose">
            <div class="col-6 mr-5 pl-5">
                <img src="../Assets/ccccc.png" alt="tourist-spot" height="90%" style="border-radius:4px;">
                <img src="../Assets/ccc.png" alt="tourist-spot" height="90%" style="border-radius:4px;"
                    class="img-pos">
            </div>
            <div class="col" style="margin-top: 48px;margin-left:100px;">
                <h1>Why choose us?</h1>
                <p>When you plan your trip with one of our experienced travel advisors, you’ll discover a world of
                    difference creating memorable and carefree vacations. We know all vacations are not the same. With
                    our
                    first-hand experience, ability to expertly customize every aspect of your trip and access to the
                    very
                    best brands, lowest prices and most value - we ensure every journey is extraordinary!</p>
                <div class="button" style="margin-top: 48px;">
                    <button>Book now <i class="fa-solid fa-arrow-right"></i></button>
                </div>
            </div>
        </div>
    </div>

    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="bg one">
                    <div class="feed-back">
                        <h1>HAPPY TRAVELERS</h1>
                        <p class="text-justify">"Makes traveling so easy! We just couldn't imagine planning the
                            honeymoon we
                            wanted while
                            also planning our wedding, so a friend recommended Explorateur and man I am glad she did.
                            They took my thoughts and ran with them and came back with two honeymoon options. We picked
                            Australia and the flights, hotels and transportation were all done for us. We had an amazing
                            honeymoon and did not have to think twice about any of the planning, just showed up with our
                            passports and suitcases!”</p>
                        <h3>-Rachel Salvatore</h3>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="bg two">
                    <div class="feed-back">
                        <h1>HAPPY TRAVELERS</h1>
                        <p class="text-justify">"Makes traveling so easy! We just couldn't imagine planning the
                            honeymoon we
                            wanted while
                            also planning our wedding, so a friend recommended Explorateur and man I am glad she did.
                            They took my thoughts and ran with them and came back with two honeymoon options. We picked
                            Australia and the flights, hotels and transportation were all done for us. We had an amazing
                            honeymoon and did not have to think twice about any of the planning, just showed up with our
                            passports and suitcases!”</p>
                        <h3>-Rachel Salvatore</h3>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="bg three">
                    <div class="feed-back">
                        <h1>HAPPY TRAVELERS</h1>
                        <p class="text-justify">"Makes traveling so easy! We just couldn't imagine planning the
                            honeymoon we
                            wanted while
                            also planning our wedding, so a friend recommended Explorateur and man I am glad she did.
                            They took my thoughts and ran with them and came back with two honeymoon options. We picked
                            Australia and the flights, hotels and transportation were all done for us. We had an amazing
                            honeymoon and did not have to think twice about any of the planning, just showed up with our
                            passports and suitcases!”</p>
                        <h3>-Rachel Salvatore</h3>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="best-offers">
        <div class="row offers">
            <div class="col-12">
                <h1 class="w-700"> Top Experiences: Cuyo & Its Neighboring Islands </h1>
                <label for="" style="font-family: Inter;" class="w-500">Pick a vibe and explore the top destinations in
                    the Cuyo Island</label>
                <div class="row mt-5">
                    <div class="col-3">
                        <img src="../Assets/anino.png" alt="promo-tours">
                    </div>
                    <div class="col-3">
                        <img src="../Assets/aman.jpg" alt="promo-tours">
                    </div>
                    <div class="col-3">
                        <img src="../Assets/aguado.png" alt="promo-tours">
                    </div>
                </div>
            </div>
        </div>

        <div class="row offers" style="margin-top:36px;">
            <div class="col-12">
                <h1 class="w-700">Top experiences on Isla de Cuyo Travel Ease (International) </h1>
                <label for="" style="font-family: Inter;" class="w-500">Call to Feelings: Discovery, escape, adventure, authenticity, relaxation, romance, simplicity.</label>
                <div class="row mt-5">
                    <div class="col-3">
                        <img src="../Assets/top1.jpg" alt="promo-tours">
                    </div>
                    <div class="col-3">
                        <img src="../Assets/top2.jpg" alt="promo-tours">
                    </div>
                    <div class="col-3">
                        <img src="../Assets/top3.jpg" alt="promo-tours">
                    </div>
                    <div class="col-3">
                        <img src="../Assets/top4.jpg" alt="promo-tours">
                    </div>
                    <div class="col-3">
                        <img src="../Assets/top5.jpg" alt="promo-tours">
                    </div>
                    <div class="col-3">
                        <img src="../Assets/top6.jpg" alt="promo-tours">
                    </div>
                    <div class="col-3">
                        <img src="../Assets/top7.jpg" alt="promo-tours">
                    </div>
                    <div class="col-3">
                        <img src="../Assets/top8.jpg" alt="promo-tours">
                    </div>
                </div>

            </div>
        </div>
    </div>


    <div class="contact-us" id="info">
        <div class="row contact">
            <div class="col-5">
                <div style="margin-left: 80px;">
                    <h1>CONTACT</h1>
                    <label for="" class="w-500" style="font-family: Inter;">We would love to hear from you!</label>

                    <div style="font-family: Inter;" class="mt-5">
                        <h5><i class="fa-solid fa-location-dot fa-fw mr-3"></i> Cuyo, Palawan</h5>
                        </h5></a>
                        <h5><a href="https://www.facebook.com/people/Tourism-Cuyo/61567297886999/" target="_blank"><i
                                    class="fa-brands fa-facebook fa-fw mr-3"></i> Isla de Cuyo Travel Ease</h5></a>
                        <h5><a href="mailto:Isla de Cuyo Travel Easetravelandtours@gmail.com"><i
                                    class="fa-solid fa-envelope fa-fw mr-3"></i>
                                cuyotourism@gmail.com</h5></a>
                        <h5><i class="fa-solid fa-phone fa-fw mr-3"></i> 0923-732-4474</h5>
                    </div>
                </div>

            </div>
            <div class="col-7">
                <form action="" class="mt-4">
                    <div class="div">
                        <div class="form-group">
                            <label for="fullname">Fullname</label>
                            <input type="text" class="form-control" id="fullname" aria-describedby="emailHelp"
                                placeholder="Dean Sabroso" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" aria-describedby="emailHelp"
                                placeholder="dsabroso@gmail.com" required>
                        </div>

                        <div class="form-group">
                            <label for="textarea">Message</label>
                            <textarea class="form-control" id="textarea" rows="3" required
                                placeholder="Aenean lacinia bibendum nulla sed consectetur. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Donec ullamcorper nulla non metus auctor fringilla nullam quis risus."></textarea>
                        </div>

                        <div class="button" style="margin-top: 24px;">
                            <button>Message <i class="fa-solid fa-arrow-right"></i></button>
                        </div>
                        <div class="rating-container">
                            <div class="rating-text">How was your experience?</div>
                                <div class="stars">
                                    <span class="star" data-rating="1">★</span>
                                    <span class="star" data-rating="2">★</span>
                                    <span class="star" data-rating="3">★</span>
                                    <span class="star" data-rating="4">★</span>
                                    <span class="star" data-rating="5">★</span>
                                </div>
                            <div class="rating-message" id="rating-message"></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- RATING CSS -->
    <style>
         .rating-container {
            margin-top: 20px;
            text-align: center;
        }
        .rating-text {
            margin-bottom: 10px;
            font-weight: bold;
        }
        .stars {
            display: flex;
            justify-content: center;
            gap: 5px;
        }
        .star {
            font-size: 24px;
            cursor: pointer;
            color: #ddd;
            transition: color 0.2s;
        }
        .star:hover, .star.active {
            color: #ffa500;
        }
        .rating-message {
            margin-top: 10px;
            font-size: 14px;
            height: 20px;
            font-style: italic;
            opacity: 0;
            transition: opacity 0.5s ease;
        }
        .rating-message.visible {
            opacity: 1;
        }
        
    </style>
    <!-- *************************************** -->
    <footer>
        <label class="w-500">Isla de Cuyo Travel Ease | <i class="fa-solid fa-copyright"></i> All Rights Reserved</label>
    </footer>

    <form action="" method="POST">
        <div class="modal" id="sign-up" tabindex="-1" role="dialog" aria-labelledby="sign-upTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="close">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                            style="float:right;opacity:1;padding:0;">
                            <span aria-hidden="true">&times;</span>
                    </div>
                    </button>
                    <div class="modal-header" style="border-bottom:none;display:block;padding-top:0;">
                        <h3 class="modal-title" id="sign-upTitle" style="text-align:center;">Sign up</h3>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <input type="text" class="form-control form" id="firstname" name="firstname"
                                        aria-describedby="emailHelp" placeholder="&#xf007; Firstname"
                                        style="font-family:Arial, FontAwesome" required>
                                </div>
                            </div>
                            <div class="col" style="margin-left: 16px;">
                                <div class="form-group">
                                    <input type="text" class="form-control form" id="lastname" name="lastname"
                                        aria-describedby="emailHelp" placeholder="&#xf007; Lastname"
                                        style="font-family:Arial, FontAwesome" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control form" name="email"
                                aria-describedby="emailHelp" placeholder="&#xf0e0; Email"
                                style="font-family:Arial, FontAwesome" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form" id="number" name="number"
                                aria-describedby="emailHelp" placeholder="&#xf0e0; Phone Number"
                                style="font-family:Arial, FontAwesome" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form" name="password"
                                aria-describedby="emailHelp" placeholder="&#xf023; Password"
                                style="font-family:Arial, FontAwesome" required>
                        </div>

                        <button type="submit" class="btn btn-primary" name="sign-up" style="width:100%;">Sign
                            up</button>
                    </div>
                    <div class="div" style="text-align:center;">
                        <label>Already a member?<span style="text-decoration:none;"> <a href="#" id="in">Sign
                                    in</a></span></label><br>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <form action="" method="POST">
        <div class="modal" id="sign-in" tabindex="-1" role="dialog" aria-labelledby="sign-inTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="close">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                            style="float:right;opacity:1;padding:0;">
                            <span aria-hidden="true">&times;</span>
                    </div>
                    </button>
                    <div class="modal-header" style="border-bottom:none;display:block;padding-top:0;">
                        <h3 class="modal-title" id="sign-inTitle" style="text-align:center;">Sign in</h3>
                    </div>
                    <div class="modal-body">
                        <?php
                        if (isset($_GET['login-first'])) {
                            echo "
                                    <div class='row login-first'>
                                        <div class='col'>
                                            <h6>Login first</h6>
                                            <label>You must log in to continue.</label>
                                        </div>
                                    </div>
                                    <script>$('#sign-in').modal('show');</script>
                                    ";
                        }

                        if (isset($_GET['wrong-password-or-email'])) {
                            echo "
                                <div class='row error'>
                                    <div class='col'>
                                        <h6>Incorrect password or username</h6>
                                        <label>It looks like you entered a slight misspelling of your email or password. Email or password is incorrect, please try again.</label>
                                    </div>
                                </div>
                                <script>$('#sign-in').modal('show');</script>
                                ";
                        }

                        if (isset($_GET['reset-password-successfully'])) {
                            echo "
                                <div class='row login-first'>
                                    <div class='col'>
                                        <h6>Password Reset successfully</h6>
                                        <label>You can login your new password</label>
                                    </div>
                                </div>
                                <script>$('#sign-in').modal('show');</script>
                                ";
                        }
                        ?>
                        <div class="form-group">
                            <input type="email" class="form-control form" id="email-sign" name="email-sign"
                                aria-describedby="emailHelp" placeholder="&#xf0e0; Email"
                                style="font-family:Arial, FontAwesome" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form" id="password-sign" name="password-sign"
                                aria-describedby="emailHelp" placeholder="&#xf023; Password"
                                style="font-family:Arial, FontAwesome" required>
                            <div class="div w-100 text-right mt-1">
                                <input type="checkbox" name="show" class="text-right showPassword">
                                <small class="text-right" class="mr-3">Show Password</small>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary" name="sign-in" style="width:100%;">Sign
                            in</button>
                    </div>
                    <div class="div" style="text-align:center;">
                        <label>Need an account?<span style="text-decoration:none;"> <a href="#" id="here">Sign
                                    up</a></span>
                            <br>
                            <a href="#" class="forgot">Forgot Password</a></span>
                        </label><br>

                    </div>
                </div>
            </div>
        </div>
    </form>


    <form action="" method="POST">
        <div class="modal" id="sign-admin" tabindex="-1" role="dialog" aria-labelledby="sign-adminTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="close">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                            style="float:right;opacity:1;padding:0;">
                            <span aria-hidden="true">&times;</span>
                    </div>
                    </button>
                    <div class="modal-header" style="border-bottom:none;display:block;padding-top:0;">
                        <h3 class="modal-title" id="sign-adminTitle" style="text-align:center;">Sign in</h3>
                    </div>
                    <div class="modal-body">
                        <?php
                        if (isset($_GET['Login-first'])) {
                            echo "
                                    <div class='row login-first'>
                                        <div class='col'>
                                            <h6>Login first</h6>
                                            <label>You must log in to continue.</label>
                                        </div>
                                    </div>
                                    <script>$('#sign-admin').modal('show');</script>
                                    ";
                        }

                        if (isset($_GET['wrong-password-email'])) {
                            echo "
                                <div class='row error'>
                                    <div class='col'>
                                        <h6>Incorrect password or username</h6>
                                        <label>It looks like you entered a slight misspelling of your email or password. Email or password is incorrect, please try again.</label>
                                    </div>
                                </div>
                                <script>$('#sign-admin').modal('show');</script>
                                ";
                        }
                        ?>
                        <div class="form-group">
                            <input type="email" class="form-control form" name="email-admin"
                                aria-describedby="emailHelp" placeholder="&#xf0e0; Email"
                                style="font-family:Arial, FontAwesome" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form" name="password-admin"
                                aria-describedby="emailHelp" placeholder="&#xf023; Password"
                                style="font-family:Arial, FontAwesome" required>
                            <div class="div w-100 text-right mt-1">
                                <input type="checkbox" name="show" class="text-right showPassword">
                                <small class="text-right" class="mr-3">Show Password</small>
                            </div>
                        </div>
                        <button type="submit" name="admin" class="btn btn-primary" style="width:100%;">Sign in</button>
                    </div>
                    <div class="div" style="text-align:center;">
                        <label>Not an admin?<span style="text-decoration:none;">
                                <a href="#" id="here-admin">Sign in here</a>
                                <br>
                                <a href="#" class="forgot">Forgot Password</a></span></label>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <form method="POST" id="forgotPasswordForm">
        <div class="modal" id="forgotPassword" tabindex="-1" role="dialog" aria-labelledby="sign-adminTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="close">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                            style="float:right;opacity:1;padding:0;">
                            <span aria-hidden="true">&times;</span>
                    </div>
                    </button>
                    <div class="modal-header" style="border-bottom:none;display:block;padding-top:0;">
                        <h3 class="modal-title" id="sign-adminTitle" style="text-align:center;">Forgot Password</h3>
                    </div>
                    <div class="modal-body">
                        <h6 class="alert text-center" style="background-color: #ffc0c0;border: 1px solid #fda4a4;display: none;"></h6>
                        <div class="form-group">
                            <input type="email" class="form-control form" name="email"
                                placeholder="&#xf0e0; Email"
                                style="font-family:Arial, FontAwesome" required>
                        </div>
                        <button type="submit" name="check-email" class="btn btn-primary" style="width:100%;">Send Email</button>
                    </div>
                    <div class="div" style="text-align:center;">
                        <label><span style="text-decoration:none;">
                                <a href="#" id="sign">Sign in</a>
                                <br>
                                <a href="#" class="forgot">Forgot Password</a></span></label>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <?php if (isset($_GET['forgotpass'])) : ?>
        <form method="POST" id="resetPasswordForm">
            <div class="modal" id="resetPassword" tabindex="-1" role="dialog" aria-labelledby="sign-adminTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="close">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="float:right;opacity:1;padding:0;">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-header" style="border-bottom:none;display:block;padding-top:0;">
                            <h3 class="modal-title" id="sign-adminTitle" style="text-align:center;">Reset Password</h3>
                        </div>
                        <div class="modal-body">
                            <h6 class="alert text-center" style="background-color: #ffc0c0;border: 1px solid #fda4a4;display: none;"></h6>
                            <div class="form-group">
                                <input type="password" id="new-password" class="form-control form" name="password" placeholder="&#xf023; New Password" style="font-family:Arial, FontAwesome" required>
                            </div>

                            <div class="form-group">
                                <input type="password" id="confirm-password" class="form-control form" name="cpassword" placeholder="&#xf023; Confirm Password" style="font-family:Arial, FontAwesome" required>
                            </div>
                            <input type="hidden" name="source" value="<?php echo $_GET['source']; ?>">
                            <input type="hidden" name="userid" value="<?php echo $_GET['forgotpass']; ?>">
                            <button type="submit" id="adDn" name="reset-password" class="btn btn-primary" style="width:100%;">Reset Password</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <script>
            $('#resetPassword').modal('show');
        </script>
    <?php endif; ?>


    <?php
    $options = ['cost' => 12,];

    if (isset($_POST['sign-up'])) {

        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $number = $_POST['number'];
        $password = $_POST['password'];

        $hash_pass = password_hash("$password", PASSWORD_BCRYPT, $options);
        $query = "INSERT INTO user(firstname, lastname, email, password, phonenumber)
                        VALUES('$firstname', '$lastname', '$email', '$hash_pass', '$number')";
        // $results = mysqli_query($conn, $query);


        if (mysqli_query($conn, $query)) {
            echo "<script>window.location.href='index.php?alert=1';</script>";
        } else {
            echo mysqli_error($conn);
        }
    }

    if (isset($_POST['sign-in'])) {

        $email = $_POST['email-sign'];
        $password = $_POST['password-sign'];

        $query = "SELECT * FROM user where email = '$email'";
        $results = mysqli_query($conn, $query);

        if (mysqli_num_rows($results) > 0) {
            $rows = mysqli_fetch_array($results);
            $pwd_hashed = $rows['password'];

            if (password_verify($password, $pwd_hashed)) {
                $_SESSION['userid'] = $rows['userid'];

                if (isset($_SESSION['redirect_url'])) {
                    $redirectUrl = 'http://localhost' . $_SESSION['redirect_url'];
                    unset($_SESSION['redirect_url']); // Clear the session variable
                    // header("Location: $redirectUrl");
                    echo "<script>window.location.href='$redirectUrl';</script>";
                    exit();
                } else {
                    echo "<script>window.location.href='user/dashboard.php?userid=$rows[userid]';</script>";
                }
            } else {
                echo "<script>window.location.href='index.php?wrong-password-or-email';</script>";
            }
        } else {
            echo "<script>window.location.href='index.php?wrong-password-or-email';</script>";
        }
    }


    if (isset($_POST['admin'])) {

        $email = $_POST['email-admin'];
        $password = $_POST['password-admin'];

        $hash_pass = password_hash("$password", PASSWORD_BCRYPT, $options);
        $query = "INSERT INTO user(firstname, lastname, email, password, phonenumber)
                        VALUES('$firstname', '$lastname', '$email', '$hash_pass', '$number')";

        $query = "SELECT * FROM admin where email = '$email'";
        $results = mysqli_query($conn, $query);

        if (mysqli_num_rows($results) > 0) {
            $rows = mysqli_fetch_array($results);
            $pwd_hashed = $rows['password'];

            if (password_verify($password, $pwd_hashed)) {
                $_SESSION['adminid'] = $rows['adminid'];
                echo "<script>window.location.href='admin/dashboard-admin.php?adminid=$rows[adminid]';</script>";
            } else {
                echo "<script>window.location.href='index.php?wrong-password-email';</script>";
            }
        } else {
            echo "<script>window.location.href='index.php?wrong-password-email';</script>";
        }
    }

    if (isset($_POST['reset-password'])) {

        $id = $_POST['userid'];
        $source = $_POST['source'];
        $sourceid = $source . 'id';
        $new_password = $_POST['password'];

        $hash_pass = password_hash("$new_password", PASSWORD_BCRYPT, $options);
        $password = $hash_pass;

        $stmt = $conn->prepare("UPDATE $source SET `password` = ? WHERE $sourceid = ?");
        $stmt->bind_param("ss", $password, $id);

        $stmt->execute();
        echo "<script>window.location.href='index.php?reset-password-successfully';</script>";
        $stmt->close();
    }


    ?>

</body>

<script>
    $(document).ready(function() {

        $('#new-password, #confirm-password').keyup(function() {
            const pass = $('#new-password').val();
            const cpass = $('#confirm-password').val();
            const message = $('.alert');

            if (pass !== cpass) {
                message.show().text('Passwords do no match');
                $('#adDn').attr('disabled', true);
            } else {
                message.hide().text('Passwords match');
                $('#adDn').attr('disabled', false);
            }
        });

        $('#forgotPasswordForm').on('submit', function(e) {
            e.preventDefault(); // Prevent the default form submission
            console.log($(this).serialize());
            $.ajax({
                url: 'forgotpassword/fetch.php', // Replace with the path to your PHP script
                type: 'POST',
                data: $(this).serialize(),
                beforeSend: function() {
                    // Optional: Show a loading indicator
                    $('.alert').text("Checking...");

                    $('.alert').css({
                        'background-color': '#f3ffcd',
                        'border': '1px solid #f5f083',
                    });

                    $('.alert').show();
                },
                success: function(response) {
                    // Handle success response
                    console.log(response);
                    if (response === 'Reset password link has been sent to your email') {
                        $('.alert').text(response);

                        $('.alert').css({
                            'background-color': '#cdffce',
                            'border': '1px solid #83f5a0',
                        });
                        $('.alert').show();
                        // $('#forgotPassword').modal('hide'); // Hide modal if needed
                    } else {
                        $('.alert').text(response); // Show error message
                        $('.alert').show();
                    }
                },
                error: function(xhr, status, error) {
                    alert('An error occurred: ' + error);
                }
            });
        });
    });

    // $('.carousel').carousel(true);
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(window.location.search);
    const alert = urlParams.get('alert');
    const wrongPassword = urlParams.get('wrong-password-or-email');

    if (alert == 1) {
        Swal.fire({
            title: "Saved",
            text: "New account successfully created. ",
            icon: "success"
        });
    }

    $('.showPassword').change(function() {
        var form = $(this).closest('form');
        var passwordInput = form.find('input[type="password"], input[type="text"]'); // Select both types

        if ($(this).is(':checked')) {
            passwordInput.attr('type', 'text'); // Show password
        } else {
            passwordInput.attr('type', 'password'); // Hide password
        }
    });

    $('#here-admin').click(function() {
        $('#sign-admin').modal('hide');
        $('#sign-in').modal('show');
    })

    $('.forgot').click(function() {
        $('#sign-admin').modal('hide');
        $('#sign-in').modal('hide');
        $('#forgotPassword').modal('show');
    })

    $('#here').click(function() {
        $('#sign-in').modal('hide');
        $('#sign-up').modal('show');
    })
    $('#in').click(function() {
        $('#sign-up').modal('hide');
        $('#sign-in').modal('show');
    })

    $('#sign').click(function() {
        $('#forgotPassword').modal('hide');
        $('#sign-in').modal('show');
    })
</script>

<!-- ***************************************************************************************************************** -->
<!-- Chatbot Styles -->
<style>
/* Font Import */
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap');

body {
  font-family: 'Inter', sans-serif;
}

/* Chatbot Icon (Bottom Right) */
.chatbot-icon {
  position: fixed;
  bottom: 25px;
  right: 25px;
  background: linear-gradient(135deg, #007bff, #3399ff);
  color: white;
  width: 60px;
  height: 60px;
  border-radius: 50%;
  font-size: 28px;
  text-align: center;
  line-height: 60px;
  cursor: pointer;
  z-index: 9999;
  box-shadow: 0 8px 16px rgba(0, 123, 255, 0.4);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.chatbot-icon:hover {
  transform: scale(1.1);
  box-shadow: 0 12px 24px rgba(0, 123, 255, 0.5);
}

/* Chatbot Popup */
.chatbot-popup {
  position: fixed;
  bottom: 100px;
  right: 25px;
  width: 320px;
  height: 350px;
  background: #ffffff;
  border-radius: 16px;
  box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
  display: none;
  flex-direction: column;
  z-index: 9999;
  overflow: hidden;
  border: 1px solid #e3e3e3;
}

/* Chat Header */
.chat-header {
  background: linear-gradient(135deg, #007bff, #3399ff);
  color: white;
  padding: 14px;
  font-weight: 600;
  text-align: center;
  border-radius: 16px 16px 0 0;
  letter-spacing: 0.5px;
  font-size: 16px;
}

/* Chat Body */
.chat-body {
  padding: 12px;
  flex: 1;
  overflow-y: auto;
  font-size: 14px;
  color: #333;
  background-color: #f9f9f9;
}

/* Messages */
.message {
  margin-bottom: 10px;
  line-height: 1.5;
  word-wrap: break-word;
}
.message.user {
  text-align: right;
  color: #007bff;
}

/* Typing Indicators */
.typing-indicator {
  display: inline-block;
  padding: 6px 12px;
  margin: 4px 0;
  font-size: 13px;
  max-width: 80%;
  border-radius: 16px;
  background-color: #e6eaf1;
  color: #333;
  clear: both;
}
.typing-indicator.bot {
  text-align: left;
  background-color: #eef2f7;
  color: #444;
  float: left;
}
.typing-indicator.user-side {
  text-align: right;
  background-color: #d0e7ff; /* Light blue background */
  color: #004085;            /* Darker blue text (or remove if you're only using dots) */
  float: right;
}

/* Chat Footer */
.chat-footer {
  display: flex;
  border-top: 1px solid #e0e0e0;
  padding: 8px;
  background-color: #fff;
}
.chat-footer input {
  flex: 1;
  padding: 10px 12px;
  border: 1px solid #ccc;
  border-radius: 6px;
  outline: none;
  font-size: 14px;
  transition: border 0.2s ease;
}
.chat-footer input:focus {
  border-color: #007bff;
  box-shadow: 0 0 0 2px rgba(0, 123, 255, 0.1);
}
.chat-footer button {
  background: #007bff;
  color: white;
  border: none;
  padding: 10px 14px;
  margin-left: 8px;
  cursor: pointer;
  border-radius: 6px;
  transition: all 0.2s ease;
  font-weight: 500;
}
.chat-footer button:hover {
  background: #0056b3;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}
.chat-footer button:active {
  background: #004085;
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
  transform: scale(0.98);
}

/* Typing Indicator Animation */
.typing-indicator {
  display: inline-flex;
  align-items: center;
  gap: 4px;
  padding: 6px 12px;
  margin: 6px 0;
  font-size: 13px;
  max-width: 80%;
  border-radius: 16px;
  background-color: #e6eaf1;
  color: #333;
  clear: both;
}

.typing-indicator.bot {
  float: left;
  background-color: #eef2f7;
}

@keyframes bounce {
  0%, 80%, 100% {
    transform: scale(1);
    opacity: 1;
  }
  40% {
    transform: scale(0);
    opacity: 0.3;
  }
}

.dot {
  display: inline-block;
  width: 6px;
  height: 6px;
  margin: 0 0px;
  background-color: #555;
  border-radius: 100%;
  animation: bounce 1.5s infinite ease-in-out;
}

.dot:nth-child(1) {
  animation-delay: 0s;
}

.dot:nth-child(2) {
  animation-delay: 0.3s;
}

.dot:nth-child(3) {
  animation-delay: 0.5s;
}
</style>

<!-- Chatbot Toggle Button -->
<div class="chatbot-icon" id="chatbotIcon">💬</div>

  <!-- Chatbot Popup -->
  <div class="chatbot-popup" id="chatbotPopup">
    <div class="chat-header">Chat with us</div>
    <div class="chat-body" id="chatBody">
      <div class="message">Hi! How can I help you today?</div>
    </div>
    <div class="chat-footer">
      <input type="text" id="chatInput" placeholder="Type a message..." />
      <button onclick="sendMessage()">Send</button>
    </div>
</div>

<!-- Chatbot Script -->
<script>
const chatbotIcon = document.getElementById("chatbotIcon");
const chatbotPopup = document.getElementById("chatbotPopup");
const chatBody = document.getElementById("chatBody");
const chatInput = document.getElementById("chatInput");
const sendButton = document.querySelector(".chat-footer button");

let userTypingIndicator = null;
let botIsTyping = false;

chatbotIcon.onclick = () => {
  chatbotPopup.style.display = chatbotPopup.style.display === "flex" ? "none" : "flex";
  chatbotPopup.style.flexDirection = "column";
};

chatInput.addEventListener("input", () => {
  const isTyping = chatInput.value.trim() !== "";
  const lastMessage = chatBody.querySelector(".message:last-of-type");

  if (isTyping && lastMessage) {
    if (!userTypingIndicator) {
        userTypingIndicator = document.createElement("div");
        userTypingIndicator.className = "typing-indicator user-side";
        userTypingIndicator.innerHTML = `
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
        `;
    }
    if (!chatBody.contains(userTypingIndicator)) {
      lastMessage.insertAdjacentElement("afterend", userTypingIndicator);
    }
    chatBody.scrollTop = chatBody.scrollHeight;
  } else if (!isTyping && userTypingIndicator) {
    userTypingIndicator.remove();
    userTypingIndicator = null;
  }
});

// Send message on Enter key press
chatInput.addEventListener("keydown", (e) => {
  if (e.key === "Enter" && !e.shiftKey) { // Allow shift+enter for new lines if desired
    e.preventDefault();
    if (!botIsTyping) {
      sendMessage();
    }
  }
});

function sendMessage() {
  const msg = chatInput.value.trim();
  if (!msg || botIsTyping) return;

  if (userTypingIndicator) {
    userTypingIndicator.remove();
    userTypingIndicator = null;
  }

  botIsTyping = true;
  chatInput.disabled = true;
  sendButton.disabled = true;

  // Create and append user message
  const userMsg = document.createElement("div");
  userMsg.className = "message user";
  userMsg.textContent = msg;
  chatBody.appendChild(userMsg);
  chatBody.scrollTop = chatBody.scrollHeight;

  // Clear input box here!
  chatInput.value = "";

  // Create and append bot typing indicator
  const botTypingIndicator = document.createElement("div");
  botTypingIndicator.className = "typing-indicator bot";
  botTypingIndicator.innerHTML = `
    <span class="dot"></span>
    <span class="dot"></span>
    <span class="dot"></span>
  `;
  chatBody.appendChild(botTypingIndicator);
  chatBody.scrollTop = chatBody.scrollHeight;

  // Fetch bot reply
  fetch("chatbot.php", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({ message: msg })
  })
    .then(res => res.json())
    .then(data => {
      botTypingIndicator.remove();

      const botMsg = document.createElement("div");
      botMsg.className = "message bot";
      botMsg.textContent = data.reply || "Sorry, I didn't understand.";
      chatBody.appendChild(botMsg);
      chatBody.scrollTop = chatBody.scrollHeight;

      botIsTyping = false;
      chatInput.disabled = false;
      sendButton.disabled = false;
      chatInput.focus();
    })
    .catch(err => {
      botTypingIndicator.remove();

      const errMsg = document.createElement("div");
      errMsg.className = "message bot";
      errMsg.textContent = "Error: " + err.message;
      chatBody.appendChild(errMsg);
      chatBody.scrollTop = chatBody.scrollHeight;

      botIsTyping = false;
      chatInput.disabled = false;
      sendButton.disabled = false;
      chatInput.focus();
    });
}
</script>

<!-- RATING JS -->
<script>
    const stars = document.querySelectorAll('.star');
    const ratingMessage = document.getElementById('rating-message');
    let submitted = false;

    stars.forEach(star => {
        star.addEventListener('click', () => {
            if (submitted) return;

            const rating = parseInt(star.getAttribute('data-rating'));

            stars.forEach(s => s.classList.remove('active'));
            for (let i = 0; i < rating; i++) {
                stars[i].classList.add('active');
            }

            let message = '';
            switch (rating) {
                case 5: message = 'Thank you for your excellent rating!'; break;
                case 4: message = 'Thank you! We\'re glad you had a good experience.'; break;
                case 3: message = 'We value your feedback. Thank you!'; break;
                case 2: message = 'Thanks. We\'ll work on improving.'; break;
                case 1: message = 'Sorry to hear that. Tell us how we can improve.'; break;
            }

            ratingMessage.textContent = message;
            ratingMessage.classList.add('visible');

            // Fade out after 3 seconds
            setTimeout(() => {
                ratingMessage.classList.remove('visible');
            }, 3000);

            fetch('submit_rating.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: 'rating=' + rating
            }).then(res => res.text())
            .then(response => {
                console.log('Server response:', response);
                submitted = true;
            })
            .catch(error => {
                console.error('Error submitting rating:', error);
            });
        });
    });
</script>
</html>
    });
</script>
</html>