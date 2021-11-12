<?php

include ("function.php");

if(isset($_COOKIE['email']) and isset($_COOKIE['token'])){
	$email = $_COOKIE['email'];
	$token = $_COOKIE['token'];

	if(verify_session($email, $token,$conn)){
		header("Location:cover.php");
	}else{
    header("Location:sigin.php");
  }
}
// else{
//   header("Location:sigin.php");
// }

?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.80.0">
    <title>SignUp</title>

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


    
  <form action="auth.php" method="POST" autocomplete="on" >
  <?php
  $page='signup';
  ?>
    <img class="mb-4"  src="bootstrap-logo.svg" alt="" width="72" height="72">
    <h1 class="h3 mb-3 fw-normal alert alert-secondary">Signup to get your Ticket:)</h1>
    <?php
    if(isset($_GET['error']) && $_GET['error']=="userexist"){
      ?>
      <div class="alert alert-danger">
      <strong>User Exist! <a href="signin.php">Try Signin</a>"</strong>
      </div>
      <?php
    }
    ?>
    <?php
    if(isset($_GET['error']) && $_GET['error']=="usernametaken"){
      ?>
      <div class="alert alert-danger">
      <strong>Username Taken</strong>
      </div>
      <?php
    }
    ?>
    <?php
    if(isset($_GET['success']) && $_GET['success']==1){
      ?>
      <div class="alert alert-success">
      <strong>Succes Signin to Enter! <a href="signin.php">Signin</a></strong>
      </div>
      <?php
    }
    ?>
    <label for="inputusername" class="visually-hidden">Username</label>
    <input type="text" name="Username" id="inputname" class="form-control" placeholder="Username" required autocomplete="on" required autofocus>
    <label for="inputEmail" class="visually-hidden">Email address</label>
    <input type="email" name="Email" id="inputEmail" class="form-control" placeholder="Email address"  required autocomplete="on" required autofocus>
    <label for="inputPassword" class="visually-hidden">Password</label>
    <input type="password" name="Pass" id="inputPassword" class="form-control" placeholder="Password" required>
    <div class="checkbox mb-3" name="check" value=1>
      
    </div>
    <button class="w-100 btn btn-lg btn-primary" name='type' type="submit" value="signup" >Sign Up</button><br/>
    <a href="signin.php">
    <button class="mt-1 w-100 btn btn-lg btn-success" type="button">Sign In</button>

    <script>console.log("Hello! I am an alert box!!");</script>
    </a>
    
    <p class="mt-5 mb-3 text-muted">&copy;2020–2021 HackerX Foundation</p>

  </form>
</main>


    
  </body>
</html>
