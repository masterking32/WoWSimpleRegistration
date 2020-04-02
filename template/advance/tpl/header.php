<?php
/**
 * Created by Amin.MasterkinG
 * Website : MasterkinG32.CoM
 * Email : lichwow_masterking@yahoo.com
 * Date: 04/02/2020 - 6:55 PM
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title><?php echo $antiXss->xss_clean(get_config("page_title")); ?></title>
    <meta content="" name="descriptison">
    <meta content="" name="keywords">
    <link href="<?php echo $antiXss->xss_clean(get_config("baseurl")); ?>/favicon.ICO" rel="icon">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
          rel="stylesheet">
    <link href="<?php echo $antiXss->xss_clean(get_config("baseurl")); ?>/template/<?php echo $antiXss->xss_clean(get_config("template")); ?>/assets/vendor/bootstrap/css/bootstrap.min.css"
          rel="stylesheet">
    <link href="<?php echo $antiXss->xss_clean(get_config("baseurl")); ?>/template/<?php echo $antiXss->xss_clean(get_config("template")); ?>/assets/vendor/icofont/icofont.min.css"
          rel="stylesheet">
    <link href="<?php echo $antiXss->xss_clean(get_config("baseurl")); ?>/template/<?php echo $antiXss->xss_clean(get_config("template")); ?>/assets/vendor/boxicons/css/boxicons.min.css"
          rel="stylesheet">
    <link href="<?php echo $antiXss->xss_clean(get_config("baseurl")); ?>/template/<?php echo $antiXss->xss_clean(get_config("template")); ?>/assets/vendor/venobox/venobox.css"
          rel="stylesheet">
    <link href="<?php echo $antiXss->xss_clean(get_config("baseurl")); ?>/template/<?php echo $antiXss->xss_clean(get_config("template")); ?>/assets/vendor/owl.carousel/assets/owl.carousel.min.css"
          rel="stylesheet">
    <link href="<?php echo $antiXss->xss_clean(get_config("baseurl")); ?>/template/<?php echo $antiXss->xss_clean(get_config("template")); ?>/assets/vendor/aos/aos.css"
          rel="stylesheet">
    <link href="<?php echo $antiXss->xss_clean(get_config("baseurl")); ?>/template/<?php echo $antiXss->xss_clean(get_config("template")); ?>/assets/css/style.css"
          rel="stylesheet">
</head>
<body>
<section id="hero"
         style="background-image: url('<?php echo $antiXss->xss_clean(get_config("baseurl")); ?>/template/<?php echo $antiXss->xss_clean(get_config("template")); ?>/assets/img/wow-bg/<?php echo get_config('expansion') . '-' . rand(1, 6); ?>.jpg')">
    <div class="hero-container">
        <a href="" class="hero-logo" data-aos="zoom-in"><img style="width: 250px; max-width: 80%;"
                                                             src="<?php echo $antiXss->xss_clean(get_config("baseurl")); ?>/template/<?php echo $antiXss->xss_clean(get_config("template")); ?>/assets/img/logo-1.png"
                                                             alt=""></a>
        <h1 data-aos="zoom-in" class="text-shadow1">Welcome
            To <?php echo $antiXss->xss_clean(get_config("page_title")); ?></h1>
        <h2 data-aos="fade-up" class="text-shadow1">Welcome to our private server, Join us now!</h2>
        <a data-aos="fade-up" href="#about" class="btn-get-started scrollto">Get Started</a>
    </div>
</section>
<header id="header" class="d-flex align-items-center">
    <div class="container">
        <div class="logo d-block d-lg-none">
            <a href="index.php"><img
                        src="<?php echo $antiXss->xss_clean(get_config("baseurl")); ?>/template/<?php echo $antiXss->xss_clean(get_config("template")); ?>/assets/img/logo.png"
                        alt="" class="img-fluid"></a>
        </div>
        <nav class="nav-menu d-none d-lg-block">
            <ul class="nav-inner">
                <li class="active"><a href="">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#connect">How to Connect</a></li>
                <li class="nav-logo"><a href="index.php"><img
                                src="<?php echo $antiXss->xss_clean(get_config("baseurl")); ?>/template/<?php echo $antiXss->xss_clean(get_config("template")); ?>/assets/img/logo.png"
                                alt="" class="img-fluid"></a></li>
                <li><a href="#register">Register</a></li>
                <li><a href="#server-status">Server status</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </nav>
    </div>
</header>
<main id="main">