<?
ob_start();
require_once('./pdf/lib/header.php');

if(isset($_REQUEST['id']))
	$enid = $_REQUEST['id'];
else
	exit("Not Exist");//$enid = '24';
	
// $joborder = Joborder::find($joid);
// $majikan = Majikan::joid($joid);
$agensi = Entitas::find($enid);
// $pptki = Entitas::find($joborder->ppid);
$code = $agensi->enbcptgs1;

$space = 15;
$fs  = 11;
$fs2 = 10;

$pdf = new PDFTable('P', 'pt', 'A4');
$pdf->AddBig5Font();
$pdf->SetLeftMargin(70);
$pdf->SetRightMargin(70);
$pdf->AddPage();

$pdf->Cell(0,$space,'',0,1);
$pdf->Cell(0,$space,'',0,1);
$pdf->Cell(0,$space,'',0,1);
$pdf->Cell(0,$space,'',0,1);
$pdf->Cell(0,$space,'',0,1);
$pdf->Cell(0,$space,'',0,1);
$pdf->Cell(0,$space,'',0,1);
$pdf->Cell(0,$space,'',0,1);
$pdf->Cell(0,$space,'',0,1);
$pdf->Cell(0,$space,'',0,1);

$pdf->SetFont('Times','B',$fs);
$pdf->Cell(0,$space,'NEW',0,1,C);
$pdf->SetFont('Times','',$fs);
$pdf->Cell(0,$space,'EMPLOYMENT ACCREDITATION CERTIFICATE (EAC)',0,1,C);
$pdf->Cell(0,$space,'TO OPERATE AN INDONESIAN EMPLOYMENT AGENCY',0,1,C);
$pdf->Cell(0,$space,'No : 11-G-III/2011-I',0,1,C);
$pdf->Cell(0,$space,'',0,1);

//$pdf->SetFont('Times','',$fs);
$pdf->Cell(20,$space,'1. ',0,0,R);
$pdf->SetFont('Times','BU',$fs);
$pdf->Cell(110,$space,'Mr. Lin Kuang Wei',0,0);
$pdf->SetFont('Times','',$fs);
$pdf->Cell(0,$space,'is hereby accredited/permitted to operate an Indonesian Employment',0,1);
$pdf->Cell(20,$space,'',0,0);
$pdf->Cell(0,$space,'Agency known as :',0,1);
$pdf->Cell(20,$space,'',0,0);
$pdf->Cell(85,$space,'Company',0,0);
$pdf->Cell(0,$space,':	WORLDWIDE MANPOWER RESOURCES CO., LTD.',0,1);
$pdf->Cell(20,$space,'',0,0);
$pdf->Cell(85,$space,'Address',0,0);
$pdf->Cell(0,$space,':	4F. -1. No. 27, Tayou Rd., Songshan District, Taipei City, Taiwan',0,1);
$pdf->Cell(20,$space,'',0,0);
$pdf->Cell(85,$space,'Phone',0,0);
$pdf->Cell(0,$space,':	8752-6698',0,1);
$pdf->Cell(20,$space,'',0,0);
$pdf->Cell(85,$space,'Fax',0,0);
$pdf->Cell(0,$space,':	8752-6699',0,1);
$pdf->Cell(20,$space,'',0,0);
$pdf->Cell(85,$space,'CLA License No.',0,0);
$pdf->Cell(0,$space,':	1562',0,1);

$pdf->Cell(20,$space,'2. ',0,0,R);
$pdf->Cell(0,$space,'This accreditation is issued subject to the provision of all regulations made by Indonesian',0,1);
$pdf->Cell(20,$space,'',0,0);
$pdf->Cell(0,$space,'Economic And Trade Office to Taipei.',0,1);

$pdf->Cell(20,$space,'3. ',0,0,R);
$pdf->Cell(0,$space,'Expiration date :',0,1);
$pdf->Cell(20,$space,'',0,0);
$pdf->Cell(0,$space,'Valid from 2011/03/18 until 2013/03/17',0,1);
$pdf->Cell(0,$space,'',0,1);
$pdf->Cell(0,$space,'',0,1);
$pdf->Cell(0,$space,'',0,1);
$pdf->Cell(0,$space,'',0,1);
$pdf->Cell(0,$space,'',0,1);
$pdf->Cell(0,$space,'',0,1);

$pdf->SetFont('Times','B',$fs);
$pdf->Cell(200,$space,'',0,0);
$pdf->Cell(0,$space,'Harmen Sembiring',0,1,C);
$pdf->Cell(200,$space,'',0,0);
$pdf->Cell(0,$space,'Representative',0,1,C);
$pdf->Cell(0,$space,'',0,1);
$pdf->Cell(0,$space,'',0,1);

$pdf->SetFont('Times','',$fs2);
$pdf->Cell(0,$space,'Attention :',0,1);
$pdf->Cell(20,$space,'1. ',0,0,R);
$pdf->Cell(0,$space,'This EAC is valid for two (2) year from the date of issued and shall be cancelled whenever offences against ',0,1);
$pdf->Cell(20,$space,'',0,0);
$pdf->Cell(0,$space,'the provisions of all regulations are occurred.',0,1);

$pdf->Cell(20,$space,'2. ',0,0,R);
$pdf->Cell(0,$space,'Renewal of  this license must be made at least one week before due date.',0,1);

$pdf->Cell(20,$space,'3. ',0,0,R);
$pdf->Cell(0,$space,'This license is strictly non-transferable. Change of agency / company status must get approval from ',0,1);
$pdf->Cell(20,$space,'',0,0);
$pdf->Cell(0,$space,'Indonesian Economic and Trade Office to Taipei. Otherwise, this license is no longer valid.',0,1);

$pdf->Cell(20,$space,'4. ',0,0,R);
$pdf->Cell(0,$space,'The agency still obliges to responsible of its worker(s) in case of the suspension or even revocation of the ',0,1);
$pdf->Cell(20,$space,'',0,0);
$pdf->Cell(0,$space,'EAC.',0,1);

Barcode::fpdf($pdf, '000000', $bx, $by, 0, 'code128', array('code'=>$code), $bw, $bh);

$pdf->output();
ob_flush();
?>
