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

$pdf = new PDFTable('P', 'pt', 'A4');
$pdf->AddBig5Font();
//$pdf->SetTopMargin(90);
$pdf->AddPage();

$pdf->SetFont('Times','B',$fs+2);
$pdf->Cell(0,$space,'Registration Form',0,1,C);
$pdf->Cell(0,$space,'',0,1);

$pdf->SetFont('Times','',$fs);
$pdf->Cell(85,$space,'Company Name',0,0);
$pdf->Cell(0,$space,':	'.$agensi->ennama,0,1);
$pdf->Cell(85,$space,'',0,0);
$pdf->SetFont('Big5','',$fs2);
$pdf->Cell(0,$space,':	'.$agensi->agnamacn,0,1);

$pdf->SetFont('Times','',$fs);
$pdf->Cell(85,$space,'Type',0,0);
if($org->oparentid == 3)
	$pdf->Cell(0,$space,':	Head Office',0,1);
else
	$pdf->Cell(0,$space,':	Branch Office',0,1);

$pdf->Cell(85,$space,'Address',0,0);
$pdf->Cell(0,$space,':	'.$agensi->enalamat,0,1);
$pdf->Cell(85,$space,'',0,0);
$pdf->SetFont('Big5','',$fs2);
$pdf->Cell(0,$space,':	'.$agensi->agalmtkantorcn,0,1);

$pdf->SetFont('Times','',$fs);
$pdf->Cell(85,$space,'Phone/Fax',0,0);
$pdf->Cell(0,$space,':	'.$agensi->entelp.'/'.$agensi->enfax,0,1);

$pdf->Cell(85,$space,'Email',0,0);
$pdf->Cell(0,$space,':	'.$user->uemail,0,1);
$pdf->Cell(85,$space,'CLA License No.',0,0);
$pdf->Cell(0,$space,':	'.$agensi->agnoijincla.' (From '.$agensi->agclalicensedate.' to '.$agensi->agclaexpireddate.')',0,1);

//$pdf->Image("http://endorsement.kdei-taipei.org/doc/photo.php?id=$enid&pict=0",120,170,0,100,'jpg');
if (isset($agensi->enfotopngjwb))
	$pdf->Image("http://".$_SERVER["SERVER_NAME"]."/doc/photo.php?id=".base64UrlEncode($enid)."&pict=0",120,170,0,100,'jpg');
$pdf->Cell(0,$space,'Authorized Person :',0,1);
$pdf->Cell(0,$space,'',0,1);
$pdf->Cell(0,$space,'',0,1);
$pdf->Cell(0,$space,'',0,1);
$pdf->Cell(0,$space,'',0,1);
$pdf->Cell(0,$space,'',0,1);
$pdf->Cell(0,$space,'',0,1);
$pdf->Cell(280,$space,$agensi->enpngjwb,0,1,C);
$pdf->SetFont('Big5','',$fs2);
$pdf->Cell(285,$space,'('.$agensi->agpngjwbcn.')',0,1,C);
$pdf->Cell(0,$space,'',0,1);

//$pdf->Image("http://endorsement.kdei-taipei.org/doc/photo.php?id=$enid&pict=1",150,380,0,100,'jpg');
//$pdf->Image("http://endorsement.kdei-taipei.org/doc/photo.php?id=$enid&pict=2",370,380,0,100,'jpg');
$pdf->SetFont('Times','',$fs);
/*
$pdf->Cell(0,$space,'Agency Staff :',0,1);
$pdf->Cell(0,$space,'',0,1);
$pdf->Cell(0,$space,'',0,1);
$pdf->Cell(0,$space,'',0,1);
$pdf->Cell(0,$space,'',0,1);
$pdf->Cell(0,$space,'',0,1);
$pdf->Cell(0,$space,'',0,1);
$pdf->Cell(0,$space,'',0,1);
//$pdf->Cell(350,$space,$agensi->enptgs1,0,0,C);
$pdf->Cell(350,$space,'',0,0,C);
//$pdf->Cell(100,$space,$agensi->enptgs2,0,1,C);
$pdf->Cell(100,$space,'',0,1,C);
$pdf->SetFont('Big5','',$fs2);
//$pdf->Cell(350,$space,'('.$agensi->enptgscn1.')',0,0,C);
$pdf->Cell(350,$space,'',0,0,C);
//$pdf->Cell(100,$space,'('.$agensi->enptgscn2.')',0,1,C);
$pdf->Cell(100,$space,'',0,1,C);
*/
//$pdf->Cell(0,$space,'',0,1);
$pdf->Cell(0,$space,'',0,1);

$pdf->SetFont('Times','',$fs);
$pdf->Cell(200,$space,'',0,0);
$pdf->Cell(0,$space,'Taipei, '.date("j-n-Y"),0,1,C);
$pdf->Cell(0,$space,'',0,1);
$pdf->Cell(0,$space,'',0,1);
$pdf->Cell(0,$space,'',0,1);
$pdf->Cell(200,$space,'',0,0);
$pdf->Cell(0,$space,$agensi->enpngjwb,0,1,C);
$pdf->Cell(200,$space,'',0,0);
$pdf->Cell(0,$space,'(please give signature & company stamp)',0,1,C);
$pdf->Cell(0,$space,'',0,1);

$pdf->Image("http://endorsement.kdei-taipei.org/images/requirement.jpg",40,440,0,280,'jpg');
/*$pdf->SetFont('Times','',$fs);
$pdf->Cell(0,$space,'Attention :',0,1);
$pdf->Cell(20,$space,'1. ',0,0,R);
$pdf->Cell(0,$space,'Please bring this form & all required documents to IETO for registration.',0,1);
//$pdf->Cell(20,$space,'',0,0);
//$pdf->Cell(0,$space,'the provisions of all regulations are occurred.',0,1);

$pdf->Cell(20,$space,'2. ',0,0,R);
$pdf->Cell(0,$space,'Head office & each of branch office must have this online form.',0,1);

$pdf->Cell(20,$space,'3. ',0,0,R);
$pdf->Cell(0,$space,'For efficiency, required documents of head & all branch offices must',0,1);
$pdf->Cell(20,$space,'',0,0);
$pdf->Cell(0,$space,'be collected to IETO by head office.',0,1);
*/
Barcode::fpdf($pdf, '000000', $bx, $by-30, 0, 'code128', array('code'=>$code), $bw, $bh);

$pdf->output();
ob_flush();
?>
