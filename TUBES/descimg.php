<?php
$conn=mysqli_connect("localhost","root","","tubesweb");
$result = mysqli_query($conn, "SELECT * FROM item");

require 'functions.php';

session_start();
    include 'db.php';
    if($_SESSION['status_login'] != true){
        echo '<script>window.location="login.php"</script>';
    }

    $query = mysqli_query($conn, "SELECT * FROM user WHERE id = '".$_SESSION['id']."' ");
    $d = mysqli_fetch_object($query);


//     $query_dua = mysqli_query($conn, "SELECT * FROM item");
//     $dua = mysqli_fetch_object($query_dua);



?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>IMAGESTOCKS - Images Platform</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="">
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
            .card{
                background-color: black;
            }
            .card-body{
                color: white;
            }
        </style>
        
        <div class="card mb-3 mt-3" style="max-width: 100%;">
            <div class="row no-gutters">
            <?php
            if($_GET['id']){
                $item_id = mysqli_real_escape_string($conn, $_GET['id']);
                $query = "SELECT * FROM item WHERE id='$item_id' ";
                $query_run = mysqli_query($conn, $query);
                if(mysqli_num_rows($query_run) > 0){
                    $item = mysqli_fetch_array($query_run);
            ?>
            <div class="col-md-2">
                <a href="home.php" class="btn-dark">
                    <span class="material-icons float-right mr-3 mt-2">arrow_back_ios</span>
                </a>
            </div>
                <div class="col-md-4">
                    <img src="img/<?php echo $item["gambar"];?>" class="w-100" alt="...">
                </div>
                <div class="col-md-6">
                    <div class="card-body">
                        <h4 class="card-title"><?= $item["judul"]; ?></h4>
                        <p class="card-text">credit : <br><?= $item["credit"]; ?></p>
                        <p class="card-text">tags : <br><?= $item["tags"]; ?></p><br>
                        <a href="?id<?=$item["id"]?>"class="btn btn-dark" role="button" name="bookmark" type="bookmark">
                            <span class="material-icons">bookmark_border</span>
                            <?php
                            if(isset($_POST["bookmark"], $id)){
 
                                $id=($_POST["id"]);
                                $judul=htmlspecialchars($_POST["judul"]);
                                $gambar=htmlspecialchars($_POST["gambar"]);
                                $credit=htmlspecialchars($_POST["credit"]);
                                $tags=htmlspecialchars($_POST["tags"]);
                            
                                $bookmark = mysqli_query($conn, "INSERT INTO mypin ('iditem', 'judulpin', 'gambarpin', 'creditpin', 'tagspin') 
                                SELECT 
                                id = '$id', 
                                judul ='$judul', 
                                gambar ='$gambar', 
                                credit = '$credit', 
                                tags = '$tags' 
                                FROM item i WHERE i.id='$id';");
                                if($bookmark){
                                    echo"
                                    <script>
                                    alert('add to my-pin');
                                    document.location.href='descimg.php';
                                    </script>
                                    ";
                                }else{
                                    echo"
                                    <script>
                                    alert('add to my-pin failed');
                                    document.location.href='descimg.php';
                                    </script>";
                                    echo "<br>";
                                    echo mysqli_error($conn);
                                }
                            }
                            ?>
                        </a>
                        <!-- <a href="#" class="btn btn- dark" role="button">
                            <span class="material-icons">system_update_alt</span>
                        </a> -->
                    </div>
                </div>
            <?php
                }else{
                    echo "<h4>No Such Id Found</h4>";
                }
            }
            ?>
            </div>
        </div>
        

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    </body>
</html>