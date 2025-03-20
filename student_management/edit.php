<?php
include "db.php";
$MaSV = $_GET["MaSV"];
$result = $conn->query("SELECT * FROM SinhVien WHERE MaSV='$MaSV'");
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $HoTen = $_POST["HoTen"];
    $GioiTinh = $_POST["GioiTinh"];
    $NgaySinh = $_POST["NgaySinh"];
    $MaNganh = $_POST["MaNganh"];

    // Xử lý ảnh mới
    if ($_FILES["Hinh"]["name"]) {
        $Hinh = basename($_FILES["Hinh"]["name"]);
        move_uploaded_file($_FILES["Hinh"]["tmp_name"], "uploads/" . $Hinh);
    } else {
        $Hinh = $row["Hinh"];
    }

    $sql = "UPDATE SinhVien SET HoTen='$HoTen', GioiTinh='$GioiTinh', NgaySinh='$NgaySinh', Hinh='$Hinh', MaNganh='$MaNganh' WHERE MaSV='$MaSV'";
    
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
    <title>Sửa Sinh Viên</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include 'header.php'; ?>
    <div class="container">
        <h2>Sửa Sinh Viên</h2>
        <form method="POST" enctype="multipart/form-data">
            <label>Họ Tên:</label><input type="text" name="HoTen" value="<?= $row['HoTen'] ?>" required><br>
            <label>Giới Tính:</label>
            <select name="GioiTinh">
                <option value="Nam" <?= ($row['GioiTinh'] == 'Nam') ? 'selected' : '' ?>>Nam</option>
                <option value="Nữ" <?= ($row['GioiTinh'] == 'Nữ') ? 'selected' : '' ?>>Nữ</option>
            </select><br>
            <label>Ngày Sinh:</label><input type="date" name="NgaySinh" value="<?= $row['NgaySinh'] ?>" required><br>
            <label>Hình:</label><input type="file" name="Hinh"><br>
            <label>Mã Ngành:</label><input type="text" name="MaNganh" value="<?= $row['MaNganh'] ?>" required><br>
            <button type="submit">Lưu</button>
        </form>
    </div>
</body>
</html>
