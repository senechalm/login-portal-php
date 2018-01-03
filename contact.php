<!-- CHECK LOGIN-->

<?php
session_start();

require_once("functions/class.user.php");
$login = new USER();

if($login->is_loggedin()!="")
{
	$login->redirect('MainGame.php');
}
?>

<!-- NOT LOGGED-->

<?php

include 'smarty.php';
if (!isset($_SESSION['ErrorLogin'])) { $_SESSION['ErrorLogin'] = 'none'; }

$smarty->assign('ErrorLogin',$_SESSION['ErrorLogin']);

$smarty->display('Head-not-connected.tpl');
$smarty->display('Contact.tpl');
$smarty->display('Footer.tpl');

?>