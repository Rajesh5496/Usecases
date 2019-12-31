<?php
session_start();
$userN = $_POST['uname'];
$passW = $_POST['pwd'];
$userlist = file ('users.txt');

$success = false;
if(isset($_POST['submit'])){	

if(strcmp($_SESSION['captcha'], $_POST['captcha']) != 0){
  
$msg="<span style='color:red'>The Validation code does not match!</span>";// Captcha verification is incorrect.
$_SESSION['error']= $msg;
header("location: login.php");
}

else
	
{// Captcha verification is Correct. Final Code Execute here!

foreach ($userlist as $user) {
    $user_details = explode('|', $user);
    if ($user_details[0] == $userN && $user_details[1] == $passW) {
        $success = true;
        break;
    }
}	
if ($success) {
    header('Location: loginsuccess.php');
} else {
  $_SESSION['error'] = "<span style='color:red'>Username or Password is incorrect!</span>";
  header('Location: login.php');
}
}
}
?>