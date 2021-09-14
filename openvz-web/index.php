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
	<p>Info: &nbsp;<b id="ingfo"></b></p>

</body>
<script type="text/javascript" src="js/manipulateContainer.js"></script>
<script type="text/javascript">
	let ctid = 5;
	listnya = `<?php echo $ct->vzlist();?>`;
	
	listContainer(listnya);

	$("#btn-create").on('click',function(){
		createContainer(ctid);
	});

	$("#btn-delete").on('click',function(){
		deleteContainer(ctid);
	});

</script>
</html>