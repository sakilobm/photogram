<?php
include_once 'includes/Session.class.php';
include_once 'includes/User.class.php';
include_once 'includes/Database.class.php';
include_once 'includes/UserSession.class.php';

// use LDAP\Result;

global $__site_config;
//Note: Change this path if you run this code outside lab.
// $__site_config = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/../photogramconfig.json');
$__site_config_path = dirname(is_link($_SERVER['DOCUMENT_ROOT']) ? readlink($_SERVER['DOCUMENT_ROOT']) : $_SERVER['DOCUMENT_ROOT']).'/photogramconfig.json';
$__site_config = file_get_contents($__site_config_path);

// echo $__site_config_path;

Session::start();

function get_config($key, $default = null)
{
    global $__site_config;
    $array = json_decode($__site_config, true);
    if (isset($array[$key])) {
        return $array[$key];
    } else {
        return $default;
    }
}

function load_template($name)
{
    include $_SERVER['DOCUMENT_ROOT'].get_config('base_path')."_templates/$name.php";
}
// include $_SERVER['DOCUMENT_ROOT']."/app/_templates/$name.php";

function validate_credentials($username, $password)
{
    if ($username== "b.sowbharath@gmail.com" and $password=="password") {
        return true;
    } else {
        return false;
    }
}

// function signup($user, $pass, $email, $phone)
// {
//     $servername = "mysql.selfmade.ninja";
//     $username = "bharath";
//     $password = "sakilbharath@5";
//     $dbname = "bharath_newDb";

//     // Create connection
//     $conn = new mysqli($servername, $username, $password, $dbname);

//     // Check connection
//     if ($conn->connect_error) {
//         die("Connection failed: " . $conn->connect_error);
//     }
    
//     $sql = "INSERT INTO `auth` (`username`, `password`, `email`, `phone`, `blocked`, `active`)
//     VALUES ('$user', '$pass', '$email','$phone', '0', '0');";
//     $result = false;
//     if ($conn->query($sql) == true) {
//         $result = true;
//     } else {
//         echo "$conn->error";
//         $result = false;
//     }
//     $conn->close();
//     return $result;
// }
