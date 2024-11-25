<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xoá sách</title>
    <link rel="stylesheet" href="cssfolder/delbooks.css">
    <link rel="stylesheet" href="cssfolder/header.css">
    <link rel="stylesheet" href="cssfolder/footer.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <?php
    session_start();
    require "connect.php";
    include "giaodien/header.php";

    $userName = isset($_SESSION['users']) ? $_SESSION['users'] : null;
            $userData = mysqli_fetch_assoc(mysqli_query(
                $conn,
                "   SELECT nhanvien.manv
                                FROM nhanvien 
                                LEFT JOIN users ON users.ma_nguoi_dung = nhanvien.manv 
                                WHERE users.ten_tk = '$userName'"
            ));

    $info = "SELECT ma_sach, tieu_de, tac_gia, anh_bia FROM books where manv = {$userData['manv']} ORDER BY tieu_de, tac_gia";
    $result = mysqli_query($conn, $info);

    if (isset($_GET['ma_sach'])) {
        $ma_sach = $_GET['ma_sach'];
        $del_sql = "DELETE FROM books WHERE ma_sach = '$ma_sach'";
        if (mysqli_query($conn, $del_sql)) {
            echo '<script>alert("Xoá thành công");</script>';
        } else {
            echo '<script>alert("Xoá thất bại: ' . mysqli_error($conn) . '");</script>';
        }
    }
    ?>

    <main>
        <div class="container">
            <table class="table table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Tiêu đề</th>
                        <th>Tác giả</th>
                        <th>Ảnh bìa</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (mysqli_num_rows($result) > 0) {
                        while ($rows = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $rows['tieu_de'] . "</td>";
                            echo "<td>" . $rows['tac_gia'] . "</td>";
                            echo "<td><img src='images/cover/" . $rows['anh_bia'] . "' alt='Ảnh bìa'></td>";
                            echo "<td>
                                <a href='editbooks.php?ma_sach=" . $rows['ma_sach'] .  "' class='btn btn-info'>Sửa</a>
                                <a onclick=\"return confirm('Bạn có chắc chắn muốn xoá sách này không?');\" 
                                   href='delbooks.php?ma_sach=" . $rows['ma_sach'] . "' class='btn btn-danger'>Xoá</a>
                              </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4' class='text-center'>Không có sách nào trong thư viện.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>

    <?php include "giaodien/footer.php"; ?>
</body>

</html>
