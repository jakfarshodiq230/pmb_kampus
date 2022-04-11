<?php  
if ($_SESSION['message']=='konfirmasi') {
    echo "<div class='alert alert-success alert-dismissable'>
      <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
      <strong>Berhasil!</strong> Konfirmasi Pembayaran.
    </div>";
}
if ($_SESSION['message']=='reset') {
    echo "<div class='alert alert-success alert-dismissable'>
      <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
      <strong>Berhasil!</strong> Reset Pembayaran.
    </div>";
}
?>

<div class="row">
    <div class="col-sm-12 col-md-8 col-lg-10 col-lg-offset-1">
        <div class="card" style="margin-top: 50px">
            <div class="card-header" data-background-color="blue">
                <h4 class="title">Konfirmasi Pembayaran Pendaftaran</h4>
                <p class="category">Lakukan konfirmasi Pembayaran pendaftaran</p>
            </div>
            <div class="card-content">
                
                <h4 style="overflow: hidden;"><b>Data Calon Mahasiswi</b></h4>
				<table class="table table-hover">
					<thead>
						<tr>
							<td><b>No</b></td>
							<td><b>No Pendaftaran</b></td>
							<td><b>Nama Pendaftar</b></td>
							<td><b>Status Pembayaran Pendaftaran</b></td>
							<td><b>Aksi</b></td>
						</tr>
					</thead>
				    <tbody>
				    	<?php  
				    		$query 	= "SELECT * FROM data_pendaftaran, file_pendaftaran 
							WHERE data_pendaftaran.id_pendaftaran=file_pendaftaran.id_pendaftaran 
							AND file_pendaftaran.`foto_kuitansi` !=''";

				    		$exec 	=	mysqli_query($conn, $query);

				    		if ($exec) {
				    			$total	= mysqli_num_rows($exec);
				    			if ($total > 0) {
				    				while ($rows = mysqli_fetch_array($exec)) {
				    			
				    	?>
		
								
									<tr>
										<td><?php echo ++$no; ?></td>
										<td><?php echo $rows['id_akun']; ?></td>
										<td><?php echo $rows['nama_lengkap_mhs']; ?></td>
										<td><?php 
										$rows['status_pendaftaran'] == 0 ? 
										print("<font color='#e74c3c'>Belum dikonfirmasi</font>") : 
										print("<font color='##2ecc71'>Sudah dikonfirmasi</font>"); 
										?></td>
										<td>
											<a href="include/reset/reset_pembayaran.php?ida=<?php echo $rows['id_pendaftaran'] ?>" class="btn btn-drag btn-sm"><i class="fa fa-repeat"></i></a>
											<a href="" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
											<a href="include/proses_konfirmasi_pembayaran.php?ida=<?php echo $rows['id_pendaftaran'] ?>" class="btn btn-warning btn-sm">Konfirmasi</a>
										</td>
									</tr>

				    	<?php
				    				}
				    			}else{
				    				echo "<td colspan='5' align='center'><h3><b>Belum ada siswa daftar</b></h3></td>";
				    			}
				    		}else{
				    			echo mysqli_error($conn);
				    		}
				    	?>
				        
				    </tbody>
				</table>

            </div>
        </div>
    </div>
</div>

<?php  

unset($_SESSION['message']);

?>