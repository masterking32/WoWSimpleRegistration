<?php
/**
 * Created by Amin.MasterkinG
 * Website : MasterkinG32.CoM
 * Email : lichwow_masterking@yahoo.com
 * Date: 04/02/2020 - 6:55 PM
 */
use SebastianBergmann\Timer\Timer;
?>
</main>
<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="social-links" data-aos="fade-up" data-aos-delay="100">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
            </div>
        </div>
    </div>
    <div class="container footer-bottom clearfix">
        <div class="credits">
            Developed by <a href="http://masterking32.com">MasterkinG32.CoM</a>
            - <?php echo "Load " . Timer::resourceUsage(); ?>
            <BR>
            Tempelate Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> and Modified by <a
                    href="http://masterking32.com">Amin.MasterkinG</a>
        </div>
    </div>
</footer>
<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
<script src="<?php echo $antiXss->xss_clean(get_config("baseurl")); ?>/template/<?php echo $antiXss->xss_clean(get_config("template")); ?>/assets/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo $antiXss->xss_clean(get_config("baseurl")); ?>/template/<?php echo $antiXss->xss_clean(get_config("template")); ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo $antiXss->xss_clean(get_config("baseurl")); ?>/template/<?php echo $antiXss->xss_clean(get_config("template")); ?>/assets/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="<?php echo $antiXss->xss_clean(get_config("baseurl")); ?>/template/<?php echo $antiXss->xss_clean(get_config("template")); ?>/assets/vendor/php-email-form/validate.js"></script>
<script src="<?php echo $antiXss->xss_clean(get_config("baseurl")); ?>/template/<?php echo $antiXss->xss_clean(get_config("template")); ?>/assets/vendor/jquery-sticky/jquery.sticky.js"></script>
<script src="<?php echo $antiXss->xss_clean(get_config("baseurl")); ?>/template/<?php echo $antiXss->xss_clean(get_config("template")); ?>/assets/vendor/venobox/venobox.min.js"></script>
<script src="<?php echo $antiXss->xss_clean(get_config("baseurl")); ?>/template/<?php echo $antiXss->xss_clean(get_config("template")); ?>/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="<?php echo $antiXss->xss_clean(get_config("baseurl")); ?>/template/<?php echo $antiXss->xss_clean(get_config("template")); ?>/assets/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="<?php echo $antiXss->xss_clean(get_config("baseurl")); ?>/template/<?php echo $antiXss->xss_clean(get_config("template")); ?>/assets/vendor/aos/aos.js"></script>
<script src="<?php echo $antiXss->xss_clean(get_config("baseurl")); ?>/template/<?php echo $antiXss->xss_clean(get_config("template")); ?>/assets/js/main.js"></script>
</body>
</html>