<?php
include 'db.php'; 

$query = "SELECT * FROM HocPhan";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh Sách Học Phần</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include 'header.php'; ?>
    <div class="container">
        <h2>DANH SÁCH HỌC PHẦN</h2>
        <table>
            <thead>
                <tr>
                    <th>Mã Học Phần</th>
                    <th>Tên Học Phần</th>
                    <th>Số Tín Chỉ</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?= $row['MaHP'] ?></td>
                        <td><?= $row['TenHP'] ?></td>
                        <td><?= $row['SoTinChi'] ?></td>
                        <td>
                            <a href="dangky.php?mahp=<?= $row['MaHP'] ?>" class="btn-register">Đăng Ký</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
