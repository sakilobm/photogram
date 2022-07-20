<?php
include 'libs/load.php';

$user = "sakilobm";
$pass = isset($_GET['pass']) ? $_GET['pass'] : '' ;
$result = null;

if (isset($_GET['logout'])) {
    Session::destroy();
    die("Session Destroyed, <a href='logintest.php'>Login Again </a>");
}

/**
 * 1.Check if session_token in PHP session is avalable
 * 2.If yes, construct UserSession and see if it's successful.
 * 3.Check if the session is valid one
 * 4.if valid, print "Session validated"
 * 5.Else, print "Invalid Session" and ask user to login
 */

if (Session::get('is_loggedin')) {
    $username = Session::get('session_username');
    $userobj = new User($username);
    print("Welcome Back". $userobj->getFirstname());
    // print("<br>".$userobj->getBio());
    $userobj->setBio("Making New Things...");
    // print("<br>".$userobj->getBio());
} else {
    print("No session found, trying to login now. <br>");
    $result = User::login($user, $pass);

    if ($result) {
        $userobj = new User($user);
        echo "Login Success", $userobj->getUsername();
        Session::set('is_loggedin', true);
        Session::set('session_username', $result);
    } else {
        echo "Login Failed, $user";
    }
}
echo <<<EOL
<br><br><a href=logintest.php?logout>Logout</a>
EOL;
