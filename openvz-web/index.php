<?php
	require_once "process/container_process.php";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>OpenVZ Web</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">

</head>
<body>
	<div class="container my-4">
		<div id="list-ct" class="row">

			<!-- <div class="col-sm-3 m-4">
				<div class="card" id="ct-1" style="width: 18rem;">
				  <div class="card-body">
				    <h5 class="card-title">Debian 7</h5>
				    <p class="card-text">
				    	Information:
				    	<table>
				    		 <tr>
				    			<td class="judul pr-2">CT ID </td>
				    			<td >:</td>
				    			<td id="" class="value pl-2">1</td>
				    		</tr>
				    		<tr>
				    			<td class="judul pr-2">NPROC </td>
				    			<td >:</td>
				    			<td class="value pl-2">-</td>
				    		</tr>
				    		<tr>
				    			<td class="judul pr-2">STATUS </td>
				    			<td >:</td>
				    			<td class="value pl-2">Stopped</td>
				    		</tr>
				    		<tr>
				    			<td class="judul pr-2">IP ADDRESS </td>
				    			<td >:</td>
				    			<td class="value pl-2">192.168.42.100</td>
				    		</tr>
				    		<tr>
				    			<td class="judul pr-2">HOSTNAME</td>
				    			<td >:</td>
				    			<td class="value pl-2">virtual</td>
				    		</tr>
				    	</table>
				    </p>
				    <button id="btn-power-1" class="btn btn-gray float-left"><i class="fa fa-power-off"></i> &nbsp;Nyalakan</button>
				    <button id="btn-delete-1" class="btn btn-danger float-right"><i class="fa fa-trash"></i> &nbsp;Hapus</button>
				  </div>
				</div>
			</div> -->
		</div> <!-- end row -->
		<!-- <button id="btn-create">Create CT</button>
		<button id="btn-delete">Delete CT</button>
		 -->
		<br>
		<p>Info: &nbsp;<b id="ingfo"></b></p>
	</div>
</body>
<script type="text/javascript" src="js/manipulateContainer.js"></script>
<script type="text/javascript">
	let ctid = 1;
	
	listnya = `<?php echo $ct->vzlist();?>`;
	listContainerAwal(listnya);


	// $('document').ready(function(){
	// 	setInterval(function(){ getReadData() },4000);
	// });

</script>
</html>