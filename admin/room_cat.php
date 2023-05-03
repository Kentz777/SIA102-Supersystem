<?php include('db_connect.php');?>

<div class="container-fluid">
	
	<div class="col-lg-12">
		<div class="row">
			<!-- FORM Panel -->
			<div class="col-md-4">
			<form action="" id="manage-cat">
				<div class="card">
					<div class="card-header">
						    Create Room Category
				  	</div>
					<div class="card-body">
							<input type="hidden" name="id">
							
							<div class="form-group">
								<label class="control-label">Category </label>
								<select name="name" id="" class="custom-select browser-default">
									<?php
									$cat = $conn->query("SELECT * FROM rooms order by name asc ");
									while ($row = $cat->fetch_assoc()) :
										$rcat_arr[$row['id']] = $row['name'];
									?>
										<option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
									<?php endwhile; ?>
								</select>

							</div>

							<div class="form-group">
								<label class="control-label">Category Code</label>
								
								<input type="text" class="form-control" name="code">
							</div>
					</div>
							
					<div class="card-footer">
						<div class="row">
							<div class="col-md-12">
								<button class="btn btn-sm btn-primary col-sm-3 offset-md-3"> Save</button>
								<button class="btn btn-sm btn-default col-sm-3" type="button" onclick="$('#manage-cat').get(0).reset()"> Cancel</button>
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
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i = 1;
								$cats = $conn->query("SELECT * FROM room_category order by id asc");
								while($row=$cats->fetch_assoc()):
								?>
								<tr>
									<td class="text-center"><?php echo $i++ ?></td>
									<td class="">
										<?php echo $rcat_arr[$row['name']] ?>
									</td>

									<td class="text-center">
                                    <button class="btn btn-sm btn-primary edit_room_cat" type="button" data-id="<?php echo $row['id'] ?>" data-name="<?php echo $row['name'] ?>" data-code="<?php echo $row['code'] ?>" >Edit</button>
										<button class="btn btn-sm btn-danger delete_rooms_cat" type="button" data-id="<?php echo $row['id'] ?>">Delete</button>
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
	

	$('#manage-cat').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=save_room_cat',
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
	$('.edit_room_cat').click(function(){
		start_load()
		var cats = $('#manage-cat')
		cats.get(0).reset()
		cats.find("[name='id']").val($(this).attr('data-id'))
		cats.find("[name='name']").val($(this).attr('data-name'))
		cats.find("[name='code']").val($(this).attr('data-code'))
		end_load()
	})
	$('.delete_rooms_cat').click(function(){
		_conf("Are you sure to delete this category?","delete_rooms_cat",[$(this).attr('data-id')])
	})
	function delete_rooms_cat($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_rooms_cat',
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