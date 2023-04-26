<style>
   
</style>

<div class="containe-fluid">

	<div class="row">
		<div class="col-lg-12">
			
		</div>
	</div>

	<div class="row mt-3 ml-3 mr-3">
			<div class="col-lg-12">
			<div class="card">
				<div class="card-body">
				<?php echo "Welcome back ".$_SESSION['login_name']."!"  ?>
									
				</div>
				<hr>
				<div class="row">

				<!-- TOTAL PROFIT TODAY  -->
				<div class="alert alert-success col-md-3 ml-4">
					<p><b><large>Total Profit Today</large></b></p>
				<hr>
					<p class="text-right"><b><large><?php 
					include 'db_connect.php';
					$laundry = $conn->query("SELECT SUM(ol.amount) as amount FROM order_list ol join orders o on ol.order_id = o.order_id where o.status= 3 and DATE(o.date) = CURRENT_DATE");
					echo $laundry->num_rows > 0 ? number_format($laundry->fetch_array()['amount'],2) : "0.00";

					 ?></large></b></p>
				</div>

				<!-- TOTAL ORDERS TODAY  -->
				<div class="alert alert-info col-md-3 ml-4">
					<p><b><large>Total Orders Today</large></b></p>
				<hr>
					<p class="text-right"><b><large><?php 
					include 'db_connect.php';
					$laundry = $conn->query("SELECT count(id) as count FROM orders where date(date) = CURRENT_DATE");
					echo $laundry->num_rows > 0 ? number_format($laundry->fetch_array()['count']) : "0";

					 ?></large></b></p>
				</div>

				<!-- TOTAL PRODUCTS CLAIMED TODAY -->
				<div class="alert alert-success col-md-3 ml-4">
					<p><b><large>Total Order(s) Claimed Today</large></b></p>
				<hr>
					<p class="text-right"><b><large><?php 
					include 'db_connect.php';
					$laundry = $conn->query("SELECT count(id) as count FROM orders where status = 3 and date(date) = CURRENT_DATE");
					echo $laundry->num_rows > 0 ? number_format($laundry->fetch_array()['count']) : "0";

					 ?></large></b></p>
				</div>

<!-- TOTAL PRODUCTS CLAIMED TODAY -->
				<div class="alert alert-secondary col-md-3 ml-4">
					<p><b><large>Total Pending Order(s) Today</large></b></p>
				<hr>
					<p class="text-right"><b><large><?php 
					include 'db_connect.php';
					$laundry = $conn->query("SELECT count(id) as count FROM orders where status = 0 and date(date) = CURRENT_DATE");
					echo $laundry->num_rows > 0 ? number_format($laundry->fetch_array()['count']) : "0";

					 ?></large></b></p>
				</div>

<!-- TOTAL PRODUCTS CLAIMED TODAY -->
				<div class="alert alert-primary col-md-3 ml-4">
					<p><b><large>Total Processing Order(s) Today</large></b></p>
				<hr>
					<p class="text-right"><b><large><?php 
					include 'db_connect.php';
					$laundry = $conn->query("SELECT count(id) as count FROM orders where status = 1 and date(date) = CURRENT_DATE");
					echo $laundry->num_rows > 0 ? number_format($laundry->fetch_array()['count']) : "0";

					 ?></large></b></p>
				</div>

				<div class="alert alert-warning col-md-3 ml-4">
					<p><b><large>Total Ready to claim Order(s) Today</large></b></p>
				<hr>
					<p class="text-right"><b><large><?php 
					include 'db_connect.php';
					$laundry = $conn->query("SELECT count(id) as count FROM orders where status = 2 and date(date) = CURRENT_DATE");
					echo $laundry->num_rows > 0 ? number_format($laundry->fetch_array()['count']) : "0";

					 ?></large></b></p>
				</div>
				</div>
			</div>
			
		</div>
		</div>
	</div>

</div>
<script>
	
</script>