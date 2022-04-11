<?php  


session_start();
include '../../koneksi/koneksi.php';


if (isset($_GET['id'])) {
	//ID Cicilan pendaftaran
	$id_file 		=	$_GET['id'];
	$query 	= "UPDATE file_pendaftaran SET status_file='1' WHERE id_filependaftaran='$id_file' ";
	$exec 	=	mysqli_query($conn, $query);


	if ($exec) {
		$_SESSION['message']	= "konfirmasi";
		echo '<script>window.location="../index.php?page=17"</script>';
	}else{
		echo mysqli_error($conn);
	}
}else{
	echo 'tidak ada';
}


?>