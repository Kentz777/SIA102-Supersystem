<?php 
include 'db_connect.php'; 
if(isset($_GET['id'])){
	$qry = $conn->query("SELECT * FROM product_inventory where id=".$_GET['id']);
	foreach($qry->fetch_assoc() as $k => $v){
		$$k = $v;
	}
}

?>
<div class="container-fluid">
	<form action="" id="manage-inv">
		<input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : '' ?>">
		<div class="form-group">
			<div class="form-group">	
				<label for="" class="control-label">Supply Name</label>
				<select class="custom-select browser-default" name="prod    _id">
					<?php 
						$supply = $conn->query("SELECT * FROM product_list order by name asc");
						while($row= $supply->fetch_assoc()):
					?>
					<option value="<?php echo $row['id'] ?>" <?php echo isset($supply_id) && $supply_id == $row['id'] ? "selected" : '' ?>><?php echo $row['name'] ?></option>
					<?php endwhile; ?>
				</select>
			</div>
			<div class="form-group">	
				<label for="" class="control-label">QTY</label>
				<input type="number" step="any" min="1" value="<?php echo isset($qty) ? $qty : 1 ?>" class="form-control text-right" name="qty">
			</div>
		
		</div>
	</form>
</div>

<script>
	$('#manage-inv').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=save_inv',
			method:'POST',
			data:$(this).serialize(),
			success:function(resp){
				if(resp == 1){
					alert_toast("Data successfully saved",'success')
					setTimeout(function(){
						location.reload()
					},1000)
				}
			}
		})

	})
</script>