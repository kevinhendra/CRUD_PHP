<?php
include '../Function/functions.php';

//ambil data di url
$id = $_GET["id"];
//query data berdasarkan id
$barang = query("SELECT * FROM barang WHERE Id = $id")[0];
if(isset($_POST['submit'])){
	// menangkap data post 
        if(!empty(edit($_POST))){
                echo '<script>alert("Berhasil Mengubah Data");window.location="../index.php"</script>';
        }else{
                echo '<script>alert("Gagal Mengubah data.");window.location="../index.php"</script>';
        }
        }
        

// // cek tombol submit sudah di tekan atau belum
// if(isset($_POST["submit"])){

//         if(!empty(edit($_POST))){
//                 echo '<script>alert("Berhasil mengubah Data");window.location="../index.php"</script>';
//         }else{
//                var_dump(edit($_POST));
//         }
// }
?>
<!DOCTYPE html>
<html>
<head>
<title>Update data Barang</title>
</head>
<body>
        <h1>Update data barang</h1>
        <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $barang["Id"]?>">
        <input type="hidden" name="gambarLama" value="<?= $barang["Gambar"]?>">
        <ul>
        <li>
        <label for="nama">Nama : </label>
        <input type="text" name="nama" id="nama" required value="<?= $barang["Nama"]?>">
        </li>
        <li>
        <label for="harga">Harga : </label>
        <input type="number" name="harga" id="harga" min="0" required value="<?= $barang["Harga"]?>">
        </li>
        <li>
        <label for="jumlah">Jumlah : </label>
        <input type="number" name="jumlah" id="jumlah" min="0" required value="<?= $barang["Jumlah"]?>"> 
        </li>
        <li>
        <label for="gambar">Gambar : </label>
        <input type="file" name="gambar" id="gambar">
        <br><br>
         <img src="../img/<?= $barang["Gambar"]?>" width="40">
        </li>
        <li>
                <button type="submit" name="submit">Ubah Data</button>
        </li>
        </ul>
        </form>
</body>
</html>