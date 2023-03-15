<style>
    .topsellerz h2{
        color:#242526;
        font-size:36px;
        font-weight: 500;
        text-transform: uppercase;
        margin-top: 50px;
    }
    hr.orange-line {
  border: 5px solid #E89548;
  border-radius: 5px;
  max-width:250px;
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
.slider-pagi__elem.active:before, .slider-pagi__elem:hover:before {
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
  background-image: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/142996/3d-slider-2.jpg");
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
  background-image: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/142996/3d-slider-1.jpg");
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
    font-family: 'UniversLTPro-55Roman',arial,helvetica,sans-serif;
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
				max-width: 45%!important;
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


</style>
        <link href="css/main.css" rel="stylesheet" />


        <section class="home" id="home">
            <div class="container">
                <div class="home-wrapper d-grid">
                    <div class="col-left">
                        <h3>Welcome TO</h3>
                        <h1>Foods And<br>Room Services</h1>

                        <p>Vestibulum sed augue ac lorem rutrum congue. Donec cursus mollis sapien, non vulputate odio
                            congue id. Sed mattis, tortor nec facilisis laoreet, mauris magna finibus nisl, eu pulvinar
                            erat libero in turpis. </p>
                        <a href="items.php" class="btn">Order Now</a>

                    </div>
                    <div class="col-right">
                        <img data-tilt src="./assets/img/hero-banner.png" alt="Home image" class="img-fluid">
                    </div>
                </div>
            </div>

        </section>



            <div class="topsellerz">
        <h2><center>Top Sellers
            <hr class="orange-line"/>
        </center></h2>
        
       </div>
        <div id="menu-field" class="card-deck">
                <?php 
                    include'admin/db_connect.php';
                    $qry = $conn->query("SELECT * FROM  product_list order by rand() ");
                    while($row = $qry->fetch_assoc()):
                    ?>
                    <?php "<br>" ?>
                    <div class="col-lg-3" style="margin-bottom: 20px;">
                     <div class="card menu-item ">
                        <img style="height:400px;"src="assets/img/<?php echo $row['img_path'] ?>" class="card-img-top" alt="...">
                        
                        <div class="card-body">
                          <h5 class="card-title"><?php echo $row['name'] ?></h5>
                          <p class="card-text truncate"><?php echo $row['description'] ?></p>
                          <h6 class="card-title">Price: $<?php echo $row['price'] ?></h6>
                          <div class="text-center">
                              <button class="btn btn-sm btn-outline-primary view_prod btn-block" data-id=<?php echo $row['id'] ?>><i class="fa fa-eye"></i> View</button>
                              
                          </div>
                        </div>
                        
                      </div>
                      </div>
                    <?php endwhile; ?>
        </div>
        </section>
        
        


        <div class="slider-container">
  <div class="slider-control left inactive"></div>
  <div class="slider-control right"></div>
  <ul class="slider-pagi"></ul>
  <div class="slider">
    <div class="slide slide-0 active">
      <div class="slide__bg"></div> 
      <div class="slide__content">
        <svg class="slide__overlay" viewBox="0 0 720 405" preserveAspectRatio="xMaxYMax slice">
          <path class="slide__overlay-path" d="M0,0 150,0 500,405 0,405" />
        </svg>
        <div class="slide__text">
          <h2 class="slide__text-heading">Project name 1</h2>
          <p class="slide__text-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio veniam minus illo debitis nihil animi facere, doloremque voluptate tempore quia. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio veniam minus illo debitis nihil animi facere, doloremque voluptate tempore quia.</p>
          <a class="slide__text-link">Project link</a>
        </div>
      </div>
    </div>
    <div class="slide slide-1 ">
      <div class="slide__bg"></div>
      <div class="slide__content">
        <svg class="slide__overlay" viewBox="0 0 720 405" preserveAspectRatio="xMaxYMax slice">
          <path class="slide__overlay-path" d="M0,0 150,0 500,405 0,405" />
        </svg>
        <div class="slide__text">
          <h2 class="slide__text-heading">Project name 2</h2>
          <p class="slide__text-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio veniam minus illo debitis nihil animi facere, doloremque voluptate tempore quia. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio veniam minus illo debitis nihil animi facere, doloremque voluptate tempore quia.</p>
          <a class="slide__text-link">Project link</a>
        </div>
      </div>
    </div>
    <div class="slide slide-2">
      <div class="slide__bg"></div>
      <div class="slide__content">
        <svg class="slide__overlay" viewBox="0 0 720 405" preserveAspectRatio="xMaxYMax slice">
          <path class="slide__overlay-path" d="M0,0 150,0 500,405 0,405" />
        </svg>
        <div class="slide__text">
          <h2 class="slide__text-heading">Project name 3</h2>
          <p class="slide__text-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio veniam minus illo debitis nihil animi facere, doloremque voluptate tempore quia. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio veniam minus illo debitis nihil animi facere, doloremque voluptate tempore quia.</p>
          <a class="slide__text-link">Project link</a>
        </div>
      </div>
    </div>
    <div class="slide slide-3">
      <div class="slide__bg"></div>
      <div class="slide__content">
        <svg class="slide__overlay" viewBox="0 0 720 405" preserveAspectRatio="xMaxYMax slice">
          <path class="slide__overlay-path" d="M0,0 150,0 500,405 0,405" />
        </svg>
        <div class="slide__text">
          <h2 class="slide__text-heading">Project name 4</h2>
          <p class="slide__text-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio veniam minus illo debitis nihil animi facere, doloremque voluptate tempore quia. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio veniam minus illo debitis nihil animi facere, doloremque voluptate tempore quia.</p>
          <a class="slide__text-link">Project link</a>
        </div>
      </div>
    </div>
  </div>
</div>

     
      

<section id="featured-products">
		<div class="content-container">
			
			<div id="os2" class="product-row">
				<div class="product-image"><img src="http://cdn.agilitycms.com/polaroid/landing-pages/holiday-guide-2017/onestep2.png"></div>
				<div class="product-text">
					<h4 class="product-title">The Return of a Holiday Classic</h4>
					<p>Capture and share your favorite moments with an instant classic, the new Polaroid OneStep 2 analog instant camera.</p>
				
				</div>
			</div>
			<div class="product-row">
				<div class="product-image"><img src="http://cdn.agilitycms.com/polaroid/landing-pages/holiday-guide-2017/600-film-2.png"></div>
				<div class="product-text">
					<h4 class="product-title">Celebrate with a Vintage Flair</h4>
					<p>Recreate old holiday memories or make new ones with instant film for classic Polaroid 600, SX-70 and Spectra cameras as well as the new i-Type film for the Polaroid OneStep 2.</p>
					
				</div>
			</div>
			
			<div class="product-row">
				<div class="product-image"><img src="http://cdn.agilitycms.com/polaroid/landing-pages/holiday-guide-2017/polaroid-pop.png"></div>
				<div class="product-text">
					<h4 class="product-title">Make the Holidays POP</h4>
					<p>Retro style with a modern twist. Shoot, edit and share all the festivities in the 3.5x4.25" Polaroid border format with the Polaroid Pop instant digital camera.</p>
				
				</div>
			</div>
			<div class="product-row">
				<div class="product-image"><img src="http://cdn.agilitycms.com/polaroid/landing-pages/holiday-guide-2017/snap.png"></div>
				<div class="product-text">
					<h4 class="product-title">Share the Joy in a Snap</h4>
					<p>Snap, print and share the joys of the season in fun 2x3" prints with the Polaroid Snap Touch instant digital camera.</p>
					
				</div>
			</div>
			<div class="product-row">
				<div class="product-image"><img src="http://cdn.agilitycms.com/polaroid/landing-pages/holiday-guide-2017/polaroid-zip.png"></div>
				<div class="product-text">
					<h4 class="product-title">Spread the Cheer</h4>
					<p>Customize, print and share good tidings instantly, all from your smartphone with the Polaroid Zip instant photoprinter.</p>
					
				</div>
			</div>
			<div class="product-row">
				<div class="product-image"><img src="http://cdn.agilitycms.com/polaroid/landing-pages/holiday-guide-2017/polaroid-tv.png"></div>
				<div class="product-text">
					<h4 class="product-title">Merry & Bright</h4>
					<p>Kick off holiday movie marathons right with the brighter, picture perfect display of Polaroid HDTVs.</p>
				
				</div>
			</div>
			<div class="product-row">
				<div class="product-image"><img src="http://cdn.agilitycms.com/polaroid/landing-pages/holiday-guide-2017/3d-pen.png"></div>
				<div class="product-text">
					<h4 class="product-title">Believe in Magic</h4>
					<p>Perfect for kids and kids at heart. Let your imagination soar as you bring festive creations to life with the Polaroid Draw 3D pen.</p>
					
				</div>
			</div>
			<div class="product-row">
				<div class="product-image"><img src="http://cdn.agilitycms.com/polaroid/landing-pages/holiday-guide-2017/polaroid-frame.png"></div>
				<div class="product-text">
					<h4 class="product-title">Deck the Halls</h4>
					<p>Illuminate your mantle with holiday images or gift a string of memories to someone special with the Polaroid photo frame.</p>
				
				</div>
			</div>
			<div class="product-row">
				<div class="product-image"><img src="http://cdn.agilitycms.com/polaroid/landing-pages/holiday-guide-2017/motomod-2.png"></div>
				<div class="product-text">
					<h4 class="product-title">Snap, Print & Share Anywhere</h4>
					<p>Turn your moto z into a super-portable Polaroid camera, complete with a physical photo capture button. Shoot pics in the moment or select your favorite shots on social media, add fun filters, then print–right from your phone.</p>
					
				</div>
			</div>
			<div class="product-row">
				<div class="product-image"><img src="http://cdn.agilitycms.com/polaroid/landing-pages/holiday-guide-2017/apparel.png"></div>
				<div class="product-text">
					<h4 class="product-title">Arrive in Style</h4>
					<p>Upgrade your look this season with the classic design and vintage feel of Polaroid apparel.</p>
					
				</div>
			</div>
		</div>
		
	</section>



	
    
    <script>
        $('.view_prod').click(function(){
            uni_modal_right('Product','view_prod.php?id='+$(this).attr('data-id'))
        })


        $(document).ready(function () {
  var $slider = $(".slider"),
    $slideBGs = $(".slide__bg"),
    diff = 0,
    curSlide = 0,
    numOfSlides = $(".slide").length - 1,
    animating = false,
    animTime = 500,
    autoSlideTimeout,
    autoSlideDelay = 6000,
    $pagination = $(".slider-pagi");

  function createBullets() {
    for (var i = 0; i < numOfSlides + 1; i++) {
      var $li = $("<li class='slider-pagi__elem'></li>");
      $li.addClass("slider-pagi__elem-" + i).data("page", i);
      if (!i) $li.addClass("active");
      $pagination.append($li);
    }
  }

  createBullets();

  function manageControls() {
    $(".slider-control").removeClass("inactive");
    if (!curSlide) $(".slider-control.left").addClass("inactive");
    if (curSlide === numOfSlides)
      $(".slider-control.right").addClass("inactive");
  }

  function autoSlide() {
    autoSlideTimeout = setTimeout(function () {
      curSlide++;
      if (curSlide > numOfSlides) curSlide = 0;
      changeSlides();
    }, autoSlideDelay);
  }

  autoSlide();

  function changeSlides(instant) {
    if (!instant) {
      animating = true;
      manageControls();
      $slider.addClass("animating");
      $slider.css("top");
      $(".slide").removeClass("active");
      $(".slide-" + curSlide).addClass("active");
      setTimeout(function () {
        $slider.removeClass("animating");
        animating = false;
      }, animTime);
    }
    window.clearTimeout(autoSlideTimeout);
    $(".slider-pagi__elem").removeClass("active");
    $(".slider-pagi__elem-" + curSlide).addClass("active");
    $slider.css("transform", "translate3d(" + -curSlide * 100 + "%,0,0)");
    $slideBGs.css("transform", "translate3d(" + curSlide * 50 + "%,0,0)");
    diff = 0;
    autoSlide();
  }

  function navigateLeft() {
    if (animating) return;
    if (curSlide > 0) curSlide--;
    changeSlides();
  }

  function navigateRight() {
    if (animating) return;
    if (curSlide < numOfSlides) curSlide++;
    changeSlides();
  }

  $(document).on("mousedown touchstart", ".slider", function (e) {
    if (animating) return;
    window.clearTimeout(autoSlideTimeout);
    var startX = e.pageX || e.originalEvent.touches[0].pageX,
      winW = $(window).width();
    diff = 0;

    $(document).on("mousemove touchmove", function (e) {
      var x = e.pageX || e.originalEvent.touches[0].pageX;
      diff = ((startX - x) / winW) * 70;
      if ((!curSlide && diff < 0) || (curSlide === numOfSlides && diff > 0))
        diff /= 2;
      $slider.css(
        "transform",
        "translate3d(" + (-curSlide * 100 - diff) + "%,0,0)"
      );
      $slideBGs.css(
        "transform",
        "translate3d(" + (curSlide * 50 + diff / 2) + "%,0,0)"
      );
    });
  });

  $(document).on("mouseup touchend", function (e) {
    $(document).off("mousemove touchmove");
    if (animating) return;
    if (!diff) {
      changeSlides(true);
      return;
    }
    if (diff > -8 && diff < 8) {
      changeSlides();
      return;
    }
    if (diff <= -8) {
      navigateLeft();
    }
    if (diff >= 8) {
      navigateRight();
    }
  });

  $(document).on("click", ".slider-control", function () {
    if ($(this).hasClass("left")) {
      navigateLeft();
    } else {
      navigateRight();
    }
  });

  $(document).on("click", ".slider-pagi__elem", function () {
    curSlide = $(this).data("page");
    changeSlides();
  });
});

    </script>
	
