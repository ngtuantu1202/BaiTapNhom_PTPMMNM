<?php
$rowsPerPage = 10;
if (!isset($_GET['page'])) {
    $_GET['page'] = 1;
}
$offset = ($_GET['page'] - 1) * $rowsPerPage;

$sql = 'SELECT ma_sach, tieu_de, anh_bia, tac_gia FROM books LIMIT ' . $offset . ', ' . $rowsPerPage;
$result = mysqli_query($conn, $sql);

echo "<div class='book-list'>";

$stt = 0;
if (mysqli_num_rows($result) != 0) {
    while ($rows = mysqli_fetch_array($result)) {
        echo "
        <div class='book-item'>
            <b>{$rows['tieu_de']}</b><br>
            <img src='images/cover/{$rows['anh_bia']}' alt='{$rows['tieu_de']}'> <br>
            <span class='book-author'>Tác giả: <em>{$rows['tac_gia']}</em></span><br>
            <a class='btn-detail' href='detail.php?ma_sach={$rows['ma_sach']}'>Xem chi tiết</a>
        </div>";
        $stt++;
    }
}

echo "</div>";

$re = mysqli_query($conn, 'SELECT * FROM books');
$numRows = mysqli_num_rows($re);
$maxPage = ceil($numRows / $rowsPerPage);

echo "<p class='current-page'></p>";

echo "<div class='pagination'>";

if ($_GET['page'] > 1) {
    echo "<button onclick=\"window.location.href='" . $_SERVER['PHP_SELF'] . "?page=1'\"> << </button> ";
}

if ($_GET['page'] > 1) {
    echo "<button onclick=\"window.location.href='" . $_SERVER['PHP_SELF'] . "?page=" . ($_GET['page'] - 1) . "'\"> < </button> ";
}

for ($i = 1; $i <= $maxPage; $i++) {
    if ($i == $_GET['page']) {
        // Nút của trang hiện tại
        echo "<button style=\"background-color: blue; color: white;\">Trang $i</button> ";
    } else {
        // Các nút khác
        echo "<button onclick=\"window.location.href='" . $_SERVER['PHP_SELF'] . "?page=$i'\">Trang $i</button> ";
    }
}

if ($_GET['page'] < $maxPage) {
    echo "<button onclick=\"window.location.href='" . $_SERVER['PHP_SELF'] . "?page=" . ($_GET['page'] + 1) . "'\"> > </button> ";
}

if ($_GET['page'] < $maxPage) {
    echo "<button onclick=\"window.location.href='" . $_SERVER['PHP_SELF'] . "?page=$maxPage'\"> >> </button>";
}

echo "</div>";

echo "<p class='total-pages'></p>";