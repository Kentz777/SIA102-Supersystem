<div class="container-fluid">

	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Qty</th>
				<th>Order</th>
				<th>Amount</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$total = 0;
			include 'db_connect.php';
			$qry = $conn->query("SELECT * FROM order_list o inner join product_list p on o.product_id = p.id  where order_id =" . $_GET['id']);
			while ($row = $qry->fetch_assoc()) :
				$total += $row['qty'] * $row['price'];
			?>
				<tr>
					<td><?php echo $row['qty'] ?></td>
					<td><?php echo $row['name'] ?></td>
					<td><?php echo number_format($row['qty'] * $row['price'], 2) ?></td>
				</tr>
			<?php endwhile; ?>
		</tbody>
		<tfoot>
			<tr>
				
				<th colspan="2" class="text-right">TOTAL</th>
				<th><?php echo number_format($total, 2) ?></th>
			</tr>

		</tfoot>
	</table>
	<div class="text-center">
		<div class="form-group">
			<label for="" class="control-label">Status</label>
			<?php $status = 0 ?>
			<select name="status" id="status" class="custom-select browser-default">
				<option value="0" <?php echo $status == 0 ? "selected" : '' ?>>Pending</option>
				<option value="1" <?php echo $status == 1 ? "selected" : '' ?>>Processing</option>
				<option value="2" <?php echo $status == 2 ? "selected" : '' ?>>Ready to be Claim</option>
				<option value="3" <?php echo $status == 3 ? "selected" : '' ?>>Claimed</option>
			</select>
		</div>
		<button class="btn btn-primary" id="confirm" type="button" onclick="confirm_order()">Confirm</button>
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

	</div>
</div>
<style>
	#uni_modal .modal-footer {
		display: none
	}
</style>
<script>
	function confirm_order() {
    start_load();
    var status_val = $('#status').val();
    var id = <?php echo $_GET['id'] ?>;

    $.ajax({
        url: 'ajax.php?action=confirm_order',
        method: 'POST',
        data: {
            id: id,
            status_value: status_val
        },
        success: function(resp) {
            if (resp == 1) {
                var status_text = $('#status option:selected').text();
                alert_toast("Order status updated to '" + status_text + "'.");
                setTimeout(function() {
                    location.reload();
                }, 1500);
            }
        }
    });
}

</script>