<div class="container-fluid">

	<div class="text-center">
		<div class="form-group">
			<label for="" class="control-label">Status</label>
			<?php $status = 0 ?>
			<select name="status" id="status" class="custom-select browser-default">
				<option value="0" <?php echo $status == 0 ? "selected" : '' ?>>Pending</option>
				<option value="1" <?php echo $status == 1 ? "selected" : '' ?>>Processing</option>
				<option value="2" <?php echo $status == 2 ? "selected" : '' ?>>Ready to be Claim</option>
				<option value="3" <?php echo $status == 3 ? "selected" : '' ?>>Claimed</option>
			</select>
		</div>
		<button class="btn btn-primary" id="confirm" type="button" onclick="confirm_order()">Confirm</button>
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

	</div>
</div>
<style>
	#uni_modal .modal-footer {
		display: none
	}
</style>
<script>
	function confirm_order() {
    start_load();
    var status_val = $('#status').val();
    var id = <?php echo $_GET['id'] ?>;

    $.ajax({
        url: 'ajax.php?action=confirm_order',
        method: 'POST',
        data: {
            id: id,
            status_value: status_val
        },
        success: function(resp) {
            if (resp == 1) {
                var status_text = $('#status option:selected').text();
                alert_toast("Order status updated to '" + status_text + "'.");
                setTimeout(function() {
                    location.reload();
                }, 1500);
            }
        }
    });
}

</script>