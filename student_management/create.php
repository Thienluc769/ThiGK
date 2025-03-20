<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $MaSV = $_POST["MaSV"];
    $HoTen = $_POST["HoTen"];
    $GioiTinh = $_POST["GioiTinh"];
    $NgaySinh = $_POST["NgaySinh"];
    $MaNganh = $_POST["MaNganh"];

    // Xử lý ảnh
    $Hinh = "";
    if ($_FILES["Hinh"]["name"]) {
        $Hinh = basename($_FILES["Hinh"]["name"]);
        move_uploaded_file($_FILES["Hinh"]["tmp_name"], "uploads/" . $Hinh);
    }

    $sql = "INSERT INTO SinhVien (MaSV, HoTen, GioiTinh, NgaySinh, Hinh, MaNganh) 
            VALUES ('$MaSV', '$HoTen', '$GioiTinh', '$NgaySinh', '$Hinh', '$MaNganh')";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Lỗi: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm Sinh Viên</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include 'header.php'; ?>
    <div class="container">
        <h2>Thêm Sinh Viên</h2>
        <form method="POST" enctype="multipart/form-data">
            <label>Mã SV:</label><input type="text" name="MaSV" required><br>
            <label>Họ Tên:</label><input type="text" name="HoTen" required><br>
            <label>Giới Tính:</label>
            <select name="GioiTinh">
                <option value="Nam">Nam</option>
                <option value="Nữ">Nữ</option>
            </select><br>
            <label>Ngày Sinh:</label><input type="date" name="NgaySinh" required><br>
            <label>Hình:</label><input type="file" name="Hinh"><br>
            <label>Mã Ngành:</label><input type="text" name="MaNganh" required><br>
            <button type="submit">Thêm</button>
        </form>
    </div>
</body>
</html>
