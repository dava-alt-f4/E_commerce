<?php
session_start();
$hasil = true;
$error = '';
if (!empty($_POST)) {
    $pdo = require 'koneksi.php';
    $sql = "select * from users where email = :email";
    $query = $pdo->prepare($sql);
    $query->execute(array('email' => $_POST['email']));
    $user = $query->fetch();
    if (!$user) {
        $hasil = false;
    } elseif(sha1($_POST['password']) != $user['password']) {
        $hasil = false;
        $error = "Email atau password tidak ada";
    }else if($_POST['email'] != $user['email']){
        $hasil = false;
        $error = "Email atau password tidak ada";
    } else {
        $hasil = true;
        $_SESSION['user']= array(
            'id' => $user['id'],
            'nama' => $user['nama'],

        );
        header("Location: homepage.php");
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

    .kolom input[type="email"],
    button{
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

    button {
        background-color: #0923b7;
        color: white;
        border: none;
        cursor: pointer;
        transition: background 0.3s;
    }

    button:hover {
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
    .error{
        color: red;
    }
</style>

<body>
    <form action="" method="post">
        <div class="kepala">
            <h2>Login</h2>
            <?php if($hasil == false) { ?>
                <p class="error">Email atau password salah</p>
            <?php } ?>
            <div class="kolom">
                <input type="email" name="email" required />
                <span>email</span>
            </div>
            <div class="kolom">
                <input type="password" name="password" required />
                <span>password</span>
            </div>
            <div class="kolom">
                <button type="submit">Masuk</button>
            </div>
            <p>belum punya akun? <a href="register.php" class="login">Daftar</a></p>
    </form>
    </div>
</body>

</html>