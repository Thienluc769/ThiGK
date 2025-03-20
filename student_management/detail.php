<?php
include "db.php";
$MaSV = $_GET["MaSV"];
$result = $conn->query("SELECT * FROM SinhVien WHERE MaSV='$MaSV'");
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Chi Tiết Sinh Viên</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include 'header.php'; ?>
    <div class="container">
        <h2>Chi Tiết Sinh Viên</h2>
        <p><b>Mã SV:</b> <?= $row["MaSV"] ?></p>
        <p><b>Họ Tên:</b> <?= $row["HoTen"] ?></p>
        <p><b>Giới Tính:</b> <?= $row["GioiTinh"] ?></p>
        <p><b>Ngày Sinh:</b> <?= $row["NgaySinh"] ?></p>
        <p><b>Mã Ngành:</b> <?= $row["MaNganh"] ?></p>
        <p><b>Hình:</b></p>
        <img src="uploads/<?= $row["Hinh"] ?>" width="150">
        <br><br>
        <a href="index.php">Quay lại</a>
    </div>
</body>
</html>
