<?php
/**
 * @author Amin Mahmoudi (MasterkinG)
 * @copyright    Copyright (c) 2019 - 2022, MsaterkinG32 Team, Inc. (https://masterking32.com)
 * @link    https://masterking32.com
 * @Description : It's not masterking32 framework !
 **/

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$error_msg = "";
$success_msg = "";

function getIP()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        //ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        //ip pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

function get_config($name)
{
    global $config;
    if (!empty($name)) {
        if (isset($config[$name])) {
            return $config[$name];
        }
    }
    return false;
}

function error_msg($input = false)
{
    global $error_error;
    if (!empty($error_error)) {
        echo "<p class=\"alert alert-danger\">$error_error</p>";
    } elseif (!empty($input)) {
        $error_error = $input;
    }
}

function success_msg($input = false)
{
    global $success_msg;
    if (!empty($success_msg)) {
        echo "<p class=\"alert alert-success\">$success_msg</p>";
    } elseif (!empty($input)) {
        $success_msg = $input;
    }
}

function GetRaceID($race)
{
    switch ($race) {
        case "HUMAN":
            return 1;
        case "ORC":
            return 2;
        case "DWARF":
            return 3;
        case "NIGHTELF":
            return 4;
        case "SCOURGE":
            return 5;
        case "TAUREN":
            return 6;
        case "GNOME":
            return 7;
        case "TROLL":
            return 8;
        case "BLOODELF":
            return 10;
        case "DRAENEI":
            return 11;
        default:
            exit("error");
    }
}

function GetClassID($class)
{
    switch ($class) {
        case "WARRIOR":
            return 1;
        case "PALADIN":
            return 2;
        case "HUNTER":
            return 3;
        case "ROGUE":
            return 4;
        case "PRIEST":
            return 5;
        case "DEATHKNIGHT":
            return 6;
        case "SHAMAN":
            return 7;
        case "MAGE":
            return 8;
        case "WARLOCK":
            return 9;
        case "DRUID":
            return 11;
        default:
            exit("<br>YOUR CHARACTER CLASS IS NOT BLIZZLIKE FOR 3.3.5a<br>");
    }
}

function get_human_time_from_sec($seconds)
{
    $interval = new DateInterval("PT{$seconds}S");
    $now = new DateTimeImmutable('now', new DateTimeZone('utc'));
    return $now->diff($now->add($interval))->format('%a:%h:%i');
}

function send_phpmailer($email, $subject, $message)
{
    try {
        $mail = new PHPMailer(true);
        if (get_config('debug_mode')) {
            $mail->SMTPDebug = 2;
        }
        $mail->isSMTP();
        $mail->Host = get_config('smtp_host');
        $mail->SMTPAuth = get_config('smtp_auth');
        $mail->Username = get_config('smtp_user');
        $mail->Password = get_config('smtp_pass');
        $mail->SMTPSecure = get_config('smtp_secure');
        $mail->Port = get_config('smtp_port');

        //Recipients
        $mail->setFrom(get_config('smtp_mail'));
        $mail->addAddress($email);     // Add a recipient
        $mail->addReplyTo(get_config('smtp_mail'));

        // Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $message;

        $mail->send();
    } catch (Exception $e) {
        if (get_config('debug_mode')) {
            echo 'Message: ' . $e->getMessage();
        }
    }
    return true;
}

function generateRandomString($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}


function RemoteCommandWithSOAP($COMMAND)
{
    global $soap_connection_info;

    if (empty($COMMAND)) {
        return false;
    }

    try {
        $conn = new SoapClient(NULL, array(
            'location' => 'http://' . get_config('soap_host') . ':' . get_config('soap_port') . '/',
            'uri' => get_config('soap_uri'),
            'style' => get_config('soap_style'),
            'login' => get_config('soap_username'),
            'password' => get_config('soap_password')
        ));
        $conn->executeCommand(new SoapParam($COMMAND, 'command'));
        unset($conn);
        return true;
    } catch (Exception $e) {
        return false;
    }
}