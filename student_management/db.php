<?php
$host = "localhost";
$user = "root";  // Mặc định của XAMPP
$pass = "";      // Mật khẩu rỗng nếu chưa đặt
$dbname = "Test1";

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
?>
