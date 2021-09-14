<?php
	require_once "process/container_process.php";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>OpenVZ Web</title>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

</head>
<body>
	Container list:
	<pre id="list"></pre>
	
	<button id="btn-create">Create CT</button>
	<button id="btn-delete">Delete CT</button>
	<br>
	<p>Info: &nbsp;<b id="ingfo"></b><p id='count'></p></p>

</body>

<script type="text/javascript">
	let list = document.getElementById('list')
	let ingfo = document.getElementById('ingfo')
	let count = document.getElementById('count')
	
	list.innerHTML = `<?php echo $ct->vzlist();?>`;

	$("#btn-create").on('click',function(){
		ingfo.innerHTML = "Container sedang dibuat..."

		$.post('process/container_post_process.php',{ create_CTID: 4 },function(data){
			jsonData = JSON.parse(data);

			list.innerHTML  = jsonData['list_updated']
			ingfo.innerHTML = jsonData['status']
		})
	})

	$("#btn-delete").on('click',function(){
		ingfo.innerHTML = "Menghapus Container..."
		$.post('process/container_post_process.php',{ delete_CTID: 4 },function(data){
			jsonData = JSON.parse(data);

			list.innerHTML  = jsonData['list_updated']
			ingfo.innerHTML = jsonData['status']
		})
	});

</script>
</html>