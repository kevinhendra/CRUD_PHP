<?php
session_start();

if(!isset($_SESSION["login"])){
        header("Location: ../user/login.php");
        exit;
}
include '../Function/functions.php';
$id = $_GET["id"];

if(hapus($id)>0){
        echo '<script>alert("Data Berhasil dihapus");window.location="../index.php"</script>';
}
else{
        echo '<script>alert("Data Gagal dihapus");window.location="../index.php"</script>';
}
?>