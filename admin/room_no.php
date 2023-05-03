<?php include('db_connect.php'); ?>

<div class="container-fluid">

	<div class="col-lg-12">
		<div class="row">
			<!-- FORM Panel -->
			<div class="col-md-4">
				<form action="" id="manage-rooms">
					<div class="card">
						<div class="card-header">
							Create Room No.
						</div>
						<div class="card-body">
							<input type="hidden" name="r_id">
							<div class="input-group mb-3">
								<input type="text" readonly value = "DR" name="pre" style="width: 100px;"class="input-group-text" id="pre">
								<input type="text" class="form-control" name="room_no" required>
							</div>
							<div class="form-group">
								<label class="control-label">Category </label>
								<select name="category" id="category" class="custom-select browser-default">
									<?php
									$cat = $conn->query("SELECT * FROM rooms order by name asc ");
									while ($row = $cat->fetch_assoc()):
										?>
										<option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
									<?php endwhile; ?>
								</select>
							</div>
						</div>

						<div class="card-footer">
							<div class="row">
								<div class="col-md-12">
									<button class="btn btn-sm btn-primary col-sm-3 offset-md-3"> Save</button>
									<button class="btn btn-sm btn-default col-sm-3" type="button"
										onclick="$('#manage-rooms').get(0).reset()"> Cancel</button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
			<!-- FORM Panel -->

			<!-- Table Panel -->
			<div class="col-md-8">
				<div class="card">
					<div class="card-body">
						<table class="table table-bordered table-hover">
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="text-center">Room#</th>
									<th class="text-center">Category</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$i = 1;
								$cats = $conn->query("SELECT *, u.r_id as rid, u.room_no as uroom_no, r.name as rname FROM user_info u
								join rooms r on r.id = u.category
								order by rname asc");
								while ($row = $cats->fetch_assoc()):
									?>
									<tr>
										<td class="text-center">
											<?php echo $i++ ?>
										</td>
										<td class="">
											<?php echo $row['uroom_no'] ?>
										</td>
										<td class="">
											<?php echo $row['rname'] ?>
										</td>
										<td class="text-center">
											<button class="btn btn-sm btn-primary edit_rooms" type="button"
												data-id="<?php echo $row['rid'] ?>"
												data-name="<?php echo $row['uroom_no'] ?>">Edit</button>
											<button class="btn btn-sm btn-danger delete_rooms" type="button"
												data-id="<?php echo $row['rid'] ?>">Delete</button>
										</td>
									</tr>
								<?php endwhile; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- Table Panel -->
		</div>
	</div>

</div>
<style>
	td {
		vertical-align: middle !important;
	}
</style>
<script>
	$(document).ready(function () {
		$('#category').on('change', function () {
			var category = $(this).val();
			$.ajax({
				type: 'POST',
				url: 'room_c.php',
				data: { category: category },
				success: function (data) {
					$('#pre').val(data);
				}
			});
		});
	});
	$('#manage-rooms').submit(function (e) {
		e.preventDefault()
		start_load()
		$.ajax({
			url: 'ajax.php?action=save_rooms',
			data: new FormData($(this)[0]),
			cache: false,
			contentType: false,
			processData: false,
			method: 'POST',
			type: 'POST',
			success: function (resp) {
				if (resp == 1) {
					alert_toast("Data successfully added", 'success')
					setTimeout(function () {
						location.reload()
					}, 1500)

				}
				else if (resp == 2) {
					alert_toast("Data successfully updated", 'success')
					setTimeout(function () {
						location.reload()
					}, 1500)

				}
			}
		})
	})
	$('.edit_rooms').click(function () {
		start_load()
		var cat = $('#manage-rooms')
		cat.get(0).reset()
		cat.find("[name='r_id']").val($(this).attr('data-id'))
		cat.find("[name='room_no']").val($(this).attr('data-name'))
		end_load()
	})
	$('.delete_rooms').click(function () {
		_conf("Are you sure to delete this room	?", "delete_rooms", [$(this).attr('data-id')])
	})
	function delete_rooms($id) {
		start_load()
		$.ajax({
			url: 'ajax.php?action=delete_rooms',
			method: 'POST',
			data: { id: $id },
			success: function (resp) {
				if (resp == 1) {
					alert_toast("Data successfully deleted", 'success')
					setTimeout(function () {
						location.reload()
					}, 1500)

				}
			}
		})
	}
</script>