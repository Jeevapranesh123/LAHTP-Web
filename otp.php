<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.80.0">
    <title>OTP Verification</title>

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
  <form action="auth.php" method="Post" type="otp" autocomplete="on">
  <?php
  $page='otp';
  ?>
    <img class="mb-4" src="bootstrap-logo.svg" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">Enter your OTP</h1>
    <?php
    if(isset($_GET['error']) && $_GET['error']=="invalidotp"){
      ?>
      <div class="alert alert-danger">
      <strong>Invalid OTP</strong>
      </div>
      <?php
    }
    ?><?php
    if(isset($_GET['error']) && $_GET['error']=="invalidemail"){
      ?>
      <div class="alert alert-danger">
      <strong>Invalid Email</strong>
      </div>
      <?php
    }
    ?>
    <?php
    if(isset($_GET['resent']) && $_GET['resent']==1){
      ?>
      <div class="alert alert-primary">
      <strong>OTP Resent!</strong>
      </div>
      <?php
    }
    ?>
    <label for="inputemail" class="visually-hidden">Email address</label>
    <input type="email" id="inputEmail" name="Email" class="form-control" placeholder="Email address" required autofocus>
    <label for="inputotp" class="visually-hidden">OTP</label>
    <input type="otp" id="inputotp" name="otp" class="form-control" placeholder="OTP" required>
    <br>
    <button class="mt-1 w-100 btn btn-lg btn-success" name="type" type="submit" value="otp" >Verify</button>
    <p class="mt-5 mb-3 text-muted">&copy;2020–Present HackerX Foundation</p>
    </h1>
  </form>
</main>


    
  </body>
</html>
