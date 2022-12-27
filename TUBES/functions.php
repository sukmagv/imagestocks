<?php
include 'db.php';

$result = mysqli_query($conn, 'SELECT * FROM item;');

function query($query_kedua){
    global $conn;
    $result = mysqli_query($conn, $query_kedua);
    $rows=[];
    while($row=mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

function registrasi($data){
    global $conn;
    $email      = strtolower(stripcslashes($data['email']));
    $username   = strtolower(stripcslashes($data['username']));
    $password   = mysqli_real_escape_string($conn, $data['password']);
    $password2  = mysqli_real_escape_string($conn, $data['password2']);
    $result     = mysqli_query($conn,"SELECT username FROM user WHERE username='$username' OR email='$email'");

    if(mysqli_fetch_assoc($result)){
        echo"
            <script>
            alert('E-Mail atau Username sudah ada');
            </script>";
            return false;
    }

    if($password!==($password2)){
        echo"
            <script>
            alert('password anda tidak sama');
            </script>";
            return false;
    }

    // $password   = password_hash($password,PASSWORD_DEFAULT);

    mysqli_query($conn,"INSERT INTO user VALUES ('','$email','$username','$password')");
    return mysqli_affected_rows($conn);
}

// function edit($data){
//     global $conn;
//     $id         =$data["id"];
//     $email      =htmlspecialchars($data["email"]);
//     $username   =htmlspecialchars($data["username"]);
//     $password   =htmlspecialchars($data["password"]);

//     $query  ="UPDATE `user` SET 
//                 `email`='$email',
//                 `username`='$username',
//                 `password`='$password' 
//                 WHERE id='$id'";
//     mysqli_query($conn, $query);
//     return mysqli_affected_rows($conn);
// }

function cari($keyword){
    $sql="SELECT * FROM item
            WHERE
            judul LIKE '%$keyword%' OR
            credit LIKE '%$keyword%' OR
            tags LIKE '%$keyword%'";
    return $sql;
}

function bookmark ($data,$id){
    global $conn;
    // $id=($data["id"]);
    $judul=$_POST($data["judul"]);
    $gambar=$_POST($data["gambar"]);
    $credit=$_POST($data["credit"]);
    $tags=$_POST($data["tags"]);

    $query= "INSERT INTO mypin
                ('$iditem','$judulpin','$gambarpin','$creditpin','$tagspin')
                SELECT * FROM item
                WHERE id='$id'";
    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);

}
?>