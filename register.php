<?php
session_start();
session_destroy();
$error = '';
$hasil = false;
if (!empty($_POST)) {
    $pdo = require 'koneksi.php';
    if ($_POST['password'] != $_POST['password2']) {
        $error = 'password tidak sama';
    } else if (strlen($_POST['password']) < 6) {
        $error = 'password harus lebih dari 6 karakter';
    } else {
        $sql = 'select count(*) from users where email = :emailUser';
        $query = $pdo->prepare($sql);
        $query->execute(array('emailUser' => $_POST['email']));
        $count = $query->fetchColumn();
        if ($count > 0) {
            $error = 'Email sudah terdaftar';
        } else {
            $sql = 'insert into users (nama, email, password) values (:nama, :email, :password)';
            $query2 = $pdo->prepare($sql);
            $query2->execute(array(
                'nama' => $_POST['nama'],
                'email' => $_POST['email'],
                'password' => sha1($_POST['password'])
            ));
            $hasil = true;
            
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>
    body {
        margin: 0;
        padding: 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: url(windows.png) no-repeat;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .kepala {
        background: transparent;
        backdrop-filter: blur(20px);
        padding: 40px 30px;
        border-radius: 13px;
        border: solid 1px rgba(255, 255, 255, 0.4);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
        width: 100%;
        max-width: 400px;
        box-sizing: border-box;
    }

    .kepala h2 {
        text-align: center;
        margin-bottom: 30px;
        color: rgb(238, 227, 227);
    }

    .kolom {
        position: relative;
        margin-bottom: 20px;
    }

    .kolom input[type="text"],
    .kolom input[type="email"],
    .btn {
        color: white;
        width: 100%;
        padding: 12px 10px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 8px;
        outline: none;
        box-sizing: border-box;
        background: transparent;
    }

    .kolom input[type="password"] {
        color: white;
        width: 100%;
        padding: 12px 10px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 8px;
        outline: none;
        box-sizing: border-box;
        background: transparent;
    }

    .kolom input:focus+span,
    .kolom input:valid+span {
        top: -20px;
        left: 0px;
        font-size: 15px;
        color: #ededed;
        background: transparent;

    }

    .kolom span {
        position: absolute;
        left: 12px;
        top: 12px;
        padding: 0 5px;
        color: #fffbfb;
        transition: 0.3s ease;
        pointer-events: none;
    }

    .btn {
        background-color: #0923b7;
        color: white;
        border: none;
        cursor: pointer;
        transition: background 0.3s;
    }

    .btn:hover {
        background-color: #6373e0;
    }

    p {
        text-align: center;
        margin-top: 15px;
        color: #ffffff;
    }

    p .login {
        color: #91eef6;
        text-decoration: none;
    }
    .sukses{
        color: greenyellow;
    }
    .error{
        color: red;
    }
</style>

<body>
    <div class="kepala">
        <form action="" method="post">
            <h2>Daftar</h2>
            <?php
            if($hasil == true) { ?>
                <p class="sukses">Email berhasil terdaftar</p>
            <?php }
            ?>
            <?php 
            if($error != '') {
                echo '<p class="error">'. $error .'</p>';
            } ?>
            <div class="kolom">
                <input type="text" name="nama" required />
                <span>username</span>
            </div>
            <div class="kolom">
                <input type="email" name="email" required />
                <span>email</span>
            </div>
            <div class="kolom">
                <input type="password" name="password" required />
                <span>buat password</span>
            </div>
            <div class="kolom">
                <input type="password" name="password2" required />
                <span>masukan ulang password</span>
            </div>
            <div class="kolom">
                <button class="btn" type="submit">Buat Email</button>
            </div>
            <p>Sudah memiliki akun? <a href="login.php" class="login">Masuk</a></p>
        </form>
    </div>
</body>

</html>