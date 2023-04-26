<?php
require 'functions.php';

if (isset($_POST["register"])) {
    if (registrasi($_POST) > 0) {
        echo "<script>
        alert('Data Telah dimasukan!!');
    </script>";

    } else {
        echo mysqli_error($conn);
    }


}





?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        label {
            display: block;
        }
    </style>
</head>

<body class="bg-slate-300 w-screen h-screen">
    <img src="img/bg2.jpg" class=" w-screen h-screen absolute object-cover -z-10">

    <h1 class="text-4xl font-bold text-slate-200 p-10 text-center ">Registrasi</h1>


    <form action="" method="post" class=" w-3/4 bg-gradient-to-r from-slate-400 to-slate-300
         rounded-md shadow-lg mx-auto">
        <ul class="grid gap-5 pt-10 pb-10 text-lg justify-center font-semibold">
            <li>
                <label for="username">Username :</label>
                <input type="text" name="username" id="username" placeholder="Masukan Username">
            </li>
            <li>
                <label for="email">Email :</label>
                <input type="text" name="email" id="email" placeholder="Masukan Email">
            </li>
            <li>
                <label for="password">Password :</label>
                <input type="password" name="password" id="password" placeholder="Masukan Password">
            </li>
            <li>
                <label for="password2">Konfirmasi Password :</label>
                <input type="password" name="password2" id="password2" placeholder="Konfirmasi Password">
            </li>
            <button type="submit" name="register"
                class="bg-slate-800 w-20 h-8 rounded-md text-gray-200 text-sm hover:scale-105 duration-300">Daftar</button>
        </ul>
    </form>
    <div class="p-10 hover:opacity-80 duration-300">
        <a href="login.php" class="text-slate-800 mx-auto bg-slate-200 p-3 rounded-full font-semibold ">Login</a>
    </div>
</body>

</html>