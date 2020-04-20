<?php
/**
 * Created by Amin.MasterkinG
 * Website : MasterkinG32.CoM
 * Email : lichwow_masterking@yahoo.com
 * Date: 11/26/2018 - 8:36 PM
 */
require_once 'header.php'; ?>
<div class="row">
    <div class="main-box">
        <img src="<?php echo $antiXss->xss_clean(get_config("baseurl")); ?>/template/<?php echo $antiXss->xss_clean(get_config("template")); ?>/images/wow-logo.png">
        <div class="col-xs-12" style="margin-top: 20px;">
            <nav>
                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-register-tab" data-toggle="tab" href="#nav-register"
                       role="tab" aria-controls="nav-register" aria-selected="true">Register</a>
                    <?php if (!get_config('disable_online_players')) { ?>
                        <a class="nav-item nav-link" id="nav-serverstatus-tab" data-toggle="tab"
                           href="#nav-serverstatus" role="tab" aria-controls="nav-serverstatus" aria-selected="false">Server
                            status</a>
                    <?php }
                    if (!get_config('disable_top_players')) { ?>
                        <a class="nav-item nav-link" id="nav-topplayers-tab" data-toggle="tab" href="#nav-topplayers"
                           role="tab" aria-controls="nav-topplayers" aria-selected="false">Top Players</a>
                    <?php } ?>
                    <a class="nav-item nav-link" id="nav-howtoconnect-tab" data-toggle="tab"
                       href="#nav-howtoconnect" role="tab" aria-controls="nav-howtoconnect" aria-selected="false">How
                        to connect</a>
                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact"
                       role="tab" aria-controls="nav-contact" aria-selected="false">Contact us</a>
                </div>
            </nav>
            <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-register" role="tabpanel"
                     aria-labelledby="nav-register-tab">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="" method="post">
                                <div style="padding: 10px;">
                                    <?php error_msg();
                                    success_msg(); //Display message. ?>
                                    <div class="input-group">
                                        <span class="input-group">Email</span>
                                        <input type="email" class="form-control" placeholder="Email" name="email">
                                    </div>
                                    <?php if (!get_config('battlenet_support')) { ?>
                                        <div class="input-group">
                                            <span class="input-group">Username</span>
                                            <input type="text" class="form-control" placeholder="Username"
                                                   name="username">
                                        </div>
                                    <?php } ?>
                                    <div class="input-group">
                                        <span class="input-group">Password</span>
                                        <input type="password" class="form-control" placeholder="Password"
                                               name="password">
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group">Re-Password</span>
                                        <input type="password" class="form-control" placeholder="Re-Password"
                                               name="repassword">
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group">Captcha</span>
                                        <input type="text" class="form-control" placeholder="Captcha" name="captcha">
                                    </div>
                                    <p style="text-align: center;margin-top: 10px;">
                                        <img src="<?php echo user::$captcha->inline(); ?>" style="border-radius: 5px;"/>
                                    </p>
                                    <input name="submit" type="hidden" value="register">
                                    <div class="text-center" style="margin-top: 10px;"><input type="submit"
                                                                                              class="btn btn-danger"
                                                                                              value="Register"></div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <div style="padding: 10px;text-align: left">
                                <?php require_once base_path . 'template/' . get_config('template') . '/tpl/rules.php'; ?>
                                <hr>
                                <div class="text-center">
                                    <?php if (empty(get_config('disable_changepassword'))) { ?>
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#changepassword-modal">
                                            Change Password
                                        </button>
                                    <?php } ?>
                                    <button type="button" class="btn btn-info" data-toggle="modal"
                                            data-target="#restorepassword-modal">
                                        Restore Password
                                    </button>
                                </div>
                                <?php if (get_config('vote_system')) { ?>
                                    <div class="text-center" style="margin-top: 5px;">
                                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                                data-target="#vote-modal">
                                            Vote for us
                                        </button>
                                    </div>
                                    <div class="modal" id="vote-modal">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Vote</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="<?php echo $antiXss->xss_clean(get_config("baseurl")); ?>/index.php#register"
                                                          method="post" target="_blank">
                                                        <?php if (get_config('battlenet_support')) { ?>
                                                            <div class="input-group">
                                                                <span class="input-group">Email</span>
                                                                <input type="email" class="form-control"
                                                                       placeholder="Email"
                                                                       name="account">
                                                            </div>
                                                        <?php } else { ?>
                                                            <div class="input-group">
                                                                <span class="input-group">Username</span>
                                                                <input type="text" class="form-control"
                                                                       placeholder="Username"
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
                                                        Close
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
                                                <h4 class="modal-title">Restore Password</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="" method="post">
                                                    <?php if (get_config('battlenet_support')) { ?>
                                                        <div class="input-group">
                                                            <span class="input-group">Email</span>
                                                            <input type="email" class="form-control" placeholder="Email"
                                                                   name="email">
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="input-group">
                                                            <span class="input-group">Username</span>
                                                            <input type="text" class="form-control"
                                                                   placeholder="Username"
                                                                   name="username">
                                                        </div>
                                                    <?php } ?>
                                                    <div class="input-group">
                                                        <span class="input-group">Captcha</span>
                                                        <input type="text" class="form-control" placeholder="Captcha"
                                                               name="captcha">
                                                    </div>
                                                    <p style="text-align: center;margin-top: 10px;">
                                                        <img src="<?php echo user::$captcha->inline(); ?>"
                                                             style="border-radius: 5px;"/>
                                                    </p>
                                                    <input name="submit" type="hidden" value="restorepassword">
                                                    <div class="text-center" style="margin-top: 10px;"><input
                                                                type="submit"
                                                                class="btn btn-primary"
                                                                value="Restore Password"></div>

                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">
                                                    Close
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal" id="changepassword-modal">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Change Password</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="" method="post">
                                                    <?php if (get_config('battlenet_support')) { ?>
                                                        <div class="input-group">
                                                            <span class="input-group">Email</span>
                                                            <input type="email" class="form-control" placeholder="Email"
                                                                   name="email">
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="input-group">
                                                            <span class="input-group">Username</span>
                                                            <input type="text" class="form-control"
                                                                   placeholder="Username"
                                                                   name="username">
                                                        </div>
                                                    <?php } ?>
                                                    <div class="input-group">
                                                        <span class="input-group">Old Password</span>
                                                        <input type="password" class="form-control"
                                                               placeholder="Old Password"
                                                               name="old_password">
                                                    </div>
                                                    <div class="input-group">
                                                        <span class="input-group">Password</span>
                                                        <input type="password" class="form-control"
                                                               placeholder="Password"
                                                               name="password">
                                                    </div>
                                                    <div class="input-group">
                                                        <span class="input-group">Re-Password</span>
                                                        <input type="password" class="form-control"
                                                               placeholder="Re-Password"
                                                               name="repassword">
                                                    </div>
                                                    <div class="input-group">
                                                        <span class="input-group">Captcha</span>
                                                        <input type="text" class="form-control" placeholder="Captcha"
                                                               name="captcha">
                                                    </div>
                                                    <p style="text-align: center;margin-top: 10px;">
                                                        <img src="<?php echo user::$captcha->inline(); ?>"
                                                             style="border-radius: 5px;"/>
                                                    </p>
                                                    <input name="submit" type="hidden" value="changepass">
                                                    <div class="text-center" style="margin-top: 10px;"><input
                                                                type="submit"
                                                                class="btn btn-primary"
                                                                value="Change Password"></div>

                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">
                                                    Close
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if (!get_config('disable_online_players')) { ?>
                    <div class="tab-pane fade" id="nav-serverstatus" role="tabpanel"
                         aria-labelledby="nav-serverstatus-tab">
                        <?php
                        foreach (get_config('realmlists') as $onerealm_key => $onerealm) {
                            echo "<p><span style='color: #005cbf;font-weight: bold;'>{$onerealm['realmname']}</span> <span style='font-size: 12px;'>(Limited to show 49 player - Online players : " . user::get_online_players_count($onerealm['realmid']) . ")</span></p><hr>";
                            $online_chars = user::get_online_players($onerealm['realmid']);
                            if (!is_array($online_chars)) {
                                echo "<span style='color: #0d99e5;'>No have Online player.</span>";
                            } else {
                                echo '<table class="table table-striped"><thead><tr><th scope="col">Name</th><th scope="col">Race</th> <th scope="col">Class</th><th scope="col">Level</th></tr></thead><tbody>';
                                foreach ($online_chars as $one_char) {
                                    echo '<tr><th scope="row">' . $antiXss->xss_clean($one_char['name']) . '</th><td><img src=\'' . get_config("baseurl") . '/template/' . $antiXss->xss_clean(get_config("template")) . '/images/race/' . $antiXss->xss_clean($one_char["race"]) . '-' . $antiXss->xss_clean($one_char["gender"]) . '.gif\'></td><td><img src=\'' . get_config("baseurl") . '/template/' . $antiXss->xss_clean(get_config("template")) . '/images/class/' . $antiXss->xss_clean($one_char["class"]) . '.gif\'></td><td>' . $antiXss->xss_clean($one_char['level']) . '</td></tr>';
                                }
                                echo '</table>';
                            }
                            echo "<hr>";
                        }
                        ?>
                    </div>
                <?php }
                if (!get_config('disable_top_players')) { ?>
                    <div class="tab-pane fade" id="nav-topplayers" role="tabpanel" aria-labelledby="nav-topplayers-tab">
                        <?php
                        $i = 1;
                        foreach (get_config('realmlists') as $onerealm_key => $onerealm) {
                            echo "<h1 style='color: #005cbf;font-weight: bold;'>{$onerealm['realmname']}</h1><hr>";

                            $data2show = status::get_top_playtime($onerealm['realmid']);
                            echo "<button type=\"button\" class=\"btn btn-info\" data-toggle=\"modal\" data-target=\"#modal-id$i\">Play Time</button><div class=\"modal\" id=\"modal-id$i\"><div class=\"modal-dialog modal-lg\"><div class=\"modal-content\">
                                            <div class=\"modal-header\"><h4 class=\"modal-title\">TOP PLAYERS - Play Time</h4><button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button></div><div class=\"modal-body\">";

                            if (!is_array($data2show)) {
                                echo "<span style='color: #0d99e5;'>Don't have anything for display.</span>";
                            } else {
                                echo '<table class="table table-striped"><thead><tr><th scope="col">Rank</th><th scope="col">Name</th><th scope="col">Race</th> <th scope="col">Class</th><th scope="col">Level</th><th scope="col">Play Time</th></tr></thead><tbody>';
                                $m = 1;
                                foreach ($data2show as $one_char) {
                                    echo '<tr><td>' . $m++ . '<th scope="row">' . $antiXss->xss_clean($one_char['name']) . '</th><td><img src=\'' . get_config("baseurl") . '/template/' . $antiXss->xss_clean(get_config("template")) . '/images/race/' . $antiXss->xss_clean($one_char["race"]) . '-' . $antiXss->xss_clean($one_char["gender"]) . '.gif\'></td><td><img src=\'' . get_config("baseurl") . '/template/' . $antiXss->xss_clean(get_config("template")) . '/images/class/' . $antiXss->xss_clean($one_char["class"]) . '.gif\'></td><td>' . $antiXss->xss_clean($one_char['level']) . '</td><td>' . $antiXss->xss_clean(get_human_time_from_sec($one_char['totaltime'])) . '</td></tr>';
                                }
                                echo '</table>';
                            }
                            echo "</div><div class=\"modal-footer\"><button type=\"button\" class=\"btn btn-danger\" data-dismiss=\"modal\">Close</button></div></div></div></div>";
                            $i++;

//                            $data2show = status::get_top_achievements($onerealm['realmid']);
//                            echo "<button type=\"button\" class=\"btn btn-info\" data-toggle=\"modal\" data-target=\"#modal-id$i\">Play Achievements</button><div class=\"modal\" id=\"modal-id$i\"><div class=\"modal-dialog modal-lg\"><div class=\"modal-content\">
//                                            <div class=\"modal-header\"><h4 class=\"modal-title\">TOP PLAYERS - Achievements</h4><button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button></div><div class=\"modal-body\">";
//                            if (!is_array($data2show)) {
//                                echo "<span style='color: #0d99e5;'>Don't have anything for display.</span>";
//                            } else {
//                                echo '<table class="table table-striped"><thead><tr><th scope="col">Rank</th><th scope="col">Name</th><th scope="col">Race</th> <th scope="col">Class</th><th scope="col">Level</th><th scope="col">Achievements</th></tr></thead><tbody>';
//                                $m = 1;
//                                foreach ($data2show as $one_char) {
//                                    $character_data = status::get_character_by_guid($onerealm['realmid'], $one_char['guid']);
//                                    if (empty($character_data['name'])) {
//                                        continue;
//                                    }
//                                    echo '<tr><td>' . $m++ . '<th scope="row">' . $antiXss->xss_clean($character_data['name']) . '</th><td><img src=\'' . get_config("baseurl") . '/template/' . $antiXss->xss_clean(get_config("template")) . '/images/race/' . $antiXss->xss_clean($character_data["race"]) . '-' . $antiXss->xss_clean($character_data["gender"]) . '.gif\'></td><td><img src=\'' . get_config("baseurl") . '/template/' . $antiXss->xss_clean(get_config("template")) . '/images/class/' . $antiXss->xss_clean($character_data["class"]) . '.gif\'></td><td>' . $antiXss->xss_clean($character_data['level']) . '</td><td>' . $antiXss->xss_clean($one_char['total']) . '</td></tr>';
//                                }
//                                echo '</table>';
//                            }
//                            echo "</div><div class=\"modal-footer\"><button type=\"button\" class=\"btn btn-danger\" data-dismiss=\"modal\">Close</button></div></div></div></div>";
//                            $i++;

                            $data2show = status::get_top_killers($onerealm['realmid']);
                            echo "<button type=\"button\" class=\"btn btn-info\" data-toggle=\"modal\" data-target=\"#modal-id$i\">Killers</button><div class=\"modal\" id=\"modal-id$i\"><div class=\"modal-dialog modal-lg\"><div class=\"modal-content\">
                                            <div class=\"modal-header\"><h4 class=\"modal-title\">TOP PLAYERS - Kills</h4><button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button></div><div class=\"modal-body\">";
                            if (!is_array($data2show)) {
                                echo "<span style='color: #0d99e5;'>Don't have anything for display.</span>";
                            } else {
                                echo '<table class="table table-striped"><thead><tr><th scope="col">Rank</th><th scope="col">Name</th><th scope="col">Race</th> <th scope="col">Class</th><th scope="col">Level</th><th scope="col">Kills</th></tr></thead><tbody>';
                                $m = 1;
                                foreach ($data2show as $one_char) {
                                    echo '<tr><td>' . $m++ . '<th scope="row">' . $antiXss->xss_clean($one_char['name']) . '</th><td><img src=\'' . get_config("baseurl") . '/template/' . $antiXss->xss_clean(get_config("template")) . '/images/race/' . $antiXss->xss_clean($one_char["race"]) . '-' . $antiXss->xss_clean($one_char["gender"]) . '.gif\'></td><td><img src=\'' . get_config("baseurl") . '/template/' . $antiXss->xss_clean(get_config("template")) . '/images/class/' . $antiXss->xss_clean($one_char["class"]) . '.gif\'></td><td>' . $antiXss->xss_clean($one_char['level']) . '</td><td>' . $antiXss->xss_clean($one_char['totalKills']) . '</td></tr>';
                                }
                                echo '</table>';
                            }
                            echo "</div><div class=\"modal-footer\"><button type=\"button\" class=\"btn btn-danger\" data-dismiss=\"modal\">Close</button></div></div></div></div>";
                            $i++;

                            $data2show = status::get_top_honorpoints($onerealm['realmid']);
                            echo "<button type=\"button\" class=\"btn btn-info\" data-toggle=\"modal\" data-target=\"#modal-id$i\">Honor Point</button><div class=\"modal\" id=\"modal-id$i\"><div class=\"modal-dialog modal-lg\"><div class=\"modal-content\">
                                            <div class=\"modal-header\"><h4 class=\"modal-title\">TOP PLAYERS - Honor Point</h4><button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button></div><div class=\"modal-body\">";
                            if (!is_array($data2show)) {
                                echo "<span style='color: #0d99e5;'>Don't have anything for display.</span>";
                            } else {
                                echo '<table class="table table-striped"><thead><tr><th scope="col">Rank</th><th scope="col">Name</th><th scope="col">Race</th> <th scope="col">Class</th><th scope="col">Level</th>';

                                if (get_config('expansion') >= 6) {
                                    echo '<th scope="col">Honor Level</th>';
                                }

                                echo '<th scope="col">Honor Points</th></tr></thead><tbody>';
                                $m = 1;
                                foreach ($data2show as $one_char) {
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
                            echo "</div><div class=\"modal-footer\"><button type=\"button\" class=\"btn btn-danger\" data-dismiss=\"modal\">Close</button></div></div></div></div>";
                            $i++;

                            $data2show = status::get_top_arenapoints($onerealm['realmid']);
                            echo "<button type=\"button\" class=\"btn btn-info\" data-toggle=\"modal\" data-target=\"#modal-id$i\">Arena Point</button><div class=\"modal\" id=\"modal-id$i\"><div class=\"modal-dialog modal-lg\"><div class=\"modal-content\">
                                            <div class=\"modal-header\"><h4 class=\"modal-title\">TOP PLAYERS - Arena Point:</h4><button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button></div><div class=\"modal-body\">";
                            if (!is_array($data2show)) {
                                echo "<span style='color: #0d99e5;'>Don't have anything for display.</span>";
                            } else {
                                echo '<table class="table table-striped"><thead><tr><th scope="col">Rank</th><th scope="col">Name</th><th scope="col">Race</th> <th scope="col">Class</th><th scope="col">Level</th><th scope="col">Arena Points</th></tr></thead><tbody>';
                                $m = 1;
                                foreach ($data2show as $one_char) {
                                    echo '<tr><td>' . $m++ . '<th scope="row">' . $antiXss->xss_clean($one_char['name']) . '</th><td><img src=\'' . get_config("baseurl") . '/template/' . $antiXss->xss_clean(get_config("template")) . '/images/race/' . $antiXss->xss_clean($one_char["race"]) . '-' . $antiXss->xss_clean($one_char["gender"]) . '.gif\'></td><td><img src=\'' . get_config("baseurl") . '/template/' . $antiXss->xss_clean(get_config("template")) . '/images/class/' . $antiXss->xss_clean($one_char["class"]) . '.gif\'></td><td>' . $antiXss->xss_clean($one_char['level']) . '</td><td>' . $antiXss->xss_clean($one_char['arenaPoints']) . '</td></tr>';
                                }
                                echo '</table>';
                            }
                            echo "</div><div class=\"modal-footer\"><button type=\"button\" class=\"btn btn-danger\" data-dismiss=\"modal\">Close</button></div></div></div></div>";
                            $i++;

                            $data2show = status::get_top_arenateams($onerealm['realmid']);
                            echo "<button type=\"button\" class=\"btn btn-info\" data-toggle=\"modal\" data-target=\"#modal-id$i\">Arena Team</button><div class=\"modal\" id=\"modal-id$i\"><div class=\"modal-dialog modal-lg\"><div class=\"modal-content\">
                                            <div class=\"modal-header\"><h4 class=\"modal-title\">TOP PLAYERS - Arena Team</h4><button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button></div><div class=\"modal-body\">";
                            if (!is_array($data2show)) {
                                echo "<span style='color: #0d99e5;'>Don't have anything for display.</span>";
                            } else {
                                echo '<table class="table table-striped"><thead><tr><th scope="col">Rank</th><th scope="col">Name</th><th scope="col">Rating</th><th scope="col">Captain Name</th></tr></thead><tbody>';
                                $m = 1;
                                foreach ($data2show as $one_char) {
                                    $character_data = status::get_character_by_guid($onerealm['realmid'], $one_char['captainGuid']);
                                    echo '<tr><td>' . $m++ . '<th scope="row">' . $antiXss->xss_clean($one_char['name']) . '</th><td>' . $antiXss->xss_clean($one_char['rating']) . '</td><td>' . (!empty($character_data["name"]) ? $antiXss->xss_clean($character_data['name']) : '-') . '</td></tr>';
                                }
                                echo '</table>';
                            }
                            echo "</div><div class=\"modal-footer\"><button type=\"button\" class=\"btn btn-danger\" data-dismiss=\"modal\">Close</button></div></div></div></div>";
                            $i++;

//                            $data2show = status::get_top_guild_by_member($onerealm['realmid']);
//                            echo "<button type=\"button\" class=\"btn btn-info\" data-toggle=\"modal\" data-target=\"#modal-id$i\">Guilds by member count</button><div class=\"modal\" id=\"modal-id$i\"><div class=\"modal-dialog modal-lg\"><div class=\"modal-content\">
//                                            <div class=\"modal-header\"><h4 class=\"modal-title\">TOP PLAYERS - Guilds by member count</h4><button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button></div><div class=\"modal-body\">";
//                            if (!is_array($data2show)) {
//                                echo "<span style='color: #0d99e5;'>Don't have anything for display.</span>";
//                            } else {
//                                echo '<table class="table table-striped"><thead><tr><th scope="col">Rank</th><th scope="col">Name</th><th scope="col">Guild Leader</th></tr></thead><tbody>';
//                                $m = 1;
//                                foreach ($data2show as $one_char) {
//                                    $character_data = status::get_character_by_guid($onerealm['realmid'], $one_char['leaderguid']);
//                                    echo '<tr><td>' . $m++ . '<th scope="row">' . $antiXss->xss_clean($one_char['name']) . '</th><td>' . (!empty($character_data["name"]) ? $antiXss->xss_clean($character_data['name']) : '-') . '</td></tr>';
//                                }
//                                echo '</table>';
//                            }
//                            echo "</div><div class=\"modal-footer\"><button type=\"button\" class=\"btn btn-danger\" data-dismiss=\"modal\">Close</button></div></div></div></div>";
//                            $i++;

                            echo "<hr>";
                        }
                        ?>
                    </div>
                <?php } ?>
                <div class="tab-pane fade" id="nav-howtoconnect" role="tabpanel"
                     aria-labelledby="nav-howtoconnect-tab">
                    <?php require_once base_path . 'template/' . get_config('template') . '/tpl/howtoconnect.php'; ?>
                </div>
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                    <?php require_once base_path . 'template/' . get_config('template') . '/tpl/contactus.php'; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once 'footer.php'; ?>
