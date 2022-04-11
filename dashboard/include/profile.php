<div class="col-sm-12 col-md-8 col-lg-10 col-lg-offset-1">
    <div class="card" style="margin-top: 50px">
        <div class="card-header" data-background-color="blue">
            <h4 class="title">Biodata Pendaftar</h4>
            <p class="category">Periksan data anda dibawah, pastikan sudah benar</p>
        </div>
        <div class="card-content table-responsive">
            <div class="col-sm-12 ">
                <div class="card">
                    <div class="card-header" data-background-color="blue">
                        <h4 class="title">Data Calon Mahasiswi</h4>
                    </div>
                    <div class="card-content table-responsive">
                        <div class="col-sm-4 ">
                            <div class="card">
                                <img src="../assets/img/icon_user.png" alt="" style="padding: 20px;">
                            </div>
                        </div>
                        <?php
                            $id= $_SESSION['auth'];
                            $query      = "SELECT * FROM akun, data_pendaftaran WHERE akun.`id_akun`=data_pendaftaran.`id_akun` 
                            AND data_pendaftaran.`id_akun`='$id' ";

                            $exec       = mysqli_query($conn, $query);
                            $data = mysqli_fetch_array($exec);
                        ?>
                        <div class="col-sm-8 ">
                            <div class="card">
                                <table class="table table-hover">
                                    <tbody>
                                        <tr>
                                            <td><b>Email</b></td>
                                            <td>: <?php  echo $data['email']; ?> </td>
                                        </tr>
                                        <tr>
                                            <td><b>Nama Lengkap</b></td>
                                            <td>: <?php echo $data['nama_lengkap_mhs']; ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Nama Panggilan</b></td>
                                            <td>: <?php echo $data['nama_panggilan_mhs']; ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Tempat,Tanggal Lahir</b></td>
                                            <td>: <?php echo $data['tempat_lahir_mhs'].", ".date('d F Y', strtotime($data['tanggal_lahir'])); ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Jenis Kelamin</b></td>
                                            <td>: <?php if($data['jenis_kelamin']=='L'){echo "Laki-Laki";}else{echo "Perempuan";} ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Agama</b></td>
                                            <td>: <?php echo $data['agama_mhs']?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Anak Ke -</b></td>
                                            <td>: <?php echo $data['anak_ke']." dari ".$data['saudara'];?> bersaudara</td>
                                        </tr>
                                        <tr>
                                            <td><b>Tinggi Badan</b></td>
                                            <td>: <?php echo $data['tinggi_badan'];?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Berat Badan</b></td>
                                            <td>: <?php echo $data['tinggi_badan'];?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Alamat KTP</b></td>
                                            <td>: <?php echo $data['alamat_mhs'];?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Asal Sekolah</b></td>
                                            <td>: <?php echo $data['asal_sekolah'];?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Alamat Sekolah</b></td>
                                            <td>: <?php echo $data['alamat_sekolah'];?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Alamat Sekolah</b></td>
                                            <td>: <?php echo $data['no_hpmhs'];?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Di Pekanbaru Bersama</b></td>
                                            <td>: <?php echo $data['ikut_lokasi']; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 ">
                <div class="card">
                    <div class="card-header" data-background-color="blue">
                        <h4 class="title">Data Ayah</h4>
                    </div>
                    <div class="card-content table-responsive">

                        <?php
                            $id_pend= $data['id_pendaftaran'];
                            $query1      = "SELECT * FROM data_orangtua WHERE data_orangtua.`id_pendaftaran`='$id_pend' AND kategori='ayah'";

                            $exec1       = mysqli_query($conn, $query1);
                            $data1 = mysqli_fetch_array($exec1);

                            $query2      = "SELECT * FROM data_orangtua WHERE data_orangtua.`id_pendaftaran`='$id_pend' AND kategori='ibu'";

                            $exec2       = mysqli_query($conn, $query2);
                            $data2 = mysqli_fetch_array($exec2);
                        ?>
                        <table class="table table-hover">
                            <tbody>
                            <tr>
                                    <td><b>Nama Ayah</b></td>
                                    <td>: <?php echo $data1['nama']; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Tempat,Tanggal Lahir</b></td>
                                    <td>: <?php echo $data1['tempat_lahir'].", ".date('d F Y', strtotime($data1['tanggal_lahir'])); ?></td>
                                </tr>
                                <tr>
                                    <td><b>Pendidikan Terakhir</b></td>
                                    <td>: <?php echo $data1['pendidikan']; ?></td>
                                </tr>
                                
                                <tr>
                                    <td><b>Pekerjaan</b></td>
                                    <td>: <?php echo $data1['pekerjaan']; ?></td>
                                </tr>
                                
                                <tr>
                                    <td><b>Agama</b></td>
                                    <td>: <?php echo $data1['agama']; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Telp/HP</b></td>
                                    <td>: <?php echo $data1['nomor_hp']; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 ">
                <div class="card">
                    <div class="card-header" data-background-color="blue">
                        <h4 class="title">Data Ibu</h4>
                    </div>
                    <div class="card-content table-responsive">

                        <?php
                            $id_pend= $data['id_pendaftaran'];
                            $query1      = "SELECT * FROM data_orangtua WHERE data_orangtua.`id_pendaftaran`='$id_pend' AND kategori='ayah'";

                            $exec1       = mysqli_query($conn, $query1);
                            $data1 = mysqli_fetch_array($exec1);

                            $query2      = "SELECT * FROM data_orangtua WHERE data_orangtua.`id_pendaftaran`='$id_pend' AND kategori='ibu'";

                            $exec2       = mysqli_query($conn, $query2);
                            $data2 = mysqli_fetch_array($exec2);
                        ?>
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <td><b>Nama Ibu</b></td>
                                    <td>: <?php echo $data2['nama']; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Tempat,Tanggal Lahir</b></td>
                                    <td>: <?php echo $data2['tempat_lahir'].", ".date('d F Y', strtotime($data2['tanggal_lahir'])); ?></td>
                                </tr>
                                <tr>
                                    <td><b>Pendidikan Terakhir</b></td>
                                    <td>: <?php echo $data2['pendidikan']; ?></td>
                                </tr>
                                
                                <tr>
                                    <td><b>Pekerjaan</b></td>
                                    <td>: <?php echo $data2['pekerjaan']; ?></td>
                                </tr>
                                
                                <tr>
                                    <td><b>Agama</b></td>
                                    <td>: <?php echo $data2['agama']; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Telp/HP</b></td>
                                    <td>: <?php echo $data2['nomor_hp']; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <a href="include/view/fomulir.php?id=<?php echo $id; ?>" class="btn btn-primary blue pull-right">Cetak Fomulir</a>
            <a href="include/view/cetak_kartu.php?id=<?php echo $id; ?>" class="btn btn-primary blue pull-right">Cetak Kartu Ujian</a>
            <!-- end card judul -->
        </div>
                
        