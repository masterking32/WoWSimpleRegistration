<?php
/**
 * @author Amin Mahmoudi (MasterkinG)
 * @copyright    Copyright (c) 2019 - 2022, MsaterkinG32 Team, Inc. (https://masterking32.com)
 * @link    https://masterking32.com
 * @Description : It's not masterking32 framework !
 **/

use Gregwar\Captcha\CaptchaBuilder;
use Medoo\Medoo;

class user
{
    public static $captcha;

    public static function post_handler()
    {
        if (!empty($_GET['restore']) && !empty($_GET['key'])) {
            self::restorepassword_setnewpw($_GET['restore'], $_GET['key']);
        }

        if (!empty($_GET['enabletfa']) && !empty($_GET['account'])) {
            self::account_set_2fa($_GET['enabletfa'], $_GET['account']);
        }

        if (!empty($_POST['submit'])) {
            self::tfa_enable();
            if (get_config('battlenet_support')) {
                self::bnet_register();
                self::bnet_changepass();
            } else {
                self::normal_register();
                self::normal_changepass();
            }
            self::restorepassword();
            if (empty(get_config('captcha_type'))) {
                unset($_SESSION['captcha']);
                self::$captcha = new CaptchaBuilder;
                self::$captcha->build();
                $_SESSION['captcha'] = self::$captcha->getPhrase();
            }
        } else {
            if (empty(get_config('captcha_type'))) {
                unset($_SESSION['captcha']);
                self::$captcha = new CaptchaBuilder;
                self::$captcha->build();
                $_SESSION['captcha'] = self::$captcha->getPhrase();
            }
        }
    }

    /**
     * Battle.net registration
     * @return bool
     */
    public static function bnet_register()
    {
        global $antiXss;
        if ($_POST['submit'] != 'register' || empty($_POST['password']) || empty($_POST['repassword']) || empty($_POST['email'])) {
            return false;
        }

        if (!captcha_validation()) {
            return false;
        }

        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            error_msg('Use valid email.');
            return false;
        }

        if ($_POST['password'] != $_POST['repassword']) {
            error_msg('Passwords is not equal.');
            return false;
        }

        if (!(strlen($_POST['password']) >= 4 && strlen($_POST['password']) <= 16)) {
            error_msg('Password length is not valid.');
            return false;
        }

        if (!self::check_email_exists(strtoupper($_POST["email"]))) {
            error_msg('Username or Email is exists.');
            return false;
        }

        if (empty(get_config('srp6_support'))) {
            $bnet_hashed_pass = strtoupper(bin2hex(strrev(hex2bin(strtoupper(hash('sha256', strtoupper(hash('sha256', strtoupper($_POST['email'])) . ':' . strtoupper($_POST['password']))))))));
            database::$auth->insert('battlenet_accounts', [
                'email' => $antiXss->xss_clean(strtoupper($_POST['email'])),
                'sha_pass_hash' => $antiXss->xss_clean($bnet_hashed_pass)
            ]);

            $bnet_account_id = database::$auth->id();
            $username = $bnet_account_id . '#1';
            $hashed_pass = strtoupper(sha1(strtoupper($username . ':' . $_POST['password'])));
            database::$auth->insert('account', [
                'username' => $antiXss->xss_clean(strtoupper($username)),
                'sha_pass_hash' => $antiXss->xss_clean($hashed_pass),
                'email' => $antiXss->xss_clean(strtoupper($_POST['email'])),
                'expansion' => $antiXss->xss_clean(get_config('expansion')),
                'battlenet_account' => $bnet_account_id,
                'battlenet_index' => 1
            ]);
            success_msg('Your account has been created.');
            return true;
        }

        list($salt, $verifier) = getRegistrationData(strtoupper($_POST['username']), $_POST['password']);
        $bnet_hashed_pass = strtoupper(bin2hex(strrev(hex2bin(strtoupper(hash('sha256', strtoupper(hash('sha256', strtoupper($_POST['email'])) . ':' . strtoupper($_POST['password']))))))));
        database::$auth->insert('battlenet_accounts', [
            'email' => $antiXss->xss_clean(strtoupper($_POST['email'])),
            'sha_pass_hash' => $antiXss->xss_clean($bnet_hashed_pass)
        ]);

