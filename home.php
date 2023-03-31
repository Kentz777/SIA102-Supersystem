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

  svg {
    display: block;
    overflow: visible;
  }

  .slider-container {
    position: relative;
    height: 100%;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    cursor: all-scroll;
  }

  .slider-control {
    z-index: 2;
    position: absolute;
    top: 0;
    width: 12%;
    height: 100%;
    transition: opacity 0.3s;
    will-change: opacity;
    opacity: 0;
  }

  .slider-control.inactive:hover {
    cursor: auto;
  }

  .slider-control:not(.inactive):hover {
    opacity: 1;
    cursor: pointer;
  }

  .slider-control.left {
    left: 0;
    background: linear-gradient(to right, rgba(0, 0, 0, 0.18) 0%, rgba(0, 0, 0, 0) 100%);
  }

  .slider-control.right {
    right: 0;
    background: linear-gradient(to right, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.18) 100%);
  }

  .slider-pagi {
    position: absolute;
    z-index: 3;
    left: 50%;
    bottom: 2rem;
    transform: translateX(-50%);
    font-size: 0;
    list-style-type: none;
  }

  .slider-pagi__elem {
    position: relative;
    display: inline-block;
    vertical-align: top;
    width: 2rem;
    height: 2rem;
    margin: 0 0.5rem;
    border-radius: 50%;
    border: 2px solid #fff;
    cursor: pointer;
  }

  .slider-pagi__elem:before {
    content: "";
    position: absolute;
    left: 50%;
    top: 50%;
    width: 1.2rem;
    height: 1.2rem;
    background: #fff;
    border-radius: 50%;
    transition: transform 0.3s;
    transform: translate(-50%, -50%) scale(0);
  }

  .slider-pagi__elem.active:before,
  .slider-pagi__elem:hover:before {
    transform: translate(-50%, -50%) scale(1);
  }

  .slider {
    z-index: 1;
    position: relative;
    height: 100%;
  }

  .slider.animating {
    transition: transform 0.5s;
    will-change: transform;
  }

  .slider.animating .slide__bg {
    transition: transform 0.5s;
    will-change: transform;
  }

  .slide {
    position: absolute;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: hidden;
  }

  .slide.active .slide__overlay,
  .slide.active .slide__text {
    opacity: 1;
    transform: translateX(0);
  }

  .slide__bg {
    position: absolute;
    top: 0;
    left: -50%;
    width: 100%;
    height: 100%;
    background-size: cover;
    will-change: transform;
  }

  .slide:nth-child(1) {
    left: 0;
  }

  .slide:nth-child(1) .slide__bg {
    left: 0;
    background-image: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/142996/3d-slider-3.jpg");
  }

  .slide:nth-child(1) .slide__overlay-path {
    fill: #e99c7e;
  }

  @media (max-width: 991px) {
    .slide:nth-child(1) .slide__text {
      background-color: rgba(233, 156, 126, 0.8);
    }
  }

  .slide:nth-child(2) {
    left: 100%;
  }

  .slide:nth-child(2) .slide__bg {
    left: -50%;
    background-image: url("https://cmkt-image-prd.freetls.fastly.net/0.1.0/ps/3365223/1360/906/m1/fpnw/wm1/azc0jgm8wozxptqcl77j7z2z8kqpii6h8j5n0mh4j6ssidiqaztegfdehuzwfvrg-.jpg?1507211608&s=0573f8b1adf10fa1f09c7153094fd960");
  }

  .slide:nth-child(2) .slide__overlay-path {
    fill: #e1ccae;
  }

  @media (max-width: 991px) {
    .slide:nth-child(2) .slide__text {
      background-color: rgba(225, 204, 174, 0.8);
    }
  }

  .slide:nth-child(3) {
    left: 200%;
  }

  .slide:nth-child(3) .slide__bg {
    left: -100%;
    background-image: url("https://focushospitalitymanagement.com/wp-content/uploads/2018/11/staff-hotel-managment-tucson.jpg");
  }

  .slide:nth-child(3) .slide__overlay-path {
    fill: #adc5cd;
  }

  @media (max-width: 991px) {
    .slide:nth-child(3) .slide__text {
      background-color: rgba(173, 197, 205, 0.8);
    }
  }

  .slide:nth-child(4) {
    left: 300%;
  }

  .slide:nth-child(4) .slide__bg {
    left: -150%;
    background-image: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/142996/3d-slider-4.jpg");
  }

  .slide:nth-child(4) .slide__overlay-path {
    fill: #cbc6c3;
  }

  @media (max-width: 991px) {
    .slide:nth-child(4) .slide__text {
      background-color: rgba(203, 198, 195, 0.8);
    }
  }

  .slide__content {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
  }

  .slide__overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    height: 100%;
    min-height: 810px;
    transition: transform 0.5s 0.5s, opacity 0.2s 0.5s;
    will-change: transform, opacity;
    transform: translate3d(-20%, 0, 0);
    opacity: 0;
  }

  @media (max-width: 991px) {
    .slide__overlay {
      display: none;
    }
  }

  .slide__overlay path {
    opacity: 0.8;
  }

  .slide__text {
    position: absolute;
    width: 25%;
    bottom: 15%;
    left: 12%;
    color: #fff;
    transition: transform 0.5s 0.8s, opacity 0.5s 0.8s;
    will-change: transform, opacity;
    transform: translateY(-50%);
    opacity: 0;
  }

  @media (max-width: 991px) {
    .slide__text {
      left: 0;
      bottom: 0;
      width: 100%;
      height: 20rem;
      text-align: center;
      transform: translateY(50%);
      transition: transform 0.5s 0.5s, opacity 0.5s 0.5s;
      padding: 0 1rem;
    }
  }

  .slide__text-heading {
    font-family: "Polar", Helvetica, Arial, sans-serif;
    font-size: 5rem;
    margin-bottom: 2rem;
  }

  @media (max-width: 991px) {
    .slide__text-heading {
      line-height: 20rem;
      font-size: 3.5rem;
    }
  }

  .slide__text-desc {
    font-family: "Open Sans", Helvetica, Arial, sans-serif;
    font-size: 1.8rem;
    margin-bottom: 1.5rem;
  }

  @media (max-width: 991px) {
    .slide__text-desc {
      display: none;
    }
  }

  .slide__text-link {
    z-index: 5;
    display: inline-block;
    position: relative;
    padding: 0.5rem;
    cursor: pointer;
    font-family: "Open Sans", Helvetica, Arial, sans-serif;
    font-size: 2.3rem;
    perspective: 1000px;
  }

  @media (max-width: 991px) {
    .slide__text-link {
      display: none;
    }
  }

  .slide__text-link:before {
    z-index: -1;
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: #000;
    transform-origin: 50% 100%;
    transform: rotateX(-85deg);
    transition: transform 0.3s;
    will-change: transform;
  }

  .slide__text-link:hover:before {
    transform: rotateX(0);
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
  }

  .search {
    width: 100%;
    position: relative;
    display: flex;

  }

  .searchTerm {
    min-width: 800px;
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
</style>
<link href="css/main.css" rel="stylesheet" />


<section id="home">
  <h1 class="h-primary">Axia Hotel  Foods and Room Services</h1>


  <div class="wrap">
    <div class="search">
      <input type="text" class="searchTerm" placeholder="What are you looking for?">
      <button type="submit" class="searchButton" id="searchButton">
        <i class="fa fa-search"></i>
      </button>
    </div>
  </div>

</section>



<div class="form-group">
  <label class="control-label">Category </label>
  <select name="category_id" id="category_fetch" class="custom-select browser-default">
    <?php
    $cat = $conn->query("SELECT * FROM category_list order by name asc ");
    while ($row = $cat->fetch_assoc()) :
    ?>
      <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
    <?php endwhile; ?>
  </select>



  <div class="topsellerz">
    <h2>
      <center>Top Sellers
        <hr class="orange-line" />
      </center>
    </h2>
  </div>
  </section>


  <script>
    $('.view_prod').click(function() {
      uni_modal_right('Product', 'view_prod.php?id=' + $(this).attr('data-id'))
    });
  </script>