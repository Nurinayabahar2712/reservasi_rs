<?php
require 'koneksi.php';
if(isset($_POST["submit"])){
    $nama= $_POST["nama"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirmasipassword = $_POST["confirmasipassword"];
    $alamat = $_POST["alamat"];
    $usia = $_POST["usia"];
    $no_HP = $_POST["no_HP"];
    $jenis_kelamin = $_POST["jenis_kelamin"];
    $email = $_POST["email"];
    $duplicate = mysqli_query($conn, "SELECT * FROM db_user WHERE username = '$username' ");
    if(mysqli_num_rows($duplicate) > 0){
        echo
        "<script> alert('Username sudah digunakan');</script>";
    }else {
        if($password == $confirmasipassword){
            $query = "INSERT INTO db_user values('','$nama', '$username','$password', '$alamat', '$usia', ' $no_HP', '$jenis_kelamin', '$email' )";
            mysqli_query($conn,$query);
            echo
            "<script> alert('Registrasi berhasil')</script>";
        }else{
            echo
            "<script> alert('Password tidak cocok')</script>";
        }
    }


}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link rel="stylesheet" type="text/css" href= "registrasi.css" />
</head>
<body>
    <form class="" action="" method="post" autocomplete="off">
    <fieldset>
            <legend>Registrasi</legend>
            <div>
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" placeholder="Masukkan Nama Anda" size="5" class="form-input" required value=""/>
            </div>
            
            <div>
                <label for="username">Nomor KTP</label>
                <input type="text" id="username" name="username"  required value="" />
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" id="password" name="password"  required value=""/>
            </div>
            <div>
                <label for="confirmasipassword">Confirm Password</label>
                <input type="password" id="confirmasipassword" name="confirmasipassword" required value="">
            <div>
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" id="alamat"  required value="">
            </div>
            <div>
                <label for="usia">usia</label>
                <input type="text" name="usia" id="usia"  required value="">
            </div>
            <div>
                <label for="no_HP">Nomor_Handphone(WA)</label>
                <input type="text" name="no_HP" id="no_HP"  required value="">
            </div>
            <div>
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <div class="flex">
                    <input type="radio" name="jenis_kelamin" value="L" id="l"/> <span>Laki-Laki</span>
                    <input type="radio" name="jenis_kelamin" value="P" id="p"/> <span>Perempuan</span>
                </div> 
            </div>
            <div>
                <label for="email">Email</label>
                <input type="text" name="email" id="email" placeholder="contoh@gmail.com"  required value="">
            </div>
            <div>
                <button type="submit" name="submit">Registrasi</button>
            </div>
            
            <div class="bottom">
                <p>Lanjut Login?
                    <a href="login.php">Login Disini</a>
                </p>
            </div>
        </fieldset>
    </form>
   
</body>
</html>