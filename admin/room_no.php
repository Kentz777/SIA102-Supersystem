<?php include('db_connect.php');?>

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
							<input type="hidden" name="id">
							<div class="form-group">
								
								<div class="form-group">
								<label class="control-label">Category </label>
								<select name="category_id" id="" class="custom-select browser-default">
									<?php
									$cat = $conn->query("SELECT * FROM room_category order by room_cat asc ");
									while ($row = $cat->fetch_assoc()) :
									?>
										<option value="<?php echo $row['id'] ?>"><?php echo $row['room_cat'] ?></option>
									<?php endwhile; ?>
								</select>

							</div>
							<label class="control-label">Room No.</label>
								<input type="text" class="form-control" name="name">
							</div>
							
					</div>
							
					<div class="card-footer">
						<div class="row">
							<div class="col-md-12">
								<button class="btn btn-sm btn-primary col-sm-3 offset-md-3"> Save</button>
								<button class="btn btn-sm btn-default col-sm-3" type="button" onclick="$('#manage-rooms').get(0).reset()"> Cancel</button>
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
									<th class="text-center">Name</th>
									<th class="text-center">Status</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i = 1;
								$cats = $conn->query("SELECT * FROM room_info order by room_name asc");
								while($row=$cats->fetch_assoc()):
								?>
								<tr>
									<td class="text-center"><?php echo $i++ ?></td>
									<td class="">
										<?php echo $row['room_name'] ?>
									</td>
									<?php if ($row['status'] == 1) : ?>
								<td class="text-center"><span class="badge badge-primary">Processing</span></td>
							<?php elseif ($row['status'] == 2) : ?>
								<td class="text-center"><span class="badge badge-warning">Ready to be Claim</span></td>
							<?php elseif ($row['status'] == 3) : ?>
								<td class="text-center"><span class="badge badge-success">Claimed</span></td>
							<?php else : ?>
								<td class="text-center"><span class="badge badge-secondary">Pending</span></td>
							<?php endif; ?>
									<td class="text-center">
									<button class="btn btn-sm btn-primary view_room" data-id="<?php echo $row['id'] ?>">View Room</button>
								
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
	
	td{
		vertical-align: middle !important;
	}
</style>
<script>
	
	$('.view_room').click(function() {
		uni_modal('Rooms', 'view_room.php?id=' + $(this).attr('data-id'))
	})

	$('#manage-rooms').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=save_rooms',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully added",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
				else if(resp==2){
					alert_toast("Data successfully updated",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	})
	$('.edit_cat').click(function(){
		start_load()
		var cat = $('#manage-category')
		cat.get(0).reset()
		cat.find("[name='id']").val($(this).attr('data-id'))
		cat.find("[name='name']").val($(this).attr('data-name'))
		end_load()
	})
	$('.delete_room').click(function(){
		_conf("Are you sure to delete this room?","delete_room",[$(this).attr('data-id')])
	})
	function delete_cat($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_room',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
</script>