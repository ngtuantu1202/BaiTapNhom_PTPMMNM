<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin cá nhân</title>
    <link rel="stylesheet" href="cssfolder/account.css">
    <link rel="stylesheet" href="cssfolder/header.css">
    <link rel="stylesheet" href="cssfolder/footer.css">
</head>

<body>
    <?php
    session_start();
    require "connect.php";
    include "giaodien/header.php";
    ?>

    <main>
        <div class="row">
            <?php
            $ten_tk = isset($_SESSION['users']) ? $_SESSION['users'] : null;

            $sql = "SELECT * 
            FROM nhanvien 
            JOIN users ON users.ma_nguoi_dung = nhanvien.manv 
            WHERE users.ten_tk = '$ten_tk'";
            $result = mysqli_query($conn, $sql);

            $row = mysqli_fetch_assoc($result);
            // Lấy các giá trị từ hàng dữ liệu
            $manv = $row['manv'];
            $honv = $row['honv'];
            $tennv = $row['tennv'];
            $gioitinh = $row['gioi_tinh'];
            $ngaysinh = $row['ngay_sinh'];
            $diachi = $row['dia_chi'];
            $sodienthoai = $row['so_dien_thoai'];
            $avatar = $row['avatar'];

            if (isset($_POST['submit'])) {

                if (empty($_FILES['avatarUpload']['name'])) {
                    $avatar = $row['avatar'];
                } else {
                    $errors = array();
                    $file_name = $_FILES['avatarUpload']['name'];
                    $file_size = $_FILES['avatarUpload']['size'];
                    $file_tmp = $_FILES['avatarUpload']['tmp_name'];
                    $file_ext = @strtolower(end(explode('.', $_FILES['avatarUpload']['name'])));
                    $expensions = array("jpeg", "jpg", "png");

                    if (in_array($file_ext, $expensions) === false) {
                        $errors[] = "Don't accept image files with this extension, please choose JPEG or PNG.";
                    }
                    if ($file_size > 2097152) {
                        $errors[] = 'File size should be 2MB';
                    }
                    if (empty($errors) == true) {
                        move_uploaded_file($file_tmp, "D:\\xampp\\htdocs\\BaiTapNhom\\ChiaSeSach\\images\\avatars\\" . $file_name);
                        $avatar = "./images/avatars/" . $file_name;
                    }
                }

                $manv = $_POST['manv'];
                $honv = $_POST['honv'];
                $tennv = $_POST['tennv'];
                $gioitinh = $_POST['gioi_tinh'];
                $ngaysinh = $_POST['ngay_sinh'];
                $diachi = $_POST['dia_chi'];
                $sodienthoai = $_POST['so_dien_thoai'];


                $sql = "UPDATE nhanvien SET honv = '$honv', tennv = '$tennv', gioi_tinh = '$gioitinh',
                    ngay_sinh = '$ngaysinh', dia_chi = '$diachi', so_dien_thoai = '$sodienthoai', avatar = '$avatar'
                    WHERE manv = '$manv'";
                if (mysqli_query($conn, $sql)) {
                    echo '<script>alert("Cập nhật thông tin thành công");</script>';
                } else {
                    echo '<script>alert("Lỗi xảy ra khi sửa đổi Avatar ' . mysqli_error($conn) . '");</script>';
                }
            header("Location: account.php");
            }
            ?>
            <section>
                <form action="" method="POST" enctype="multipart/form-data">
                <h1 align="center">Thông tin cá nhân</h1>
                    <table>
                        <tr>
                            <td><input type="hidden" name="manv" value="<?php echo $manv; ?>"></td>
                        </tr>

                        <tr>
                            <td colspan="2">
                                <img src="<?php echo $avatar; ?>" style="border-radius: 50%; width: 200px; height: 200px;">
                                <input type="file" name="avatarUpload">
                            </td>
                        </tr>

                        <tr>
                            <td>Họ:</td>
                            <td><input type="text" name="honv" value="<?php echo $honv; ?>"></td>
                        </tr>
                        <tr>
                            <td>Tên:</td>
                            <td><input type="text" name="tennv" value="<?php echo $tennv; ?>"></td>
                        </tr>
                        <tr>
                            <td>Giới tính:</td>
                            <td>
                            <input type="radio" name="gioi_tinh" value="Nam"<?php if($gioitinh == 'Nam') echo "checked";?>/>Nam
                            <input type="radio" name="gioi_tinh" value="Nữ" <?php if($gioitinh == 'Nữ') echo 'checked';?>/>Nữ
                            </td>
                        </tr>
                        <tr>
                            <td>Ngày sinh:</td>
                            <td><input type="date" name="ngay_sinh" value="<?php echo $ngaysinh; ?>"></td>
                        </tr>
                        <tr>
                            <td>Địa chỉ:</td>
                            <td><input type="text" name="dia_chi" value="<?php echo $diachi; ?>"></td>
                        </tr>
                        <tr>
                            <td>Số điện thoại:</td>
                            <td><input type="text" name="so_dien_thoai" value="<?php echo $sodienthoai; ?>"></td>
                        </tr>
                        <tr>
                            <td colspan="2"><button type="submit" name="submit">Cập nhật thông tin</button></td>
                        </tr>
                    </table>
                </form>
            </section>
        </div>
    </main>
    <?php include "giaodien/footer.php"; ?>

</body>

</html>