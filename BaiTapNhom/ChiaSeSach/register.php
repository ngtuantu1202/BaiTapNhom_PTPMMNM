<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký</title>
    <link rel="stylesheet" href="cssfolder/register.css">
    <link rel="stylesheet" href="cssfolder/header.css">
    <link rel="stylesheet" href="cssfolder/footer.css">
</head>
<body>
    <?php
    session_start();
    require "connect.php";
    include "giaodien/header.php"; 

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $ten_tk = $_POST['ten_tk'];
        $mat_khau = $_POST['mat_khau'];

        // Ktra ten tk
        $ktra = "SELECT * FROM users WHERE ten_tk = '$ten_tk'";
        $result = mysqli_query($conn, $ktra);

        if (mysqli_num_rows($result) > 0) {
            echo "<script>alert('Tên tài khoản đã tồn tại. Vui lòng chọn tên khác.');</script>";
        } else {
            $sql_insert_user = "INSERT INTO users (ten_tk, mat_khau) VALUES ('$ten_tk', '$mat_khau')";
            $sql_insert_nhanvien = "INSERT INTO nhanvien (tennv, ten_tk, avatar) VALUES ('$ten_tk', '$ten_tk', './images/avatars/people.jpg')";
            
            if (mysqli_query($conn, $sql_insert_user) && mysqli_query($conn, $sql_insert_nhanvien)) {
                echo "<script>alert('Đăng ký thành công. Vui lòng đăng nhập.');</script>";
                echo "<script>window.location.href = 'login.php';</script>";
            } else {
                echo "<script>alert('Đã xảy ra lỗi khi thêm dữ liệu vào cơ sở dữ liệu.');</script>";
            }
        }
    }
    ?>

    <main>
        <div class="row">
            <section>
                <form action="register.php" method="POST">
                    <h1 align="center">Đăng Ký</h1>
                    <table align="center">
                        <tr>
                            <td><label for="ten_tk">Tên tài khoản</label></td>
                            <td><input type="text" id="ten_tk" name="ten_tk" required></td>
                        </tr>
                        <tr>
                            <td><label for="mat_khau">Mật khẩu</label></td>
                            <td><input type="password" id="mat_khau" name="mat_khau" required></td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: center;">
                                <input type="submit" name="submit" value="Đăng ký">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: center;">
                                <a href="login.php">Đã có tài khoản? Đăng nhập ngay</a>
                            </td>
                        </tr>
                    </table>
                </form>
            </section>
        </div>
    </main>

    <?php include "giaodien/footer.php"; ?>
</body>
</html>
