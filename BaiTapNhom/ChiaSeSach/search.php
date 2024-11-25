<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
    session_start();
    include 'connect.php';
    ?>
    <?php $icon = mysqli_fetch_assoc(mysqli_query($conn, "SELECT duong_dan FROM image__web WHERE ten='icon'"))['duong_dan']; ?>
    <title>Trang tìm kiếm</title>
    <link rel="stylesheet" href="cssfolder/search.css">
    <link rel="stylesheet" href="cssfolder/header.css">
    <link rel="stylesheet" href="cssfolder/footer.css">
</head>

<body>

    <?php include "giaodien/header.php"; ?>

    <div class="main-content">
        <h2 class="result-header">Kết quả tìm kiếm</h2>

        <?php
        $tukhoa = isset($_GET['tukhoa']) ? $_GET['tukhoa'] : '';

        if ($tukhoa != '') {
            $tukhoa = mysqli_real_escape_string($conn, $tukhoa); // SQL injection
            $sql = "SELECT *
                    FROM books 
                    JOIN categories ON books.ma_the_loai = categories.ma_the_loai 
                    WHERE books.tieu_de LIKE '%$tukhoa%' 
                    OR books.tac_gia LIKE '%$tukhoa%' 
                    OR books.nam_xuat_ban LIKE '%$tukhoa%'
                    OR categories.ten_the_loai LIKE '%$tukhoa%'";

            $result = mysqli_query($conn, $sql);

            echo "<div class='search-info'>Kết quả tìm kiếm cho từ khóa: <em>" . $tukhoa . "</em></div>";

            if (mysqli_num_rows($result) > 0) {
                echo "<div class='book-list'>";

                $stt = 0;
                while ($rows = $result->fetch_assoc()) {
                    echo "<div class='book-item'>
                            <div class='book-title'>" . $rows['tieu_de'] . "</div>
                            <img src='images/cover/" . $rows['anh_bia'] . "' alt='Ảnh sách'>
                            <div class='book-author'>Tác giả: <em>" . $rows['tac_gia'] . "</em></div>
                            <a class='btn-detail' href='detail.php?ma_sach=" . $rows['ma_sach'] . "'>Xem chi tiết</a>
                          </div>";
                    $stt++;
                }

                echo "</div>";
            } else {
                echo "<p class='no-result'>Không tìm thấy kết quả nào cho từ khóa: <em>" . $tukhoa . "</em></p>";
            }
        } else {
            echo "<p class='no-result'>Vui lòng nhập từ khóa để tìm kiếm sách.</p>";
        }
        ?>

    </div>

    <?php include "giaodien/footer.php"; ?>

    <?php mysqli_close($conn); ?>

</body>

</html>