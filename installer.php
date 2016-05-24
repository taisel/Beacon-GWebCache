<!DOCTYPE html
PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta name="robots" content="noindex,nofollow,noarchive" />
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>Beacon Cache II Installer</title>
		<style type="text/css">
			<!--
			body {
				background-color: #FFFFFF;
				font-family: Times New Roman, Palatino Linotype, Book Antiqua, Palatino, serif, sans-serif, Arial, Helvetica;
			}
			#title, .table_top_cell, #bottom_input_submit {
				text-align: center;
			}
			.table_cell, .table_cell2 {
				text-align: left;
			}
			#title {
				width: 95%;
				background-color: #DEDEFF;
				border-color: #FFCCCC;
				border-width: thin;
				border-style: solid;
				margin-top: 0px;
				margin-bottom: 15px;
			}
			#title:hover {
				background-color: #D6D6F7;
			}
			a.title_text:link, a.title_text:visited, a.title_text:hover, a.title_text:active {
				color: #FF8888;
			}
			.data_table {
				border-color: #000000;
				border-width: medium;
				border-style: solid;
				margin: auto;
				max-width: 90%;
				min-width: 80%;
				border-collapse: collapse;
			}
			.table_top_cell	{
				background-color: #CCCCCC;
			}
			.table_cell	{
				background-color: #DCDCDC;
			}
			.table_cell2	{
				background-color: #EDEDED;
			}
			.table_cell:hover, .table_cell2:hover {
				background-color: #EDEDFF;
			}
			.cell1 {
				padding-left: 5px;
				padding-right: 15px;
			}
			.cell2 {
				padding-left: 10px;
				padding-right: 10px;
			}
			.cell3 {
				padding-left: 5px;
				padding-right: 5px;
			}
			#bottom_input_submit {
				margin-top: 15px;
				margin-bottom: 0px;
			}
			#bottom_input_submit, #title {
				margin-left: auto;
				margin-right: auto;
			}
			-->
		</style>
		<script type="text/javascript">
			function pop_to_main() {
				location.href="gwc.php";
			}
		</script>
	</head>
	<body>
		<table id="title">
			<tr>
				<td>
					<a href="http://sourceforge.net/projects/beaconcache/" class="title_text" target="_blank">Beacon Cache II Installer</a>
				</td>
			</tr>
		</table>
<?php
//////Detecting GWC Address:
	$port = (isset($_SERVER['SERVER_PORT'])) ? $_SERVER['SERVER_PORT'] : 80;
	$server_name = (isset($_SERVER['SERVER_NAME'])) ? $_SERVER['SERVER_NAME'] : ((isset($_SERVER['SERVER_HOST'])) ?  $_SERVER['SERVER_HOST'] : '');
	$url = (isset($_SERVER['PHP_SELF'])) ? 'http://'.($server_name.(($port != 80) ? ':'.$port : '').dirname($_SERVER['PHP_SELF']).((dirname($_SERVER['PHP_SELF']) == '/') ? '' : '/').'gwc.php') : '';
