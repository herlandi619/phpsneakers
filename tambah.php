<?php
require 'functions.php';

//cek apakah tombol submit sudah dipencet atau belum??
//2.cek apakah tombol submit sudah dipencet
if (isset($_POST["submit"])) {


    //cek apakah data berhasil atau tidak
    if (tambah($_POST) > 0) {
        echo "
        <script>
        alert('Data berhasil ditambahkan');
        document.location.href = 'index.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Data gagal ditambahkan');
        document.location.href = 'index.php';
        </script>
        ";
    }

}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Pemesanan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        label {
            display: block;
        }
    </style>
</head>

<body class="bg-slate-700 w-full">
    <!-- <img src="img/bg.png" class="w-full h-screen absolute object-cover -z-10"> -->

    <h1 class="text-4xl font-bold text-slate-200 pt-5 text-center ">Daftar Pemesanan</h1>

    <form action="" method="post" enctype="multipart/form-data" class=" w-full text-white mx-auto bg-slate-300 ">
        <ul class="text-lg py-5 font-semibold ">
            <li class="mx-auto w-1/2">
                <label for="nama">Nama :</label>
                <input type="text" name="nama" id="nama" placeholder="Masukan Nama" width="50" required>
            </li>
            <li class="mx-auto w-1/2">
                <label for="email">Email :</label>
                <input type="text" name="email" id="email" placeholder="Masukan Email" required>
            </li>
            <li class="mx-auto w-1/2">
                <label for="telepon">No Telepon :</label>
                <input type="text" name="telepon" id="telepon" placeholder="Masukan No Telepon" required>
            </li>



            <li class="mx-auto w-1/2">
                <label for="jenis">Jenis : RH / BS / BM</label>
                <input type="text" name="jenis" id="jenis" placeholder="Masukan Jenis Barang" required>
            </li>

            <li class="mx-auto w-1/2">
                <label for="ukuran">Ukuran : 40 - 41 - 42 </label>
                <input type="text" name="ukuran" id="ukuran" placeholder="Masukan Ukuran" required>
            </li>
            <li class="mx-auto w-1/2">
                <label for="alamat">Alamat :</label>

                <input type="text" name="alamat" id="alamat" placeholder="Masukan Alamat" required>
            </li>
            <li class="mx-auto w-1/2">
                <label for="foto">Bukti Pembayaran :</label>
                <input type="file" name="foto" id="foto">
            </li>


            <li class="mx-auto w-1/2 pt-4">
                <button type="submit" name="submit"
                    class="bg-slate-900 w-20 p-2 rounded-lg shadow-lg text-slate-200 hover:scale-105 duration-300">Daftar</button>
            </li>




        </ul>
    </form>
    <div class="p-20 mx-auto hover:opacity-50 duration-300">
        <a href="login.php" class="text-slate-900 mx-auto font-semibold bg-slate-400 p-5 rounded-full ">Login</a>
    </div>

</body>

</html>