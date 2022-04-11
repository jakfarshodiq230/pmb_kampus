<?php
        include '../../../koneksi/koneksi.php';
        $id= $_GET['id'];
        $query      = "SELECT * FROM akun, data_pendaftaran WHERE akun.`id_akun`=data_pendaftaran.`id_akun` 
        AND data_pendaftaran.`id_akun`='$id' ";

        $exec       = mysqli_query($conn, $query);
        $data = mysqli_fetch_array($exec);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Windows-1252\">
<!-- Bootstrap core CSS     -->
<link href="../../../assets/css/bootstrap.min.css" rel="stylesheet" />
<!--  Material Dashboard CSS    -->
<link href="../../../assets/css/material-dashboard.css?v=1.2.0" rel="stylesheet" />
<!--  CSS for Demo Purpose, don't include it in your project     -->
<link href="../../../assets/css/demo.css" rel="stylesheet" />
<!--     Fonts and icons     -->
<link href="../../../assets/css/font-awesome.min.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
</head>
<body>
<div class="col-sm-12 ">
    <div class="card">
            <style>
                .kop{
                    position: relative;
                    text-align: center;
                    margin-top:20px;
                }
                .title{
                    font-weight: bold;
                    font-size: 20px;
                }
                .garis_verikal{
                    border-bottom: 3px black solid;
                    height: 0px ;
                    width: 100%;
                }
            </style>
        <div class="kop">
            <p class="title">AKADEMI KEBIDANAN SEMPENA NEGERI PEKANBARU<br> PENERIMAAN MAHASISWI BARU<br> TAHUN AJARAN <?php echo date('d F Y')?></p>
            <p class="garis_verikal"></p>
            <P class="title"><U>KARTU UJIAN</U></P>
        </div>
        <div class="card-content table-responsive">
            <div class="col-sm-4 ">
                <div class="card">
                    <img src="../../../assets/img/icon_user.png" alt="" style="padding: 20px; ">
                </div>
            </div>
            <div class="col-sm-8 ">
                <div class="card">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <td><b>No Pendaftaran</b></td>
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
                        </tbody>
                    </table>
                </div>
            </div>
            <style>
                .tanggal{
                    position: relative;
                    float: right;
                    padding-right: 10px;
                }
                .ttd{
                    margin-top:50px;
                    float: right;
                    text-align:left;
                    padding-right: 80px;
                }
            </style>
            <div class="tanggal">
                Pekanbaru, <?php echo date('d F Y');?><br>
                Akbid Sempena Negeri Pekanbaru<br>Panitia PKMB,<br>
                <span class='ttd'><b><u> Jakfar Shodiq, S.T</u></b><br> NIDN:012020202020</span>
            </div>
        </div>
    </div>
</div>
<!--   Core JS Files   -->
<script src="../../../assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="../../../assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../../../assets/js/material.min.js" type="text/javascript"></script>
<!--  Charts Plugin -->
<script src="../../../assets/js/chartist.min.js"></script>
<!--  Dynamic Elements plugin -->
<script src="../../../assets/js/arrive.min.js"></script>
<!--  PerfectScrollbar Library -->
<script src="../../../assets/js/perfect-scrollbar.jquery.min.js"></script>
<!--  Notifications Plugin    -->
<script src="../../../assets/js/bootstrap-notify.js"></script>
<!--  Google Maps Plugin    -->
<!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> -->
<!-- Material Dashboard javascript methods -->
<script src="../../../assets/js/material-dashboard.js?v=1.2.0"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="../../../assets/js/demo.js"></script>
</body>
</html>

