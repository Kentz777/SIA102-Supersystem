<?php
include('admin/db_connect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $orderId = $_POST['orderId'];
    
    // Update the status in the database
    $sql = "UPDATE orders SET status= 3 WHERE order_id='$orderId'";
    
    if ($conn->query($sql) === TRUE) {
      echo "Status updated successfully";
    } else {
      echo "Error updating status: " . $conn->error;
    }
    
    // Close the database connection
    $conn->close();
  }
  
?>
