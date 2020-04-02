<?php
/**
 * Created by Amin.MasterkinG
 * Website : MasterkinG32.CoM
 * Email : lichwow_masterking@yahoo.com
 * Date: 04/02/2020 - 6:55 PM
 */
?>
    <section id="connect" class="services">
        <div class="container">
            <div class="section-title" data-aos="fade-up">
                <h2>How to connect</h2>
                <p>Server Address/Realmlist: <code><?php echo strtoupper(get_config('realmlist')); ?></code></p>
            </div>
            <div class="row">
                <div class="col-lg-6 order-2 order-lg-1">
                    <div class="icon-box mt-5 mt-lg-0" data-aos="fade-up">
                        <i class="bx bx-user-plus"></i>
                        <h4>Create Account</h4>
                        <p>First of all, you must create an account. The account is used to log into both the game and
                            our website. Click here to open the registration page.</p>
                    </div>
                    <div class="icon-box mt-5" data-aos="fade-up" data-aos-delay="100">
                        <i class="bx bx-download"></i>
                        <h4>Download the game</h4>
                        <p>Install World of Warcraft. You can download it (legally) from here: Windows or Mac. Make sure
                            to upgrade to our current supported patch, which
                            is <?php echo get_config('game_version'); ?>. Patch mirrors can be found here. </p>
                    </div>
                    <div class="icon-box mt-5" data-aos="fade-up" data-aos-delay="200">
                        <i class="bx bx-game"></i>
                        <h4>Setup the game</h4>
                        <p>Open up the "World of Warcraft" directory. The default directory is "C:\Program Files\World
                            of Warcraft". When you've found it, open up the directory called "data", then go into the
                            directory called either enUS or enGB, depending on your client language.</p>
                    </div>
                    <div class="icon-box mt-5" data-aos="fade-up" data-aos-delay="300">
                        <i class="bx bx-server"></i>
                        <h4>Change server address</h4>
                        <p>Erase all text and change it to:
                            <code><?php echo strtoupper(get_config('realmlist')); ?></code></p>
                        <p>
                            Edit on <b>"/template/advance/tpl/how-connect.php"</b>.
                        </p>
                    </div>
                </div>
                <div class="image col-lg-6 order-1 order-lg-2"
                     style='background-image: url("<?php echo $antiXss->xss_clean(get_config("baseurl")); ?>/template/<?php echo $antiXss->xss_clean(get_config("template")); ?>/assets/img/sylvanas.png");background-size: auto 100%;background-position: center;background-repeat: no-repeat;'
                     data-aos="fade-left" data-aos-delay="100"></div>
            </div>
        </div>
    </section>