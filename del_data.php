<?php
	require("db.php");
	$sql = "DELETE FROM ajax WHERE id= ? ";
	$del_data = $conn->prepare($sql);
	if($del_data->execute([$_REQUEST["id"]])){
		echo "Delete Successfully";
	}else{
		echo "Delete Faild";
	}
?>