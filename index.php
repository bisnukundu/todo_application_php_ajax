<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-12">
				<form action="" id="fm" class="form-group">
					<input class="form-control mb-2" type="text" id="name" placeholder="Name">
					<input class="form-control mb-2" type="text" id="roll" placeholder="Roll">
					<input class="form-control mb-2" type="text" id="ad" placeholder="Address">
					<input class="mb-2 btn btn-info btn-block" type="submit" id="submit" value="save-data">
				</form>
			</div >
			<div class="col-12 mt-5">
				<table class="table table-bordered">
					<thead>
						<td>ID</td>
						<td>Name</td>
						<td>Roll</td>
						<td>Address</td>
						<td>Action</td>
					</thead>
					<tbody id="tbody">
						
					</tbody>
				</table>
			</div>

			<div class="msg"></div>
		</div>
		<p class="text-center mt-5" style="font-family: gabriola">Created by Bisnu kundu</p>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" id="e_d" role="document">
			
		</div>
	</div>

	<script src="js/jquery-3.5.0.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script>
		// SHOW DATA CODE HERE WITH AJAX
		$(document).ready(function(){
			function show_data(){
				$.ajax({
					url:"show_data.php",
					type:"POST",
					success:function(data){
						$("#tbody").html(data)
					}
				})
			}
			show_data()
			// DELTE DATA CODE HERE WITH AJAX
			$(document).on("click",".del",function(){
				var id = $(this).data("del");
				var el = this;
				$.ajax({
					url:"del_data.php",
					type:"POST",
					data:({id:id}),
					success:function(data){
						$(".msg").html(data)
						$(el).closest("tr").fadeOut()
					}
				})
			})
			// EDIT DATA CODE HERE WITH AJAX
			$(document).ready(function(){
				$(document).on("click",".edit",function(){
					var id = $(this).data("edit")
					$.ajax({
						url:"edit_data.php",
						type:"POST",
						data:{id:id},
						success:function(data){
							$("#e_d").html(data)
						}
					})

				})
			})

			$(document).on("click","#update",function(){
				var id = $(this).data("id");
				var name = $(".un").val();
				var roll = $(".ur").val();
				var address = $(".ua").val();
				$.ajax({
					url:"update.php",
					type:"POST",
					data:{id:id,name:name,roll:roll,address:address},
					success:function(data){
						$(".msg").html(data)
						show_data()
					}
				})
			})

			// DATA INSERT CODE HERE
			$("#submit").click(function(e){

				e.preventDefault()
				var name = $("#name").val();
				var roll = $("#roll").val();
				var address = $("#ad").val();
				if(name == "" || roll == "" || address == ""){
					$(".msg").html("Please fill this form")
				}else{
				$.ajax({
					url:"insert.php",
					type:"POST",
					data:{name:name,roll:roll,address:address},
					success:function(data){
						$(".msg").html(data);
						$("#fm").trigger("reset");
						show_data()
					}
				})
			}
			})

		})
	</script>
</body>
</html>