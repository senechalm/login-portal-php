<?php /* Smarty version Smarty-3.1.17, created on 2017-12-30 18:53:30
         compiled from "smarty\templates\Head-not-connected.tpl" */ ?>
<?php /*%%SmartyHeaderCode:305165a4648978b03b4-44584683%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fbef40684d489c38520e57f065afb82531f18e49' => 
    array (
      0 => 'smarty\\templates\\Head-not-connected.tpl',
      1 => 1514659999,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '305165a4648978b03b4-44584683',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_5a464897bff9c1_53883576',
  'variables' => 
  array (
    'ErrorLogin' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a464897bff9c1_53883576')) {function content_5a464897bff9c1_53883576($_smarty_tpl) {?><!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/images/favicon.ico">

    <title>Haishin</title>

    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="assets/css/cover.css" rel="stylesheet">
  </head>

  <body>

          <!-- Modal HTML -->
            <div id="LoginModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                    
                    <!-- Start Modal -->
                        <div class="modal-body">
                            
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-login">
                                        <div class="panel-heading">
                                            <div class="row">
                                                <div class="col-sm-4 col-sm-offset-4">
                                                    <h1>Login</h1>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                        
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <form id="login-form" action="login.php" method="post" role="form">

                                                        <?php if ($_smarty_tpl->tpl_vars['ErrorLogin']->value!='none') {?>
                                                            <div class="col-lg-12">
                                                                <div class="alert alert-danger">
                                                                    <strong>Oups !</strong> It seems that your username/password is incorrect.
                                                                </div>
                                                            </div>
                                                        <?php }?>
                                                        
                                                        <div class="form-group">
                                                            <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
                                                        </div>
                                                        
                                                        <div class="form-group text-center">
                                                            <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                                                            <label for="remember"> Remember Me</label>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="text-center">
                                                                        <a href="#" tabindex="5" class="forgot-password">Forgot Password?</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <!-- End modal-->
                    </div>
                </div>
            </div>
            <!-- End Modal HTML --><?php }} ?>
