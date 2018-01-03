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
 
require_once 'db.php';		// our database settings
$conn = mysql_connect($dbhost,$dbuser,$dbpass)
	or die('Error connecting to mysql');
mysql_select_db($dbname);
$query = sprintf("SELECT id FROM users WHERE UPPER(username) = UPPER('%s')",
			mysql_real_escape_string($_SESSION['username']));
$result = mysql_query($query);
list($userID) = mysql_fetch_row($result);
if(!$userID) {
$errormessage = '';
$Clef = 'hYujeoPkefuin';
	if($_POST) {
		if($_POST['action'] == 'login') {
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
				if($is_admin == 1) {
					header('Location:admin.php');			
				} else {
					header('Location:MainGame.php');				
				}
			} else {
					$smarty->assign('error','Erreur: Identifiants/mot de passe incorrect.');
			}
		} else if($_POST['action'] == 'Envoyer') {
			$password = $_POST['password'];
			$confirm = $_POST['confirmpassword'];	
			if(($password != $confirm) || (strlen($_POST['username']) > 15)) {
			    if($password != $confirm){
			$errormessage='Les password ne correspondent pas.';
			    } else {
			        $errormessage="Le nom d'utilisateur est trop long.";
			    }
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
    					        if ($_FILES['avatar']['name'] != ''){
                                        $dossier = 'image/avatar/';
                                        $fichier = basename($_FILES['avatar']['name']);
                                        $taille_maxi = 2000000;
                                        $taille = filesize($_FILES['avatar']['tmp_name']);
                                        $extensions = array('.png', '.gif', '.jpg', '.jpeg');
                                        $extension = strrchr($_FILES['avatar']['name'], '.'); 
                                        if(!in_array($extension, $extensions)) 
                                        {
                                             $erreur = 'Vous devez uploader une image (png, gif, jpg, jpeg)';
                                        }
                                        if($taille>$taille_maxi)
                                        {
                                             $erreur = 'Le fichier est trop gros...';
                                        }
                                        if(!isset($erreur)) 
                                        {
                                             
                                             $fichier = strtr($fichier, 
                                                  'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
                                                  'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
                                             $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
                                             $fichier = $_POST['username'] . '_' . 'avatar' . $extension;
                                             if(move_uploaded_file($_FILES['avatar']['tmp_name'], $dossier . $fichier)) 
                                             {
                                                 $filename = $_FILES['avatar']['name'];
                                                  $errormessage = 'OK';
                                             }
                                             else 
                                             {
                                                  $errormessage = 'Echec de l\'upload !';
                                             }
                                        }
                                        else
                                        {
                                             echo $errormessage;
                                        }
    					        } else {
    					            $errormessage = 'OK';
    					        }
                                
                                if ($errormessage == 'OK'){
                                    
                                    $betakey = $_POST['betakey'];
                                    $email = $_POST['email'];
                                    
                                    $query = sprintf("SELECT count(*) FROM `BETATEST` WHERE `email` = '%s' and `KEY` = '%s' and isDristributed=1 and isUsed = 0",
					                mysql_real_escape_string($email),
					                mysql_real_escape_string($betakey));
				                    $result = mysql_query($query);
				                    list($isbetakeyvalid) = mysql_fetch_row($result);
                                    $querybetatest = $query;
                                    $resultquerybetatest = $result;
                                    if($isbetakeyvalid){
                                        
                                    if(!$fichier){
                                        $fichier = 'default_avatar.jpg';
                                    }
                                    $bytes = openssl_random_pseudo_bytes(5);
                                    $email_captcha   = bin2hex($bytes);
            						$query = sprintf("INSERT INTO users(username,password,password_vernam,email,email_captcha,avatar,classe) VALUES ('%s','%s','%s','%s','%s','%s','%s');",
            						mysql_real_escape_string($_POST['username']),
            						mysql_real_escape_string(md5($password)),
            						mysql_real_escape_string(Cryptage($password,$Clef)),
            						mysql_real_escape_string($email),
            						mysql_real_escape_string($email_captcha),
            						mysql_real_escape_string($fichier),
            						mysql_real_escape_string($_POST['classe']));
            						mysql_query($query);
            						$userID = mysql_insert_id($conn);
            						$name = $_POST['username'];
        if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $email)) // On filtre les serveurs qui rencontrent des bogues.
{
	$passage_ligne = "\r\n";
}
else
{
	$passage_ligne = "\n";
}
//=====Déclaration des messages au format texte et au format HTML.
$message_txt = "Hey " . $_POST['username'] . " !\n Bienvenue sur haishin.fr ! Copie le lien ci-dessous pour confirmer ton adresse mail.\n
            	http://www.haishin.fr/confirm.php?email=$email&email_captcha=$email_captcha'";
$message_html = "<html><head></head><body><p>Hey <b>" . $_POST['username'] . "</b>!<br> Bienvenue sur haishin.fr ! Clique sur le lien ci-dessous pour confirmer ton adresse mail.<br>
            						<a href='http://www.haishin.fr/confirm.php?email=$email&email_captcha=$email_captcha'>Valider cette adresse mail</a></p></body></html>";
//==========
 
//=====Création de la boundary
$boundary = "-----=".md5(rand());
//==========
 
//=====Définition du sujet.
$sujet = "Inscription au jeu Haishin.fr";
//=========
 
//=====Création du header de l'e-mail.
$header = "From: \"Haishin\"<webmaster@haishin.fr>".$passage_ligne;
$header.= "Reply-to: \"Haishin\" <webmaster@haishin.fr>".$passage_ligne;
$header.= "MIME-Version: 1.0".$passage_ligne;
$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
$headers = 'From: "Webmaster Haishin" <webmaster@haishin.fr>' . "\r\n" . 'Reply-To: webmaster@haishin.fr' . "\r\n" ;
$headers.= "MIME-Version: 1.0".$passage_ligne;
$headers.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
//==========
 
//=====Création du message.
$message = $passage_ligne."--".$boundary.$passage_ligne;
//=====Ajout du message au format texte.
$message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
$message.= $passage_ligne.$message_txt.$passage_ligne;
//==========
$message.= $passage_ligne."--".$boundary.$passage_ligne;
//=====Ajout du message au format HTML
$message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
$message.= $passage_ligne.$message_html.$passage_ligne;
//==========
$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
//==========
 
//=====Envoi de l'e-mail.
mail($email,$sujet,$message,$headers);
//==========

                                    If (($_POST['classe'] == 'guerrier')){
                                        setStat('atk',$userID,'5');
                						setStat('def',$userID,'5');			
                						setStat('mag',$userID,'2');
                						setStat('currpm',$userID,'40');			
                						setStat('maxpm',$userID,'40');
                                    } else if (($_POST['classe'] == 'mage')){
                                        setStat('atk',$userID,'3');
                						setStat('def',$userID,'2');			
                						setStat('mag',$userID,'5');
                                        setStat('currpm',$userID,'100');			
                						setStat('maxpm',$userID,'100');
                                    }
            						setStat('pa',$userID,'10');
            						setStat('maxhp',$userID,'10');
            						setStat('curhp',$userID,'10');
            						setStat('exp',$userID,'0');
            						setStat('exp_rem',$userID,'100');
            						setStat('lvl',$userID,'1');
            						
            						If (($_POST['classe'] == 'taijutsu')){
            						    setStat('taijutsu',$userID,'10');
            						    setStat('ninjutsu',$userID,'5');
            						    setStat('genjutsu',$userID,'5');
            						} else if (($_POST['classe'] == 'ninjutsu')){
            						    setStat('taijutsu',$userID,'5');
            						    setStat('ninjutsu',$userID,'10');
            						    setStat('genjutsu',$userID,'5');
            						} else {
            						    setStat('taijutsu',$userID,'5');
            						    setStat('ninjutsu',$userID,'5');
            						    setStat('genjutsu',$userID,'10');
            						}
            						
            						$errormessage="<font color='green'>Félicitation! Tu viens de recevoir un mail contenant le lien pour confirmer ton compte. Clique sur le lien pour valider ton compte avant de te connecter.</font>"; 
                                    } else {
                                        $errormessage="Tu n'es pas inscrit en tant que beta testeur !";
                                    }
                                }

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
$smarty->display('register.tpl');
$smarty->display('Footer.tpl');

} else {
    header('Location:../MainGame.php');
	$query = sprintf("UPDATE users SET last_activity = NOW() where id = '%s'",mysql_real_escape_string($userID));
	$result = mysql_query($query);
}
?>

