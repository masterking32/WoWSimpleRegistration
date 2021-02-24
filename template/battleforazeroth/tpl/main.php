<?php
/**
 * Created by Amin.MasterkinG
 * Website : MasterkinG32.CoM
 * Email : lichwow_masterking@yahoo.com
 * Date: 11/26/2018 - 8:36 PM
 */
require_once 'header.php'; ?>




<div class="about-section">
    <div class="overlay"></div>
    <div class="alliance"></div>
    <div class="horde"></div>

    <?php require_once 'server-info.php'; ?>

    <div class="about-contant">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-stroke">
                    <div class="text-center title-bg1"><h2><span><?php elang('how_to_connect'); ?></span></h2></div>
                    <?php require_once 'howtoconnect.php'; ?>
                </div>
                <div class="col-md-6 text-stroke">
                    <div class="text-center title-bg1"><h2><span style="background-color: #2f0000;"><?php elang('server_rules'); ?></span></h2></div>
                    <?php require_once 'rules.php'; ?>
                </div>
            </div>

            <div class="intro-video">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <img src="<?php echo $antiXss->xss_clean(get_config("baseurl")); ?>/template/<?php echo $antiXss->xss_clean(get_config("template")); ?>/img/video.png" alt="">
                        <a href="https://www.youtube.com/watch?v=AyE7t0B2q2Y" class="video-popup">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="testimonial-section">
    <div class="container">
        <div class="row">
            <div class="services-card-section spad">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="sv-card">
                                <div class="card-text" style="padding-left: 15px;padding-top: 40px; padding-bottom: 10px;">
                                    <h2 style="text-align: center;"><?php elang('create_account');?></h2>
                                    <form action="<?php echo $antiXss->xss_clean(get_config("baseurl")); ?>/index.php#register"
                                          method="post" class="form-class" id="con_form">
                                        <div style="padding: 10px;">
                                            <?php error_msg();
                                            success_msg(); //Display message. ?>
                                            <div class="input-group">
                                                <input type="email" placeholder="<?php elang('email'); ?>"
                                                       name="email">
                                            </div>
                                            <?php if (!get_config('battlenet_support')) { ?>
                                                <div class="input-group">
                                                    <input type="text" placeholder="<?php elang('username'); ?>"
                                                           name="username">
                                                </div>
                                            <?php } ?>
                                            <div class="input-group">
                                                <input type="password" placeholder="<?php elang('password'); ?>"
                                                       name="password">
                                            </div>
                                                <input type="password" placeholder="<?php elang('retype_password'); ?>"
                                                       name="repassword">
                                            <?php echo GetCaptchaHTML(false); ?>
                                            <input name="submit" type="hidden" value="register">
                                            <div class="text-center" style="margin-top: 10px;"><input type="submit"
                                                                                                      class="site-btn"
                                                                                                      value="<?php elang('register'); ?>">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <div class="sv-card">
                                <a href="news-post.html"><div class="card-img">
                                        <img src="<?php echo $antiXss->xss_clean(get_config("baseurl")); ?>/template/<?php echo $antiXss->xss_clean(get_config("template")); ?>/img/card-3.jpg" alt="">
                                    </div></a>
                                <div class="card-text" style="margin-top: -7px;">
                                    <?php if (empty(get_config('disable_changepassword'))) { ?>
                                        <div class="text-center">
                                            <button type="button" class="site-btn-login" data-toggle="modal"
                                                    data-target="#changepassword-modal">
                                                <?php elang('change_password'); ?>
                                            </button>
                                        </div>
                                    <?php } ?>
                                    <div class="text-center" style="margin-top: 10px;">
                                        <button type="button" class="site-btn-login" data-toggle="modal"
                                                data-target="#restorepassword-modal">
                                            <?php elang('restore_password'); ?>
                                        </button>
                                    </div>
                                    <?php if (get_config('2fa_support')) { ?>
                                        <div class="text-center" style="margin-top: 10px;">
                                            <button type="button" class="site-btn-login" data-toggle="modal"
                                                    data-target="#e2fa-modal">
                                                <?php elang('two_factor_authentication'); ?>
                                            </button>
                                        </div>
                                        <div class="modal" id="e2fa-modal">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title"><?php elang('two_factor_authentication'); ?></h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="<?php echo $antiXss->xss_clean(get_config("baseurl")); ?>/index.php#register"
                                                              method="post">
                                                            <div>
                                                                <ul>
                                                                    <li><?php elang('two_factor_authentication_tip1'); ?> <a
                                                                                href="https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2"
                                                                                target="_blank">Google Store</a> - <a
                                                                                href="https://apps.apple.com/app/google-authenticator/id388497605"
                                                                                target="_blank">Apple Store</a></li>
                                                                </ul>
                                                            </div>
                                                            <div class="input-group">
                                                                <span class="input-group"><?php elang('email'); ?></span>
                                                                <input type="email" class="form-control"
                                                                       placeholder="<?php elang('email'); ?>"
                                                                       name="email">
                                                            </div>
                                                            <?php if (empty(get_config('battlenet_support'))) { ?>
                                                                <div class="input-group">
                                                                    <span class="input-group"><?php elang('username'); ?></span>
                                                                    <input type="text" class="form-control"
                                                                           placeholder="<?php elang('username'); ?>"
                                                                           name="username">
                                                                </div>
                                                            <?php }
                                                            echo GetCaptchaHTML(); ?>
                                                            <input name="submit" type="hidden" value="etfa">
                                                            <div class="text-center" style="margin-top: 10px;"><input
                                                                        type="submit"
                                                                        class="btn btn-primary"
                                                                        value="<?php elang('two_factor_authentication_enable'); ?>"></div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                                                            <?php elang('close'); ?>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php }
                                    if (get_config('vote_system')) { ?>
                                        <div class="text-center" style="margin-top: 10px;">
                                            <button type="button" class="site-btn-login" data-toggle="modal"
                                                    data-target="#vote-modal">
                                                <?php elang('vote_for_us'); ?>
                                            </button>
                                        </div>
                                        <div class="text-center" style="margin-top: 10px;">
                                            <button type="button" class="site-btn-login" data-toggle="modal"
                                                    data-target="#lang-modal">
                                                <?php elang('change_lang_head'); ?>
                                            </button>
                                        </div>
                                        <div class="modal" id="vote-modal">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title"><?php elang('vote'); ?></h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="<?php echo $antiXss->xss_clean(get_config("baseurl")); ?>/index.php#register"
                                                              method="post" target="_blank">
                                                            <?php if (get_config('battlenet_support')) { ?>
                                                                <div class="input-group">
                                                                    <span class="input-group"><?php elang('email'); ?></span>
                                                                    <input type="email" class="form-control" placeholder="<?php elang('email'); ?>"
                                                                           name="account">
                                                                </div>
                                                            <?php } else { ?>
                                                                <div class="input-group">
                                                                    <span class="input-group"><?php elang('username'); ?></span>
                                                                    <input type="text" class="form-control" placeholder="<?php elang('username'); ?>"
                                                                           name="account">
                                                                </div>
                                                            <?php } ?>
                                                            <div class="text-center" style="margin-top: 10px;">
                                                                <?php
                                                                $vote_sites = get_config('vote_sites');
                                                                if (!empty($vote_sites)) {
                                                                    foreach ($vote_sites as $siteID => $vote_site) {
                                                                        $tmp_id = $siteID + 1;
                                                                        echo '<button type="submit" name="siteid" value="' . $tmp_id . '" style="border:none; background-color: transparent;"><img src="' . $vote_site['image'] . '"></button>';
                                                                    }
                                                                }
                                                                ?>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                                                            <?php elang('close'); ?>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <div class="modal" id="restorepassword-modal">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title"><?php elang('restore_password'); ?></h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="<?php echo $antiXss->xss_clean(get_config("baseurl")); ?>/index.php#register"
                                                          method="post">
                                                        <?php if (get_config('battlenet_support')) { ?>
                                                            <div class="input-group">
                                                                <span class="input-group"><?php elang('email'); ?></span>
                                                                <input type="email" class="form-control" placeholder="<?php elang('email'); ?>"
                                                                       name="email">
                                                            </div>
                                                        <?php } else { ?>
                                                            <div class="input-group">
                                                                <span class="input-group"><?php elang('username'); ?></span>
                                                                <input type="text" class="form-control" placeholder="<?php elang('username'); ?>"
                                                                       name="username">
                                                            </div>
                                                        <?php }
                                                        echo GetCaptchaHTML(); ?>
                                                        <input name="submit" type="hidden" value="restorepassword">
                                                        <div class="text-center" style="margin-top: 10px;"><input
                                                                    type="submit"
                                                                    class="btn btn-primary"
                                                                    value="<?php elang('restore_password'); ?>"></div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                                                        <?php elang('close'); ?>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal" id="changepassword-modal">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title"><?php elang('change_password'); ?></h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="<?php echo $antiXss->xss_clean(get_config("baseurl")); ?>/index.php#register"
                                                          method="post">
                                                        <?php if (get_config('battlenet_support')) { ?>
                                                            <div class="input-group">
                                                                <span class="input-group"><?php elang('email'); ?></span>
                                                                <input type="email" class="form-control" placeholder="<?php elang('email'); ?>"
                                                                       name="email">
                                                            </div>
                                                        <?php } else { ?>
                                                            <div class="input-group">
                                                                <span class="input-group"><?php elang('username'); ?></span>
                                                                <input type="text" class="form-control" placeholder="<?php elang('username'); ?>"
                                                                       name="username">
                                                            </div>
                                                        <?php } ?>
                                                        <div class="input-group">
                                                            <span class="input-group"><?php elang('old_password'); ?></span>
                                                            <input type="password" class="form-control"
                                                                   placeholder=<?php elang('old_password'); ?>"
                                               name="old_password">
                                                        </div>
                                                        <div class="input-group">
                                                            <span class="input-group"><?php elang('password'); ?></span>
                                                            <input type="password" class="form-control"
                                                                   placeholder="<?php elang('password'); ?>"
                                                                   name="password">
                                                        </div>
                                                        <div class="input-group">
                                                            <span class="input-group"><?php elang('retype_password'); ?></span>
                                                            <input type="password" class="form-control"
                                                                   placeholder="<?php elang('retype_password'); ?>"
                                                                   name="repassword">
                                                        </div>
                                                        <?php echo GetCaptchaHTML(); ?>
                                                        <input name="submit" type="hidden" value="changepass">
                                                        <div class="text-center" style="margin-top: 10px;"><input
                                                                    type="submit"
                                                                    class="btn btn-primary"
                                                                    value="<?php elang('change_password'); ?>"></div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                                                        <?php elang('close'); ?>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- island card section end-->
        </div>
    </div>
</div>

<div class="promotion-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2><?php elang('server_status'); ?></h2>

                <?php if (!get_config('disable_top_players')) {
                    $i = 1;
                    foreach (get_config('realmlists') as $onerealm_key => $onerealm) {
                        echo "<h6 style='color: #005cbf;font-weight: bold;'>{$onerealm['realmname']}</h6><hr>";
                        $data2show = status::get_top_playtime($onerealm['realmid']);
                        echo "<button type=\"button\" class=\"btn btn-info\" data-toggle=\"modal\"  data-aos=\"fade-up\" data-aos-delay=\"100\"data-target=\"#modal-id$i\">" . lang('play_time') . "</button><div class=\"modal\" id=\"modal-id$i\"><div class=\"modal-dialog modal-lg\"><div class=\"modal-content\">
                                            <div class=\"modal-header\"><h4 class=\"modal-title\">" . lang('top_players') . " - " . lang('play_time') . "</h4><button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button></div><div class=\"modal-body\">";

                        if (!is_array($data2show)) {
                            echo "<span style='color: #0d99e5;'>" . lang('online_players_msg2') . "</span>";
                        } else {
                            echo '<table class="table table-striped"><thead><tr><th scope="col">' . lang('rank') . '</th><th scope="col">' . lang('name') . '</th><th scope="col">' . lang('race') . '</th> <th scope="col">' . lang('class') . '</th><th scope="col">' . lang('level') . '</th><th scope="col">' . lang('play_time') . '</th></tr></thead><tbody>';
                            $m = 1;
                            foreach ($data2show as $one_char) {
                                if (empty($one_char['name'])) {
                                    continue;
                                }
                                echo '<tr><td>' . $m++ . '<th scope="row">' . $antiXss->xss_clean($one_char['name']) . '</th><td><img src=\'' . get_config("baseurl") . '/template/' . $antiXss->xss_clean(get_config("template")) . '/images/race/' . $antiXss->xss_clean($one_char["race"]) . '-' . $antiXss->xss_clean($one_char["gender"]) . '.gif\'></td><td><img src=\'' . get_config("baseurl") . '/template/' . $antiXss->xss_clean(get_config("template")) . '/images/class/' . $antiXss->xss_clean($one_char["class"]) . '.gif\'></td><td>' . $antiXss->xss_clean($one_char['level']) . '</td><td>' . $antiXss->xss_clean(get_human_time_from_sec($one_char['totaltime'])) . '</td></tr>';
                            }
                            echo '</table>';
                        }
                        echo "</div><div class=\"modal-footer\"><button type=\"button\" class=\"btn btn-danger\" data-dismiss=\"modal\">Close</button></div></div></div></div>";
                        $i++;

                        $data2show = status::get_top_killers($onerealm['realmid']);
                        echo "<button type=\"button\" class=\"btn btn-info\" data-toggle=\"modal\"  data-aos=\"fade-up\" data-aos-delay=\"100\"data-target=\"#modal-id$i\">" . lang('killers') . "</button><div class=\"modal\" id=\"modal-id$i\"><div class=\"modal-dialog modal-lg\"><div class=\"modal-content\">
                                            <div class=\"modal-header\"><h4 class=\"modal-title\">" . lang('top_players') . " - " . lang('killers') . "</h4><button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button></div><div class=\"modal-body\">";
                        if (!is_array($data2show)) {
                            echo "<span style='color: #0d99e5;'>" . lang('online_players_msg2') . "</span>";
                        } else {
                            echo '<table class="table table-striped"><thead><tr><th scope="col">' . lang('rank') . '</th><th scope="col">' . lang('name') . '</th><th scope="col">' . lang('race') . '</th> <th scope="col">' . lang('class') . '</th><th scope="col">' . lang('level') . '</th><th scope="col">' . lang('kills') . '</th></tr></thead><tbody>';
                            $m = 1;
                            foreach ($data2show as $one_char) {
                                if (empty($one_char['name'])) {
                                    continue;
                                }
                                echo '<tr><td>' . $m++ . '<th scope="row">' . $antiXss->xss_clean($one_char['name']) . '</th><td><img src=\'' . get_config("baseurl") . '/template/' . $antiXss->xss_clean(get_config("template")) . '/images/race/' . $antiXss->xss_clean($one_char["race"]) . '-' . $antiXss->xss_clean($one_char["gender"]) . '.gif\'></td><td><img src=\'' . get_config("baseurl") . '/template/' . $antiXss->xss_clean(get_config("template")) . '/images/class/' . $antiXss->xss_clean($one_char["class"]) . '.gif\'></td><td>' . $antiXss->xss_clean($one_char['level']) . '</td><td>' . $antiXss->xss_clean($one_char['totalKills']) . '</td></tr>';
                            }
                            echo '</table>';
                        }
                        echo "</div><div class=\"modal-footer\"><button type=\"button\" class=\"btn btn-danger\" data-dismiss=\"modal\">" . lang('close') . "</button></div></div></div></div>";
                        $i++;

                        $data2show = status::get_top_honorpoints($onerealm['realmid']);
                        echo "<button type=\"button\" class=\"btn btn-info\" data-toggle=\"modal\"  data-aos=\"fade-up\" data-aos-delay=\"100\"data-target=\"#modal-id$i\">" . lang('honor_points') . "</button><div class=\"modal\" id=\"modal-id$i\"><div class=\"modal-dialog modal-lg\"><div class=\"modal-content\">
                                            <div class=\"modal-header\"><h4 class=\"modal-title\">" . lang('top_players') . " - " . lang('honor_points') . "</h4><button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button></div><div class=\"modal-body\">";
                        if (!is_array($data2show)) {
                            echo "<span style='color: #0d99e5;'>" . lang('online_players_msg2') . "</span>";
                        } else {
                            echo '<table class="table table-striped"><thead><tr><th scope="col">' . lang('rank') . '</th><th scope="col">' . lang('name') . '</th><th scope="col">' . lang('race') . '</th> <th scope="col">' . lang('class') . '</th><th scope="col">' . lang('rank') . '</th>';

                            if (get_config('expansion') >= 6) {
                                echo '<th scope="col">' . lang('honor_level') . '</th>';
                            }

                            echo '<th scope="col">' . lang('honor_points') . '</th></tr></thead><tbody>';
                            $m = 1;
                            foreach ($data2show as $one_char) {
                                if (empty($one_char['name'])) {
                                    continue;
                                }
                                echo '<tr><td>' . $m++ . '<th scope="row">' . $antiXss->xss_clean($one_char['name']) . '</th><td><img src=\'' . get_config("baseurl") . '/template/' . $antiXss->xss_clean(get_config("template")) . '/images/race/' . $antiXss->xss_clean($one_char["race"]) . '-' . $antiXss->xss_clean($one_char["gender"]) . '.gif\'></td><td><img src=\'' . get_config("baseurl") . '/template/' . $antiXss->xss_clean(get_config("template")) . '/images/class/' . $antiXss->xss_clean($one_char["class"]) . '.gif\'></td><td>' . $antiXss->xss_clean($one_char['level']) . '</td>';

                                if (get_config('expansion') >= 6) {
                                    echo '<td>' . $antiXss->xss_clean($one_char['honorLevel']) . '</td>';
                                    echo '<td>' . $antiXss->xss_clean($one_char['honor']) . '</td>';
                                } else {
                                    echo '<td>' . $antiXss->xss_clean($one_char['totalHonorPoints']) . '</td>';
                                }

                                echo '</tr>';
                            }
                            echo '</table>';
                        }
                        echo "</div><div class=\"modal-footer\"><button type=\"button\" class=\"btn btn-danger\" data-dismiss=\"modal\">" . lang('close') . "</button></div></div></div></div>";
                        $i++;

                        $data2show = status::get_top_arenapoints($onerealm['realmid']);
                        echo "<button type=\"button\" class=\"btn btn-info\" data-toggle=\"modal\"  data-aos=\"fade-up\" data-aos-delay=\"100\"data-target=\"#modal-id$i\">" . lang('arena_points') . "</button><div class=\"modal\" id=\"modal-id$i\"><div class=\"modal-dialog modal-lg\"><div class=\"modal-content\">
                                            <div class=\"modal-header\"><h4 class=\"modal-title\">" . lang('top_players') . " - " . lang('arena_points') . ":</h4><button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button></div><div class=\"modal-body\">";
                        if (!is_array($data2show)) {
                            echo "<span style='color: #0d99e5;'>" . lang('online_players_msg2') . "</span>";
                        } else {
                            echo '<table class="table table-striped"><thead><tr><th scope="col">' . lang('rank') . '</th><th scope="col">' . lang('name') . '</th><th scope="col">' . lang('race') . '</th> <th scope="col">' . lang('class') . '</th><th scope="col">' . lang('level') . '</th><th scope="col">' . lang('arena_points') . '</th></tr></thead><tbody>';
                            $m = 1;
                            foreach ($data2show as $one_char) {
                                if (empty($one_char['name'])) {
                                    continue;
                                }
                                echo '<tr><td>' . $m++ . '<th scope="row">' . $antiXss->xss_clean($one_char['name']) . '</th><td><img src=\'' . get_config("baseurl") . '/template/' . $antiXss->xss_clean(get_config("template")) . '/images/race/' . $antiXss->xss_clean($one_char["race"]) . '-' . $antiXss->xss_clean($one_char["gender"]) . '.gif\'></td><td><img src=\'' . get_config("baseurl") . '/template/' . $antiXss->xss_clean(get_config("template")) . '/images/class/' . $antiXss->xss_clean($one_char["class"]) . '.gif\'></td><td>' . $antiXss->xss_clean($one_char['level']) . '</td><td>' . $antiXss->xss_clean($one_char['arenaPoints']) . '</td></tr>';
                            }
                            echo '</table>';
                        }
                        echo "</div><div class=\"modal-footer\"><button type=\"button\" class=\"btn btn-danger\" data-dismiss=\"modal\">" . lang('close') . "</button></div></div></div></div>";
                        $i++;

                        $data2show = status::get_top_arenateams($onerealm['realmid']);
                        echo "<button type=\"button\" class=\"btn btn-info\" data-toggle=\"modal\"  data-aos=\"fade-up\" data-aos-delay=\"100\"data-target=\"#modal-id$i\">" . lang('arena_teams') . "</button><div class=\"modal\" id=\"modal-id$i\"><div class=\"modal-dialog modal-lg\"><div class=\"modal-content\">
                                            <div class=\"modal-header\"><h4 class=\"modal-title\">" . lang('top_players') . " - " . lang('arena_teams') . "</h4><button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button></div><div class=\"modal-body\">";
                        if (!is_array($data2show)) {
                            echo "<span style='color: #0d99e5;'>" . lang('online_players_msg2') . "</span>";
                        } else {
                            echo '<table class="table table-striped"><thead><tr><th scope="col">' . lang('rank') . '</th><th scope="col">' . lang('name') . '</th><th scope="col">' . lang('rating') . '</th><th scope="col">' . lang('captain_name') . '</th></tr></thead><tbody>';
                            $m = 1;
                            foreach ($data2show as $one_char) {
                                $character_data = status::get_character_by_guid($onerealm['realmid'], $one_char['captainGuid']);

                                if (empty($character_data['name'])) {
                                    continue;
                                }

                                echo '<tr><td>' . $m++ . '<th scope="row">' . $antiXss->xss_clean($one_char['name']) . '</th><td>' . $antiXss->xss_clean($one_char['rating']) . '</td><td>' . (!empty($character_data["name"]) ? $antiXss->xss_clean($character_data['name']) : '-') . '</td></tr>';
                            }
                            echo '</table>';
                        }
                        echo "</div><div class=\"modal-footer\"><button type=\"button\" class=\"btn btn-danger\" data-dismiss=\"modal\">" . lang('close') . "</button></div></div></div></div>";
                        $i++;
                        echo "<hr>";
                    }
                } ?>
            </div>
        </div>
    </div>
</div>
<?php if (!get_config('disable_online_players')) { ?>
<div class="media-section spad">
    <div class="overlay"></div>
    <div class="container">
        <div class="section-title">
            <h2><?php elang('online_players'); ?>:</h2>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center" style="margin-top: -90px;">
                    <?php foreach (get_config('realmlists') as $onerealm_key => $onerealm) {
                        echo "<p><span style='color: #005cbf;font-weight: bold;'>{$onerealm['realmname']}</span> <span style='font-size: 12px;'>(" . lang('online_players_msg1') . " " . user::get_online_players_count($onerealm['realmid']) . ")</span></p><hr>";
                        $online_chars = user::get_online_players($onerealm['realmid']);
                        if (!is_array($online_chars)) {
                            echo "<span style='color: #0d99e5;'>" . lang('online_players_msg2') . "</span>";
                        } else {
                            echo '<table class="table table-dark"><thead><tr><th scope="col">' . lang('name') . '</th><th scope="col">' . lang('race') . '</th> <th scope="col">' . lang('class') . '</th><th scope="col">' . lang('level') . '</th></tr></thead><tbody>';
                            foreach ($online_chars as $one_char) {
                                echo '<tr><th scope="row">' . $antiXss->xss_clean($one_char['name']) . '</th><td><img src=\'' . get_config("baseurl") . '/template/' . $antiXss->xss_clean(get_config("template")) . '/images/race/' . $antiXss->xss_clean($one_char["race"]) . '-' . $antiXss->xss_clean($one_char["gender"]) . '.gif\'></td><td><img src=\'' . get_config("baseurl") . '/template/' . $antiXss->xss_clean(get_config("template")) . '/images/class/' . $antiXss->xss_clean($one_char["class"]) . '.gif\'></td><td>' . $antiXss->xss_clean($one_char['level']) . '</td></tr>';
                            }
                            echo '</table>';
                        }
                        echo "<hr>";
                    } ?>
            </div>
        </div>
    </div>
</div>

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
                                                            <option value="english" <?php if($lang == 'english'){ echo 'selected';} else {} ?>><?php elang('lang_en'); ?></option>
                                                            <option value="persian" <?php if($lang == 'persian'){ echo 'selected';} else {}?>><?php elang('lang_pe'); ?></option>
                                                            <option value="italian" <?php if($lang == 'italian'){ echo 'selected';} else {}?>><?php elang('lang_it'); ?></option>
                                                            <option value="chinese-simplified" <?php if($lang == 'chinese-simplified'){ echo 'selected';} else {}?>><?php elang('lang_ch_si'); ?></option>
                                                            <option value="chinese-traditional" <?php if($lang == 'chinese-traditional'){ echo 'selected';} else {}?>><?php elang('lang_ch_tr'); ?></option>
                                                            <option value="swedish" <?php if($lang == 'swedish'){ echo 'selected';} else {}?>><?php elang('lang_sw'); ?></option>
                                                            <option value="french" <?php if($lang == 'french'){ echo 'selected';} else {}?>><?php elang('lang_fr'); ?></option>
                                                            <option value="german" <?php if($lang == 'german'){ echo 'selected';} else {}?>><?php elang('lang_de'); ?></option>
                                                            <option value="spanish" <?php if($lang == 'spanish'){ echo 'selected';} else {}?>><?php elang('lang_sp'); ?></option>
                                                            <option value="korean" <?php if($lang == 'korean'){ echo 'selected';} else {}?>><?php elang('lang_ko'); ?></option>
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
<?php } ?>
<?php require_once 'footer.php'; ?>
