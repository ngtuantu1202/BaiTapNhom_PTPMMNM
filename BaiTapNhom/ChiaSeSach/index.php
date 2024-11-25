<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php 
    include 'connect.php'; 
    $icon = mysqli_fetch_assoc(mysqli_query($conn, "SELECT duong_dan FROM image__web WHERE ten='icon'"))['duong_dan'];
    ?>
    
    <title> Chia sẻ sách trực tuyến </title>
    
    <link rel="icon" href="<?php echo $icon; ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="include/style/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="cssfolder/user.css">
    
</head>
<body>
<?php
    session_start();
    //In thông báo ĐN hành công
    if (isset($_SESSION['success_message'])) {
        echo "<script>alert('{$_SESSION['success_message']}');</script>";
        unset($_SESSION['success_message']); 
    }

    include "giaodien/header.php";

    include "giaodien/user.php";

    include "giaodien/footer.php";
    
    mysqli_close($conn);
?>
</body>
</html>