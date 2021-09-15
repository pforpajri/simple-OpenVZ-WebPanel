<?php
	require_once "container_process.php";

	if ($_POST['delete_CTID'] != null){
		$ct->delete($_POST['delete_CTID']);
		
		echo json_encode(['status' => 'CT berhasil dihapus', 'list_updated' => $ct->vzlist()]);
	}
	else if ($_POST['create_CTID']) {

		$template_name = "debian-7.0-x86_64-minimal.tar.gz";
		#$ct->create($_POST['create_CTID'],$template_name);

		echo json_encode(['status' => 'Container berhasil dibuat', 'list_updated' => $ct->vzlist()]);
	}
	else if ($_POST['readData']){
		echo json_encode(['a' => $a]);
	}
	else{
		"Access denied";
	}
?>