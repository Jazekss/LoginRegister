<?php
session_start();
error_reporting(E_ALL);
?>
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Rubik:400,700'>
<link rel="stylesheet" href="style.css" type="text/css"/>
<body>
<div class="form">
  <div class="tab-group">
    <form method="post">
      <?php if(!isset($_POST["signinTab"])) { ?>
        <button class="tab" name="signinTab" value="Sign Up">Sign In</button>
        <button class="tab inactive" name="signupTab" value="Sign In" disabled>Sign Up</button>
      <?php } else { ?>
        <button class="tab inactive" name="signinTab" value="Sign Up" disabled>Sign In</button>
        <button class="tab" name="signupTab" value="Sign In">Sign Up</button>
      <?php } ?>
    </form>
  </div>
  <div class="tab-content">
    <div class="exitBtn">
	    <?php if (isset($_SESSION["id"])) { ?>
        <a href="Include/logout.php"> ✖ </a><p>[ <?php echo $_SESSION["username"]; ?>]</p>
	    <?php } else { echo "need to sign in first"; } ?>
    </div>
		<?php if (isset($_POST["signupTab"])) { ?>
      <div class="login-register-form">
        <form class="signin_signup" action="Include/signup.php" method="post">
          <h1>Register</h1>
          <div class="content">
            <div class="input-field">
              <input type="text" name="username" placeholder="Username" autocomplete="nope">
            </div>
            <div class="input-field">
              <input type="password" name="password" placeholder="Password" autocomplete="nope">
            </div>
            <div class="input-field">
              <input type="password" name="password2" placeholder="Re-Password" autocomplete="nope">
            </div>
            <div class="input-field">
              <input type="email" name="email" placeholder="EMail" autocomplete="new-password">
            </div>
          </div>
          <div class="action">
            <button type="submitI" name="submit" class="button">Sign up</button>
          </div>
        </form>
      </div>
		<?php } else { ?>
      <div class="login-register-form">
        <form class="signin_signup" action="Include/signin.php" method="post">
          <h1>Login</h1>
          <div class="content">
            <div class="input-field">
              <input type="text" name="username" placeholder="Username" autocomplete="off">
            </div>
            <div class="input-field">
              <input type="password" name="password" placeholder="Password" autocomplete="off">
            </div>
          </div>
          <div class="action">
            <button type="submit" name="submit" class="button">Sign in</button>
          </div>
        </form>
      </div>
		<?php } ?>
  </div><!-- tab-content -->
</div> <!-- /form -->
</body>