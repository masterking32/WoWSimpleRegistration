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
    <link rel="stylesheet"
          href="<?php echo $antiXss->xss_clean(get_config("baseurl")); ?>/template/<?php echo $antiXss->xss_clean(get_config("template")); ?>/css/bootstrap.min.css">
    <link rel="stylesheet"
          href="<?php echo $antiXss->xss_clean(get_config("baseurl")); ?>/template/<?php echo $antiXss->xss_clean(get_config("template")); ?>/css/style.css">
    <script src="<?php echo $antiXss->xss_clean(get_config("baseurl")); ?>/template/<?php echo $antiXss->xss_clean(get_config("template")); ?>/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo $antiXss->xss_clean(get_config("baseurl")); ?>/template/<?php echo $antiXss->xss_clean(get_config("template")); ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo $antiXss->xss_clean(get_config("baseurl")); ?>/template/<?php echo $antiXss->xss_clean(get_config("template")); ?>/js/popper.min.js"></script>
    <?php echo getCaptchaJS(); ?>
</head>
<body>
<div class="container">