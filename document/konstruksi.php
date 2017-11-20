<?
ob_start();
require_once('./pdf/lib/header.php');
require_once('./pdf/lib/janji.php');

if ($entryjo->jpid != 6)
	die("Not Exist");

$pdf = new PDFTable('P', 'pt', 'A4');
$pdf->AddBig5Font();
$pdf->AddPage();
$pdf->Data('konstruksi_01.dat',0,0,597,775);
$pdf->SetFont('Big5','',6);
$pdf->Text(91,35,$entryjo->agnamacn);

$width = $pdf->GetStringWidth($entryjo->agnama);
if ($width > 180) {
	$str = TextWithLimit($pdf, $entryjo->agnama, 180);
	for ($i=0; $i<=count($str); $i++) {
		$pdf->Text(24,43+$i*8,$str[$i]);
	}
} else {
	$pdf->Text(24,47,$entryjo->agnama);
}

$pdf->Text(84,64,$entryjo->agalmtkantorcn);

$width = $pdf->GetStringWidth($entryjo->agalmtkantor);
if ($width > 180) {
	$str = TextWithLimit($pdf, $entryjo->agalmtkantor, 190);
	for ($i=0; $i<=count($str); $i++) {
		$pdf->Text(24,76+$i*8,$str[$i]);
	}
} else {
	$pdf->Text(24,84,$entryjo->agalmtkantor);
}

$pdf->Text(24,95,"電話 : ".$entryjo->agtelp.", 傳真 : ".$entryjo->agfax);
$pdf->SetFont('Big5','B',10);
$pdf->Text(22,110,"Agency's MOL License Number : ".$entryjo->agnoijincla);
$pdf->SetFont('Big5','',$fs);
$pdf->Text(325,161,$entryjo->mjpngjwbcn == "" ? $entryjo->mjnamacn : $entryjo->mjnamacn." (".$entryjo->mjpngjwbcn.")");
$pdf->SetFont('Big5','',8);
$pdf->Text(84,207,$entryjo->mjalmtcn);
$pdf->Text(102,225,$entryjo->mjalmt);
$pdf->SetFont('Big5','',$fs);
$pdf->Text(155,193,$entryjo->mjpngjwb == "" ? $entryjo->mjnama : $entryjo->mjnama." (".$entryjo->mjpngjwb.")");
$pdf->Text(83,243,$entryjo->mjtelp);
$pdf->Text(145,325,$tki->tknama);
$pdf->SetFont('Big5','',8);
$pdf->Text(184,362,$tki->tkalmtid);
$pdf->SetFont('Big5','',$fs);
$pdf->Text(260,392,$tki->tkpaspor);
$pdf->Text(259,411,$tki->tktglkeluar." / ".$tki->tktmptkeluar);
$pdf->Text(118,427,$tki->tktgllahir);

switch ($tki->tkstatkwn) {
	case 0: $pdf->Text(191,464,"V");break;
	case 1: $pdf->Text(306,464,"V");break;
	case 2: $pdf->Text(433,464,"V");break;
}

$pdf->SetFont('Big5','',9);
$pdf->Text(288,425,$tki->tktmptlahir);
$pdf->Text(312,444,$tki->tktmptlahir);
$pdf->SetFont('Big5','',$fs);
$pdf->Text(428,425,$tki->tkjk);
$pdf->Text(142,444,$tki->tktgllahir);
$pdf->Text(482,444,$tki->tkjk);
$pdf->Text(214,494,$tki->tkjmlanaktanggungan);
$pdf->Text(105,531,$tki->tkahliwaris);
$pdf->Text(129,547,$tki->tkahliwaris);
$pdf->Text(91,586,$tki->tknamacn2);
$pdf->Text(96,599,$tki->tknama2);
$pdf->SetFont('Big5','',8);
$pdf->Text(90,624,$tki->tkalmtcn2);
$pdf->Text(105,633,$tki->tkalmt2);
$pdf->SetFont('Big5','',$fs);
$pdf->Text(91,650,$tki->tktelp);
$pdf->Text(327,650,$tki->tkhub);
Barcode::fpdf($pdf, '000000', $bx, $by, 0, 'code39', array('code'=>$code), $bw, $bh);

