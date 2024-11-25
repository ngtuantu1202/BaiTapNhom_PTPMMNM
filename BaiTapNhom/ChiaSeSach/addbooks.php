<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sách</title>
    <link rel="stylesheet" href="cssfolder/addbooks.css">
    <link rel="stylesheet" href="cssfolder/header.css">
    <link rel="stylesheet" href="cssfolder/footer.css">
</head>

<body>
    <?php
    session_start();
    require "connect.php";
    include "giaodien/header.php";

    if (isset($_POST['submit'])) {
        // $timestamp = time();
        // $ma_sach = $timestamp . rand(1, 9);
        do {
            $timestamp = time();
            $ma_sach = $timestamp . rand(1, 999);
            $result = mysqli_query($conn, "SELECT * FROM books WHERE ma_sach = '$ma_sach'");
        } while (mysqli_num_rows($result) > 0);

        $tieu_de = $_POST['tieu_de'];
        $tac_gia = $_POST['tac_gia'];
        $ma_the_loai = $_POST['ma_the_loai'];
        $nam_xuat_ban = $_POST['nam_xuat_ban'];
        $mo_ta = $_POST['mo_ta'];
        $errors = [];

        // file anh
        $anh_bia = $_FILES['anh_bia']['name'];
        $file_tmp = $_FILES['anh_bia']['tmp_name'];
        $file_size = $_FILES['anh_bia']['size'];
        $file_ext = strtolower(pathinfo($anh_bia, PATHINFO_EXTENSION));
        $expensions = array("jpeg", "jpg", "png", "gif");

        if (in_array($file_ext, $expensions) === false) {
            $errors[] = "Sai định dạng ảnh.";
        }
        if ($file_size > 2097152) {
            $errors[] = 'Kích thước max là 2MB';
        }
        if (empty($errors)) {
            $anh_bia_name = basename($anh_bia);
            $anh_bia_path = "images/cover/" . $anh_bia_name;
            move_uploaded_file($file_tmp, $anh_bia_path);
        }

        // file pdf
        $link_file = $_FILES['link_file']['name'];
        $file_tmp = $_FILES['link_file']['tmp_name'];
        $file_ext = strtolower(pathinfo($link_file, PATHINFO_EXTENSION));

        if ($file_ext == "pdf") {
            $link_file_path = "files/" . $link_file;
            $link_file_url = "./files/" . $link_file;
            if (move_uploaded_file($file_tmp, $link_file_path)) {
            } else {
                $errors[] = "Lỗi khi tải file PDF lên.";
            }
        } else {
            $errors[] = "File sách phải là định dạng PDF.";
        }

        // SQL 
        $userName = isset($_SESSION['users']) ? $_SESSION['users'] : null;
            $userData = mysqli_fetch_assoc(mysqli_query(
                $conn,
                "   SELECT nhanvien.manv
                                FROM nhanvien 
                                LEFT JOIN users ON users.ma_nguoi_dung = nhanvien.manv 
                                WHERE users.ten_tk = '$userName'"
            ));
        if (empty($errors)) {
            $sql = "INSERT INTO books (ma_sach, manv, tieu_de, tac_gia, ma_the_loai, nam_xuat_ban, mo_ta, anh_bia, link_file)
            VALUES ('$ma_sach','{$userData["manv"]}', '$tieu_de', '$tac_gia', '$ma_the_loai', '$nam_xuat_ban', '$mo_ta', '$anh_bia_name', '$link_file_url')";

            if (mysqli_query($conn, $sql)) {
                echo '<script>alert("Sách đã được thêm thành công");</script>';
            } else {
                echo '<script>alert("Có lỗi xảy ra khi thêm sách: ' . mysqli_error($conn) . '");</script>';
            }
        } else {
            foreach ($errors as $error) {
                echo '<script>alert("' . $error . '");</script>';
            }
        }
    }
    ?>

    <main>
        <div class="row">
            <section>
                <form action="" method="POST" enctype="multipart/form-data">
                    <h1 align="center">Thêm sách</h1>
                    <table class="form-table">
                        <tr>
                            <td><label for="tieu_de">Tên sách</label></td>
                            <td><input type="text" class="form-control" name="tieu_de"></td>
                        </tr>
                        <tr>
                            <td><label for="tac_gia">Tác giả</label></td>
                            <td><input type="text" class="form-control" name="tac_gia"></td>
                        </tr>
                        <tr>
                            <td><label for="ma_the_loai">Thể loại</label></td>
                            <td>
                                <select name="ma_the_loai" class="form-control">
                                    <?php
                                    $data = mysqli_query($conn, "SELECT * FROM categories");
                                    while ($getdata = mysqli_fetch_assoc($data)) {
                                        echo '<option value="' . $getdata['ma_the_loai'] . '">' . $getdata['ten_the_loai'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="nam_xuat_ban">Năm xuất bản</label></td>
                            <td><input type="number" class="form-control" name="nam_xuat_ban"></td>
                        </tr>
                        <tr>
                            <td><label for="mo_ta">Mô tả</label></td>
                            <td><textarea class="form-control" name="mo_ta" rows="4"></textarea></td>
                        </tr>
                        <tr>
                            <td><label for="anh_bia">Ảnh bìa</label></td>
                            <td><input type="file" name="anh_bia" id="anh_bia" required /></td>
                        </tr>
                        <tr>
                            <td><label for="link_file">File sách</label></td>
                            <td><input type="file" name="link_file" id="link_file" required /></td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: center"><button type="submit" name="submit" class="btn-addbook">THÊM</button></td>
                        </tr>

                    </table>
                </form>
            </section>
        </div>
    </main>

    <?php include "giaodien/footer.php"; ?>
</body>

</html>