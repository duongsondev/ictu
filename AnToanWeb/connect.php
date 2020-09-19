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
            $sql = "INSERT INTO comment VALUES(NULL,'$title','$content','$author')";
            $rs = $this->conn->query($sql);
            return $rs;
        }
        // Đăng nhập
        public function login($username, $password){
            $sql = "SELECT * FROM account WHERE username='".$username."' AND password='".$password."'";
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
            $sql = "SELECT * FROM book WHERE name LIKE '%$name%'";
            $rs = $this->conn->query($sql);
            return $rs;
        }
        // Lấy sách theo ID
        public function getBookById($id)
        {
            $sql = "SELECT * FROM book WHERE id = $id";
            $rs = $this->conn->query($sql);
            return $rs;
        }
    }
?>