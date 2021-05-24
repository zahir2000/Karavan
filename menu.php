<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<!--<![endif]-->

<!-- Mirrored from corpthemes.com/html/sumi/menu.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 22 Mar 2021 04:41:07 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <title>Sumi Restaurant HTML Template</title>

    <meta name="author" content="themesflat.com">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Bootstrap  -->
    <link rel="stylesheet" type="text/css" href="stylesheets/bootstrap.css">

    <!-- Theme Style -->
    <link rel="stylesheet" type="text/css" href="stylesheets/style.css">

    <!-- Responsive -->
    <link rel="stylesheet" type="text/css" href="stylesheets/responsive.css">

    <!-- Colors -->
    <link rel="stylesheet" type="text/css" href="stylesheets/colors/color1.css" id="colors">

    <!-- Animation Style -->
    <link rel="stylesheet" type="text/css" href="stylesheets/animate.css">

    <!-- Favicon and touch icons  -->
    <link href="icon/apple-touch-icon-48-precomposed.png" rel="apple-touch-icon" sizes="48x48">
    <link href="icon/apple-touch-icon-32-precomposed.png" rel="apple-touch-icon-precomposed">
    <link href="icon/favicon.png" rel="shortcut icon">

    <!--[if lt IE 9]>
        <script src="javascript/html5shiv.js"></script>
        <script src="javascript/respond.min.js"></script>
    <![endif]-->
</head>