$pdf->AddPage();
$pdf->Data('konstruksi_02.dat',0,0,597,775);
$pdf->SetFont('Big5','',$fs);
$pdf->Text(235,66,$entryjo->joposisicn);
$pdf->Text(400,98,$entryjo->joposisi);
$pdf->Text(268,466,$entryjo->joposisicn);
$pdf->Text(420,485,$entryjo->joposisi);
$tempstart = explode("-", $entryjo->jostart);
$tempend = explode("-", $entryjo->joend);
switch ($entryjo->jotime) {
	case 1: $pdf->Text(111,205,"V");$pdf->Text(131,205,$tempstart[0]);$pdf->Text(171,205,$tempstart[1]);$pdf->Text(205,205,$tempstart[2]);
	        $pdf->Text(245,205,$tempend[0]);$pdf->Text(285,205,$tempend[1]);$pdf->Text(319,205,$tempend[2]);
			$pdf->Text(111,295,"V");$pdf->Text(536,293,$tempstart[2]);$pdf->Text(168,313,$tempstart[1]);$pdf->Text(219,313,$tempstart[0]);
	        $pdf->Text(328,313,$entryjo->joend);break;
	case 2: $pdf->Text(111,223,"V");$pdf->Text(131,223,$tempstart[0]);$pdf->Text(171,223,$tempstart[1]);$pdf->Text(205,223,$tempstart[2]);
	        $pdf->Text(245,223,$tempend[0]);$pdf->Text(285,223,$tempend[1]);$pdf->Text(319,223,$tempend[2]);
			$pdf->Text(111,330,"V");$pdf->Text(539,328,$tempstart[2]);$pdf->Text(163,347,$tempstart[1]);$pdf->Text(214,347,$tempstart[0]);
	        $pdf->Text(318,347,$entryjo->joend);break;
}
Barcode::fpdf($pdf, '000000', $bx, $by, 0, 'code39', array('code'=>$code), $bw, $bh);

$pdf->AddPage();
$pdf->Data('konstruksi_03.dat',0,0,597,775);
$pdf->SetFont('Big5','',$fs);
$pdf->Text(312,263,round($entryjo->jpgaji/1),1);
$pdf->Text(512,301,round($entryjo->jpgaji/1),1);
$pdf->Text(329,624,round($entryjo->jpgaji/30),1);
$pdf->Text(397,645,round($entryjo->jpgaji/30),1);
$pdf->Text(512,645,round((($entryjo->jpgaji/30)*1.33)/8),1);
$pdf->Text(354,665,round((($entryjo->jpgaji/30)*1.33)/8),1);
$pdf->Text(487,665,round(((($entryjo->jpgaji/30)*1.33)/8)*2),1);
Barcode::fpdf($pdf, '000000', $bx, $by, 0, 'code39', array('code'=>$code), $bw, $bh);

$pdf->AddPage();
$pdf->Data('konstruksi_04.dat',0,0,597,775);
$pdf->SetFont('Big5','',$fs);
$pdf->Text(335,139,round($entryjo->jpgaji/30),1);
$pdf->Text(403,160,round($entryjo->jpgaji/30,1));
$pdf->Text(512,160,round((($entryjo->jpgaji/30)*1.66)/8,1));
$pdf->Text(354,180,round((($entryjo->jpgaji/30)*1.66)/8),1);
$pdf->Text(487,180,round(((($entryjo->jpgaji/30)*1.66)/8)*2),1);
$pdf->Text(479,307,round($entryjo->jpgaji/30),1);
$pdf->Text(265,500,round($entryjo->jpgaji/30),1);
$pdf->Text(265,640,round($entryjo->jpgaji/30),1);
$pdf->Text(298,700,round($entryjo->jpgaji/30,1));
Barcode::fpdf($pdf, '000000', $bx, $by, 0, 'code39', array('code'=>$code), $bw, $bh);

