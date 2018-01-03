<?php

session_start();
require_once("functions/class.user.php");
$login = new USER();

if ($login->is_loggedin()!="") {
    $login->redirect('MainGame.php');
}

if (isset($_POST['register-submit'])) {
    $_SESSION['Register'] = 'false';
    $_SESSION['ErrorRegister'] = 'none';

    $uname = strip_tags($_POST['username']);
    $umail = strip_tags($_POST['email']);
    $upass = strip_tags($_POST['password']);
    $cpass = strip_tags($_POST['confirm-password']);

    if ($uname == ""){ $Register_error['message'] = "Username can not be empty."; }
    else if ($umail == ""){ $Register_error['message'] = "Email can not be empty."; }
    else if ($upass == ""){ $Register_error['message'] = "Password can not be empty."; }
    else if ($cpass == ""){ $Register_error['message'] = "Password can not be empty."; }
    else if ($upass != $cpass){ $Register_error['message'] = 'Passwords do not match.'; }
    else if (strlen($upass) < 6){ $Register_error['message'] = 'Passwords must be at least 6 characters.'; }
    else if(!filter_var($umail, FILTER_VALIDATE_EMAIL)) { $Register_error['message'] = 'Please enter a valid email address'; }
    else {
         $is_existing = $login->is_existing($uname,$umail);

         if($is_existing['username']==$uname) {
            $Register_error['message'] = "sorry username already taken !";
         }
         else if($is_existing['email']==$umail) {
            $Register_error['message'] = "sorry email id already taken !";
         }
         else
         {
            if($login->register($uname, $umail, $upass)) 
            {
                $_SESSION['Register'] = 'true';
            }
         }
     }
    
    $_SESSION['ErrorRegister'] = $Register_error;
    $login->redirect('index.php');
}

?>