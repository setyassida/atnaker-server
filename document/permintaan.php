<?
ob_start();
require_once('./pdf/lib/header.php');

if(isset($_REQUEST['id']))
	//$joid = base64UrlDecode($_REQUEST['id']);
	$id = $_REQUEST['id'];
else
	exit("Not Exist");//$joid = 'J11048HQ';

//	die("Not Exist");

/*$entryjo = Joborder::find($joid);
$majikan = Majikan::joid($joid);
$agensi = Entitas::find($entryjo->agid);
$pptki = Entitas::find($entryjo->ppid);
$jp = Jenispekerjaan::find($entryjo->jpid);
$code = $entryjo->joid;*/

//$demand = Demand::find($deid);
//$entryjo = Joborder::find($demand->joid);
//$majikan = Majikan::joid($entryjo->joid);
//$agensi = Entitas::find($entryjo->agid);
//$pptki = Entitas::find($demand->ppid);
$entryjo = EntryJO::find($id);
$jp = Jenispekerjaan::find($entryjo->jpid);
//$code = $demand->debcsp;
$code = $entryjo->ejbcsp;

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
	$pdf->Cell(0,$space,'�q��/No.telp: '.$entryjo->agtelp,0,1,R);
	$pdf->Cell(0,$space,'',0,1);

	$pdf->SetFont('Big5','B',$fs1);
	$pdf->Cell(0,$space,'�� �D ��',0,1,C);
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
	$pdf->Cell(0,$space,'�q�Ҫ� : ',0,1);
	$pdf->Cell(0,$space,'�����q�Ԧ��ھ� : '.$entryjo->ejdatefilled.' ��ñ�q�����v�ѭn�D�Q��̤U�z�U������۶Ҹ`�ﺮ�u',0,1);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,'�u�@�a�I : '.$entryjo->mjalmtcn,0,1);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'�H��    ¾��     ���~',0,1);
	$pdf->Cell(0,$space,''.$entryjo->jojmltki.' �H    '.$jp->jpnamacn.'      NT$ '.$entryjo->jpgaji/1,0,1);
	$pdf->Cell(0,$space,'',0,1);

	$pdf->Cell(0,$space,'���� :',0,1);
	$pdf->Cell(0,$space,'1.	�u������ : '.$entryjo->jomkthn.'�~'.$entryjo->jomkbln.'��'.$entryjo->jomkhr.'��',0,1);
	$pdf->Cell(0,$space,'2.	�u�@�ɶ� : �@�P���u�@6��,�K�O���ѿ��J',0,1);
	$pdf->Cell(0,$space,'3.	��  �O : ���������^�{�����Ѷ��D�t��',0,1);
	$pdf->Cell(0,$space,'4.	�����O�� : �̷��a�Ҥu�k�W�w��z',0,1);
	$pdf->Cell(0,$space,'5.	�[�Z���I : �̥x�W�Ұʰ�Ǫk�W�w��',0,1);
	$pdf->Cell(0,$space,'6.	���~�~�� : �̥x�W�Ұʰ�Ǫk�W�w��(�~���C��)',0,1);
	$pdf->Cell(0,$space,'7.	�O  �I : �̥x�W�F���k�߳W�w��',0,1);
	$pdf->Cell(0,$space,'8.	�|  �k : �ھڤ��إ���|�k',0,1);
	$pdf->Cell(0,$space,'9.	�եδ��� : �|�Q��',0,1);
	$pdf->Cell(0,$space,'',0,1);

	$pdf->SetFont('Big5','B',$fs1);
	$pdf->Cell(0,$space,'SURAT PERMINTAAN',0,1,C);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'NAMA PERUSAHAAN : '.$entryjo->ppnama,0,1);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,'ALAMAT : '.$entryjo->ppalmtkantor,0,1);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'NO. IJIN PPTKIS : '.$entryjo->ppijin,0,1);
	$pdf->Cell(0,$space,'TEL : '.$entryjo->pptelp,0,1);
	$pdf->Cell(0,$space,'FAX : '.$entryjo->ppfax,0,1);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'KEPADA YANG TERHORMAT :',0,1);
	$pdf->Cell(0,$space,'Surat kuasa ini dibuat pada tanggal : '.$entryjo->ejdatefilled.' tujuannya adalah untuk memperkerjakan ',0,1);
	$pdf->Cell(0,$space,'Tenaga Kerja Indonesia sebagai '.$jp->jpnama.' ',0,1);
	$pdf->Cell(0,$space,'dengan syarat-syarat yang tertera sebagai berikut.',0,1);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,'Alamat Pekerjaan : '.$entryjo->mjalmt,0,1);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(60,$space,'Jumlah',0,0);
	$pdf->Cell(250,$space,'Pekerjaan',0,0);
	$pdf->Cell(30,$space,'Gaji/Bulan',0,1);
	$pdf->Cell(60,$space,(integer)$entryjo->jojmltki,0,0);
	$pdf->Cell(250,$space,$jp->jpnama,0,0);
	$pdf->Cell(30,$space,'NT$ '.$entryjo->jpgaji/1,0,1);
	$pdf->Cell(0,$space,'',0,1);

	$pdf->Cell(0,$space,'Syarat-syarat :',0,1);
	$pdf->Cell(0,$space,"1.	Masa Kontrak : $entryjo->jomkthn Tahun $entryjo->jomkbln Bulan $entryjo->jomkhr Hari",0,1);
	$pdf->Cell(0,$space,'2.	Waktu bekerja : Jam kerja dalam 1 minggu adalah selama 6 hari. Makan dan akomodasi ditanggung majikan',0,1);
	$pdf->Cell(0,$space,'3.	Biaya perjalanan : Jika masa kontrak kerja telah selesai maka tiket ditanggung oleh majikan.',0,1);
	$pdf->Cell(0,$space,'4.	Biaya pengobatan : Menurut hukum yang berlaku di Taiwan',0,1);
	$pdf->Cell(0,$space,'5.	Uang lembur : Menurut hukum yang berlaku di Taiwan',0,1);
	$pdf->Cell(0,$space,'6.	Libur tahunan : Menurut hukum perburuhan di Taiwan (1 tahun ada 7 hari libur)',0,1);
	$pdf->Cell(0,$space,'7.	Asuransi : Menurut hukum yang berlaku di Taiwan',0,1);
	$pdf->Cell(0,$space,'8.	Pajak : Menurut hukum yang berlaku di Taiwan',0,1);
	$pdf->Cell(0,$space,'9.	Masa Percobaan : 40 hari',0,1);
	$pdf->Cell(0,$space,'',0,1);

	$pdf->Cell(0,$space,'���D/Majikan : '.$entryjo->mjnamacn.', '.$entryjo->mjnama,0,1);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,'���} : '.$entryjo->mjalmtcn,0,1);
	$pdf->Cell(0,$space,'Alamat : '.$entryjo->mjalmt,0,1);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'�q��/No. Tel : '.$entryjo->mjtelp,0,1);
} else if ($entryjo->jpid == 2) {
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
	$pdf->Cell(0,$space,'�� �D ��',0,1,C);
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
	$pdf->Cell(0,$space,'�q�Ҫ� : ',0,1);
	$pdf->Cell(0,$space,'�����q�Ԧ��ھ� : '.$entryjo->ejdatefilled.' ��ñ�q�����v�ѭn�D�Q��̤U�z�U������۶Ҹ`��ާ@�u',0,1);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,'�u�@�a�I : '.$entryjo->mjalmtcn,0,1);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'�H��    ¾��                      ���~',0,1);
	$pdf->Cell(0,$space,''.$entryjo->jojmltki.' �H     '.$jp->jpnamacn.'      NT$ '.$entryjo->jpgaji/1,0,1);
	$pdf->Cell(0,$space,'',0,1);

	$pdf->Cell(0,$space,'���� :',0,1);
	$pdf->Cell(0,$space,'1.	�u������ : '.$entryjo->jomkthn.'�~'.$entryjo->jomkbln.'��'.$entryjo->jomkhr.'��',0,1);
	$pdf->Cell(0,$space,'2.	�u�@�ɶ� : �@�P���u�@6��, ���J�O�ζ��D����, ���C��o�q�~�ꤤ�����s�x�� '.number_format($entryjo->joakomodasi, 0, ",",'').'��',0,1);
	$pdf->Cell(0,$space,'3.	��  �O : ���������^�{�����Ѷ��D�t��',0,1);
	$pdf->Cell(0,$space,'4.	�����O�� : �̷��a�Ҥu�k�W�w��z',0,1);
	$pdf->Cell(0,$space,'5.	�[�Z���I : �̥x�W�Ұʰ�Ǫk�W�w��',0,1);
	$pdf->Cell(0,$space,'6.	���~�~�� : �̥x�W�Ұʰ�Ǫk�W�w��(�~���C��)',0,1);
	$pdf->Cell(0,$space,'7.	�O  �I : �̥x�W�F���k�߳W�w��',0,1);
	$pdf->Cell(0,$space,'8.	�|  �k : �ھڤ��إ���|�k',0,1);
	$pdf->Cell(0,$space,'9.	�եδ��� : �|�Q��',0,1);
	$pdf->Cell(0,$space,'',0,1);

	$pdf->SetFont('Big5','B',$fs1);
	$pdf->Cell(0,$space,'SURAT PERMINTAAN',0,1,C);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'NAMA PERUSAHAAN : '.$entryjo->ppnama,0,1);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,'ALAMAT : '.$entryjo->ppalmtkantor,0,1);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'NO. IJIN PPTKIS : '.$entryjo->ppijin,0,1);
	$pdf->Cell(0,$space,'TEL : '.$entryjo->pptelp,0,1);
	$pdf->Cell(0,$space,'FAX : '.$entryjo->ppfax,0,1);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'KEPADA YANG TERHORMAT :',0,1);
	$pdf->Cell(0,$space,'Surat kuasa ini dibuat pada tanggal : '.$entryjo->ejdatefilled.' tujuannya adalah untuk memperkerjakan ',0,1);
	$pdf->Cell(0,$space,'Tenaga Kerja Indonesia sebagai '.$jp->jpnama.' ',0,1);
	$pdf->Cell(0,$space,'dengan syarat-syarat yang tertera sebagai berikut.',0,1);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,'Alamat Pekerjaan : '.$entryjo->mjalmt,0,1);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(60,$space,'Jumlah',0,0);
	$pdf->Cell(350,$space,'Pekerjaan',0,0);
	$pdf->Cell(30,$space,'Gaji/Bulan',0,1);
	$pdf->Cell(60,$space,(integer)$entryjo->jojmltki,0,0);
	$pdf->Cell(350,$space,$jp->jpnama,0,0);
	$pdf->Cell(30,$space,'NT$ '.$entryjo->jpgaji/1,0,1);
	$pdf->Cell(0,$space,'',0,1);

	$pdf->Cell(0,$space,'Syarat-syarat :',0,1);
	$pdf->Cell(0,$space,"1.	Masa Kontrak : $entryjo->jomkthn Tahun $entryjo->jomkbln Bulan $entryjo->jomkhr Hari ",0,1);
	$pdf->Cell(0,$space,'2.	Waktu bekerja : Jam kerja dalam 1 minggu adalah selama 6 hari. Makan dan akomodasi dapat disediakan majikan dan',0,1);
	$pdf->Cell(0,$space,'       di kenakan potongan gaji sebesar NTD '.number_format($entryjo->joakomodasi, 0, ",",'').' / bulan',0,1);
	$pdf->Cell(0,$space,'3.	Biaya perjalanan : Jika masa kontrak kerja telah selesai maka tiket ditanggung oleh majikan.',0,1);
	$pdf->Cell(0,$space,'4.	Biaya pengobatan : Menurut hukum yang berlaku di Taiwan',0,1);
	$pdf->Cell(0,$space,'5.	Uang lembur : Menurut hukum yang berlaku di Taiwan',0,1);
	$pdf->Cell(0,$space,'6.	Libur tahunan : Menurut hukum perburuhan di Taiwan (1 tahun ada 7 hari libur)',0,1);
	$pdf->Cell(0,$space,'7.	Asuransi : Menurut hukum yang berlaku di Taiwan',0,1);
	$pdf->Cell(0,$space,'8.	Pajak : Menurut hukum yang berlaku di Taiwan',0,1);
	$pdf->Cell(0,$space,'9.	Masa Percobaan : 40 hari',0,1);
	$pdf->Cell(0,$space,'',0,1);

	$pdf->Cell(0,$space,'���D/Majikan : '.$entryjo->mjnamacn.', '.$entryjo->mjnama,0,1);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,'���} : '.$entryjo->mjalmtcn,0,1);
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
	$pdf->Cell(0,$space,'�q��/No.telp: '.$entryjo->agtelp,0,1,R);
	$pdf->Cell(0,$space,'',0,1);

	$pdf->SetFont('Big5','B',$fs1);
	$pdf->Cell(0,$space,'�� �D ��',0,1,C);
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
	$pdf->Cell(0,$space,'�q�Ҫ� : ',0,1);
	$pdf->Cell(0,$space,'�����q�Ԧ��ھ� : '.$entryjo->ejdatefilled.' ��ñ�q�����v�ѭn�D�Q��̤U�z�U������۶Ҹ`��i�@���c/��|',0,1);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,'�u�@�a�I : '.$entryjo->mjalmtcn,0,1);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'�H��      ¾��                      ���~',0,1);
	$pdf->Cell(0,$space,''.$entryjo->jojmltki.' �H      '.$jp->jpnamacn.'      NT$ '.$entryjo->jpgaji/1,0,1);
	$pdf->Cell(0,$space,'',0,1);

	$pdf->Cell(0,$space,'���� :',0,1);
	$pdf->Cell(0,$space,'1.	�u������ : '.$entryjo->jomkthn.'�~'.$entryjo->jomkbln.'��'.$entryjo->jomkhr.'��',0,1);
	$pdf->Cell(0,$space,'2.	�u�@�ɶ� : �@�P���u�@6��, ���J�O�ζ��D����, ���C��o�q�~�ꤤ�����s�x�� '.number_format($entryjo->joakomodasi, 0, ",",'').'��',0,1);
	$pdf->Cell(0,$space,'3.	��  �O : ���������^�{�����Ѷ��D�t��',0,1);
	$pdf->Cell(0,$space,'4.	�����O�� : �̷��a�Ҥu�k�W�w��z',0,1);
	$pdf->Cell(0,$space,'5.	�[�Z���I : �̥x�W�Ұʰ�Ǫk�W�w��',0,1);
	$pdf->Cell(0,$space,'6.	���~�~�� : �̥x�W�Ұʰ�Ǫk�W�w��(�~���C��)',0,1);
	$pdf->Cell(0,$space,'7.	�O  �I : �̥x�W�F���k�߳W�w��',0,1);
	$pdf->Cell(0,$space,'8.	�|  �k : �ھڤ��إ���|�k',0,1);
	$pdf->Cell(0,$space,'9.	�եδ��� : �|�Q��',0,1);
	$pdf->Cell(0,$space,'',0,1);

	$pdf->SetFont('Big5','B',$fs1);
	$pdf->Cell(0,$space,'SURAT PERMINTAAN',0,1,C);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'NAMA PERUSAHAAN : '.$entryjo->ppnama,0,1);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,'ALAMAT : '.$entryjo->ppalmtkantor,0,1);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'NO. IJIN PPTKIS : '.$entryjo->ppijin,0,1);
	$pdf->Cell(0,$space,'TEL : '.$entryjo->pptelp,0,1);
	$pdf->Cell(0,$space,'FAX : '.$entryjo->ppfax,0,1);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'KEPADA YANG TERHORMAT :',0,1);
	$pdf->Cell(0,$space,'Surat kuasa ini dibuat pada tanggal : '.$entryjo->ejdatefilled.' tujuannya adalah untuk memperkerjakan ',0,1);
	$pdf->Cell(0,$space,'Tenaga Kerja Indonesia sebagai '.$jp->jpnama.' ',0,1);
	$pdf->Cell(0,$space,'dengan syarat-syarat yang tertera sebagai berikut.',0,1);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,'Alamat Pekerjaan : '.$entryjo->mjalmt,0,1);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(60,$space,'Jumlah',0,0);
	$pdf->Cell(330,$space,'Pekerjaan',0,0);
	$pdf->Cell(30,$space,'Gaji/Bulan',0,1);
	$pdf->Cell(60,$space,(integer)$entryjo->jojmltki,0,0);
	$pdf->Cell(330,$space,$jp->jpnama,0,0);
	$pdf->Cell(30,$space,'NT$ '.$entryjo->jpgaji/1,0,1);
	$pdf->Cell(0,$space,'',0,1);

	$pdf->Cell(0,$space,'Syarat-syarat :',0,1);
	$pdf->Cell(0,$space,"1.	Masa Kontrak : $entryjo->jomkthn Tahun $entryjo->jomkbln Bulan $entryjo->jomkhr Hari ",0,1);
	$pdf->Cell(0,$space,'2.	Waktu bekerja : Jam kerja dalam 1 minggu adalah selama 6 hari. Makan dan akomodasi dapat disediakan majikan dan',0,1);
	$pdf->Cell(0,$space,'       di kenakan potongan gaji sebesar NTD '.number_format($entryjo->joakomodasi, 0, ",",'').' / bulan',0,1);
	$pdf->Cell(0,$space,'3.	Biaya perjalanan : Jika masa kontrak kerja telah selesai maka tiket ditanggung oleh majikan.',0,1);
	$pdf->Cell(0,$space,'4.	Biaya pengobatan : Menurut hukum yang berlaku di Taiwan',0,1);
	$pdf->Cell(0,$space,'5.	Uang lembur : Menurut hukum yang berlaku di Taiwan',0,1);
	$pdf->Cell(0,$space,'6.	Libur tahunan : Menurut hukum perburuhan di Taiwan (1 tahun ada 7 hari libur)',0,1);
	$pdf->Cell(0,$space,'7.	Asuransi : Menurut hukum yang berlaku di Taiwan',0,1);
	$pdf->Cell(0,$space,'8.	Pajak : Menurut hukum yang berlaku di Taiwan',0,1);
	$pdf->Cell(0,$space,'9.	Masa Percobaan : 40 hari',0,1);
	$pdf->Cell(0,$space,'',0,1);

	$pdf->Cell(0,$space,'���D/Majikan  : '.$entryjo->mjnamacn.', '.$entryjo->mjnama,0,1);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,'���}  : '.$entryjo->mjalmtcn,0,1);
	$pdf->Cell(0,$space,'Alamat  : '.$entryjo->mjalmt,0,1);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'�q��/No. Tel  : '.$entryjo->mjtelp,0,1);
} else if ($entryjo->jpid == 4) {
	//editing gaji untuk informal
	if($entryjo->jogajiinf == 1)
	{$gajiinf = 15840.00;}
	else if($entryjo->jogajiinf == 2)
	{$gajiinf = 19047.00;}
	
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
	$pdf->Cell(0,$space,'�� �D ��',0,1,C);
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
	$pdf->Cell(0,$space,'�q�Ҫ� : ',0,1);
	$pdf->Cell(0,$space,'�����q�Ԧ��ھ� : '.$entryjo->ejdatefilled.' ��ñ�q�����v�ѭn�D�Q��̤U�z�U������۶Ҹ`��  ���@�u',0,1);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,'�u�@�a�I : '.$entryjo->mjalmtcn,0,1);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'�H��    ¾��                      ���~',0,1);
	$pdf->Cell(0,$space,''.$entryjo->jojmltki.' �H    '.$jp->jpnamacn.'                    NT$ '.$entryjo->jpgaji/1,0,1);
	$pdf->Cell(0,$space,'',0,1);

	$pdf->Cell(0,$space,'���� :',0,1);
	$pdf->Cell(0,$space,'1.	�u������ : '.$entryjo->jomkthn.'�~'.$entryjo->jomkbln.'��'.$entryjo->jomkhr.'��',0,1);
	$pdf->Cell(0,$space,'2.	�u�@�ɶ� : �@�P���u�@6��,�K�O���ѿ��J',0,1);
	$pdf->Cell(0,$space,'3.	��  �O : ���������^�{�����Ѷ��D�t��',0,1);
	$pdf->Cell(0,$space,'4.	�����O�� : �̷��a�Ҥu�k�W�w��z',0,1);
	$pdf->Cell(0,$space,'5.	�[�Z���I : �̥x�W�Ұʰ�Ǫk�W�w��',0,1);
	$pdf->Cell(0,$space,'6.	���~�~�� : �̥x�W�Ұʰ�Ǫk�W�w��(�~���C��)',0,1);
	$pdf->Cell(0,$space,'7.	�O  �I : �̥x�W�F���k�߳W�w��',0,1);
	$pdf->Cell(0,$space,'8.	�|  �k : �ھڤ��إ���|�k',0,1);
	$pdf->Cell(0,$space,'9.	�եδ��� : �|�Q��',0,1);
	$pdf->Cell(0,$space,'',0,1);

	$pdf->SetFont('Big5','B',$fs1);
	$pdf->Cell(0,$space,'SURAT PERMINTAAN',0,1,C);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'NAMA PERUSAHAAN : '.$entryjo->ppnama,0,1);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,'ALAMAT : '.$entryjo->ppalmtkantor,0,1);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'NO. IJIN PPTKIS : '.$entryjo->ppijin,0,1);
	$pdf->Cell(0,$space,'TEL : '.$entryjo->pptelp,0,1);
	$pdf->Cell(0,$space,'FAX : '.$entryjo->ppfax,0,1);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'KEPADA YANG TERHORMAT :',0,1);
	$pdf->Cell(0,$space,'Surat kuasa ini dibuat pada tanggal : '.$entryjo->ejdatefilled.' tujuannya adalah untuk memperkerjakan ',0,1);
	$pdf->Cell(0,$space,'Tenaga Kerja Indonesia sebagai '.$jp->jpnama.' ',0,1);
	$pdf->Cell(0,$space,'dengan syarat-syarat yang tertera sebagai berikut.',0,1);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,'Alamat Pekerjaan : '.$entryjo->mjalmt,0,1);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(60,$space,'Jumlah',0,0);
	$pdf->Cell(320,$space,'Pekerjaan',0,0);
	$pdf->Cell(30,$space,'Gaji/Bulan',0,1);
	$pdf->Cell(60,$space,(integer)$entryjo->jojmltki,0,0);
	$pdf->Cell(320,$space,$jp->jpnama,0,0);
	$pdf->Cell(30,$space,'NT$ '.$entryjo->jpgaji/1,0,1);
	$pdf->Cell(0,$space,'',0,1);

	$pdf->Cell(0,$space,'Syarat-syarat :',0,1);
	$pdf->Cell(0,$space,"1.	Masa Kontrak : $entryjo->jomkthn Tahun $entryjo->jomkbln Bulan $entryjo->jomkhr Hari ",0,1);
	$pdf->Cell(0,$space,'2.	Waktu bekerja : Jam kerja dalam 1 minggu adalah selama 6 hari. Makan dan akomodasi ditanggung majikan',0,1);
	$pdf->Cell(0,$space,'3.	Biaya perjalanan : Jika masa kontrak kerja telah selesai maka tiket ditanggung oleh majikan.',0,1);
	$pdf->Cell(0,$space,'4.	Biaya pengobatan : Menurut hukum yang berlaku di Taiwan',0,1);
	$pdf->Cell(0,$space,'5.	Uang lembur : Menurut hukum yang berlaku di Taiwan',0,1);
	$pdf->Cell(0,$space,'6.	Libur tahunan : Menurut hukum perburuhan di Taiwan (1 tahun ada 7 hari libur)',0,1);
	$pdf->Cell(0,$space,'7.	Asuransi : Menurut hukum yang berlaku di Taiwan',0,1);
	$pdf->Cell(0,$space,'8.	Pajak : Menurut hukum yang berlaku di Taiwan',0,1);
	$pdf->Cell(0,$space,'9.	Masa Percobaan : 40 hari',0,1);
	$pdf->Cell(0,$space,'',0,1);

	$pdf->Cell(0,$space,'���D/Majikan  : '.$entryjo->mjnamacn.', '.$entryjo->mjnama,0,1);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,'���}  : '.$entryjo->mjalmtcn,0,1);
	$pdf->Cell(0,$space,'Alamat  : '.$entryjo->mjalmt,0,1);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'�q��/No. Tel  : '.$entryjo->mjtelp,0,1);
} else if ($entryjo->jpid == 5) {
	//editing gaji untuk informal
	if($entryjo->jogajiinf == 1)
	{$gajiinf = 15840.00;}
	else if($entryjo->jogajiinf == 2)
	{$gajiinf = 19047.00;}
	
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
	$pdf->Cell(0,$space,'�� �D ��',0,1,C);
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
	$pdf->Cell(0,$space,'�q�Ҫ� : ',0,1);
	$pdf->Cell(0,$space,'�����q�Ԧ��ھ� : '.$entryjo->ejdatefilled.' ��ñ�q�����v�ѭn�D�Q��̤U�z�U������۶Ҹ`�� �a�x����',0,1);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,'�u�@�a�I : '.$entryjo->mjalmtcn,0,1);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'�H��   ¾��              ���~',0,1);
	$pdf->Cell(0,$space,''.$entryjo->jojmltki.' �H    '.$jp->jpnamacn.'      NT$ '.$entryjo->jpgaji/1,0,1);
	$pdf->Cell(0,$space,'',0,1);

	$pdf->Cell(0,$space,'���� :',0,1);
	$pdf->Cell(0,$space,'1.	�u������ : '.$entryjo->jomkthn.'�~'.$entryjo->jomkbln.'��'.$entryjo->jomkhr.'��',0,1);
	$pdf->Cell(0,$space,'2.	�u�@�ɶ� : �@�P���u�@6��,�K�O���ѿ��J',0,1);
	$pdf->Cell(0,$space,'3.	��  �O : ���������^�{�����Ѷ��D�t��',0,1);
	$pdf->Cell(0,$space,'4.	�����O�� : �̷��a�Ҥu�k�W�w��z',0,1);
	$pdf->Cell(0,$space,'5.	�[�Z���I : �̥x�W�Ұʰ�Ǫk�W�w��',0,1);
	$pdf->Cell(0,$space,'6.	���~�~�� : �̥x�W�Ұʰ�Ǫk�W�w��(�~���C��)',0,1);
	$pdf->Cell(0,$space,'7.	�O  �I : �̥x�W�F���k�߳W�w��',0,1);
	$pdf->Cell(0,$space,'8.	�|  �k : �ھڤ��إ���|�k',0,1);
	$pdf->Cell(0,$space,'9.	�եδ��� : �|�Q��',0,1);
	$pdf->Cell(0,$space,'',0,1);

	$pdf->SetFont('Big5','B',$fs1);
	$pdf->Cell(0,$space,'SURAT PERMINTAAN',0,1,C);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'NAMA PERUSAHAAN : '.$entryjo->ppnama,0,1);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,'ALAMAT : '.$entryjo->ppalmtkantor,0,1);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'NO. IJIN PPTKIS : '.$entryjo->ppijin,0,1);
	$pdf->Cell(0,$space,'TEL : '.$entryjo->pptelp,0,1);
	$pdf->Cell(0,$space,'FAX : '.$entryjo->ppfax,0,1);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'KEPADA YANG TERHORMAT :',0,1);
	$pdf->Cell(0,$space,'Surat kuasa ini dibuat pada tanggal : '.$entryjo->ejdatefilled.' tujuannya adalah untuk memperkerjakan ',0,1);
	$pdf->Cell(0,$space,'Tenaga Kerja Indonesia sebagai '.$jp->jpnama.' ',0,1);
	$pdf->Cell(0,$space,'dengan syarat-syarat yang tertera sebagai berikut.',0,1);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,'Alamat Pekerjaan : '.$entryjo->mjalmt,0,1);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(60,$space,'Jumlah',0,0);
	$pdf->Cell(330,$space,'Pekerjaan',0,0);
	$pdf->Cell(30,$space,'Gaji/Bulan',0,1);
	$pdf->Cell(60,$space,(integer)$entryjo->jojmltki,0,0);
	$pdf->Cell(330,$space,$jp->jpnama,0,0);
	$pdf->Cell(30,$space,'NT$ '.$entryjo->jpgaji/1,0,1);
	$pdf->Cell(0,$space,'',0,1);

	$pdf->Cell(0,$space,'Syarat-syarat :',0,1);
	$pdf->Cell(0,$space,"1.	Masa Kontrak : $entryjo->jomkthn Tahun $entryjo->jomkbln Bulan $entryjo->jomkhr Hari ",0,1);
	$pdf->Cell(0,$space,'2.	Waktu bekerja : Jam kerja dalam 1 minggu adalah selama 6 hari. Makan dan akomodasi ditanggung majikan',0,1);
	$pdf->Cell(0,$space,'3.	Biaya perjalanan : Jika masa kontrak kerja telah selesai maka tiket ditanggung oleh majikan.',0,1);
	$pdf->Cell(0,$space,'4.	Biaya pengobatan : Menurut hukum yang berlaku di Taiwan',0,1);
	$pdf->Cell(0,$space,'5.	Uang lembur : Menurut hukum yang berlaku di Taiwan',0,1);
	$pdf->Cell(0,$space,'6.	Libur tahunan : Menurut hukum perburuhan di Taiwan (1 tahun ada 7 hari libur)',0,1);
	$pdf->Cell(0,$space,'7.	Asuransi : Menurut hukum yang berlaku di Taiwan',0,1);
	$pdf->Cell(0,$space,'8.	Pajak : Menurut hukum yang berlaku di Taiwan',0,1);
	$pdf->Cell(0,$space,'9.	Masa Percobaan : 40 hari',0,1);
	$pdf->Cell(0,$space,'',0,1);

	$pdf->Cell(0,$space,'���D/Majikan  : '.$entryjo->mjnamacn.', '.$entryjo->mjnama,0,1);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,'���}  : '.$entryjo->mjalmtcn,0,1);
	$pdf->Cell(0,$space,'Alamat  : '.$entryjo->mjalmt,0,1);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'�q��/No. Tel  : '.$entryjo->mjtelp,0,1);
} else if ($entryjo->jpid == 6) {
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
	$pdf->Cell(0,$space,'�� �D ��',0,1,C);
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
	$pdf->Cell(0,$space,'�q�Ҫ� : ',0,1);
	$pdf->Cell(0,$space,'�����q�Ԧ��ھ� : '.$entryjo->ejdatefilled.' ��ñ�q�����v�ѭn�D�Q��̤U�z�U������۶Ҹ`��ާ@�u',0,1);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,'�u�@�a�I : '.$entryjo->mjalmtcn,0,1);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'�H��    ¾��                      ���~',0,1);
	$pdf->Cell(0,$space,''.$entryjo->jojmltki.' �H     '.$jp->jpnamacn.'      NT$ '.$entryjo->jpgaji/1,0,1);
	$pdf->Cell(0,$space,'',0,1);

    if($entryjo->jotime==1){$waktukerjacn = '1.5 �� 2 �~'; $waktukerja = '1.5 tahun - 2 tahun';}
	else{$waktukerjacn = '2 �� 3 �~'; $waktukerja = '2 tahun - 3 tahun';}
	$pdf->Cell(0,$space,'���� :',0,1);
	$pdf->Cell(0,$space,'1.	�u������ : '. $waktukerjacn,0,1);
	$pdf->Cell(0,$space,'2.	�C�G�g�u�@�`�ɼƤ��o�W�L84�p�ɡC1�Ѥu�@���o�W�L12�Ӥp�ɡA�����u�@�ɶ�1�Ӥ뤣�W�L46�Ӥp�ɡC',0,1);
	$pdf->Cell(0,$space,'3.	��  �O : ���������^�{�����Ѷ��D�t��',0,1);
	$pdf->Cell(0,$space,'4.	�����O�� : �̷��a�Ҥu�k�W�w��z',0,1);
	$pdf->Cell(0,$space,'5.	�[�Z���I : �̥x�W�Ұʰ�Ǫk�W�w��',0,1);
	$pdf->Cell(0,$space,'6.	���~�~�� : �̥x�W�Ұʰ�Ǫk�W�w��(�~���C��)',0,1);
	$pdf->Cell(0,$space,'7.	�O  �I : �̥x�W�F���k�߳W�w��',0,1);
	$pdf->Cell(0,$space,'8.	�|  �k : �ھڤ��إ���|�k',0,1);
	$pdf->Cell(0,$space,'9.	�եδ��� : �|�Q��',0,1);
	$pdf->Cell(0,$space,'',0,1);

	$pdf->SetFont('Big5','B',$fs1);
	$pdf->Cell(0,$space,'SURAT PERMINTAAN',0,1,C);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'NAMA PERUSAHAAN : '.$entryjo->ppnama,0,1);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,'ALAMAT : '.$entryjo->ppalmtkantor,0,1);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'NO. IJIN PPTKIS : '.$entryjo->ppijin,0,1);
	$pdf->Cell(0,$space,'TEL : '.$entryjo->pptelp,0,1);
	$pdf->Cell(0,$space,'FAX : '.$entryjo->ppfax,0,1);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'KEPADA YANG TERHORMAT :',0,1);
	$pdf->Cell(0,$space,'Surat kuasa ini dibuat pada tanggal : '.$entryjo->ejdatefilled.' tujuannya adalah untuk memperkerjakan ',0,1);
	$pdf->Cell(0,$space,'Tenaga Kerja Indonesia sebagai '.$jp->jpnama.' ',0,1);
	$pdf->Cell(0,$space,'dengan syarat-syarat yang tertera sebagai berikut.',0,1);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,'Alamat Pekerjaan : '.$entryjo->mjalmt,0,1);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(60,$space,'Jumlah',0,0);
	$pdf->Cell(320,$space,'Pekerjaan',0,0);
	$pdf->Cell(50,$space,'Gaji/Bulan',0,1);
	$pdf->Cell(60,$space,(integer)$entryjo->jojmltki,0,0);
	$pdf->Cell(320,$space,$jp->jpnama,0,0);
	$pdf->Cell(50,$space,'NT$ '.$entryjo->jpgaji/1,0,1);
	$pdf->Cell(0,$space,'',0,1);

	$pdf->Cell(0,$space,'Syarat-syarat :',0,1);
	$pdf->Cell(0,$space,"1.	Masa Kontrak : " . $waktukerja,0,1);
	$pdf->Cell(0,$space,'2.	Waktu bekerja :Total jam kerja setiap 2 (dua) minggu tidak melebihi 84 (delapan puluh empat) jam, ',0,1);
	$pdf->Cell(120,$space, ' jumlah lembur dalam 1 bulan tidak melebihi 46 jam.',0,1);
	$pdf->Cell(0,$space,'3.	Biaya perjalanan : Jika masa kontrak kerja telah selesai maka tiket ditanggung oleh majikan.',0,1);
	$pdf->Cell(0,$space,'4.	Biaya pengobatan : Menurut hukum yang berlaku di Taiwan',0,1);
	$pdf->Cell(0,$space,'5.	Uang lembur : Menurut hukum yang berlaku di Taiwan',0,1);
	$pdf->Cell(0,$space,'6.	Libur tahunan : Menurut hukum perburuhan di Taiwan (1 tahun ada 7 hari libur)',0,1);
	$pdf->Cell(0,$space,'7.	Asuransi : Menurut hukum yang berlaku di Taiwan',0,1);
	$pdf->Cell(0,$space,'8.	Pajak : Menurut hukum yang berlaku di Taiwan',0,1);
	$pdf->Cell(0,$space,'9.	Masa Percobaan : 40 hari',0,1);
	$pdf->Cell(0,$space,'',0,1);

	$pdf->Cell(0,$space,'���D/Majikan : '.$entryjo->mjnamacn.', '.$entryjo->mjnama,0,1);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,'���} : '.$entryjo->mjalmtcn,0,1);
	$pdf->Cell(0,$space,'Alamat : '.$entryjo->mjalmt,0,1);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'�q��/No. Tel : '.$entryjo->mjtelp,0,1);
}

//$pdf->Text(305,335,' v ');

Barcode::fpdf($pdf, '000000', $bx, $by, 0, 'code39', array('code'=>$code), $bw, $bh);

$pdf->output();
ob_flush();
?>