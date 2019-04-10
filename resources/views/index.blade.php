<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="_token" content="{{ csrf_token() }}">
	<title>Document</title>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
			$.get("http://localhost:8000/consulta",function(data, status){
				console.log(data);
				var toDoItems = JSON.parse(data);
				for(var i=0; i<toDoItems.length; i++){
					var item = "id: "+ toDoItems[i].itemId +"<br> "+toDoItems[i].itemDescription +"<br> prioridad: "+ toDoItems[i].itemPriority +"<br> vencimiento: "+ toDoItems[i].itemDueDate;
					item = "<li>"+ item +"</li>";
					$("#myitems").append(item);
				}
			});	

			$("#saveItem").click(function(){
				var description = $("#desc").val();
				var dueDate = $("#dudate").val();
				var priority = $("#priority").val();
				

				var item = {
					itemDescription : description,
					itemDueDate : dueDate,
					itemPriority : priority
				};
				console.log(item);
				$.ajax({
					headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
					type:"POST",
					url:"http://localhost:8000/inserta",
					data:item


				}).done(function(info){
					console.log(info);

				});				

			});
			//enviarDatos();	

		});
		/*function enviarDatos(){
			$("form").on("submit", function(e){
				e.preventDefault();
				var frm = $(this).serialize();
				console.log(frm);
				$.ajax({
					headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
					"type":"POST",
					"url":"http://localhost:8000/insert",
					"data":frm


				}).done(function(info){
					console.log(info);

				});

			});
		}*/
	</script>
</head>
<body>
	<div>
		<h1>lista de items</h1>
		<ol id="myitems"></ol>
	</div>

	<div>
		<h2>new item</h2>
			
			<label> descripcion:</label>
			<input type="text" id="desc"><br>
			<label> fecha de vencimiento</label>
			<input type="text" id="dudate" placeholder="yyyy-mm-dd"><br>
			<label>prioridad</label>
			<input type="text" id="priority"><br>
			<input type="submit" id="saveItem" value="guardar">			
			

		
	</div>
</body>
</html>