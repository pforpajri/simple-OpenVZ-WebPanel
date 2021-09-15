//let ingfo = document.getElementById('ingfo');
var ro = document.getElementById('list-ct');

// let getReadData = ()  =>{
// 	$.ajax({
// 		url:'process/container_post_process.php',
// 		type:'POST',
// 		data: { readData : 'read' },
// 		cache:false,

// 		success:function(data){
// 			listnya = JSON.parse(data)
// 			splitEuy = listnya['a'].split(/\r?\n/).toString().split(",");
// 			splitEuy.pop()
			
// 			titleList = splitEuy[0].trim().replace(/\s\s+/g, ' ').split(' ');
// 			dataList = splitEuy[1].trim().replace(/\s\s+/g, ' ').split(' ');

// 		}

// 	});
// }

let listContainerAwal = (listnya) =>{
	splitEuy = listnya.split(/\r?\n/).toString().split(","); //multi-line jadi objek/array
	splitEuy.pop() // hapus last array yang kosong
	
	titleList = splitEuy[0].trim().replace(/\s\s+/g, ' ').split(' '); // Title List Containernya. jadi array, spasi nya udah difilter
	for(var i = 0; i< titleList.length; i++){
		titleList[i];
	}

	let dataList = []
	let card_ct = []
	for(var i = 1; i< splitEuy.length; i++){
		dataList[i] = splitEuy[i].trim().replace(/\s\s+/g, ' ').split(' ');;
		card_ct[i] =`
					<div id="ct-${dataList[i][0]}" class="col-sm-3 m-4">
						<div class="card" style="width: 18rem;">
							<div class="card-body">
								<h5 class="card-title">CT-0${dataList[i][0].toString()}</h5>
								<p class="card-text">
								    Information:
									<table>
										${infoCT(dataList[i][0],titleList,dataList[i],dataList[i].length)}
									</table>
								</p>
								<button value="${dataList[i][0]}" class="btn btn-gray btn-power float-left"><i class="fa fa-power-off"></i> &nbsp;Nyalakan</button>
							    <button value="${dataList[i][0]}" class="btn btn-danger btn-delete float-right"><i class="fa fa-trash"></i> &nbsp;Hapus</button>
							</div>
						</div>
					</div>`
		ro.innerHTML += card_ct[i]
	}	

	$(".btn-delete").on('click',function(){
		deleteContainer(this.value);
	});
	$(".btn-power").on('click',function(){
		//startContainer(ctid);
		alert(this.value)
	});
}

let infoCT = (ctid,title,data,len) => {
	var a= []
	for(var i=0; i< len;i++){
		a[i] = `
		<tr>
			<td class="judul pr-2">${title[i]}</td>
			<td >:</td>
			<td id="${title[i]}-${ctid}" class="value pl-2">${data[i]}</td>
		</tr>`
	}
	return a;
}

let createContainer = (ctid) => {
	ingfo.innerHTML = "Container sedang dibuat...";

	$.post('process/container_post_process.php',{ create_CTID: ctid },function(data){
		jsonData = JSON.parse(data);

		ingfo.innerHTML = jsonData['status'];
	})
}

let deleteContainer = (ctid) => {
	ingfo.innerHTML = "Menghapus Container..."
	$.post('process/container_post_process.php',{ delete_CTID: ctid },function(data){
		jsonData = JSON.parse(data);

		elementt = document.getElementById('ct-'+ctid.toString());
		elementt.remove();

		ingfo.innerHTML = jsonData['status'];
	})
}