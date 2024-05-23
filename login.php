<?php
require 'koneksi.php';
if(isset($_POST["submit"])){
    $email =$_POST["email"];
    $password = $_POST["password"];
    $result = mysqli_query($conn, "SELECT * FROM db_user WHERE email ='$email'");
    $row = mysqli_fetch_assoc($result);
     if(mysqli_num_rows($result)>0){
        if($password == $row["password"]){
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            header("location: index.html");
        }else{
            echo
            "<script> alert('Password Anda Salah'); </script>";
        }  
    }else{
        echo
        "<script> alert('Pengguna Tidak Ditemukan'); </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form class="" action="" method="post" autocomplete="off">
        <label for="email">Email</label>
        <input type="text" name="email" id="email" placeholder="Masukkan Email Anda" size="5" class="form-input" required value=""/>
        <label for="password">Password</label>
        <input type="password" id="password" name="password"  required value=""/>
        <button type="submit" name="submit">Login</button>
    </form>

    <div class="bottom">
        <p>Lanjut Reservasi?
            <a href="reservasi.php">Reservasi Disini</a>
        </p>
    </div>
</body>
</html>