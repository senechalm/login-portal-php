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
if (!isset($_SESSION['ErrorRegister'])) { $_SESSION['ErrorRegister'] = 'none'; }
if (!isset($_SESSION['Register'])) { $_SESSION['Register'] = 'none'; }

$smarty->assign('ErrorLogin',$_SESSION['ErrorLogin']);
$smarty->assign('ErrorRegister',$_SESSION['ErrorRegister']);
$smarty->assign('Register',$_SESSION['Register']);
/*$message = array();

$smarty->assign('isConected',0); 
$smarty->assign('message',$message); 
$smarty->assign('nbUserOn',1);
$smarty->assign('nbUserAll',200);
$smarty->assign('error','');*/

$smarty->display('Head-not-connected.tpl');
$smarty->display('Login.tpl');
$smarty->display('Footer.tpl');

?>