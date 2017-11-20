<?
ob_start();
require_once('./pdf/lib/header.php');
require_once('./pdf/lib/janji.php');

$tki2 = Tki::get($tki->tkrevid);
$code = $tki2->tkbc;

$pdf = new PDFTable('P', 'pt', 'A4');
$pdf->AddPage();
$pdf->SetMargins(72, 21.25, 72, 72);
$pdf->AddBig5Font();

$pdf->SetFont("Big5", "B", 14);
$pdf->Cell(0, 40, "", 0, 1);
$pdf->Cell(0, 20, "Reference Letter", 0, 1, 'C');
$pdf->SetFont("Big5",'', 11);
$pdf->Cell(0, 20, "Data Replacement of Indonesian Labor in Taiwan", 0, 1, 'C');
$pdf->Cell(0, 25, "", 0, 1);
$pdf->Cell(0, 20, "This letter is used for reference in propose data replacement for Indonesian Labors in Taiwan.", 0, 1);
$pdf->Cell(0, 20, "Please bring this letter along with new job contract, to be endorsed in Indonesian Economic and", 0, 1);
$pdf->Cell(0, 20, "Trade Office to Taipei (for free).", 0, 1);
$pdf->Cell(0, 20, "", 0, 1);
$pdf->Cell(0, 20, "Previous Data", 0, 1);
$pdf->Cell(113, 20, "Name", 0, 0);
$pdf->Cell(0, 20, ": $tki->tknama", 0, 1);
$pdf->Cell(113, 20, "Passport / ID No", 0, 0);
$pdf->Cell(0, 20, ": $tki->tkpaspor", 0, 1);
$pdf->Cell(113, 20, "Date / Place of Birth", 0, 0);
$pdf->Cell(0, 20, ": $tki->tktgllahir / $tki->tktmptlahir", 0, 1);
$pdf->Cell(113, 20, "Address", 0, 0);
$pdf->Cell(0, 20, ": $tki->tkalmtid", 0, 1);
$pdf->Cell(0, 20, "", 0, 1);
$pdf->Cell(0, 20, "New Data", 0, 1);
$pdf->Cell(113, 20, "Name", 0, 0);
$pdf->Cell(0, 20, ": $tki2->tknama", 0, 1);
$pdf->Cell(113, 20, "Passport / ID No", 0, 0);
$pdf->Cell(0, 20, ": $tki2->tkpaspor", 0, 1);
$pdf->Cell(113, 20, "Date / Place of Birth", 0, 0);
$pdf->Cell(0, 20, ": $tki2->tktgllahir / $tki2->tktmptlahir", 0, 1);
$pdf->Cell(113, 20, "Address", 0, 0);
$pdf->Cell(0, 20, ": $tki2->tkalmtid", 0, 1);
$pdf->Cell(0, 20, "", 0, 1);
$pdf->Cell(0, 20, "Indonesian Economic and Trade Office to Taipei", 0, 1);
$by = $pdf->GetY();
$pdf->Cell(0, 20, $tki->tktglubah, 0, 1);
Barcode::fpdf($pdf, '000000', $bx, $by, 0, 'code128', array('code'=>$code), $bw, $bh);

$pdf->output();
ob_flush();
?>