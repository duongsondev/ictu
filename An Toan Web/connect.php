<?php 
    class Connect{
        public $connect;
        public function __construct() {
            $host = "localhost";
            $database = "atw";
            $user = "root";
            $pass = "";
            $this->conn = new mysqli($host, $user, $pass, $database);
            mysqli_set_charset($this->conn, "utf8");
        }
        // Lấy danh sách bình luận
        public function getComments()
        {
            $sql = "SELECT * FROM comment";
            $rs = $this->conn->query($sql);
            return $rs;
        }
        // Thêm bình luận
        public function insertComments($title, $content, $author){
            // phong chong sql injection
            // $titleSafe = mysqli_real_escape_string($this->conn,$title);
            // $contentSafe = mysqli_real_escape_string($this->conn,$contentSafe);
            // $authorSafe = mysqli_real_escape_string($this->conn,$authorSafe);
            // $sql = "INSERT INTO comment VALUES(NULL,'$titleSafe','$contentSafe','$authorSafe')";

            // bi lo hong sql injection
            $sql = "INSERT INTO comment VALUES(NULL,'$title','$content','$author')";
            $rs = $this->conn->query($sql);
            return $rs;
        }
        // Đăng nhập
        public function login($username, $password){
            // phong chong sql injection
            // $usernameSafe = mysqli_real_escape_string($this->conn,$username);
            // $passwordSafe = mysqli_real_escape_string($this->conn,$password);
            // $sql = "SELECT * FROM account WHERE username='".$usernameSafe."' AND password='".$passwordSafe."'";

            // bi lo hong sql injection
            $sql = "SELECT * FROM account WHERE username='".$username."' AND password='".$password."'";
           // echo $sql;
            //return;
            $rs = $this->conn->query($sql);
            return $rs->num_rows > 0;
        }
        // Lấy danh sách book
        public function getBooks()
        {
            $sql = "SELECT * FROM book";
            $rs = $this->conn->query($sql);
            return $rs;
        }
        // Tìm kiếm sách theo tên
        public function searchBooks($name)
        {
            // phong chong sql injection
            // $nameSafe = mysqli_real_escape_string($this->conn,$name);
            // $sql = "SELECT * FROM book WHERE name LIKE '%$nameSafe%'";

            // bi lo hong sql injection
            $sql = "SELECT * FROM book WHERE name LIKE '%$name%'";
            $rs = $this->conn->query($sql);
            return $rs;
        }
        // Lấy sách theo ID
        public function getBookById($id)
        {
            // phong chong sql injection
            // $idSafe = mysqli_real_escape_string($this->conn,$id);
            // $sql = "SELECT * FROM book WHERE id = $idSafe";

            // bi lo hong sql injection
            $sql = "SELECT * FROM book WHERE id = $id";
            //echo $sql;
            $rs = $this->conn->query($sql);
            return $rs;
        }
        // Lưu db hacker
        public function insertCookie($cookie){
            $sql = "INSERT INTO hacker VALUES(NULL,'$cookie')";
            $rs = $this->conn->query($sql);
            return $rs;
        }
    }
?>