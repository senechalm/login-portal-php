<?php

session_start();
require_once("functions/class.user.php");
$login = new USER();

if ($login->is_loggedin()!="") {
    $login->redirect('MainGame.php');
}

if (isset($_POST['login-submit'])) {
    $uname = strip_tags($_POST['username']);
    $umail = strip_tags($_POST['username']);
    $upass = strip_tags($_POST['password']);
        
    if ($login->doLogin($uname, $umail, $upass)) {
        $_SESSION['ErrorLogin'] = 'none';
        $login->redirect('MainGame.php');
    } else {
        $_SESSION['ErrorLogin'] = 'not connected';
        $login->redirect('index.php');
    }
}

?>
