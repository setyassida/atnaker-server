<?php
if(isset($_REQUEST['id']) && isset($_REQUEST['x'])) {
	//$joid = base64UrlDecode($_REQUEST['id']);
	$id = escape($_REQUEST['id'], false);
	$x = escape(base64UrlDecode($_REQUEST['x']), false);
} else
	die("Not Exist");

$entryjo = EntryJO::find($id);
$jp = Jenispekerjaan::find($entryjo->jpid);
	
$tki = Tki::find($id,$x);
$code = $tki->tkbc;
$fs1 = 7;
$fs2 = 9;

if (!$entryjo || !$tki || !$jp)
	die("Not Exist");
	
switch($tki->tkjk) {
	case "L":
		$tki->tkjk = "Laki-laki"; break;
	case "P":
		$tki->tkjk = "Perempuan"; break;
}
?>
