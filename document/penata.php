<?
	ob_start();
require_once('./pdf/lib/header.php');
require_once('./pdf/lib/janji.php');

if ($entryjo->jpid != 5)
	die("Not Exist");

$pdf = new PDFTable('P', 'pt', 'A4');
	$pdf->AddBig5Font();
$pdf->AddPage();
    $pdf->Data('penata_01.dat',0,0);
$pdf->SetFont('Big5','',8);
$pdf->Text(99,28,$entryjo->agnamacn);

$width = $pdf->GetStringWidth($entryjo->agnama);
if ($width > 180) {
	$str = TextWithLimit($pdf, $entryjo->agnama, 180);
	for ($i=0; $i<=count($str); $i++) {
		$pdf->Text(26,39+$i*8,$str[$i]);
	}
} else {
	$pdf->Text(26,47,$entryjo->agnama);
}

$pdf->Text(93,64,$entryjo->agalmtkantorcn);

$width = $pdf->GetStringWidth($entryjo->agalmtkantor);
if ($width > 190) {
	$str = TextWithLimit($pdf, $entryjo->agalmtkantor, 190);
	for ($i=0; $i<=count($str); $i++) {
		$pdf->Text(26,76+$i*8,$str[$i]);
	}
} else {
	$pdf->Text(26,84,$entryjo->agalmtkantor);
}

$pdf->Text(26,102,"電話 : ".$entryjo->agtelp.", 傳真 : ".$entryjo->agfax);
$pdf->SetFont('Big5','B',10);
$pdf->Text(26,115,"Agency's MOL License Number : ".$entryjo->agnoijincla);

$pdf->SetFont('Big5','',$fs);
$pdf->Text(240,172,$entryjo->mjpngjwbcn == "" ? $entryjo->mjnamacn : $entryjo->mjnamacn." (".$entryjo->mjpngjwbcn.")");
$pdf->SetFont('Big5','',8);
$pdf->Text(108,210,$entryjo->mjalmtcn);
$pdf->Text(97,230,$entryjo->mjalmt);
$pdf->SetFont('Big5','',$fs);
$pdf->Text(142,193,$entryjo->mjpngjwb == "" ? $entryjo->mjnama : $entryjo->mjnama." (".$entryjo->mjpngjwb.")");
$pdf->Text(83,250,$entryjo->mjtelp);
$pdf->Text(145,344,$tki->tknama);
$pdf->SetFont('Big5','',8);
$pdf->Text(184,382,$tki->tkalmtid);
$pdf->SetFont('Big5','',$fs);
$pdf->Text(260,420,$tki->tkpaspor);
$pdf->Text(260,438,$tki->tktglkeluar." / ".$tki->tktmptkeluar);
$pdf->Text(118,455,$tki->tktgllahir);
$pdf->Text(428,455,$tki->tkjk);
$pdf->Text(142,474,$tki->tktgllahir);
$pdf->SetFont('Big5','',9);
$pdf->Text(278,455,$tki->tktmptlahir);
$pdf->Text(302,474,$tki->tktmptlahir);
$pdf->SetFont('Big5','',$fs);
$pdf->Text(482,474,$tki->tkjk);

$pdf->Text(214,542,$tki->tkjmlanaktanggungan);
$pdf->Text(130,581,$tki->tkahliwaris);
$pdf->Text(161,600,$tki->tkahliwaris);
$pdf->Text(91,636,$tki->tknamacn2);
$pdf->Text(90,674,$tki->tkalmtcn2);
$pdf->Text(97,655,$tki->tknama2);
$pdf->SetFont('Big5','',8);
$pdf->Text(105,694,$tki->tkalmt2);
$pdf->SetFont('Big5','',$fs);
$pdf->Text(91,711,$tki->tktelp);
$pdf->Text(327,711,$tki->tkhub);

switch ($tki->tkstatkwn) {
	case 0: $pdf->Text(173,494,"V");break;
	case 1: $pdf->Text(300,494,"V");break;
	case 2: $pdf->Text(427,494,"V");break;
}
Barcode::fpdf($pdf, '000000', $bx, $by, 0, 'code39', array('code'=>$code), $bw, $bh);

	$pdf->AddPage();
    $pdf->Data('penata_02.dat',0,0);
	$pdf->SetFont('Big5','',$fs);
