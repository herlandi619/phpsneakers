<?php
//menghubungkan kedata base
//koneksi data ke data base
$conn = mysqli_connect("localhost", "root", "", "sneakers");
//
function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}
//menghubungkan kedata base//

function tambah($data)
{

    global $conn;
    //ambil data dari tiap element pada form
    $nama = htmlspecialchars($data["nama"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $email = htmlspecialchars($data["email"]);
    $telepon = htmlspecialchars($data["telepon"]);
    $jenis = htmlspecialchars($data["jenis"]);
    $ukuran = htmlspecialchars($data["ukuran"]);

    //upload gambar
    $foto = upload();
    if (!$foto) {
        return false;
    }

    //query insert data
    $query = "INSERT INTO pemesanan 
     VALUES
        ('','$nama','$email','$telepon','$foto','$jenis','$ukuran','$alamat')
        ";
    mysqli_query($conn, $query);


    return mysqli_affected_rows($conn);

}

function upload()
{
    $namaFile = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpName = $_FILES['foto']['tmp_name'];

    //cek apakah tidak ada gambar yang Diupload?
    if ($error === 4) {
        echo "<script>
            alert('Masukan Gambar Terlebih Dahulu!');    
        </script>";
        return false;
    }

    //cek apakah yang diupload apakah gambar ??
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
                    alert('File Bukan Berupa Gambar!');    
                </script>";
        return false;
    }

    //jika ukuran terlalu besar
    if ($ukuranFile > 1000000) {
        echo "<script>
                    alert('Ukuran Gambar Terlalu Besar!!');    
                </script>";
        return false;
    }

    $namaFileBaru = uniqid();
    $namaFileBaru .= ".";
    $namaFileBaru .= $ekstensiGambar;


    //jika gambar lolos pengecekan , gambar siap diupload
    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
    return $namaFileBaru;
}




function hapus($id)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM pemesanan WHERE id = $id");

    return mysqli_affected_rows($conn);
}

function ubah($data)
{

    global $conn;
    //ambil data dari tiap element pada form
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $email = htmlspecialchars($data["email"]);
    $telepon = htmlspecialchars($data["telepon"]);
    $jenis = htmlspecialchars($data["jenis"]);
    $ukuran = htmlspecialchars($data["ukuran"]);
    $fotoLama = htmlspecialchars($data["fotoLama"]);

    //cek apakah user pilih gambar lama atau yang baru ??
    if ($_FILES["foto"]["error"] === 4) {
        $foto = $fotoLama;
    } else {
        $foto = upload();
    }


    //query insert data
    $query = "UPDATE pemesanan SET
            nama = '$nama',
            alamat = '$alamat',
            email = '$email',
            telepon = '$telepon',
            jenis = '$jenis',
            ukuran = '$ukuran',
            foto = '$foto'
            WHERE id = $id
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}

function cari($keyword)
{
    $query = "SELECT * FROM pemesanan
        WHERE 
        nama LIKE '%$keyword%' OR
        alamat LIKE '%$keyword%' OR
        email LIKE '%$keyword%' OR
        telepon LIKE '%$keyword%' OR
        jenis LIKE '%$keyword%' OR
        ukuran LIKE '%$keyword%'
    ";

    return query($query);
}

function registrasi($data)
{
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $email = strtolower(stripslashes($data["email"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    //username sudah ada apa belum??
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                    alert('username udah diPAKE!!!!');
                </script>";

        return false;
    }

    //cek konfirmasi password
    if ($password !== $password2) {
        echo "<script>
                    alert('Password Kaga Sama !!');
                </script>";
        return false;
    }


    //ekripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //masuka user baru ke data base
    mysqli_query($conn, "INSERT INTO user VALUES('','$username','$email','$password')");

    return mysqli_affected_rows($conn);
}






?>