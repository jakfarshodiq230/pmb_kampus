<?php
include '../../../vendor/autoload.php';
use Dompdf\Dompdf;
$document = new Dompdf();
    ob_start();
    $html = file_get_contents('http://shodiqtech.com/psb-master/dashboard/include/view/kartu.php?id=220316PMB0001');
    $dompdf = new Dompdf();

    $dompdf->loadHtml($html);
    
    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4', 'landscape');
    
    // Render the HTML as PDF
    $dompdf->render();
    
    // Output the generated PDF to Browser
    $dompdf->stream("coba",array("Attachment"=>0));
?>