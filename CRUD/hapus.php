<?php
include '../Function/functions.php';
$id = $_GET["id"];

if(hapus($id)>0){
        echo '<script>alert("Data Berhasil dihapus");window.location="../index.php"</script>';
}
else{
        echo '<script>alert("Data Gagal dihapus");window.location="../index.php"</script>';
}
?>