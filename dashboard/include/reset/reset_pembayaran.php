<?php  


session_start();
include '../../../koneksi/koneksi.php';

if (isset($_GET['ida'])) {
	$id_pendaftaran 		=	$_GET['ida'];
	$query 	= "UPDATE data_pendaftaran SET status_pendaftaran='0' WHERE id_pendaftaran='$id_pendaftaran' ";
	$exec 	=	mysqli_query($conn, $query);


	if ($exec) {
		$_SESSION['message']	= "reset";
		echo '<script>window.location="../../index.php?page=7"</script>';
	}else{
			echo mysqli_error($conn);
		}
}else{
	echo 'tidak ada';
}
?>