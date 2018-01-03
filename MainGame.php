<!-- CHECK LOGIN-->

<?php
session_start();

require_once("functions/class.user.php");
$login = new USER();

if($login->is_loggedin()!="")
{
?>

<a href="logout.php?logout=true" class="btn btn-default"><i class="fa fa-sign-out"></i>Se déconnecter</a>

<?php
} else {
    $login->redirect('index.php');
}
?>