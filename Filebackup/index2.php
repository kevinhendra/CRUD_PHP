<?php
$conn = new PDO("mysql:host=localhost;dbname=inventory","root","root");
$result = $conn->query("SELECT * FROM barang");

?>
<!DOCTYPE html>
<html>
<head>
<title>Halaman Admin</title>
</head>
<body>
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
        <?php while($row = $result->fetch(PDO::FETCH_ASSOC)) :?>
        <?php $i++;?>
        <tr>
        <td><?= $i;?></td>
        <td><?= $row["Nama"]?></td>
        <td>Rp.<?= $row["Harga"]?></td>
        <td><?= $row["Jumlah"]?></td>
        <td><img src="img/<?= $row["Gambar"] ?>" width="50"></td>
        <td>
        <a href="">Update</a>
        <a href="">Delete</a>
        </td>
        </tr>
        <?php endwhile;?>
        </table>
</body>
</html>