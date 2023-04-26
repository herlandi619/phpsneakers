<?php

session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

//menghubungkan kedata base
require 'functions.php';

$pemesanan = query("SELECT * FROM pemesanan ORDER BY id DESC");
//menghubungkan kedata base//

//ketika button cari ditekan
if (isset($_POST["cari"])) {
    $pemesanan = cari($_POST["keyword"]);
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Pemesanan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="">
    <a href="logout.php" class="text-slate-200 p-2 bg-slate-500 rounded-lg">keluar</a>

    <h1 class="text-3xl font-bold text-center text-slate-800 pt-10">Tabel Pemesanan</h1>

    <div class="mt-5 p-3 ">
        <a href="tambah.php" class="p-2 text-md text-slate-200 bg-slate-500 rounded-lg ">Tambah Data</a>
    </div>

    <br><br>
    <form action="" method="post" class="p-5 border">
        <input type="text" name="keyword" autofocus placeholder="Masukan Data!" autocomplete="off">
        <button type="submit" name="cari" class="text-slate-200 bg-slate-500 p-2 rounded-lg">Cari!</button>
    </form>

    <br>

    <table border="1" cellspacing="0" cellpadding="10" class="border shadow-md mx-auto w-2/3">

        <tr class="border">
            <th>No</th>
            <th>Aksi</th>
            <th>Nama</th>
            <th>Email</th>
            <th>No Telepon</th>
            <th>Bukti Pembayaran</th>
            <th>Jenis Barang</th>
            <th>Ukuran</th>
            <th>Alamat</th>


        </tr>
        <?php $i = 1; ?>
        <?php foreach ($pemesanan as $row): ?>

            <tr>
                <td class="border">
                    <?= $i; ?>
                </td>
                <td class="border">
                    <a href=" ubah.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin ubah?');"
                        class="bg-green-300 p-2 px-5 rounded-md text-white shadow-md hover:opacity-75 duration-300">Ubah</a>
                    <div class="p-5"></div>
                    <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin hapus?');"
                        class="bg-red-300 p-2 px-4 rounded-md text-white shadow-md hover:opacity-75 duration-300">Hapus</a>
                </td>
                <td class="border">
                    <?= $row["nama"]; ?>
                </td>
                <td class=" border">
                    <?= $row["email"]; ?>
                </td>
                <td class="border">
                    <?= $row["telepon"]; ?>
                </td>
                <td class=" border"><img src="img/<?= $row["foto"]; ?>" width="50"></td>
                <td class="border">
                    <?= $row["jenis"]; ?>
                </td>
                <td class=" border">
                    <?= strtoupper($row["ukuran"]); ?>
                </td>
                <td class="border">
                    <?= $row["alamat"]; ?>
                </td>




            </tr>
            <?php $i++; ?>
        <?php endforeach ?>

    </table>


</body>

</html>