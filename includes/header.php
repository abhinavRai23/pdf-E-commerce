<?php
    include "connect.inc.php";
    include "session.php";
    ob_start();

    function mysql_entities_fix_string($db_server,$string)
    {
        return htmlentities(mysql_fix_string($db_server,$string));
    } 

    function mysql_fix_string($db_server,$string)
    {
    // if (get_magic_quotes_gpc()) 
    //   $string = stripslashes($string);
        return mysqli_real_escape_string($db_server,$string);
    }
?>

<!DOCTYPE>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" keyword="vinra, content writing, typesetting, indexing, Content Development, Copy Editing, Technical Editing, Typesetting and Composition, Designing and Graphic Services, eBooks, Proceedings">
    <title>VinRa</title>
    <link rel="shortcut icon" href="Images/favi-icon.ico" type="image/x-icon">
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
    <link type="text/css" rel="stylesheet" href="css/font-awesome.min.css" />
    <!-- <link type="text/css" rel="stylesheet" href="css/animation.css" /> -->
    <link type="text/css" rel="stylesheet" href="css/my-style.css" />
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jssor.slider.mini.js"></script>
    <script type="text/javascript" src="js/mycustom.js"></script>

</head>

<body>
    <!-- Start Top Header_Area -->
    <section class="top-header">
        <div class="container top-header">
            <ul style="padding: 10px 0px 0px 0px; float: right;">
                <!--  <li>
                    <a href="#">
                        <i class="fa fa-phone"></i>+91-999-9999-999</a>
                </li> -->
                <li>
                    <a href="#">
                        <i class="fa fa-envelope-o"></i> info@vinra.co.in</a>
                </li>
                <li>
                    <div class="cart_div">
                        <a href="cart.php"><i class="fa fa-2x fa-shopping-cart"></i> &nbsp;Cart<span>1</span></a>
                    </div>
                </li>

            </ul>

        </div>
    </section>

    <!-- End Top Header_Area -->

    <div class="container-fluid">
        <div class="container">
            <nav class="navbar navbar-default pad-top5 mar-bott5" data-spy="affix" data-offset-top="150" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="navbar-brand logo-height">
                        <a href="index.php">
                            <img alt="logo" src="Images/VinRa-Logo.png" class="img-responsive logo-img" />
                        </a>
                    </div>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right pad-top10">
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li>
                            <a href="about-us.php">About Us</a>
                        </li>
                        <li>
                            <a href="edu-tab.php">Edu Tab</a>
                        </li>
                        <li>
                            <a href="online-books.php">Online Books</a>
                        </li>
                        <li>
                            <a href="services.php">Services</a>
                        </li>

                        <li>
                            <a href="contact-us.php">Contact Us</a>
                        </li>
                        <?php
                            if( $_SESSION && $_SESSION['username']){
                                echo '<li>
                                    <a href="includes/logout.php"><i class="fa fa-user-circle" aria-hidden="true"></i> '.$_SESSION['username'].'</a>
                                </li>';
                            }
                            else{
                                echo '<li>
                                    <a href="login.php"><i class="fa fa-user-circle" aria-hidden="true"></i> Login</a>
                                </li>';
                            }
                        ?>
                    </ul>

                </div>
            </nav>
        </div>
    </div>

    <div class="social-icon" style="position: absolute; top: 490px;">
        <div class="social-icon-fixed">
            <a href="https://www.facebook.com/">
                <p class="fbook active"><i class="fa fa-facebook-f"></i></p>
            </a>
            <a href="https://twitter.com/login?lang=en">
                <p class="twitter active"><i class="fa fa-twitter"></i></p>
            </a>
            <a href="https://in.linkedin.com/">
                <p class="linkedin active"><i class="fa fa-linkedin"></i></p>
            </a>

        </div>
    </div>