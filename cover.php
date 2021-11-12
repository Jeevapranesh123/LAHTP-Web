<?php

include "function.php";

if(isset($_COOKIE['email']) and isset($_COOKIE['token'])){

	$email = $_COOKIE['email'];
	$token = $_COOKIE['token'];

	if(verify_session($email, $token)){
    // header("Location:product.php");
	}
  else{
    header("Location:signin.php");
  }
}
else{
  header("Location:signin.php");
}
?>

<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.80.0">
    <title>Cover Template · Bootstrap v5.0</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/cover/">



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
    <link href="cover.css" rel="stylesheet">
  </head>
  <body class="d-flex h-100 text-center text-white bg-dark">
    
<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
  <header class="mb-auto">
    <div>
      <h3 class="float-md-start mb-0">Cover</h3>
      <nav class="nav nav-masthead justify-content-center float-md-end">
        <a class="nav-link active" aria-current="page" href="#">Home</a>
        <a class="nav-link" href="#">Features</a>
        <a class="nav-link" href="#">Contact</a>
      </nav>
    </div>
  </header>

  <main class="px-3">
    <h1>Coming Soon</h1>
    <p class="lead"></p>
    <p class="lead">
      <!-- <a href="#" class="btn btn-lg btn-secondary fw-bold border-white bg-white">Learn more</a> -->
    </p>
  </main>

  <footer class="mt-auto text-white-50">
    <!-- <p>Cover template for <a href="https://getbootstrap.com/" class="text-white">Bootstrap</a>, by <a href="https://twitter.com/mdo" class="text-white">@mdo</a>.</p>-->
    <p class="mt-5 mb-3 text-muted">&copy;2020–Present</p> HackerX Foundation</p>
  </footer>
</div>


    
  </body>
</html>