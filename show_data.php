<?php
require("db.php");
$sql = "SELECT * FROM ajax";
$data_show = $conn->prepare($sql);
$data_show->execute();
while ($data = $data_show->fetch(PDO::FETCH_ASSOC)) {?>
			<tr>
				<td><?php echo $data["id"]; ?></td>
				<td class="name"><?php echo $data["name"]; ?></td>
				<td class="roll"><?php echo $data["roll"]; ?></td>
				<td class="address"><?php echo $data["address"]; ?></td>
				<td>
					<button class="btn btn-danger del" data-del='<?php echo $data["id"]; ?>'>Delete</button>
					<button class="btn btn-primary edit" data-toggle="modal" data-target="#exampleModalCenter" data-edit='<?php echo $data["id"]; ?>'>Edit</button>
				</td>
			</tr>
	<?php	
}
?>