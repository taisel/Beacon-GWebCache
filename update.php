<!DOCTYPE html
PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta name="robots" content="noindex,nofollow,noarchive" />
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>Beacon Cache II Updater</title>
		<style type="text/css">
			<!--
			body {
				background-color: #FFFFFF;
				font-family: Times New Roman, Palatino Linotype, Book Antiqua, Palatino, serif, sans-serif, Arial, Helvetica;
			}
			#title {
				text-align: center;
			}
			#title {
				margin: auto;
			}
			#title {
				width: 95%;
				background-color: #DEDEFF;
			}
			#title {
				border-color: #FFCCCC;
				border-width: thin;
				border-style: solid;
			}
			#title:hover {
				background-color: #D6D6F7;
			}
			a.title_text:link, a.title_text:visited, a.title_text:hover, a.title_text:active {
				color: #FF8888;
			}
			div.updating {
				margin-top: 25px;
				border-style: solid;
				border-width: 1px;
				color: rgb(100, 100, 100);
				font-weight: bold;
				padding-left: 10px;
				text-align: left;
				width: 95%;
				margin-left: auto;
				margin-right: auto;
			}
			div div {
				text-align: center;
				font-size: x-large;
				color: rgb(130, 130, 130);
				text-decoration: underline;
				margin-bottom: 10px;
			}
			div span {
				padding-top: 10px;
				padding-bottom: 5px;
				display: block;
			}
			div span + span {
				padding-top: 0px;
			}
			#good_update {
				border-color: rgb(0, 255, 0);
				background-color: rgb(200, 255, 200);
			}
			#bad_update {
				border-color: rgb(255, 0, 0);
				background-color: rgb(255, 200, 200);
			}
			-->
		</style>
	</head>
	<body>
		<table id="title">
			<tr>
				<td>
					<a href="http://sourceforge.net/projects/beaconcache/" class="title_text" target="_blank">Beacon Cache II Updater</a>
				</td>
			</tr>
		</table>
