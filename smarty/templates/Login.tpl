    <div class="site-wrapper">

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

                {foreach from=$ErrorRegister key=message item=i}
                    {if $i neq 'none'}
                        <div class="alert alert-danger">
                            <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; {$i}
                        </div>
                    {/if}
                {/foreach}
				
                {if $Register eq 'true'}
                    <div class="alert alert-success">
                        <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; Success !
                    </div>
                {/if}

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

    </div>