<?php
/**
 * Created by Amin.MasterkinG
 * Website : MasterkinG32.CoM
 * Email : lichwow_masterking@yahoo.com
 * Date: 11/26/2018 - 8:36 PM
 */
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="generator" content="MasterkinG32.CoM"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="description" content="<?php echo $antiXss->xss_clean(get_config("page_title")); ?>">
    <meta name="description" content="<?php echo $antiXss->xss_clean(get_config("page_title")); ?>">
    <title><?php echo $antiXss->xss_clean(get_config("page_title")); ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="img/favicon.ico" rel="shortcut icon"/>

    <link rel="stylesheet" href="<?php echo $antiXss->xss_clean(get_config("baseurl")); ?>/template/<?php echo $antiXss->xss_clean(get_config("template")); ?>/css/google-fonts.css"/>
    <link rel="stylesheet" href="<?php echo $antiXss->xss_clean(get_config("baseurl")); ?>/template/<?php echo $antiXss->xss_clean(get_config("template")); ?>/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="<?php echo $antiXss->xss_clean(get_config("baseurl")); ?>/template/<?php echo $antiXss->xss_clean(get_config("template")); ?>/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="<?php echo $antiXss->xss_clean(get_config("baseurl")); ?>/template/<?php echo $antiXss->xss_clean(get_config("template")); ?>/css/flaticon.css"/>
    <link rel="stylesheet" href="<?php echo $antiXss->xss_clean(get_config("baseurl")); ?>/template/<?php echo $antiXss->xss_clean(get_config("template")); ?>/css/magnific-popup.css"/>
    <link rel="stylesheet" href="<?php echo $antiXss->xss_clean(get_config("baseurl")); ?>/template/<?php echo $antiXss->xss_clean(get_config("template")); ?>/css/owl.carousel.css"/>
    <link rel="stylesheet" href="<?php echo $antiXss->xss_clean(get_config("baseurl")); ?>/template/<?php echo $antiXss->xss_clean(get_config("template")); ?>/css/bfa-style.css"/>

    <!--[if lt IE 9]>
    <script src="<?php echo $antiXss->xss_clean(get_config("baseurl")); ?>/template/<?php echo $antiXss->xss_clean(get_config("template")); ?>/js/html5shiv.min.js"></script>
    <script src="<?php echo $antiXss->xss_clean(get_config("baseurl")); ?>/template/<?php echo $antiXss->xss_clean(get_config("template")); ?>/js/respond.min.js"></script>
    <![endif]-->

    <?php echo getCaptchaJS(); ?>

    <?php echo(!empty(lang('custom_css')) ? '<style>' . lang('custom_css') . '</style>' : ''); ?>
    <?php echo(!empty(lang('tpl_battleforazeroth_custom_css')) ? '<style>' . lang('tpl_battleforazeroth_custom_css') . '</style>' : ''); ?>

</head>
<body>
<div id="preloder">
    <div class="loader">
        <img src="<?php echo $antiXss->xss_clean(get_config("baseurl")); ?>/template/<?php echo $antiXss->xss_clean(get_config("template")); ?>/img/logo.png" alt="">
        <h2>Loading ...</h2>
    </div>
</div>

<div class="hero-section">
    <div class="hero-content">
        <div class="hero-center">
            <img src="<?php echo $antiXss->xss_clean(get_config("baseurl")); ?>/template/<?php echo $antiXss->xss_clean(get_config("template")); ?>/img/bfa-logo.png" alt="">
        </div>
    </div>
    <div id="hero-slider" class="owl-carousel">
        <div class="item  hero-item" data-bg="<?php echo $antiXss->xss_clean(get_config("baseurl")); ?>/template/<?php echo $antiXss->xss_clean(get_config("template")); ?>/img/01.jpg"></div>
        <div class="item  hero-item" data-bg="<?php echo $antiXss->xss_clean(get_config("baseurl")); ?>/template/<?php echo $antiXss->xss_clean(get_config("template")); ?>/img/02.jpg"></div>
    </div>
</div>