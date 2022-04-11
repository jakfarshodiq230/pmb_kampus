<?php  


session_start();
include '../../../koneksi/koneksi.php';

if (isset($_GET['id'])) {
	$id_file 		=	$_GET['id'];
	$query 	= "UPDATE file_pendaftaran SET status_file='0' WHERE id_filependaftaran='$id_file' ";
	$exec 	=	mysqli_query($conn, $query);


	if ($exec) {
		$_SESSION['message']	= "reset";
		echo '<script>window.location="../../index.php?page=17"</script>';
	}else{
			echo mysqli_error($conn);
		}
}else{
	echo 'tidak ada';
}
?>