<?php /* Smarty version Smarty-3.1.17, created on 2017-12-29 13:49:02
         compiled from "smarty\templates\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:171635a4647ceacc6e5-15255255%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '403851c49ec8d5ed21288a7d0f969afa0c0aee93' => 
    array (
      0 => 'smarty\\templates\\login.tpl',
      1 => 1508943555,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '171635a4647ceacc6e5-15255255',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'error' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_5a4647ced95a53_78653478',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a4647ced95a53_78653478')) {function content_5a4647ced95a53_78653478($_smarty_tpl) {?><div id='MenuGame'>	
<div id='Left_Menu'>
<div id ='Connection'>
			<h1>connexion </h1>
			<?php if ($_smarty_tpl->tpl_vars['error']->value!='') {?>
				<p><font color="red"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</font></p>
			<?php }?>
				<form method="post" action="login.php">
				  <label for="login">Identifiant:</label><br>
				  <input type="text" name="username" id="login" autofocus><br>
				  <label for="password">Mot de passe:</label><br>
				  <input type="password" name="password" id="password" ><br>
				  <input type="submit" name="action" value="login" id="bouton" class='myButton'>
				  <p class="forgot-password"><a href="ForgetPassword.php">Mot de passe oublié ?</a></p>
				  <p class="register"><a href="register.php">S'enregistrer</a></p>
				</form>
</div>

</div>
<div id='clear'></div>
<div id ='Content'>
        <span id='InscriptionMobile'>
        <span class="InscriptionMobile"><a href="register.php" class='myButton'>Se connecter</a></span>
    </span>
    
        <span id='ConnexionMobile'>
        <span class="ConnexionMobile"><a href="register.php" class='myButton'>S'inscrire</a></span>
    </span>
    
    <center><b><h2>Bienvenue sur Haishin.fr !</h2></b></center><br>
    <div id='Content1'>
        <div id='Content1_Texte'>
                <div><p>Haishin.fr est un jeu en ligne qui mélange RPG et RPS. Vous devez dans un premier temps, vous entraîner à l'académie afin d'apprendre à maitriser l'art du combat. Une fois que vous aurez acquis l'expérience nécessaire, vous pourrez alors obtenir des missions.</p></div>
                
        </div>
        <div id='Content1_Image'>
                <img src='images/Village.png' id="Screen1">
        </div>
    </div>
    
    <hr>
    
    <div id='Content2'>
                
                        <div id='Content2_Image'>
                <img src='images/fight.PNG' id="Screen2">
        </div>
                
        <div id='Content2_Texte'>
            <div><p>Le système de combat se présente sous la forme d'un tour par tour aussi bien en affrontement en ligne, que contre les créatures rencontrées. Que vous soyez guerrier ou mage, entrez dans des combats immersifs. Récupérez ce que vous pouvez, tout est utile et vous permettra de construire vos armures/équipements.</p></div>
            </div>
            

    </div>
    
    <hr>
    
        <div id='Content3'>
        <div id='Content3_Texte'>
                <p>Equipez-vous des meilleures armes afin d'améliorer vos stats et ainsi vaincre les créatures les plus féroces. Les armes de base vous semblent trop classiques ? Construisez/Enchantez les vôtres !</p>
            </div>
            <div id='Content3_Image'>
                <img src='images/Capture_Ecrans_3.JPG' id="Screen3">
           </div>
    </div>







</div>
<div id='clear'></div>
  </div><?php }} ?>
