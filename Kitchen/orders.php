<div class="container-fluid">
	<div class="card">
		<div class="card-body">
			<table class="table table-bordered">
				<thead>
					<tr>

						<th>#</th>
						<th>Order Date</th>
						<th>Name</th>
						<th>Room No.</th>
						<th>Status</th>
						<th>Action	</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 1;
					include '../admin/db_connect.php';

					// $qry = $conn->query("SELECT *, bd.user_name as bduname, o.address as addrs, o.status as stat FROM orders o 
					// join user_info ui on ui.user_id = o.user_id
					// join booking_order bo on bo.user_id = ui.user_id
					// join booking_details bd on bd.booking_id = bo.booking_id");

					$qry = $conn->query("SELECT *, o.order_id as oid FROM orders o
					join booking_order bo on bo.booking_id = o.booking_id
					join booking_details bd on bd.booking_id = bo.booking_id");

					echo $i;

					while ($row = $qry->fetch_assoc()) :
					?>
						<tr>
							<td><?php echo $i++ ?></td>
							<td><?php echo $row['date'] ?></td>
							<td><?php echo $row['user_name'] ?></td>
							<td><?php echo $row['room_no'] ?></td>
							


							<?php if ($row['status'] == 1) : ?>
								<td class="text-center"><span class="badge badge-primary">Processing</span></td>
							<?php elseif ($row['status'] == 2) : ?>
								<td class="text-center"><span class="badge badge-warning">Ready to be Claim</span></td>
							<?php elseif ($row['status'] == 3) : ?>
								<td class="text-center"><span class="badge badge-success">Claimed</span></td>
							<?php else : ?>
								<td class="text-center"><span class="badge badge-secondary">Pending</span></td>
							<?php endif; ?>
							<td>
								<button class="btn btn-sm btn-primary view_order" data-id="<?php echo $row['id'] ?>" data-orderid="<?php echo $row['oid'] ?>">View Order</button>
							</td>
						</tr>
					<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>

</div>
<script>
	$('.view_order').click(function() {
		uni_modal('Order', 'view_orders.php?id=' + $(this).attr('data-id') + '&order_id=' + $(this).attr('data-orderid'))
	})
</script>