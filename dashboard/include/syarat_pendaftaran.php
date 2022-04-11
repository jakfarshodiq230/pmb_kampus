<div class="row">
    <div class="col-sm-12 col-md-8 col-lg-10 col-lg-offset-1">
        <div class="card" style="margin-top: 50px">
            <div class="card-header" data-background-color="blue">
                <h4 class="title">Syarat Pendaftaran</h4>
                <p class="category">Isi Form pendaftaran dengan benar</p>
            </div>
            <div class="card-content">
                <h4>Berikut adalah syarat pendaftaran siswa baru yang harus dipenuhi :</h4>
                <ol>
                    <li><font color="#2ecc71">Mengisi Formulir Pendaftaran <i class="fa fa-check"></font></i></li>
                    <li> 
                        <?php 

                            $query6  = "SELECT * FROM file_pendaftaran, data_pendaftaran 
                            WHERE file_pendaftaran.id_pendaftaran=data_pendaftaran.id_pendaftaran
                            AND data_pendaftaran.id_akun='$id' ";
                            $exec6  = mysqli_query($conn, $query6);
                            $daftar6 = mysqli_fetch_array($exec6);
                            if ($daftar6['lampiran'] != "" && $daftar6['foto_kuitansi'] != "") {
                                
                                if ($daftar6['status_file'] == 1) {
                                    echo '<font color="#2ecc71">Upload Lampiran Pendaftaran<i class="fa fa-check"></i></font>';
                                }else{
                                  echo '<font color="#2ecc71">Upload Lampiran Pendaftaran<i class="fa fa-check"></i></font> <a href="index.php?page=5" class="btn btn-primary btn-sm" ><i class="fa fa-pencil"></i></a>';
                                }

                                
                            }else{
                                echo 'Upload Lampiran Pendaftaran <a href="index.php?page=5" class="btn btn-primary btn-sm" ><i class="fa fa-upload"></i></a>';
                            }
                        
                        ?>
                    </li>
                </ol>

                <h6><i><b>*Catatan : Tunggu konfirmasi admin paling lambat dua hari kerja untuk verifikasi lampiran, jika sudah di verifikasi lampiran akan berwarna hijau dan ceklis</b></i></h6>
            </div>
        </div>
    </div>
</div>