$pdf->Text(335,183,$entryjo->jomkthn);
$pdf->Text(372,183,$entryjo->jomkbln);
$pdf->Text(402,183,$entryjo->jomkhr);
$pdf->Text(275,239,$entryjo->jomkthn);
$pdf->Text(332,239,$entryjo->jomkbln);
$pdf->Text(382,239,$entryjo->jomkhr);
$pdf->Text(307,571,$entryjo->jpgaji/1);
$pdf->Text(505,607,$entryjo->jpgaji/1);
Barcode::fpdf($pdf, '000000', $bx, $by, 0, 'code39', array('code'=>$code), $bw, $bh);
	
	$pdf->AddPage();
    $pdf->Data('penata_03.dat',0,0);
	$pdf->SetFont('Big5','',$fs);
$pdf->Text(277,282,round($entryjo->jpgaji/30,1));
$pdf->Text(372,343,round($entryjo->jpgaji/30,1));
$pdf->Text(220,447,round($entryjo->jpgaji/30,1));
$pdf->Text(213,508,round($entryjo->jpgaji/30,1));
Barcode::fpdf($pdf, '000000', $bx, $by, 0, 'code39', array('code'=>$code), $bw, $bh);
	
	$pdf->AddPage();
    $pdf->Data('penata_04.dat',0,0);
	$pdf->SetFont('Big5','',$fs);
Barcode::fpdf($pdf, '000000', $bx, $by, 0, 'code39', array('code'=>$code), $bw, $bh);
	
	$pdf->AddPage();
    $pdf->Data('penata_05.dat',0,0);
Barcode::fpdf($pdf, '000000', $bx, $by, 0, 'code39', array('code'=>$code), $bw, $bh);
	
	$pdf->AddPage();
    $pdf->Data('penata_06.dat',0,0);
Barcode::fpdf($pdf, '000000', $bx, $by, 0, 'code39', array('code'=>$code), $bw, $bh);
	
	$pdf->AddPage();
    $pdf->Data('penata_07.dat',0,0);

$pdf->SetFont('Big5','',8);
$pdf->Text(38,242,$entryjo->mjpngjwb == "" ? $entryjo->mjnama : $entryjo->mjnama." (".$entryjo->mjpngjwb.")");
$pdf->Text(300,242,$tki->tknama);

$pdf->Text(38,291,$entryjo->agnamacn);
$pdf->Text(38,299,$entryjo->agnama);
$pdf->Text(300,299,$entryjo->ppnama);

$pdf->Text(38,325,$entryjo->agalmtkantorcn);

$width = $pdf->GetStringWidth($entryjo->agalmtkantor);
if ($width > 250) {
	$str = TextWithLimit($pdf, $entryjo->agalmtkantor, 250);
	for ($i=0; $i<=count($str); $i++) {
		$pdf->Text(48,333+$i*8,$str[$i]);
	}
	$pdf->Text(38,333+count($str)*8,"電話: ".$entryjo->agtelp.", 傳真: ".$entryjo->agfax);
} else {
	$pdf->Text(38,333,$entryjo->agalmtkantor);
	$pdf->Text(38,341,"電話: ".$entryjo->agtelp.", 傳真: ".$entryjo->agfax);
}

$width = $pdf->GetStringWidth($entryjo->ppalmtkantor);
if ($width > 250) {
	$str = TextWithLimit($pdf, $entryjo->ppalmtkantor, 250);
	for ($i=0; $i<=count($str); $i++) {
		$pdf->Text(300,325+$i*8,$str[$i]);
	}
	$pdf->Text(300,325+count($str)*8,"Telp: ".$entryjo->pptelp.", Fax: ".$entryjo->ppfax);
} else {
	$pdf->Text(300,325,$entryjo->ppalmtkantor);
	$pdf->Text(300,333,"Telp: ".$entryjo->pptelp.", Fax: ".$entryjo->ppfax);
}
	
Barcode::fpdf($pdf, '000000', $bx, $by, 0, 'code39', array('code'=>$code), $bw, $bh);

	$pdf->output();
	ob_flush();
?>
