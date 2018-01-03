<?php

require_once 'function/db.php';	
//require_once 'function/login-check.php';
require_once 'function/function.php';
require_once 'stats.php';
include 'smarty.php';
include 'conect.php';
include 'navbar.php';

        session_set_cookie_params (0); 
        session_start();
require_once 'db.php';
$conn = mysql_connect($dbhost,$dbuser,$dbpass)
        				or die ('Error connecting to mysql');
        			mysql_select_db($dbname);
$query = sprintf("SELECT id FROM users WHERE UPPER(username) = UPPER('%s')",
			mysql_real_escape_string($_SESSION['username']));
$result = mysql_query($query);
list($userID) = mysql_fetch_row($result);


if($_GET['status'] == 'maintenance'){
    $smarty->assign('error','Erreur: Serveurs en cours de maintenance.');
}


if(!$userID) {

        	if($_POST) {
        		if($_POST['action'] == 'login') {
        		    
        		    $filename = 'function/maintenance/maintenance.txt';

                    if (file_exists($filename) && $_POST['username'] != 'Administrateur') {
                        $smarty->assign('error','Erreur: Serveurs en cours de maintenance.');
                    } else {

                			require_once 'db.php';
                			$username = $_POST['username'];
                			$password = $_POST['password'];		
                			$conn = mysql_connect($dbhost,$dbuser,$dbpass)
                				or die ('Error connecting to mysql');
                			mysql_select_db($dbname);
                			mysql_query("SET NAMES 'utf8'", $conn);
                
                			$query = sprintf("SELECT COUNT(id) FROM users WHERE UPPER(username) = UPPER('%s') AND password='%s'",
                				mysql_real_escape_string($username),
                				mysql_real_escape_string(md5($password)));
                			$result = mysql_query($query);
                			list($count) = mysql_fetch_row($result);
                			if($count == 1) {
                				$_SESSION['authenticated'] = true;
                				$_SESSION['username'] = $username;
                				$query = sprintf("UPDATE users SET last_login = NOW() WHERE UPPER(username) = UPPER('%s') AND password = '%s'",
                					mysql_real_escape_string($username),
                					mysql_real_escape_string(md5($password)));
                				mysql_query($query);
                				$query = sprintf("SELECT is_admin FROM users WHERE UPPER(username) = UPPER('%s') AND password='%s'",
                					mysql_real_escape_string($username),
                					mysql_real_escape_string(md5($password)));
                				$result = mysql_query($query);
                				list($is_admin) = mysql_fetch_row($result);
                				$smarty->assign('error','');
                				if($is_admin == 1 && file_exists($filename)) {
                					header('Location:admin.php');			
                				} else {
                					header('Location:MainGame.php');				
                				}
                			} else {
                					$smarty->assign('error','Erreur: Identifiants/mot de passe incorrect.');
                			}
                    }
        		} else if($_POST['action'] == 'register') {
        			$password = $_POST['password'];
        			$confirm = $_POST['confirmpassword'];	
        			if($password != $confirm) {				
        			$errormessage='Les password ne correspondent pas.';
        			} else {
                        if(preg_match("/^[a-zA-Z0-9]+$/",$_POST['username'])){
            				require_once('db.php');	
            				$conn = mysql_connect($dbhost,$dbuser,$dbpass)
            					or die ('Error connecting to mysql');
            				mysql_select_db($dbname);
            				
            				$query = sprintf("SELECT COUNT(id) FROM users WHERE UPPER(username) = UPPER('%s')",
            					mysql_real_escape_string($_POST['username']));
            				$result = mysql_query($query);
            				list($count) = mysql_fetch_row($result);
            				if($count >= 1) {
            					$errormessage="Ce user existe déjà. Merci d'en choisir un autre."; 
            				} else {				
            					$email = $_POST['email'];
            					$query = sprintf("SELECT COUNT(id) FROM users WHERE UPPER(email) = UPPER('%s')",
            						mysql_real_escape_string($_POST['email']));
            					$result = mysql_query($query);
            					list($count) = mysql_fetch_row($result);
            					if($count >= 1) {
            						$errormessage="Cette email est déjà enregistré. Si vous avez oublié votre mot de passe clique <a href='#'>ici</a>."; 
            					} else {
            						$query = sprintf("INSERT INTO users(username,password,email) VALUES ('%s','%s','%s');",
            						mysql_real_escape_string($_POST['username']),
            						mysql_real_escape_string(md5($password)),
            						mysql_real_escape_string($email));
            						mysql_query($query);
            						$userID = mysql_insert_id($conn);
            						$name = $_POST['username'];
            						
            						date_default_timezone_set('Etc/UTC');
            
            						require_once 'function/PHPMailerAutoload.php';
            
            
            						$mail = new PHPMailer();
            						$mail->setFrom('webmaster@haishin.fr', 'Haishin');
            						$mail->addAddress($email, $name);
            						$mail->Subject = 'Inscription au jeu Haishin.fr';
            						$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
            						$mail->AltBody = 'This is a plain-text message body';
            						$mail->Body = "<p>Hey! Bienvenue parmis nous sur haishin.fr ! Clique sur le lien ci-dessous pour confirmer ton adresse mail.</p>
            						<p><a href='http://www.haishin.fr/confirm.php?email=$email'>Valider cette adresse mail</a></p>";
            
            						$mail->send(); 
            						setStat('atk',$userID,'5');
            						setStat('def',$userID,'5');			
            						setStat('mag',$userID,'5');
            						setStat('pa',$userID,'10');
            						$errormessage="Félicitation! Tu viens de recevoir un mail contenant le lien pour confirmer ton compte. Clique sur le lien pour valider ton compte avant de te connecter."; 
            					}
            				}
        			    } else {
        			        	$errormessage="Uniquement des chiffres et lettres dans le username !";
        			    }
        			}	
        			
        			$smarty->assign('errorregister',$errormessage);
        		}
        		
        	}
        	
        mysql_query("SET NAMES 'utf8'", $conn);
        	$query = sprintf("SELECT USERNAME,MESSAGE,DATE FROM discussion order by ID desc");
        $result = mysql_query($query);
        $message = array();
        while($row = mysql_fetch_assoc($result)) {
        	array_push($message,$row);
        }
        
        
        $smarty->assign('isConected',0); 
        $smarty->assign('message',$message); 
        $smarty->assign('nbUserOn',getUserOn());
        $smarty->assign('nbUserAll',getUserAll());
        $smarty->display('HeaderConnection.tpl');
        $smarty->display('login.tpl');
        $smarty->display('Footer.tpl');
} else {
	header('Location:../MainGame.php');	
}

?>