        $bnet_account_id = database::$auth->id();
        $username = $bnet_account_id . '#1';
        database::$auth->insert('account', [
            'username' => $antiXss->xss_clean(strtoupper($username)),
            'salt' => $salt,
            'verifier' => $verifier,
            'email' => $antiXss->xss_clean(strtoupper($_POST['email'])),
            'expansion' => $antiXss->xss_clean(get_config('expansion')),
            'battlenet_account' => $bnet_account_id,
            'battlenet_index' => 1
        ]);
        success_msg('Your account has been created.');
        return true;
    }

    /**
     * Registration without battle net servers.
     * @return bool
     */
    public static function normal_register()
    {
        global $antiXss;
        if ($_POST['submit'] != 'register' || empty($_POST['password']) || empty($_POST['username']) || empty($_POST['repassword']) || empty($_POST['email'])) {
            return false;
        }

        if (!captcha_validation()) {
            return false;
        }

        if (!preg_match('/^[0-9A-Z-_]+$/', strtoupper($_POST['username']))) {
            error_msg('Use valid characters for username.');
            return false;
        }

        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            error_msg('Use valid email.');
            return false;
        }

        if ($_POST['password'] != $_POST['repassword']) {
            error_msg('Passwords is not equal.');
            return false;
        }

        if (!(strlen($_POST['password']) >= 4 && strlen($_POST['password']) <= 16)) {
            error_msg('Password length is not valid.');
            return false;
        }

        if (!(strlen($_POST['username']) >= 2 && strlen($_POST['username']) <= 16)) {
            error_msg('Username length is not valid.');
            return false;
        }

        if (!get_config('multiple_email_use') && !self::check_email_exists(strtoupper($_POST['email']))) {
            error_msg('Email is exists.');
            return false;
        }

        if (!self::check_username_exists(strtoupper($_POST['username']))) {
            error_msg('Username is exists.');
            return false;
        }

        if (empty(get_config('soap_for_register'))) {
            if (empty(get_config('srp6_support'))) {
                $hashed_pass = strtoupper(sha1(strtoupper($_POST['username'] . ':' . $_POST['password'])));
                database::$auth->insert('account', [
                    'username' => $antiXss->xss_clean(strtoupper($_POST['username'])),
                    'sha_pass_hash' => $antiXss->xss_clean($hashed_pass),
                    'email' => $antiXss->xss_clean(strtoupper($_POST['email'])),
                    //'reg_mail' => $antiXss->xss_clean(strtoupper($_POST['email'])),
                    'expansion' => $antiXss->xss_clean(get_config('expansion'))
                ]);
                success_msg('Your account has been created.');
                return true;
            }

            list($salt, $verifier) = getRegistrationData(strtoupper($_POST['username']), $_POST['password']);
            database::$auth->insert('account', [
                'username' => $antiXss->xss_clean(strtoupper($_POST['username'])),
                'salt' => $salt,
                'verifier' => $verifier,
                'email' => $antiXss->xss_clean(strtoupper($_POST['email'])),
                //'reg_mail' => $antiXss->xss_clean(strtoupper($_POST['email'])),
                'expansion' => $antiXss->xss_clean(get_config('expansion'))
            ]);
            success_msg('Your account has been created.');
            return true;
        }

        $command = str_replace('{USERNAME}', $antiXss->xss_clean(strtoupper($_POST['username'])), get_config('soap_ca_command'));
        $command = str_replace('{PASSWORD}', $antiXss->xss_clean($_POST['password']), $command);
        $command = str_replace('{EMAIL}', $antiXss->xss_clean(strtoupper($_POST['email'])), $command);
        if (RemoteCommandWithSOAP($command)) {
            if (!empty(get_config('soap_asa_command'))) {
                $command_addon = str_replace('{USERNAME}', $antiXss->xss_clean(strtoupper($_POST['username'])), get_config('soap_asa_command'));
                $command_addon = str_replace('{EXPANSION}', get_config('expansion'), $command_addon);
                RemoteCommandWithSOAP($command_addon);
            }

            database::$auth->update('account', [
                'email' => $antiXss->xss_clean(strtoupper($_POST['email']))
            ], ['username' => Medoo::raw('UPPER(:username)', [':username' => $antiXss->xss_clean(strtoupper($_POST['username']))])]);

            success_msg('Your account has been created.');
        } else {
            error_msg('ERROR!, Please try again!');
        }

        return true;
    }

    /**
     * Change password for Battle.net Cores.
     * @return bool
     */
    public static function bnet_changepass()
    {
        global $antiXss;

        if (!empty(get_config('disable_changepassword'))) {
            return false;
        }

        if ($_POST['submit'] != 'changepass' || empty($_POST['password']) || empty($_POST['old_password']) || empty($_POST['repassword']) || empty($_POST['email'])) {
            return false;
        }

        if (!captcha_validation()) {
            return false;
        }

        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            error_msg('Use valid email.');
            return false;
        }

        if ($_POST['password'] != $_POST['repassword']) {

            error_msg('Passwords is not equal.');
            return false;
        }

        if (!(strlen($_POST['password']) >= 4 && strlen($_POST['password']) <= 16)) {
            error_msg('Password length is not valid.');
            return true;
        }

        $userinfo = self::get_user_by_email(strtoupper($_POST['email']));
        if (empty($userinfo['username'])) {
            error_msg('Email is not valid.');
            return false;
        }

        if (empty(get_config('srp6_support'))) {
            $Old_hashed_pass = strtoupper(sha1(strtoupper($userinfo['username'] . ':' . $_POST['old_password'])));
            $hashed_pass = strtoupper(sha1(strtoupper($userinfo['username'] . ':' . $_POST['password'])));

            if (strtoupper($userinfo['sha_pass_hash']) != $Old_hashed_pass) {
                error_msg('Old password is not valid.');
                return false;
            }

            database::$auth->update('account', [
                'sha_pass_hash' => $antiXss->xss_clean($hashed_pass),
                'sessionkey' => '',
                'v' => '',
                's' => ''
            ], [
                'id[=]' => $userinfo['id']
            ]);
        } else {
            if (verifySRP6($userinfo['username'], $_POST['old_password'], $userinfo['salt'], $userinfo['verifier'])) {
                error_msg('Old password is not valid.');
                return false;
            }

            list($salt, $verifier) = getRegistrationData(strtoupper($userinfo['username']), $_POST['password']);
            database::$auth->update('account', [
                'salt' => $salt,
                'verifier' => $verifier,
                'sessionkey' => '',
                'v' => '',
                's' => ''
            ], [
                'id[=]' => $userinfo['id']
            ]);
        }

        $bnet_hashed_pass = strtoupper(bin2hex(strrev(hex2bin(strtoupper(hash('sha256', strtoupper(hash('sha256', strtoupper($userinfo['email'])) . ':' . strtoupper($_POST['password']))))))));

        database::$auth->update('battlenet_accounts', [
            'sha_pass_hash' => $antiXss->xss_clean($bnet_hashed_pass)
        ], [
            'id[=]' => $userinfo['battlenet_account']
        ]);

        success_msg('Password has been changed.');
        return true;
    }

    /**
     * Change password for normal servers.
     * @return bool
     */
    public static function normal_changepass()
    {
        global $antiXss;

        if (!empty(get_config('disable_changepassword'))) {
            return false;
        }

        if ($_POST['submit'] != 'changepass' || empty($_POST['password']) || empty($_POST['old_password']) || empty($_POST['repassword']) || empty($_POST['username'])) {
            return false;
        }

        if (!captcha_validation()) {
            return false;
        }

        if ($_POST['password'] != $_POST['repassword']) {
            error_msg('Passwords is not equal.');
            return false;
        }

        if (!(strlen($_POST['password']) >= 4 && strlen($_POST['password']) <= 16)) {
            error_msg('Password length is not valid.');
            return false;
        }

        $userinfo = self::get_user_by_username(strtoupper($_POST['username']));
        if (empty($userinfo['username'])) {
            error_msg('Username is not valid.');
            return false;
        }


        if (empty(get_config('srp6_support'))) {
            $Old_hashed_pass = strtoupper(sha1(strtoupper($userinfo['username'] . ':' . $_POST['old_password'])));
            $hashed_pass = strtoupper(sha1(strtoupper($userinfo['username'] . ':' . $_POST['password'])));
            if (strtoupper($userinfo['sha_pass_hash']) != $Old_hashed_pass) {
                error_msg('Old password is not valid.');
                return false;
            }

            database::$auth->update('account', [
                'sha_pass_hash' => $antiXss->xss_clean($hashed_pass),
                'sessionkey' => '',
                'v' => '',
                's' => ''
            ], [
                'id[=]' => $userinfo['id']
            ]);
        } else {
            if (verifySRP6($userinfo['username'], $_POST['old_password'], $userinfo['salt'], $userinfo['verifier'])) {
                error_msg('Old password is not valid.');
                return false;
            }

            list($salt, $verifier) = getRegistrationData(strtoupper($userinfo['username']), $_POST['password']);
            database::$auth->update('account', [
                'salt' => $salt,
                'verifier' => $verifier,
                'sessionkey' => '',
                'v' => '',
                's' => ''
            ], [
                'id[=]' => $userinfo['id']
            ]);
        }

        success_msg('Password has been changed.');
        return true;
    }

    /**
     * Change password for normal servers.
     * @return bool
     */
    public static function restorepassword()
    {
        global $antiXss;
        if ($_POST['submit'] != 'restorepassword') {
            return false;
        }

        if (get_config('battlenet_support') && empty($_POST['email'])) {
            return false;
        } elseif (!get_config('battlenet_support') && empty($_POST['username'])) {
            return false;
        }

        if (!captcha_validation()) {
            return false;
        }

        if (get_config('battlenet_support')) {
            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                error_msg('Use a valid email.');
                return false;
            }

            $userinfo = self::get_user_by_email(strtoupper($_POST['email']));
            if (empty($userinfo['email'])) {
                error_msg('Email is not valid.');
                return false;
            }

            $field_acc = $userinfo['email'];
        } else {
            if (!preg_match('/^[0-9A-Z-_]+$/', strtoupper($_POST['username']))) {
                error_msg('Use a valid username.');
                return false;
            }

            $userinfo = self::get_user_by_username(strtoupper($_POST['username']));
            if (empty($userinfo['email'])) {
                error_msg('Username is not valid.');
                return false;
            }

            $field_acc = $userinfo['username'];
        }

        if (!isset($userinfo['restore_key'])) {
            self::add_password_key_to_acctbl();
        }

        $restore_key = strtolower(md5(time() . mt_rand(1000, 9999)) . mt_rand(10000, 99999));
        database::$auth->update('account', [
            'restore_key' => $antiXss->xss_clean($restore_key)
        ], [
            'id[=]' => $userinfo['id']
        ]);

        $restorepass_URL = get_config('baseurl') . '/index.php?restore=' . strtolower($field_acc) . '&key=' . $restore_key;
        $message = "For restore you game account open <a href='$restorepass_URL' target='_blank'>this link</a>: <BR>$restorepass_URL";
        send_phpmailer(strtolower($userinfo['email']), 'Restore Account Password', $message);
        success_msg('Check your email, (Check SPAM/Junk too).');
        return true;
    }

    public static function restorepassword_setnewpw($user_data, $restore_key)
    {
        global $antiXss;
        if (empty($user_data) || empty($restore_key)) {
            return false;
        }

        if ($restore_key == 1 || strlen($restore_key) < 30) {
            return false;
        }

        if (get_config('battlenet_support')) {
            if (!filter_var($user_data, FILTER_VALIDATE_EMAIL)) {
                return false;
            }

            $userinfo = self::get_user_by_email(strtoupper($user_data));
        } else {
            if (!preg_match('/^[0-9A-Z-_]+$/', strtoupper($user_data))) {
                error_msg('Use a valid username.');
                return false;
            }

            $userinfo = self::get_user_by_username(strtoupper($user_data));
        }

        if (empty($userinfo['email'])) {
            return false;
        }

        if ($userinfo['restore_key'] != $restore_key) {
            return false;
        }

        $new_password = generateRandomString(12);

        if (get_config('battlenet_support')) {
            $message = 'Your new account information : <br>Email: ' . strtolower($userinfo['email']) . '<br>Password: ' . $new_password;
            if (empty(get_config('srp6_support'))) {
                $hashed_pass = strtoupper(sha1(strtoupper($userinfo['username'] . ':' . $new_password)));
                database::$auth->update('account', [
                    'sha_pass_hash' => $antiXss->xss_clean($hashed_pass),
                    'sessionkey' => '',
                    'v' => '',
                    's' => '',
                    'restore_key' => '1'
                ], [
                    'id[=]' => $userinfo['id']
                ]);
            } else {
                list($salt, $verifier) = getRegistrationData(strtoupper($userinfo['username']), $new_password);
                database::$auth->update('account', [
                    'salt' => $salt,
                    'verifier' => $verifier,
                    'sessionkey' => '',
                    'v' => '',
                    's' => '',
                    'restore_key' => '1'
                ], [
                    'id[=]' => $userinfo['id']
                ]);
            }

            $bnet_hashed_pass = strtoupper(bin2hex(strrev(hex2bin(strtoupper(hash('sha256', strtoupper(hash('sha256', strtoupper($userinfo['email'])) . ':' . strtoupper($new_password))))))));
            database::$auth->update('battlenet_accounts', [
                'sha_pass_hash' => $antiXss->xss_clean($bnet_hashed_pass)
            ], [
                'id[=]' => $userinfo['battlenet_account']
            ]);
        } else {
            $message = 'Your new account information : <br>Username: ' . strtolower($userinfo['username']) . '<br>Password: ' . $new_password;
            if (empty(get_config('soap_for_register'))) {
                if (empty(get_config('srp6_support'))) {
                    $hashed_pass = strtoupper(sha1(strtoupper($userinfo['username'] . ':' . $new_password)));
                    database::$auth->update('account', [
                        'sha_pass_hash' => $antiXss->xss_clean($hashed_pass),
                        'sessionkey' => '',
                        'v' => '',
                        's' => '',
                        'restore_key' => '1'
                    ], [
                        'id[=]' => $userinfo['id']
                    ]);
                } else {
                    list($salt, $verifier) = getRegistrationData(strtoupper($userinfo['username']), $new_password);
                    database::$auth->update('account', [
                        'salt' => $salt,
                        'verifier' => $verifier,
                        'sessionkey' => '',
                        'v' => '',
                        's' => '',
                        'restore_key' => '1'
                    ], [
                        'id[=]' => $userinfo['id']
                    ]);
                }
            } else {
                $command = str_replace('{USERNAME}', $antiXss->xss_clean(strtoupper($userinfo['username'])), get_config('soap_cp_command'));
                $command = str_replace('{PASSWORD}', $antiXss->xss_clean($new_password), $command);
                if (RemoteCommandWithSOAP($command)) {
                    success_msg('Password has been changed.');
                    database::$auth->update('account', [
                        'restore_key' => '1'
                    ], [
                        'id[=]' => $userinfo['id']
                    ]);
                } else {
                    error_msg('ERROR!, Please try again!');
                    return false;
                }
            }
        }

        send_phpmailer(strtolower($userinfo['email']), 'New Account Password', $message);
        success_msg('Check your email for new password, (Check SPAM/Junk too).');
        return false;
    }

    public
    static function check_email_exists($email)
    {
        if (!empty($email)) {
            $datas = database::$auth->select('account', ['id'], ['email' => Medoo::raw('UPPER(:email)', [':email' => $email])]);
            if (empty($datas[0])) {
                return true;
            }
        }
        return false;
    }

    public
    static function get_user_by_email($email)
    {
        if (!empty($email)) {
            $datas = database::$auth->select('account', '*', ['email' => Medoo::raw('UPPER(:email)', [':email' => strtoupper($email)])]);
            if (!empty($datas[0]['username'])) {
                return $datas[0];
            }
        }
        return false;
    }

    public
    static function get_user_by_username($username)
    {
        if (!empty($username)) {
            $datas = database::$auth->select('account', '*', ['username' => Medoo::raw('UPPER(:username)', [':username' => strtoupper($username)])]);
            if (!empty($datas[0]['username'])) {
                return $datas[0];
            }
        }
        return false;
    }

    /**
     * @param $username
     * @return bool
     */
    public
    static function check_username_exists($username)
    {
        if (!empty($username)) {
            $datas = database::$auth->select('account', ['id'], ['username' => Medoo::raw('UPPER(:username)', [':username' => $username])]);
            if (empty($datas[0])) {
                return true;
            }
        }
        return false;
    }

    public
    static function get_online_players($realmID)
    {
        $datas = database::$chars[$realmID]->select('characters', array('name', 'race', 'class', 'gender', 'level'), ['LIMIT' => 49, 'ORDER' => ['level' => 'DESC'], 'online[=]' => 1]);
        if (!empty($datas[0]['name'])) {
            return $datas;
        }
        return false;
    }

    public
    static function get_online_players_count($realmID)
    {
        $datas = database::$chars[$realmID]->count('characters', ['online[=]' => 1]);
        if (!empty($datas)) {
            return $datas;
        }
        return 0;
    }

    public
    static function add_password_key_to_acctbl()
    {
        database::$auth->query("ALTER TABLE `account` ADD COLUMN `restore_key` varchar(255) NULL DEFAULT '1';");
        return true;
    }

    /**
     * Enable 2fa
     * @return bool
     */
    public static function tfa_enable()
    {
        global $antiXss;

        if (empty(get_config('2fa_support'))) {
            return false;
        }

        if (empty($_POST['submit']) || $_POST['submit'] != 'etfa' || empty($_POST['email']) || (empty(get_config('battlenet_support')) && empty($_POST['username']))) {
            return false;
        }

        if (!captcha_validation()) {
            return false;
        }

        $userinfo = self::get_user_by_email(strtoupper($_POST['email']));
        if (empty($userinfo['id'])) {
            error_msg('Account is not valid.');
            return false;
        }

        if (empty(get_config('battlenet_support')) && strtolower($userinfo['username']) != strtolower($_POST['username'])) {
            error_msg('Account is not valid.');
            return false;
        }

        $verify_key = md5(strtolower($userinfo['email']) . "_" . time() . rand(1, 999999));

        if (!isset($userinfo['restore_key'])) {
            self::add_password_key_to_acctbl();
        }

        database::$auth->update('account', [
            'restore_key' => $antiXss->xss_clean($verify_key)
        ], [
            'id[=]' => $userinfo['id']
        ]);

        $account = $userinfo['email'];
        if (empty(get_config('battlenet_support'))) {
            $account = $userinfo['username'];
        }

        $restorepass_URL = get_config('baseurl') . '/index.php?enabletfa=' . strtolower($verify_key) . '&account=' . strtolower($account);
        $message = "Hey, to enable Two-Factor Authentication (2FA), Please open  <a href='$restorepass_URL' target='_blank'>this link</a>: <BR>$restorepass_URL";
        send_phpmailer(strtolower($userinfo['email']), 'Enable Account 2FA', $message);
        success_msg('Check your email, (Check SPAM/Junk too).');
        return true;
    }

    public static function account_set_2fa($verify_key, $account)
    {
        global $antiXss;

        if (empty(get_config('2fa_support'))) {
            return false;
        }

        if (empty($verify_key) || empty($account)) {
            return false;
        }

        if ($verify_key == 1 || strlen($verify_key) < 30) {
            return false;
        }

        $acc_name = "";
        if (get_config('battlenet_support')) {
            if (!filter_var($account, FILTER_VALIDATE_EMAIL)) {
                return false;
            }

            $userinfo = self::get_user_by_email(strtoupper($account));
            $acc_name = $userinfo['email'];
        } else {
            if (!preg_match('/^[0-9A-Z-_]+$/', strtoupper($account))) {
                return false;
            }

            $userinfo = self::get_user_by_username(strtoupper($account));
            $acc_name = $userinfo['username'];
        }

        if (empty($userinfo['email'])) {
            return false;
        }

        if ($userinfo['restore_key'] != $verify_key) {
            return false;
        }

        $ga = new PHPGangsta_GoogleAuthenticator();
        $tfa_key = $ga->createSecret();

        database::$auth->update('account', [
            'restore_key' => '1'
        ], [
            'id[=]' => $userinfo['id']
        ]);

        $command = str_replace('{USERNAME}', $antiXss->xss_clean(strtoupper($userinfo['username'])), get_config('soap_2d_command'));
        RemoteCommandWithSOAP($command);
        $command = str_replace('{USERNAME}', $antiXss->xss_clean(strtoupper($userinfo['username'])), get_config('soap_2e_command'));
        $command = str_replace('{SECRET}', $tfa_key, $command);
        RemoteCommandWithSOAP($command);

        $acc_name = str_replace('-', '', $acc_name);
        $acc_name = str_replace('.', '', $acc_name);
        $acc_name = str_replace('_', '', $acc_name);
        $acc_name = str_replace('@', '', $acc_name);

        $message = 'Two-Factor Authentication (2FA) enabled on your account.<br>Please scan the barcode with Google Authenticator.<BR>';
        $message .= '<img src="' . $ga->getQRCodeGoogleUrl($acc_name, $tfa_key) . '"><BR>';
        $message .= 'or you can add this code to Google Authenticator: <B>' . $tfa_key . '</B>.<BR>';

        send_phpmailer(strtolower($userinfo['email']), 'Account 2FA enabled', $message);
        success_msg('Account 2FA enabled please check your email, (Check SPAM/Junk too).');
    }
}
