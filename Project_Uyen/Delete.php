<?php
if (isset($_GET['id'])) {
    $mobile_id = $_GET['id'];
    $conn = mysqli_connect('localhost', 'root', '');
    mysqli_select_db($conn, 'mobile_management');
    $sql = "
        DELETE FROM mobile
        WHERE mobile.id = $mobile_id
        ";
    mysqli_query($conn, $sql);
    header('Location: List.php');
}
