<pre>
<?php
include_once 'function.php';
if(isset($_COOKIE['email']) and isset($_COOKIE['token'])){
	$email = $_COOKIE['email'];
	$token = $_COOKIE['token'];

	if(verify_session($email, $token,$conn)){
    printf("Verified");
    // die();
		header("Location:cover.php");
  }
  else{
    printf("Not Verified");
    // die();
  }
}
?>
</pre>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.80.0">
    <title>Signin</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">

    

    <!-- Bootstrap core CSS -->
<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
<main class="form-signin">
  <form action="auth.php" method="Post" >
  <?php
  $page='signin';
  ?>
    <img class="mb-4" src="bootstrap-logo.svg" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">Please Signin</h1>
    <?php
    if(isset($_GET['error']) && $_GET['error']=="invaliduser"){
      ?>
      <div class="alert alert-danger">
      <strong>Invalid User Please SignUp</strong>
      </div>
      <?php
    }
    ?>
    <?php
    if(isset($_GET['success']) && $_GET['success']=="userverified"){
      ?>
      <div class="alert alert-success">
      <strong>OTP Verfied Signin to Enter :)</strong>
      </div>
      <?php
    }
    ?>
    <?php
    if(isset($_GET['error']) && $_GET['error']=="badpass"){
      ?>
      <div class="alert alert-danger">
      <strong>Invalid Credentials</strong>
      </div>
      <?php
    }
    ?>
    <label for="inputEmail" class="visually-hidden">Email address</label>
    <input type="text" id="inputEmail" name="Email" class="form-control" placeholder="Email address" required >
    <label for="inputPassword" class="visually-hidden">Password</label>
    <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" name="check" value=1> Remember me
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" name='type' type="submit" value="signin" >Sign In</button><br/>
    <a href="index.php">
    <button class="mt-1 w-100 btn btn-lg btn-success" type="button">Sign Up</button>
    </a></a>
    <p class="mt-5 mb-3 text-muted">&copy;2020–Present</p> HackerX Foundation</p>
    </h1>
  </form>
</main>


    
  </body>
</html>