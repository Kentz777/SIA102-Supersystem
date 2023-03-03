<?php include('db_connect.php'); ?>

<div class="">
	<form action="" id="manage-user">
		<div class="card">
			<div class="card-body">
				<input type="hidden" name="id">
				<div class="form-group">
					<label class="control-label">User</label>
					<input type="text" class="form-control" name="name">
				</div>

			</div>

			<div class="card-footer">
				<div class="row">
					<div class="col-md-12">
						<button class="btn btn-sm btn-primary col-sm-3 offset-md-3"> Save</button>
						<button class="btn btn-sm btn-default col-sm-3" type="button" onclick="$('#manage-user').get(0).reset()"> Cancel</button>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
<script>
	$('#manage-user').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=save_user',
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
</script>