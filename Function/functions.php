<?php
include 'koneksi.php';
function query($query){
        global $conn;
      $result = $conn->query($query);
      $rows=[];
      while($row = $result->fetch(PDO::FETCH_ASSOC)){
              $rows[] = $row;
      }
      return $rows;
}

function tambah($data){
        global $conn;
        //ambil data dari tiap element dalam form
        $nama = htmlspecialchars($data["nama"]);
        $harga = htmlspecialchars($data["harga"]);
        $jumlah = htmlspecialchars($data["jumlah"]);
        $gambar = htmlspecialchars($data["gambar"]);
         //memasukkan kedalam array
        $array[] = $nama;
	$array[] = $harga;
	$array[] = $jumlah;
	$array[] = $gambar;
        
        $query = "INSERT INTO barang (Nama,Harga,Jumlah,Gambar)
                        VALUES
                        (?,?,?,?)";
        $row = $conn->prepare($query);
        $row->execute($array);
       return $row->rowCount();
}
function hapus($id){
        global $conn;
        $conn->query("DELETE FROM barang WHERE Id = $id");
        return $conn;
}

function edit($data){
        global $conn;
        //ambil data dari tiap element dalam form
        $id = $data["id"];
        $nama = htmlspecialchars($data["nama"]);
        $harga = htmlspecialchars($data["harga"]);
        $jumlah = htmlspecialchars($data["jumlah"]);
        $gambar = htmlspecialchars($data["gambar"]);
         //memasukkan kedalam array
        $array[] = $nama;
	$array[] = $harga;
	$array[] = $jumlah;
        $array[] = $gambar;
        $array[] = $id;
        
        $query = "UPDATE barang SET
                Nama = ?,
                Harga = ?,
                Jumlah = ?,
                Gambar = ?
                WHERE Id = ?";
        $row = $conn->prepare($query);
        $row->execute($array);
       return $row->rowCount();
}

// function cari($keyword){
//         $query= "SELECT * FROM barang
//                 WHERE
//                 Nama = '$keyword'
//                 ";
//         return query($query);
// }
?>