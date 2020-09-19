<?php 
    include("connect.php");
    $db = new Connect();
    $books = null;
    if(isset($_GET["search"])){
        $seacrh = trim($_GET["search"]);
        $books = $db->searchBooks($seacrh);
    }else{
        $books = $db->getBooks();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Sách</h1>
    <form action="book.php" method="get">
        <div class="line">
            <label>Nhập tên sách: </label>
            <input type="text" name="search">
        </div>
        <div class="line">
            <label></label>
            <input type="submit" value="Tìm kiếm">
        </div>
    </form>
    <?php if(isset($_GET["search"]))
        // Xử lý lỗi, kiểm tra và mã hóa kí tự đặc biệt
        // echo "<p class='result'>Kết quả cho \"".htmlentities($seacrh)."\"</p>";
         echo "<p class='result'>Kết quả cho \"$seacrh\"</p>";
        while($book = $books->fetch_assoc()){
    ?>
        <div class="book">
            <p class="name"><?php echo trim($book["name"])?></p>
            <p class="author"><?php echo trim($book["author"])?></p>
            <p class="price">$<?php echo trim($book["price"])?></p>
            <a href="bookview.php?id=<?php echo $book["id"] ?>">Xem chi tiết</a>
        </div>
    <?php }?>
</body>
</html>