<body class="">
    <section class="loading-overlay">
        <div class="Loading-Page">
            <h2 class="loader">Loading</h2>
        </div>
    </section>

    <div class="box">
        <header id="header" class="header clearfix">
            <div class="header-wrap clearfix">
                <div class="container">
                    <div class="logo-mobi"><a href="#"> <img src="images/logo.png" alt="image"></a></div>
                    <div class="btn-menu">
                        <span></span>
                    </div>
                    <?php include_once 'php/nav.php' ?>
                </div>
                <!--/.container -->
            </div>
            <!--/.header-wrap -->
        </header>
        <!-- Page Title -->
        <div class="page-title parallax parallax1 flat_strech">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-title-heading">
                            <h1 class="title">Our menu</h1>
                            <div class="breadcrumbs">
                                <ul>
                                    <li> <a href="index.php">Home </a></li>
                                    <li><a href="#">Our menu</a></li>
                                </ul>
                            </div>
                        </div><!-- /.page-title-captions -->
                    </div><!-- /.col-md-12 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div>

        <section class="flat-row menu-1">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="title-section style1 ">
                            <div class="top-section">
                                <p>Discover</p>
                            </div>
                            <h1 class="title">Recommended</h1>
                        </div>
                    </div>
                    <!--col-md-12-->
                </div>
                <!--row-->

                <div class="row">
                    <?php

                    require_once "admin/Database/MenuConnection.php";
                    $con = MenuConnection::getInstance();
                    $hotMenuItems = $con->getHotMenuItems();

                    foreach ($hotMenuItems as $item) {
                        $food = $con->getMenuItem($item["MenuItemID"]);
                        $name = $food[0]["name"];
                        $image = $food[0]["image"];
                        $price = $food[0]["price"];
                        $disc = $food[0]["discount"];

                        if ($disc != 0) {
                            $price = $price - $price * $disc;
                        }

                        $price = number_format($price, 2);

                        echo "<div class='col-sm-3 col-xs-6'>
                        <div class='product effect1'>
                            <div class='box-wrap'>
                                <div class='box-image'>
                                    <a href='#'><img src='images/menu-item/$image' alt='images'></a>
                                </div>
                                <div class='box-content'>
                                   <h6>$name</h6>
                                   <ul>
                                        <li>RM$price</li>
                                        <li>
                                            <i class='fa fa-heart'></i>
                                            <i class='fa fa-heart'></i>
                                            <i class='fa fa-heart'></i>
                                            <i class='fa fa-heart'></i>
                                            <i class='fa fa-heart'></i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>";
                    } ?>

                </div>
                <!--row-->
            </div>
            <!--container -->
        </section>

        <!-- Flat Tab-->
        <section class="flat-row flat-tab-menu menu-2">
            <div class="container">
                <div class="row">

                </div>
                <!--/.row-->

                <div class="row">
                    <div class="col-md-12 flat-tabs ">
                        <div class="bg-tabs">
                            <div class="title-section style1 martp-0px">
                                <!--<div class="top-section">
                                    <p>Find About</p>
                                </div>-->
                                <h1 class="title marbt-33px" style="color: #ccc;">Our Menu</h1>
                            </div>


                            <ul class="menu-tab">
                                <?php
                                $categories = $con->getMenuCategories(true);
                                $catCounter = 0;

                                foreach ($categories as $category) {
                                    $catName = $category["name"];
                                    $catStatus = $category["status"];

                                    if ($catStatus == "Active") {
                                        if ($catCounter == 0) {
                                            $catCounter++;
                                            echo "<li class='active'><a href='#'>$catName</a></li>";
                                        } else {
                                            echo "<li><a href='#'>$catName </a></li>";
                                        }
                                    }
                                }
                                ?>
                            </ul>



                        </div>
                        <!--/.bg-tabs-->
                        <div class="flat-divider d67px"></div>

                        <div class="content-tab">

                        <?php
                                foreach ($categories as $category) {
                                    if ($category["status"] == "Active") {
                                        echo "<div class='content-inner'>";
                                        $menuItems = $con->getMenuItems();
                                        foreach ($menuItems as $menuItem) {
                                            $status = $menuItem["status"];
                                            $foodCatagory = $menuItem["category"];

                                            if ($status == "Active" && $foodCatagory == $category["name"]) {
                                                $name = $menuItem["name"];
                                                $image = $menuItem["image"];
                                                $price = $menuItem["price"];
                                                $disc = $menuItem["discount"];
                                                $desc = $menuItem["description"];

                                                if ($disc != 0) {
                                                    $price = $price - $price * $disc;
                                                }

                                                $price = number_format($price, 2);
                                                $foodDesc = explode(",", $desc);

                                                echo "<div class='col-md-6'>";
                                                echo "<ul class='menu-fd'>";
                                                echo "<li>";
                                                echo "<div class='media-wrap flat-hover-moveright'>";
                                                echo "<a href='#' class='pull-left'>";
                                                echo "<img src='images/menu-item/$image' width='100' height='100' alt='client' class='img-responsive'>";
                                                echo "</a>";
                                                echo "<div class='media-body'>";
                                                echo "<h6><a href='#'>$name</a></h6>";
                                                echo "<div class='dotted-bg'></div>";
                                                echo "<span>RM$price</span>";
                                                echo "</div>";
                                                echo "<ul class='menu-in'>";
                                                foreach ($foodDesc as $desc) {
                                                    echo "<li style='margin-right:22px'>$desc </li>";
                                                }
                                                echo "</ul>";
                                                echo "</div>";
                                                echo "</li>";
                                                echo "</ul>";
                                                echo "</div>";
                                            }
                                        }
                                        echo "</div>";
                                    }
                                }
                                ?>
                        </div><!-- /.content-tab -->
                    </div>
                    <!--flat-tabs-->

                </div>
                <!--row-->
            </div>
            <!--container -->
        </section>

        <footer class="footer">
            <div class="footer-widgets">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="widget widget_text">
                                <h3 class="widget-title">About Us</h3>
                                <div class="textwidget">
                                    <p>Sed ut perspiciatis unde omnis iste <br /> natus error sit voluptatem accusantium doloremque laudantium.</p>
                                    <ul class="footer-info">
                                        <li class="address">203, Envato Labs, Behind Alis Steet,
                                            Melbourne, Australia.</li>
                                        <li class="email">Email us: company@domain.com</li>
                                        <li class="phone">Call us: 0084 962 216 601</li>
                                    </ul>
                                </div>
                            </div>
                        </div><!-- /.col-md-3 -->

                        <div class="col-md-3">
                            <div class="widget widget_recent_posts">
                                <h3 class="widget-title">Latest Posts</h3>
                                <ul>
                                    <li class="clearfix">
                                        <div class="thumb flat-hover-images">
                                            <a href="#"><img src="images/blog/5.jpg" alt="image"></a>
                                        </div>
                                        <div class="content">
                                            <h5 class="title"><a href="#">Whole Wheat & Soy Waffles Cake </a></h5>
                                            <div class="meta">19 September, 2016</div>
                                        </div>
                                    </li>

                                    <li class="clearfix">
                                        <div class="thumb flat-hover-images">
                                            <a href="#"><img src="images/blog/6.jpg" alt="image"></a>
                                        </div>
                                        <div class="content">
                                            <h5 class="title"><a href="#">Whole Wheat & Soy Waffles Cake</a></h5>
                                            <div class="meta">19 September, 2016</div>
                                        </div>
                                    </li>

                                </ul>
                            </div><!-- /.widget_recent_entries -->
                        </div><!-- /.col-md-3 -->

                        <div class="col-md-3">
                            <div class="widget widget-link clearfix">
                                <h3 class="widget-title">User Links </h3>

                                <ul class="links">
                                    <li><a href="#.">About Us</a></li>
                                    <li><a href="#.">Blog</a></li>
                                    <li><a href="#.">Courses </a></li>
                                    <li><a href="#.">FAQs</a></li>
                                    <li><a href="#.">Events</a></li>
                                    <li><a href="#.">Support</a></li>
                                </ul>


                                <div class="social-links">
                                    <a href="#"><i class="fa fa-facebook-square"></i>Facebok</a>
                                    <a href="#"><i class="fa fa-twitter-square"></i>Twitter</a>
                                    <a href="#"><i class="fa fa-google-plus-square"></i>Google+</a>
                                    <a href="#"><i class="fa fa-linkedin-square"></i>Linkedin</a>
                                    <a href="#"><i class="fa fa-instagram"></i>Instagram</a>
                                    <a href="#"><i class="fa fa-pinterest-square"></i>Pinterest</a>
                                </div>


                            </div>
                        </div><!-- /.col-md-3 -->

                        <div class="col-md-3">
                            <div class="widget widget_instagram">
                                <h3 class="widget-title">Instagram</h3>

                                <ul class="clearfix">
                                    <li>
                                        <div class="thumb images-hover flat-hover-images">
                                            <a href="#">
                                                <span><img src="images/instagram/1.jpg" alt="image"></span>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="thumb images-hover flat-hover-images">
                                            <a href="#">
                                                <span><img src="images/instagram/2.jpg" alt="image"></span>
                                            </a>
                                        </div>
                                    </li>
                                    <li class="last">
                                        <div class="thumb images-hover flat-hover-images">
                                            <a href="#">
                                                <span><img src="images/instagram/3.jpg" alt="image"></span>
                                            </a>
                                        </div>
                                    </li>
                                    <li class="last">
                                        <div class="thumb images-hover flat-hover-images">
                                            <a href="#">
                                                <span><img src="images/instagram/4.jpg" alt="image"></span>
                                            </a>
                                        </div>
                                    </li>

                                    <li class="last">
                                        <div class="thumb images-hover flat-hover-images">
                                            <a href="#">
                                                <span><img src="images/instagram/5.jpg" alt="image"></span>
                                            </a>
                                        </div>
                                    </li>

                                    <li class="last">
                                        <div class="thumb images-hover flat-hover-images">
                                            <a href="#">
                                                <span><img src="images/instagram/6.jpg" alt="image"></span>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div><!-- /.col-md-3 -->
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </div><!-- /.footer-widgets -->

            <div class="footer-content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="copyright">
                                <div class="copyright-content">
                                    Copyright © 2017. Designer by <a href="themesflat.html"> NthPsd</a>. All Rights Reserved</div>
                            </div>
                            <!-- Go Top -->
                            <a class="go-top-v1"> <i class="fa fa-arrow-up"></i> &nbsp;Back to Top</a>
                        </div><!-- /.col-md-12 -->
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </div><!-- /.footer-content -->
        </footer>

    </div>
    <!--box -->

    <!-- Javascript -->
    <script type="text/javascript" src="javascript/jquery.min.js"></script>
    <script type="text/javascript" src="javascript/bootstrap.min.js"></script>
    <script type="text/javascript" src="javascript/jquery.easing.js"></script>
    <script type="text/javascript" src="javascript/imagesloaded.min.js"></script>
    <script type="text/javascript" src="javascript/jquery.isotope.min.js"></script>
    <script type="text/javascript" src="javascript/jquery-waypoints.js"></script>
    <script type="text/javascript" src="javascript/jquery.magnific-popup.min.js"></script>
    <script type="text/javascript" src="javascript/jquery.cookie.js"></script>
    <script type="text/javascript" src="javascript/parallax.js"></script>
    <script type="text/javascript" src="javascript/smoothscroll.js"></script>
    <script type="text/javascript" src="javascript/jquery.flexslider-min.js"></script>
    <script type="text/javascript" src="javascript/owl.carousel.js"></script>
    <script type="text/javascript" src="javascript/jquery-validate.js"></script>
    <!-- <script type="text/javascript" src="javascript/switcher.js"></script> -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBvV0EE3yFozGhjmUv3BgoyviVdXzCwHlk"></script>
    <script type="text/javascript" src="javascript/gmap3.min.js"></script>
    <script type="text/javascript" src="javascript/main.js"></script>

    <!-- Revolution Slider -->
    <script type="text/javascript" src="javascript/jquery.themepunch.tools.min.js"></script>
    <script type="text/javascript" src="javascript/jquery.themepunch.revolution.min.js"></script>
    <script type="text/javascript" src="javascript/slider.js"></script>

</body>

<!-- Mirrored from corpthemes.com/html/sumi/menu.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 22 Mar 2021 04:41:07 GMT -->

</html>