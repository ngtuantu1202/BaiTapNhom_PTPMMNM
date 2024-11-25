<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include '../connect.php'; ?>
    <title>Trang Admin</title>
    <link rel="icon" href="<?php echo $icon; ?>">
    <link rel="stylesheet" href="include/fontawesome/css/all.css">
    <link rel="stylesheet" href="include/style/bootstrap.css">
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <?php
    session_start();
    if (!isset($_SESSION['loginadmin'])) {
        if (isset($_POST['ten_tk']) && isset($_POST['mat_khau'])) {
            $ten_tk = $_POST['ten_tk'];
            $mat_khau = $_POST['mat_khau'];
            
            $getdata = mysqli_query($conn, "SELECT mat_khau, quyen FROM users WHERE ten_tk = '$ten_tk'");
            $user = mysqli_fetch_assoc($getdata);

            if ($user && $mat_khau == $user['mat_khau']) {
                if ($user['quyen'] == 0) { 
                    $_SESSION['loginadmin'] = 2;
                    $_SESSION['user'] = $ten_tk;
                    $_SESSION['user_quyen'] = $user['quyen']; 
                } else {
                    echo '<script>alert("Bạn không có quyền truy cập trang quản lý")</script>';
                }
                unset($_POST['mat_khau']);
            } else {
                echo '<script>alert("Tài khoản hoặc mật khẩu không đúng")</script>';
            }
        }
    }

    if (isset($_POST['act'])) {
        unset($_POST['act']);
        unset($_SESSION['loginadmin']);
        if (isset($_SESSION['users'])) unset($_SESSION['users']);
    }

    if (isset($_SESSION['loginadmin']) && $_SESSION['user_quyen'] == 0) { 
        include 'trangquanly.php';
    } else {
        include 'login.php';
    }
    ?>
</body>
</html>
