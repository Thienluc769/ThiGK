<?php
session_start();
include 'db.php'; // Kết nối database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $masv = $_POST['masv'];

    // Kiểm tra sinh viên có tồn tại không
    $sql = "SELECT * FROM sinhvien WHERE MaSV = '$masv'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['masv'] = $masv;
        header("Location: index.php"); // Chuyển hướng sau khi đăng nhập thành công
    } else {
        $error = "Mã sinh viên không tồn tại!";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include 'header.php'; ?> 

<div class="container">
    
    <h2>ĐĂNG NHẬP</h2>
    <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
    <form action="login.php" method="POST">
        <label for="masv">MãSV</label>
        <input type="text" id="masv" name="masv" required>
        <button type="submit">Đăng Nhập</button>
    </form>
    <a href="index.php" class="back-link">Back to List</a>
</div>

</body>
</html>
