<?php
    // Kiểm tra cookie, nếu chưa có thì sang login
    if(!isset($_COOKIE["login"])){
        header("Location: login.php");
    }
    // Đăng xuất
    if(isset($_POST["logout"])){
        echo "aaa";
        setcookie("login","",time()-3600,"/");
        header("Refresh:0");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo ATW</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>HOME</h1>
    <form action="index.php" method="post">
        <input type="text" name="logout" value="logout" hidden >
        <input type="submit" value="Đăng xuất">
    </form>
</body>
</html>