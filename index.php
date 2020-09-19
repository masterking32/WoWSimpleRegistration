<?php
/**
 * @author Amin Mahmoudi (MasterkinG)
 * @copyright    Copyright (c) 2019 - 2022, MasterkinG32 Team, Inc. (https://masterking32.com)
 * @link    https://masterking32.com
 * @Description : It's not masterking32 framework !
 **/

if (version_compare(PHP_VERSION, '7.0', '<')) {
    echo "<p>You need to use PHP >= 7.0.0</p>";
    echo "<hr>";
    echo "<p><a href='https://www.apachefriends.org/index.html' target='_blank'>XAMPP - Windows/Mac/Linux</a></p>";
    echo "<p><a href='http://www.wampserver.com/en/' target='_blank'>WAMP Server - Windows</a></p>";
    echo "<hr>";
    echo "<p><a href='https://www.vultr.com/docs/how-to-install-and-configure-php-70-or-php-71-on-ubuntu-16-04' target='_blank'>Install PHP 7 on Ubuntu 16.04</a></p>";
    echo "<p><a href='https://www.digitalocean.com/community/tutorials/how-to-upgrade-to-php-7-on-ubuntu-14-04' target='_blank'>Install PHP 7 on Ubuntu 14.04</a></p>";
    echo "<hr>";
    echo "<p><a href='https://tecadmin.net/install-php-7-on-ubuntu/' target='_blank'>Install PHP 7 on Ubuntu 18.04</a></p>";
    echo "<p><a href='https://www.vultr.com/docs/how-to-install-and-configure-php-70-or-php-71-on-ubuntu-16-04' target='_blank'>Install PHP 7 on Ubuntu 16.04</a></p>";
    echo "<p><a href='https://www.digitalocean.com/community/tutorials/how-to-upgrade-to-php-7-on-ubuntu-14-04' target='_blank'>Install PHP 7 on Ubuntu 14.04</a></p>";
    echo "<hr>";
    echo "<p><a href='https://computingforgeeks.com/install-php-on-debian-10-buster/' target='_blank'>Install PHP 7 on Debian 10</a></p>";
    echo "<p><a href='https://computingforgeeks.com/how-to-install-php-7-3-on-debian-9-debian-8/' target='_blank'>Install PHP 7 on Debian 8/9</a></p>";
    echo "<hr>";
    echo "<p><a href='https://linuxize.com/post/install-php-7-on-centos-7/' target='_blank'>Install PHP 7 on CentOS 7</a></p>";
    echo "<p><a href='https://www.tecmint.com/install-php-7-in-centos-6/' target='_blank'>Install PHP 7 on CentOS 6</a></p>";
    echo "<hr>";
    echo "<p><a href='https://www.a2hosting.com/kb/cpanel/cpanel-software/changing-php-versions-and-settings-in-cpanel' target='_blank'>CPanel change PHP version</a></p>";
    echo "<p><a href='https://www.liquidweb.com/kb/installing-additional-php-versions-using-easyapache-4/' target='_blank'>CPanel EasyApache4 install PHP 7</a></p>";
    exit();
}

require_once './application/loader.php';
user::post_handler();
vote::post_handler();
require_once base_path . 'template/' . get_config('template') . '/tpl/main.php';