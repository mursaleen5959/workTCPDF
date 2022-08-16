<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once('TCPDF/tcpdf.php');
$width = 142;
$height = 84;
$pageLayout = array($width, $height); //  or array($height, $width) 
$pdf = new TCPDF('L', 'mm', $pageLayout, true, 'UTF-8', false);
// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
// set margins
//$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetMargins(1, 1, 1);
// set auto page breaks
//$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$pdf->SetAutoPageBreak(TRUE, 0);
// add a page
$pdf->AddPage();
// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// ==== CONTENT AREA STARTS
$pdf->Image('back.jpg', 0, 0, 550, 310, '', '', '', false, 300, '', false, false, 0);
//  Custom Variables section
$first_name = 'John';
$last_name = 'Doe';
$dob = '14-06-1992';
$doe = '22-07-2023  ';
$title = 'This is the Title of the para';
$para1 = 'This is the Para 1';
$para2 = 'This is the Parar 2';
// ============
$pdf->Image('qrcode.png', 128, 2, 12, '', '', '', '', false, 300);
$pdf->Image('barcode_v.png', 126, 23, 15, '', '', '', '', false, 300);

//Cell($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=0, $link='', $stretch=0, $ignore_min_height=false, $calign='T', $valign='M')

$pdf->SetXY(2, 2);
$pdf->Cell(50, 0, 'I D E N T I T Y - C A R D', 1, 1, 'L', 0, '', 0);
$pdf->SetXY(2, 10);
$pdf->Cell(10, 0, 'Name : ', 0, 1, 'L', 0, '', 0);
$pdf->SetXY(2, 15);
$pdf->Cell(10, 0, $first_name.' '.$last_name, 0, 1, 'L', 0, '', 0);

$pdf->SetXY(80, 5);
$pdf->Cell(10, 0, 'sample text 1', 0, 1, 'L', 0, '', 0);
$pdf->SetXY(75, 10);
$pdf->Cell(10, 0, 'sample text 2', 0, 1, 'L', 0, '', 0);
$pdf->SetXY(80, 15);
$pdf->Cell(10, 0, 'sample text 3', 0, 1, 'L', 0, '', 0);
$pdf->SetXY(90, 20);
$pdf->Cell(10, 0, 'Label text here', 0, 1, 'L', 0, '', 0);


$pdf->SetXY(2, 20);
$pdf->Cell(10, 0, 'Date of Birth : ', 0, 1, 'L', 0, '', 0);
$pdf->SetXY(2, 25);
$pdf->Cell(10, 0, $dob, 0, 1, 'L', 0, '', 0);

$pdf->SetXY(2, 30);
$pdf->Cell(10, 0, 'Date of Expiry : ', 0, 1, 'L', 0, '', 0);
$pdf->SetXY(2, 35);
$pdf->Cell(10, 0, $doe, 0, 1, 'L', 0, '', 0);

$pdf->SetXY(60, 40);
$pdf->Cell(0, 0,$title, 0, 1, 'L', 0, '', 0);

$pdf->SetXY(20, 70);
$pdf->Cell(0, 0,$para1, 0, 1, 'L', 0, '', 0);

$pdf->SetXY(10, 75);
$pdf->Cell(0, 0,$para2, 0, 1, 'L', 0, '', 0);

$pdf->Output('output.pdf', 'I');