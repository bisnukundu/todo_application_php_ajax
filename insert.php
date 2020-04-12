<?php
	require("db.php");
	$sql = "INSERT INTO ajax (name,roll,address) VALUES (?,?,?)";
	$insert = $conn->prepare($sql);
	if($insert->execute([$_REQUEST["name"],$_REQUEST["roll"],$_REQUEST["address"]])){
		echo "insert Success";
	}else{
		echo "insert faild";
	}
?>