$pdf->AddPage();
$pdf->Data('konstruksi_05.dat',0,0,597,775);
$pdf->SetFont('Big5','',$fs);
$pdf->Text(522,256,round($entryjo->jpgaji/30,1));
$pdf->Text(375,367,round($entryjo->jpgaji/30,1));
Barcode::fpdf($pdf, '000000', $bx, $by, 0, 'code39', array('code'=>$code), $bw, $bh);

$pdf->AddPage();
$pdf->Data('konstruksi_06.dat',0,0,597,775);
$pdf->SetFont('Big5','',$fs);
Barcode::fpdf($pdf, '000000', $bx, $by, 0, 'code39', array('code'=>$code), $bw, $bh);

$pdf->AddPage();
$pdf->Data('konstruksi_07.dat',0,0,597,775);
$pdf->SetFont('Big5','',$fs);
Barcode::fpdf($pdf, '000000', $bx, $by, 0, 'code39', array('code'=>$code), $bw, $bh);

$pdf->AddPage();
$pdf->Data('konstruksi_08.dat',0,0,597,775);
$pdf->SetFont('Big5','',$fs);
Barcode::fpdf($pdf, '000000', $bx, $by, 0, 'code39', array('code'=>$code), $bw, $bh);

$pdf->AddPage();
$pdf->Data('konstruksi_09.dat',0,0, 597,775);
$pdf->SetFont('Big5','',8);
$pdf->Text(48,620,$entryjo->mjpngjwb == "" ? $entryjo->mjnama : $entryjo->mjnama." (".$entryjo->mjpngjwb.")");
$pdf->Text(310,620,$tki->tknama);
Barcode::fpdf($pdf, '000000', $bx, $by, 0, 'code39', array('code'=>$code), $bw, $bh);

$pdf->AddPage();
$pdf->Data('konstruksi_10.dat',0,0, 597,775);
$pdf->SetFont('Big5','',8);
$pdf->Text(48,65,$entryjo->agnamacn);
$pdf->Text(48,77,$entryjo->agnama);
$pdf->Text(310,65,$entryjo->ppnama);

$pdf->Text(48,123,$entryjo->agalmtkantorcn);

$width = $pdf->GetStringWidth($entryjo->agalmtkantor);
if ($width > 250) {
	$str = TextWithLimit($pdf, $entryjo->agalmtkantor, 250);
	for ($i=0; $i<=count($str); $i++) {
		$pdf->Text(48,131+$i*8,$str[$i]);
	}
	$pdf->Text(48,131+count($str)*8,"電話: ".$entryjo->agtelp.", 傳真 : ".$entryjo->agfax);
} else {
	$pdf->Text(48,131,$entryjo->agalmtkantor);
	$pdf->Text(48,139,"電話: ".$entryjo->agtelp.", 傳真 : ".$entryjo->agfax);
}

$width = $pdf->GetStringWidth($entryjo->ppalmtkantor);
if ($width > 250) {
	$str = TextWithLimit($pdf, $entryjo->ppalmtkantor, 250);
	for ($i=0; $i<=count($str); $i++) {
		$pdf->Text(310,123+$i*8,$str[$i]);
	}
	$pdf->Text(310,123+count($str)*8,"Telp: ".$entryjo->pptelp.", Fax: ".$entryjo->ppfax);
} else {
	$pdf->Text(310,123,$entryjo->ppalmtkantor);
	$pdf->Text(310,131,"Telp: ".$entryjo->pptelp.", Fax: ".$entryjo->ppfax);
}



$pdf->output();
ob_end_flush();
?>
