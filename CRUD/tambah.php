<?php
include '../Function/functions.php';
// cek tombol submit sudah di tekan atau belum
if(isset($_POST["submit"])){
        if(!empty(tambah($_POST))){
                echo '<script>alert("Berhasil Tambah Data");window.location="../index.php"</script>';
        }else{
                echo '<script>alert("Gagal menambah data.");window.location="../index.php"</script>';
        }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Tambah Data Barang</title>
</head>
<body>
        <h1>Tambah data barang</h1>
        <form action="" method="post">
        <ul>
        <li>
        <label for="nama">Nama : </label>
        <input type="text" name="nama" id="nama" required>
        </li>
        <li>
        <label for="harga">Harga : </label>
        <input type="number" name="harga" id="harga" min="0" required>
        </li>
        <li>
        <label for="jumlah">Jumlah : </label>
        <input type="number" name="jumlah" id="jumlah" min="0" required>
        </li>
        <li>
        <label for="gambar">Gambar : </label>
        <input type="text" name="gambar" id="gambar" required>
        </li>
        <li>
                <button type="submit" name="submit">Tambah Data</button>
        </li>
        </ul>
        </form>
</body>
</html>