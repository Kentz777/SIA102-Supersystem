<?php
include('admin/db_connect.php');

if (isset($_POST['$request']))
    $request = $_POST['$request'];

$qry = "SELECT * FROM product_list WHERE category_id = '$request'";
$result = mysqli_query($conn, $qry);
$count =  mysqli_num_rows($result);

?>

<div id="menu-field" class="card-deck">
    <?php

    if ($count) {

    ?>
    <?php
    while ($row = mysqli_fetch_assoc($result)) :
    ?>
      <?php "<br>" ?>
      <div class="col-lg-3" style="margin-bottom: 20px;">
        <div class="card menu-item ">
          <img style="height:400px;" src="assets/img/<?php echo $row['img_path'] ?>" class="card-img-top" alt="...">

          <div class="card-body">   
            <h5 class="card-title"><?php echo $row['name'] ?></h5>
            <p class="card-text truncate"><?php echo $row['description'] ?></p>
            <h6 class="card-title">Price: P<?php echo $row['price'] ?></h6>
            <div class="text-center">
              <button class="btn btn-sm btn-outline-primary view_prod btn-block" data-id=<?php echo $row['id'] ?>><i class="fa fa-eye"></i> View</button>

            </div>
          </div>

        </div>
      </div>
    <?php endwhile; ?>
        
    <?php
    } else {
        echo 'Sorry no results found';
    }
    ?>
</div>