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
            <div class="col-md-8" style="margin-top: 20px;">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                    </ol>
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <img src="<?php echo $antiXss->xss_clean(get_config("baseurl")); ?>/template/<?php echo $antiXss->xss_clean(get_config("template")); ?>/images/slide1.jpg" alt="Los Angeles" style="width:100%;">
                        </div>
                        <div class="item">
                            <img src="<?php echo $antiXss->xss_clean(get_config("baseurl")); ?>/template/<?php echo $antiXss->xss_clean(get_config("template")); ?>/images/slide1.jpg" alt="Chicago" style="width:100%;">
                        </div>
                        <div class="item">
                            <img src="<?php echo $antiXss->xss_clean(get_config("baseurl")); ?>/template/<?php echo $antiXss->xss_clean(get_config("template")); ?>/images/slide1.jpg" alt="New york" style="width:100%;">
                        </div>
                    </div>
                </div>
                <div class="box1" style="margin-top: 10px;">
                    <ul class="nav nav-tabs" style="display: none;">
                        <li><a data-toggle="tab" href="#pills-register" id="register">Register</a></li>
                        <li><a data-toggle="tab" href="#pills-serverstatus" id="serverstatus">Server Status</a></li>
                        <li><a data-toggle="tab" href="#pills-contact" id="contact">Contact us</a></li>
                    </ul>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade in <?php echo ((empty($error_error) && empty($success_msg)) ? 'active' : ''); ?>" id="pills-main">
                            Welcome to our server !
                            <hr style="border-color: #00CCFF;">
                            <p style="text-align: justify">
                                This is a sample text, This is a sample text, This is a sample text, This is a sample text, This is a sample text, This is a sample text, This is a sample text, This is a sample text, This is a sample text, This is a sample text, This is a sample text, This is a sample text, This is a sample text, This is a sample text, This is a sample text, This is a sample text, This is a sample text, This is a sample text, This is a sample text, This is a sample text, This is a sample text, This is a sample text, This is a sample text, This is a sample text, This is a sample text, This is a sample text, This is a sample text, This is a sample text, This is a sample text, This is a sample text, This is a sample text, This is a sample text, This is a sample text, This is a sample text, This is a sample text, This is a sample text, This is a sample text, This is a sample text, This is a sample text.
							</p>
							<p>Edit : template/<?php echo $antiXss->xss_clean(get_config("template")); ?>/tpl/main.php</p>
                        </div>
                        <div class="tab-pane fade in <?php echo (!(empty($error_error) && empty($success_msg))  ? 'active' : ''); ?>" id="pills-register">
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
                                        <div class="text-center" style="margin-top: 10px;"><input type="submit" class="btn btn-info" value="Login"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div style="padding: 10px;text-align: left">
                                        <?php require_once base_path.'template/'.$antiXss->xss_clean(get_config("template")).'/tpl/rules.php'; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade in" id="pills-serverstatus">
                            <?php
                            foreach(get_config('realmlists') as $onerealm_key => $onerealm)
                            {
                                echo "<p><span style='color: #005cbf;font-weight: bold;'>{$onerealm['realmname']}</span> <span style='font-size: 12px;'>(Limited to show 49 player)</span></p><hr>";
                                $online_chars = user::get_online_players($onerealm['realmid']);
                                if(!is_array($online_chars))
                                {
                                    echo "<span style='color: #0d99e5;'>No have Online player.</span>";
                                }else{
                                    echo '<table class="table table-dark"><thead><tr><th scope="col">Name</th><th scope="col">Race</th> <th scope="col">Class</th><th scope="col">Level</th></tr></thead><tbody>';
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
                        <div class="tab-pane fade in" id="pills-contact">
                            <?php require_once base_path.'template/'.$antiXss->xss_clean(get_config("template")).'/tpl/contactus.php'; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 sidebar">
                <div class="box1">
                    SERVER INFO
                    <hr style="border-color: #00CCFF;">
                    <p>Realmlist: <span style="color: yellow;"><?php echo get_config('realmlist'); ?></span></p>
                    <?php echo (!empty(get_config("game_version")) ? '<p>Version : <span style="color: yellow;">'.get_config("game_version").'</span></p>' : ''); ?>
                    <?php echo (!empty(get_config("patch_location")) ? '<p>Server Patch : <a href="'.get_config("patch_location").'" style="color: yellow;">Download</a></p>' : ''); ?>
                </div>
                <div class="box1">
                    Discord
                    <hr style="border-color: #00CCFF;">
                    <iframe src="https://discordapp.com/widget?id=376650959532589057&theme=dark" width="330" height="600" allowtransparency="true" frameborder="0"></iframe>
                </div>
            </div>
        </form>
    </div>
</div>
<?php require_once 'footer.php'; ?>
