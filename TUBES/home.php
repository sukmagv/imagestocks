<?php
include 'functions.php';

$conn=mysqli_connect("localhost","root","","tubesweb");
$result = mysqli_query($conn, "SELECT * FROM item");

if(isset($_POST["cari"])){
    $result= mysqli_query($conn, cari($_POST["keyword"]));
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IMAGESTOCKS - Images Platform</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="gstyle.css">
</head>
<body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">IMAGESTOCKS</a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="home.php">home <span class="sr-only"></span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="mypin.php">my-pin</a>
                </li>
                <li>
                    <form class="form-inline my-2 my-lg-1" action="home.php" method="post">
                    <input class="form-control form-control-sm ml-sm-3 mr-sm-0" name="keyword" type="search" placeholder="search" aria-label="Search">
                    <button class="btn btn-dark btn-sm my-2 my-sm-0" name="cari" type="submit">
                        <span class="material-icons md-light">search</span>
                    </button>
                    </form>
                </li>
            </ul>
            <div class="nav-item dropdown">
                <a class="nav-link btn-dark dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                    <span class="material-icons">account_circle</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="user.php">my-account</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="logout.php">log-out</a>
                </div>
            </div>
        </div>
    </div>
    </nav>
    <br><br><br>

    <div class="container">
        <div class="row">
    <?php $i=1?>
    <?php while ($row = mysqli_fetch_assoc($result)):?>
            <div class="col-3">
                <figure class="figure">
                    <?= $i;?>
                    <a href="descimg.php?id=<?=$row["id"]?>">
                    <img src="img/<?php echo $row["gambar"]; ?>" class="figure-img img-fluid rounded"></a>
                    <figcaption class="figure-caption"><?= $row["judul"]; ?></figcaption>
                </figure>
            </div>
            <?php $i++ ?>
            <?php endwhile; ?>
        </div>
    </div>
    <br><br>

<button onclick="topFunction()" id="myBtn" title="Go to top">^</button>
<script>

	let mybutton = document.getElementById("myBtn");

	window.onscroll = function() {scrollFunction()};

	function scrollFunction() {
		if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
			mybutton.style.display = "block";
		} else {
			mybutton.style.display = "none";
		}
	}

	function topFunction() {
		document.body.scrollTop = 0;
		document.documentElement.scrollTop = 0;
	}
</script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    </body>
</html>