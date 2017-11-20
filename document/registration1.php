<?
ob_start();
require_once('./pdf/lib/header.php');

if(isset($_REQUEST['id']))
	$enid = base64UrlDecode($_REQUEST['id']);
else
	exit("Not Exist");//$enid = '24';
	
// $joborder = Joborder::find($joid);
// $majikan = Majikan::joid($joid);
$agensi = Entitas::find($enid);
// $pptki = Entitas::find($joborder->ppid);
$code = $agensi->enbcptgs1;

$space = 17;
$fs  = 11;
$fs2 = 10;

$pdf = new PDFTable('P', 'pt', 'A5');
$pdf->AddBig5Font();
$pdf->SetTopMargin(90);
$pdf->AddPage();


$pdf->SetFont('Times','',$fs);
$pdf->Cell(85,$space,'Company',0,0);
$pdf->Cell(0,$space,':	WORLDWIDE MANPOWER RESOURCES CO., LTD.',0,1);
$pdf->Cell(85,$space,'',0,0);
$pdf->Cell(0,$space,':	WORLDWIDE MANPOWER RESOURCES CO., LTD.',0,1);

$pdf->Cell(85,$space,'Type',0,0);
$pdf->Cell(0,$space,':	Head',0,1);

$pdf->Cell(85,$space,'Address',0,0);
$pdf->Cell(0,$space,':	4F. -1. No. 27, Tayou Rd., Songshan District, Taipei City, Taiwan',0,1);
$pdf->Cell(85,$space,'',0,0);
$pdf->Cell(0,$space,':	4F. -1. No. 27, Tayou Rd., Songshan District, Taipei City, Taiwan',0,1);

$pdf->Cell(85,$space,'Phone/Fax',0,0);
$pdf->Cell(0,$space,':	8752-6698',0,1);

$pdf->Cell(85,$space,'Email',0,0);
$pdf->Cell(0,$space,':	8752-6699',0,1);
$pdf->Cell(85,$space,'CLA License No.',0,0);
$pdf->Cell(0,$space,':	1562',0,1);

$pdf->Cell(0,$space,'IETO Registration Card Valid : From '.'...'.' to '.'...',0,1);
$pdf->Cell(0,$space,'',0,1);

$pdf->Cell(150,$space,'Staff #1',0,0,C);
$pdf->Cell(150,$space,'Staff #2',0,1,C);
$pdf->Cell(0,$space,'',0,1);
$pdf->Cell(0,$space,'',0,1);
$pdf->Cell(0,$space,'',0,1);
$pdf->Cell(0,$space,'',0,1);
$pdf->Cell(0,$space,'',0,1);
$pdf->Cell(0,$space,'',0,1);
$pdf->Cell(150,$space,'Staff #1',0,0,C);
$pdf->Cell(150,$space,'Staff #2',0,1,C);
$pdf->Cell(0,$space,'',0,1);
$pdf->Cell(0,$space,'',0,1);

$pdf->SetFont('Times','B',$fs);
$pdf->Cell(200,$space,'',0,0);
$pdf->Cell(0,$space,'Representative,',0,1,C);
$pdf->Cell(0,$space,'',0,1);
$pdf->Cell(0,$space,'',0,1);
$pdf->Cell(0,$space,'',0,1);
$pdf->Cell(200,$space,'',0,0);
$pdf->Cell(0,$space,'Harmen Sembiring',0,1,C);

Barcode::fpdf($pdf, '000000', 100, 520, 0, 'code128', array('code'=>$code), $bw, $bh);

$pdf->output();
ob_flush();
?>
