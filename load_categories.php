<?php
include "admin/db_connect.php";

$sql = "SELECT * FROM category_list";
$result = mysqli_query($conn, $sql);

$html_markup = "";
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $category_id = $row["id"];
        $category_name = $row["name"];
        $html_markup .= "<option value='$category_id'>$category_name</option>";
    }
}

echo $html_markup;

mysqli_close($conn);
?>
