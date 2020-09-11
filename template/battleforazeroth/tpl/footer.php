<?php
/**
 * @author Amin Mahmoudi (MasterkinG)
 * @copyright    Copyright (c) 2019 - 2022, MsaterkinG32 Team, Inc. (https://masterking32.com)
 * @link    https://masterking32.com
 * @Description : It's not masterking32 framework !
 **/

use SebastianBergmann\Timer\Timer;

?>
<footer class="footer-section">
    <h2>Developed by <a href="http://masterking32.com">MasterkinG32.CoM</a>
    - <?php echo "Load " . Timer::resourceUsage(); ?>
    <BR>
    Tempelate Designed by <a href="https://belikovart.ru/" target="_blank">Roxtedy</a> and Modified by <a
                href="http://masterking32.com">Amin.MasterkinG</a></h2>
</footer>

<!--====== Javascripts & Jquery ======-->
<script src="<?php echo $antiXss->xss_clean(get_config("baseurl")); ?>/template/<?php echo $antiXss->xss_clean(get_config("template")); ?>/js/jquery-2.1.4.min.js"></script>
<script src="<?php echo $antiXss->xss_clean(get_config("baseurl")); ?>/template/<?php echo $antiXss->xss_clean(get_config("template")); ?>/js/bootstrap.min.js"></script>
<script src="<?php echo $antiXss->xss_clean(get_config("baseurl")); ?>/template/<?php echo $antiXss->xss_clean(get_config("template")); ?>/js/magnific-popup.min.js"></script>
<script src="<?php echo $antiXss->xss_clean(get_config("baseurl")); ?>/template/<?php echo $antiXss->xss_clean(get_config("template")); ?>/js/owl.carousel.min.js"></script>
<script src="<?php echo $antiXss->xss_clean(get_config("baseurl")); ?>/template/<?php echo $antiXss->xss_clean(get_config("template")); ?>/js/circle-progress.min.js"></script>
<script src="<?php echo $antiXss->xss_clean(get_config("baseurl")); ?>/template/<?php echo $antiXss->xss_clean(get_config("template")); ?>/js/main.js"></script>
</body>
</html>