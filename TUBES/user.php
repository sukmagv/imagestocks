<?php

session_start();
    include 'db.php';
    if($_SESSION['status_login'] != true){
        echo '<script>window.location="login.php"</script>';
    }

    $query = mysqli_query($conn, "SELECT * FROM user WHERE id = '".$_SESSION['id']."' ");
    $d = mysqli_fetch_object($query);

if(isset($_POST['edit'])){

    $email      = $_POST['email'];
    $username   = $_POST['username'];
    $password   = $_POST['password'];

    $update = mysqli_query($conn, "UPDATE user SET
                email     = '$email',
                username  = '$username',
                password  = '$password'
                WHERE id  = '$d->id'");
    if($update){
        echo"
        <script>
        alert('UPDATE DATA SUCCESS');
        document.location.href='user.php';
        </script>
        ";
    }else{
        echo"
        <script>
        alert('UPDATE DATA FAILED');
        document.location.href='user.php';
        </script>";
        echo "<br>";
        echo mysqli_error($conn);
        }
}

if(isset($_POST['delete'])){
    $delete=mysqli_query($conn,"DELETE FROM user WHERE id ='$d->id'");
    if($delete){
        echo"
        <script>
            alert('ACCOUNT DELETE SUCCESS');
            document.location.href='login.php';
        </script>
        ";
    }else{
        echo"
        <script>
            alert('ACCOUNT DELETE FAILED');
            document.location.href='user.php';
        </script>";
        echo "<br>";
        echo mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
            label, h4{
                color: white;
            }
        </style>
    <div class="container mt-5">
        <div class="row">
        <div class="col-md-4">
            <a href="home.php" class="btn-dark">
                <span class="material-icons float-left mr-3 mt-4">arrow_back_ios</span>
            </a>
            <img src="img/profil1.png" class="rounded mx-auto d-block w-75 mt-5" alt="...">
        </div>
        <div class="col-md-8">
            <form action="" method="POST">
                <div class="form-group">
                    <br>
                    <h4>MY ACCOUNT</h4>
                </div>
                <div class="form-group">
                    <label for="inputEmail">E-Mail</label>
                    <input type="text" name="email" value="<?php echo $d->email ?>" class="form-control">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputUsername4">Username</label>
                        <input type="text" name="username" value="<?php echo $d->username ?>" class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Password</label>
                        <input type="password" name="password" value="<?php echo $d->password ?>" class="form-control">
                    </div>
                </div>
                <br>
                <button type="edit" name="edit" class="btn btn-dark">Change</button>
                <button type="delete" name="delete" class="btn float-right btn-danger">Delete Account</button>
            </form>
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
  </body>
</html>