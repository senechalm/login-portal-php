<!doctype html>
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

                                                        {if $ErrorLogin neq 'none'}
                                                            <div class="col-lg-12">
                                                                <div class="alert alert-danger">
                                                                    <strong>Oups !</strong> It seems that your username/password is incorrect.
                                                                </div>
                                                            </div>
                                                        {/if}
                                                        
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
            <!-- End Modal HTML -->