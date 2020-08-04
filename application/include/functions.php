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

function validate_hcaptcha($value)
{
    try {
        $data = array(
            'secret' => get_config('captcha_secret'),
            'response' => $_POST['h-captcha-response']
        );
        $verify = curl_init();
        curl_setopt($verify, CURLOPT_URL, "https://hcaptcha.com/siteverify");
        curl_setopt($verify, CURLOPT_POST, true);
        curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($verify);
        $responseData = json_decode($response);
        if ($responseData->success) {
            return true;
        }
    } catch (Exception $e) {
    }

    return false;
}

function validate_recaptcha($value)
{
    try {
        $verify = curl_init();
        curl_setopt($verify, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify?secret=" . get_config('captcha_secret') . "&response=" . $_POST['g-recaptcha-response']);
        curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($verify);
        $responseData = json_decode($response, true);
        if ($responseData["success"] == true) {
            return true;
        }
    } catch (Exception $e) {
    }

    return false;
}

function captcha_validation()
{
    if (empty(get_config('captcha_type')) && !empty($_POST['captcha']) && !empty($_SESSION['captcha'])) {
        if (strtolower($_SESSION['captcha']) != strtolower($_POST['captcha'])) {
            error_msg('Captcha is not valid.');
            return false;
        }
        unset($_SESSION['captcha']);
    } else if (!empty(get_config('captcha_type')) && get_config('captcha_type') > 2) {
        return true;
    } elseif (!empty(get_config('captcha_type')) && get_config('captcha_type') == 1 && !empty($_POST['h-captcha-response'])) {
        if (!validate_hcaptcha($_POST['h-captcha-response'])) {
            error_msg('HCaptcha is not valid.');
            return false;
        }
    } elseif (!empty(get_config('captcha_type')) && get_config('captcha_type') == 2 && !empty($_POST['g-recaptcha-response'])) {
        if (!validate_recaptcha($_POST['g-recaptcha-response'])) {
            error_msg('ReCaptcha is not valid.');
            return false;
        }
    } else {
        error_msg('Captcha is required.');
        return false;
    }

    return true;
}

function getCaptchaJS()
{
    if (!empty(get_config('captcha_type'))) {
        if (get_config('captcha_type') == 1) {
            return '<script src="https://hcaptcha.com/1/api.js?hl=' . get_config('captcha_language') . '" async defer></script><style>.h-captcha { display: inline-block;}</style>';
        } else if (get_config('captcha_type') == 2) {
            return '<script src="https://www.google.com/recaptcha/api.js?hl=' . get_config('captcha_language') . '" async defer></script><style>.g-recaptcha { display: inline-block;}</style>';
        }
    }

    return '';
}

function GetCaptchaHTML()
{
    if (!empty(get_config('captcha_type'))) {
        if (get_config('captcha_type') == 1) {
            return '<div class="row text-center"><div class="col-md-12 text-center"><div class="h-captcha" data-sitekey="' . get_config('captcha_key') . '" style=\'margin:10px auto\'></div></div></div>';
        } else if (get_config('captcha_type') == 2) {
            return '<div class="row text-center"><div class="col-md-12 text-center"><div class="g-recaptcha" data-sitekey="' . get_config('captcha_key') . '" style=\'margin:10px auto\'></div></div></div>';
        } else {
            return '';
        }
    }

    return '<div class="input-group"><span class="input-group">Captcha</span><input type="text" class="form-control" placeholder="Captcha" name="captcha"></div><p style="text-align: center;margin-top: 10px;"><img src="' . user::$captcha->inline() . '" style="border - radius: 5px;"/></p>';
}

// Its from Trinitycore/account-creator
function calculateSRP6Verifier($username, $password, $salt)
{
    // algorithm constants
    $g = gmp_init(7);
    $N = gmp_init('894B645E89E1535BBDAD5B8B290650530801B18EBFBF5E8FAB3C82872A3E9BB7', 16);

    // calculate first hash
    $h1 = sha1(strtoupper($username . ':' . $password), TRUE);

    // calculate second hash
    $h2 = sha1($salt . $h1, TRUE);

    // convert to integer (little-endian)
    $h2 = gmp_import($h2, 1, GMP_LSW_FIRST);

    // g^h2 mod N
    $verifier = gmp_powm($g, $h2, $N);

    // convert back to a byte array (little-endian)
    $verifier = gmp_export($verifier, 1, GMP_LSW_FIRST);

    // pad to 32 bytes, remember that zeros go on the end in little-endian!
    $verifier = str_pad($verifier, 32, chr(0), STR_PAD_RIGHT);

    // done!
    return $verifier;
}

// Returns SRP6 parameters to register this username/password combination with
function getRegistrationData($username, $password)
{
    // generate a random salt
    $salt = random_bytes(32);

    // calculate verifier using this salt
    $verifier = calculateSRP6Verifier($username, $password, $salt);

    // done - this is what you put in the account table!
    return array($salt, $verifier);
}

//From TrinityCore/AOWOW
function verifySRP6($user, $pass, $salt, $verifier)
{
    $g = gmp_init(7);
    $N = gmp_init('894B645E89E1535BBDAD5B8B290650530801B18EBFBF5E8FAB3C82872A3E9BB7', 16);
    $x = gmp_import(
        sha1($salt . sha1(strtoupper($user . ':' . $pass), TRUE), TRUE),
        1,
        GMP_LSW_FIRST
    );
    $v = gmp_powm($g, $x, $N);
    return ($verifier === str_pad(gmp_export($v, 1, GMP_LSW_FIRST), 32, chr(0), STR_PAD_RIGHT));
}