<?php
/**
 * @author Amin Mahmoudi (MasterkinG)
 * @copyright	Copyright (c) 2019 - 2022, MsaterkinG32 Team, Inc. (https://masterking32.com)
 * @link	https://masterking32.com
 * @Description : It's not masterking32 framework !
 **/
use Gregwar\Captcha\CaptchaBuilder;
use Medoo\Medoo;

class status{
    public static function get_character_by_guid($realmID,$guid)
    {
        if(!empty($guid))
        {
            $datas = database::$chars[$realmID]->select("characters", array("name","race","class","gender","level"),["guid[=]" => $guid]);
            if(!empty($datas[0]["name"]))
            {
                return $datas[0];
            }
        }
        return false;
    }

    public static function get_top_achievements($realmID)
    {
        $datas = database::$chars[$realmID]->query("SELECT guid, COUNT(*) as total FROM character_achievement GROUP BY guid ORDER BY total DESC LIMIT 10;")->fetchAll();
        if(!empty($datas[0]["guid"]))
        {
            return $datas;
        }
        return false;
    }

    public static function get_top_arenateams($realmID)
    {
        $datas = database::$chars[$realmID]->select("arena_team", array("arenaTeamId","name","captainGuid","rating"),['LIMIT' => 10,"ORDER" => ["rating" => "DESC"]]);
        if(!empty($datas[0]["name"]))
        {
            return $datas;
        }
        return false;
    }

    public static function get_top_killers($realmID)
    {
        $datas = database::$chars[$realmID]->select("characters", array("name","race","class","gender","level","totalKills"),['LIMIT' => 10,"ORDER" => ["totalKills" => "DESC"]]);
        if(!empty($datas[0]["name"]))
        {
            return $datas;
        }
        return false;
    }

    public static function get_top_arenapoints($realmID)
    {
        $datas = database::$chars[$realmID]->select("characters", array("name","race","class","gender","level","arenaPoints"),['LIMIT' => 10,"ORDER" => ["arenaPoints" => "DESC"]]);
        if(!empty($datas[0]["name"]))
        {
            return $datas;
        }
        return false;
    }

    public static function get_top_honorpoints($realmID)
    {
        $datas = database::$chars[$realmID]->select("characters", array("name","race","class","gender","level","totalHonorPoints"),['LIMIT' => 10,"ORDER" => ["totalHonorPoints" => "DESC"]]);
        if(!empty($datas[0]["name"]))
        {
            return $datas;
        }
        return false;
    }

    public static function get_top_playtime($realmID)
    {
        $datas = database::$chars[$realmID]->select("characters", array("name","race","class","gender","level","totaltime"),['LIMIT' => 10,"ORDER" => ["totaltime" => "DESC"]]);
        if(!empty($datas[0]["name"]))
        {
            return $datas;
        }
        return false;
    }
}