<?php

include('admin/db_connect.php');


if (isset($_POST['qr'])) {
    $text = $_POST['qr'];

    $sql = "SELECT room_no FROM  booking_details where room_no = '$text'";

    $result = $conn->query($sql);

    $message = "GAGO";

    if ($result->num_rows > 0) {
        header("Location: index.php?room_no=$text");
    } else {
        echo "<script>alert('$message');</script>";
        header("Location: landing.php");
    }
}
