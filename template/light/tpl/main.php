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
        <form action="" method="post">
            <img src="<?php echo $antiXss->xss_clean(get_config("baseurl")); ?>/template/<?php echo $antiXss->xss_clean(get_config("template")); ?>/images/wow-logo.png">
            <div class="col-xs-12" style="margin-top: 20px;">
                <nav>
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-register-tab" data-toggle="tab" href="#nav-register" role="tab" aria-controls="nav-register" aria-selected="true">Register</a>
                        <a class="nav-item nav-link" id="nav-serverstatus-tab" data-toggle="tab" href="#nav-serverstatus" role="tab" aria-controls="nav-serverstatus" aria-selected="false">Server status</a>
                        <a class="nav-item nav-link" id="nav-topplayers-tab" data-toggle="tab" href="#nav-topplayers" role="tab" aria-controls="nav-topplayers" aria-selected="false">Top Players</a>
                        <a class="nav-item nav-link" id="nav-howtoconnect-tab" data-toggle="tab" href="#nav-howtoconnect" role="tab" aria-controls="nav-howtoconnect" aria-selected="false">How to connect</a>
                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Contact us</a>
                    </div>
                </nav>
                <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-register" role="tabpanel" aria-labelledby="nav-register-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <div style="padding: 10px;">
                                    <?php error_msg(); success_msg(); //Display message. ?>
                                    <div class="input-group">
                                        <span class="input-group" >Username</span>
                                        <input type="text" class="form-control" placeholder="Username" name="username">
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group" >Password</span>
                                        <input type="password" class="form-control" placeholder="Password" name="password">
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group" >Re-Password</span>
                                        <input type="password" class="form-control" placeholder="Re-Password" name="repassword">
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group" >Email</span>
                                        <input type="email" class="form-control" placeholder="Email" name="email">
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group" >Captcha</span>
                                        <input type="text" class="form-control" placeholder="Captcha" name="captcha">
                                    </div>
                                    <p style="text-align: center;margin-top: 10px;">
                                        <img src="<?php echo user::$captcha->inline(); ?>" style="border-radius: 5px;"/>
                                    </p>
                                    <div class="text-center" style="margin-top: 10px;"><input type="submit" class="btn btn-danger" value="Login"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div style="padding: 10px;text-align: left">
                                    <?php require_once base_path.'template/'.get_config('template').'/tpl/rules.php'; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-serverstatus" role="tabpanel" aria-labelledby="nav-serverstatus-tab">
                        <?php
                            foreach(get_config('realmlists') as $onerealm_key => $onerealm)
                            {
                                echo "<p><span style='color: #005cbf;font-weight: bold;'>{$onerealm['realmname']}</span> <span style='font-size: 12px;'>(Limited to show 49 player)</span></p><hr>";
                                $online_chars = user::get_online_players($onerealm['realmid']);
                                if(!is_array($online_chars))
                                {
                                   echo "<span style='color: #0d99e5;'>No have Online player.</span>";
                                }else{
                                    echo '<table class="table table-striped"><thead><tr><th scope="col">Name</th><th scope="col">Race</th> <th scope="col">Class</th><th scope="col">Level</th></tr></thead><tbody>';
                                    foreach($online_chars as $one_char)
                                    {
                                        echo '<tr><th scope="row">'.$antiXss->xss_clean($one_char['name']).'</th><td><img src=\''.get_config("baseurl").'/template/'.$antiXss->xss_clean(get_config("template")).'/images/race/'.$antiXss->xss_clean($one_char["race"]).'-'.$antiXss->xss_clean($one_char["gender"]).'.gif\'></td><td><img src=\''.get_config("baseurl").'/template/'.$antiXss->xss_clean(get_config("template")).'/images/class/'.$antiXss->xss_clean($one_char["class"]).'.gif\'></td><td>'.$antiXss->xss_clean($one_char['level']).'</td></tr>';
                                    }
                                    echo '</table>';
                                }
                                echo "<hr>";
                            }
                        ?>
                    </div>
                    <div class="tab-pane fade" id="nav-topplayers" role="tabpanel" aria-labelledby="nav-topplayers-tab">
                        <?php
                            foreach(get_config('realmlists') as $onerealm_key => $onerealm)
                            {
                                echo "<h1 style='color: #005cbf;font-weight: bold;'>{$onerealm['realmname']}</h1><hr>";

                                $data2show = status::get_top_playtime($onerealm['realmid']);
                                echo "<h4>TOP PLAYERS - Play Time:</h4>";
                                if(!is_array($data2show))
                                {
                                    echo "<span style='color: #0d99e5;'>Don't have anything for display.</span>";
                                }else{
                                    echo '<table class="table table-striped"><thead><tr><th scope="col">Name</th><th scope="col">Race</th> <th scope="col">Class</th><th scope="col">Level</th><th scope="col">Play Time</th></tr></thead><tbody>';
                                    foreach($data2show as $one_char)
                                    {
                                        echo '<tr><th scope="row">'.$antiXss->xss_clean($one_char['name']).'</th><td><img src=\''.get_config("baseurl").'/template/'.$antiXss->xss_clean(get_config("template")).'/images/race/'.$antiXss->xss_clean($one_char["race"]).'-'.$antiXss->xss_clean($one_char["gender"]).'.gif\'></td><td><img src=\''.get_config("baseurl").'/template/'.$antiXss->xss_clean(get_config("template")).'/images/class/'.$antiXss->xss_clean($one_char["class"]).'.gif\'></td><td>'.$antiXss->xss_clean($one_char['level']).'</td><td>'.$antiXss->xss_clean(get_human_time_from_sec($one_char['totaltime'])).'</td></tr>';
                                    }
                                    echo '</table>';
                                }

                                $data2show = status::get_top_achievements($onerealm['realmid']);
                                echo "<h4>TOP PLAYERS - Achievements:</h4>";
                                if(!is_array($data2show))
                                {
                                    echo "<span style='color: #0d99e5;'>Don't have anything for display.</span>";
                                }else{
                                    echo '<table class="table table-striped"><thead><tr><th scope="col">Name</th><th scope="col">Race</th> <th scope="col">Class</th><th scope="col">Level</th><th scope="col">Achievements</th></tr></thead><tbody>';
                                    foreach($data2show as $one_char)
                                    {
                                        $character_data = status::get_character_by_guid($onerealm['realmid'],$one_char['guid']);
                                        if(empty($character_data['name']))
                                        {
                                            continue;
                                        }
                                        echo '<tr><th scope="row">'.$antiXss->xss_clean($character_data['name']).'</th><td><img src=\''.get_config("baseurl").'/template/'.$antiXss->xss_clean(get_config("template")).'/images/race/'.$antiXss->xss_clean($character_data["race"]).'-'.$antiXss->xss_clean($character_data["gender"]).'.gif\'></td><td><img src=\''.get_config("baseurl").'/template/'.$antiXss->xss_clean(get_config("template")).'/images/class/'.$antiXss->xss_clean($character_data["class"]).'.gif\'></td><td>'.$antiXss->xss_clean($character_data['level']).'</td><td>'.$antiXss->xss_clean($one_char['total']).'</td></tr>';
                                    }
                                    echo '</table>';
                                }

                                $data2show = status::get_top_killers($onerealm['realmid']);
                                echo "<h4>TOP PLAYERS - Kills:</h4>";
                                if(!is_array($data2show))
                                {
                                    echo "<span style='color: #0d99e5;'>Don't have anything for display.</span>";
                                }else{
                                    echo '<table class="table table-striped"><thead><tr><th scope="col">Name</th><th scope="col">Race</th> <th scope="col">Class</th><th scope="col">Level</th><th scope="col">Kills</th></tr></thead><tbody>';
                                    foreach($data2show as $one_char)
                                    {
                                        echo '<tr><th scope="row">'.$antiXss->xss_clean($one_char['name']).'</th><td><img src=\''.get_config("baseurl").'/template/'.$antiXss->xss_clean(get_config("template")).'/images/race/'.$antiXss->xss_clean($one_char["race"]).'-'.$antiXss->xss_clean($one_char["gender"]).'.gif\'></td><td><img src=\''.get_config("baseurl").'/template/'.$antiXss->xss_clean(get_config("template")).'/images/class/'.$antiXss->xss_clean($one_char["class"]).'.gif\'></td><td>'.$antiXss->xss_clean($one_char['level']).'</td><td>'.$antiXss->xss_clean($one_char['totalKills']).'</td></tr>';
                                    }
                                    echo '</table>';
                                }

                                $data2show = status::get_top_honorpoints($onerealm['realmid']);
                                echo "<h4>TOP PLAYERS - Honor Point:</h4>";
                                if(!is_array($data2show))
                                {
                                    echo "<span style='color: #0d99e5;'>Don't have anything for display.</span>";
                                }else{
                                    echo '<table class="table table-striped"><thead><tr><th scope="col">Name</th><th scope="col">Race</th> <th scope="col">Class</th><th scope="col">Level</th><th scope="col">Honor Points</th></tr></thead><tbody>';
                                    foreach($data2show as $one_char)
                                    {
                                        echo '<tr><th scope="row">'.$antiXss->xss_clean($one_char['name']).'</th><td><img src=\''.get_config("baseurl").'/template/'.$antiXss->xss_clean(get_config("template")).'/images/race/'.$antiXss->xss_clean($one_char["race"]).'-'.$antiXss->xss_clean($one_char["gender"]).'.gif\'></td><td><img src=\''.get_config("baseurl").'/template/'.$antiXss->xss_clean(get_config("template")).'/images/class/'.$antiXss->xss_clean($one_char["class"]).'.gif\'></td><td>'.$antiXss->xss_clean($one_char['level']).'</td><td>'.$antiXss->xss_clean($one_char['totalHonorPoints']).'</td></tr>';
                                    }
                                    echo '</table>';
                                }

                                $data2show = status::get_top_arenapoints($onerealm['realmid']);
                                echo "<h4>TOP PLAYERS - Arena Point:</h4>";
                                if(!is_array($data2show))
                                {
                                    echo "<span style='color: #0d99e5;'>Don't have anything for display.</span>";
                                }else{
                                    echo '<table class="table table-striped"><thead><tr><th scope="col">Name</th><th scope="col">Race</th> <th scope="col">Class</th><th scope="col">Level</th><th scope="col">Arena Points</th></tr></thead><tbody>';
                                    foreach($data2show as $one_char)
                                    {
                                        echo '<tr><th scope="row">'.$antiXss->xss_clean($one_char['name']).'</th><td><img src=\''.get_config("baseurl").'/template/'.$antiXss->xss_clean(get_config("template")).'/images/race/'.$antiXss->xss_clean($one_char["race"]).'-'.$antiXss->xss_clean($one_char["gender"]).'.gif\'></td><td><img src=\''.get_config("baseurl").'/template/'.$antiXss->xss_clean(get_config("template")).'/images/class/'.$antiXss->xss_clean($one_char["class"]).'.gif\'></td><td>'.$antiXss->xss_clean($one_char['level']).'</td><td>'.$antiXss->xss_clean($one_char['arenaPoints']).'</td></tr>';
                                    }
                                    echo '</table>';
                                }

                                $data2show = status::get_top_arenateams($onerealm['realmid']);
                                echo "<h4>TOP PLAYERS - Arena Team:</h4>";
                                if(!is_array($data2show))
                                {
                                    echo "<span style='color: #0d99e5;'>Don't have anything for display.</span>";
                                }else{
                                    echo '<table class="table table-striped"><thead><tr><th scope="col">Name</th><th scope="col">Rating</th><th scope="col">Captain Name</th></tr></thead><tbody>';
                                    foreach($data2show as $one_char)
                                    {
                                        $character_data = status::get_character_by_guid($onerealm['realmid'],$one_char['captainGuid']);
                                        echo '<tr><th scope="row">'.$antiXss->xss_clean($one_char['name']).'</th><td>'.$antiXss->xss_clean($one_char['rating']).'</td><td>'.(!empty($character_data["name"]) ? $antiXss->xss_clean($character_data['name']) : '-').'</td></tr>';
                                    }
                                    echo '</table>';
                                }

                                $data2show = status::get_top_guild_by_member($onerealm['realmid']);
                                echo "<h4>TOP PLAYERS - Guilds by member count:</h4>";
                                if(!is_array($data2show))
                                {
                                    echo "<span style='color: #0d99e5;'>Don't have anything for display.</span>";
                                }else{
                                    echo '<table class="table table-striped"><thead><tr><th scope="col">Name</th><th scope="col">Guild Leader</th></tr></thead><tbody>';
                                    foreach($data2show as $one_char)
                                    {
                                        $character_data = status::get_character_by_guid($onerealm['realmid'],$one_char['leaderguid']);
                                        echo '<tr><th scope="row">'.$antiXss->xss_clean($one_char['name']).'</th><td>'.(!empty($character_data["name"]) ? $antiXss->xss_clean($character_data['name']) : '-').'</td></tr>';
                                    }
                                    echo '</table>';
                                }

                                echo "<hr>";
                            }
                        ?>
                    </div>
                    <div class="tab-pane fade" id="nav-howtoconnect" role="tabpanel" aria-labelledby="nav-howtoconnect-tab">
                        <?php require_once base_path.'template/'.get_config('template').'/tpl/howtoconnect.php'; ?>
                    </div>
                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <?php require_once base_path.'template/'.get_config('template').'/tpl/contactus.php'; ?>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php require_once 'footer.php'; ?>
