<?
ob_start();
require_once('./pdf/lib/header.php');

if(isset($_REQUEST['id']))
	//$joid = base64UrlDecode($_REQUEST['id']);
	$id = $_REQUEST['id'];
else
	exit("Not Exist");//$joid = 'J11048HQ';

//	die("Not Exist");

/*$joborder = Joborder::find($joid);
$majikan = Majikan::joid($joid);
$agensi = Entitas::find($joborder->agid);
$pptki = Entitas::find($joborder->ppid);
$jp = Jenispekerjaan::find($joborder->jpid);
$code = $joborder->joid;*/

//$demand = Demand::find($deid);
//$joborder = Joborder::find($demand->joid);
//$majikan = Majikan::joid($joborder->joid);
//$agensi = Entitas::find($joborder->agid);
//$pptki = Entitas::find($demand->ppid);
$entryjo = EntryJO::find($id);
$jp = Jenispekerjaan::find($entryjo->jpid);
$code = $entryjo->ejbcform;

$pdf = new PDFTable('P', 'pt', 'A4');
$pdf->AddBig5Font();
$pdf->AddPage();

$pdf->SetFont('Times','',$fs);
$pdf->DataL('info_01.dat',0,0);
$pdf->SetFont('Big5','',$fs);
$pdf->TextL(690,610,$entryjo->mjnamacn);
$pdf->TextL(445,805,$entryjo->mjalmtcn);
$pdf->TextL(790,1500,$entryjo->agnamacn);
$pdf->TextL(619,1716,$entryjo->agalmtkantorcn);
$pdf->TextL(990,1870,$entryjo->agpngjwbcn.', '.$entryjo->agpngjwb);
$pdf->TextL(141,867,$entryjo->mjalmt);
$pdf->TextL(141,1570,$entryjo->agnama);
$pdf->TextL(441,484,$entryjo->joclano);
//$pdf->SetFont('Times','',$fs);
$pdf->TextL(305,335,$entryjo->jodatefilled);
$pdf->TextL(1894,335,$entryjo->joestduedate);
$pdf->TextL(441,529,$entryjo->joclatgl);
$pdf->TextL(690,662,$entryjo->mjnama);
$pdf->TextL(583,734,$entryjo->mjktp);
$pdf->TextL(640,971,$entryjo->mjtelp);
$pdf->TextL(524,1045,$entryjo->mjfax);
$pdf->TextL(653,1123,'caretaker');
$pdf->TextL(1340,1197,$entryjo->jojmltki);
$pdf->TextL(1560,1197,'');
$pdf->TextL(467,1280,$entryjo->jocatatan);
$pdf->TextL(2056,1280,$jp->jpgaji);

$pdf->TextL(634,1650,$entryjo->agnoijincla);
$pdf->SetFont('Big5','',8);
$pdf->TextL(141,1775,$entryjo->agalmtkantor);
$pdf->SetFont('Big5','',$fs);
$pdf->TextL(641,1944,$entryjo->agtelp);
$pdf->TextL(524,2018,$entryjo->agfax);

$pdf->TextL(141,2373,$entryjo->ppnama);
$pdf->SetFont('Big5','',8);
$pdf->TextL(131,2563,$entryjo->ppalmtkantor);
$pdf->SetFont('Big5','',$fs);
$pdf->TextL(695,2682,$entryjo->pptelp);
$pdf->TextL(591,2780,$entryjo->ppfax);

$pdf->TextL(1448,2373,$entryjo->ppijin);
$pdf->TextL(1448,2563,$entryjo->pppngjwb);
// Barcode::fpdf($pdf, '000000', $bx, $by, 0, 'datamatrix', array('code'=>$code));//, 5, $bh);
// Barcode::fpdf($pdf, '000000', $bx-130, $by, 0, 'datamatrix', array('code'=>$code), 1, 1);
// Barcode::fpdf($pdf, '000000', $bx-260, $by, 0, 'datamatrix', array('code'=>$code), 0.5, 0.5);
// Barcode::fpdf($pdf, '000000', $bx-390, $by, 0, 'datamatrix', array('code'=>$code), 2, 2);

Barcode::fpdf($pdf, '000000', $bx, $by, 0, 'code128', array('code'=>$code), $bw, $bh);
// Barcode::fpdf($pdf, '000000', $bx-130, $by, 0, 'code128', array('code'=>$code), 0.7, $bh);
// Barcode::fpdf($pdf, '000000', $bx-260, $by, 0, 'code128', array('code'=>$code), 0.8, $bh);
// Barcode::fpdf($pdf, '000000', $bx-390, $by, 0, 'code128', array('code'=>$code), 0.6, $bh);
$pdf->output();
ob_flush();
?>
