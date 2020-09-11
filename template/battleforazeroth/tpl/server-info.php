<?php
/**
 * Created by Amin.MasterkinG
 * Website : MasterkinG32.CoM
 * Email : lichwow_masterking@yahoo.com
 * Date: 04/02/2020 - 6:55 PM
 */
?>
<div class="card-section">
    <div class="container">
        <div class="row">

            <div class="col-md-4 col-sm-6">
                <div class="bfa-card" style="padding: 34px 25px">
                    <div class="icon">
                        <img src="<?php echo $antiXss->xss_clean(get_config("baseurl")); ?>/template/<?php echo $antiXss->xss_clean(get_config("template")); ?>/img/card-1.png" alt="">
                    </div>
                    <p><i class="fa fa-check"></i><?php elang('server_type'); ?>: <b>Blizzlike</b></p>
                    <p><i class="fa fa-check"></i><?php elang('xp_rate'); ?>: <b>x4</b></p>
                    <p><i class="fa fa-check"></i><?php elang('drop_rate'); ?>: <b>x4</b></p>
                    <p><i class="fa fa-check"></i><?php elang('start_level'); ?>: <b>1</b></p>
                    <p><i class="fa fa-check"></i><?php elang('max_level'); ?>: <b>80</b></p>
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <div class="bfa-card">
                    <div class="icon">
                        <img src="<?php echo $antiXss->xss_clean(get_config("baseurl")); ?>/template/<?php echo $antiXss->xss_clean(get_config("template")); ?>/img/card-2.png" alt="">
                    </div>
                    <h2><?php elang('server_information'); ?></h2>
                    <p><?php elang('game_version'); ?>: <b><span style="color: #007a0c"><?php echo get_config('game_version'); ?></span></b></p>
                    <p><?php elang('server_address'); ?> / <?php elang('realmlist'); ?>:</p>
                    <p><b><span style="color: #007a0c">set realmlist <?php echo get_config('realmlist'); ?></span></p>
                </div>
            </div>

            <div class="col-md-4 col-sm-12">
                <div class="bfa-card" style="padding: 34px 25px">
                    <div class="icon">
                        <img src="<?php echo $antiXss->xss_clean(get_config("baseurl")); ?>/template/<?php echo $antiXss->xss_clean(get_config("template")); ?>/img/card-1.png" alt="">
                    </div>
                    <p><i class="fa fa-check"></i><?php elang('server_uptime'); ?>: <b>99.9%</b></p>
                    <p><i class="fa fa-check"></i><?php elang('fixed_spells'); ?>: <b>95%</b></p>
                    <p><i class="fa fa-check"></i><?php elang('fixed_dungeons'); ?>: <b>99%</b></p>
                    <p><i class="fa fa-check"></i><?php elang('fixed_instances'); ?>: <b>99%</b></p>
                    <p style="font-size: 11px;"><?php elang('edit_on'); ?>: <code>/template/battleforazeroth/server-info.conf</code></p>
                </div>
            </div>
        </div>
    </div>
</div>