<?php
/**
 * Created by Amin.MasterkinG
 * Website : MasterkinG32.CoM
 * Email : lichwow_masterking@yahoo.com
 * Date: 04/02/2020 - 6:55 PM
 */

require_once 'header.php';
require_once 'server-info.php';
require_once 'how-connect.php';
require_once 'rules.php';
?>
<section id="register" class="services">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2><?php elang('register'); ?></h2>
            <p><?php elang('create_new_game_account'); ?></p>
        </div>
        <div class="row">
            <div class="col-lg-6 order-2 order-lg-1">
                <form action="<?php echo $antiXss->xss_clean(get_config("baseurl")); ?>/index.php#register"
                      method="post">
                    <div style="padding: 10px;" data-aos="fade-right" data-aos-delay="100">
                        <?php error_msg();
                        success_msg(); //Display message. ?>
                        <div class="input-group">
                            <span class="input-group"><?php elang('email'); ?></span>
                            <input type="email" class="form-control" required placeholder="<?php elang('email'); ?>"
                                   name="email">
                        </div>
                        <?php if (!get_config('battlenet_support')) { ?>
                            <div class="input-group">
                                <span class="input-group"><?php elang('username'); ?></span>
                                <input type="text" class="form-control" pattern="[A-Za-z]{2,16}" required placeholder="<?php elang('username'); ?>"
                                       name="username">
                            </div>
                        <?php } ?>
                        <div class="input-group">
                            <span class="input-group"><?php elang('password'); ?></span>
                            <input type="password" class="form-control" minlength="4" maxlength="16" required placeholder="<?php elang('password'); ?>"
                                   name="password">
                        </div>
                        <div class="input-group">
                            <span class="input-group"><?php elang('retype_password'); ?></span>
                            <input type="password" class="form-control" minlength="4" maxlength="16" required placeholder="<?php elang('retype_password'); ?>"
                                   name="repassword">
                        </div>
                        <?php echo GetCaptchaHTML(); ?>
                        <input name="submit" type="hidden" value="register">
                        <div class="text-center" style="margin-top: 10px;"><input type="submit"
                                                                                  class="btn btn-success"
                                                                                  value="<?php elang('register'); ?>">
                        </div>
                    </div>
                </form>
                <div class="text-center" data-aos="fade-up" data-aos-delay="100">
                    <?php if (empty(get_config('disable_changepassword'))) { ?>
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#changepassword-modal">
                            <?php elang('change_password'); ?>
                        </button>
                    <?php } ?>
                    <button type="button" class="btn btn-info" data-toggle="modal"
                            data-target="#restorepassword-modal">
                        <?php elang('restore_password'); ?>
                    </button>
                </div>
                <?php if (get_config('2fa_support')) { ?>
                    <div class="text-center" data-aos="fade-up" data-aos-delay="100" style="margin-top: 5px;">
                        <button type="button" class="btn btn-secondary" data-toggle="modal"
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
                    <div class="text-center" data-aos="fade-up" data-aos-delay="100" style="margin-top: 5px;">
                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                data-target="#vote-modal">
                            <?php elang('vote_for_us'); ?>
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
            <div class="image col-lg-6 order-1 order-lg-2"
                 style='background-image: url("<?php echo $antiXss->xss_clean(get_config("baseurl")); ?>/template/<?php echo $antiXss->xss_clean(get_config("template")); ?>/assets/img/demonhunter.png");background-size: auto 100%;background-position: center;background-repeat: no-repeat;'
                 data-aos="fade-left" data-aos-delay="100"></div>
        </div>
    </div>
</section>
<section id="server-status" class="contact section-bg">
    <div class="container">
        <div class="section-title" data-aos="fade-up" data-aos-delay="100">
            <h2><?php elang('server_status'); ?></h2>
            <p><?php elang('online_players'); ?>:</p>
        </div>
        <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-12 text-center" style="margin-top: -30px;">
                <?php if (!get_config('disable_online_players')) {
                    foreach (get_config('realmlists') as $onerealm_key => $onerealm) {
                        echo "<p><span style='color: #005cbf;font-weight: bold;'>{$onerealm['realmname']}</span> <span style='font-size: 12px;'>(" . lang('online_players_msg1') . " " . user::get_online_players_count($onerealm['realmid']) . ")</span></p><hr>";
                        $online_chars = user::get_online_players($onerealm['realmid']);
                        if (!is_array($online_chars)) {
                            echo "<span style='color: #0d99e5;'>" . lang('online_players_msg2') . "</span>";
                        } else {
                            echo '<table class="table table-striped"><thead><tr><th scope="col">' . lang('name') . '</th><th scope="col">' . lang('race') . '</th> <th scope="col">' . lang('class') . '</th><th scope="col">' . lang('level') . '</th></tr></thead><tbody>';
                            foreach ($online_chars as $one_char) {
                                echo '<tr><th scope="row">' . $antiXss->xss_clean($one_char['name']) . '</th><td><img src=\'' . get_config("baseurl") . '/template/' . $antiXss->xss_clean(get_config("template")) . '/images/race/' . $antiXss->xss_clean($one_char["race"]) . '-' . $antiXss->xss_clean($one_char["gender"]) . '.gif\'></td><td><img src=\'' . get_config("baseurl") . '/template/' . $antiXss->xss_clean(get_config("template")) . '/images/class/' . $antiXss->xss_clean($one_char["class"]) . '.gif\'></td><td>' . $antiXss->xss_clean($one_char['level']) . '</td></tr>';
                            }
                            echo '</table>';
                        }
                        echo "<hr>";
                    }
                } ?>
            </div>
        </div>
        <div class="section-title" data-aos="fade-up" data-aos-delay="100">
            <h2><?php elang('top_players'); ?></h2>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center" style="margin-top: -30px;">
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
                            echo '<table class="table table-striped table-responsive-sm"><thead><tr><th scope="col">' . lang('rank') . '</th><th scope="col">' . lang('name') . '</th><th scope="col">' . lang('race') . '</th> <th scope="col">' . lang('class') . '</th><th scope="col">' . lang('level') . '</th><th scope="col">' . lang('play_time') . '</th></tr></thead><tbody>';
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

                        $data2show = status::get_top_gold($onerealm['realmid']);
                        echo "<button type=\"button\" class=\"btn btn-info\" data-toggle=\"modal\"  data-aos=\"fade-up\" data-aos-delay=\"100\"data-target=\"#modal-id$i\">" . lang('gold') . "</button><div class=\"modal\" id=\"modal-id$i\"><div class=\"modal-dialog modal-lg\"><div class=\"modal-content\">
                                            <div class=\"modal-header\"><h4 class=\"modal-title\">" . lang('top_players') . " - " . lang('gold') . "</h4><button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button></div><div class=\"modal-body\">";
                        if (!is_array($data2show)) {
                            echo "<span style='color: #0d99e5;'>" . lang('online_players_msg2') . "</span>";
                        } else {
                            echo '<table class="table table-striped table-responsive-sm"><thead><tr><th scope="col">' . lang('rank') . '</th><th scope="col">' . lang('name') . '</th><th scope="col">' . lang('level') . '</th> <th scope="col">' . lang('play_time') . '</th><th scope="col">' . lang('gold') . '</th></tr></thead><tbody>';
                            $m = 1;
                            foreach ($data2show as $one_char) {
                                if (empty($one_char['name'])) {
                                    continue;
                                }
                                echo '<tr><td>' . $m++ . '<th scope="row">' . $antiXss->xss_clean($one_char['name']) . '</th><td>' . $antiXss->xss_clean($one_char["level"]) . '</td><td>' . $antiXss->xss_clean(get_human_time_from_sec($one_char['totaltime'])) . '</td><td>' . $antiXss->xss_clean(substr($one_char["money"], 0, -4)) . '<img src=\'' . get_config("baseurl") . '/template/' . $antiXss->xss_clean(get_config("template")) . '/images/goldcoin.png\'></td></tr>';
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
                            echo '<table class="table table-striped  table-responsive-sm"><thead><tr><th scope="col">' . lang('rank') . '</th><th scope="col">' . lang('name') . '</th><th scope="col">' . lang('race') . '</th> <th scope="col">' . lang('class') . '</th><th scope="col">' . lang('level') . '</th><th scope="col">' . lang('kills') . '</th></tr></thead><tbody>';
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
                            echo '<table class="table table-striped table-responsive-sm"><thead><tr><th scope="col">' . lang('rank') . '</th><th scope="col">' . lang('name') . '</th><th scope="col">' . lang('race') . '</th> <th scope="col">' . lang('class') . '</th><th scope="col">' . lang('level') . '</th>';

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
                            echo '<table class="table table-striped table-responsive-sm"><thead><tr><th scope="col">' . lang('rank') . '</th><th scope="col">' . lang('name') . '</th><th scope="col">' . lang('race') . '</th> <th scope="col">' . lang('class') . '</th><th scope="col">' . lang('level') . '</th><th scope="col">' . lang('arena_points') . '</th></tr></thead><tbody>';
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
                            echo '<table class="table table-striped table-responsive-sm"><thead><tr><th scope="col">' . lang('rank') . '</th><th scope="col">' . lang('name') . '</th><th scope="col">' . lang('rating') . '</th><th scope="col">' . lang('captain_name') . '</th></tr></thead><tbody>';
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
</section>
<?php
require_once 'faq.php';
require_once 'contact.php';
require_once 'footer.php';
?>
