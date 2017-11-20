<?
define('FPDF_FONTPATH','./pdf/font/');
//require_once('data.php');
require_once('../config.php');
require_once('Barcode.php');
require_once('chinese.php');
require_once('pdftable.inc.php');
require_once('color.inc.php');
require_once('htmlparser.inc.php');

// database configuration
$db_host = "localhost";
//$db_host = "localhost";
$db_user = "endorsement";
$db_password ="kdei";
$db_database = "endorsement3";
$fs = 12;
$bx = 450;
$by = 810;
$bw = 1.54;
$bh = 27;
$link = mysql_connect($db_host, $db_user, $db_password) or die($messages['err_connect_db']); 
mysql_select_db($db_database ) or die($messages['err_select_db']);

mysql_query("SET character_set_client=big5", $link);
mysql_query("SET character_set_connection=big5", $link);
mysql_query("SET character_set_results=big5", $link);

function TextWithLimit($pdf, $msg, $limit) {
	$chunk = explode(" ", $msg);
	$str = array();
	$ctr = 0;
	$tmp = '';
	
	for ($i=0; $i<count($chunk); $i++) {
		if ($pdf->GetStringWidth($tmp.$chunk[$i].' ') < $limit) {
			$tmp .= $chunk[$i].' ';
		} else {
			$str[$ctr++] = $tmp;
			$tmp = $chunk[$i].' ';
		}
	}
	$str[$ctr] = $tmp;
	
	return $str;
}

class Tki
{
	/*public static function lama($deid) {
		//$query= "select * from tki where joid = '$joid' and tkstate = 99 and tkusulganti = 1";
		$query= "select * from tki where deid = '$deid' and tkstate = 99 and tkusulganti = 1";
		$r = mysql_query($query);
		//die($r);
		$result = array();
		$i = 0;
		while($row = mysql_fetch_object($r)) {
			$result[$i] = $row;
			$i++;
		}
		return $result;
	}
	
	public static function baru($deid) {
		//$query= "select * from tki where joid = '$joid' and tkstate = 2 and tkusulganti = 2";
		$query= "select * from tki where deid = '$deid' and tkstate = 2 and tkusulganti = 2";
		$r = mysql_query($query);
		//die($r);
		$result = array();
		$i = 0;
		while($row = mysql_fetch_object($r)) {
			$result[$i] = $row;
			$i++;
		}
		return $result;
	}*/

	public static function find($id, $x) 
	{
		$query= "select * from tki tk JOIN entryjo ej ON ej.ejid = tk.ejid where tk.tkbc = '$x' AND ej.ejtoken = '$id'";
		$r = mysql_query($query);
		//die($r);
		$row = mysql_fetch_object($r);

		return $row;
	}
	
	public static function get($tkid) 
	{
		$query= "select * from tki tk WHERE tk.tkid = $tkid";
		$r = mysql_query($query);
		//die($r);
		$row = mysql_fetch_object($r);

		return $row;
	}
}

class EntryJO
{
	public static function find($id) 
	{
		$query= "select * from entryjo where ejtoken = '$id'";
		$r = mysql_query($query);
		//die($r);
		$row = mysql_fetch_object($r);
		$row->mjnama = htmlspecialchars_decode($row->mjnama);
		$row->agnama = htmlspecialchars_decode($row->agnama);
		$row->ppnama = htmlspecialchars_decode($row->ppnama);

		return $row;
	}
}

/*class Entitas
{
	public static function find($id) 
	{
		$query= "select * from entitas where enid = '$id'";
		$r = mysql_query($query);
		//die($r);
		$row = mysql_fetch_object($r);

		return $row;
	}
}

class Joborder
{
	public static function find($id) 
	{
		$query= "select * from joborder where joid = '$id'";
		$r = mysql_query($query);
		//die($r);
		$row = mysql_fetch_object($r);

		return $row;
	}
}

class Majikan
{
	public static function joid($id) 
	{
		$query= "select * from majikan where joid = '$id'";
		$r = mysql_query($query);
		//die($r);
		$row = mysql_fetch_object($r);

		return $row;
	}
}*/
class Jenispekerjaan
{
	public static function find($id) 
	{
		$query= "select * from jenispekerjaan where jpid = '$id'";
		$r = mysql_query($query);
		$row = mysql_fetch_object($r);

		return $row;
	}
}

class Secuser
{
	public static function oid($id) 
	{
		$query= "select * from secuser where oid = '$id'";
		$r = mysql_query($query);
		$row = mysql_fetch_object($r);

		return $row;
	}
}

class Secorg
{
	public static function find($id) 
	{
		$query= "select * from secorg where oid = '$id'";
		$r = mysql_query($query);
		$row = mysql_fetch_object($r);

		return $row;
	}
}

/*class Demand {
	public static function find($id) 
	{
		$query= "select * from demand where deid = '$id'";
		$r = mysql_query($query);
		$row = mysql_fetch_object($r);

		return $row;
	}
}*/

?>