////////////Settings:
	$dba_ops = array(
		'STORAGE' => 'flat',				//Storage system type - either 'mysql' or 'flat' (flat is just regular .dat files). 
		'FOLDER' => 'beacon_data',				//Folder name for the GWC data.
//////If you're using SQL instead of flat-file:
		'DBA_ADDRESS' => 'localhost',				//SQL server address.
		'DBA_USERNAME' => '',			//SQL server username.
		'DBA_PASSWORD' => '',			//SQL server password.
		'DBA_NAME' => 'beacon',				//SQL server database for Beacon.
		'STATS_CLIENT_FLUSH' => 5		//Multiple of STATS_THROTTLE for which to clear the clients table.
//////END SQL Settings
	);
	$reg_ops = array(
		'CACHE_ADDRESS' => array($url, 'Your cache\'s address: '),			//If included,  this address will be enforced (If not, then multiple addresses of your cache are possible).
		'HOSTS_IN' => array(30, 'How many hosts to store: '),				//How many hosts to store.
		'HOSTS_OUT' => array(25, 'How many hosts to output: '),				//How many hosts to output.
		'URLS_IN' => array(100, 'How many URLs to store: '),					//How many URLs to store.
		'URLS_OUT' => array(25, 'How many URLs to output: '),				//How many URLs to output.
		'BANNED_URLS_IN' => array(100, 'How many temp. banned URLs to keep track of per network: '),			//How many temp. banned URLs to keep track of per network.
		'ENABLE_V1' => array(true, 'Shall the cache accept GWC specification 1 requests?: '),				//Shall the cache accept GWC specification 1 requests?
		'ENABLE_V2' => array(true, 'Shall the cache accept GWC specification 2 requests?: '),				//Shall the cache accept GWC specification 2 requests?
		'ENABLE_V3' => array(true, 'Shall the cache accept GWC XML requests?: '),				//Shall the cache accept GWC XML requests?
		'SHUFFLE_HOSTS' => array(true, 'Shall the cache shuffle hosts on output?: '),			//Shall the cache shuffle hosts on output?
		'SHUFFLE_URLS' => array(true, 'Shall the cache shuffle URLs on output?: '),			//Shall the cache shuffle URLs on output?
		'EXPIRE_HOSTS' => array(16, 'At how many hours shall a host expire?: '),			//At how many hours shall a host expire?
		'EXPIRE_URLS' => array(24, 'At how many hours shall a URL expire?: '),				//At how many hours shall a URL expire?
		'EXPIRE_BANNED_URLS' => array(24, 'At how many hours shall a temp. banned URL expire?: '),		//At how many hours shall a temp. banned URL expire?
		'DEFAULT_NET' => array('gnutella', 'The defaulting network of this cache <b>(Do not touch / For experts only)</b>: '),		//The defaulting network of this cache (This really should not be changed to prevent the leakage of Gnutella onto another network).
		'FSOCKOPEN' => array(((function_exists('fsockopen')) ? true : false), 'Can this cache use sockets?: '),				//Can this cache use sockets?
		'IP_ALT_CACHES' => array(false, 'Shall this cache accept IP addresses as URLs?: '),		//Shall this cache accept IP addresses as URLs?
		'NON_HTTP' => array(true, 'Can this cache connect on ports other than port 80 for sockets?: '),				//Can this cache connect on ports other than port 80 for sockets?
		'RETRY_URLS' => array(true, 'Can the cache retry expired URLs?: '),			//Can the cache retry expired URLs?
		'RETRY_BAD_URLS' => array(false, 'Can the cache retry expired bad URLs?: '),		//Can the cache retry expired bad URLs?
		'TIMEOUT' => array(10, 'Timeout for the sockets: '),					//Timeout for the sockets.
		'WEB_FRONT' => array(true, 'Shall a web front be displayed?: '),				//Shall a web front be displayed?
		'BLOCK_NO_USER_AGENT' => array(true, 'Shall the cache block clients with no user agent header from updating an IP?: '),	//Shall the cache block clients with no user agent header from updating an IP?
		'BLOCK_NO_USER_AGENT_ALL' => array(true, 'Shall the cache block clients with no user agent header completely?: '),	//Shall the cache block clients with no user agent header completely?
		'WEBFRONT_URL_ADDS' => array(true, 'Shall the cache accept URL adds through the web front?: '),		//Shall the cache accept URL adds through the web front?
		'ENABLE_HIT_STATS' => array(true, 'Shall the cache keep track of hit rate statistics?: '),			//Shall the cache keep track of per-hit (number tracking) statistics? (*Disabling it reduces the load by a lot!*)
		'ENABLE_CLIENT_STATS' => array(true, 'Shall the cache keep track of client entry statistics?: '),			//Shall the cache keep track of per-client (name tracking) statistics? (*Disabling it reduces the load by a lot!*)
		'STATS_THROTTLE' => array(1000, 'How many clients shall be kept track of at any one time in the stats?: '),		//How many clients shall be kept track of at any one time in the stats?
		'CHECKS_ALLOWED' => array(true, 'Add the \'Quality Check\' option to the URL reporting on the web front?: '),	//This adds the extra link to each URL to let the user see a detailed debug of the selected cache.
		'ADD_URL_TO_SHAREAZA' => array(true, 'Add  side links to enter URLs in Shareaza automatically?: '),	//This adds the extra link to each URL to let the user have the URL auto-entered into Shareaza.
		'UPDATE_SELF_TO_REMOTE' => array(true, 'Shall the cache update self-url to other GWCs?: '),	//Shall the cache update self-url to other GWCs?
		'LOG_UPDATE_WARNINGS' => array(false, 'Shall the cache log update warnings generated in the update class?: '),	//Shall the cache log update warnings generated in the update class?
		'LOG_BAN_WARNINGS' => array(false, 'Shall the cache log ban warnings generated in the client check class?: '),		//Shall the cache log ban warnings generated in the client check class?
		'LOG_SPLIT_SIZE' => array(256000, 'The size of a log file in bytes at which a new one is generated.: '),		//The size of a log file in bytes at which a new one is generated.
		'NETWORKS' => array(array(			//Configure here to enable certain networks to bootstrap from this cache. (**Must be lower-case!**)
			'gnutella',
			'gnutella2'
		), 'Networks to enable: '),
		'BANNED' => array(array(				//Banned IPs configured here.
			'38.107.160',
			'38.107.161',
			'38.107.162',
			'38.107.163',
			'38.107.164',
			'38.107.165',
			'38.107.166',
			'38.107.167',
			'72.172.87',
			'72.172.88',
			'72.172.89',
			'72.172.90',
			'72.172.91',
			'129.47.128',
			'174.136.255'
		), 'Banned IP addresses: '),
		'VENDOR_CODE_BAN' => array(array(	//Vendor code bans configured here.
			'Self-Add',	//Reserved for internal use.
			'URL-ADD',	//Reserved for internal use.
			'MESH',		//Has been marked as bad by others.
			'RAZA1.0',	//Shareaza 1.0 is a fake client (1.x was released, but never 1.0).
			'BEAR6',	//Has been marked as bad by others.
			'BEAR7',	//Has been marked as bad by others.
			'BEAR8',	//Has been marked as bad by others.
			'BEAR9',	//Has been marked as bad by others.
			'limewire'	//Fake client (A trojan trying to DDoS multiple caches) (Not the real limewire!!!)
		), 'Vendor code bans: '),
		'VENDOR_CODE_IP_UPDATE_BAN' => array(array(	//Block certain vendor codes from updating IP addresses here.
			'TEST',
			'GCII',
			'WURM',
			'BAZK',
			'BCON',
			'BCII',
			'SKLL',
			'LIME4.18.8',
			'LIME5.0.',
			'LIME5.1.'
		), 'IP update blocking by vendor code: '),
		'BANNED_URLS' => array(array(		//Used to ban bad URLs on a permanent basis...
			'http://gwc.nickstallman.net/beta.php',
			'http://websamba.com/doscache/',
			'http://borednow.net/gwebcache/gcache.asp',
			'http://www.engle-enterprises.com/gcache/gcache.php',
			'http://www.pietroam.net/script/gnutella/phpgnucacheII/gwcii.php',
			'http://web-1.bidz.com/3minute.html',
			'http://gwc.the4400.tv/skulls/skulls.php',
			'http://home.zk3d.com/gwebcache/gcache.php',
			'http://www.thebobclan.com/gnetcache/gnetcache.php',
			'http://server925.gisol.com/~enhance/search/files/cache/gcache.php',
			'http://www.inet-one.com/gwebcache-0.7.5/gcache.php',
			'http://60gp.ovh.net/erreur.html',
			'http://gwc.snack-donation.com/skulls.php',
			'http://invalidsubdomain.toddenrentieren.net/gcache.php',
			'http://home.no.net/dforsb/gnet/index.php',
			'http://e.sears.com/a/tA-lvD$AM$zVoAOVOWAAMHVT7Lx/sear63',
			'http://t.az.is.teh.r0x0r.gtkg.de/',
			'http://overbeer.ghostwhitecrab.de/',
			'http://gwc1.nouiz.org/servlet/GWebCache/req',
			'http://www.andi-benni-mexz-carly-pfunds-tobadill.dr.ag/',
			'http://www.melissazone.com/gwebcache/gcache.php',
			'http://www.ryannet.net/gwebcache/gcache.php',
			'http://geocities.com/prae2rian/GNUTELLA.net',
			'http://www.markus-wolf-home.de/GWebCache/gcache.php',
			'http://dr-ag-dr-ag-dr-op.dr.ag/skulls.php',
			'http://torrent.delvedown.com/cgi-bin/perlgcache.cgi',
			'http://gwc2.mycroft.at/bazooka.php',
			'http://www.gamerspage.com/lynn.asp',
			'http://www.la-forza.com/gnucache/gcache.php',
			'http://www.zadox.com/gwebcache',
			'http://www.iwolfnet.com/gcache/gcache.asp',
			'http://gwc.nickstallman.net/',
			'http://gwc1.nickstallman.net/',
			'http://gwc2.nickstallman.net/',
			'http://gwc.nonexiste.net/',
			'http://gwc2.nonexiste.net/',
			'http://gwc3.nonexiste.net/',
			'http://gwc4.nonexiste.net/'
		), 'Ban which URL addresses permanently?: '),
		'USER_AGENT_BAN' => array(array(		//User agent bans configured here.
			'Etomi',
			'360Share',
			'Shareaza PRO',
			'Morpheus Music',
			'WinMX Mp3',
			'MP3Rocket',
			'CruX',
			'P2P Rocket',
			'Bearshare MP3',
			'Bearshare Music',
			'K-Lite Pro',
			'Fastload.TV',
			'Gnutella Turbo',
			'Trilix',
			'Morpheus Games',
			'Morpheus Premium'
		), 'User-Agent bans: '),
		'BROWSER_DETECT' => array(array(		//Browser detection for IP banning configured here.
			'opera',
			'MSIE',
			'gecko',
			'windows',
			'firefox',
			'infopath',
			'mozilla',
			'Safari',
			'KHTML',
			'webkit',
			'chrome'
		), 'Browser detection for IP banning: '),
		'NET_SPEC1' => array(array(			//Isolate certain spec1 clients to prevent network leakage. (Client+Version=>>Network)
			'MUTE'=>'mute',					//In order for mute support to be enabled, mute needs to be added to the $NETWORKS array and BLOCK_NO_USER_AGENT edited to false (to allow updates).
			'mute'=>'mute'
		), 'Isolate certain spec1 clients to prevent network leakage: '),
		'BAN_GDNA_CLONES' => array(array(	//Which vendor codes to block on GDNA clone-catch?
			'BEAR',
			'LIME',
			'RAZA',
			'RAZB',
			'RZCB'
		), 'Which vendor codes to block on GDNA clone-catch?: '),
		'IP_EXCEPTION' => array(array(	//Which networks shall submitted IP addresses be ignored and replaced by server-detected IP addresses?
			'mute'
		), 'Which networks shall submitted IP addresses be ignored and replaced by server-detected IP addresses?: '),
		'NETWORKS_ALT' => array(array(	//Alternate names for the implemented networks.(Alternate Network=>Network)
			'gnutella1'=>'gnutella',
			'g1'=>'gnutella',
			'g2'=>'gnutella2'
		), 'Alternate names for the accepted networks: '),
		'BANNED_PONGS' => array(array(	//Ban the pong responses of specific caches.
			'FTWebCache/3.0',
			'bootdesu 0.2 :P'
		), 'Block which cache names from this cache?: '),
		'WHITELIST_USER_AGENT' => array(array(
		), 'Accept only which clients for a specified network? (Experts only!)(Will only enable for specified networks.)')
	);
