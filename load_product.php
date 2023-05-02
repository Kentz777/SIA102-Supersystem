<?php
include "admin/db_connect.php";

$category = isset($_POST['category']) ? $_POST['category'] : 'all';

if ($category == 'all') {
    $sql = "SELECT * FROM product_list";
} else {
    $sql = "SELECT * FROM product_list WHERE category_id='$category'";
}

$result = mysqli_query($conn, $sql);

if (!$result) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}

$html_markup = "";
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $product_id = $row["id"];
        $product_name = $row["name"];
        $product_img = $row["img_path"];
        $product_desc = $row["description"];
        $product_price = $row["price"];
        $html_markup .= "<div class='col-lg-3' style='margin-bottom: 20px;'>";
        $html_markup .= "<div class='card menu-item'>";
        $html_markup .= "<img style='height:400px;' src='assets/img/$product_img' class='card-img-top' alt='...'>";
        $html_markup .= "<div class='card-body'>";
        $html_markup .= "<h5 class='card-title'>$product_name</h5>";
        $html_markup .= "<p class='card-text truncate'>$product_desc</p>";
        $html_markup .= "<h6 class='card-title'>Price: ₱$product_price</h6>";
        $html_markup .= "<div class='text-center'>";
        $html_markup .= "<button class='btn btn-sm btn-outline-primary view_prod btn-block' data-id=$product_id><i class='fa fa-eye'></i>View</button>";
        $html_markup .= "</div>";
        $html_markup .= "</div>";
        $html_markup .= "</div>";
        $html_markup .= "</div>";
    }
} else {
    $html_markup = "<p style='color:red; padding-left: 770px;'> No products found for this category.</p>";
}

echo $html_markup;

mysqli_close($conn);
?>
<script>

$(document).ready(function () {

  $.ajax({
    type: 'GET',
    url: 'load_categories.php',
    success: function(data){
      $('#category').append(data);
    }
  });

  $('#category').on('change', function () {
    var category = $(this).val();
    $.ajax({
      type: 'POST',
      url: 'load_product.php',
      data: { category: category },
      success: function (data) {
        $('#menu-field').html(data);
      }
    });
  });
});



$('.view_prod').click(function () {
    uni_modal_right('Product', 'view_prod.php?id=' + $(this).attr('data-id'))
})
</script>