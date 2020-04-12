<?php
	require("db.php");
	$sql = "UPDATE ajax SET name =?,roll =?,address =? WHERE id =?";
	$up = $conn->prepare($sql);
	if($up->execute([$_REQUEST["name"],$_REQUEST["roll"],$_REQUEST["address"],$_REQUEST["id"]])){
		echo "Update successfully";
	}else{
		echo "Update Faild";
	}
?>