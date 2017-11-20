<?
	ob_start();
require_once('./pdf/lib/header.php');
require_once('./pdf/lib/janji.php');

if ($entryjo->jpid != 4)
	die("Not Exist");

$pdf = new PDFTable('P', 'pt', 'A4');
	$pdf->AddBig5Font();
$pdf->AddPage();
    $pdf->Data('perawatsakit_01.dat',0,0);
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
if ($width > 180) {
	$str = TextWithLimit($pdf, $entryjo->agalmtkantor, 180);
	for ($i=0; $i<=count($str); $i++) {
		$pdf->Text(24,74+$i*8,$str[$i]);
	}
} else {
	$pdf->Text(24,84,$entryjo->agalmtkantor);
}

$pdf->Text(24,102,"電話 : ".$entryjo->agtelp.", 傳真 : ".$entryjo->agfax);
$pdf->SetFont('Big5','B',10);
$pdf->Text(24,122,"Agency's MOL License Number : ".$entryjo->agnoijincla);
$pdf->SetFont('Big5','',8);

$pdf->SetFont('Big5','',$fs);
$pdf->Text(243,157,$entryjo->mjpngjwbcn == "" ? $entryjo->mjnamacn : $entryjo->mjnamacn." (".$entryjo->mjpngjwbcn.")");
$pdf->Text(84,195,$entryjo->mjalmtcn);
$pdf->SetFont('Big5','',8);
$pdf->Text(101,214,$entryjo->mjalmt);
$pdf->SetFont('Big5','',$fs);
$pdf->Text(143,176,$entryjo->mjpngjwb == "" ? $entryjo->mjnama : $entryjo->mjnama." (".$entryjo->mjpngjwb.")");
$pdf->Text(84,233,$entryjo->mjtelp);
$pdf->Text(142,324,$tki->tknama);
$pdf->SetFont('Big5','',8);
$pdf->Text(180,362,$tki->tkalmtid);
$pdf->SetFont('Big5','',$fs);
$pdf->Text(259,397,$tki->tkpaspor);
$pdf->Text(259,417,$tki->tktglkeluar." / ".$tki->tktmptkeluar);
$pdf->Text(113,435,$tki->tktgllahir);
$pdf->Text(420,435,$tki->tkjk);
$pdf->Text(137,454,$tki->tktgllahir);
$pdf->SetFont('Big5','',9);
$pdf->Text(275,435,$tki->tktmptlahir);
$pdf->Text(300,454,$tki->tktmptlahir);
$pdf->SetFont('Big5','',$fs);
$pdf->Text(472,454,$tki->tkjk);
$pdf->Text(210,507,$tki->tkjmlanaktanggungan);
$pdf->Text(125,546,$tki->tkahliwaris);
$pdf->Text(156,565,$tki->tkahliwaris);
$pdf->Text(86,601,$tki->tknamacn2);
$pdf->SetFont('Big5','',8);
$pdf->Text(85,639,$tki->tkalmtcn2);
$pdf->SetFont('Big5','',$fs);
$pdf->Text(92,620,$tki->tknama2);
$pdf->SetFont('Big5','',8);
$pdf->Text(100,659,$tki->tkalmt2);
$pdf->SetFont('Big5','',$fs);
$pdf->Text(85,676,$tki->tktelp);
$pdf->Text(322,676,$tki->tkhub);
switch ($tki->tkstatkwn) {
	case 0: $pdf->Text(179,473,"V");break;
	case 1: $pdf->Text(295,473,"V");break;
	case 2: $pdf->Text(421,473,"V");break;
}

Barcode::fpdf($pdf, '000000', $bx, $by, 0, 'code39', array('code'=>$code), $bw, $bh);

	$pdf->AddPage();
    $pdf->Data('perawatsakit_02.dat',0,0);
	$pdf->SetFont('Big5','',$fs);
