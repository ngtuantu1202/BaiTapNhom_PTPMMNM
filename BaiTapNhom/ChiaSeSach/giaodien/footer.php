<head>
    <link rel="stylesheet" href="cssfolder/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <div class="footer">
        <div class="container">
            <div class="col-md-4">
                <div class="footer-title">LIÊN HỆ</div>
                <p>
                    Mọi thông tin liên hệ xin vui lòng<br>
                    Gửi về hòm thư : tu.nt.63cntt@ntu.edu.vn<br>
                    Số điện thoại : 09620746<br>
                    Địa chỉ liên lệ trực tiếp : 2 Nguyễn Đình Chiểu - Nha Trang - Khánh Hoà<br>
                    Xin trân trọng cảm ơn quý khách !
                </p>
            </div>

            <div class="col-md-4">
                <div class="footer-title">KẾT NỐI VỚI CHÚNG TÔI</div>
                <a target="_blank" href="https://www.facebook.com"><i class="fab fa-facebook"></i></a>
                <a target="_blank" href="https://www.twitter.com/"><i class="fab fa-twitter"></i></a>
                <a target="_blank" href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a>
                <a target="_blank" href="https://www.instagram.com"><i class="fab fa-instagram"></i></a>

                <div class="footer-title">LIÊN KẾT</div>
                <p>
                    <a target="_blank" href="github.com">Github</a>
                    <a target="_blank" href="ntu.edu.vn">NTU</a>
                </p>
            </div>

            <div class="col-md-4">
                <div class="footer-title">BÌNH LUẬN MỚI NHẤT</div>
                <?php
                $query = "SELECT r.manv, r.ma_sach, n.honv, n.tennv, b.tieu_de 
                FROM reviews r
                JOIN nhanvien n ON r.manv = n.manv  
                JOIN books b ON r.ma_sach = b.ma_sach  
                ORDER BY r.ma_danh_gia DESC 
                LIMIT 3 ";

                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) {
                    while ($rows = mysqli_fetch_assoc($result)) {
                        $getho = $rows['honv'];
                        $getten = $rows['tennv'];
                        $tieu_de = $rows['tieu_de'];
                        echo '<div class="newcomment">
                            <span>' . $getho . '</span>
                            <span>' . $getten . '</span>
                            <span> trong </span>
                            <span>' . $tieu_de  . '</span>
                        </div>';
                    }
                }
                ?>
            </div>
        </div>
    </div>
</body>