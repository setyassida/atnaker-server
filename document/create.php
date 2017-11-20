<?
ob_start();
require_once('./pdf/lib/header.php');
//require_once('./pdf/lib/janji.php');
//============================KONFIGURASI LOCAL SERVER ===================================
$id = $_GET['id'];
$host = 'localhost';
$user='root';
$password='kdei123';
$db='ppln';

$link = mysql_connect($host, $user, $password,$db) or die("Error " . mysql_error($link));
mysql_select_db($db);
mysql_query("SET NAMES utf8");
$sql = "select * from dptdpk where id = " . $id;
$r = mysql_query($sql);
$row = mysql_fetch_array($r);
//============================================================================================
function getNamaTPS($id)
{
	$r1 = "select nama from tps where tpsid = " . $id;
	$sql1 = mysql_query($r1);
	$result = mysql_result($sql1, 0, 0);
	return $result;
}
$pdf = new FPDF('P','mm','A4');
$pdf->AddBig5Font();
$pdf->AddPage();
$pdf->Image('A5.jpg',0,0,220);
$pdf->SetFont('Arial','B',10);
$pdf->SetXY(55,0);
$pdf->Cell(0,145, $row['STATUS']. ' ('.$row['DPTDPKID'].')');
$pdf->SetXY(55,1);
$pdf->Cell(0,160,$row['PASPORNIK']);
$pdf->SetXY(55,9);
$pdf->Cell(0,160,$row['NAMA']);
$pdf->SetXY(55,17);
//$pdf->AddBig5Font();
$pdf->SetFont('Big5','',10);
$pdf->Cell(0,160,$row['ALAMAT']);
$pdf->SetFont('Arial','B',9);
$pdf->SetXY(55,50);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(0,160, getNamaTPS($row['TPSID']));
$pdf->SetXY(110,91);
$pdf->Cell(0,160,getNamaTPS($row['TPSHADIR']));
$pdf->Output();
?>