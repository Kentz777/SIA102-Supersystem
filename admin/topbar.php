<style>
img{
  width: 100px;
  margin-left: 20px;
}
.ml-20 {
    margin-left: 100px;
}
</style>

<nav class="navbar navbar-dark bg-dark fixed-top " style="padding:5px;">
  <div class="container-fluid mt-2 mb-2">
  	<div class="col-lg-12">
  		<div class="col-md-1 float-left" style="display: flex;">
  			<div>
  				<!-- <i class="fa fa-building"></i> -->
          <img src="https://images.squarespace-cdn.com/content/v1/63bc1efdf477a80d5a71c03c/f42ae550-792e-4cd6-b5c9-988c895211d1/cropped-AXIAA-FINAL-LOGO-noBG-e1592377088481.png" style="width:130px; height:35px;"alt="">
  			</div>
  		</div>
      <div class="col-md-5 float-left ml-20 text-white">
      <strong><large><?php echo $_SESSION['setting_name'] ?></large></strong>
      </div>
	  	<div class="col-md-2 float-right text-white">
	  		<a href="ajax.php?action=logout" class="text-white"><?php echo $_SESSION['login_name'] ?> <i class="fa fa-power-off"></i></a>
	    </div>
    </div>
  </div>

</nav>
