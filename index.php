<?php require 'Function/functions.php';
$barang = query("SELECT * FROM barang");
// if(isset($_POST["cari"])){
//         $barang = cari($_POST["keyword"]);
// }
?>
<!DOCTYPE html>
<html>
<head>
<title>Halaman Admin</title>
</head>
<body>
<h1>Daftar Barang</h1>
<a href="CRUD/tambah.php">Tambah Data</a><br><br>
<!-- <form action="" method="POST">
        <input type="text" name="keyword" size="20" autofocus placeholder="Masukkan Keyword Pencarian" autocomplete="off">
        <button type="submit" naame="cari">Cari</button>
</form> -->
<br><br>
        <table border="1", cellpadding="10",cellspacing="0">
        <tr>
        <th>No.</th>
        <th>Nama</th>
        <th>Harga</th>
        <th>Jumlah</th>
        <th>Gambar</th>
        <th>Aksi</th>
        </tr>
        <?php $i=0;?>
        <?php foreach($barang as $row) :?>
        <?php $i++;?>
        <tr>
        <td><?= $i;?></td>
        <td><?= $row["Nama"]?></td>
        <td>Rp.<?= $row["Harga"]?></td>
        <td><?= $row["Jumlah"]?></td>
        <td><img src="img/<?= $row["Gambar"] ?>" width="50"></td>
        <td>
        <a href="CRUD/ubah.php?id=<?= $row["Id"] ?>">Update</a>
        <a href="CRUD/hapus.php?id=<?= $row["Id"] ?>" onclick="return confirm('Yakin ingin menghapus?');">Delete</a>
        </td>
        </tr>
        <?php endforeach;?>
        </table>
</body>
</html>