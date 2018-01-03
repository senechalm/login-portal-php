<?php /* Smarty version Smarty-3.1.17, created on 2017-12-30 18:54:06
         compiled from "smarty\templates\Login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:187815a464897d564b7-86375192%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '89a6759124e22606e164facd677786e8fafa23b7' => 
    array (
      0 => 'smarty\\templates\\Login.tpl',
      1 => 1514660043,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '187815a464897d564b7-86375192',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_5a4648980081a1_75558656',
  'variables' => 
  array (
    'ErrorRegister' => 0,
    'i' => 0,
    'Register' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a4648980081a1_75558656')) {function content_5a4648980081a1_75558656($_smarty_tpl) {?>    <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">

          <header class="masthead clearfix">
            <div class="inner">
              <h3 class="masthead-brand">Haishin</h3>
              <nav class="nav nav-masthead">
                <a class="nav-link active" href="#">Home</a>
                <a class="nav-link" href="#" data-toggle="modal" data-target="#LoginModal">Login</a>
                <a class="nav-link" href="contact.php">Contact</a>
              </nav>
            </div>
          </header>

          <main role="main" class="inner cover register">
            <h1 class="cover-heading">Register page</h1>
            <form id="register-form" action="register.php" method="post" role="form">

                <?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->_loop = false;
 $_smarty_tpl->tpl_vars['message'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['ErrorRegister']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value) {
$_smarty_tpl->tpl_vars['i']->_loop = true;
 $_smarty_tpl->tpl_vars['message']->value = $_smarty_tpl->tpl_vars['i']->key;
?>
                    <?php if ($_smarty_tpl->tpl_vars['i']->value!='none') {?>
                        <div class="alert alert-danger">
                            <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $_smarty_tpl->tpl_vars['i']->value;?>

                        </div>
                    <?php }?>
                <?php } ?>
				
                <?php if ($_smarty_tpl->tpl_vars['Register']->value=='true') {?>
                    <div class="alert alert-success">
                        <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; Success !
                    </div>
                <?php }?>

                <div class="form-group">
					<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
				</div>
				<div class="form-group">
				    <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
				</div>
				<div class="form-group">
				    <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
				</div>
				<div class="form-group">
				    <input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password">
				</div>
				<div class="form-group">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3">
                            <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
                        </div>
                    </div>
				</div>
			</form>
          </main>

          <footer class="mastfoot">
            <div class="inner">
              <p>© 2017 <a href="https://www.morgansenechal.com">Morgan Sénéchal</a>, All Rights Reserved.</p>
            </div>
          </footer>

        </div>

      </div>

    </div><?php }} ?>
