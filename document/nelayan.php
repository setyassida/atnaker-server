<?
	ob_start();
require_once('./pdf/lib/header.php');
require_once('./pdf/lib/janji.php');

if ($entryjo->jpid != 1)
	die("Not Exist");

    $pdf = new PDFTable('P', 'pt', 'A4');
	$pdf->AddBig5Font();
$pdf->AddPage();
    $pdf->Data('nelayan_01.dat',0,0);
$pdf->SetFont('Big5','',8);
$pdf->Text(99,26,$entryjo->agnamacn);

$width = $pdf->GetStringWidth($entryjo->agnama);
if ($width > 180) {
	$str = TextWithLimit($pdf, $entryjo->agnama, 180);
	for ($i=0; $i<=count($str); $i++) {
		$pdf->Text(24,37+$i*8,$str[$i]);
	}
} else {
	$pdf->Text(24,45,$entryjo->agnama);
}

$pdf->Text(93,62,$entryjo->agalmtkantorcn);

$width = $pdf->GetStringWidth($entryjo->agalmtkantor);
if ($width > 180) {
	$str = TextWithLimit($pdf, $entryjo->agalmtkantor, 180);
	for ($i=0; $i<=count($str); $i++) {
		$pdf->Text(24,74+$i*8,$str[$i]);
	}
} else {
	$pdf->Text(24,82,$entryjo->agalmtkantor);
}

$pdf->Text(24,100,"電話 : ".$entryjo->agtelp.", 傳真 : ".$entryjo->agfax);

$pdf->SetFont('Big5','B',10);
$pdf->Text(24,122,"Agency's MOL License Number : ".$entryjo->agnoijincla);
$pdf->SetFont('Big5','',fs);

$pdf->SetFont('Big5','',$fs);
$pdf->Text(290,164,$entryjo->mjpngjwbcn == "" ? $entryjo->mjnamacn : $entryjo->mjnamacn." (".$entryjo->mjpngjwbcn.")");
$pdf->SetFont('Big5','',8);
$pdf->Text(84,202,$entryjo->mjalmtcn);
$pdf->Text(102,222,$entryjo->mjalmt);
$pdf->SetFont('Big5','',$fs);
$pdf->Text(258,184,$entryjo->mjpngjwb == "" ? $entryjo->mjnama : $entryjo->mjnama." (".$entryjo->mjpngjwb.")");
$pdf->Text(85,240,$entryjo->mjtelp);
$pdf->Text(145,329,$tki->tknama);
$pdf->SetFont('Big5','',8);
$pdf->Text(184,367,$tki->tkalmtid);
$pdf->SetFont('Big5','',$fs);
$pdf->Text(260,405,$tki->tkpaspor);
$pdf->Text(260,425,$tki->tktglkeluar." / ".$tki->tktmptkeluar);
$pdf->Text(118,440,$tki->tktgllahir);
$pdf->Text(428,440,$tki->tkjk);
$pdf->Text(142,459,$tki->tktgllahir);
$pdf->SetFont('Big5','',9);
$pdf->Text(288,440,$tki->tktmptlahir);
$pdf->Text(312,459,$tki->tktmptlahir);
$pdf->SetFont('Big5','',$fs);
$pdf->Text(482,459,$tki->tkjk);
$pdf->Text(214,514,$tki->tkjmlanaktanggungan);
$pdf->Text(130,551,$tki->tkahliwaris);
$pdf->Text(161,570,$tki->tkahliwaris);
$pdf->Text(91,606,$tki->tknamacn2);
$pdf->Text(90,644,$tki->tkalmtcn2);
$pdf->Text(97,625,$tki->tknama2);
$pdf->SetFont('Big5','',8);
$pdf->Text(105,664,$tki->tkalmt2);
$pdf->SetFont('Big5','',$fs);
$pdf->Text(91,681,$tki->tktelp);
$pdf->Text(327,681,$tki->tkhub);
switch ($tki->tkstatkwn) {
	case 0: $pdf->Text(191,479,"V");break;
	case 1: $pdf->Text(306,479,"V");break;
	case 2: $pdf->Text(433,479,"V");break;
}

	Barcode::fpdf($pdf, '000000', $bx, $by, 0, 'code39', array('code'=>$code), $bw, $bh);

	$pdf->AddPage();
    $pdf->Data('nelayan_02.dat',0,0);
	$pdf->SetFont('Big5','',$fs);
