<?php
include "db.php";
$result = $conn->query("SELECT * FROM SinhVien");
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quản lý Sinh Viên</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include 'header.php'; ?>

    <div class="container">
        <h2>TRANG SINH VIÊN</h2>
        <a href='create.php' class="add-student">+ Add Student</a>
        
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>MaSV</th>
                    <th>Họ Tên</th>
                    <th>Giới Tính</th>
                    <th>Ngày Sinh</th>
                    <th>Hình</th>
                    <th>Mã Ngành</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?= $row['MaSV'] ?></td>
                        <td><?= $row['HoTen'] ?></td>
                        <td><?= $row['GioiTinh'] ?></td>
                        <td><?= $row['NgaySinh'] ?></td>
                        <td><img src='uploads/<?= $row['Hinh'] ?>' class="img-thumbnail" width="100"></td>
                        <td><?= $row['MaNganh'] ?></td>
                        <td>
                            <a href='edit.php?MaSV=<?= $row['MaSV'] ?>' class="btn btn-warning btn-sm">Edit</a>
                            <a href='detail.php?MaSV=<?= $row['MaSV'] ?>' class="btn btn-info btn-sm">Details</a>
                            <a href='delete.php?MaSV=<?= $row['MaSV'] ?>' class="btn btn-danger btn-sm">Delete</a>
                            
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
