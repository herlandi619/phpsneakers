<?php
require 'functions.php';

//ambil id data
$id = $_GET["id"];

//query data berdasarkan pemesanan
$pesan = query("SELECT * FROM pemesanan WHERE id = $id")[0];


//cek apakah tombol submit sudah dipencet atau belum??
//2.cek apakah tombol submit sudah dipencet
if (isset($_POST["submit"])) {


    //cek apakah data berhasil atau tidak
    if (ubah($_POST) > 0) {
        echo "
        <script>
        alert('Data berhasil diubah');
        document.location.href = 'index.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Data gagal diubah');
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
    <title>Ubah Data Pemesanan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        label {
            display: block;
        }
    </style>
</head>

<body class="bg-slate-300 w-full ">


    <h1 class="text-3xl font-bold text-center text-slate-800 pt-10">Ubah Daftar Pemesanan</h1>


    <form action="" method="post" enctype="multipart/form-data" class="mt-4 w-full bg-gradient-to-r from-slate-400 to-slate-300
         rounded-md shadow-lg mx-auto">
        <input type="hidden" name="id" value="<?= $pesan["id"]; ?>">
        <input type="hidden" name="fotoLama" value="<?= $pesan["foto"]; ?>">

        <ul class="grid gap-2 text-lg py-5 font-semibold ">
            <li class="mx-auto w-3/4">
                <label for="nama">Nama :</label>
                <input type="text" name="nama" id="nama" required value="<?= $pesan["nama"]; ?>">
            </li>
            <li class="mx-auto w-3/4">
                <label for="email">Email :</label>
                <input type="text" name="email" id="email" required value="<?= $pesan["email"]; ?>">
            </li>
            <li class="mx-auto w-3/4">
                <label for="telepon">No Telepon :</label>
                <input type="text" name="telepon" id="telepon" required value="<?= $pesan["telepon"]; ?>">
            </li>



            <li class="mx-auto w-3/4">
                <label for="jenis">Jenis : RH / BS / BM</label>
                <input type="text" name="jenis" id="jenis" required value="<?= $pesan["jenis"]; ?>">
            </li>

            <li class="mx-auto w-3/4">
                <label for="ukuran">Ukuran : 40 - 41 - 42 </label>
                <input type="text" name="ukuran" id="ukuran" required value="<?= $pesan["ukuran"]; ?>">
            </li>
            <li class="mx-auto w-3/4">
                <label for="alamat">Alamat :</label>
                <input type="text" name="alamat" id="alamat" required value="<?= $pesan["alamat"]; ?>">

            </li>
            <li class="mx-auto w-3/4">
                <label for="foto">Bukti Pembayaran :</label><br>
                <img src="img/<?= $pesan["foto"] ?>" width="50"><br>
                <input type="file" name="foto" id="foto">
            </li>


            <li class="mt-10 mx-auto w-3/4">
                <button type="submit" name="submit"
                    class="bg-slate-800 w-20 h-8 rounded-md text-gray-200 text-sm hover:scale-105 duration-300">Ubah</button>
            </li>


        </ul>
    </form>

</body>

</html>