<?php
class updater {
	public $errors;
	public $VERSION;
	public $new_version;
	private $part;
	function __construct() {
		$this->errors = array();
		if (!function_exists('fsockopen')) {
			$this->errors[] = 'Could not open a socket to the server.';
		}
		elseif (!file_exists('keep_for_updates.php')) {
			$this->errors[] = 'Data saved from the installer not found.';
		}
		else {
			$this->check_stored();
		}
	}
	public function bool_cleanse($value) {
		$value = ($value === '') ? 'false' : 'true';
		return $value;
	}
	public function int_cleanse($value) {
		$value = (int) $value;
		if (strlen($value) == 0) {
			$value = '0';
		}
		return $value;
	}
	public function settings_prep_single($ID) {
		return ((!empty($_POST[$ID])) ? "\t'".implode("',\n\t\t'", explode( ',', $_POST[$ID])).'\'' : '');
	}
	public function settings_prep_double($ID) {
		return ((!empty($_POST[$ID])) ? "\t'".implode("',\n\t\t'", explode( ',', implode('\'=>\'', explode('=>', $_POST[$ID])))).'\'' : '');
	}
	private function check($filename) {
		if (!file_exists($filename)) {
			$file = fopen($filename, 'w');
			fclose($file);
		}
		return $filename;
	}
	private function write($filename, $data) {
		$file = fopen($this->check($filename), 'r+b');
		flock($file, LOCK_EX);
		ftruncate($file, 0);
		fwrite($file, $data);
		flock($file, LOCK_UN);
		fclose($file);
	}
	private function check_stored() {
		include('keep_for_updates.php');
		$saved_data = unserialize(htmlspecialchars_decode($serialized, ENT_QUOTES));
		if (count($saved_data) != 2) {
			$this->errors[] = 'Data saved from the installer is corrupted.';
			return;
		}
		$_POST = $saved_data[0];
		$this->VERSION = $saved_data[1];
		$this->checkout();
	}
	private function do_settings_save() {
		$serialized_data = array(
			$_POST,
			$this->new_version
		);
		$this->write('keep_for_updates.php', '<?php $serialized = \''.htmlspecialchars(serialize($serialized_data), ENT_QUOTES).'\'; ?>');
	}
	private function checkout() {
		$contents = '';
		$installer_for_me = false;
		if ($socket = @fsockopen('beacon.grantgalitz.com', 80, $errno, $errstr, 10)) {
			$writing = "GET /latest_upd.txt HTTP/1.0\r\n";
			$writing .= "Host: beacon.grantgalitz.com\r\n";
			$writing .= "User-Agent: Beacon Cache II Updater\r\n";
			$writing .= "Connection: Close\r\n\r\n";
			fwrite($socket, $writing);
			while(!feof($socket)) {
				$line = fgets($socket);
				$contents .= htmlentities($line);
				if (empty($line)) {
					continue;
				}
				elseif (strpos($line, '#!#') === 0) {
					if (isset($this->new_version)) {
						continue;
					}
					$this->new_version = substr(trim($line), 3);
					if ($this->VERSION == $this->new_version) {
						$installer_for_me = true;
						$this->errors[] = 'Already up-to-date (New: '.$this->new_version.' / Old: '.$this->VERSION.')';
					}
				}
				elseif (isset($this->new_version)) {
					if (strpos($line, '#?#') === 0) {
						if ($installer_for_me) {
							continue;
						}
						elseif ($this->VERSION == substr(trim($line), 3)) {
							$installer_for_me = true;
						}
					}
					else {
						$this->part .= $line;
					}
				}
			}
			fclose($socket);
			if (!$installer_for_me) {
				$this->errors[] = 'Update is incompatible with the current existing install.';
			}
		}
		else {
			$this->errors[] = 'Update site is unreachable (beacon.grantgalitz.com).';
		}
		if (isset($this->part) && empty($this->errors)) {
			$this->write('gwc.php' , $this->format_settings().$this->part);
			$this->do_settings_save();
		}
		elseif (!isset($this->part)) {
			$this->errors[] = 'Update process error.';
			$this->errors[] = '<pre>'.$contents.'</pre>';
		}
	}
	public function format_settings() {
		return ('<?php'."\n".'class settings {'."\n\t"."const CACHE_NAME = 'Beacon Cache II';"."\n\t"."const CACHE_VERSION = '".$this->new_version."';"."\n\t"."const CACHE_VENDOR = 'BCII';"."\n\t".'/////////////////////////////////////////////BEGIN Settings'."\n\t".
		'const STORAGE = \''.$_POST['STORAGE'].'\';				//Storage system type - either "mysql" or "flat" (flat is just regular .dat files). '."\n\t".
		'const FOLDER = \''.$_POST['FOLDER'].'\';				//Folder name for the GWC data.'."\n//////If you're using SQL instead of flat-file:\n\t".
		'const DBA_ADDRESS = \''.$_POST['DBA_ADDRESS'].'\';				//SQL server address.'."\n\t".
		'const DBA_USERNAME = \''.$_POST['DBA_USERNAME'].'\';			//SQL server username.'."\n\t".
		'const DBA_PASSWORD = \''.$_POST['DBA_PASSWORD'].'\';			//SQL server password.'."\n\t".
		'const DBA_NAME = \''.$_POST['DBA_NAME'].'\';			//SQL server database for Beacon.'."\n\t".
		'const STATS_CLIENT_FLUSH = '.$this->int_cleanse($_POST['STATS_CLIENT_FLUSH']).';		//Multiple of STATS_THROTTLE for which to clear the clients table.'."\n//////END SQL Settings\n\t".
		'const CACHE_ADDRESS = \''.$_POST['CACHE_ADDRESS'].'\';			//If included,  this address will be enforced (If not, then multiple addresses of your cache are possible).'."\n\t".
		'const HOSTS_IN = '.$this->int_cleanse($_POST['HOSTS_IN']).';				//How many hosts to store.'."\n\t".
		'const HOSTS_OUT = '.$this->int_cleanse($_POST['HOSTS_OUT']).';				//How many hosts to output.'."\n\t".
		'const URLS_IN = '.$this->int_cleanse($_POST['URLS_IN']).';					//How many URLs to store.'."\n\t".
		'const URLS_OUT = '.$this->int_cleanse($_POST['URLS_OUT']).';				//How many URLs to output.'."\n\t".
		'const BANNED_URLS_IN = '.$this->int_cleanse($_POST['BANNED_URLS_IN']).';			//How many temp. banned URLs to keep track of per network.'."\n\t".
		'const ENABLE_V1 = '.$this->bool_cleanse($_POST['ENABLE_V1']).';				//Shall the cache accept GWC specification 1 requests?'."\n\t".
		'const ENABLE_V2 = '.$this->bool_cleanse($_POST['ENABLE_V2']).';				//Shall the cache accept GWC specification 2 requests?'."\n\t".
		'const ENABLE_V3 = '.$this->bool_cleanse($_POST['ENABLE_V3']).';				//Shall the cache accept GWC XML requests?'."\n\t".
		'const SHUFFLE_HOSTS = '.$this->bool_cleanse($_POST['SHUFFLE_HOSTS']).';			//Shall the cache shuffle hosts on output?'."\n\t".
		'const SHUFFLE_URLS = '.$this->bool_cleanse($_POST['SHUFFLE_URLS']).';			//Shall the cache shuffle URLs on output?'."\n\t".
		'const EXPIRE_HOSTS = '.$this->int_cleanse($_POST['EXPIRE_HOSTS']).';			//At how many hours shall a host expire?'."\n\t".
		'const EXPIRE_URLS = '.$this->int_cleanse($_POST['EXPIRE_URLS']).';				//At how many hours shall a URL expire?'."\n\t".
		'const EXPIRE_BANNED_URLS = '.$this->int_cleanse($_POST['EXPIRE_BANNED_URLS']).';		//At how many hours shall a temp. banned URL expire?'."\n\t".
		'const DEFAULT_NET = '.'\''.$_POST['DEFAULT_NET'].'\''.';		//The defaulting network of this cache (This really should not be changed to prevent the leakage of Gnutella onto another network).'."\n\t".
		'const FSOCKOPEN = '.$this->bool_cleanse($_POST['FSOCKOPEN']).';				//Can this cache use sockets?'."\n\t".
		'const IP_ALT_CACHES = '.$this->bool_cleanse($_POST['IP_ALT_CACHES']).';				//Shall this cache accept IP addresses as URLs?'."\n\t".
		'const NON_HTTP = '.$this->bool_cleanse($_POST['NON_HTTP']).';				//Can this cache connect on ports other than port 80 for sockets?'."\n\t".
		'const RETRY_URLS = '.$this->bool_cleanse($_POST['RETRY_URLS']).';			//Can the cache retry expired URLs?'."\n\t".
		'const RETRY_BAD_URLS = '.$this->bool_cleanse($_POST['RETRY_BAD_URLS']).';		//Can the cache retry expired bad URLs?'."\n\t".
		'const TIMEOUT = '.$this->int_cleanse($_POST['TIMEOUT']).';					//Timeout for the sockets.'."\n\t".
		'const WEB_FRONT = '.$this->bool_cleanse($_POST['WEB_FRONT']).';				//Shall a web front be displayed?'."\n\t".
		'const BLOCK_NO_USER_AGENT = '.$this->bool_cleanse($_POST['BLOCK_NO_USER_AGENT']).';	//Shall the cache block clients with no user agent header from updating an IP?'."\n\t".
		'const BLOCK_NO_USER_AGENT_ALL = '.$this->bool_cleanse($_POST['BLOCK_NO_USER_AGENT_ALL']).';	//Shall the cache block clients with no user agent header completely?'."\n\t".
		'const WEBFRONT_URL_ADDS = '.$this->bool_cleanse($_POST['WEBFRONT_URL_ADDS']).';		//Shall the cache accept URL adds through the web front?'."\n\t".
		'const ENABLE_HIT_STATS = '.$this->bool_cleanse($_POST['ENABLE_HIT_STATS']).';			//Shall the cache keep track of per-hit (number tracking) statistics? (*Disabling it reduces the load by a lot!*)'."\n\t".
		'const ENABLE_CLIENT_STATS = '.$this->bool_cleanse($_POST['ENABLE_CLIENT_STATS']).';			//Shall the cache keep track of per-client (name tracking) statistics? (*Disabling it reduces the load by a lot!*)'."\n\t".
		'const STATS_THROTTLE = '.$this->int_cleanse($_POST['STATS_THROTTLE']).';		//How many clients shall be kept track of at any one time in the stats?'."\n\t".
		'const ADD_URL_TO_SHAREAZA = '.$this->bool_cleanse($_POST['ADD_URL_TO_SHAREAZA']).';	//This adds the extra link to each URL to let the user have the URL auto-entered into Shareaza.'."\n\t".
		'const CHECKS_ALLOWED = '.$this->bool_cleanse($_POST['CHECKS_ALLOWED']).';	//This adds the extra link to each URL to let the user see a detailed debug of the selected cache.'."\n\t".
		'const UPDATE_SELF_TO_REMOTE = '.$this->bool_cleanse($_POST['UPDATE_SELF_TO_REMOTE']).';	//Shall the cache update self-url to other GWCs?'."\n\t".
		'const LOG_UPDATE_WARNINGS = '.$this->bool_cleanse($_POST['LOG_UPDATE_WARNINGS']).';	//Shall the cache log update warnings generated in the update class?'."\n\t".
		'const LOG_BAN_WARNINGS = '.$this->bool_cleanse($_POST['LOG_BAN_WARNINGS']).';		//Shall the cache log ban warnings generated in the client check class?'."\n\t".
		'const LOG_SPLIT_SIZE = '.$this->int_cleanse($_POST['LOG_SPLIT_SIZE']).';		//The size of a log file in bytes at which a new one is generated.'."\n\t".
		'public $NETWORKS = array(			//Configure here to enable certain networks to bootstrap from this cache. (**Must be lower-case!**)'."\n\t".
			$this->settings_prep_single('NETWORKS').
		');'."\n\t".
		'public $BANNED = array(				//Banned IPs configured here.'."\n\t".
			$this->settings_prep_single('BANNED').
		');'."\n\t".
		'public $VENDOR_CODE_BAN = array(	//Vendor code bans configured here.'."\n\t".
			$this->settings_prep_single('VENDOR_CODE_BAN').
		');'."\n\t".
		'public $VENDOR_CODE_IP_UPDATE_BAN = array(	//Block certain vendor codes from updating IP addresses here.'."\n\t".
			$this->settings_prep_single('VENDOR_CODE_IP_UPDATE_BAN').
		');'."\n\t".
		'public $BANNED_URLS = array(		//Used to ban bad URLs on a permanent basis...'."\n\t".
			$this->settings_prep_single('BANNED_URLS').
		');'."\n\t".
		'public $USER_AGENT_BAN = array(		//User agent bans configured here.'."\n\t".
			$this->settings_prep_single('USER_AGENT_BAN').
		');'."\n\t".
		'public $BROWSER_DETECT = array(		//Browser detection for IP banning configured here.'."\n\t".
			$this->settings_prep_single('BROWSER_DETECT').
		');'."\n\t".
		'public $NET_SPEC1 = array(			//Isolate certain spec1 clients to prevent network leakage. (Client+Version=>Network)'."\n\t".
			$this->settings_prep_double('NET_SPEC1').
		');'."\n\t".
		'public $BAN_GDNA_CLONES = array(	//Which vendor codes to block on GDNA clone-catch?'."\n\t".
			$this->settings_prep_single('BAN_GDNA_CLONES').
		');'."\n\t".
		'public $IP_EXCEPTION = array(			//Which networks shall submitted IP addresses be ignored and replaced by server-detected IP addresses?'."\n\t".
			$this->settings_prep_single('IP_EXCEPTION').
		');'."\n\t".
		'public $NETWORKS_ALT = array(			//Alternate names for the implemented networks.(Alternate Network=>Network)'."\n\t".
			$this->settings_prep_double('NETWORKS_ALT').
		');'."\n\t".
		'public $BANNED_PONGS = array(		//Ban the pong responses of specific caches.'."\n\t".
			$this->settings_prep_single('BANNED_PONGS').
		');'."\n\t".
		'public $WHITELIST_USER_AGENT = array(	//Create a whitelist to ban those who aren\'t on it. (Good User-Agent=>Network)'."\n\t".
			$this->settings_prep_double('WHITELIST_USER_AGENT').
		');'."\n");
	}
}
$updater = new updater();
if (empty($updater->errors)) {
?>
		<div class="updating" id="good_update">
			<div>This copy of Beacon Cache II is now up to date.</div>
			<span>Old Version: <?php echo($updater->VERSION); ?></span>
			<span>New Version: <?php echo($updater->new_version); ?></span>
		</div>
<?php
}
else {
?>
		<div class="updating" id="bad_update">
			<div>Update Failed:</div>
<?php
	foreach ($updater->errors as $error) {
?>
			<span><?php echo($error); ?></span>
<?php
	}
?>
		</div>
<?php
}
?>
	</body>
</html>
