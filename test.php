<pre>
<?php
include 'libs/load.php';
include 'User.class.php';

//print_r($_SERVER);
//print_r($_GET);
//print_r($_POST);
//print_r($_FILES);
//print_r($_COOKIE);

// </pre> -->
// $user = "sakilobm";
// $pass = "password";
// $email = "sakilobm@gmail.com";
// $phone = "9874561230";


$result = User::signup($user, $pass, $email, $phone);
if ($result) {
    echo "Welcome"."$user";
} else {
    echo "Signup Failed";
}
echo 'Test php';
$bio = "Welcome to my profile";
$a = new User('sakilobm');
try {
    $a->setBio($bio);
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}







// {
// 	"db.server": "mysql.selfmade.ninja",
// 	"db.username": "bharath",
// 	"db.password": "sakilbharath@5",
// 	"db.name": "bharath_newDb"
// }





// $cookie_name = "testscript";
// $cookie_value = $_SERVER['REQUEST_URI'];
// setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
// print("_SERVER \n");
// print_r($_SERVER);
// print("_GET \n");
// print_r($_GET);
// print("_POST \n");
// print_r($_POST);
// print("_FILES \n");
// print_r($_FILES);
// print("_COOKIES \n");
//  print_r($_COOKIE);
 ?>
</pre>