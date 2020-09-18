<?php 
    include("connect.php");
    $db = new Connect();
    $comments = $db->getComments();
    //var_dump($db);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comments</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Bình luận</h1>
    <?php while($cmt = $comments->fetch_assoc()){?>
        <div class="comments">
            <div class="cmt-left">
                <p class="avt">
                <?php echo substr($cmt["author"],0,1)?>
                </p>
            </div>
            <div class="cmt-right">
                <p class="author"><?php echo $cmt["author"]?></p>
                <p class="title"><?php echo $cmt["title"]?></p>
                <p class="content"><?php echo $cmt["content"]?></p>
            </div>
        </div>
    <?php }?>
    <h2>Viết</h2>
    <form action="comment.php" method="POST">
        <div class="line">
            <label>Họ tên: </label>
            <input type="text" name="author">
        </div>
        <div class="line">
            <label>Tiêu đề: </label>
            <input type="text" name="title">
        </div>
        <div class="line">
            <label>Nội dung: </label>
            <input type="text" name="content">
        </div>
        <div class="line">
            <label></label>
            <input type="submit" value="Bình luận">
        </div>
    </form>
</body>
</html>