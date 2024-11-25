<head>
    <link rel="stylesheet" href="cssfolder/header.css">
</head>

<body>
    <div class="navbar">
        <div class="container">
            <?php
                $logo = mysqli_fetch_assoc(mysqli_query($conn, "SELECT duong_dan FROM image__web WHERE ten='logo'"))['duong_dan'];
            ?>
            <a href="index.php">
                <img src="<?php echo $logo; ?>" class="logo">
            </a>

            <ul class="nav">
                
                <li class="search-item">
                    <form method="GET" action="search.php" class="search-form">
                        <input name="tukhoa" type="text" placeholder="Tìm kiếm..." class="search-input" 
                        value= "<?php echo isset($_GET['tukhoa']) ? $_GET['tukhoa'] : ''; ?>">
                        <button type="submit" class="search-button">Tìm</button>
                    </form>
                </li>

                <li class="user-item">
                    <?php
                        if (empty($_SESSION['users'])) {
                            echo '<a href="login.php"><button type="submit" class="btn-account">Đăng nhập</button></a>';
                        } else {
                            $userName = $_SESSION['users'];
                            $userData = mysqli_fetch_assoc(mysqli_query($conn, 
                            "   SELECT users.ma_nguoi_dung, nhanvien.honv, nhanvien.tennv, nhanvien.avatar 
                                FROM users 
                                LEFT JOIN nhanvien ON users.ma_nguoi_dung = nhanvien.manv 
                                WHERE users.ten_tk = '$userName'"));

                            echo '<div class="user-info">
                                    <span>' . $userData['honv'] . ' ' . $userData['tennv'] . '</span>
                                    <div class="dropdown">
                                        <button class="dropbtn">
                                            <img src="' . $userData['avatar'] . '" class="user-avatar">
                                            <i class="fa fa-caret-down"></i>
                                        </button>
                                        <div class="dropdown-content">
                                            <a href="account.php">Trang cá nhân</a>
                                            <a href="addbooks.php">Thêm sách</a>
                                            <a href="delbooks.php">Cập nhật sách</a>
                                            <form method="POST" class="logout-form">
                                                <button type="submit" name="logout" class="logout-button">Đăng xuất</button>
                                            </form>
                                        </div>
                                    </div>
                                  </div>';
                        }

                        if (isset($_POST['logout'])) {
                            $_SESSION['logout_message'] = "Bạn đã đăng xuất thành công";
                            session_destroy();
                            header("Location: login.php");
                            exit();
                        }
                    ?>
                </li>
            </ul>
        </div>
    </div>
    <div class="navbar-spacer"></div>
</body>