class installer {
	private $dba_ops;
	private $reg_ops;
	private $color_track;
	private $data;
	const VERSION = '0.8.0.1';
	function __construct($dba_ops, $reg_ops) {
		$this->reg_ops = $reg_ops;
		$this->dba_ops = $dba_ops;
		$this->color_track = false;
		$Setup_Page = (isset($_GET['page'])) ? $_GET['page'] : false;
		switch ($Setup_Page) {
			case '1':
				$this->dba_options();
				break;
			case '2':
				$this->other_options();
				break;
			case '3':
				$this->display_result();
				break;
			default:
				$this->select_dba();
		}
	}
	private function check($filename) {
		if (!file_exists($filename)) {
			$file = fopen($filename, 'w');
			fclose($file);
		}
	}
	private function write($filename, $data) {
		$file = fopen($filename, 'r+b');
		flock($file, LOCK_EX);
		ftruncate($file, 0);
		fwrite($file, $data);
		flock($file, LOCK_UN);
		fclose($file);
	}
	private function do_settings_save() {
		$serialized_data = array(
			$_POST,
			installer::VERSION
		);
		$this->write('keep_for_updates.php', '<?php $serialized = \''.htmlspecialchars(serialize($serialized_data), ENT_QUOTES).'\'; ?>');
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
	private function select_dba() {
?>
		<form method="post" action="?page=1">
			<table class="data_table">
				<tr>
					<td class="table_top_cell" colspan="2">
						Welcome! Let's begin to install Beacon Cache II!
					</td>
				</tr>
				<tr class="table_cell<?php echo((!$this->color_track) ? '' : '2'); $this->color_track = (!$this->color_track) ? true : false; ?>">
					<td class="cell1">
						Select database type:
					</td>
					<td class="cell3">
						<select name="STORAGE">
							<option value="flat" selected="selected">flat-file</option>
							<option value="mysql">mysql</option>
							<option value="mysqli">mysqli</option>
						</select>
					</td>
				</tr>
			</table>
			<div id="bottom_input_submit">
				<input type="submit" value="Next" />
			</div>
		</form>
<?php
	}
	private function dba_options() {
		if (!isset($_POST['STORAGE'])) {
			$this->select_dba();
		}
		else {
?>
		<form method="post" action="?page=2">
			<table class="data_table">
				<tr>
					<td class="table_top_cell" colspan="2">
						Data system options:
					</td>
				</tr>
				<tr class="table_cell<?php echo((!$this->color_track) ? '' : '2'); $this->color_track = (!$this->color_track) ? true : false; ?>">
					<td class="cell1">Folder for data storage:</td>
					<td class="cell3">
						<input type="text" name="FOLDER" value="<?php echo($this->dba_ops['FOLDER']); ?>" />
					</td>
				</tr>
<?php
			if ($_POST['STORAGE'] != 'flat') {
?>
				<tr class="table_cell<?php echo((!$this->color_track) ? '' : '2'); $this->color_track = (!$this->color_track) ? true : false; ?>">
					<td class="cell1">Database Address:</td>
					<td class="cell3">
						<input type="text" name="DBA_ADDRESS" value="<?php echo($this->dba_ops['DBA_ADDRESS']); ?>" />
					</td>
				</tr>
				<tr class="table_cell<?php echo((!$this->color_track) ? '' : '2'); $this->color_track = (!$this->color_track) ? true : false; ?>">
					<td class="cell1">Database Username:</td>
					<td class="cell3"><input type="text" name="DBA_USERNAME" value="<?php echo($this->dba_ops['DBA_USERNAME']); ?>" /></td>
				</tr>
				<tr class="table_cell<?php echo((!$this->color_track) ? '' : '2'); $this->color_track = (!$this->color_track) ? true : false; ?>">
					<td class="cell1">Database Password:</td>
					<td class="cell3"><input type="password" name="DBA_PASSWORD" value="<?php echo($this->dba_ops['DBA_PASSWORD']); ?>" /></td>
				</tr>
				<tr class="table_cell<?php echo((!$this->color_track) ? '' : '2'); $this->color_track = (!$this->color_track) ? true : false; ?>">
					<td class="cell1">Database Name:</td>
					<td class="cell3"><input type="text" name="DBA_NAME" value="<?php echo($this->dba_ops['DBA_NAME']); ?>" /></td>
				</tr>
				<tr class="table_cell<?php echo((!$this->color_track) ? '' : '2'); $this->color_track = (!$this->color_track) ? true : false; ?>">
					<td class="cell1">Client Stats Flush Rate:</td>
					<td class="cell3"><input type="text" name="STATS_CLIENT_FLUSH" value="<?php echo($this->dba_ops['STATS_CLIENT_FLUSH']); ?>" /></td>
				</tr>
<?php
			}
?>
			</table>
<?php
			if ($_POST['STORAGE'] == 'flat') {
?>
			<input type="hidden" name="DBA_ADDRESS" value="<?php echo($this->dba_ops['DBA_ADDRESS']); ?>" />
			<input type="hidden" name="DBA_USERNAME" value="<?php echo($this->dba_ops['DBA_USERNAME']); ?>" />
			<input type="hidden" name="DBA_PASSWORD" value="<?php echo($this->dba_ops['DBA_PASSWORD']); ?>" />
			<input type="hidden" name="DBA_NAME" value="<?php echo($this->dba_ops['DBA_NAME']); ?>" />
			<input type="hidden" name="STATS_CLIENT_FLUSH" value="<?php echo($this->dba_ops['STATS_CLIENT_FLUSH']); ?>" />
<?php
			}
?>
			<input type="hidden" name="STORAGE" value="<?php echo($_POST['STORAGE']); ?>" />
			<div id="bottom_input_submit">
				<input type="submit" value="Next" />
			</div>
		</form>
<?php
		}
	}
	private function other_options() {
		if (!isset($_POST['STORAGE']) || !isset($_POST['FOLDER']) || !isset($_POST['DBA_ADDRESS']) || !isset($_POST['DBA_USERNAME']) || !isset($_POST['DBA_PASSWORD']) || !isset($_POST['DBA_NAME'])) {
			$this->select_dba();
		}
		else {
?>
		<form method="post" action="?page=3">
			<table class="data_table">
				<tr>
					<td class="table_top_cell" colspan="2">
						Standard and advanced options:
						<input type="hidden" name="STORAGE" value="<?php echo($_POST['STORAGE']); ?>" />
						<input type="hidden" name="FOLDER" value="<?php echo($_POST['FOLDER']); ?>" />
						<input type="hidden" name="DBA_ADDRESS" value="<?php echo($_POST['DBA_ADDRESS']); ?>" />
						<input type="hidden" name="DBA_USERNAME" value="<?php echo($_POST['DBA_USERNAME']); ?>" />
						<input type="hidden" name="DBA_PASSWORD" value="<?php echo($_POST['DBA_PASSWORD']); ?>" />
						<input type="hidden" name="DBA_NAME" value="<?php echo($_POST['DBA_NAME']); ?>" />
						<input type="hidden" name="STATS_CLIENT_FLUSH" value="<?php echo($_POST['STATS_CLIENT_FLUSH']); ?>" />
					</td>
				</tr>
<?php
			foreach ($this->reg_ops as $key=>$val) {
				list($value, $name) = $val;
?>
				<tr class="table_cell<?php echo((!$this->color_track) ? '' : '2'); $this->color_track = (!$this->color_track) ? true : false; ?>">
					<td class="cell1"><?php echo($name); ?></td>
					<td class="cell3">
<?php
				if (!is_bool($value)) {
?>
						<input type="text" name="<?php echo($key); ?>" value="<?php
					if (!is_array($value)) {
						echo($value);
					}
					elseif ($key == 'NET_SPEC1' || $key == 'NETWORKS_ALT') {
						$tt_try = false;
						foreach ($value as $key_=>$value_) {
							if (count($value) > 1 && $tt_try) {
								echo(',');
							}
							echo($key_.'=>'.$value_);
							$tt_try = true;
						}
					}
					else {
						echo(implode(',', $value));
					}
						?>">
<?php
				}
				else {
?>
						<select name="<?php echo($key); ?>">
							<option value="1"<?php if ($value) {	echo(' selected="selected"');	} ?>>true</option>
							<option value=""<?php if (!$value) {	echo(' selected="selected"');	} ?>>false</option>
						</select>
<?php
				}
?>
					</td>
				</tr>
<?php
			}
?>
			</table>
			<div id="bottom_input_submit">
				<input type="submit" value="Save Settings" />
			</div>
		</form>
<?php
		}
	}
	private function display_result() {
		$is_complete = false;
		$combined_settings = array_merge($this->dba_ops, $this->reg_ops);
		if (isset($_POST)) {
			if (!empty($_POST)) {
				foreach ($combined_settings as $key=>$value) {
					if (isset($_POST[$key])) {
						$is_complete = true;
					}
					else {
						break;
					}
				}
			}
		}
		if (!$is_complete) {
			$this->select_dba();
		}
		else {
			$_POST = array_map('trim', $_POST);
?>
		<table class="data_table">
			<tr>
				<td class="table_top_cell" colspan="2">
					Creating gwc.php...
				</td>
			</tr>
<?php
			foreach ($_POST as $key=>$value) {
?>
			<tr class="table_cell<?php echo((!$this->color_track) ? '' : '2'); $this->color_track = (!$this->color_track) ? true : false; ?>">
				<td class="cell1"><?php echo($key); ?></td>
				<td class="cell3 colorific"><?php
				if (strpos($value, ',')) {	$value = explode(',', $value);	}
					if (!is_array($value)) {
						echo($value);
					}
					else {
						echo(implode(', <br />', $value));
					}
						?></td>
			</tr>
<?php
		}
?>
		</table>
		<script type="text/javascript">
<?php
			if (file_exists('part.txt')) {
				$this->check('gwc.php');
				$this->check('keep_for_updates.php');
				$this->do_settings_save();
				$data = $this->format_settings();
				$data .= file_get_contents('part.txt');
				$this->write('gwc.php', $data);
				unlink('part.txt');
?>
			alert("Please delete this file, thank you.");
<?php
			}
			else {
?>
			alert("The installer has already been run!");
<?php
			}
?>
			var t=setTimeout("pop_to_main()", 5000);
		</script>
<?php
		}
	}
	public function format_settings() {
		return ('<?php'."\n".'class settings {'."\n\t"."const CACHE_NAME = 'Beacon Cache II';"."\n\t"."const CACHE_VERSION = '".installer::VERSION."';"."\n\t"."const CACHE_VENDOR = 'BCII';"."\n\t".'/////////////////////////////////////////////BEGIN Settings'."\n\t".
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
$install = new installer($dba_ops, $reg_ops);
?>
	</body>
</html>
