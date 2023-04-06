<style>
</style>
<nav id="sidebar" class='mx-lt-5 bg-dark'>

	<div class="sidebar-list" style="padding-top:5px;">

		<a href="index.php?page=home" class="nav-item nav-home"><span class='icon-field'><i class="fa fa-home"></i></span> Home</a>
		<a href="index.php?page=orders" class="nav-item nav-orders"><span class='icon-field'><i class="fa fa-list"></i></span>Orders</a>
		<a href="index.php?page=categories" class="nav-item nav-categories"><span class='icon-field'><i class="fa fa-list"></i></span>Category List</a>
		<a href="index.php?page=menu" class="nav-item nav-menu"><span class='icon-field'><i class="fa fa-list"></i></span>Products</a>

		<a href="index.php?page=food_inventory" class="nav-item nav-foodinventory"><span class='icon-field'><i class="fa fa-archive"></i></span>Product Inventory</a>

		<?php if ($_SESSION['login_type'] == 1) : ?>
			<!--<a href="index.php?page=guest" class="nav-item nav-guests"><span class='icon-field'><i class="fa fa-users"></i></span> Guests</a> --->
		<!---	<a href="index.php?page=users" class="nav-item nav-users"><span class='icon-field'><i class="fa fa-users"></i></span> Staffs</a> --->

			<a data-bs-toggle="collapse" class="nav-item nav-services" data-bs-target="#demo" style="cursor:pointer"><span class='icon-field'><i class="fa fa-wrench"></i></span>Services</a>

			<div id="demo" class="collapse">
				<a href="index.php?page=laundry" class="nav-item nav-laundry"><span class='icon-field'><i class="fa fa-water"></i></span> Laundry List</a>
				<a href="index.php?page=laundry_category" class="nav-item nav-categories"><span class='icon-field'><i class="fa fa-list"></i></span> Laundry Category</a>
				<a href="index.php?page=supply" class="nav-item nav-supply"><span class='icon-field'><i class="fa fa-boxes"></i></span> Supply List</a>
				<a href="index.php?page=inventory" class="nav-item nav-inventory"><span class='icon-field'><i class="fa fa-list-alt"></i></span> Inventory</a>
				<a href="index.php?page=qr_gen" class="nav-item nav-inventory"><span class='icon-field'><i class="fa fa-list-alt"></i></span> QR Generator</a>
			</div>

			<a href="index.php?page=site_settings" class="nav-item nav-site_settings"><span class='icon-field'><i class="fa fa-cogs"></i></span>Settings</a>
			<a href="index.php?page=reports" class="nav-item nav-reports"><span class='icon-field'><i class="fa fa-th-list"></i></span> Reports</a>

		<?php endif; ?>
	</div>

</nav>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
	$('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
</script>