$pdf->Text(335,184,$entryjo->jomkthn);
$pdf->Text(372,184,$entryjo->jomkbln);
$pdf->Text(402,184,$entryjo->jomkhr);
$pdf->Text(275,242,$entryjo->jomkthn);
$pdf->Text(332,242,$entryjo->jomkbln);
$pdf->Text(382,242,$entryjo->jomkhr);
Barcode::fpdf($pdf, '000000', $bx, $by, 0, 'code39', array('code'=>$code), $bw, $bh);
	
	$pdf->AddPage();
    $pdf->Data('nelayan_03.dat',0,0);
	$pdf->SetFont('Big5','',$fs);
$pdf->Text(307,76,$entryjo->jpgaji/1);
$pdf->Text(509,116,$entryjo->jpgaji/1);
$pdf->Text(280,618,round($entryjo->jpgaji/30,1));
$pdf->Text(371,682,round($entryjo->jpgaji/30,1));
Barcode::fpdf($pdf, '000000', $bx, $by, 0, 'code39', array('code'=>$code), $bw, $bh);
	
	$pdf->AddPage();
    $pdf->Data('nelayan_04.dat',0,0);
	$pdf->SetFont('Big5','',$fs);
$pdf->Text(227,116,round($entryjo->jpgaji/30,1));
$pdf->Text(249,203,round($entryjo->jpgaji/30,1));
Barcode::fpdf($pdf, '000000', $bx, $by, 0, 'code39', array('code'=>$code), $bw, $bh);
	
	$pdf->AddPage();
    $pdf->Data('nelayan_05.dat',0,0);
	$pdf->SetFont('Big5','',$fs);
Barcode::fpdf($pdf, '000000', $bx, $by, 0, 'code39', array('code'=>$code), $bw, $bh);
	
	$pdf->AddPage();
    $pdf->Data('nelayan_06.dat',0,0);
	$pdf->SetFont('Big5','',$fs);
Barcode::fpdf($pdf, '000000', $bx, $by, 0, 'code39', array('code'=>$code), $bw, $bh);
	
	$pdf->AddPage();
    $pdf->Data('nelayan_07.dat',0,0);
	$pdf->SetFont('Big5','',$fs);
Barcode::fpdf($pdf, '000000', $bx, $by, 0, 'code39', array('code'=>$code), $bw, $bh);
	
	$pdf->AddPage();
    $pdf->Data('nelayan_08.dat',0,0);
$pdf->SetFont('Big5','',8);
$pdf->Text(32,471,$entryjo->mjpngjwb == "" ? $entryjo->mjnama : $entryjo->mjnama." (".$entryjo->mjpngjwb.")");
$pdf->Text(297,471,$tki->tknama);

$pdf->Text(32,526,$entryjo->agnamacn);
$pdf->Text(32,534,$entryjo->agnama);
$pdf->Text(297,534,$entryjo->ppnama);


$pdf->Text(32,566,$entryjo->agalmtkantorcn);

$width = $pdf->GetStringWidth($entryjo->agalmtkantor);
if ($width > 250) {
	$str = TextWithLimit($pdf, $entryjo->agalmtkantor, 250);
	for ($i=0; $i<=count($str); $i++) {
		$pdf->Text(32,574+$i*8,$str[$i]);
	}
	$pdf->Text(32,574+count($str)*8,"電話: ".$entryjo->agtelp.", 傳真: ".$entryjo->agfax);
} else {
	$pdf->Text(32,574,$entryjo->agalmtkantor);
	$pdf->Text(32,582,"電話: ".$entryjo->agtelp.", 傳真: ".$entryjo->agfax);
}

$width = $pdf->GetStringWidth($entryjo->ppalmtkantor);
if ($width > 250) {
	$str = TextWithLimit($pdf, $entryjo->ppalmtkantor, 250);
	for ($i=0; $i<=count($str); $i++) {
		$pdf->Text(297,566+$i*8,$str[$i]);
	}
	$pdf->Text(297,566+count($str)*8,"Telp: ".$entryjo->pptelp.", Fax: ".$entryjo->ppfax);
} else {
	$pdf->Text(297,566,$entryjo->ppalmtkantor);
	$pdf->Text(297,574,"Telp: ".$entryjo->pptelp.", Fax: ".$entryjo->ppfax);
}

Barcode::fpdf($pdf, '000000', $bx, $by, 0, 'code39', array('code'=>$code), $bw, $bh);

	$pdf->output();
	ob_flush();
?>
