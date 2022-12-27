<?php
require 'functions.php';

if(isset($_POST['register'])){
    if(registrasi($_POST)>0){
        echo"
            <script>
            alert('CREATE ACCOUNT SUCCESS');
            document.location.href='login.php';
            </script>";
    }else{
        echo mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>IMAGESTOCKS - Images Platform</title>

</head>
<body>
<style>
    body {
        background-color: black;
        font-family: 'Quicksand', Fallback, sans-serif;
    }
    @font-face {
        font-family: 'Quicksand';
        src: url('font/Quicksand-Regular.otf') format('woff2');
    }
    label{
        display:block;
        color: white;
    }
    .jumbotron{
        background-color: black;
        color: white;
    }
    hr{
        background-color: white; height: 1px; border: 0; 
    }
    h4, h6{
        color: white;
    }
    </style>
<div class="container mt-5">
    <div class="row">
    <div class="col-7">
        <div class="jumbotron">
            <h1 class="display-4">WELCOME TO IMAGESTOCKS</h1>
            <p class="lead">This is a simple images platform, <br>where you can find various photoshot images.</p>
            <hr class="my-4">
        </div>
    </div>
    <div class="col-5 mt-4">
        <form action="" method="post">
        <h4>SIGN-UP</h4>
                <label for="email">E-Mail :</label>
                <input type="text" name="email" id="email"><br><br>

                <label for="username">Username :</label>
                <input type="text" name="username" id="username"><br><br>

                <label for="password">Password :</label>
                <input type="password" name="password" id="password"><br><br>

                <label for="password2">Password Confirmation :</label>
                <input type="password" name="password2" id="password2"><br><br>

                <button type="submit" name="register" class="btn-login btn-primary">Submit</button><br>
        </form><br>
        <h6>Already have an account? <a href="login.php">Log-In</a> </h6>
    </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>
</body>
</html>