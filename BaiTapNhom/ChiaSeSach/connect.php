<?php
// DEFINE('BD_USER', 'root');
// DEFINE('DB_PASSWORD', '');
// DEFINE('BD_HOST', 'localhost');
// DEFINE('BD_NAME', 'sharesach'); 

// $conn = @mysqli_connect(BD_HOST, BD_USER, DB_PASSWORD, BD_NAME)
//     OR DIE('Không thể kết nối MySQL: ' . mysqli_connect_error());

// mysqli_set_charset($conn, 'utf8');
?>

<?php
    $servername = "localhost";
    $username = "root";
    $database = "sharesach";
    $password = "";
    $conn = new mysqli($servername, $username,   $password, $database)
        OR DIE('Không thể kết nối MySQL: ' . mysqli_connect_error());

    mysqli_set_charset($conn, 'UTF8');
    //session_start();
?>