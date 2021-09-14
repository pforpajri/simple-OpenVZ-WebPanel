let list = document.getElementById('list');
let ingfo = document.getElementById('ingfo');

let listContainer = (listnya) =>{
	list.innerHTML = listnya;
}

let createContainer = (ctid) => {
	ingfo.innerHTML = "Container sedang dibuat...";

	$.post('process/container_post_process.php',{ create_CTID: ctid },function(data){
		jsonData = JSON.parse(data);

		list.innerHTML  = jsonData['list_updated'];
		ingfo.innerHTML = jsonData['status'];
	})
}

let deleteContainer = (ctid) => {
	ingfo.innerHTML = "Menghapus Container..."
	$.post('process/container_post_process.php',{ delete_CTID: ctid },function(data){
		jsonData = JSON.parse(data);

		list.innerHTML  = jsonData['list_updated'];
		ingfo.innerHTML = jsonData['status'];
	})
}