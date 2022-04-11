<?php  

include '../koneksi/koneksi.php';
$query5 	= "SELECT * FROM data_pendaftaran
        WHERE data_pendaftaran.id_akun='$id' ";
$exec5	=	mysqli_query($conn, $query5);
$rows = mysqli_fetch_array($exec5);
$id_pendaftaran= $rows['id_pendaftaran'];
if (isset($_POST['upload'])) {
    $targetfolderBase   = "../assets/uploads/";

    $fileNameAkte   = date("h-m-s").basename( $_FILES['foto']['name']);
    $fileNameFoto   = date("h-m-s").basename( $_FILES['lampiran']['name']);

    $targetfolder   = $targetfolderBase . $fileNameAkte;
    $targetfolder2  = $targetfolderBase . $fileNameFoto;
    
    
    $ok=1;

    $file_type=$_FILES['foto']['type'];
    $file_type2=$_FILES['lampiran']['type'];

    if($_FILES['foto']['name'] != ''){
        if ( $file_type=="image/jpg" || $file_type=="image/jpeg") {
            if($_FILES['foto']['size'] <= 200000){
                if(move_uploaded_file($_FILES['foto']['tmp_name'], $targetfolder))
                {

                    $query  = "UPDATE file_pendaftaran SET foto='$fileNameAkte' WHERE id_pendaftaran='$id_pendaftaran' ";

                    $exec   = mysqli_query($conn, $query);

                    if ($exec) {
                    echo "<div class='alert alert-success alert-dismissable'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                    <strong>Berhasil!</strong> Upload Foto.
                    </div>";   
                    }
                    
                }else {
                    echo "<div class='alert alert-danger alert-dismissable'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                    <strong>Gagal!</strong> Upload Foto.
                    </div>";
                }

            }else{
                echo "<div class='alert alert-danger alert-dismissable'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong>Gagal!</strong> Upload Foto.
                </div>";
            }

        }else {

        echo "<div class='alert alert-danger alert-dismissable'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>Gagal!</strong> Upload Foto harus format(JPEG atau JPG).
            </div>";

        }
    }else{
        echo "<div class='alert alert-danger alert-dismissable'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        <strong>Gagal!</strong> File Foto Kosong.
        </div>";
    }

    if($_FILES['foto']['name'] != ''){
        if ($file_type2=="application/pdf" ) {
            if($_FILES['lampiran']['size'] <= 500000){
                if(move_uploaded_file($_FILES['lampiran']['tmp_name'], $targetfolder2))

                {

                    $query  = "UPDATE file_pendaftaran SET lampiran='$fileNameFoto' WHERE id_pendaftaran='$id_pendaftaran' ";

                    $exec   = mysqli_query($conn, $query);

                    if ($exec) {
                        echo "<div class='alert alert-success alert-dismissable'>
                        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                        <strong>Berhasil!</strong> Upload Lampiran Lainya.
                        </div>";                
                    }


                }

                else {

                echo "<div class='alert alert-danger alert-dismissable'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong>Gagal!</strong> File Terlalu besar Max 2000 Kb.
                </div>";

                }
                
            }else{
                echo "<div class='alert alert-danger alert-dismissable'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong>Gagal!</strong> File Terlalu besar Max 500 Kb.
                </div>";
            }
        }else{
            echo "<div class='alert alert-danger alert-dismissable'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>Gagal!</strong> Upload Lampiran harus format(PDF).
            </div>";
        }
    }else{
        echo "<div class='alert alert-danger alert-dismissable'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        <strong>Gagal!</strong> File Lampiran Kosong.
        </div>";
    }
    
}

?>

<div class="row">
    <div class="col-sm-12 col-md-8 col-lg-10 col-lg-offset-1">
        <div class="card" style="margin-top: 50px">
            <div class="card-header" data-background-color="blue">
                <h4 class="title">Upload Pasphoto(JPEG/JPG) dan Lampiran Lainya(PDF)</h4>
                <p class="category">Upload dengan format yang benar(PDF, JPEG)</p>
                <a href="index.php?page=4" class="btn btn-primary btn-md pull-right" style="margin-top: -40px;"><i class="fa fa-arrow-left"></i> Kembali</a>
            </div>
            <div class="card-content">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        

                        <div class="form-group floating-label" style="margin-left: 20px;">
                            <label class="col-sm-12">Pas Photo 4X6(JPEG/JPG) : </label>
                            <label class="btn btn-primary" for="my-file-selector">
                                <input id="my-file-selector" name="foto" type="file" style="display:none" 
                                onchange="$('#upload-file-info').html(this.files[0].name)" require>
                                Upload Pas Photo (JPEG/JPG)
                            </label>
                            <span class='label label-info' id="upload-file-info"></span>
                        </div>
                    
                    </div>

                    <div class="row">
                        <div class="form-group floating-label" style="margin-left: 20px;">
                            <label class="col-sm-12">Lampiran Lainya:
                                <br> 
                                <ol>
                                    <li>Ijazah/Surat Keterangan Lulus (SKL)</li>
                                    <li>Kartu Keluarga (KK)</li>
                                    <li>Kartu Tanda Penduduk (KTP)</li>
                                    <li>Surat Kelakuan Baik (Sekolah/Polisi)</li>
                                    <li>Surat Keterangan Sehat</li>
                                    <li>Surat Keterangan Tidak Hamil</li>
                                    <li>Dibuat dalam 1 file PDF Maksimal 500 KB</li>
                                </ol>
                            </label>
                            <label class="btn btn-primary" for="my-file-selector2">
                                <input id="my-file-selector2" name="lampiran" type="file" style="display:none" 
                                onchange="$('#upload-file-info2').html(this.files[0].name)" require>
                                Upload Lampiran Lainya (PDF)
                            </label>
                            <span class='label label-info' id="upload-file-info2"></span>
                        </div>
                    </div>
                       
                    <hr> 

                    <button type="submit" name="upload" class="btn btn-primary blue pull-right"><i class="fa fa-upload"></i> Upload File</button>
                </form>
            </div>
        </div>
    </div>
</div>