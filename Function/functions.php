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
        
        //upload gambar
        $gambar = upload();
        if(!$gambar){
                return false;
        }

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

function upload(){
        $namaFile = $_FILES['gambar']['name'];
        $ukuranFile = $_FILES['gambar']['size'];
        $error = $_FILES['gambar']['error'];
        $tmpName = $_FILES['gambar']['tmp_name'];

        //cek apakah tidak ada gambar
        if($error === 4){
                echo "<script>
                alert('Pilih Gambar terlebih dahulu');
                </script>";
                return false;
        }
        //hanya gambar yang boleh diupload
        $ekstensiGambarValid = ['jpg','jpeg','png'];
        //memecah namafile
        $ekstensiGambar = explode('.',$namaFile);
        //mengambil array trakhir dan di wajibkan huruf kecil
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if(!in_array($ekstensiGambar,$ekstensiGambarValid)){
                 echo "<script>
                alert('Yang diupload bukan gambar');
                </script>";
                return false;
        }

        //cek ukuran gambar yang diupload
        if($ukuranFile >100000){
                  echo "<script>
                alert('Ukuran gambar terlalu besar');
                </script>";
        }

        //lolos pengecekan
        //generate nama gmbar baru
        $namaFileBaru = uniqid(). '.' . $ekstensiGambar;
        var_dump($namaFileBaru);
        move_uploaded_file($tmpName,'../img/' . $namaFileBaru);
        return $namaFileBaru;
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
        $gambarLama = $data["gambarLama"];

        //cek apakah user pilih gambar baru atau tidak
        if($_FILES['gambar']['error']===4){
                $gambar = $gambarLama;
        }
        else{
                $gambar = upload();
        }
        
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