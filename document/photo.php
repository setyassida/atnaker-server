<?
//ob_start();
require_once('./pdf/lib/header.php');

if(isset($_REQUEST['id']))
	$enid = base64UrlDecode($_REQUEST['id']);
else
	exit("Not Exist");//$enid = '24';
	
if(isset($_REQUEST['pict'])) {
	$pict = $_REQUEST['pict'];
	
	// $sql = "SELECT enfotoptgs1, enfotoptgs2 FROM entitas WHERE enid = $id";
	// $result = mysql_query($sql) or die($messages['err_query']);
	// $row = mysql_fetch_array($result,MYSQL_ASSOC);
	// $fotoptgs1 = $row['enfotoptgs1'];
	// $fotoptgs2 = $row['enfotoptgs2'];	

	$agensi = Entitas::find($enid);

    // outputing image
	if ($pict == 1) {
		// outputing HTTP headers
		header('Content-Length: '.strlen($agensi->enfotoptgs1));
		header("Content-type: image/jpg");
		echo $agensi->enfotoptgs1;
	} else if ($pict == 2) {
		// outputing HTTP headers
		header('Content-Length: '.strlen($agensi->enfotoptgs2));
		header("Content-type: image/jpg");
		echo $agensi->enfotoptgs2;
	} else if ($pict == 0) {
		// outputing HTTP headers
		header('Content-Length: '.strlen($agensi->enfotopngjwb));
		header("Content-type: image/jpg");
		echo $agensi->enfotopngjwb;
	}
	
//	die();
}
//ob_flush();
?>
