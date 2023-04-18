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
					include 'db_connect.php';
					$qry = $conn->query("SELECT *, bd.user_name as bduname, o.address as addrs FROM orders o join booking_details bd on bd.booking_id = o.booking_id");
					while ($row = $qry->fetch_assoc()) :
					?>
						<tr>
							<td><?php echo $i++ ?></td>
							<td><?php echo $row['date'] ?></td>
							<td><?php echo $row['bduname'] ?></td>
							<td><?php echo $row['addrs'] ?></td>
							


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
								<button class="btn btn-sm btn-primary view_order" data-id="<?php echo $row['id'] ?>">View Order</button>
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
		uni_modal('Order', 'view_order.php?id=' + $(this).attr('data-id'))
	})
</script>