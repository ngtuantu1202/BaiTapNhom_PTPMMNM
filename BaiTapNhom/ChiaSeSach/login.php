<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="cssfolder/login.css">
    <link rel="stylesheet" href="cssfolder/header.css">
    <link rel="stylesheet" href="cssfolder/footer.css">
</head>

<body>
    <?php
    session_start();
    require "connect.php";
    include "giaodien/header.php";
    ?>

    <div class="row">
        <?php
        $sql = "SELECT ten_tk, mat_khau FROM users";
        $result = mysqli_query($conn, $sql);

        if (isset($_POST['ten_tk'], $_POST['mat_khau'])) {
            $ten_tk = $_POST['ten_tk'];
            $mat_khau = $_POST['mat_khau'];
        }
        if (isset($_POST['dangNhap'])) {
            $thongbao = "";
            while ($rows = mysqli_fetch_array($result)) {
                if ($ten_tk == $rows['ten_tk'] && $mat_khau != $rows['mat_khau']) {
                    $thongbao = "Bạn đã nhập sai mật khẩu hoặc tên tài khoản";
                } else if ($ten_tk == $rows['ten_tk'] && $mat_khau == $rows['mat_khau']) {
                    $_SESSION['users'] = $ten_tk;
                    $_SESSION['success_message'] = "Bạn đã đăng nhập thành công";
                    $_SESSION['timeout'] = time();
                    header("location: index.php");
                    break;
                }
            }
            echo "<script>alert('$thongbao');</script>";
        }

        if (isset($_SESSION['timeout'])) {
            $inactive = 2; //Tgian đăng nhập (giay)
            $session_life = time() - $_SESSION['timeout'];
            if ($session_life > $inactive) {
                session_unset();
                session_destroy();
                echo "<script>alert('Phiên đăng nhập của bạn đã hết hạn!');</script>";
                header("Location: login.php");
                exit;
            } else {
                $_SESSION['timeout'] = time();
            }
        }

        ?>

        <section>
            <form action="" method="POST">
                <h1 align="center">Đăng Nhập</h1>
                <table align="center">
                    <tr>
                        <td><label for="ten_tk">Tài khoản</label></td>
                        <td><input type="text" id="ten_tk" name="ten_tk"></td>
                    </tr>
                    <tr>
                        <td><label for="mat_khau">Mật khẩu</label></td>
                        <td><input type="password" id="mat_khau" name="mat_khau"></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center;">
                            <a href="trash/note.php">Quên mật khẩu</a> | <a href="register.php">Đăng ký</a>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center;">
                            <input type="submit" name="dangNhap" value="Đăng nhập">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center;">
                            <input type="submit" name="Google" value="Đăng nhập bằng Google">
                        </td>
                    </tr>
                </table>
            </form>
        </section>

    </div>

    <?php include "giaodien/footer.php"; ?>

</body>

</html>