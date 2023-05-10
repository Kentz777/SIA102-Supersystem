<?php include('admin/db_connect.php'); ?>
<div class="container">
	<div class="card">
		<div class="card-body">
			<form action="" id="checkout-frm">
				<h4>Confirm Delivery Information</h4>
				<div class="form-group">
					<label for="" class="control-label">Guest Name</label>
					<input type="text" name="user" readonly required="" class="form-control"
						value="<?php echo $_GET['user_name'] ?>">
				</div>
				<div class="form-group">
					<label for="" class="control-label">Room No.</label>
					<input type="text" name="room_no" readonly required="" class="form-control"
						value="<?php echo $_GET['room_no'] ?>">
				</div>


				<?php
				if (isset($_GET['user_id'])) {
					$data = "where c.user_id = '" . $_GET['user_id'] . "' ";
				} else {
					$ip = isset($_SERVER['HTTP_CLIENT_IP'])
						? $_SERVER['HTTP_CLIENT_IP']
						: (isset($_SERVER['HTTP_X_FORWARDED_FOR'])
							? $_SERVER['HTTP_X_FORWARDED_FOR']
							: $_SERVER['REMOTE_ADDR']);
					$data = "where c.client_ip = '" . $ip . "' ";
				}
				$total = 0;
				$get = $conn->query("SELECT *,c.id as cid, p.prod_qty as pqty FROM cart c inner join product_list p on p.id = c.product_id " . $data);
				while ($row = $get->fetch_assoc()):
					$total += ($row['qty'] * $row['price']);
					?>
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-md-4" style="text-align: -webkit-center">
									<img src="assets/img/<?php echo $row['img_path'] ?>" alt="">
								</div>
								<div class="col-md-4">
									<p><b>
											<large>
												<?php echo $row['name'] ?>
											</large>
										</b></p>
									<p class='truncate'> <b><small>Desc :
												<?php echo $row['description'] ?>
											</small></b></p>
									<p> <b><small>Unit Price :
												<?php echo number_format($row['price'], 2) ?>
											</small></b></p>
									<p><small>QTY :</small></p>
									<div class="input-group mb-3">
										<input type="hidden" name="" id="prod_qty" value="<?php echo $row['prod_qty'] ?>">
										<input type="number" readonly value="<?php echo $row['qty'] ?>" min=1
											class="form-control text-center" name="qty">
									</div>
								</div>
								<div class="col-md-4 text-right">
									<b>
										<large>
											<?php echo number_format($row['qty'] * $row['price'], 2) ?>
										</large>
									</b>
								</div>
							</div>
						</div>
					</div>

				<?php endwhile; ?>

				<div class="text-center">
					<button class="btn btn-block btn-outline-primary">Place Order</button>
				</div>
			</form>
		</div>
	</div>
</div>
<style>
	#uni_modal .modal-footer{
		display:none;
	}
</style>
<script>
	$(document).ready(function () {
		$('#checkout-frm').submit(function (e) {
			e.preventDefault()

			start_load()
			$.ajax({
				url: "admin/ajax.php?action=save_order",
				method: 'POST',
				data: $(this).serialize(),
				success: function (resp) {
					if (resp == 1) {
						alert_toast("Order successfully Placed.")
						setTimeout(function () {
							location.replace('index.php?page=home')
						}, 1500)
					}
				}
			})
		})
	})
</script>