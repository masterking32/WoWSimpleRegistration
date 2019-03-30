<?php
/**
 * Created by Amin.MasterkinG
 * Website : MasterkinG32.CoM
 * Email : lichwow_masterking@yahoo.com
 * Date: 11/26/2018 - 8:36 PM
 */
?>
<div style="text-align: left;padding: 10px;line-height: 1.5;">
    <p>1. First of all, you must create an account. The account is used to log into both the game and our website. Click here to open the registration page.</p>
    <p>2. Install World of Warcraft. You can download it (legally) from here: Windows or Mac. Make sure to upgrade to our current supported patch, which is 3.3.5 (build 12340). Patch mirrors can be found here. </p>
    <p>3. Open up the "World of Warcraft" directory. The default directory is "C:\Program Files\World of Warcraft". When you've found it, open up the directory called "data", then go into the directory called either enUS or enGB, depending on your client language.</p>
    <p>5. Erase all text and change it to:</p>
    <p style="text-align: center;font-weight: bold;color:#F1A40F">set realmlist <?php echo get_config('realmlist'); ?></p>
    <p>You may now start playing! If you need any help, do not hesitate to create a support ticket.</p>
</div>
