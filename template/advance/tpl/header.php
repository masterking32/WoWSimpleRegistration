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
    <?php echo getCaptchaJS(); ?>

    <?php echo(!empty(lang('custom_css')) ? '<style>' . lang('custom_css') . '</style>' : ''); ?>
    <?php echo(!empty(lang('tpl_advance_custom_css')) ? '<style>' . lang('tpl_advance_custom_css') . '</style>' : ''); ?>
</head>
<body>
<section id="hero"
         style="background-image: url('<?php echo $antiXss->xss_clean(get_config("baseurl")); ?>/template/<?php echo $antiXss->xss_clean(get_config("template")); ?>/assets/img/wow-bg/<?php echo get_config('expansion') . '-' . rand(1, 6); ?>.jpg')">
    <div class="hero-container">
        <a href="" class="hero-logo" data-aos="zoom-in"><img style="width: 250px; max-width: 80%;"
                                                             src="<?php echo $antiXss->xss_clean(get_config("baseurl")); ?>/template/<?php echo $antiXss->xss_clean(get_config("template")); ?>/assets/img/logo-1.png"
                                                             alt=""></a>
        <h1 data-aos="zoom-in"
            class="text-shadow1"><?php echo lang('welcome_to') . ' ' . $antiXss->xss_clean(get_config("page_title")); ?></h1>
        <h2 data-aos="fade-up" class="text-shadow1"><?php elang('welcome_message'); ?></h2>
        <a data-aos="fade-up" href="#about" class="btn-get-started scrollto"><?php elang('get_started');  ?></a>
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
                <li class="active"><a href=""><?php elang('home');  ?></a></li>
                <li><a href="#about"><?php elang('about');  ?></a></li>
                <li><a href="#connect"><?php elang('how_to_connect');  ?></a></li>
                <li class="nav-logo"><a href="index.php"><img
                                src="<?php echo $antiXss->xss_clean(get_config("baseurl")); ?>/template/<?php echo $antiXss->xss_clean(get_config("template")); ?>/assets/img/logo.png"
                                alt="" class="img-fluid"></a></li>
                <li><a href="#register"><?php elang('register');  ?></a></li>
                <li><a href="#server-status"><?php elang('server_status');  ?></a></li>
                <li><a href="#contact"><?php elang('contact');  ?></a></li>
                <li><a class="nav-item nav-link" id="nav-contact-tab" data-toggle="modal" data-target="#lang-modal"
                       role="tab" aria-controls="nav-contact" aria-selected="false"><?php elang('change_lang_head'); ?></a></li>
            </ul>
        </nav>
    </div>
</header>
<main id="main">

<!-- Language Modal -->
<div class="modal" id="lang-modal">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title"><?php elang('change_lang_head'); ?></h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                <form action="" method="post">
                                                    <div class="form-group">
                                                        <label for="lang"><?php elang('change_lang_form_head'); ?></label>
                                                        <select class="form-control" id="langchange" name="langchange">
                                                            <option value="english"><?php elang('lang_en'); ?></option>
                                                            <option value="persian"><?php elang('lang_pe'); ?></option>
                                                            <option value="italian"><?php elang('lang_it'); ?></option>
                                                            <option value="chinese-simplified"><?php elang('lang_ch_si'); ?></option>
                                                            <option value="chinese-traditional"><?php elang('lang_ch_tr'); ?></option>
                                                            <option value="swedish"><?php elang('lang_sw'); ?></option>
                                                            <option value="french"><?php elang('lang_fr'); ?></option>
                                                            <option value="german"><?php elang('lang_de'); ?></option>
                                                            <option value="spanish"><?php elang('lang_sp'); ?></option>
                                                            <option value="korean"><?php elang('lang_ko'); ?></option>
                                                        </select>
                                                    </div>
                                                    <input name="langchangever" type="hidden" value="langchanger">
                                                    <button type="submit" class="btn btn-primary"><?php elang('change_lang_sub'); ?></button>
                                                </form>
                                            </div>
                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>