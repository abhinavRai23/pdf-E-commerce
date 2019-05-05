<?php
    include "includes/header.php";
?>

<div class="container-fluid" style="background-color: #ccc;">
  <div class="container" style="height:90vh;">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-login ">
          <div class="panel-body">
            <div class="row">
              <div class="col-lg-12">
                <form id="login-form" action="#" method="post" role="form" style="display: block;">
                  <h2>LOGIN</h2>
                  <div class="form-group">
                    <input type="text" name="username" id="username" tabindex="1" class="form-control"
                      placeholder="Username" value="">
                  </div>
                  <div class="form-group">
                    <input type="password" name="password" id="password" tabindex="2" class="form-control"
                      placeholder="Password">
                  </div>
                  <div class="col-xs-6 form-group pull-left checkbox">
                    <input id="checkbox1" type="checkbox" name="remember">
                    <label for="checkbox1">Remember Me</label>
                  </div>
                  <div class="col-xs-6 form-group pull-right">
                    <input type="submit" name="login-submit" id="login-submit" tabindex="4"
                      class="form-control btn btn-login" value="Log In">
                  </div>
                </form>
                <form id="register-form" action="#" method="post" role="form" style="display: none;">
                  <h2>REGISTER</h2>
                  <div class="form-group">
                    <input type="text" name="username" id="username" tabindex="1" class="form-control"
                      placeholder="Username" value="">
                  </div>
                  <div class="form-group">
                    <input type="email" name="email" id="email" tabindex="1" class="form-control"
                      placeholder="Email Address" value="">
                  </div>
                  <div class="form-group">
                    <input type="password" name="password" id="password" tabindex="2" class="form-control"
                      placeholder="Password">
                  </div>
                  <div class="form-group">
                    <input type="password" name="confirm-password" id="confirm-password" tabindex="2"
                      class="form-control" placeholder="Confirm Password">
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm-6 col-sm-offset-3">
                        <input type="submit" name="register-submit" id="register-submit" tabindex="4"
                          class="form-control btn btn-register" value="Register Now">
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-6 tabs">
                <a href="#" class="active" id="login-form-link">
                  <div class="login">LOGIN</div>
                </a>
              </div>
              <div class="col-xs-6 tabs">
                <a href="#" id="register-form-link">
                  <div class="register">REGISTER</div>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
    $(function() {
    $('#login-form-link').click(function(e) {
        $("#login-form").delay(100).fadeIn(100);
        $("#register-form").fadeOut(100);
        $('#register-form-link').removeClass('active');
        $(this).addClass('active');
        e.preventDefault();
    });
    $('#register-form-link').click(function(e) {
        $("#register-form").delay(100).fadeIn(100);
        $("#login-form").fadeOut(100);
        $('#login-form-link').removeClass('active');
        $(this).addClass('active');
        e.preventDefault();
    });

});
</script>

<?php
    include "includes/footer.php";
?>