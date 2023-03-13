<?php include('db_connect.php');
session_start();  ?>

<div class="">
	<form action="" id="manage-guest">
		<div class="card-body">
			<input type="hidden" name="id">
			<div class="form-group">
				<?php

				?>
				<label class="control-label">First Name</label>

				<!-- this -->
				<input type="text" class="form-control" name="first_name" placeholder="First Name">

                <label class="control-label">Last Name</label>

				<!-- this -->
				<input type="text" class="form-control" name="last_name" placeholder="Last Name">

                <label class="control-label">Email</label>
				<!-- this -->
				<input type="email" class="form-control" name="email" placeholder="Email">

                <label class="control-label">Password</label>
				<!-- this -->
				<input type="text" class="form-control" name="password" placeholder="Password">

                <label class="control-label">Room #</label>

				<!-- this -->
				<input type="text" class="form-control" name="room" placeholder="Room No.">

                <label class="control-label">Contact</label>

				<!-- this -->
				<input type="text" class="form-control" name="contact" placeholder="Contact No.">

                <label class="control-label">Bill</label>

				<!-- this -->
				<input type="text" class="form-control" name="bill" placeholder="Bill">
			</div>
		</div>
	</form>
</div>
<script>
	$('#manage-guest').submit(function(e) {
		e.preventDefault()
		start_load()
		$.ajax({
			url: 'ajax.php?action=signup',
			data: new FormData($(this)[0]),
			cache: false,
			contentType: false,
			processData: false,
			method: 'POST',
			type: 'POST',
			success: function(resp) {
				if (resp) {
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