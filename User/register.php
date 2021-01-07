<?php
include '../Function/functions.php';
if(isset($_POST["register"])){
        if(!empty(register($_POST))){
               echo '<script>alert("User baru berhasil ditambahkan");window.location="../index.php"</script>';
        }else{
                $error = $conn->errorInfo();
                echo $error[2];
        }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Halaman Registrasi</title>
        <style>
                label{
                        display :block;
                }
        </style>
</head>
<body>
        <h1>Halaman Registrasi</h1>

        <form action="" method="post">
        <ul>
        <li>
                <label for="username">Username : </label>
                <input type="text" name="username" id="username" required>
        </li>
        <li>
                <label for="password">Password : </label>
                <input type="password" name="password" id="password" required>
        </li>
        <li>
                <label for="password2">Konfirmasi Password : </label>
                <input type="password" name="password2" id="password2" required>
        </li>
        <li>
                <button type="submit" name="register">Register</button>
        </li>
        </ul>
        </form>
</body>
</html>