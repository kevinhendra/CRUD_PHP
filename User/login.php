<?php
session_start();

//cek cookie
if(isset($_COOKIE["id"]) && isset($_COOKIE["key"])){
        $id =$_COOKIE["id"];
        $key = $_COOKIE["key"];

        //ambil username berdasarkan id
        $query = ("select * from users where username = ?");
        $row = $conn->prepare($query);
        $row->execute(array($id));
        $result = $row->fetch(PDO::FETCH_ASSOC);

        //cek cookie dan username
        if($key === hash('sha256',$result["username"])){
                $_SESSION["login"] = true; 
        }
}

if(isset($_SESSION["login"])){
        header("Location: ../index.php");
        exit;
}
include '../Function/functions.php';
if(isset($_POST["login"])){
       $username = $_POST["username"];
       $password = $conn->quote($_POST["password"]);
       $query = ("select * from users where username = ?");
       $row = $conn->prepare($query);
       $row->execute(array($username)); 
       $final = $row->rowCount();
        //cek user
        if($final===1){
                $result = $row->fetch(PDO::FETCH_ASSOC);
                if(password_verify($password,$result["password"])){
                        //set session
                        $_SESSION["login"] = true;

                        //cek remember me
                        if( isset($_POST["remember"])){
                                //buat cookie
                                setcookie('acak',$result["id"],time()+3600);
                                setcookie('key', hash('sha256',$result["username"]),time()+3600);
                        }

                        header("Location: ../index.php");
                        exit;
                }
        }
        $error = true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Halaman Login</title>
</head>
<body>
        <h1>Halaman Login</h1>
        <?php if(isset($error)) :?>
        <p style="color: red; font-style:italic;">Username/Password Salah</p>
        <?php endif; ?>
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
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Remember Me ? </label>
        </li>
        <li>
                <button type="submit" name="login">Login</button>
        </li>
        </ul>
        </form>
</body>
</html>