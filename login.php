<?php

session_start();


if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}


require 'functions.php';


if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    //cek username
    if (mysqli_num_rows($result) === 1) {

        //cek pasword
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {

            //set session
            $_SESSION["login"] = true;

            header("Location: index.php");
            exit;
        }
    }

    $error = true;
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="/dist/output.css" rel="stylesheet">
    <style>
        label {
            display: block;
        }
    </style>
</head>

<body class="bg-slate-300 w-screen h-screen">
    <img src="img/w1.jpg" class=" w-screen h-screen absolute object-cover -z-10">

    <div>

        <h1 class="text-3xl font-bold text-center text-slate-200 pt-5">Login</h1>



        <?php if (isset($error)): ?>
            <p style="color: red;">Akun Belom Kedaftar cuk..</p>
        <?php endif ?>

        <form action="" method="post" class="mt-4 w-3/4 bg-gradient-to-r from-slate-500 to-slate-300
         rounded-md shadow-lg mx-auto">

            <ul class="grid gap-5 pt-10 pb-10 text-lg justify-center font-semibold">
                <li>
                    <label for="username">Username :</label>
                    <input type="text" name="username" class="rounded-lg pt-2" placeholder="Masukan Username">
                </li>
                <li>
                    <label for="email">Email :</label>
                    <input type="text" name="email" class="rounded-lg pt-2" placeholder="Masukan Email">
                </li>
                <li>
                    <label for="password">Password :</label>
                    <input type="password" name="password" class="rounded-lg pt-2" placeholder="Masukan Password">
                </li>
                <li class="text-center">
                    <button type="submit" name="login"
                        class="bg-slate-800 w-20 h-8 rounded-md text-gray-200 text-sm hover:scale-105 duration-300">Login</button>
                </li>
            </ul>

        </form>

        <div class="text-center pt-5 hover:opacity-80
         duration-300">
            <a href="registrasi.php" class="text-slate-200 bg-slate-900 p-2 rounded-lg
            ">Belum Punya akun?</a>
        </div>

        <div class="text-center pt-16">
            <p class="text-xs text-slate-200">@herlandi || PHP - Tailwindcss</p>
        </div>



    </div>
</body>

</html>