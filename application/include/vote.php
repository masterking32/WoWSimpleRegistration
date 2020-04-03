<?php
/**
 * @author Amin Mahmoudi (MasterkinG)
 * @copyright    Copyright (c) 2019 - 2022, MsaterkinG32 Team, Inc. (https://masterking32.com)
 * @link    https://masterking32.com
 * @Description : It's not masterking32 framework
 * @TODO: Add vote verify system.
 **/

use Medoo\Medoo;

class vote
{
    public static function post_handler()
    {
        if (get_config('vote_system') && !empty($_POST['account']) && !empty($_POST['siteid'])) {
            self::do_vote($_POST['account'], $_POST['siteid']);
        }
    }

    /**
     * Validate account and do vote.
     * @return bool
     */
    public static function do_vote($account, $siteID)
    {
        global $antiXss;
        $vote_sites = get_config('vote_sites');
        if (!is_numeric($siteID) || empty($vote_sites[$siteID - 1])) {
            error_msg('Vote site is not valid!');
            return false;
        }

        if (get_config('battlenet_support')) {
            if (!filter_var($account, FILTER_VALIDATE_EMAIL)) {
                error_msg('Use valid email.');
                return false;
            }

            $acc_data = user::get_user_by_email($account);
        } else {
            if (!preg_match('/^[0-9A-Z-_]+$/', strtoupper($account))) {
                error_msg('Use valid characters for username.');
                return false;
            }

            $acc_data = user::get_user_by_username($account);
        }

        if (empty($acc_data['id'])) {
            error_msg('Account is not valid.');
            return false;
        }

        if (!isset($acc_data['votePoints'])) {
            self::setup_vote_table();
        }
        $siteID--;
        database::$auth->delete('votes', ['votedate[<]' => date("Y-m-d H:i:s", time() - 43200)]);

        if (!empty(self::get_vote_by_IP($siteID)) || !empty(self::get_vote_by_account($siteID, $acc_data['id']))) {
            error_msg('You already voted on this website.');
            return false;
        }

        database::$auth->insert('votes', [
            'ip' => $antiXss->xss_clean(strtoupper(getIP())),
            'vote_site' => $antiXss->xss_clean($siteID),
            'accountid' => $antiXss->xss_clean($acc_data['id'])
        ]);

        database::$auth->update('account', [
            'votePoints' => $antiXss->xss_clean($acc_data['votePoints'] + 1)
        ], [
            'id[=]' => $acc_data['id']
        ]);

        header('location: ' . $vote_sites[$siteID]['site_url']);
        exit();
    }

    public static function get_vote_by_IP($siteID)
    {
        $datas = database::$auth->select('votes', '*', ['ip' => Medoo::raw('UPPER(:ip)', [':ip' => strtoupper(getIP())]), 'vote_site[=]' => $siteID]);
        if (!empty($datas[0]['id'])) {
            return $datas;
        }

        return false;
    }

    public static function get_vote_by_account($siteID, $accountID)
    {
        $datas = database::$auth->select('votes', '*', ["AND" => ['accountid[=]' => $accountID, 'vote_site[=]' => $siteID]]);
        if (!empty($datas[0]['id'])) {
            return $datas;
        }

        return false;
    }

    public static function setup_vote_table()
    {
        database::$auth->query("ALTER TABLE `account` ADD COLUMN `votePoints` varchar(255) NULL DEFAULT '0';");
        database::$auth->query("
            CREATE TABLE `votes` (
              `id` bigint(255) NOT NULL AUTO_INCREMENT,
              `ip` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
              `vote_site` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
              `accountid` bigint(255) NULL DEFAULT 0,
              `votedate` timestamp(0) NULL DEFAULT current_timestamp(0),
              `done` int(10) NOT NULL DEFAULT 0,
              PRIMARY KEY (`id`) USING BTREE
            ) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;
        ");

        return true;
    }
}
