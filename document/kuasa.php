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
	$pdf->Cell(0,$space,'電話/No.telp : '.$entryjo->agtelp,0,1,R);
	$pdf->Cell(0,$space,'',0,1);

	$pdf->SetFont('Big5','B',$fs1);
	$pdf->Cell(0,$space,'授 權 書',0,1,C);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'雇主 : '.$entryjo->mjnamacn,0,1);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,'地址 : '.$entryjo->mjalmtcn,0,1);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'公司名稱 : '.$entryjo->ppnama,0,1);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,'地址 : '.$entryjo->ppalmtkantor,0,1);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'執照號碼: '.$entryjo->ppijin,0,1);
	$pdf->Cell(0,$space,'電話 : '.$entryjo->pptelp,0,1);
	$pdf->Cell(0,$space,'傳真 : '.$entryjo->ppfax,0,1);
	$pdf->Cell(0,$space,'',0,1);

	$pdf->Cell(0,$space,'正式成為本公司合法委託人，以協助本公司在印尼招募'.$jp->jpnamacn.'來台工作，並遵照印',0,1);
	$pdf->Cell(0,$space,'尼法規填寫一切所需文件及聘僱契約，並安排其護照於當地使領館及有關單位根據核准函號',0,1);
	$pdf->Cell(0,$space,'碼勞職外字第：'.$entryjo->joclano.' 號,日期：'.$entryjo->joclatgl.' ，申請簽證，以協助勞工到達工作地點',0,1);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'謹此附上僱傭勞動契約以便作業',0,1);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'謹此証明此份文件之簽署完成於：台北，中華民國',0,1);
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
	$pdf->Cell(0,$space,'雇主/Majikan:'.$entryjo->mjnamacn.','.$entryjo->mjnama,0,1);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,'住址:'.$entryjo->mjalmtcn,0,1);
	$pdf->Cell(0,$space,'Alamat:'.$entryjo->mjalmt,0,1);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'電話/No. Tel:'.$entryjo->mjtelp,0,1);
} else if ($entryjo->jpid == 2) {	
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,$entryjo->agnama,0,1,R);
	$pdf->Cell(0,$space,$entryjo->agnamacn,0,1,R);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,$entryjo->agalmtkantor,0,1,R);
	$pdf->Cell(0,$space,$entryjo->agalmtkantorcn,0,1,R);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'電話/No.telp : '.$entryjo->agtelp,0,1,R);
	$pdf->Cell(0,$space,'',0,1);

	$pdf->SetFont('Big5','B',$fs1);
	$pdf->Cell(0,$space,'授 權 書',0,1,C);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'雇主 : '.$entryjo->mjnamacn,0,1);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,'地址 : '.$entryjo->mjalmtcn,0,1);
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

	$pdf->Cell(0,$space,'正式成為本公司合法委託人，以協助本公司在印尼招募'.$entryjo->joposisicn.'來台工作，並遵照印',0,1);
	$pdf->Cell(0,$space,'尼法規填寫一切所需文件及聘僱契約，並安排其護照於當地使領館及有關單位根據核准函號',0,1);
	$pdf->Cell(0,$space,'碼勞職外字第： '.$entryjo->joclano.' 號,日期： '.$entryjo->joclatgl.' ，申請簽證，以協助勞工到達工作地點',0,1);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'謹此附上僱傭勞動契約以便作業',0,1);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'謹此証明此份文件之簽署完成於：台北，中華民國',0,1);
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
	$pdf->Cell(0,$space,'雇主/Majikan : '.$entryjo->mjnamacn.','.$entryjo->mjnama,0,1);
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
	$pdf->Cell(0,$space,'電話/No.telp : '.$entryjo->agtelp,0,1,R);
	$pdf->Cell(0,$space,'',0,1);

	$pdf->SetFont('Big5','B',$fs1);
	$pdf->Cell(0,$space,'授 權 書',0,1,C);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'雇主 : '.$entryjo->mjnamacn,0,1);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,'地址 : '.$entryjo->mjalmtcn,0,1);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'公司名稱 : '.$entryjo->ppnama,0,1);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,'地址 : '.$entryjo->ppalmtkantor,0,1);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'執照號碼: '.$entryjo->ppijin,0,1);
	$pdf->Cell(0,$space,'電話 : '.$entryjo->pptelp,0,1);
	$pdf->Cell(0,$space,'傳真 : '.$entryjo->ppfax,0,1);
	$pdf->Cell(0,$space,'',0,1);

	$pdf->Cell(0,$space,'正式成為本公司合法委託人，以協助本公司在印尼招募'.$jp->jpnamacn.'類來台工作，並遵照印',0,1);
	$pdf->Cell(0,$space,'尼法規填寫一切所需文件及聘僱契約，並安排其護照於當地使領館及有關單位根據核准函號',0,1);
	$pdf->Cell(0,$space,'碼勞職外字第： '.$entryjo->joclano.' 號,日期： '.$entryjo->joclatgl.' ，申請簽證，以協助勞工到達工作地點',0,1);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'謹此附上僱傭勞動契約以便作業',0,1);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'謹此証明此份文件之簽署完成於：台北，中華民國',0,1);
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
	$pdf->Cell(0,$space,'雇主/Majikan : '.$entryjo->mjnamacn.','.$entryjo->mjnama,0,1);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,'住址 : '.$entryjo->mjalmtcn,0,1);
	$pdf->Cell(0,$space,'Alamat : '.$entryjo->mjalmt,0,1);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'電話/No. Tel : '.$entryjo->mjtelp,0,1);
} else if ($entryjo->jpid == 4) {
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,$entryjo->agnama,0,1,R);
	$pdf->Cell(0,$space,$entryjo->agnamacn,0,1,R);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,$entryjo->agalmtkantor,0,1,R);
	$pdf->Cell(0,$space,$entryjo->agalmtkantorcn,0,1,R);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'電話/No.telp : '.$entryjo->agtelp,0,1,R);
	$pdf->Cell(0,$space,'',0,1);

	$pdf->SetFont('Big5','B',$fs1);
	$pdf->Cell(0,$space,'授 權 書',0,1,C);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'雇主 : '.$entryjo->mjnamacn,0,1);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,'地址 : '.$entryjo->mjalmtcn,0,1);
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

	$pdf->Cell(0,$space,'正式成為本公司合法委託人，以協助本公司在印尼招募'.$jp->jpnamacn.'來台工作，並遵照印',0,1);
	$pdf->Cell(0,$space,'尼法規填寫一切所需文件及聘僱契約，並安排其護照於當地使領館及有關單位根據核准函號',0,1);
	$pdf->Cell(0,$space,'碼勞職外字第： '.$entryjo->joclano.' 號,日期： '.$entryjo->joclatgl.' ，申請簽證，以協助勞工到達工作地點',0,1);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'謹此附上僱傭勞動契約以便作業',0,1);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'謹此証明此份文件之簽署完成於：台北，中華民國',0,1);
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
	$pdf->Cell(0,$space,'雇主/Majikan : '.$entryjo->mjnamacn.','.$entryjo->mjnama,0,1);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,'住址 : '.$entryjo->mjalmtcn,0,1);
	$pdf->Cell(0,$space,'Alamat : '.$entryjo->mjalmt,0,1);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'電話/No. Tel : '.$entryjo->mjtelp,0,1);
} else if ($entryjo->jpid == 5) {	
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
	$pdf->Cell(0,$space,'授 權 書',0,1,C);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'雇主 : '.$entryjo->mjnamacn,0,1);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,'地址 : '.$entryjo->mjalmtcn,0,1);
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

	$pdf->Cell(0,$space,'正式成為本公司合法委託人，以協助本公司在印尼招募看護工/'.$jp->jpnamacn.'來台工作，並遵照印',0,1);
	$pdf->Cell(0,$space,'尼法規填寫一切所需文件及聘僱契約，並安排其護照於當地使領館及有關單位根據核准函號',0,1);
	$pdf->Cell(0,$space,'碼勞職外字第： '.$entryjo->joclano.' 號,日期： '.$entryjo->joclatgl.' ，申請簽證，以協助勞工到達工作地點',0,1);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'謹此附上僱傭勞動契約以便作業',0,1);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'謹此証明此份文件之簽署完成於：台北，中華民國',0,1);
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
	$pdf->Cell(0,$space,'雇主/Majikan : '.$entryjo->mjnamacn.','.$entryjo->mjnama,0,1);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,'住址 : '.$entryjo->mjalmtcn,0,1);
	$pdf->Cell(0,$space,'Alamat : '.$entryjo->mjalmt,0,1);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'電話/No. Tel : '.$entryjo->mjtelp,0,1);
} else if ($entryjo->jpid == 6) {	
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,$entryjo->agnama,0,1,R);
	$pdf->Cell(0,$space,$entryjo->agnamacn,0,1,R);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,$entryjo->agalmtkantor,0,1,R);
	$pdf->Cell(0,$space,$entryjo->agalmtkantorcn,0,1,R);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'電話/No.telp : '.$entryjo->agtelp,0,1,R);
	$pdf->Cell(0,$space,'',0,1);

	$pdf->SetFont('Big5','B',$fs1);
	$pdf->Cell(0,$space,'授 權 書',0,1,C);
	$pdf->SetFont('Big5','',$fs2);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'雇主 : '.$entryjo->mjnamacn,0,1);
	$pdf->SetFont('Big5','',8);
	$pdf->Cell(0,$space,'地址 : '.$entryjo->mjalmtcn,0,1);
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

	$pdf->Cell(0,$space,'正式成為本公司合法委託人，以協助本公司在印尼招募營造工來台工作，並遵照印',0,1);
	$pdf->Cell(0,$space,'尼法規填寫一切所需文件及聘僱契約，並安排其護照於當地使領館及有關單位根據核准函號',0,1);
	$pdf->Cell(0,$space,'碼勞職外字第： '.$entryjo->joclano.' 號,日期： '.$entryjo->joclatgl.' ，申請簽證，以協助勞工到達工作地點',0,1);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'謹此附上僱傭勞動契約以便作業',0,1);
	$pdf->Cell(0,$space,'',0,1);
	$pdf->Cell(0,$space,'謹此証明此份文件之簽署完成於：台北，中華民國',0,1);
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
	$pdf->Cell(0,$space,'雇主/Majikan : '.$entryjo->mjnamacn.','.$entryjo->mjnama,0,1);
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
