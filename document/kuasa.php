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
$entryjo = Entitas::find($joborder->ppid);
$jp = Jenispekerjaan::find($joborder->jpid);
$code = $joborder->joid;*/

//$demand = Demand::find($deid);
//$joborder = Joborder::find($demand->joid);
//$majikan = Majikan::joid($joborder->joid);
//$agensi = Entitas::find($joborder->agid);
//$entryjo = Entitas::find($demand->ppid);
$entryjo = EntryJO::find($id);
$jp = Jenispekerjaan::find($entryjo->jpid);
$code = $entryjo->ejbcsk;

$space = 12;
$fs  = 11;
$fs1 = 15;
$fs2 = 10;

$pdf = new PDFTable('P', 'pt', 'A4');
$pdf->AddBig5Font();
$pdf->AddPage();

if ($entryjo->jpid == 1) {
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,$entryjo->agnama,0,1,R);
	$pdf->Cell(0,$space,$entryjo->agnamacn,0,1,R);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,$entryjo->agalmtkantor,0,1,R);
	$pdf->Cell(0,$space,$entryjo->agalmtkantorcn,0,1,R);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'�q��/No.telp : '.$entryjo->agtelp,0,1,R);
	$pdf->Cell(0,$space,'',0,1);

	$pdf->SetFont('Big5','B',$fs1);
	$pdf->Cell(0,$space,'�� �v ��',0,1,C);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'���D : '.$entryjo->mjnamacn,0,1);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,'�a�} : '.$entryjo->mjalmtcn,0,1);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'���q�W�� : '.$entryjo->ppnama,0,1);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,'�a�} : '.$entryjo->ppalmtkantor,0,1);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'���Ӹ��X: '.$entryjo->ppijin,0,1);
	$pdf->Cell(0,$space,'�q�� : '.$entryjo->pptelp,0,1);
	$pdf->Cell(0,$space,'�ǯu : '.$entryjo->ppfax,0,1);
	$pdf->Cell(0,$space,'',0,1);

	$pdf->Cell(0,$space,'�������������q�X�k�e�U�H�A�H��U�����q�b�L���۶�'.$jp->jpnamacn.'�ӥx�u�@�A�ÿ�ӦL',0,1);
	$pdf->Cell(0,$space,'���k�W��g�@���һݤ��θu�������A�æw�ƨ��@�ө��a�ϻ��]�Φ������ھڮ֭�縹',0,1);
	$pdf->Cell(0,$space,'�X��¾�~�r�ġG'.$entryjo->joclano.' ��,����G'.$entryjo->joclatgl.' �A�ӽ�ñ�ҡA�H��U�Ҥu��F�u�@�a�I',0,1);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'�Ԧ����W���ĳҰʫ����H�K�@�~',0,1);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'�Ԧ������������ñ�p������G�x�_�A���إ���',0,1);
	$pdf->Cell(0,$space,'',0,1);

	$pdf->SetFont('Big5','B',$fs1);
	$pdf->Cell(0,$space,'SURAT KUASA',0,1,C);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'MAJIKAN : '.$entryjo->mjnama,0,1);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space, 'ALAMAT : '.$entryjo->mjalmt,0,1);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'MEMBERIKAN KUASA KEPADA :',0,1);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'NAMA PERUSAHAAN : '.$entryjo->ppnama,0,1);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,'ALAMAT : '.$entryjo->ppalmtkantor,0,1);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'NO. IJIN PPTKIS : '.$entryjo->ppijin,0,1);
	$pdf->Cell(0,$space,'TEL : '.$entryjo->pptelp,0,1);
	$pdf->Cell(0,$space,'FAX : '.$entryjo->ppfax,0,1);
	$pdf->Cell(0,$space,'',0,1);

	$pdf->Cell(0,$space,'ADALAH BENAR DAN SAH JIKA SAYA MEMBERIKAN KUASA KEPADA PERUSAHAAN YANG DITUNJUK ',0,1);
	$pdf->Cell(0,$space,'UNTUK MEMBANTU MEREKRUT PEKERJA YANG ADA DI INDONESIA, YANG AKAN BEKERJA SEBAGAI ',0,1);
	$pdf->Cell(0,$space, $jp->jpnama.' DI TAIWAN DAN MENGISI SEMUA DATA-DATA YANG DIBUTUHKAN SESUAI ',0,1);
	$pdf->Cell(0,$space,'PERATURAN YANG ADA. DAN MEMBANTU PEMBUATAN PASPOR, DAN UNTUK PEMBUATAN VISA KAMI ',0,1);
	$pdf->Cell(0,$space,'MELAMPIRKAN SURAT DARI KANTOR PERWAKILAN R.O.C MENURUT SURAT C.L.A NO: '.$entryjo->joclano.', ',0,1);
	$pdf->Cell(0,$space,'TANGGAL: '.$entryjo->joclatgl.' UNTUK MEMBANTU TENAGA KERJA SUPAYA DAPAT DATANG KE TAIWAN.',0,1);
	$pdf->Cell(0,$space,'',0,1);

	$pdf->Cell(0,$space,'KAMI JUGA MELAMPIRKAN KONTRAK KERJA UNTUK MEMPERMUDAH EFISIENSI KERJA.',0,1);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'SURAT INI DITANDATANGANI OLEH SAKSI YANG ADA DI TAIPEI, TAIWAN, REPUBLIC OF CHINA.',0,1);
	$pdf->Cell(0,$space,'',0,1);

	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'���D/Majikan:'.$entryjo->mjnamacn.','.$entryjo->mjnama,0,1);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,'��}:'.$entryjo->mjalmtcn,0,1);
	$pdf->Cell(0,$space,'Alamat:'.$entryjo->mjalmt,0,1);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'�q��/No. Tel:'.$entryjo->mjtelp,0,1);
} else if ($entryjo->jpid == 2) {	
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,$entryjo->agnama,0,1,R);
	$pdf->Cell(0,$space,$entryjo->agnamacn,0,1,R);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,$entryjo->agalmtkantor,0,1,R);
	$pdf->Cell(0,$space,$entryjo->agalmtkantorcn,0,1,R);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'�q��/No.telp : '.$entryjo->agtelp,0,1,R);
	$pdf->Cell(0,$space,'',0,1);

	$pdf->SetFont('Big5','B',$fs1);
	$pdf->Cell(0,$space,'�� �v ��',0,1,C);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'���D : '.$entryjo->mjnamacn,0,1);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,'�a�} : '.$entryjo->mjalmtcn,0,1);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'���q�W�� : '.$entryjo->ppnama,0,1);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,'�a�} : '.$entryjo->ppalmtkantor,0,1);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'���Ӹ��X : '.$entryjo->ppijin,0,1);
	$pdf->Cell(0,$space,'�q�� : '.$entryjo->pptelp,0,1);
	$pdf->Cell(0,$space,'�ǯu : '.$entryjo->ppfax,0,1);
	$pdf->Cell(0,$space,'',0,1);

	$pdf->Cell(0,$space,'�������������q�X�k�e�U�H�A�H��U�����q�b�L���۶�'.$entryjo->joposisicn.'�ӥx�u�@�A�ÿ�ӦL',0,1);
	$pdf->Cell(0,$space,'���k�W��g�@���һݤ��θu�������A�æw�ƨ��@�ө��a�ϻ��]�Φ������ھڮ֭�縹',0,1);
	$pdf->Cell(0,$space,'�X��¾�~�r�ġG '.$entryjo->joclano.' ��,����G '.$entryjo->joclatgl.' �A�ӽ�ñ�ҡA�H��U�Ҥu��F�u�@�a�I',0,1);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'�Ԧ����W���ĳҰʫ����H�K�@�~',0,1);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'�Ԧ������������ñ�p������G�x�_�A���إ���',0,1);
	$pdf->Cell(0,$space,'',0,1);

	$pdf->SetFont('Big5','B',$fs1);
	$pdf->Cell(0,$space,'SURAT KUASA',0,1,C);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'MAJIKAN : '.$entryjo->mjnama,0,1);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space, 'ALAMAT : '.$entryjo->mjalmt,0,1);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'MEMBERIKAN KUASA KEPADA :',0,1);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'NAMA PERUSAHAAN : '.$entryjo->ppnama,0,1);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,'ALAMAT : '.$entryjo->ppalmtkantor,0,1);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'NO. IJIN PPTKIS : '.$entryjo->ppijin,0,1);
	$pdf->Cell(0,$space,'TEL : '.$entryjo->pptelp,0,1);
	$pdf->Cell(0,$space,'FAX : '.$entryjo->ppfax,0,1);
	$pdf->Cell(0,$space,'',0,1);

	$pdf->Cell(0,$space,'ADALAH BENAR DAN SAH JIKA SAYA MEMBERIKAN KUASA KEPADA PERUSAHAAN YANG DITUNJUK ',0,1);
	$pdf->Cell(0,$space,'UNTUK MEMBANTU MEREKRUT PEKERJA YANG ADA DI INDONESIA, YANG AKAN BEKERJA SEBAGAI ',0,1);
	$pdf->Cell(0,$space, strtoupper($entryjo->joposisi).' DI TAIWAN DAN MENGISI SEMUA DATA-DATA YANG ',0,1);
	$pdf->Cell(0,$space,'DIBUTUHKAN SESUAI PERATURAN YANG ADA. DAN MEMBANTU PEMBUATAN PASPOR, DAN UNTUK ',0,1);
	$pdf->Cell(0,$space,'PEMBUATAN VISA KAMI MELAMPIRKAN SURAT DARI KANTOR PERWAKILAN R.O.C MENURUT ',0,1);
	$pdf->Cell(0,$space,'SURAT C.L.A NO: '.$entryjo->joclano.', TANGGAL: '.$entryjo->joclatgl.' UNTUK MEMBANTU TENAGA KERJA SUPAYA DAPAT ',0,1);
	$pdf->Cell(0,$space,'DATANG KE TAIWAN.',0,1);
	$pdf->Cell(0,$space,'',0,1);

	$pdf->Cell(0,$space,'KAMI JUGA MELAMPIRKAN KONTRAK KERJA UNTUK MEMPERMUDAH EFISIENSI KERJA.',0,1);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'SURAT INI DITANDATANGANI OLEH SAKSI YANG ADA DI TAIPEI, TAIWAN, REPUBLIC OF CHINA.',0,1);
	$pdf->Cell(0,$space,'',0,1);

	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'���D/Majikan : '.$entryjo->mjnamacn.','.$entryjo->mjnama,0,1);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,'��} : '.$entryjo->mjalmtcn,0,1);
	$pdf->Cell(0,$space,'Alamat : '.$entryjo->mjalmt,0,1);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'�q��/No. Tel : '.$entryjo->mjtelp,0,1);
} else if ($entryjo->jpid == 3) {
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,$entryjo->agnama,0,1,R);
	$pdf->Cell(0,$space,$entryjo->agnamacn,0,1,R);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,$entryjo->agalmtkantor,0,1,R);
	$pdf->Cell(0,$space,$entryjo->agalmtkantorcn,0,1,R);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'�q��/No.telp : '.$entryjo->agtelp,0,1,R);
	$pdf->Cell(0,$space,'',0,1);

	$pdf->SetFont('Big5','B',$fs1);
	$pdf->Cell(0,$space,'�� �v ��',0,1,C);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'���D : '.$entryjo->mjnamacn,0,1);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,'�a�} : '.$entryjo->mjalmtcn,0,1);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'���q�W�� : '.$entryjo->ppnama,0,1);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,'�a�} : '.$entryjo->ppalmtkantor,0,1);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'���Ӹ��X: '.$entryjo->ppijin,0,1);
	$pdf->Cell(0,$space,'�q�� : '.$entryjo->pptelp,0,1);
	$pdf->Cell(0,$space,'�ǯu : '.$entryjo->ppfax,0,1);
	$pdf->Cell(0,$space,'',0,1);

	$pdf->Cell(0,$space,'�������������q�X�k�e�U�H�A�H��U�����q�b�L���۶�'.$jp->jpnamacn.'���ӥx�u�@�A�ÿ�ӦL',0,1);
	$pdf->Cell(0,$space,'���k�W��g�@���һݤ��θu�������A�æw�ƨ��@�ө��a�ϻ��]�Φ������ھڮ֭�縹',0,1);
	$pdf->Cell(0,$space,'�X��¾�~�r�ġG '.$entryjo->joclano.' ��,����G '.$entryjo->joclatgl.' �A�ӽ�ñ�ҡA�H��U�Ҥu��F�u�@�a�I',0,1);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'�Ԧ����W���ĳҰʫ����H�K�@�~',0,1);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'�Ԧ������������ñ�p������G�x�_�A���إ���',0,1);
	$pdf->Cell(0,$space,'',0,1);

	$pdf->SetFont('Big5','B',$fs1);
	$pdf->Cell(0,$space,'SURAT KUASA',0,1,C);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'MAJIKAN : '.$entryjo->mjnama,0,1);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,'ALAMAT : '.$entryjo->mjalmt,0,1);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'MEMBERIKAN KUASA KEPADA :',0,1);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'NAMA PERUSAHAAN : '.$entryjo->ppnama,0,1);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,'ALAMAT : '.$entryjo->ppalmtkantor,0,1);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'NO. IJIN PPTKIS : '.$entryjo->ppijin,0,1);
	$pdf->Cell(0,$space,'TEL : '.$entryjo->pptelp,0,1);
	$pdf->Cell(0,$space,'FAX : '.$entryjo->ppfax,0,1);
	$pdf->Cell(0,$space,'',0,1);

	$pdf->Cell(0,$space,'ADALAH BENAR DAN SAH JIKA SAYA MEMBERIKAN KUASA KEPADA PERUSAHAAN YANG DITUNJUK ',0,1);
	$pdf->Cell(0,$space,'UNTUK MEMBANTU MEREKRUT PEKERJA YANG ADA DI INDONESIA, YANG AKAN BEKERJA SEBAGAI ',0,1);
	$pdf->Cell(0,$space, $jp->jpnama.' DI TAIWAN DAN MENGISI SEMUA',0,1);
	$pdf->Cell(0,$space,'DATA-DATA YANG DIBUTUHKAN SESUAI PERATURAN YANG ADA. DAN MEMBANTU PEMBUATAN ',0,1);
	$pdf->Cell(0,$space,'PASPOR, DAN UNTUK PEMBUATAN VISA KAMI MELAMPIRKAN SURAT DARI KANTOR PERWAKILAN',0,1);
	$pdf->Cell(0,$space,'R.O.C MENURUT SURAT C.L.A NO: '.$entryjo->joclano.', ',0,1);
	$pdf->Cell(0,$space,'TANGGAL: '.$entryjo->joclatgl.' UNTUK MEMBANTU TENAGA KERJA SUPAYA DAPAT DATANG KE TAIWAN.',0,1);
	$pdf->Cell(0,$space,'',0,1);

	$pdf->Cell(0,$space,'KAMI JUGA MELAMPIRKAN KONTRAK KERJA UNTUK MEMPERMUDAH EFISIENSI KERJA.',0,1);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'SURAT INI DITANDATANGANI OLEH SAKSI YANG ADA DI TAIPEI, TAIWAN, REPUBLIC OF CHINA.',0,1);
	$pdf->Cell(0,$space,'',0,1);

	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'���D/Majikan : '.$entryjo->mjnamacn.','.$entryjo->mjnama,0,1);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,'��} : '.$entryjo->mjalmtcn,0,1);
	$pdf->Cell(0,$space,'Alamat : '.$entryjo->mjalmt,0,1);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'�q��/No. Tel : '.$entryjo->mjtelp,0,1);
} else if ($entryjo->jpid == 4) {
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,$entryjo->agnama,0,1,R);
	$pdf->Cell(0,$space,$entryjo->agnamacn,0,1,R);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,$entryjo->agalmtkantor,0,1,R);
	$pdf->Cell(0,$space,$entryjo->agalmtkantorcn,0,1,R);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'�q��/No.telp : '.$entryjo->agtelp,0,1,R);
	$pdf->Cell(0,$space,'',0,1);

	$pdf->SetFont('Big5','B',$fs1);
	$pdf->Cell(0,$space,'�� �v ��',0,1,C);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'���D : '.$entryjo->mjnamacn,0,1);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,'�a�} : '.$entryjo->mjalmtcn,0,1);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'���q�W�� : '.$entryjo->ppnama,0,1);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,'�a�} : '.$entryjo->ppalmtkantor,0,1);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'���Ӹ��X : '.$entryjo->ppijin,0,1);
	$pdf->Cell(0,$space,'�q�� : '.$entryjo->pptelp,0,1);
	$pdf->Cell(0,$space,'�ǯu : '.$entryjo->ppfax,0,1);
	$pdf->Cell(0,$space,'',0,1);

	$pdf->Cell(0,$space,'�������������q�X�k�e�U�H�A�H��U�����q�b�L���۶�'.$jp->jpnamacn.'�ӥx�u�@�A�ÿ�ӦL',0,1);
	$pdf->Cell(0,$space,'���k�W��g�@���һݤ��θu�������A�æw�ƨ��@�ө��a�ϻ��]�Φ������ھڮ֭�縹',0,1);
	$pdf->Cell(0,$space,'�X��¾�~�r�ġG '.$entryjo->joclano.' ��,����G '.$entryjo->joclatgl.' �A�ӽ�ñ�ҡA�H��U�Ҥu��F�u�@�a�I',0,1);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'�Ԧ����W���ĳҰʫ����H�K�@�~',0,1);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'�Ԧ������������ñ�p������G�x�_�A���إ���',0,1);
	$pdf->Cell(0,$space,'',0,1);

	$pdf->SetFont('Big5','B',$fs1);
	$pdf->Cell(0,$space,'SURAT KUASA',0,1,C);	
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'MAJIKAN : '.$entryjo->mjnama,0,1);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,'ALAMAT : '.$entryjo->mjalmt,0,1);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'MEMBERIKAN KUASA KEPADA :',0,1);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'NAMA PERUSAHAAN : '.$entryjo->ppnama,0,1);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,'ALAMAT : '.$entryjo->ppalmtkantor,0,1);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'NO. IJIN PPTKIS : '.$entryjo->ppijin,0,1);
	$pdf->Cell(0,$space,'TEL : '.$entryjo->pptelp,0,1);
	$pdf->Cell(0,$space,'FAX : '.$entryjo->ppfax,0,1);
	$pdf->Cell(0,$space,'',0,1);

	$pdf->Cell(0,$space,'ADALAH BENAR DAN SAH JIKA SAYA MEMBERIKAN KUASA KEPADA PERUSAHAAN YANG DITUNJUK ',0,1);
	$pdf->Cell(0,$space,'UNTUK MEMBANTU MEREKRUT PEKERJA YANG ADA DI INDONESIA, YANG AKAN BEKERJA SEBAGAI ',0,1);
	$pdf->Cell(0,$space, $jp->jpnama.' DI TAIWAN DAN MENGISI SEMUA DATA-DATA YANG',0,1);
	$pdf->Cell(0,$space,'DIBUTUHKAN SESUAI PERATURAN YANG ADA. DAN MEMBANTU PEMBUATAN PASPOR, DAN UNTUK',0,1);
	$pdf->Cell(0,$space,'PEMBUATAN VISA KAMI MELAMPIRKAN SURAT DARI KANTOR PERWAKILAN R.O.C MENURUT SURAT',0,1);
	$pdf->Cell(0,$space,'C.L.A NO: '.$entryjo->joclano.', TANGGAL: '.$entryjo->joclatgl.' UNTUK MEMBANTU TENAGA KERJA SUPAYA DAPAT',0,1);
	$pdf->Cell(0,$space,'DATANG KE TAIWAN.',0,1);
	$pdf->Cell(0,$space,'',0,1);

	$pdf->Cell(0,$space,'KAMI JUGA MELAMPIRKAN KONTRAK KERJA UNTUK MEMPERMUDAH EFISIENSI KERJA.',0,1);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'SURAT INI DITANDATANGANI OLEH SAKSI YANG ADA DI TAIPEI, TAIWAN, REPUBLIC OF CHINA.',0,1);
	$pdf->Cell(0,$space,'',0,1);

	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'���D/Majikan : '.$entryjo->mjnamacn.','.$entryjo->mjnama,0,1);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,'��} : '.$entryjo->mjalmtcn,0,1);
	$pdf->Cell(0,$space,'Alamat : '.$entryjo->mjalmt,0,1);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'�q��/No. Tel : '.$entryjo->mjtelp,0,1);
} else if ($entryjo->jpid == 5) {	
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,$entryjo->agnama,0,1,R);
	$pdf->Cell(0,$space,$entryjo->agnamacn,0,1,R);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,$entryjo->agalmtkantor,0,1,R);
	$pdf->Cell(0,$space,$entryjo->agalmtkantorcn,0,1,R);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'�q��/No.telp: '.$entryjo->agtelp,0,1,R);
	$pdf->Cell(0,$space,'',0,1);

	$pdf->SetFont('Big5','B',$fs1);
	$pdf->Cell(0,$space,'�� �v ��',0,1,C);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'���D : '.$entryjo->mjnamacn,0,1);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,'�a�} : '.$entryjo->mjalmtcn,0,1);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'���q�W�� : '.$entryjo->ppnama,0,1);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,'�a�} : '.$entryjo->ppalmtkantor,0,1);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'���Ӹ��X : '.$entryjo->ppijin,0,1);
	$pdf->Cell(0,$space,'�q�� : '.$entryjo->pptelp,0,1);
	$pdf->Cell(0,$space,'�ǯu : '.$entryjo->ppfax,0,1);
	$pdf->Cell(0,$space,'',0,1);

	$pdf->Cell(0,$space,'�������������q�X�k�e�U�H�A�H��U�����q�b�L���۶Ҭ��@�u/'.$jp->jpnamacn.'�ӥx�u�@�A�ÿ�ӦL',0,1);
	$pdf->Cell(0,$space,'���k�W��g�@���һݤ��θu�������A�æw�ƨ��@�ө��a�ϻ��]�Φ������ھڮ֭�縹',0,1);
	$pdf->Cell(0,$space,'�X��¾�~�r�ġG '.$entryjo->joclano.' ��,����G '.$entryjo->joclatgl.' �A�ӽ�ñ�ҡA�H��U�Ҥu��F�u�@�a�I',0,1);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'�Ԧ����W���ĳҰʫ����H�K�@�~',0,1);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'�Ԧ������������ñ�p������G�x�_�A���إ���',0,1);
	$pdf->Cell(0,$space,'',0,1);

	$pdf->SetFont('Big5','B',$fs1);
	$pdf->Cell(0,$space,'SURAT KUASA',0,1,C);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'MAJIKAN : '.$entryjo->mjnama,0,1);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,'ALAMAT : '.$entryjo->mjalmt,0,1);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'MEMBERIKAN KUASA KEPADA :',0,1);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'NAMA PERUSAHAAN : '.$entryjo->ppnama,0,1);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,'ALAMAT : '.$entryjo->ppalmtkantor,0,1);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'NO. IJIN PPTKIS : '.$entryjo->ppijin,0,1);
	$pdf->Cell(0,$space,'TEL : '.$entryjo->pptelp,0,1);
	$pdf->Cell(0,$space,'FAX : '.$entryjo->ppfax,0,1);
	$pdf->Cell(0,$space,'',0,1);

	$pdf->Cell(0,$space,'ADALAH BENAR DAN SAH JIKA SAYA MEMBERIKAN KUASA KEPADA PERUSAHAAN YANG DITUNJUK ',0,1);
	$pdf->Cell(0,$space,'UNTUK MEMBANTU MEREKRUT PEKERJA YANG ADA DI INDONESIA, YANG AKAN BEKERJA SEBAGAI ',0,1);
	$pdf->Cell(0,$space, $jp->jpnama.' DI TAIWAN DAN MENGISI SEMUA DATA-DATA',0,1);
	$pdf->Cell(0,$space,'YANG DIBUTUHKAN SESUAI PERATURAN YANG ADA. DAN MEMBANTU PEMBUATAN PASPOR, DAN',0,1);
	$pdf->Cell(0,$space,'UNTUK PEMBUATAN VISA KAMI MELAMPIRKAN SURAT DARI KANTOR PERWAKILAN R.O.C MENURUT',0,1);
	$pdf->Cell(0,$space,'SURAT C.L.A NO: '.$entryjo->joclano.', ',0,1);
	$pdf->Cell(0,$space,'TANGGAL: '.$entryjo->joclatgl.' UNTUK MEMBANTU TENAGA KERJA SUPAYA DAPAT DATANG KE TAIWAN.',0,1);
	$pdf->Cell(0,$space,'',0,1);

	$pdf->Cell(0,$space,'KAMI JUGA MELAMPIRKAN KONTRAK KERJA UNTUK MEMPERMUDAH EFISIENSI KERJA.',0,1);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'SURAT INI DITANDATANGANI OLEH SAKSI YANG ADA DI TAIPEI, TAIWAN, REPUBLIC OF CHINA.',0,1);
	$pdf->Cell(0,$space,'',0,1);

	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'���D/Majikan : '.$entryjo->mjnamacn.','.$entryjo->mjnama,0,1);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,'��} : '.$entryjo->mjalmtcn,0,1);
	$pdf->Cell(0,$space,'Alamat : '.$entryjo->mjalmt,0,1);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'�q��/No. Tel : '.$entryjo->mjtelp,0,1);
} else if ($entryjo->jpid == 6) {	
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,$entryjo->agnama,0,1,R);
	$pdf->Cell(0,$space,$entryjo->agnamacn,0,1,R);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,$entryjo->agalmtkantor,0,1,R);
	$pdf->Cell(0,$space,$entryjo->agalmtkantorcn,0,1,R);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'�q��/No.telp : '.$entryjo->agtelp,0,1,R);
	$pdf->Cell(0,$space,'',0,1);

	$pdf->SetFont('Big5','B',$fs1);
	$pdf->Cell(0,$space,'�� �v ��',0,1,C);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'���D : '.$entryjo->mjnamacn,0,1);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,'�a�} : '.$entryjo->mjalmtcn,0,1);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'���q�W�� : '.$entryjo->ppnama,0,1);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,'�a�} : '.$entryjo->ppalmtkantor,0,1);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'���Ӹ��X : '.$entryjo->ppijin,0,1);
	$pdf->Cell(0,$space,'�q�� : '.$entryjo->pptelp,0,1);
	$pdf->Cell(0,$space,'�ǯu : '.$entryjo->ppfax,0,1);
	$pdf->Cell(0,$space,'',0,1);

	$pdf->Cell(0,$space,'�������������q�X�k�e�U�H�A�H��U�����q�b�L���۶���y�u�ӥx�u�@�A�ÿ�ӦL',0,1);
	$pdf->Cell(0,$space,'���k�W��g�@���һݤ��θu�������A�æw�ƨ��@�ө��a�ϻ��]�Φ������ھڮ֭�縹',0,1);
	$pdf->Cell(0,$space,'�X��¾�~�r�ġG '.$entryjo->joclano.' ��,����G '.$entryjo->joclatgl.' �A�ӽ�ñ�ҡA�H��U�Ҥu��F�u�@�a�I',0,1);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'�Ԧ����W���ĳҰʫ����H�K�@�~',0,1);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'�Ԧ������������ñ�p������G�x�_�A���إ���',0,1);
	$pdf->Cell(0,$space,'',0,1);

	$pdf->SetFont('Big5','B',$fs1);
	$pdf->Cell(0,$space,'SURAT KUASA',0,1,C);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'MAJIKAN : '.$entryjo->mjnama,0,1);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space, 'ALAMAT : '.$entryjo->mjalmt,0,1);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'MEMBERIKAN KUASA KEPADA :',0,1);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'NAMA PERUSAHAAN : '.$entryjo->ppnama,0,1);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,'ALAMAT : '.$entryjo->ppalmtkantor,0,1);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'NO. IJIN PPTKIS : '.$entryjo->ppijin,0,1);
	$pdf->Cell(0,$space,'TEL : '.$entryjo->pptelp,0,1);
	$pdf->Cell(0,$space,'FAX : '.$entryjo->ppfax,0,1);
	$pdf->Cell(0,$space,'',0,1);

	$pdf->Cell(0,$space,'ADALAH BENAR DAN SAH JIKA SAYA MEMBERIKAN KUASA KEPADA PERUSAHAAN YANG DITUNJUK ',0,1);
	$pdf->Cell(0,$space,'UNTUK MEMBANTU MEREKRUT PEKERJA YANG ADA DI INDONESIA, YANG AKAN BEKERJA SEBAGAI ',0,1);
	$pdf->Cell(0,$space,'PEKERJA KONSTRUKSI DI TAIWAN DAN MENGISI SEMUA DATA-DATA YANG ',0,1);
	$pdf->Cell(0,$space,'DIBUTUHKAN SESUAI PERATURAN YANG ADA. DAN MEMBANTU PEMBUATAN PASPOR, DAN UNTUK ',0,1);
	$pdf->Cell(0,$space,'PEMBUATAN VISA KAMI MELAMPIRKAN SURAT DARI KANTOR PERWAKILAN R.O.C MENURUT ',0,1);
	$pdf->Cell(0,$space,'SURAT C.L.A NO: '.$entryjo->joclano.', TANGGAL: '.$entryjo->joclatgl.' UNTUK MEMBANTU TENAGA KERJA SUPAYA DAPAT ',0,1);
	$pdf->Cell(0,$space,'DATANG KE TAIWAN.',0,1);
	$pdf->Cell(0,$space,'',0,1);

	$pdf->Cell(0,$space,'KAMI JUGA MELAMPIRKAN KONTRAK KERJA UNTUK MEMPERMUDAH EFISIENSI KERJA.',0,1);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'SURAT INI DITANDATANGANI OLEH SAKSI YANG ADA DI TAIPEI, TAIWAN, REPUBLIC OF CHINA.',0,1);
	$pdf->Cell(0,$space,'',0,1);

	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'���D/Majikan : '.$entryjo->mjnamacn.','.$entryjo->mjnama,0,1);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,'��} : '.$entryjo->mjalmtcn,0,1);
	$pdf->Cell(0,$space,'Alamat : '.$entryjo->mjalmt,0,1);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'�q��/No. Tel : '.$entryjo->mjtelp,0,1);
}

//$pdf->Text(305,335,' v ');

Barcode::fpdf($pdf, '000000', $bx, $by, 0, 'code39', array('code'=>$code), $bw, $bh);

$pdf->output();
ob_flush();
?>
