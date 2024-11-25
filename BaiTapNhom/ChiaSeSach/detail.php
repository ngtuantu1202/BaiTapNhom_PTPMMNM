<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thông tin chi tiết sách</title>
    <link rel="stylesheet" href="cssfolder/detail.css">
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
        <div class="book-details">
            <?php
            require("connect.php");
            $Masach = $_GET['ma_sach'];

            $sqlb = "SELECT tieu_de, tac_gia, ten_the_loai, nam_xuat_ban, mo_ta, anh_bia, link_file
            FROM books JOIN categories ON books.ma_the_loai = categories.ma_the_loai
            WHERE books.ma_sach = '$Masach'";
            $result = mysqli_query($conn, $sqlb);
            if (mysqli_num_rows($result) != 0) {
                while ($rows = mysqli_fetch_array($result)) {
                    echo "<nav><a href='index.php'>Trang chủ</a> / <a href=''>{$rows['tieu_de']}</a></nav>";
                    echo "<div class='book-info'>";
                    echo "<div class='book-cover'><img src='./images/cover/{$rows['anh_bia']}' alt='Ảnh bìa' /></div>";
                    echo "<div class='book-details-text'>
                        <h1>{$rows['tieu_de']}</h1>
                        <p><b>Tác giả:</b> {$rows['tac_gia']}</p>
                        <p><b>Thể loại:</b> {$rows['ten_the_loai']}</p>
                        <p><b>Năm xuất bản:</b> {$rows['nam_xuat_ban']}</p>
                        <a href='{$rows['link_file']}'><button type='button'>Đọc sách</button></a>
                    </div>";
                    echo "</div>";
                    echo "<h3>Mô tả:</h3><p>{$rows['mo_ta']}</p>";
                }
            }

            //sql review
            $sqlr = "SELECT tennv, avatar, binh_luan, ngay_danh_gia
            FROM reviews JOIN nhanvien ON reviews.manv = nhanvien.manv
            WHERE reviews.ma_sach = '$Masach' ORDER BY ngay_danh_gia DESC";
            $resultr = mysqli_query($conn, $sqlr);

            if (isset($_POST["binhluan"])) {
                $query = "INSERT INTO `reviews` (`manv`, `ma_sach`, `xep_hang`, `binh_luan`, `ngay_danh_gia`)
                 VALUES (?, ?, '5', ?, current_timestamp());";
                $addbl = $conn->prepare($query);
                $addbl->bind_param("iss", $userData["ma_nguoi_dung"], $Masach, $_POST["comment"]);
                if ($addbl->execute()) {
                    header("Location: detail.php?ma_sach=$Masach");
                    exit();
                } else {
                }
            }
            //sql nhanvien
            $userName = isset($_SESSION['users']) ? $_SESSION['users'] : null;
            $userData = mysqli_fetch_assoc(mysqli_query(
                $conn,
                "   SELECT users.ma_nguoi_dung, nhanvien.tennv, nhanvien.avatar 
                                FROM users 
                                LEFT JOIN nhanvien ON users.ma_nguoi_dung = nhanvien.manv 
                                WHERE users.ten_tk = '$userName'"
            ));
            ?>

            <div class="comment-section">
                <?php
                if (isset($_SESSION['users'])) {
                ?>
                    <form method="post">
                        <img src="<?php echo $userData["avatar"]; ?>" class="user-avatar">
                        <span><?php echo $userData["tennv"]; ?></span>
                        <textarea name="comment" rows="2" placeholder="Viết bình luận..." required></textarea><br>
                        <input type="submit" value="Đăng" name="binhluan">
                    </form>
                <?php
                } else {
                    echo '<p>Vui lòng <a href="login.php" style="color: blue;">đăng nhập</a> để bình luận.</p>';
                }
                ?>

                <?php
                if (mysqli_num_rows($resultr) != 0) {
                    while ($rows = mysqli_fetch_array($resultr)) {
                        echo "<div class='review'>";
                        echo "<div class='review-header'>";
                        echo '<img src=' . $rows["avatar"] . '>';
                        echo "<span>{$rows['tennv']}</span>";
                        echo "<span class='review-date'>{$rows['ngay_danh_gia']}</span>";
                        echo "</div>";
                        echo "<p class='review-comment'>" . $rows['binh_luan'] . "</p>";
                        echo "</div>";
                    }
                }
                ?>
            </div>
        </div>
    </main>

    <?php include "giaodien/footer.php"; ?>
</body>

</html>