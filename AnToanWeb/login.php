<?php
    include("connect.php");
    $db = new Connect();
    if(isset($_POST["username"])){
        $username = trim($_POST["username"]);
        $password = trim($_POST["password"]);
        $err = "<p class='error'>Đăng nhập thất bại!</p>";
        if(empty($username) || empty($password)){
            echo $err;
        }else{
            $result = $db->login($username, $password);
            if($result){
                // Lưu cookie 7 ngày thôi ^^
                setcookie("login", "ok", time() + (86400 * 7), "/");
                header("Location: index.php");
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Đăng nhập</h1>
    <form action="login.php" method="post">
        <div class="line">
            <label>Tên đăng nhập: </label>
            <input type="text" name="username">
        </div>
        <div class="line">
            <label>Mật khẩu: </label>
            <input type="password" name="password">
        </div>
        <div class="line">
            <label></label>
            <input type="submit" value="Đăng nhập">
        </div>
    </form>
</body>
</html>