$pdf->Text(341,156,$entryjo->jomkthn);
$pdf->Text(376,156,$entryjo->jomkbln);
$pdf->Text(408,156,$entryjo->jomkhr);
$pdf->Text(278,206,$entryjo->jomkthn);
$pdf->Text(335,206,$entryjo->jomkbln);
$pdf->Text(385,206,$entryjo->jomkhr);
$pdf->Text(314,520,$entryjo->jpgaji/1);
$pdf->Text(200,570,$entryjo->jpgaji/1);
Barcode::fpdf($pdf, '000000', $bx, $by, 0, 'code39', array('code'=>$code), $bw, $bh);
	
	$pdf->AddPage();
    $pdf->Data('perawatsakit_03.dat',0,0);
	$pdf->SetFont('Big5','',$fs);
$pdf->Text(295,313,round($entryjo->jpgaji/30,1));
$pdf->Text(438,373,round($entryjo->jpgaji/30,1));
$pdf->Text(240,478,round($entryjo->jpgaji/30,1));
$pdf->Text(222,539,round($entryjo->jpgaji/30,1));
Barcode::fpdf($pdf, '000000', $bx, $by, 0, 'code39', array('code'=>$code), $bw, $bh);
	
	$pdf->AddPage();
    $pdf->Data('perawatsakit_04.dat',0,0);
	$pdf->SetFont('Big5','',$fs);
Barcode::fpdf($pdf, '000000', $bx, $by, 0, 'code39', array('code'=>$code), $bw, $bh);
	
	$pdf->AddPage();
    $pdf->Data('perawatsakit_05.dat',0,0);
	$pdf->SetFont('Big5','',$fs);
Barcode::fpdf($pdf, '000000', $bx, $by, 0, 'code39', array('code'=>$code), $bw, $bh);
	
	$pdf->AddPage();
    $pdf->Data('perawatsakit_06.dat',0,0);
	$pdf->SetFont('Big5','',$fs);
Barcode::fpdf($pdf, '000000', $bx, $by, 0, 'code39', array('code'=>$code), $bw, $bh);
	
	$pdf->AddPage();
    $pdf->Data('perawatsakit_07.dat',0,0);
	
$pdf->SetFont('Big5','',8);
$pdf->Text(43,376,$entryjo->mjpngjwb == "" ? $entryjo->mjnama : $entryjo->mjnama." (".$entryjo->mjpngjwb.")");
$pdf->Text(305,376,$tki->tknama);

$pdf->Text(43,433,$entryjo->agnamacn);
$pdf->Text(43,443,$entryjo->agnama);
$pdf->Text(305,443,$entryjo->ppnama);

$pdf->Text(43,470,$entryjo->agalmtkantorcn);

$width = $pdf->GetStringWidth($entryjo->agalmtkantor);
if ($width > 250) {
	$str = TextWithLimit($pdf, $entryjo->agalmtkantor, 250);
	for ($i=0; $i<=count($str); $i++) {
		$pdf->Text(43,478+$i*8,$str[$i]);
	}
	$pdf->Text(43,478+count($str)*8,"電話: ".$entryjo->agtelp.", 傳真: ".$entryjo->agfax);
} else {
	$pdf->Text(43,478,$entryjo->agalmtkantor);
	$pdf->Text(43,486,"電話: ".$entryjo->agtelp.", 傳真: ".$entryjo->agfax);
}

$width = $pdf->GetStringWidth($entryjo->ppalmtkantor);
if ($width > 250) {
	$str = TextWithLimit($pdf, $entryjo->ppalmtkantor, 250);
	for ($i=0; $i<=count($str); $i++) {
		$pdf->Text(305,470+$i*8,$str[$i]);
	}
	$pdf->Text(305,470+count($str)*8,"Telp: ".$entryjo->pptelp.", Fax: ".$entryjo->ppfax);
} else {
	$pdf->Text(305,470,$entryjo->ppalmtkantor);
	$pdf->Text(305,478,"Telp: ".$entryjo->pptelp.", Fax: ".$entryjo->ppfax);
}

	
Barcode::fpdf($pdf, '000000', $bx, $by, 0, 'code39', array('code'=>$code), $bw, $bh);

	$pdf->output();
	ob_flush();
?>
