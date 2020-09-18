<?php 
    include("connect.php");
    $db = new Connect();
    $comments = $db->getComments();
    //var_dump($db);
    if(isset($_POST["content"])){
        $content = trim($_POST["content"]);
        if(empty($content)){
            echo "Nội dung rỗng!!!";
        }else{
            $title = trim($_POST["title"]);
            $author = trim($_POST["author"]);
            $rs = $db->insertComments(empty($title)?NULL:$title,$content,empty($author)?NULL:$author);
            if($rs) header("Refresh:0");
        }
    }
?>
<!-- <script>alert("Hello")</script> -->
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
            <p class="author"><?php echo trim($cmt["author"])?></p>
            <p class="title"><?php echo trim($cmt["title"])?></p>
            <p class="content"><?php echo trim($cmt["content"])?></p>
        </div>
    <?php }?>
    <div id="write">
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
    </div>
</body>
</html>