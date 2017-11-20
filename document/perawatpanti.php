<?
	ob_start();
require_once('./pdf/lib/header.php');
require_once('./pdf/lib/janji.php');

if ($entryjo->jpid != 3)
	die("Not Exist");

$pdf = new PDFTable('P', 'pt', 'A4');
$pdf->AddBig5Font();
$pdf->AddPage();
$pdf->Data('perawatpanti_01.dat',0,0);
$pdf->SetFont('Big5','',8);
$pdf->Text(87,28,$entryjo->agnamacn);

$width = $pdf->GetStringWidth($entryjo->agnama);
if ($width > 170) {
	$str = TextWithLimit($pdf, $entryjo->agnama, 170);
	for ($i=0; $i<=count($str); $i++) {
		$pdf->Text(22,39+$i*8,$str[$i]);
	}
} else {
	$pdf->Text(22,47,$entryjo->agnama);
}

$pdf->Text(82,64,$entryjo->agalmtkantorcn);

$width = $pdf->GetStringWidth($entryjo->agalmtkantor);
if ($width > 170) {
	$str = TextWithLimit($pdf, $entryjo->agalmtkantor, 170);
	for ($i=0; $i<=count($str); $i++) {
		$pdf->Text(22,74+$i*8,$str[$i]);
	}
} else {
	$pdf->Text(22,82,$entryjo->agalmtkantor);
}

$pdf->Text(22,100,"電話 : ".$entryjo->agtelp.", 傳真 : ".$entryjo->agfax);
$pdf->SetFont('Big5','B',10);
$pdf->Text(24,119,"Agency's MOL License Number : ".$entryjo->agnoijincla);

$pdf->SetFont('Big5','',$fs);
$pdf->Text(300,159,$entryjo->mjpngjwbcn == "" ? $entryjo->mjnamacn : $entryjo->mjnamacn." (".$entryjo->mjpngjwbcn.")");
$pdf->SetFont('Big5','',8);
$pdf->Text(79,197,$entryjo->mjalmtcn);
$pdf->Text(99,215,$entryjo->mjalmt);
$pdf->SetFont('Big5','',8);
if ($width > 200) {
	$str = TextWithLimit($pdf,$entryjo->mjpngjwb == "" ? $entryjo->mjnama : ($entryjo->mjnama." (".$entryjo->mjpngjwb.")"), 200);
	for ($i=0; $i<=count($str); $i++) {
		$pdf->Text(255,170+$i*8,$str[$i]);
	}
} else {
	$pdf->Text(255,177,$entryjo->mjpngjwb == "" ? $entryjo->mjnama : $entryjo->mjnama." (".$entryjo->mjpngjwb.")");
}

$pdf->SetFont('Big5','',$fs);
$pdf->Text(79,235,$entryjo->mjtelp);
$pdf->Text(140,324,$tki->tknama);
$pdf->SetFont('Big5','',8);
$pdf->Text(180,362,$tki->tkalmtid);
$pdf->SetFont('Big5','',$fs);
$pdf->Text(259,400,$tki->tkpaspor);
$pdf->Text(259,419,$tki->tktglkeluar." / ".$tki->tktmptkeluar);
$pdf->Text(113,435,$tki->tktgllahir);
$pdf->Text(423,435,$tki->tkjk);
$pdf->Text(137,454,$tki->tktgllahir);
$pdf->SetFont('Big5','',9);
$pdf->Text(278,435,$tki->tktmptlahir);
$pdf->Text(302,454,$tki->tktmptlahir);
$pdf->SetFont('Big5','',$fs);
$pdf->Text(477,454,$tki->tkjk);
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
	case 0: $pdf->Text(183,474,"V");break;
	case 1: $pdf->Text(300,474,"V");break;
	case 2: $pdf->Text(426,474,"V");break;
}
Barcode::fpdf($pdf, '000000', $bx, $by, 0, 'code39', array('code'=>$code), $bw, $bh);

	$pdf->AddPage();
    $pdf->Data('perawatpanti_02.dat',0,0);
	$pdf->SetFont('Big5','',$fs);
$pdf->Text(340,183,$entryjo->jomkthn);
$pdf->Text(377,183,$entryjo->jomkbln);
$pdf->Text(407,183,$entryjo->jomkhr);
$pdf->Text(264,241,$entryjo->jomkthn);
$pdf->Text(319,241,$entryjo->jomkbln);
$pdf->Text(368,241,$entryjo->jomkhr);
Barcode::fpdf($pdf, '000000', $bx, $by, 0, 'code39', array('code'=>$code), $bw, $bh);
	
	$pdf->AddPage();
    $pdf->Data('perawatpanti_03.dat',0,0);
	$pdf->SetFont('Big5','',$fs);
