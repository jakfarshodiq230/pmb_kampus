<?php 
// somewhere early in your project's loading, require the Composer autoloader
// see: http://getcomposer.org/doc/00-intro.md
require '../../../vendor/autoload.php';
include '../../../koneksi/koneksi.php';
use Dompdf\Adapter\CPDF;
use Dompdf\Dompdf;
use Dompdf\Exception;

    $id= $_GET['id'];
    $query      = "SELECT * FROM akun, data_pendaftaran WHERE akun.`id_akun`=data_pendaftaran.`id_akun` 
    AND data_pendaftaran.`id_akun`='$id' ";

    $exec       = mysqli_query($conn, $query);
    $data = mysqli_fetch_array($exec);

$html = '

        ';

$pdf = new dompdf();
$pdf->load_html($html);
$pdf->setPaper('A4', 'potrait');
// untuk mengconvert ke PDF
$pdf->render();

// menyimpan ke file pdf dan fungsi attachment agar bisa ditampilkan kedalam pdf apabila nilai nol(0)
$pdf->stream('File.pdf', array("Attachemnt"=>0));
 ?>