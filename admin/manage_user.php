<?php include('db_connect.php');
session_start();  ?>

<div class="">
	<form action="" id="manage-user">
		<div class="card-body">
			<input type="hidden" name="id">
			<div class="form-group">
				<?php

				?>
				<label class="control-label">User</label>
				<input type="text" class="form-control" name="name" placeholder=""><?php echo $_SESSION['x'] ?>
			</div>
		</div>
	</form>
</div>
<script>
	$('#manage-user').submit(function(e) {
		e.preventDefault()
		start_load()
		$.ajax({
			url: 'ajax.php?action=save_user',
			data: new FormData($(this)[0]),
			cache: false,
			contentType: false,
			processData: false,
			method: 'POST',
			type: 'POST',
			success: function(resp) {
				if ($_SESSION['x'] == 0) {
					alert_toast("Data successfully added", 'success')
					setTimeout(function() {
						location.reload()
					}, 1500)
				} else {
					alert_toast("Data successfully updated", 'success')
					setTimeout(function() {
						location.reload()
					}, 1500)
				}
			}
		})
	})
</script>