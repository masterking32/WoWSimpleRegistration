<?php
/**
 * @author Amin Mahmoudi (MasterkinG)
 * @copyright	Copyright (c) 2019 - 2022, MsaterkinG32 Team, Inc. (https://masterking32.com)
 * @link	https://masterking32.com
 * @Description : It's not masterking32 framework !
 **/
use Gregwar\Captcha\CaptchaBuilder;
use Medoo\Medoo;

class user{
    public static $captcha;

    public static function register()
    {
        global $antiXss;
        if(!empty($_POST["password"]) && !empty($_POST["username"]) && !empty($_POST["repassword"]) && !empty($_POST["email"]) && !empty($_POST["captcha"]) && !empty($_SESSION['captcha']))
        {
            if(strtolower($_SESSION['captcha']) == strtolower($_POST["captcha"]))
            {
                unset($_SESSION['captcha']);
                if(preg_match("/^[0-9A-Z-_]+$/",strtoupper($_POST["username"])))
                {
                    if(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))
                    {
                        if($_POST["password"] == $_POST["repassword"])
                        {
                            if(strlen($_POST["password"]) >= 4 && strlen($_POST["password"]) <= 16)
                            {
                                if(strlen($_POST["username"]) >= 2 && strlen($_POST["username"]) <= 16)
                                {
                                    if(self::check_email_exists(strtoupper($_POST["email"])) && self::check_username_exists(strtoupper($_POST["username"])))
                                    {
                                        $hashed_pass = strtoupper(sha1(strtoupper($_POST["username"].":".$_POST["password"])));
                                        database::$auth->insert("account", [
                                            "username" => $antiXss->xss_clean(strtoupper($_POST["username"])),
                                            "sha_pass_hash" => $antiXss->xss_clean($hashed_pass),
                                            "email" => $antiXss->xss_clean($_POST["email"]),
                                            "expansion" => $antiXss->xss_clean(get_config('expansion'))
                                        ]);
                                        success_msg("Your account has been created.");
                                    }else{
                                        error_msg("Username or Email is exists.");
                                    }
                                }else{
                                    error_msg("Username length is not valid.");
                                }
                            }else{
                                error_msg("Password length is not valid.");
                            }
                        }else{
                            error_msg("Passwords is not equal.");
                        }
                    }else{
                        error_msg("Use valid email.");
                    }
                }else{
                    error_msg("Use valid characters for username.");
                }
            }else{
                error_msg("Captcha is not valid.");
            }
        }
        unset($_SESSION['captcha']);
        self::$captcha = new CaptchaBuilder;
        self::$captcha->build();
        $_SESSION['captcha'] = self::$captcha->getPhrase();
    }
    public static function check_email_exists($email)
    {
        if(!empty($email))
        {
            $datas = database::$auth->select("account", ["id"], ["email" => Medoo::raw('UPPER(:email)', [':email' => $email])]);
            if(empty($datas[0]))
            {
                return true;
            }
        }
        return false;
    }
    public static function check_username_exists($username)
    {
        if(!empty($username))
        {
            $datas = database::$auth->select("account", ["id"], ["username" => Medoo::raw('UPPER(:username)', [':username' => $username])]);
            if(empty($datas[0]))
            {
                return true;
            }
        }
        return false;
    }
    public static function get_online_players($realmID)
    {
        $datas = database::$chars[$realmID]->select("characters", array("name","race","class","gender","level"),['LIMIT' => 49,"ORDER" => ["level" => "DESC"],"online[=]" => 1]);
        if(!empty($datas[0]["name"]))
        {
            return $datas;
        }
        return false;
    }
}