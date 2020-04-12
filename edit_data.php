
<?php
require("db.php");
	$sql = "SELECT * FROM ajax WHERE id = ?";
	$edit_data = $conn->prepare($sql);
	$edit_data->execute([$_REQUEST["id"]]);
	if($data = $edit_data->fetch(PDO::FETCH_ASSOC)){ ?>


		<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Edit Data</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="" >
						<input class="mb-2 form-control un" type="text" value="<?php echo $data['name']; ?>">
				<input class="mb-2 form-control ur" type="text" value="<?php echo $data['roll']; ?>">
				<input class="mb-2 form-control ua" type="text" value="<?php echo $data['address']; ?>">
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button id="update" data-dismiss="modal" data-id="<?php echo $data["id"] ?>" type="button" class="btn btn-primary">Save changes</button>
				</div>
			</div>
			
				
				
<?php	}else{
		echo "Update Faild";
	}

?>