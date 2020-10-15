<?php 
    include("connect.php");
    $db = new Connect();
    $book = null;
    if(isset($_GET["id"])){
        $id = trim($_GET["id"]);
        $book = $db->getBookById($id)->fetch_assoc();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xem chi tiết</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Xem chi tiết</h1>
    <?php 
        if($book != null){
            ?>
    <div class="book">
            <p class="name"><span>Tên sách: </span> <?php echo trim($book["name"])?></p>
            <p class="author"><span>Tác giả: </span><?php echo trim($book["author"])?></p>
            <p class="price"><span>Giá bán:</span> $<?php echo trim($book["price"])?></p>
    </div>
    <?php
        }else{
            echo "<p class='error'>Sách gì đây???</p>";
        }
    ?>
    <a href="book.php">Tất cả sách</a><br><br>
    <a href="index.php">GO HOME</a>
</body>
</html>