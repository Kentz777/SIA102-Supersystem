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
							
							<div class="form-group">
								<label class="control-label">Category </label>
								<select name="category" id="category" class="custom-select browser-default">
									<?php
									$cat = $conn->query("SELECT * FROM rooms order by name asc ");
									while ($row = $cat->fetch_assoc()):
										?>
										<option data-name="<?php echo $row['name'] ?>" value="<?php echo $row['name'] ?>"><?php echo $row['name'] ?></option>
									<?php endwhile; ?>
								</select>
							</div>
							<div class="input-group mb-3">
								<span class="input-group-text" name="pre_room"><?php echo $row['name'] ?></span>
								<input type="text" class="form-control" name="room_no">
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
								$cats = $conn->query("SELECT * FROM user_info order by category asc");
								while ($row = $cats->fetch_assoc()):
									?>
									<tr>
										<td class="text-center">
											<?php echo $i++ ?>
										</td>
										<td class="">
											<?php echo $row['room_no'] ?>
										</td>
										<td class="">
											<?php echo $row['category'] ?>
										</td>
										<td class="text-center">
											<button class="btn btn-sm btn-primary edit_rooms" type="button"
												data-id="<?php echo $row['r_id'] ?>"
												data-name="<?php echo $row['room_no'] ?>">Edit</button>
											<button class="btn btn-sm btn-danger delete_rooms" type="button"
												data-id="<?php echo $row['r_id'] ?>">Delete</button>
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
				console.log(resp)
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

	$(document).ready(function () {
		start_load();
		var cat = $('#manage-rooms');
	});

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