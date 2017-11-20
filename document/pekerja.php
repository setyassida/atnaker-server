<?
ob_start();
require_once('./pdf/lib/header.php');
require_once('./pdf/lib/janji.php');

if ($entryjo->jpid != 2)
	die("Not Exist");

$pdf = new PDFTable('P', 'pt', 'A4');
$pdf->AddBig5Font();
$pdf->AddPage();
$pdf->Data('pekerja_01.dat',0,0);
$pdf->SetFont('Big5','',8);
$pdf->Text(99,28,$entryjo->agnamacn);

$width = $pdf->GetStringWidth($entryjo->agnama);
if ($width > 180) {
	$str = TextWithLimit($pdf, $entryjo->agnama, 180);
	for ($i=0; $i<=count($str); $i++) {
		$pdf->Text(24,40+$i*8,$str[$i]);
	}
} else {
	$pdf->Text(24,47,$entryjo->agnama);
}

$pdf->Text(93,64,$entryjo->agalmtkantorcn);

$width = $pdf->GetStringWidth($entryjo->agalmtkantor);
if ($width > 190) {
	$str = TextWithLimit($pdf, $entryjo->agalmtkantor, 190);
	for ($i=0; $i<=count($str); $i++) {
		$pdf->Text(24,74+$i*8,$str[$i]);
	}
} else {
	$pdf->Text(24,84,$entryjo->agalmtkantor);
}

$pdf->Text(24,102,"電話 : ".$entryjo->agtelp.", 傳真 : ".$entryjo->agfax);
$pdf->SetFont('Big5','B',10);
$pdf->Text(24,119,"Agency's MOL License Number : ".$entryjo->agnoijincla);

$pdf->SetFont('Big5','',$fs);
$pdf->Text(245,142,$entryjo->mjpngjwbcn == "" ? $entryjo->mjnamacn : $entryjo->mjnamacn." (".$entryjo->mjpngjwbcn.")");
$pdf->SetFont('Big5','',8);
$pdf->Text(84,180,$entryjo->mjalmtcn);
$pdf->Text(102,200,$entryjo->mjalmt);
$pdf->SetFont('Big5','',$fs);
$pdf->Text(173,163,$entryjo->mjpngjwb == "" ? $entryjo->mjnama : $entryjo->mjnama." (".$entryjo->mjpngjwb.")");
$pdf->Text(83,220,$entryjo->mjtelp);
$pdf->Text(145,310,$tki->tknama);
$pdf->SetFont('Big5','',8);
$pdf->Text(184,347,$tki->tkalmtid);
$pdf->SetFont('Big5','',$fs);
$pdf->Text(260,385,$tki->tkpaspor);
$pdf->Text(259,404,$tki->tktglkeluar." / ".$tki->tktmptkeluar);
$pdf->Text(118,420,$tki->tktgllahir);

switch ($tki->tkstatkwn) {
	case 0: $pdf->Text(191,459,"V");break;
	case 1: $pdf->Text(306,459,"V");break;
	case 2: $pdf->Text(433,459,"V");break;
}

$pdf->SetFont('Big5','',9);
$pdf->Text(288,420,$tki->tktmptlahir);
$pdf->Text(312,439,$tki->tktmptlahir);
$pdf->SetFont('Big5','',$fs);
$pdf->Text(428,420,$tki->tkjk);
$pdf->Text(142,439,$tki->tktgllahir);
$pdf->Text(482,439,$tki->tkjk);
$pdf->Text(214,494,$tki->tkjmlanaktanggungan);
$pdf->Text(130,531,$tki->tkahliwaris);
$pdf->Text(161,550,$tki->tkahliwaris);
$pdf->Text(91,586,$tki->tknamacn2);
$pdf->Text(97,605,$tki->tknama2);
$pdf->SetFont('Big5','',8);
$pdf->Text(90,624,$tki->tkalmtcn2);
$pdf->Text(105,644,$tki->tkalmt2);
$pdf->SetFont('Big5','',$fs);
$pdf->Text(91,661,$tki->tktelp);
$pdf->Text(327,661,$tki->tkhub);
Barcode::fpdf($pdf, '000000', $bx, $by, 0, 'code39', array('code'=>$code), $bw, $bh);

$pdf->AddPage();
   $pdf->Data('pekerja_02.dat',0,0);
