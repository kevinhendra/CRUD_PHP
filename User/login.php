<?php
include '../Function/functions.php';
if(isset($_POST["login"])){
        if(login($_POST)>0){
               echo '<script>alert("Berhasil Membuat User");window.location="../index.php"</script>';
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
        <title>Halaman Login</title>
        <style>
                label{
                        display :block;
                }
        </style>
</head>
<body>
        <h1>Halaman Login</h1>
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
                <button type="submit" name="login">Login</button>
        </li>
        </ul>
        </form>
</body>
</html>