<?php  
$queryx     =   "SELECT * FROM data_pendaftaran WHERE data_pendaftaran.id_akun = '$id'";
$execx      =   mysqli_query($conn, $queryx);
if($execx){
    $daftar = mysqli_fetch_array($execx);

}
$query2 	= "SELECT * FROM data_pendaftaran 
			WHERE data_pendaftaran.id_akun='$id'";
$exec2 	=	mysqli_query($conn, $query2);
$rows2 = mysqli_fetch_array($exec2);
$id_pendaftaran= $rows2['id_pendaftaran']; 
$cek_file = $rows2['foto_kuitansi'];
?>


<div class="row"> 	
    <div class="col-sm-12 col-md-8 col-lg-10 col-lg-offset-1">
        <div class="card" style="margin-top: 50px">
            <div class="card-header" data-background-color="blue">
                <h4 class="title">Pembayaran</h4>
                <p class="category">Isi Form pendaftaran dengan benar</p>
            </div>
            <div class="card-content">
            
            <h4><b>Ketentuan setelah pembayaran sebagai berikut:</b></h4>
            <ol>
            	<li>Pembayaran dikirim melalui <b>REX BRI 018877 A.n Yayasan Sempenan Negeri</b></li>
            	<li>Setelah pembayaran ke rek di atas, upload bukti pembayaran dengan benar</li>
				<li>Kemudian tunggu konfirmasi 2 X 24 Jam setelah upload bukti pembayaran</li>
				<li>Jika, sudah dikonfirmasi maka akan ada tombol <b>cetak</b> dibawah.</li>
            </ol>    

            <h4><b>Biaya yang harus dibayarkan sebagai berikut: </b></h4>
			<ol>
				<table class="table table-responsive table-hove">
					<thead>
						<tr>
							<th>Jenis Pengeluaran</th>
							<th align="right">Biaya</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Uang Pendaftaran</td>
							<td align="right">150.000</td>
						</tr>
						
						<tr>
							<td align="center"><b>Total</b></td>
							<td align="right"><b>Rp.150.000</b></td>
						</tr>
					</tbody>
				</table>
			</ol>
					
			<?php  
			    echo '<br><br>';
			if ($daftar['status_pendaftaran'] == 0) {
				if($cek_file == ''){
			?>
					<form action="" method="post" enctype="multipart/form-data">
						<div class="row">
							<div class="form-group floating-label" style="margin-left: 20px;">
								<label class="btn btn-primary" for="my-file-selector">
									<input id="my-file-selector" name="bukti" type="file" style="display:none" 
									onchange="$('#upload-file-info').html(this.files[0].name)">
									upload bukti pembayaran (PNG/JPEG/PDF)
								</label>
								<span class='label label-info' id="upload-file-info"></span>
							</div>
						</div>
						<button type="submit" name="upload" class="btn btn-primary blue pull-right"><i class="fa fa-upload"></i> Upload File</button>
					</form>

			<?php
				}else{
					echo "<div class='alert alert-warning alert-dismissable'>
					<strong>Lunas Pembayaran, mohon menunggu konfirmasi 2 X 24 Jam untuk mencetak Bukti Pendaftaran</strong> 
				  </div>";
				}
            }else if($daftar['status_pendaftaran'] == 1){
                echo "<div class='alert alert-warning alert-dismissable'>
                  <strong>Lunas Pembayaran, mohon menunggu konfirmasi 2 X 24 Jam untuk mencetak Bukti Pendaftaran</strong> 
                </div>";
            }else if($daftar['status_pendaftaran'] == 2){
			?>
				<a href="include/view/view_kuitansi.php" class="btn btn-primary blue pull-right"><i class="fa fa-print"></i>Cetak Kuitansi</a>
			<?php
			}

			?>
                

            </div>
        </div>
    </div>
</div>
<?php
	$query3  = "SELECT * FROM `file_pendaftaran` WHERE id_pendaftaran ='$id_pendaftaran'";
	$exec3 =mysqli_query($conn, $query3);
	$rows3 = mysqli_num_rows($exec3);
	echo $rows3;
	if (isset($_POST['upload'])) {
			$targetfolderBase   = "../assets/uploads/";
		
			$fileNameBukti   = date("h-m-s").basename( $_FILES['bukti']['name']);
			
			$targetfolder   = $targetfolderBase . $fileNameBukti;
			
			$tanggal_pembayaran =   date("Y-m-d");
		
			$file_type=$_FILES['bukti']['type'];
		
			if($rows3 == 0){

				if ($file_type=="image/jpeg" || $file_type=="image/png" || $file_type=="application/pdf") {
					if(move_uploaded_file($_FILES['bukti']['tmp_name'], $targetfolder))
			
					{

						$query0  = "INSERT INTO `file_pendaftaran`( `id_pendaftaran`, `foto_kuitansi`)
						VALUES ('$id_pendaftaran','$fileNameBukti')";
						mysqli_query($conn, $query0);
						$query1  = "UPDATE `data_pendaftaran` SET `status_pendaftaran`='1' WHERE data_pendaftaran.id_akun='$id' ";
						mysqli_query($conn, $query1);
						echo "<div class='alert alert-success alert-dismissable'>
							<strong>Berhasil!</strong>Upload bukti pembayaran
						</div>";
						echo '<script>window.location="index.php?page=9"</script>';
					}else{
						echo mysqli_erorr($conn);
					}
				}else{
					echo mysqli_erorr($conn);
				}
			}else{
				if ($file_type=="image/jpeg" || $file_type=="image/png" || $file_type=="application/pdf") {
					if(move_uploaded_file($_FILES['bukti']['tmp_name'], $targetfolder))
			
					{

						$query0  = "UPDATE `file_pendaftaran` SET  `foto_kuitansi`='$fileNameBukti' WHERE `id_pendaftaran`='$id_pendaftaran'";
						mysqli_query($conn, $query0);
						$query1  = "UPDATE `data_pendaftaran` SET `status_pendaftaran`='1' WHERE data_pendaftaran.id_akun='$id' ";
						mysqli_query($conn, $query1);
						echo "<div class='alert alert-success alert-dismissable'>
							<strong>Berhasil!</strong>Upload bukti pembayaran
						</div>";
						echo '<script>window.location="index.php?page=9"</script>';
					}else{
						echo mysqli_erorr($conn);
					}
				}else{
					echo mysqli_erorr($conn);
				}
			}
	}
?>