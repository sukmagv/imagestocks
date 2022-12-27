<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>IMAGESTOCKS - Images Platform</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body id="bg-login">
    <style>
            body {
                background-color: black;
                font-family: 'Quicksand', Fallback, sans-serif;
            }
            @font-face {
                font-family: 'Quicksand';
                src: url('font/Quicksand-Regular.otf') format('woff2');
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
    <div class="box-login">
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
                    <form action="" method="POST" class="mt-5">
                        <h4>LOG-IN</h4>
                        <input type="text" name="username" placeholder="Username" class="control-input"><br><br>
                        <input type="password" name="password" placeholder="Password" class="control-input"><br><br>
                        <input type="submit" name="submit" placeholder="Login" class="btn-login btn-primary"><br><br>
                    </form>
                    <h6>Didn't have an account? <a href="registrasi.php">Sign-Up</a> </h6>
                    
                    <?php
                        if(isset($_POST['submit'])){
                            session_start();
                            include 'db.php';

                            $username = $_POST['username'];
                            $password = $_POST['password'];

                            $cek = mysqli_query($conn, "SELECT * FROM user WHERE username = '".$username."' AND password = '".$password."'" );
                            if(mysqli_num_rows($cek) > 0){
                                $d = mysqli_fetch_object($cek);
                                $_SESSION['status_login'] = true;
                                $_SESSION['a_global'] = $d;
                                $_SESSION['id'] = $d ->id;
                                echo '<script>window.location="home.php"</script>';
                            }else{
                                echo '<script>alert("Username atau Password Anda salah")</script>';
                            }
                        }  
                    ?>
                </div>
                </div>
            </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>
</html>