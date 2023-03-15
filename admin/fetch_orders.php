<?php
include 'db_connect.php';

$order = array();

$sql = "SELECT * FROM orders o join order_list ol on o.id = ol.order_id join product_list pl on ol.product_id = pl.id";
$result = mysqli_query($conn, $sql);





if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $order = array(
            "id" => $row["id"],
            "item" => $row["name"],
            "qty" => $row["qty"],
            "status" => $row["status"]
            //"total" => $row["customerPhone"],
            //"date" => $row["itemName"],
        );
        array_push($orders, $order);
    }
}
echo json_encode($orders);
?>