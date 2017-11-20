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
$user = Secuser::oid($agensi->oid);
$org = Secorg::find($agensi->oid);
// $pptki = Entitas::find($joborder->ppid);
$code = $agensi->enbc;

$space = 15;
$fs  = 11;
$fs2 = 9;

$pdf = new PDFTable('P', 'pt', 'A5');
$pdf->AddBig5Font();
$pdf->SetTopMargin(90);
$pdf->AddPage();

$pdf->SetFont('Times','',$fs);
$pdf->Cell(85,$space,'Company',0,0);
$pdf->Cell(0,$space,':	'.$agensi->ennama,0,1);
$pdf->Cell(85,$space,'',0,0);
$pdf->SetFont('Big5','',$fs2);
$pdf->Cell(0,$space,':	'.$agensi->agnamacn,0,1);

$pdf->SetFont('Times','',$fs);
$pdf->Cell(85,$space,'Username',0,0);
$pdf->Cell(0,$space,':	'. $user->uid,0,1);

$pdf->Cell(85,$space,'Password',0,0);
$pdf->Cell(0,$space,':	'. $user->uid,0,1);
$pdf->Cell(85,$space,'',0,0);
/*
$pdf->SetFont('Big5','',$fs2);
$pdf->Cell(0,$space,':	'.$agensi->agalmtkantorcn,0,1);

$pdf->SetFont('Times','',$fs);
$pdf->Cell(85,$space,'Phone/Fax',0,0);
$pdf->Cell(0,$space,':	'.$agensi->entelp.'/'.$agensi->enfax,0,1);

$pdf->Cell(85,$space,'Email',0,0);
$pdf->Cell(0,$space,':	'.$user->uemail,0,1);
$pdf->Cell(85,$space,'CLA License No.',0,0);
$pdf->Cell(0,$space,':	'.$agensi->agnoijincla,0,1);

$pdf->Cell(0,$space,'IETO Registration Card Valid : From '.$agensi->agregisterdate.' to '.$agensi->agexpireddate,0,1);
$pdf->Cell(0,$space,'',0,1);

$pdf->Image("http://endorsement.kdei-taipei.org/doc/photo.php?id=$enid&pict=0",40,260,0,100,'jpg');
$pdf->Image("http://endorsement.kdei-taipei.org/doc/photo.php?id=$enid&pict=1",160,260,0,100,'jpg');
$pdf->Image("http://endorsement.kdei-taipei.org/doc/photo.php?id=$enid&pict=2",280,260,0,100,'jpg');
$pdf->Cell(120,$space,'Authorized Person',0,0,C);
$pdf->Cell(120,$space,'Staff-1',0,0,C);
$pdf->Cell(120,$space,'Staff-2',0,1,C);
$pdf->Cell(0,$space,'',0,1);
$pdf->Cell(0,$space,'',0,1);
$pdf->Cell(0,$space,'',0,1);
$pdf->Cell(0,$space,'',0,1);
$pdf->Cell(0,$space,'',0,1);
$pdf->Cell(0,$space,'',0,1);
$pdf->Cell(0,$space,'',0,1);
$pdf->Cell(120,$space,$agensi->enpngjwb,0,0,C);
$pdf->Cell(120,$space,$agensi->enptgs1,0,0,C);
$pdf->Cell(120,$space,$agensi->enptgs2,0,1,C);
$pdf->SetFont('Big5','',$fs2);
$pdf->Cell(120,$space,'('.$agensi->agpngjwbcn.')',0,0,C);
$pdf->Cell(120,$space,'('.$agensi->enptgscn1.')',0,0,C);
$pdf->Cell(120,$space,'('.$agensi->enptgscn2.')',0,1,C);
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
*/
//Barcode::fpdf($pdf, '000000', 100, 520, 0, 'code128', array('code'=>$code), $bw, $bh);

$pdf->output();
ob_flush();
?>