$pdf->Text(311,92,$entryjo->jpgaji/1);
$pdf->Text(512,132,$entryjo->jpgaji/1);
Barcode::fpdf($pdf, '000000', $bx, $by, 0, 'code39', array('code'=>$code), $bw, $bh);
	
	$pdf->AddPage();
    $pdf->Data('perawatpanti_04.dat',0,0);
	$pdf->SetFont('Big5','',$fs);
$pdf->Text(419,153,$entryjo->joakomodasi/1);
$pdf->Text(219,226,$entryjo->joakomodasi/1);
$pdf->Text(286,382,round($entryjo->jpgaji/30,1));
$pdf->Text(387,444,round($entryjo->jpgaji/30,1));
$pdf->Text(200,594,round($entryjo->jpgaji/30,1));
$pdf->Text(212,682,round($entryjo->jpgaji/30,1));
Barcode::fpdf($pdf, '000000', $bx, $by, 0, 'code39', array('code'=>$code), $bw, $bh);
	
	$pdf->AddPage();
    $pdf->Data('perawatpanti_05.dat',0,0);
	$pdf->SetFont('Big5','',$fs);
Barcode::fpdf($pdf, '000000', $bx, $by, 0, 'code39', array('code'=>$code), $bw, $bh);
	
	$pdf->AddPage();
    $pdf->Data('perawatpanti_06.dat',0,0);
	$pdf->SetFont('Big5','',$fs);
Barcode::fpdf($pdf, '000000', $bx, $by, 0, 'code39', array('code'=>$code), $bw, $bh);
	
	$pdf->AddPage();
    $pdf->Data('perawatpanti_07.dat',0,0);
	$pdf->SetFont('Big5','',$fs);
Barcode::fpdf($pdf, '000000', $bx, $by, 0, 'code39', array('code'=>$code), $bw, $bh);
	
	$pdf->AddPage();
    $pdf->Data('perawatpanti_08.dat',0,0);
	$pdf->SetFont('Big5','',8);

if ($width > 200) {
	$str = TextWithLimit($pdf,$entryjo->mjpngjwb == "" ? $entryjo->mjnama : ($entryjo->mjnama." (".$entryjo->mjpngjwb.")"), 200);
	for ($i=0; $i<=count($str); $i++) {
		$pdf->Text(43,747+$i*8,$str[$i]);
	}
} else {
	$pdf->Text(43,755,$entryjo->mjpngjwb == "" ? $entryjo->mjnama : $entryjo->mjnama." (".$entryjo->mjpngjwb.")");
}	

$pdf->Text(295,755,$tki->tknama);
$pdf->SetFont('Big5','',$fs);

Barcode::fpdf($pdf, '000000', $bx, $by, 0, 'code39', array('code'=>$code), $bw, $bh);
	
	$pdf->AddPage();
    $pdf->Data('perawatpanti_09.dat',0,0);
	
$pdf->SetFont('Big5','',8);
$pdf->Text(43,75,$entryjo->agnamacn);
$pdf->Text(43,83,$entryjo->agnama);
$pdf->Text(295,83,$entryjo->ppnama);

$pdf->Text(43,113,$entryjo->agalmtkantorcn);

$width = $pdf->GetStringWidth($entryjo->agalmtkantor);
if ($width > 250) {
	$str = TextWithLimit($pdf, $entryjo->agalmtkantor, 250);
	for ($i=0; $i<=count($str); $i++) {
		$pdf->Text(43,121+$i*8,$str[$i]);
	}
	$pdf->Text(43,121+count($str)*8,"電話: ".$entryjo->agtelp.", 傳真: ".$entryjo->agfax);
} else {
	$pdf->Text(43,121,$entryjo->agalmtkantor);
	$pdf->Text(43,129,"電話: ".$entryjo->agtelp.", 傳真: ".$entryjo->agfax);
}

$width = $pdf->GetStringWidth($entryjo->ppalmtkantor);
if ($width > 250) {
	$str = TextWithLimit($pdf, $entryjo->ppalmtkantor, 250);
	for ($i=0; $i<=count($str); $i++) {
		$pdf->Text(295,113+$i*8,$str[$i]);
	}
	$pdf->Text(295,113+count($str)*8,"Telp: ".$entryjo->pptelp.", Fax: ".$entryjo->ppfax);
} else {
	$pdf->Text(295,113,$entryjo->ppalmtkantor);
	$pdf->Text(295,121,"Telp: ".$entryjo->pptelp.", Fax: ".$entryjo->ppfax);
}
	
Barcode::fpdf($pdf, '000000', $bx, $by, 0, 'code39', array('code'=>$code), $bw, $bh);

	$pdf->output();
	ob_flush();
?>
