<?php
include 'admin/db_connect.php';session_start();

$qry = $conn->query("SELECT * FROM  product_list where id = " . $_GET['id'])->fetch_array();

$toggle = $qry['prod_qty'] <= 0 ? 'disabled' : '';

$bgcolor = $qry['prod_qty'] <= 0 ? 'background-color:red; color:white;z-index:1;' : '';

$hidden = $qry['prod_qty'] <= 0 ? 'd-none' : 'd-block';

$stock = $qry['prod_qty'] <= 0 ? 'd-block' : 'd-none';

?>
<div class="container-fluid">

	<div class="card ">
		<img src="assets/img/<?php echo $qry['img_path'] ?>" class="card-img-top" alt="...">
		<div class="card-body">
			<h5 class="card-title"><?php echo $qry['name'] ?></h5>
			<p class="card-text truncate"><?php echo $qry['description'] ?></p>
			<p class="card-text">Price: P<?php echo $qry['price'] ?></p>
			<div class="form-group">
			</div>
			<div class="row <?php echo $stock ?>">
			<center>	<h5 style="color:red";>Out of Stock</h5></center>
			</div>
			<div class="row <?php echo $hidden ?>">
				<div class="col-md-2"><label class="control-label">Qty</label></div>
				<div class="input-group col-md-7 mb-3">
					<div class="input-group-prepend">
						<button class="btn1 btn-outline-secondary" type="button" id="qty-minus"><span class="fa fa-minus"></button>
					</div>
					<input type="number" readonly value="1" min=1 max=<?php echo $qry['prod_qty'] ?> class="form-control text-center" name="qty">
					<div class="input-group-prepend">
						<button class="btn1 btn-outline-secondary" type="button" id="qty-plus"><span class="fa fa-plus"></span></button>
					</div>
				</div>
			</div>
			<div class="text-center">
				<button class="btn btn-outline-primary btn-sm btn-block " style="<?php echo $bgcolor ?>" id="add_to_cart_modal" <?php echo $toggle ?>><i class="fa fa-cart-plus"></i>Add to Cart</button>
			</div>
		</div>

	</div>
</div>
<style>
	#uni_modal_right .modal-footer {
		display: none;
	}
</style>

<script>
	$('#qty-minus').click(function() {
		var qty = $('input[name="qty"]').val();
		if (qty == 1) {
			return false;
		} else {
			$('input[name="qty"]').val(parseInt(qty) - 1);
		}
	})
	$('#qty-plus').click(function() {
		var qty = $('input[name="qty"]').val();
		if (parseInt(qty) >= <?php echo $qry['prod_qty'] ?>) {
			return false;
		} else {
			$('input[name="qty"]').val(parseInt(qty) + 1);
		}
	})

	$('#add_to_cart_modal').click(function() {
		if ($(this).attr('disabled')) {
			return false;
		}
		$.ajax({
			url: 'admin/ajax.php?action=add_to_cart',
			method: 'POST',
			data: {
				pid: '<?php echo $_GET['id'] ?>',
				qty: $('[name="qty"]').val()
			},
			success: function(resp) {
				if (resp == 1)
					alert_toast("Order successfully added to cart");
				$('.item_count').html(parseInt($('.item_count').html()) + parseInt($('[name="qty"]').val()))
				$('.modal').modal('hide')

					end_load()
				}
			})
	})
</script>