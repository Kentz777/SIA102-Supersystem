<?php
include "db_connect.php";

if(isset($_GET['id'])){
	$qry = $conn->query("SELECT * FROM orders where id =".$_GET['id']);
	foreach($qry->fetch_array() as $k => $v){
		$$k = $v;
	}

}
?>

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
			$qry = $conn->query("SELECT * FROM order_list o inner join product_list p on o.product_id = p.id  where order_id =".$_GET['id']);
			while($row=$qry->fetch_assoc()):
				$total += $row['qty'] * $row['price'];
			?>
			<tr>
				<td><?php echo $row['qty'] ?></td>
				<td><?php echo $row['name'] ?></td>
				<td><?php echo number_format($row['qty'] * $row['price'],2) ?></td>
			</tr>
		<?php endwhile; ?>
		</tbody>
		<tfoot>
			<tr>
				<th colspan="2" class="text-right">TOTAL</th>
				<th ><?php echo number_format($total,2) ?></th>
			</tr>

		</tfoot>
	</table>
    
	<form action="" id="manage-laundry">
		<div class="col-lg-12">	
			<input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : '' ?>">	
			<div class="row">
				
				<?php if(isset($_GET['id'])): ?>
				<div class="col-md-6">
					<div class="form-group">
						<label for="" class="control-label">Status</label>
						<select name="status" id="" class="custom-select browser-default">
							<option value="0" <?php echo $status == 0 ? "selected" : '' ?>>Pending</option>
							<option value="1" <?php echo $status == 1 ? "selected" : '' ?>>Processing</option>
							<option value="2" <?php echo $status == 2 ? "selected" : '' ?>>Ready to be Claim</option>
							<option value="3" <?php echo $status == 3 ? "selected" : '' ?>>Claimed</option>
						</select>
					</div>
				</div>
				<?php endif; ?>
			</div>
			
				
			
		</div>
	</form>
</div>
<script>
	if('<?php echo isset($_GET['id']) ?>' == 1){
			calc()
		}
	
	

</script>	