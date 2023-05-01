<style>
  .topsellerz h2 {
    color: #242526;
    font-size: 36px;
    font-weight: 500;
    text-transform: uppercase;
    margin-top: 50px;
  }

  hr.orange-line {
    border: 5px solid #E89548;
    border-radius: 5px;
    max-width: 250px;
  }



  /**
ASDASDASD

*/

  #featured-products {

    background: url(http://cdn.agilitycms.com/polaroid/landing-pages/holiday-guide-2017/snowflake-background.png);
    background-repeat: repeat;
    background-position: top left;
  }

  #featured-products .product-row {
    padding: 120px 0 0;
    align-items: center;
  }

  #featured-products .product-image {
    max-width: 400px;
    margin: 0 auto;
  }

  #featured-products .product-text {
    background: transparent;
  }

  #featured-products .product-title {
    font-size: 28px;
    color: #3d7ec5;
  }

  #featured-products p {
    line-height: 1.5;
    font-size: 19px;
  }

  #featured-products .product-buttons {
    align-self: flex-end;
    margin: 1em 0;
  }

  #featured-products a.shop.btn {
    font-size: 20px;
    font-weight: 600;
    color: #222;
    text-decoration: none;
    font-family: 'UniversLTPro-55Roman', arial, helvetica, sans-serif;
    margin: 10px 0 0;
    text-transform: uppercase;
    font-family: 'UniversLTPro-55Roman', arial, helvetica, sans-serif;
    padding: 14px 0 10px 2em;
    display: block;
    position: relative;
    background: url(http://cdn.agilitycms.com/polaroid/landing-pages/holiday-guide-2017/btn-icon-gray.png) no-repeat left center;
    background-size: auto;
    transition: filter .15s;
    -webkit-filter: opacity(1);
    filter: opacity(1);
  }

  #featured-products a.shop.btn:hover {
    color: #444444;
    -webkit-filter: opacity(.75);
    filter: opacity(.75);
  }

  #featured-products .product-row::after {
    content: "";
    display: block;
    clear: both;
    float: none;
  }

  #featured-products .product-row:nth-child(odd) {
    flex-direction: row-reverse;
  }


  @media (min-width: 576px) {
    .searchTerm {
      min-width: 800px;
      background-color: #fff;
      width: 100%;
    }
  }


  @media only screen and (min-width: 620px) {

    /* .product-row:nth-child(2n+2) {
      margin-top: 300px;
    } */
    #featured-products .product-row:nth-child(odd) .product-image {
      padding-left: 5%;
      padding-right: 0;
    }

    #featured-products .product-row {
      display: flex;
      margin-bottom: 0;
      max-height: 340px;
      min-height: 380px;
      align-items: center;
    }

    #featured-products .product-image {
      max-width: 420px;
      width: 45%;
      float: left;
      flex: 1 1 45%;
      padding-right: 5%;
      max-width: 45% !important;
      min-width: 320px;
    }

    #featured-products .product-text {
      display: flex;
      position: relative;
      width: 55%;
      float: right;
      flex: 1 1 55%;
      max-width: 55%;
      flex-flow: column;
      justify-content: center;
      align-items: flex-start;
    }

    #featured-products h4 {
      margin: 0 0 .5em 0;
      font-family: MuseoSans-500, arial, helvetica, sans-serif;
    }

    #featured-products p {
      padding-bottom: 1.8em;
    }

    #featured-products .product-buttons {
      display: flex;
      position: absolute;
      bottom: 0px;
      flex-flow: row wrap;
      align-self: flex-end;
    }

    .searchTerm {

      width: 200px;
    }

  }

  @media (max-width: 576px) {
    .searchTerm {
      width: 30px;
    }

    .search input {
      font-size: 20px;
      width: 30px;
    }
  }

  #home {
    display: flex;
    flex-direction: column;
    padding: 3px 200px;
    height: 550px;
    justify-content: center;
    align-items: center;
    margin-bottom: 90px;
  }

  #home::before {
    content: "";
    position: absolute;
    background: url("https://i.ibb.co/VxvVMz2/bg1.jpg") no-repeat center center/cover;
    height: 642px;
    top: 0px;
    left: 0px;
    width: 100%;
    z-index: -1;
    opacity: 0.89;
  }

  #home h1 {
    color: white;
    text-align: center;
    font-family: "Bree Serif", serif;
  }

  #home p {
    color: white;
    text-align: center;
    font-size: 1.5rem;
    font-family: "Bree Serif", serif;
  }

  .search input {
    font-size: 20px;
    width: 300px;
  }

  .search {
    position: relative;
    display: flex;
  }

  .searchTerm {

    border: 3px solid #242526;
    border-right: none;
    padding: 5px;
    border-radius: 15px 0 0 15px;
    outline: none;
    color: #242526;
    margin-bottom: 20px;
    border-top-left-radius: 90px;
    border-bottom-left-radius: 90px;
    padding: 15px;
    text-indent: 25px;
  }


  .searchTerm:focus {
    color: black;
  }

  .searchButton {
    width: 60px;
    height: 61px;
    border: 1px solid black;
    background: #242526;
    text-align: center;
    color: #fff;
    border-radius: 0 15px 15px 0;
    cursor: pointer;
    font-size: 20px;
  }

  .wrap {
    max-width: 960px;
    padding: 20px;
    display: flex;
  }

  .h-primary {
    display: flex;
    justify-content: center;
    align-items: center;
    min-width: 400px;
  }

  .filter{
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 15px;
  }

  .filter select{
    width:300px;
    font-size: 25px;
    border-radius: 90px;
  }

  .filter select{
    text-align: center;
  }
</style>
<link href="css/main.css" rel="stylesheet" />


<section id="home">
  <h1 class="h-primary">Axia Hotel Foods and Room Services</h1>


  <div class="wrap">
    <div class="search">
      <input type="text" id="search" class="searchTerm" placeholder="What are you looking for?">
      <button type="submit" class="searchButton" id="searchButton">
        <i class="fa fa-search"></i>
      </button>
    </div>
  </div>

</section>

  <div class="filter">
    <select name="" id="category">
      <option value="" disabled>Select category</option>
      <option value="all" selected>All</option>
    </select>
  </div>

  <div class="topsellerz">
    <h2>
      <center>MENU
        <hr class="orange-line" />
      </center>
    </h2>
  </div>
</section>

  <section class="page-section" id="menu">
    <div id="menu-field" class="card-deck">
    <?php
  include 'admin/db_connect.php';
  $qry = $conn->query("SELECT * FROM product_list order by price desc");
  while ($row = $qry->fetch_assoc()):
?>
    <br>
    <div class="col-lg-3" style="margin-bottom: 20px;">
      <div class="card menu-item ">
        <img style="height:400px;" src="assets/img/<?php echo $row['img_path'] ?>" class="card-img-top" alt="...">

        <div class="card-body">
          <h5 class="card-title">
            <?php echo $row['name'] ?>
          </h5>
          <p class="card-text truncate">
            <?php echo $row['description'] ?>
          </p>
          <h6 class="card-title">Price: P
            <?php echo $row['price'] ?>
          </h6>
          <div class="text-center">
            <button class="btn btn-sm btn-outline-primary view_prod btn-block" data-id=<?php echo $row['id'] ?>>
              <i class="fa fa-eye"></i> View
            </button>
          </div>
        </div>
      </div>
    </div>
  <?php endwhile; ?>

    </div>
  </section>


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