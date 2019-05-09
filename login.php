<?php
include "includes/header.php";

if( isset($_POST["email_id"]) && isset($_POST["password"]) && isset($_POST["username"]) && isset($_POST["contact_no"])){
  $email = mysql_entities_fix_string($db_server, $_POST["email_id"]);
  $password = mysql_entities_fix_string($db_server, $_POST["password"]);
  $username = mysql_entities_fix_string($db_server, $_POST["username"]);
  $contact_no = mysql_entities_fix_string($db_server, $_POST["contact_no"]);

  $query = "INSERT into user (username, password, email_id, contact_no) values ( '$username', '$password', '$email', '$contact_no')";
  $run = mysqli_query($db_server, $query);

  if (!$run) die(mysqli_error($db_server));
  echo "<alert>User Successfully Registered. Please Login!!</alert>";
  header("location:login.php");
}
else if (isset($_POST["email_id"]) && isset($_POST["password"])) {
  $email = mysql_entities_fix_string($db_server, $_POST["email_id"]);
  $password = mysql_entities_fix_string($db_server, $_POST["password"]);

  $query = "SELECT * FROM user WHERE email_id='$email' AND password='$password' AND user_type=0";
  $run = mysqli_query($db_server, $query);

  if (!$run) die(mysqli_error($db_server));
  $rows = mysqli_num_rows($run);
  if ($rows != 0) {
    for ($j = 0; $j < $rows; ++$j) {
      $row = mysqli_fetch_assoc($run);
    }
    session_start();
    $_SESSION = $row;
    header("location:index.php");
  }
  else{
    echo "<Center style='color:red;border-top:1px solid #ddd;'>*Wrong Email-id or Password.</Center>";
  }
}
?>


<div class="container-fluid" style="background-color: #ccc;">
  <div class="container" style="height:90vh;">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-login ">
          <div class="panel-body">
            <div class="row">
              <div class="col-lg-12">

                <form id="login-form" method="post" role="form" style="display: block;">
                  <h2>LOGIN</h2>
                  <div class="form-group">
                    <input type="text" name="email_id" tabindex="1" class="form-control" placeholder="Enter Email Id" value="" required>
                  </div>
                  <div class="form-group">
                    <input type="password" name="password" tabindex="2" class="form-control" placeholder="Password" required>
                  </div>
                  <!-- <div class="col-xs-6 form-group pull-left checkbox">
                    <input id="checkbox1" type="checkbox" name="remember">
                    <label for="checkbox1">Remember Me</label>
                  </div> -->
                  <div class="col-xs-6 form-group pull-right">
                    <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
                  </div>
                </form>

                <form id="register-form" action="#" method="post" role="form" style="display: none;">
                  <h2>REGISTER</h2>
                  <div class="form-group">
                    <input type="text" name="username" tabindex="1" class="form-control" placeholder="Username" value="" required>
                  </div>
                  <div class="form-group">
                    <input type="email" name="email_id" tabindex="1" class="form-control" placeholder="Email Address" value="" required>
                  </div>
                  <div class="form-group">
                    <input type="tel" maxlength="10" minlength="10" name="contact_no" tabindex="1" class="form-control" placeholder="Contact No" value="" required>
                  </div>
                  <div class="form-group">
                    <input type="password" name="password" tabindex="2" class="form-control" placeholder="Password" value="" required>
                  </div>
                  <div class="form-group">
                    <input type="password" name="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password" value="" required>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm-6 col-sm-offset-3">
                        <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
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