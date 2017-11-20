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
	$pdf->Cell(0,$space,'電話/No.telp: '.$entryjo->agtelp,0,1,R);
	$pdf->Cell(0,$space,'',0,1);

	$pdf->SetFont('Big5','B',$fs1);
	$pdf->Cell(0,$space,'需 求 函',0,1,C);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'公司名稱 : '.$entryjo->ppnama,0,1);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,'地址 : '.$entryjo->ppalmtkantor,0,1);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'執照號碼 : '.$entryjo->ppijin,0,1);
	$pdf->Cell(0,$space,'電話 : '.$entryjo->pptelp,0,1);
	$pdf->Cell(0,$space,'傳真 : '.$entryjo->ppfax,0,1);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'敬啟者 : ',0,1);
	$pdf->Cell(0,$space,'本公司謹此根據 : '.$entryjo->ejdatefilled.' 所簽訂之授權書要求貴方依下述各項條件招募節選漁工',0,1);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,'工作地點 : '.$entryjo->mjalmtcn,0,1);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'人數    職稱     月薪',0,1);
	$pdf->Cell(0,$space,''.$entryjo->jojmltki.' 人    '.$jp->jpnamacn.'      NT$ '.$entryjo->jpgaji/1,0,1);
	$pdf->Cell(0,$space,'',0,1);

	$pdf->Cell(0,$space,'條件 :',0,1);
	$pdf->Cell(0,$space,'1.	聘僱期限 : '.$entryjo->jomkthn.'年'.$entryjo->jomkbln.'月'.$entryjo->jomkhr.'日',0,1);
	$pdf->Cell(0,$space,'2.	工作時間 : 一星期工作6天,免費提供膳宿',0,1);
	$pdf->Cell(0,$space,'3.	旅  費 : 契約期滿回程機票由雇主負擔',0,1);
	$pdf->Cell(0,$space,'4.	醫療費用 : 依當地勞工法規定辦理',0,1);
	$pdf->Cell(0,$space,'5.	加班給付 : 依台灣勞動基準法規定之',0,1);
	$pdf->Cell(0,$space,'6.	月薪年假 : 依台灣勞動基準法規定之(年假七天)',0,1);
	$pdf->Cell(0,$space,'7.	保  險 : 依台灣政府法律規定之',0,1);
	$pdf->Cell(0,$space,'8.	稅  法 : 根據中華民國稅法',0,1);
	$pdf->Cell(0,$space,'9.	試用期間 : 四十天',0,1);
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

	$pdf->Cell(0,$space,'雇主/Majikan : '.$entryjo->mjnamacn.', '.$entryjo->mjnama,0,1);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,'住址 : '.$entryjo->mjalmtcn,0,1);
	$pdf->Cell(0,$space,'Alamat : '.$entryjo->mjalmt,0,1);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'電話/No. Tel : '.$entryjo->mjtelp,0,1);
} else if ($entryjo->jpid == 2) {
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,$entryjo->agnama,0,1,R);
	$pdf->Cell(0,$space,$entryjo->agnamacn,0,1,R);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,$entryjo->agalmtkantor,0,1,R);
	$pdf->Cell(0,$space,$entryjo->agalmtkantorcn,0,1,R);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'電話/No.telp: '.$entryjo->agtelp,0,1,R);
	$pdf->Cell(0,$space,'',0,1);

	$pdf->SetFont('Big5','B',$fs1);
	$pdf->Cell(0,$space,'需 求 函',0,1,C);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'公司名稱 : '.$entryjo->ppnama,0,1);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,'地址 : '.$entryjo->ppalmtkantor,0,1);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'執照號碼 : '.$entryjo->ppijin,0,1);
	$pdf->Cell(0,$space,'電話 : '.$entryjo->pptelp,0,1);
	$pdf->Cell(0,$space,'傳真 : '.$entryjo->ppfax,0,1);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'敬啟者 : ',0,1);
	$pdf->Cell(0,$space,'本公司謹此根據 : '.$entryjo->ejdatefilled.' 所簽訂之授權書要求貴方依下述各項條件招募節選操作工',0,1);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,'工作地點 : '.$entryjo->mjalmtcn,0,1);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'人數    職稱                      月薪',0,1);
	$pdf->Cell(0,$space,''.$entryjo->jojmltki.' 人     '.$jp->jpnamacn.'      NT$ '.$entryjo->jpgaji/1,0,1);
	$pdf->Cell(0,$space,'',0,1);

	$pdf->Cell(0,$space,'條件 :',0,1);
	$pdf->Cell(0,$space,'1.	聘僱期限 : '.$entryjo->jomkthn.'年'.$entryjo->jomkbln.'月'.$entryjo->jomkhr.'日',0,1);
	$pdf->Cell(0,$space,'2.	工作時間 : 一星期工作6天, 膳宿費用雇主提供, 但每月得從薪資中扣除新台幣 '.number_format($entryjo->joakomodasi, 0, ",",'').'元',0,1);
	$pdf->Cell(0,$space,'3.	旅  費 : 契約期滿回程機票由雇主負擔',0,1);
	$pdf->Cell(0,$space,'4.	醫療費用 : 依當地勞工法規定辦理',0,1);
	$pdf->Cell(0,$space,'5.	加班給付 : 依台灣勞動基準法規定之',0,1);
	$pdf->Cell(0,$space,'6.	月薪年假 : 依台灣勞動基準法規定之(年假七天)',0,1);
	$pdf->Cell(0,$space,'7.	保  險 : 依台灣政府法律規定之',0,1);
	$pdf->Cell(0,$space,'8.	稅  法 : 根據中華民國稅法',0,1);
	$pdf->Cell(0,$space,'9.	試用期間 : 四十天',0,1);
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

	$pdf->Cell(0,$space,'雇主/Majikan : '.$entryjo->mjnamacn.', '.$entryjo->mjnama,0,1);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,'住址 : '.$entryjo->mjalmtcn,0,1);
	$pdf->Cell(0,$space,'Alamat : '.$entryjo->mjalmt,0,1);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'電話/No. Tel : '.$entryjo->mjtelp,0,1);
} else if ($entryjo->jpid == 3) {
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,$entryjo->agnama,0,1,R);
	$pdf->Cell(0,$space,$entryjo->agnamacn,0,1,R);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,$entryjo->agalmtkantor,0,1,R);
	$pdf->Cell(0,$space,$entryjo->agalmtkantorcn,0,1,R);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'電話/No.telp: '.$entryjo->agtelp,0,1,R);
	$pdf->Cell(0,$space,'',0,1);

	$pdf->SetFont('Big5','B',$fs1);
	$pdf->Cell(0,$space,'需 求 函',0,1,C);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'公司名稱 : '.$entryjo->ppnama,0,1);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,'地址 : '.$entryjo->ppalmtkantor,0,1);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'執照號碼 : '.$entryjo->ppijin,0,1);
	$pdf->Cell(0,$space,'電話 : '.$entryjo->pptelp,0,1);
	$pdf->Cell(0,$space,'傳真 : '.$entryjo->ppfax,0,1);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'敬啟者 : ',0,1);
	$pdf->Cell(0,$space,'本公司謹此根據 : '.$entryjo->ejdatefilled.' 所簽訂之授權書要求貴方依下述各項條件招募節選養護機構/醫院',0,1);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,'工作地點 : '.$entryjo->mjalmtcn,0,1);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'人數      職稱                      月薪',0,1);
	$pdf->Cell(0,$space,''.$entryjo->jojmltki.' 人      '.$jp->jpnamacn.'      NT$ '.$entryjo->jpgaji/1,0,1);
	$pdf->Cell(0,$space,'',0,1);

	$pdf->Cell(0,$space,'條件 :',0,1);
	$pdf->Cell(0,$space,'1.	聘僱期限 : '.$entryjo->jomkthn.'年'.$entryjo->jomkbln.'月'.$entryjo->jomkhr.'日',0,1);
	$pdf->Cell(0,$space,'2.	工作時間 : 一星期工作6天, 膳宿費用雇主提供, 但每月得從薪資中扣除新台幣 '.number_format($entryjo->joakomodasi, 0, ",",'').'元',0,1);
	$pdf->Cell(0,$space,'3.	旅  費 : 契約期滿回程機票由雇主負擔',0,1);
	$pdf->Cell(0,$space,'4.	醫療費用 : 依當地勞工法規定辦理',0,1);
	$pdf->Cell(0,$space,'5.	加班給付 : 依台灣勞動基準法規定之',0,1);
	$pdf->Cell(0,$space,'6.	月薪年假 : 依台灣勞動基準法規定之(年假七天)',0,1);
	$pdf->Cell(0,$space,'7.	保  險 : 依台灣政府法律規定之',0,1);
	$pdf->Cell(0,$space,'8.	稅  法 : 根據中華民國稅法',0,1);
	$pdf->Cell(0,$space,'9.	試用期間 : 四十天',0,1);
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

	$pdf->Cell(0,$space,'雇主/Majikan  : '.$entryjo->mjnamacn.', '.$entryjo->mjnama,0,1);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,'住址  : '.$entryjo->mjalmtcn,0,1);
	$pdf->Cell(0,$space,'Alamat  : '.$entryjo->mjalmt,0,1);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'電話/No. Tel  : '.$entryjo->mjtelp,0,1);
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
	$pdf->Cell(0,$space,'電話/No.telp: '.$entryjo->agtelp,0,1,R);
	$pdf->Cell(0,$space,'',0,1);

	$pdf->SetFont('Big5','B',$fs1);
	$pdf->Cell(0,$space,'需 求 函',0,1,C);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'公司名稱 : '.$entryjo->ppnama,0,1);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,'地址 : '.$entryjo->ppalmtkantor,0,1);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'執照號碼 : '.$entryjo->ppijin,0,1);
	$pdf->Cell(0,$space,'電話 : '.$entryjo->pptelp,0,1);
	$pdf->Cell(0,$space,'傳真 : '.$entryjo->ppfax,0,1);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'敬啟者 : ',0,1);
	$pdf->Cell(0,$space,'本公司謹此根據 : '.$entryjo->ejdatefilled.' 所簽訂之授權書要求貴方依下述各項條件招募節選  監護工',0,1);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,'工作地點 : '.$entryjo->mjalmtcn,0,1);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'人數    職稱                      月薪',0,1);
	$pdf->Cell(0,$space,''.$entryjo->jojmltki.' 人    '.$jp->jpnamacn.'                    NT$ '.$entryjo->jpgaji/1,0,1);
	$pdf->Cell(0,$space,'',0,1);

	$pdf->Cell(0,$space,'條件 :',0,1);
	$pdf->Cell(0,$space,'1.	聘僱期限 : '.$entryjo->jomkthn.'年'.$entryjo->jomkbln.'月'.$entryjo->jomkhr.'日',0,1);
	$pdf->Cell(0,$space,'2.	工作時間 : 一星期工作6天,免費提供膳宿',0,1);
	$pdf->Cell(0,$space,'3.	旅  費 : 契約期滿回程機票由雇主負擔',0,1);
	$pdf->Cell(0,$space,'4.	醫療費用 : 依當地勞工法規定辦理',0,1);
	$pdf->Cell(0,$space,'5.	加班給付 : 依台灣勞動基準法規定之',0,1);
	$pdf->Cell(0,$space,'6.	月薪年假 : 依台灣勞動基準法規定之(年假七天)',0,1);
	$pdf->Cell(0,$space,'7.	保  險 : 依台灣政府法律規定之',0,1);
	$pdf->Cell(0,$space,'8.	稅  法 : 根據中華民國稅法',0,1);
	$pdf->Cell(0,$space,'9.	試用期間 : 四十天',0,1);
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

	$pdf->Cell(0,$space,'雇主/Majikan  : '.$entryjo->mjnamacn.', '.$entryjo->mjnama,0,1);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,'住址  : '.$entryjo->mjalmtcn,0,1);
	$pdf->Cell(0,$space,'Alamat  : '.$entryjo->mjalmt,0,1);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'電話/No. Tel  : '.$entryjo->mjtelp,0,1);
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
	$pdf->Cell(0,$space,'電話/No.telp: '.$entryjo->agtelp,0,1,R);
	$pdf->Cell(0,$space,'',0,1);

	$pdf->SetFont('Big5','B',$fs1);
	$pdf->Cell(0,$space,'需 求 函',0,1,C);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'公司名稱 : '.$entryjo->ppnama,0,1);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,'地址 : '.$entryjo->ppalmtkantor,0,1);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'執照號碼 : '.$entryjo->ppijin,0,1);
	$pdf->Cell(0,$space,'電話 : '.$entryjo->pptelp,0,1);
	$pdf->Cell(0,$space,'傳真 : '.$entryjo->ppfax,0,1);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'敬啟者 : ',0,1);
	$pdf->Cell(0,$space,'本公司謹此根據 : '.$entryjo->ejdatefilled.' 所簽訂之授權書要求貴方依下述各項條件招募節選 家庭幫傭',0,1);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,'工作地點 : '.$entryjo->mjalmtcn,0,1);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'人數   職稱              月薪',0,1);
	$pdf->Cell(0,$space,''.$entryjo->jojmltki.' 人    '.$jp->jpnamacn.'      NT$ '.$entryjo->jpgaji/1,0,1);
	$pdf->Cell(0,$space,'',0,1);

	$pdf->Cell(0,$space,'條件 :',0,1);
	$pdf->Cell(0,$space,'1.	聘僱期限 : '.$entryjo->jomkthn.'年'.$entryjo->jomkbln.'月'.$entryjo->jomkhr.'日',0,1);
	$pdf->Cell(0,$space,'2.	工作時間 : 一星期工作6天,免費提供膳宿',0,1);
	$pdf->Cell(0,$space,'3.	旅  費 : 契約期滿回程機票由雇主負擔',0,1);
	$pdf->Cell(0,$space,'4.	醫療費用 : 依當地勞工法規定辦理',0,1);
	$pdf->Cell(0,$space,'5.	加班給付 : 依台灣勞動基準法規定之',0,1);
	$pdf->Cell(0,$space,'6.	月薪年假 : 依台灣勞動基準法規定之(年假七天)',0,1);
	$pdf->Cell(0,$space,'7.	保  險 : 依台灣政府法律規定之',0,1);
	$pdf->Cell(0,$space,'8.	稅  法 : 根據中華民國稅法',0,1);
	$pdf->Cell(0,$space,'9.	試用期間 : 四十天',0,1);
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

	$pdf->Cell(0,$space,'雇主/Majikan  : '.$entryjo->mjnamacn.', '.$entryjo->mjnama,0,1);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,'住址  : '.$entryjo->mjalmtcn,0,1);
	$pdf->Cell(0,$space,'Alamat  : '.$entryjo->mjalmt,0,1);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'電話/No. Tel  : '.$entryjo->mjtelp,0,1);
} else if ($entryjo->jpid == 6) {
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,$entryjo->agnama,0,1,R);
	$pdf->Cell(0,$space,$entryjo->agnamacn,0,1,R);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,$entryjo->agalmtkantor,0,1,R);
	$pdf->Cell(0,$space,$entryjo->agalmtkantorcn,0,1,R);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'電話/No.telp: '.$entryjo->agtelp,0,1,R);
	$pdf->Cell(0,$space,'',0,1);

	$pdf->SetFont('Big5','B',$fs1);
	$pdf->Cell(0,$space,'需 求 函',0,1,C);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'公司名稱 : '.$entryjo->ppnama,0,1);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,'地址 : '.$entryjo->ppalmtkantor,0,1);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'執照號碼 : '.$entryjo->ppijin,0,1);
	$pdf->Cell(0,$space,'電話 : '.$entryjo->pptelp,0,1);
	$pdf->Cell(0,$space,'傳真 : '.$entryjo->ppfax,0,1);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'敬啟者 : ',0,1);
	$pdf->Cell(0,$space,'本公司謹此根據 : '.$entryjo->ejdatefilled.' 所簽訂之授權書要求貴方依下述各項條件招募節選操作工',0,1);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,'工作地點 : '.$entryjo->mjalmtcn,0,1);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'人數    職稱                      月薪',0,1);
	$pdf->Cell(0,$space,''.$entryjo->jojmltki.' 人     '.$jp->jpnamacn.'      NT$ '.$entryjo->jpgaji/1,0,1);
	$pdf->Cell(0,$space,'',0,1);

    if($entryjo->jotime==1){$waktukerjacn = '1.5 至 2 年'; $waktukerja = '1.5 tahun - 2 tahun';}
	else{$waktukerjacn = '2 至 3 年'; $waktukerja = '2 tahun - 3 tahun';}
	$pdf->Cell(0,$space,'條件 :',0,1);
	$pdf->Cell(0,$space,'1.	聘僱期限 : '. $waktukerjacn,0,1);
	$pdf->Cell(0,$space,'2.	每二週工作總時數不得超過84小時。1天工作不得超過12個小時，延長工作時間1個月不超過46個小時。',0,1);
	$pdf->Cell(0,$space,'3.	旅  費 : 契約期滿回程機票由雇主負擔',0,1);
	$pdf->Cell(0,$space,'4.	醫療費用 : 依當地勞工法規定辦理',0,1);
	$pdf->Cell(0,$space,'5.	加班給付 : 依台灣勞動基準法規定之',0,1);
	$pdf->Cell(0,$space,'6.	月薪年假 : 依台灣勞動基準法規定之(年假七天)',0,1);
	$pdf->Cell(0,$space,'7.	保  險 : 依台灣政府法律規定之',0,1);
	$pdf->Cell(0,$space,'8.	稅  法 : 根據中華民國稅法',0,1);
	$pdf->Cell(0,$space,'9.	試用期間 : 四十天',0,1);
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

	$pdf->Cell(0,$space,'雇主/Majikan : '.$entryjo->mjnamacn.', '.$entryjo->mjnama,0,1);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,'住址 : '.$entryjo->mjalmtcn,0,1);
	$pdf->Cell(0,$space,'Alamat : '.$entryjo->mjalmt,0,1);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'電話/No. Tel : '.$entryjo->mjtelp,0,1);
}

//$pdf->Text(305,335,' v ');

Barcode::fpdf($pdf, '000000', $bx, $by, 0, 'code39', array('code'=>$code), $bw, $bh);

$pdf->output();
ob_flush();
?>