$pdf->SetFont('Big5','',$fs);
$pdf->Text(237,68,$entryjo->joposisicn);
$pdf->Text(268,400,$entryjo->joposisicn);
$pdf->Text(395,108,$entryjo->joposisi);
$pdf->Text(430,422,$entryjo->joposisi);
$pdf->Text(351,184,$entryjo->jomkthn);
$pdf->Text(388,184,$entryjo->jomkbln);
$pdf->Text(418,184,$entryjo->jomkhr);
$pdf->Text(285,242,$entryjo->jomkthn);
$pdf->Text(342,242,$entryjo->jomkbln);
$pdf->Text(392,242,$entryjo->jomkhr);
Barcode::fpdf($pdf, '000000', $bx, $by, 0, 'code39', array('code'=>$code), $bw, $bh);

	$pdf->AddPage();
   $pdf->Data('pekerja_03.dat',0,0);
   $pdf->SetFont('Big5','',$fs);
$pdf->Text(320,117,$entryjo->jpgaji/1);
$pdf->Text(519,157,$entryjo->jpgaji/1);
Barcode::fpdf($pdf, '000000', $bx, $by, 0, 'code39', array('code'=>$code), $bw, $bh);

	$pdf->AddPage();
   $pdf->Data('pekerja_04.dat',0,0);
   $pdf->SetFont('Big5','',$fs);
$pdf->Text(457,228,$entryjo->joakomodasi/1);
$pdf->Text(230,301,$entryjo->joakomodasi/1);
$pdf->Text(310,455,round($entryjo->jpgaji/30,1));
$pdf->Text(441,518,round($entryjo->jpgaji/30,1));
$pdf->Text(246,663,round($entryjo->jpgaji/30,1));
$pdf->Text(386,750,round($entryjo->jpgaji/30,1));
Barcode::fpdf($pdf, '000000', $bx, $by, 0, 'code39', array('code'=>$code), $bw, $bh);

	$pdf->AddPage();
   $pdf->Data('pekerja_05.dat',0,0);
   $pdf->SetFont('Big5','',$fs);
Barcode::fpdf($pdf, '000000', $bx, $by, 0, 'code39', array('code'=>$code), $bw, $bh);

	$pdf->AddPage();
   $pdf->Data('pekerja_06.dat',0,0);
   $pdf->SetFont('Big5','',$fs);
Barcode::fpdf($pdf, '000000', $bx, $by, 0, 'code39', array('code'=>$code), $bw, $bh);

	$pdf->AddPage();
   $pdf->Data('pekerja_07.dat',0,0);
   $pdf->SetFont('Big5','',$fs);
Barcode::fpdf($pdf, '000000', $bx, $by, 0, 'code39', array('code'=>$code), $bw, $bh);

	$pdf->AddPage();
   $pdf->Data('pekerja_08.dat',0,0);
   $pdf->SetFont('Big5','',$fs);
Barcode::fpdf($pdf, '000000', $bx, $by, 0, 'code39', array('code'=>$code), $bw, $bh);

	$pdf->AddPage();
   $pdf->Data('pekerja_09.dat',0,0);
$pdf->SetFont('Big5','',8);
$pdf->Text(48,217,$entryjo->mjpngjwb == "" ? $entryjo->mjnama : $entryjo->mjnama." (".$entryjo->mjpngjwb.")");
$pdf->Text(310,217,$tki->tknama);

$pdf->Text(48,256,$entryjo->agnamacn);
$pdf->Text(48,264,$entryjo->agnama);
$pdf->Text(310,264,$entryjo->ppnama);

$pdf->Text(48,296,$entryjo->agalmtkantorcn);

$width = $pdf->GetStringWidth($entryjo->agalmtkantor);
if ($width > 250) {
	$str = TextWithLimit($pdf, $entryjo->agalmtkantor, 250);
	for ($i=0; $i<=count($str); $i++) {
		$pdf->Text(48,304+$i*8,$str[$i]);
	}
	$pdf->Text(48,304+count($str)*8,"電話: ".$entryjo->agtelp.", 傳真: ".$entryjo->agfax);
} else {
	$pdf->Text(48,304,$entryjo->agalmtkantor);
	$pdf->Text(48,312,"電話: ".$entryjo->agtelp.", 傳真: ".$entryjo->agfax);
}

$width = $pdf->GetStringWidth($entryjo->ppalmtkantor);
if ($width > 250) {
	$str = TextWithLimit($pdf, $entryjo->ppalmtkantor, 250);
	for ($i=0; $i<=count($str); $i++) {
		$pdf->Text(310,296+$i*8,$str[$i]);
	}
	$pdf->Text(310,296+count($str)*8,"Telp: ".$entryjo->pptelp.", Fax: ".$entryjo->ppfax);
} else {
	$pdf->Text(310,296,$entryjo->ppalmtkantor);
	$pdf->Text(310,304,"Telp: ".$entryjo->pptelp.", Fax: ".$entryjo->ppfax);
}

Barcode::fpdf($pdf, '000000', $bx, $by, 0, 'code39', array('code'=>$code), $bw, $bh);

$pdf->output();
ob_end_flush();
?>
