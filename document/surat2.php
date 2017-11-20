<?
	ob_start();
	define('FPDF_FONTPATH','./pdf/font/');
	require_once('./pdf/lib/Barcode.php');
	require_once('./pdf/lib/chinese.php');
	require_once('./pdf/lib/pdftable.inc.php');
	require_once('./pdf/lib/color.inc.php');
	require_once('./pdf/lib/htmlparser.inc.php');

  // 	require_once('GlobalConnection.php');
//	$id=$_GET['id'];
//	$query= "select * from keterangan where idhiring like '$id'";
//	mysql_query("SET character_set_results=big5", $link);
//	$r = mysql_query($query);
//	$row = mysql_fetch_array($r);
//
//	$query= "select * from formulir where idhiring like '$id'";
//	mysql_query("SET character_set_results=big5", $link);
//	$r = mysql_query($query);
//	$row1 = mysql_fetch_array($r);

	$code = $_GET['id'];

    $pdf = new PDFTable('P', 'pt', 'A4');
	$pdf->AddBig5Font();
	$pdf->AddPage();
    $pdf->Image('nelayan_01.jpg',0,0);
	$pdf->AddPage();
    $pdf->Image('nelayan_02.jpg',0,0);
	$pdf->AddPage();
    $pdf->Image('nelayan_03.jpg',0,0);
	$pdf->AddPage();
    $pdf->Image('nelayan_04.jpg',0,0);

//        $data = Barcode::fpdf($pdf, '000000', 520, 50, 0, 'code93', array('code'=>$code), 1, 65);
//
//	$pdf->SetFont('Arial','',8);
//
//	$pdf->Cell(0,10,'KANTOR DAGANG DAN EKONOMI INDONESIA DI TAIPEI',0,1);
//	
//	$pdf->SetFont('Arial','U',16);
//	$pdf->Cell(0,20,'SURAT KETERANGAN RE-ENTRY HIRING',0,1,'C');
//	
//	$pdf->SetFont('Big5','',11);
//	$pdf->Cell(0,10,'Nomor :  /IMG/DHSC/KDEI Taipei',0,1,'C');
//	$pdf->Ln();
//	
// 	$pdf->Cell(0,12,'Kami yang bertanda tangan dibawah ini',0,1);
//
//	//$pdf->SetFont('Big5',$p->defaultFontStyle,$p->defaultFontSize);
//	$pdf->Cell(0,12,'untuk kembali ke Taiwan dengan majikan  melalui prosedur Re-entry Hiring.',0,1);
//	$pdf->Cell(0,12,'Demikian Surat Keterangan dibuat dan untuk dapat dipergunakan sebagaimana mestinya.',0,1);
//
//	$pdf->Cell(0,12,'Kantor Dagang dan Ekonomi Indonesia di Taipei',0,1,'R');
//	$pdf->Cell(0,12,'Kepala Bidang Imigrasi           ',0,1,'R');
//	$pdf->Ln();


        //$data = Barcode::fpdf($p, '000000', 500, 55, 0, 'code93', array('code'=>$code), 1, 60);

	$pdf->output();
	ob_flush();
?>
