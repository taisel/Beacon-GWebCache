<?php
class settings {
	const CACHE_NAME = 'Beacon Cache II';
	const CACHE_VERSION = '0.8.0.1';
	const CACHE_VENDOR = 'BCII';
/////////////////////////////////////////////BEGIN Settings
	const STORAGE = 'flat';				//Storage system type - either 'mysql', ''mysqli', or 'flat' (flat is just regular .dat files). 
	const FOLDER = 'beacon_data';		//Folder name for the GWC data.
//////If you're using SQL instead of flat-file:
	const DBA_ADDRESS = 'localhost';	//SQL server address.
	const DBA_USERNAME = '';			//SQL server username.
	const DBA_PASSWORD = '';			//SQL server password.
	const DBA_NAME = 'beacon';			//SQL server database for Beacon.
	const STATS_CLIENT_FLUSH = 5;		//Multiple of STATS_THROTTLE for which to clear the clients table.
//////END SQL Settings
	const CACHE_ADDRESS = '';			//If included,  this address will be enforced (If not, then multiple addresses of your cache are possible).
	const HOSTS_IN = 30;				//How many hosts to store.
	const HOSTS_OUT = 25;				//How many hosts to output.
	const URLS_IN = 100;				//How many URLs to store.
	const URLS_OUT = 25;				//How many URLs to output.
	const BANNED_URLS_IN = 100;			//How many temp. banned URLs to keep track of per network.
	const ENABLE_V1 = true;				//Shall the cache accept GWC specification 1 requests?
	const ENABLE_V2 = true;				//Shall the cache accept GWC specification 2 requests?
	const ENABLE_V3 = true;				//Shall the cache accept GWC XML requests?
	const SHUFFLE_HOSTS = true;			//Shall the cache shuffle hosts on output?
	const SHUFFLE_URLS = true;			//Shall the cache shuffle URLs on output?
	const EXPIRE_HOSTS = 16;			//At how many hours shall a host expire?
	const EXPIRE_URLS = 24;				//At how many hours shall a URL expire?
	const EXPIRE_BANNED_URLS = 24;		//At how many hours shall a temp. banned URL expire?
	const DEFAULT_NET = 'gnutella';		//The defaulting network of this cache (This really should not be changed to prevent the leakage of Gnutella onto another network).
	const FSOCKOPEN = true;				//Can this cache use sockets?
	const IP_ALT_CACHES = false;		//Shall this cache accept IP addresses as URLs?
	const NON_HTTP = true;				//Can this cache connect on ports other than port 80 for sockets?
	const RETRY_URLS = true;			//Can the cache retry expired URLs?
	const RETRY_BAD_URLS = false;		//Can the cache retry expired bad URLs?
	const TIMEOUT = 10;					//Timeout for the sockets.
	const WEB_FRONT = true;				//Shall a web front be displayed?
	const BLOCK_NO_USER_AGENT = true;	//Shall the cache block clients with no user agent header from updating an IP?
	const BLOCK_NO_USER_AGENT_ALL = false;	//Shall the cache block clients with no user agent header completely?
	const WEBFRONT_URL_ADDS = true;		//Shall the cache accept URL adds through the web front?
	const ENABLE_HIT_STATS = true;		//Shall the cache keep track of per-hit (number tracking) statistics? (*Disabling it reduces the load by a lot!*)
	const ENABLE_CLIENT_STATS = true;	//Shall the cache keep track of per-client (name tracking) statistics? (*Disabling it reduces the load by a lot!*)
	const STATS_THROTTLE = 1000;		//How many clients shall be kept track of at any one time in the stats?
	const ADD_URL_TO_SHAREAZA = true;	//This adds the extra link to each URL to let the user have the URL auto-entered into Shareaza.
	const CHECKS_ALLOWED = true;		//This adds the extra link to each URL to let the user see a detailed debug of the selected cache.
	const UPDATE_SELF_TO_REMOTE = true;	//Shall the cache update self-url to other GWCs?
	const LOG_UPDATE_WARNINGS = false;	//Shall the cache log update warnings generated in the update class?
	const LOG_BAN_WARNINGS = false;		//Shall the cache log ban warnings generated in the client check class?
	const LOG_SPLIT_SIZE = 256000;		//The size of a log file in bytes at which a new one is generated.
	public $NETWORKS = array(			//Configure here to enable certain networks to bootstrap from this cache. (**Must be lower-case!**)
		'gnutella',
		'gnutella2'
	);
	public $BANNED = array(				//Banned IPs configured here.
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
	);
	public $VENDOR_CODE_BAN = array(	//Vendor code bans configured here.
		'Self-Add',	//Reserved for internal use.
		'URL-ADD',	//Reserved for internal use.
		'MESH',		//Has been marked as bad by others.
		'RAZA1.0',	//Shareaza 1.0 is a fake client (1.x was released, but never 1.0).
		'BEAR6',	//Has been marked as bad by others.
		'BEAR7',	//Has been marked as bad by others.
		'BEAR8',	//Has been marked as bad by others.
		'BEAR9',	//Has been marked as bad by others.
		'limewire'	//Fake client (A trojan trying to DDoS multiple caches) (Not the real limewire!!!)
	);
	public $VENDOR_CODE_IP_UPDATE_BAN = array(	//Block certain vendor codes from updating IP addresses here.
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
	);
	public $BANNED_URLS = array(		//Used to ban bad URLs on a permanent basis...
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
	);
	public $USER_AGENT_BAN = array(		//User agent bans configured here.
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
	);
	public $BROWSER_DETECT = array(		//Browser detection for IP banning configured here.
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
	);
	public $NET_SPEC1 = array(			//Isolate certain spec1 clients to prevent network leakage. (Client+Version=>Network)
		'MUTE'=>'mute',					//In order for mute support to be enabled, mute needs to be added to the $NETWORKS array and BLOCK_NO_USER_AGENT edited to false (to allow updates).
		'mutekomm'=>'mute'
	);
	public $BAN_GDNA_CLONES = array(	//Which vendor codes to block on GDNA clone-catch...
		'BEAR',
		'LIME',
		'RAZA',
		'RAZB',
		'RZCB'
	);
	public $IP_EXCEPTION = array(		//Which networks shall submitted IP addresses be ignored and replaced by server-detected IP addresses?
		'mute'
	);
	public $NETWORKS_ALT = array(		//Alternate names for the implemented networks. (Alternate Network=>Network)
		'gnutella1'=>'gnutella',
		'g1'=>'gnutella',
		'g2'=>'gnutella2'
	);
	public $BANNED_PONGS = array(		//Ban the pong responses of specific caches.
		'FTWebCache/3.0',
		'bootdesu 0.2 :P'
	);
	public $WHITELIST_USER_AGENT = array(	//Create a whitelist to ban those who aren't on it. (Good User-Agent=>Network)
	);
	public $VENDOR_CODE_MATCHINGS = array(	//Vendor code conversions for matching to client names and URLs.
		//URLs are optional to add ino the conversions, just replace with a false statement before doing.
		//(vendor code)=>array((Actual name), (URL or put a boolean false))
		'ACQL'=>array('Acqlite','http://acqlite.sourceforge.net/'),
		'ACQX'=>array('Acquisition','http://www.acquisitionx.com/'),
		'AGIO'=>array('Adagio','http://sourceforge.net/projects/agio'),
		'BAZK'=>array('Bazooka','http://www.bazookanetworks.com/'),
		'BCON'=>array('Beacon Cache','http://sourceforge.net/projects/beaconcache/'),
		'BEAR'=>array('BearShare','http://en.wikipedia.org/wiki/BearShare'),
		'CABO'=>array('Cabos/LimeWire','http://cabos.sourceforge.jp/'),
		'CANN'=>array('Cannon',false),
		'CHTC'=>array('Cheater Cache',false),
		'COCO'=>array('CocoGnut','http://www.alpha-programming.co.uk/software/cocognut/'),
		'DNET'=>array('Deepnet Explorer','http://www.deepnetexplorer.com/'),
		'Dianlei'=>array('Dianlei','http://www.dianlei.com/'),
		'dianlei'=>array('Dianlei','http://www.dianlei.com/'),
		'FLOX'=>array('Flox','http://sourceforge.net/projects/flox/'),
		'FOXY'=>array('Foxy P2P','http://tw.gofoxy.net/'),
		'FTWC'=>array('FTWebCache',false),
		'GCII'=>array('PHPGnuCacheII','http://gwcii.sourceforge.net/'),
		'GDNA'=>array('GnucDNA','http://www.gnucleus.com/GnucDNA/'),
		'GIFT'=>array('giFT','http://gift.sourceforge.net/'),
		'GNZL'=>array('Gnoozle',false),
		'GNUC'=>array('Gnucleus','http://www.gnucleus.com/Gnucleus/'),
		'GNUT'=>array('Gnut','http://www.mrob.com/gnut/'),
		'GOLD'=>array('Ares Gold','http://www.aresgold.com/'),
		'GTKG'=>array('GTK Gnutella','http://gtk-gnutella.sourceforge.net/'),
		'GWCC'=>array('Cheater Cache',false),
		'iswip'=>array('iSwipe','http://www.hillmanminx.net/iswipe/'),
		'JGWC'=>array('Jums Web Cache','http://www1.mager.org/GWebCache/'),
		'JTEL'=>array('JTella','http://jtella.sourceforge.net/'),
		'KIWI'=>array('Kiwi Alpha','http://www.kiwialpha.com/'),
		'KUPE'=>array('Kupe',false),
		'LIME'=>array('LimeWire','http://limewire.com/'),
		'MESH'=>array('iMesh','http://en.wikipedia.org/wiki/IMesh'),
		'MLDK'=>array('MLDonkey','http://mldonkey.sourceforge.net/Main_Page'),
		'MMMM'=>array('Morpheus','http://www.morpheus.com/'),
		'MNAP'=>array('MyNapster','http://mynapster.sourceforge.net/'),
		'MRPH'=>array('Morpheus','http://www.morpheus.com/'),
		'MTLL'=>array('Mutella','http://mutella.sourceforge.net/'),
		'mutekomm'=>array('Kommute','http://kommute.sourceforge.net/'),
		'MUTEkomm'=>array('Kommute','http://kommute.sourceforge.net/'),
		'MUTE'=>array('MUTE','http://mute-net.sourceforge.net/'),
		'NOVA'=>array('Nova P2P','http://novap2p.sourceforge.net/'),
		'PEER'=>array('Peer Project','http://sourceforge.net/projects/peerproject/'),
		'PGII'=>array('Pocket G2',false),
		'PHEX'=>array('Phex','http://www.phex.org/'),
		'PNTH'=>array('Panthera Project','http://pantheraproject.sourceforge.net/'),
		'QTEL'=>array('Qtella','http://qtella.sourceforge.net/'), 
		'RAZA'=>array('Shareaza','http://shareaza.sourceforge.net/'),
		'RAZB'=>array('Shareaza Beta','http://shareaza.sourceforge.net/'),
		'RAZL'=>array('ShareazaLite',false),
		'RZCA'=>array('ShareazaPlus (Alpha)','http://shareazaplus.sourceforge.net/'),
		'RZCB'=>array('ShareazaPlus (Beta)','http://shareazaplus.sourceforge.net/'),
		'RZCC'=>array('ShareazaPlus','http://shareazaplus.sourceforge.net/'),
		'Self-Add'=>array('Cache Retry System',false),
		'Sharetastic'=>array('Sharetastic','http://goforsharing.com/index.php/home-mainmenu-1/sharetastic-mainmenu-126'),
		'SHLN-DEV'=>array('Sharelin','http://sharelin.sourceforge.net/'),
		'SHLN'=>array('Sharelin','http://sharelin.sourceforge.net/'),
		'SKLL'=>array('Skulls','http://sourceforge.net/projects/skulls/'),
		'SNOW'=>array('Frostwire','http://www.frostwire.com/'),
		'SWAP'=>array('Swapper','http://www.revolutionarystuff.com/swapper/'),
		'TESTBazooka'=>array('Bazooka GWC','http://www.bazookanetworks.com/'),
		'TESTBCII'=>array('Beacon Cache II','http://sourceforge.net/projects/beaconcache/'),
		'TESTBCON'=>array('Beacon Cache','http://sourceforge.net/projects/beaconcache/'),
		'TESTCachechu'=>array('Cachechu','http://code.google.com/p/cachechu/'),
		'TESTCrab-'=>array('GhostWhiteCrab','http://wiki.limewire.org/index.php?title=GhostWhiteCrab'),
		'TESTGWCSCANNER'=>array('Multi-Network GWC Scan','http://gcachescan.grantgalitz.com/'),
		'TESTPGDBScan'=>array('Jon Atkins GWC Scan','http://gcachescan.jonatkins.com/'),
		'TESTSKLL'=>array('Skulls','http://sourceforge.net/projects/skulls/'),
		'TFLS'=>array('TrustyFiles','http://www.trustyfiles.com/'),
		'URL-ADD'=>array('URL-ADD',false),
		'WURM'=>array('Wurm GWC Scanner','http://kevogod.trillinux.org/')
	);
}
/////////////////////////////////////////////END Settings
abstract class data_system {
	public $contents;	//Raw unedited output.
	public $output;		//Edited and 'prepped' output.
	protected $runtime;	//Container for passed variables.
	protected $file;	//The unique physical file-name that carries the requested data.
	protected $name;	//The unique physical name that carries the requested data (For MySQL).
	protected $refresh;	//Used by the stats to prevent a stat-write for read only.
	protected $expire;	//Time (in hours) for which a host cannot be older than.
	protected $maximum;	//Maximum count stored.
	function __construct($runtime) {
		$this->runtime = $runtime;		//Container for passed variables
		$this->name = $this->runtime->ID.$this->runtime->network;
		$this->file = settings::FOLDER.'/'.$this->name.'.dat';
		if ($this->runtime->ID == 'log' || strtolower(settings::STORAGE) == 'flat') {
			if (!file_exists(settings::FOLDER)) {
				mkdir(settings::FOLDER);	//Create the folder
			}
		}
		if ($this->runtime->ID != 'log' && strtolower(settings::STORAGE) == 'flat') {	$this->check_exists($this->file);	}
		$this->refresh = false;
		switch ($this->runtime->ID) {	////Run consistency checks
			case 'ip':					//IP consistency check
				$this->expire = settings::EXPIRE_HOSTS;
				$this->maximum = settings::HOSTS_IN;
				break;
			case 'bad_url':				//banned-URL consistency check
				$this->expire = settings::EXPIRE_BANNED_URLS;
				$this->maximum = settings::BANNED_URLS_IN;
				break;
			case 'retry':				//Retry-URL consistency check
			case 'url':					//URL consistency check
				$this->expire = settings::EXPIRE_URLS;
				$this->maximum = settings::URLS_IN;
		}
		switch ($this->runtime->flow) {
			case 'up':					//An update
				files::update();
				break;
			case 'down':				//Data retrieval
				files::request();
		}
	}
	protected function request() {
		switch ($this->runtime->ID) {	//Decide what data to retrieve.
			case 'ip':
				$this->ip_request();
				break;
			case 'retry':
				$this->url_retry();
				break;
			case 'bad_url':
			case 'url':
				$this->url_request();
				break;
			case 'stats_total_requests':
			case 'stats_total_updates':
			case 'stats_client':
				$this->contents = $this->grab();
				break;
			case 'stats_requests':
			case 'stats_updates':
				$this->refresh = true;
				$this->update_stats();
				$this->refresh = false;
				$this->contents = $this->grab();
		}
	}
	protected function update() {
		switch ($this->runtime->ID) {	//Decide what data to update.
			case 'ip':
				$this->ip_update();
				break;
			case 'bad_url':
			case 'url':
				$this->url_update();
				break;
			case 'log':
				$this->log_update();
				break;
			case 'stats_total_requests':
			case 'stats_total_updates':
			case 'stats_client':
			case 'stats_requests':
			case 'stats_updates':
				$this->update_stats();
		}
	}
	protected function ip_request() {
		$this->all_requests(settings::SHUFFLE_HOSTS, settings::HOSTS_OUT);
	}
	protected function ip_update() {
		$this->add();
	}
	protected function url_request() {
		$this->all_requests(settings::SHUFFLE_URLS, settings::URLS_OUT);
	}
	protected function url_update() {
		$this->add();
	}
	protected function check_exists($name) {
		if (!file_exists($name)) {
			$file = fopen($name, 'wb');
			fclose($file);
		}
	}
	protected function log_update() {
		$log_marker = 0;
		$this->check_exists(settings::FOLDER.'/log_'.$log_marker.'.dat');
		while (settings::LOG_SPLIT_SIZE <= filesize(settings::FOLDER.'/log_'.$log_marker.'.dat')) {	$log_marker++;	$this->check_exists(settings::FOLDER.'/log_'.$log_marker.'.dat');	}
		$file = fopen(settings::FOLDER.'/log_'.$log_marker.'.dat', 'ab');
		flock($file, LOCK_EX);
		fwrite($file, '######################################'."\r\n".'--'.gmdate('Y/m/d H:i')."--\r\n");
		fwrite($file, '@@@@@@[ENVIRONMENT VARIABLES]@@@@@@'."\r\n");
		foreach ($this->runtime->runtime->env_variables as $key=>$value) {
			if ($key !== false && $value !== false) {
				fwrite($file, '['.$key.']'.'('.(string)$value.")\r\n");
			}
		}
		fwrite($file, '@@@@@@[GWC VARIABLES]@@@@@@'."\r\n");
		foreach ($this->runtime->runtime->gwc_variables as $key=>$value) {
			if ($key !== false && $value !== false) {
				fwrite($file, '['.$key.']'.'('.(string)$value.")\r\n");
			}
		}
		fwrite($file, '@@@@@@[WARNINGS]@@@@@@'."\r\n");
		if (!empty($this->runtime->info['warnings'])) {
			foreach ($this->runtime->info['warnings'] as $key=>$value) {
				if ($key !== false && $value !== false) {
					fwrite($file, '['.$key.']'.'('.(string)$value.")\r\n");
				}
			}
		}
		flock($file, LOCK_UN);
		fclose($file);
	}
	protected function compile_saves() {
		return ((($this->runtime->ID == 'ip') ? $this->runtime->runtime->final_ip : $this->runtime->runtime->gwc_variables[$this->runtime->ID]).'|'.
		time().'|'.
		$this->runtime->runtime->gwc_variables['client'].(($this->runtime->runtime->gwc_variables['version'] !== false) ? $this->runtime->runtime->gwc_variables['version'] : '').'|'.
		(($this->runtime->ID == 'ip') ? (($this->runtime->runtime->gwc_variables['cluster'] !== false) ? $this->runtime->runtime->gwc_variables['cluster'] : '') : ((isset($this->runtime->runtime->pong)) ? $this->runtime->runtime->pong : '')).'|'.
		(($this->runtime->ID == 'ip') ? (($this->runtime->runtime->gwc_variables['x_leaves'] !== false) ? $this->runtime->runtime->gwc_variables['x_leaves'] : '') : ((isset($this->runtime->runtime->host_count)) ? $this->runtime->runtime->host_count : '0')).'|'.
		(($this->runtime->ID == 'ip') ? (($this->runtime->runtime->gwc_variables['uptime'] !== false) ? $this->runtime->runtime->gwc_variables['uptime'] : '') : ((isset($this->runtime->runtime->url_count)) ? $this->runtime->runtime->url_count : '0')).'|'.
		(($this->runtime->ID == 'ip') ? (($this->runtime->runtime->gwc_variables['x_max'] !== false) ? $this->runtime->runtime->gwc_variables['x_max'] : '') : ((isset($this->runtime->runtime->v1_cache)) ? (int)$this->runtime->runtime->v1_cache : '0')).'|'.
		(($this->runtime->ID == 'ip') ? (($this->runtime->runtime->gwc_variables['vendor_only'] !== false) ? $this->runtime->runtime->gwc_variables['vendor_only'] : '') : ((isset($this->runtime->runtime->v2_cache)) ? (int)$this->runtime->runtime->v2_cache : '0')).'|'.
		(($this->runtime->ID == 'ip') ? (($this->runtime->runtime->ipv6) ? '6' : '4') : ((strlen($this->runtime->runtime->url_ip)) ? $this->runtime->runtime->url_ip : '')).'|');
	}
	protected function compile_client_stats() {
		return ($this->runtime->runtime->gwc_variables['client'].
		(($this->runtime->runtime->gwc_variables['version'] !== false) ? $this->runtime->runtime->gwc_variables['version'] : '').'|'.
		(($this->runtime->runtime->gwc_variables['ip'] !== false || $this->runtime->runtime->gwc_variables['ipv6'] !== false) ? '1' : '0').'|'.
		(($this->runtime->runtime->gwc_variables['url'] !== false) ? '1' : '0').'|'.
		(($this->runtime->runtime->gwc_variables['ping']) ? '1' : '0').'|'.
		(($this->runtime->runtime->gwc_variables['get'] || $this->runtime->runtime->gwc_variables['hostfile'] || $this->runtime->runtime->gwc_variables['urlfile']) ? '1' : '0').'|'.
		(($this->runtime->runtime->gwc_variables['info'] || $this->runtime->runtime->gwc_variables['support'] || $this->runtime->runtime->gwc_variables['statfile']) ? '1' : '0'));
	}
	protected function compile_retries($host, $bad_count=0) {
		return ($host.'|'.time().'|'.'Self-Add'.'|'.((string)$bad_count).'|');
	}
	protected function filter_bad($data) {
		$hosts = array();
		$filtered = array(
			'good'=>array(),
			'bad'=>array(),
			'expired'=>array()
		);
		if (!empty($data)) {
			while (count($data) > $this->maximum) {
				$filtered['bad'][] = array_shift($data);
			}
			foreach ($data as $line) {
				$host = $timestamp = '';
				list($host, $timestamp) = explode('|', $line);
				if (strlen($host) === 0 || strlen($timestamp) === 0 || in_array($host, $hosts)) {
					$filtered['bad'][] = $line;
				}
				elseif ((time() - (int)$timestamp) >= ($this->expire * 3600)) {
					$filtered['bad'][] = $line;
					$filtered['expired'][] = $host;
				}
				else {
					$filtered['good'][] = $line;
				}
				$hosts[] = $host;
			}
		}
		if (!empty($filtered['good'])) {
			$filtered['good'] = array_unique($filtered['good']);
		}
		if (!empty($filtered['bad'])) {
			$this->remove_bad(array_unique($filtered['bad']));
		}
		if (!empty($filtered['expired']) && (($this->runtime->ID == 'url' && settings::RETRY_URLS) or ($this->runtime->ID == 'bad_url' && settings::RETRY_BAD_URLS))) {
			$this->add_retry(array_unique($filtered['expired']));
		}
		return $filtered['good'];
	}
	protected function all_requests($shuffle, $number_out) {
		$contents = $this->contents = array_reverse($this->filter_bad($this->grab()));
		if (!empty($contents)) {
			($shuffle) ? shuffle($contents) : $contents = $contents;
			foreach ($contents as $key=>$value) {
				if (!$this->runtime->runtime->gwc_variables['getv6'] && $this->runtime->ID == 'ip') {	//Filter out IPv6 addresses when not requested...
					if ($value[0] == '[') {
						unset($contents[$key]);
					}
				}
			}
			if (count($contents) > $number_out) {
				while (count($contents) > $number_out) {
					array_shift($contents);
				}
			}
		}
		$this->output = $contents;
	}
	protected abstract function grab();
	protected abstract function update_stats();
	protected abstract function add_retry($retries);
	protected abstract function remove_bad($bad_lines);
	protected abstract function add();
	protected abstract function url_retry();
}
class files extends data_system {
	function __construct($runtime) {
		parent::__construct($runtime);
	}
	protected function file($handle) {
		$data = array();
		while(!feof($handle)) {
			if ($data_found = fgets($handle)) {
				if (strlen($data_found) >= 1) {
					$data_found = trim($data_found);
					if (strlen($data_found) >= 1) {
						$data[] = $data_found;
					}
				}
			}
		}
		@rewind($handle);	//We have to rewind, as there's a file-system bug in Unix that places a NULL character on data append for next operation.
		return $data;
	}
	protected function grab() {
		$file = @fopen($this->file, 'rb');
		$this->file_handle_check($file);
		flock($file, LOCK_SH);
		$contents = $this->file($file);
		flock($file, LOCK_UN);
		fclose($file);
		return $contents;
	}
	protected function file_handle_check($file) {
		if ($file === false) {	throw new Exception('Failed to open file '.$this->file);	}
	}
	protected function update_stats() {
		$file = @fopen($this->file, 'r+b');
		$this->file_handle_check($file);
		flock($file, LOCK_EX);
		if ($this->runtime->ID == 'stats_total_requests' || $this->runtime->ID == 'stats_total_updates') {
			$data = $this->file($file);
			ftruncate($file, 0);
			fwrite($file, (!empty($data) ? ($data[0] + 1) : '1'));
		}
		elseif ($this->runtime->ID == 'stats_client') {
			$data = $this->file($file);	$data2 = '';
			if (!empty($data) && count($data) >= settings::STATS_THROTTLE) {
				ftruncate($file, 0);
				while (count($data) >= settings::STATS_THROTTLE) {
					array_shift($data);
				}
				fwrite($file, implode("\r\n", $data)."\r\n".$this->compile_client_stats()."\r\n");
			}
			else {
				fseek($file, 0, SEEK_END);
				fwrite($file, $this->compile_client_stats()."\r\n");
			}
		}
		elseif ($this->runtime->ID == 'stats_requests' || $this->runtime->ID == 'stats_updates') {
			$outdated = false;
			$data = $this->file($file);	$data2 = '';
			if (!empty($data)) {
				foreach ($data as $time) {
					if ((time() - ((int)$time)) < 3600) {
						$data2 .= $time."\r\n";
					}
					else {
						$outdated = true;
					}
				}
				if ($outdated) {
					ftruncate($file, 0);
					if (!empty($data2)) {
						fwrite($file, $data2);
					}
				}
			}
			if (!$this->refresh) {
				if (!$outdated) {
					fseek($file, 0, SEEK_END);
				}
				fwrite($file,  time()."\r\n");
			}
		}
		flock($file, LOCK_UN);
		fclose($file);
	}
	protected function add_retry($retries) {
		$file = @fopen(settings::FOLDER.'/retry'.$this->runtime->network.'.dat', 'ab');
		$this->file_handle_check($file);
		flock($file, LOCK_EX);
		foreach ($retries as $host) {
			fwrite($file, $this->compile_retries($host)."\r\n");
		}
		flock($file, LOCK_UN);
		fclose($file);
	}
	protected function remove_bad($bad_lines) {
		$file = @fopen($this->file, 'r+b');
		$this->file_handle_check($file);
		flock($file, LOCK_EX);
		$data = $this->file($file);
		ftruncate($file, 0);
		foreach ($data as $line) {
			if (!in_array($line, $bad_lines)) {
				fwrite($file, $line."\r\n");
			}
		}
		flock($file, LOCK_UN);
		fclose($file);
	}
	protected function add() {
		$file = @fopen($this->file, 'ab');
		$this->file_handle_check($file);
		flock($file, LOCK_EX);
		fwrite($file, $this->compile_saves()."\r\n");
		flock($file, LOCK_UN);
		fclose($file);
	}
	protected function url_retry() {
		$file = @fopen($this->file, 'r+b');
		$this->file_handle_check($file);
		flock($file, LOCK_EX);
		$this->contents = $this->file($file);
		if (!empty($this->contents)) {
			$urls_to_retry = '';
			if (count($this->contents) > 1) {
				array_shift($this->contents);
				$urls_to_retry = implode("\r\n", $this->contents);
			}
			ftruncate($file, 0);
			fwrite($file, $urls_to_retry);
		}
		flock($file, LOCK_UN);
		fclose($file);
	}
}
abstract class mysql_routine_control extends data_system {
	protected static $connection = false;
	function __construct($runtime) {
		//Linking contructor call of lower classes with the data_system constructor:
		parent::__construct($runtime);
	}
	protected function grab() {
		$link = $this->query('SELECT data FROM '.$this->clean($this->name).' ORDER BY id;');
		$contents = array();
		if (!$this->error($link)) {
			while($row_returned = $this->mysql_fetch_row($link)) {
				$contents[] = $row_returned[0];
			}
		}
		return ((!empty($contents)) ? array_map('trim', $contents) : $contents);
	}
	protected function update_stats() {
		if ($this->runtime->ID == 'stats_total_requests' || $this->runtime->ID == 'stats_total_updates') {
			$data = array();
			$link = $this->query('SELECT data FROM '.$this->clean($this->name).' ORDER BY id;');
			if (!$this->error($link)) {
				while($row_returned = $this->mysql_fetch_row($link)) {
					$data[] = $row_returned[0];
				}
			}
			if (empty($data)) {
				$this->query('INSERT INTO '.$this->clean($this->name).'( data ) VALUES( \'1\' );');
			}
			else {
				$this->query('UPDATE '.$this->clean($this->name).' SET data = \''.($data[0] + 1).'\';');
			}
		}
		elseif ($this->runtime->ID == 'stats_client') {
			$link = $this->query('SELECT COUNT(data) as num_clients FROM '.$this->clean($this->name).' ORDER BY id;');
			if (!$this->error($link)) {
				$count = 0;
				if ($row_returned = $this->mysql_fetch_row($link)) {
					$count = (int)$row_returned[0];
				}
				if ($count > 0) {
					if ($count > (settings::STATS_THROTTLE * ((int)settings::STATS_CLIENT_FLUSH))) {
						$this->query('TRUNCATE TABLE '.$this->clean($this->name).';');
					}
				}
			}
			$this->query('INSERT INTO '.$this->clean($this->name).'( data ) VALUES( \''.$this->clean($this->compile_client_stats()).'\' );');
		}
		elseif ($this->runtime->ID == 'stats_requests' || $this->runtime->ID == 'stats_updates') {
			$this->query('DELETE FROM '.$this->clean($this->name).' WHERE data < '.(time() - 3600).';');
			if (!$this->refresh) {	$this->query('INSERT INTO '.$this->clean($this->name).'( data ) VALUES( \''.time().'\' );');	}
		}
	}
	protected function add_retry($retries) {
		foreach ($retries as $host) {
			$this->query('INSERT INTO retry'.$this->runtime->network.'( data ) VALUES( \''.$this->compile_retries($host).'\' );');
		}
	}
	protected function remove_bad($bad_lines) {
		$lines = array();
		foreach ($bad_lines as $line) {
			$lines[] = 'data = \''.$this->clean($line).'\'';
		}
		$this->query('DELETE FROM '.$this->clean($this->name).' WHERE '.implode(' OR ', $lines).';');
	}
	protected function add() {
		$this->query('INSERT INTO '.$this->clean($this->name).'( data ) VALUES( \''.$this->clean($this->compile_saves()).'\' );');
	}
	protected function url_retry() {
		$link = $this->query('SELECT data, id FROM '.$this->clean($this->name).' ORDER BY id;');
		if (!$this->error($link)) {
			if ($row_returned = $this->mysql_fetch_row($link)) {
				$this->contents[0] = $row_returned[0];
				$id = $row_returned[1];
			}
			if (isset($id)) {
				$this->query('DELETE FROM '.$this->clean($this->name).' WHERE id = \''.$this->clean($id).'\';');
			}
		}
	}
	///Below are the functions not executed by class data_system, but used instead by the child mysql handler classes:
	protected function generate_table() {
		return $this->direct_query('CREATE TABLE '.$this->clean($this->name).' ( id INT NOT NULL AUTO_INCREMENT, PRIMARY KEY( id ), data TEXT( 500 ) );');
	}
	protected function query($query) {
		$result = $this->direct_query($query);
		if ($this->error($result)) {
			$error_message = $this->obtain_error();
			if (!$this->error($this->generate_table())) {
				$result = $this->direct_query($query);
			}
			else {
				throw new Exception('MySQL: '.$error_message);
			}
		}
		return $result;
	}
	public abstract function clean($data);
	public abstract function mysql_fetch_row($link);
	public abstract function direct_query($query);
	public abstract function error($link);
	public abstract function obtain_error();
}
class mysql extends mysql_routine_control {
	public $fallback;
	function __construct($runtime) {
		if (self::$connection !== false) {
			parent::__construct($runtime);
		}
		else if ((self::$connection = @mysql_pconnect(settings::DBA_ADDRESS, settings::DBA_USERNAME, settings::DBA_PASSWORD)) === false) {
			$this->fallback = true;
		}
		else {
			if (@mysql_select_db(settings::DBA_NAME, self::$connection) !== false) {
				parent::__construct($runtime);
			}
			else {
				$this->fallback = true;
			}
		}
	}
	///Functions are public, as they are used by the class mysql_routine_control:
	public function clean($data) {
		return mysql_real_escape_string($data);
	}
	public function mysql_fetch_row($link) {
		return mysql_fetch_row($link);
	}
	public function direct_query($query) {
		return mysql_query($query, self::$connection);
	}
	public function error($link) {
		return (($link === false) ? true : false);
	}
	public function obtain_error() {
		return mysql_error();
	}
}
class mysql_adv extends mysql_routine_control {
	public $fallback;
	function __construct($runtime) {
		//Persistent connections are ignored in mysqli still, so static connection variable should return false.
		self::$connection = (self::$connection) ? self::$connection : new mysqli(settings::DBA_ADDRESS, settings::DBA_USERNAME, settings::DBA_PASSWORD, settings::DBA_NAME);
		(self::$connection->error || !self::$connection) ? $this->fallback = true : parent::__construct($runtime);
	}
	///Functions are public, as they are used by the class mysql_routine_control:
	public function clean($data) {
		return self::$connection->real_escape_string($data);
	}
	public function mysql_fetch_row($result) {
		return $result->fetch_row();
	}
	public function direct_query($query) {
		return self::$connection->query($query);
	}
	public function error($result) {
		return ((self::$connection->error !== '' || $result === false) ? true : false);
	}
	public function obtain_error() {
		return self::$connection->error;
	}
	function __destruct() {
		//Connection in mysqli NOT persistent, so must close.
		self::$connection->close();
	}
}
class data_manage {
	public $data;
	public $flow;
	public $ID;
	public $runtime;
	public $info;
	function __construct($runtime, $flow, $ID, $network='', $info=array()) {
		$this->ID = $ID;
		$this->flow = $flow;
		$this->network = strtolower((strlen($network) >= 1) ? '_'.$network : '');
		$this->runtime = $runtime;
		$this->info = $info;
		$this->decide();
	}
	public function decide() {
		switch (strtolower(settings::STORAGE)) {
			case 'mysql':
				$this->data = new mysql($this);
				break;
			case 'mysqli':
				$this->data = new mysql_adv($this);
				break;
			case 'flat':
				$this->data = new files($this);
				break;
			default:
				throw new Exception('Improper configuration/Invalid STORAGE value ( \''.settings::STORAGE.'\' )');
		}
		$this->data = (isset($this->data->fallback)) ? new files($this) : $this->data;
	}
}
class statistics {
	public $runtime;
	public $type;
	public $network;
	function __construct($runtime, $type, $network='') {
		$this->runtime = $runtime;
		$this->type = $type;
		$this->network = (string)$network;
	}
	public function output() {
		if (settings::ENABLE_HIT_STATS) {
			$stats_get = new data_manage($this->runtime, 'down', 'stats_total_requests', $this->network);
			(!empty($stats_get->data->contents)) ? $stats[0] = $stats_get->data->contents[0] : $stats[0] = 0;
			$stats_get = new data_manage($this->runtime, 'down', 'stats_total_updates', $this->network);
			(!empty($stats_get->data->contents)) ? $stats[0] += $stats_get->data->contents[0] : $stats[0] = $stats[0];
			$stats_get = new data_manage($this->runtime, 'down', 'stats_requests', $this->network);
			(!empty($stats_get->data->contents)) ? $stats[1] = count($stats_get->data->contents) : $stats[1] = '0';
			$stats_get = new data_manage($this->runtime, 'down', 'stats_updates', $this->network);
			(!empty($stats_get->data->contents)) ? $stats[2] = count($stats_get->data->contents) : $stats[2] = '0';
			$stat = implode("\r\n", $stats);
			return $stat."\r\n";
		}
		else {
			return '0'."\r\n".'0'."\r\n".'0'."\r\n";
		}
	}
	public function update() {
		if ($this->type == 'request'  && settings::ENABLE_HIT_STATS) {
			$stats_up = new data_manage($this->runtime, 'up', 'stats_total_requests', $this->network);
			$stats_up = new data_manage($this->runtime, 'up', 'stats_requests', $this->network);
		}
		elseif ($this->type == 'update' && settings::ENABLE_HIT_STATS) {
			$stats_up = new data_manage($this->runtime, 'up', 'stats_total_updates', $this->network);
			$stats_up = new data_manage($this->runtime, 'up', 'stats_updates', $this->network);
		}
		elseif ($this->type == 'client' && settings::WEB_FRONT && settings::ENABLE_CLIENT_STATS) {
			$stats_up = new data_manage($this->runtime, 'up', 'stats_client', $this->network);
		}
	}
}
class client_check {
	public $runtime;
	function __construct($runtime) {
		$this->runtime = $runtime;
	}
	public function bans($warns=array()) {
		$warnings = array();
		if (!empty($this->runtime->settings->BANNED)) {
			foreach ($this->runtime->settings->BANNED as $bad_ip) {
				if ($bad_ip == substr($this->runtime->env_variables['client_ip'], 0, strlen($bad_ip)))	{
					$warnings[] = 'Banned IP Address';
					break;
				}
			}
		}
		if (!empty($this->runtime->settings->VENDOR_CODE_BAN) && $this->runtime->gwc_variables['client'] !== false) {
			$client_modified = ($this->runtime->gwc_variables['version'] !== false) ? $this->runtime->gwc_variables['client'].$this->runtime->gwc_variables['version'] : $this->runtime->gwc_variables['client'];
			foreach ($this->runtime->settings->VENDOR_CODE_BAN as $bad_vendor) {
				if (stripos($client_modified, $bad_vendor) === 0) {
					$warnings[] = 'Banned Vendor Code';
					break;
				}
			}
		}
		if ($this->runtime->gwc_variables['ip'] !== false || $this->runtime->gwc_variables['ipv6'] !== false) {
			if (!empty($this->runtime->settings->VENDOR_CODE_IP_UPDATE_BAN) && $this->runtime->gwc_variables['client'] !== false) {
				$client_vendor_update = ($this->runtime->gwc_variables['version'] !== false) ? $this->runtime->gwc_variables['client'].$this->runtime->gwc_variables['version'] : $this->runtime->gwc_variables['client'];
				foreach ($this->runtime->settings->VENDOR_CODE_IP_UPDATE_BAN as $bad_update_vendor) {
					if (stripos($client_vendor_update, $bad_update_vendor) === 0) {
						$warnings[] = 'Vendor Code banned from updating an IP address';
					}
				}
			}
			if ($this->runtime->gwc_variables['cache']) {
				$warnings[] = 'IP updates from web caches not allowed';
			}
		}
		if ($this->runtime->env_variables['user_agent']) {
			if (!empty($this->runtime->settings->USER_AGENT_BAN)) {
				foreach ($this->runtime->settings->USER_AGENT_BAN as $bad_user_agent) {
					if (stripos($this->runtime->env_variables['user_agent'], $bad_user_agent) !== false) {
						$warnings[] = 'Banned User Agent';
						break;
					}
				}
			}
			if (!empty($this->runtime->settings->WHITELIST_USER_AGENT)) {
				$network_found = $whitelisted = false;
				foreach ($this->runtime->settings->WHITELIST_USER_AGENT as $good_user_agent=>$network) {
					if ($network == $this->runtime->gwc_variables['net']) {
						$network_found = true;
						if (stripos($this->runtime->env_variables['user_agent'], $good_user_agent) === 0) {
							$whitelisted = true;
							break;
						}
					}
				}
				if (!$whitelisted && $network_found) {
					$warnings[] = 'Banned by user agent whitelist';
				}
			}
			if ($this->runtime->env_variables['user_agent'] != 'Mozilla/4.0') {
				if (!empty($this->runtime->settings->BROWSER_DETECT) && ($this->runtime->gwc_variables['ip'] !== false || $this->runtime->gwc_variables['ipv6'] !== false)) {
					foreach ($this->runtime->settings->BROWSER_DETECT as $browser_user_agent) {
						if (stripos($this->runtime->env_variables['user_agent'], $browser_user_agent) !== false) {
							$warnings[] = 'Browser banned from updating an IP address';
							break;
						}
					}
				}
			}
			else {
				if ($this->runtime->gwc_variables['client'] !== false && !empty($this->runtime->settings->BAN_GDNA_CLONES)) {
					foreach ($this->runtime->settings->BAN_GDNA_CLONES as $banned_gdna_clone) {
						if (stripos($this->runtime->gwc_variables['client'], $banned_gdna_clone) !== false) {
							$warnings[] = 'GnucDNA clone banned from the cache';
							break;
						}
					}
				}
			}
		}
		else {
			if (($this->runtime->gwc_variables['ip'] !== false || $this->runtime->gwc_variables['ipv6'] !== false) && settings::BLOCK_NO_USER_AGENT) {
				$warnings[] = 'Clients with no user-agent banned from updating IP addresses';
			}
			elseif (settings::BLOCK_NO_USER_AGENT_ALL) {
				$warnings[] = 'Clients with no user-agent banned';
			}
		}
		if (!empty($warnings)) {
			header('HTTP/1.1 404 Not Found');
			if ($warnings && settings::LOG_BAN_WARNINGS) {
				$log = new data_manage($this->runtime, 'up', 'log', '', array('warnings'=>$warnings));
			}
		}
		return array_merge($warnings, $warns);
	}
}
class update {
	public $info;
	public $success;
	public $warnings;
	private $already_submitted;
	private $url_port;
	private $domain;
	private $folder;
	private $unsafe_folder;
	private $domain_without_port;
	private $ip_v1_found_in_cache;
	private $ip_v2_found_in_cache;
	private $url_v1_found_in_cache;
	private $url_v2_found_in_cache;
	private $v2_h_block_found;
	private $v2_u_block_found;
	private $v2_i_block_found;
	private $response_data;
	function __construct($info, $type, $network='') {
		$this->info = $info;
		$this->info->ip = '';
		$this->info->final_ip = '';
		$this->info->ipv6 = false;
		$this->info->url_ip = '';
		$this->success = false;
		$this->warnings = array();
		$this->info->host_count = 0;
		$this->info->url_count = 0;
		$this->info->pong = '';
		$this->info->v1_cache = false;
		$this->info->v2_cache = false;
		$this->already_submitted = false;
		$this->url_port = 80;
		$this->ip_v1_found_in_cache = false;
		$this->ip_v2_found_in_cache = false;
		$this->url_v1_found_in_cache = false;
		$this->url_v2_found_in_cache = false;
		$this->v2_h_block_found = false;
		$this->v2_u_block_found = false;
		$this->v2_i_block_found = false;
		$this->network = (string)$network;
		switch ($type) {
			case 'ip':
				$this->ip_validate();
				break;
			case 'url':
				$this->url_validate();
				break;
			case 'retry':
				$this->url_retry();
		}
		if (!empty($this->warnings)) {
			$this->logging();
		}
	}
	private function save($type) {
		switch ($type) {
			case 'ip':
			case 'ipv6':
			case 'bad_url':
			case 'url':
				$upline = new data_manage($this->info, 'up', $type, $this->network);
				break;
			default:
				throw new Exception('Bad ID ( \''.$type.'\' )');
		}
	}
	private function logging() {
		if (settings::LOG_UPDATE_WARNINGS) {
			$this->log = new data_manage($this->info, 'up', 'log', '', array('warnings'=>$this->warnings));
		}
	}
	private function url_retry() {
		if (settings::RETRY_URLS) {
			$grab = new data_manage($this->info, 'down', 'retry', $this->network);
			if (isset($grab->data->contents)) {
				if (!empty($grab->data->contents)) {
					if (strlen($grab->data->contents[0]) > 10) {
						$client_temp = $this->info->gwc_variables['client'].((strlen($this->info->gwc_variables['version']) >= 1) ? $this->info->gwc_variables['version'] : '');	$this->info->gwc_variables['version'] = '';
						list($this->info->gwc_variables['url'],,$this->info->gwc_variables['client']) = explode('|', $grab->data->contents[0]);
						$this->url_validate();
						$this->info->gwc_variables['client'] = $client_temp;
					}
				}
			}
		}
	}
	private function ipv6_check($ip) {
		if (strlen($ip) > 18) {
			if ((($units = substr_count($ip, ':')) > 2) && $ip[0] == '[' && substr_count($ip, ']') == 1) {
				$this->info->ip = substr(strtolower($ip), 1, strpos($ip, ']') - 1);	//I like lower-case hexidecimal digits...
				$this->info->port = substr($ip, strrpos($ip, ':') + 1);
				$ipv6 = explode(':', $this->info->ip);
				if (count($ipv6) == $units) {
					$zero_skip = false;
					foreach ($ipv6 as $ipv6_segment) {
						if (strlen($ipv6_segment) <= 4) {
							if (strlen($ipv6_segment) >= 1) {
								if (ereg('[^[:xdigit:]]', $ipv6_segment)) {
									$this->warnings[] = 'IP is not hexadecimal';
									break;
								}
							}
							else {
								if ($zero_skip || $units == 8) {
									$this->warnings[] = 'IP contains illegal format';
								}
								$zero_skip = true;
							}
						}
						else {
							$this->warnings[] = 'IP numerical segment too large';
							 break;
						}
					}
					$this->port_check();
				}
				else {
					$this->warnings[] = 'IP segment count wrong';
				}
			}
			else {
				$this->warnings[] = 'IP contains illegal format';
			}
		}
		else {
			$this->warnings[] = 'IP too short';
		}
		return (empty($this->warnings)) ? true : false;
	}
	private function ipv4_check($ip) {
		if (strlen($ip) > 8) {
			if (substr_count($ip, ':') === 1) {
				list($this->info->ip, $this->info->port) = explode(':', $ip);
				$ipv4 = explode('.', $this->info->ip);
				if (count($ipv4) == 4) {
					foreach ($ipv4 as $ipv4_segment) {
						if (strlen($ipv4_segment) >= 1 && strlen($ipv4_segment) <= 3) {
							if (ctype_digit($ipv4_segment)) {
								if ($ipv4_segment > 255) {
									$this->warnings[] = 'IP numerical segment out-of-bounds';
									break;
								}
							}
							else {
								$this->warnings[] = 'IP numerical segment contains illegal format';
								break;
							}
						}
						else {
							$this->warnings[] = 'IP numerical segment too large';
							 break;
						}
					}
					$this->port_check();
				}
				else {
					$this->warnings[] = 'IP segment count wrong';
				}
			}
			else {
				$this->warnings[] = 'IP contains illegal format';
			}
		}
		else {
			$this->warnings[] = 'IP too short';
		}
		return (empty($this->warnings)) ? true : false;
	}
	private function port_check() {
		if (empty($this->warnings)) {
			if (strlen($this->info->port) >= 1 && strlen($this->info->port) <= 5) {
				if (ctype_digit($this->info->port)) {
					if ($this->info->port < 1 || $this->info->port > 65535) {
						$this->warnings[] = 'Port number out of bounds';
					}
				}
				else {
					$this->warnings[] = 'Port number contains illegal characters';
				}
			}
			else {
				$this->warnings[] = 'Illegal length of the port number';
			}
		}
	}
	private function ip_validate() {
		if (settings::EXPIRE_HOSTS > 0) {
			if ($this->info->gwc_variables['ip'] !== false && $this->ipv4_check($this->info->env_variables['client_ip'].':1')) {
				$this->success = $this->ipv4_check($this->info->gwc_variables['ip']);
			}
			elseif ($this->info->gwc_variables['ipv6'] !== false && $this->ipv6_check('['.$this->info->env_variables['client_ip'].']:1')) {
				$this->info->ipv6 = true;
				$this->success = $this->ipv6_check($this->info->gwc_variables['ipv6']);
			}
			else {
				throw new Exception('IP version incompatible');
			}
			if ($this->success) {
				if (inet_pton($this->info->env_variables['client_ip']) !== inet_pton($this->info->ip)) {
					$this->success = false;
					$this->warnings[] = 'IP is not self';
				}
			}
			if ($this->success) {
				//Check to see if overwriting of given IP is needed...
				if (!empty($this->info->settings->IP_EXCEPTION)) {
					if (in_array($this->network, $this->info->settings->IP_EXCEPTION)) {
						$this->info->ip = $this->info->env_variables['client_ip'];
					}
				}
				//Merge IP back into one...
				$this->info->final_ip = (($this->info->ipv6) ? '['.$this->info->ip.']' : $this->info->ip).':'.$this->info->port;
				//Check if already in cache...
				$grab = new data_manage($this->info, 'down', 'ip', $this->network);
				if (isset($grab->data->contents)) {
					if (!empty($grab->data->contents)) {
						foreach ($grab->data->contents as $listing) {
							list($ip_selected,,,,,,,,$ip_type) = explode('|', $listing);
							$ip_selected_no_port = ($ip_type != 6) ? substr($ip_selected, 0, strpos($ip_selected, ':')) : substr($ip_selected, 1, strrpos($ip_selected, ']') - 1);
							if (inet_pton($this->info->ip) === inet_pton($ip_selected_no_port)) {
								$this->success = false;
								$this->warnings[] = 'Already Submitted';
								break;
							}
						}
					}
				}
				($this->success) ? $this->save('ip') : $this->success = true;
			}
		}
		else {
			throw new Exception('Cache settings error');	//Give ERROR, as this setting is critical.
		}
	}
	private function url_validate() {
		if (strlen($this->info->gwc_variables['url']) > 10) {
			if (strlen($this->info->gwc_variables['url']) < 256) {
				if (strpos($this->info->gwc_variables['url'], 'http://') === 0) {
					if (stripos($this->info->gwc_variables['url'], 'nyud.net') === false && stripos($this->info->gwc_variables['url'], 'nyucd.net') === false) {
						$url_without_http = substr($this->info->gwc_variables['url'], 7);
						$first_dot = strpos($url_without_http, '.');
						$first_slash = strpos($url_without_http, '/');
						if ($first_dot !== false && $first_slash !== false) {
							if ($first_slash > 3) {
								if ($first_dot < $first_slash) {
									if (strpos($url_without_http, './') === false && strpos($url_without_http, '//') === false && strpos($url_without_http, '/.') === false) {
										$last_slash = strrpos($url_without_http, '/');
										$last_q_mark = strrpos($url_without_http, '?');
										if ($last_q_mark === false || $last_slash > $last_q_mark) {
											$this->test_gwc($url_without_http);
										}
										else {
											$this->warnings[] = 'No query string in the URL allowed';
										}
									}
									else {
										$this->warnings[] = 'Illegal format';
									}
								}
								else {
									$this->warnings[] = 'Impossible URL';
								}
							}
							else {
								$this->warnings[] = 'Domain is too short';
							}
						}
						else {
							$this->warnings[] = 'Missing needed URL character';
						}
					}
					else {
						$this->warnings[] = 'nyud.net not allowed';
					}
				}
				else {
					$this->warnings[] = 'HTTP only';
				}
			}
			else {
				$this->warnings[] = 'URL too long';
			}
		}
		else {
			$this->warnings[] = 'URL too short';
		}
	}
	private function domain_compute($url) {
		$domain_length = strpos($url, '/');
		$this->domain = strtolower(substr($url, 0, $domain_length));
		$this->unsafe_folder = substr($url, $domain_length);
		$this->folder = $this->info->convert_out_of_set_chars($this->unsafe_folder);	//To encode out-of-set chars...
		$this->info->gwc_variables['url'] = 'http://'.$this->domain.$this->unsafe_folder;
	}
	private function compare_domains($url) {
		$domain_url = substr($url, 0, strpos($url, '/'));
		if ($port_begin = strpos($domain_url, ':')) {
			$domain_url = substr($domain_url, 0, $port_begin);
		}
		return ((strtolower($domain_url) == $this->domain_without_port) ? true : false);
	}
	private function port_obtain() {
		if ($port_begin = strpos($this->domain, ':')) {
			$this->url_port = substr($this->domain, ($port_begin + 1));
			$this->domain_without_port = substr($this->domain, 0, $port_begin);
			if (strlen($this->url_port) === 0) {
				//This check added for PHP 5.0.X returning true on an empty string to ctype_digit().
				$this->warnings[] = 'Port number is zero-length';
			}
			elseif (!ctype_digit($this->url_port)) {
				$this->warnings[] = 'Port number contains illegal characters';
			}
			elseif (((int)$this->url_port) == 80) {
				$this->info->gwc_variables['url'] = 'http://'.$this->domain_without_port.$this->unsafe_folder;
			}
			if ($this->url_port != 80 && !settings::NON_HTTP && settings::FSOCKOPEN && function_exists('fsockopen')) {
				$this->warnings[] = 'Port of URL is out of reach for this cache';
			}
			$this->url_port = (int)$this->url_port;
		}
		else {
			 $this->domain_without_port = $this->domain;
		}
	}
	private function compare_pong($pong) {
		if (strlen($pong) >= 1) {
			if (strlen($pong) > 100) {	$pong = substr($pong, 0, 100);	}
			if (!empty($this->info->settings->BANNED_PONGS)) {
				foreach ($this->info->settings->BANNED_PONGS as $bad_pong) {
					if (strtolower($bad_pong) == strtolower(substr($pong, 0, strlen($bad_pong))) && strlen($bad_pong) >= 1) {
						$this->warnings[] = 'Banned PONG response found';
						break;
					}
				}
			}
		}
		return $pong;
	}
	private function test_prechecks() {
		if (empty($this->warnings)) {
			if (!empty($this->info->settings->BANNED_URLS)) {
				if (in_array($this->info->gwc_variables['url'], $this->info->settings->BANNED_URLS)) {
					$this->warnings[] = 'Permanently banned URL';
				}
			}
		}
		if (ip2long($this->domain_without_port) && !settings::IP_ALT_CACHES) {
			$this->warnings[] = 'IP addresses not accepted';
		}
		if (empty($this->warnings)) {
			$grab = new data_manage($this->info, 'down', 'bad_url', $this->network);
			if (isset($grab->data->contents)) {
				if (!empty($grab->data->contents)) {
					foreach ($grab->data->contents as $listing) {
						list($bracketless_url) = explode('|', $listing);
						if (strtolower($this->info->gwc_variables['url']) == strtolower($bracketless_url)) {
							$this->warnings[] = 'Temporarily banned URL';
							$this->success = false;
							break;
						}
					}
				}
			}
		}
		if (empty($this->warnings)) {
			$this->info->url_ip = gethostbyname($this->domain_without_port);
			$grab = new data_manage($this->info, 'down', 'url', $this->network);
			if (isset($grab->data->contents)) {
				if (!empty($grab->data->contents)) {
					foreach ($grab->data->contents as $listing) {
						list($bracketless_url,,,,,,,,$server_ip) = explode('|', $listing);
						if ($this->compare_domains(substr($bracketless_url, 7)) || $this->info->url_ip == $server_ip) {
							$this->already_submitted = true;
							$this->warnings[] = 'Already Submitted';
							$this->success = true;
							break;
						}
					}
				}
			}
		}
	}
	private function obtain_socket_out($query='', $read_stream=true) {
		$this->response_data = array();
		$begin_time = time();
		$socket = @fsockopen($this->domain, $this->url_port, $errno, $errstr, settings::TIMEOUT);
		if ($socket) {
			$writing = 'GET '.$this->folder.$query.' HTTP/1.0'."\r\n";
			$writing .= 'Host: '.$this->domain."\r\n";
			$writing .= 'User-Agent: '.settings::CACHE_NAME.' '.settings::CACHE_VERSION.' ('.settings::CACHE_VENDOR.')'."\r\n";
			$writing .= 'Connection: Close'."\r\n\r\n";
			fwrite($socket, $writing);
			stream_set_blocking($socket, 0);
			stream_set_timeout($socket, settings::TIMEOUT - time() + $begin_time);
			if ($read_stream) {
				return $this->obtain_and_sort($socket);
			}
			fclose($socket);
			return true;
		}
		return false;
	}
	private function check_for_timeout($socket) {
		$info = stream_get_meta_data($socket);
		return $info['timed_out'];
	}
	private function obtain_and_sort($socket) {
		$data = '';
		while (!feof($socket) && !$this->check_for_timeout($socket)) {
			if (false !== ($incoming = fgetc($socket))) {
				$data .= $incoming;
			}
		}
		fclose($socket);
		if (!empty($data)) {
			if (false !== ($offset = strpos($data, "\r\n\r\n"))) {
				$data = substr($data, $offset + 4);
				$this->response_data = explode("\n", $data);
				$this->response_data = array_map('rtrim', $this->response_data);
				return true;
			}
		}
		return false;
	}
	private function test_gwc($url) {
		if ($this->info->env_variables['url'] != $url && $this->info->env_variables['url'] != $this->info->convert_out_of_set_chars($url)) {
			$this->domain_compute($url);
			$this->port_obtain();
			if (empty($this->warnings) && settings::EXPIRE_URLS > 0) {
				$this->test_prechecks();
				if (empty($this->warnings) && !$this->already_submitted) {
					if (settings::FSOCKOPEN && function_exists('fsockopen')) {
						$query_base = '?client=TEST&version='.$this->info->convert_out_of_set_chars(settings::CACHE_VENDOR.' '.settings::CACHE_VERSION).'&getnetworks=1&cache=1';
						$query_net = '&net='.urlencode($this->network);
						$query_ping = '&ping=1';
						$query_get = '&get=1&hostfile=1';
						$query_update_url = '&update=1&url='.urlencode('http://'.$this->info->env_variables['url']);
						$mute_cache = false;
						if ($this->obtain_socket_out($query_base.$query_net.$query_ping)) {
							foreach ($this->response_data as $line) {
								if (!empty($this->warnings)) {	break;	}
								if (empty($line)) {	continue;	}
								$v2_break_feed = explode('|', strtolower($line));
								$v2_break_feed_i = explode('|', $line);
								if (count($v2_break_feed) >= 2) {
									$this->info->v2_cache = true;
									switch ($v2_break_feed[0]) {
										case 'i':
											$this->v2_i_block_found = true;
											switch ($v2_break_feed[1]) {
												case 'error':
													$this->warnings[] = 'Query Error';
													break;
												case 'net-not-supported':
													$this->warnings[] = 'Network not supported';
													break;
												case 'pong':
													if (count($v2_break_feed) >= 3) {
														$this->info->pong = $this->compare_pong($this->info->strip_chars($v2_break_feed_i[2]));
														if (count($v2_break_feed) >= 4) {
															$networks_supported = explode('-', $v2_break_feed[3]);
															foreach ($networks_supported as $network_supported) {
																if ($this->network == strtolower($network_supported)) {	break 2;	}
															}
															$this->warnings[] = 'Network not supported';
														}
													}
													else {
														$this->warnings[] = 'Pong is incomplete';
													}
													break;
												case 'networks':
													if (count($v2_break_feed) >= 3) {
														$index = 2;
														while (isset($v2_break_feed[$index])) {
															if ($this->network == strtolower($v2_break_feed[$index])) {	break 2;	}
															$index++;
														}
														$this->warnings[] = 'Network not supported';
													}
													else {
														$this->warnings[] = 'Incomplete informational tag';
													}
													break;
												case 'nets':
													if (count($v2_break_feed) >= 3) {
														$networks_supported = explode('-', $v2_break_feed[2]);
														foreach ($networks_supported as $network_supported) {
															if ($this->network == strtolower($network_supported)) {	break 2;	}
														}
														$this->warnings[] = 'Network not supported';
													}
													else {
														$this->warnings[] = 'Incomplete informational tag';
													}
											}
											break;
										case 'u':
										case 'h':
											$this->warnings[] = 'Non-requested data found';
											break;
										case '<':	//Easy way to detect an HTML doc.
											$this->warnings[] = 'HTML-like format detected';
									}
								}
								else {
									switch ($v2_break_feed[0]) {
										case 'u':
										case 'h':
										case 'i':
										case 'd':	//Used by jon atkin's cache... (debug)
										case 'ukhl':	//Reserved
										case 'uhc':	//Reserved
											$this->info->v2_cache = true;
											$this->warnings[] = 'Incomplete data tag found';
											break;
										default:
											$this->info->v1_cache = true;		
									}
									if (stripos($line, '<') !== false) {
										$this->warnings[] = 'HTML-like format detected';
									}
									elseif (stripos($line, 'ERROR: Network not supported') === 0) {
										$this->warnings[] = 'Network not supported';
									}
									elseif (stripos($line, 'ERROR') !== false) {
										$this->warnings[] = 'Ping Error';
									}
									elseif (strpos($line, 'PONG') === 0) {
										if (strpos($line, 'PONG MWebCache') === 0) {
											if ($this->network != 'mute') {
												$this->warnings[] = 'Bugged Mute-Net cache detected';
											}
											elseif (strpos($line, 'PONG MWebCache 0.1.1') === 0) {
												$this->warnings[] = 'Bugged Mute-Net cache(vs. 0.1.1) detected';
											}
											else {
												$mute_cache = true;
											}
										}
										$this->info->pong = $this->compare_pong($this->info->strip_chars(substr($line, 5)));
									}
									elseif (stripos($line, 'WARNING') === 0) {
										$this->warnings[] = 'Warning message found';
									}
									else {
										$this->warnings[] = 'Invalid data';
									}
								}
							}
							if ($this->info->pong === '' && empty($this->warnings)) { 
								$this->warnings[] = 'No PONG found';
							}
							elseif (empty($this->warnings)) {
								if ($this->obtain_socket_out($query_base.$query_net.$query_get)) {
									foreach ($this->response_data as $line) {
										if (!empty($this->warnings)) {	break;	}
										if (empty($line)) {	continue;	}
										$v2_break_feed = explode('|', strtolower($line));
										if (count($v2_break_feed) >= 2) {
											$this->info->v2_cache = true;
											switch ($v2_break_feed[0]) {
												case 'u':
													$this->v2_u_block_found = true;
													if (stripos($v2_break_feed[1], 'http://') === 0) {
														$this->url_v2_found_in_cache = true;
														$this->info->url_count++;
													}
													break;
												case 'h':
													$this->v2_h_block_found = true;
													if (!empty($v2_break_feed[1]) && strpos($v2_break_feed[1], ':') !== false) {
														if ($this->ipv4_check($v2_break_feed[1]) || $this->ipv6_check($v2_break_feed[1])) {
															$this->ip_v2_found_in_cache = true;
															$this->info->host_count++;
														}
														else {
															$this->warnings[] = 'Invalid IP found';
														}
													}
													break;
												case 'i':
													$this->v2_i_block_found = true;
													switch ($v2_break_feed[1]) {
														case 'error':
															$this->warnings[] = 'Query Error';
															break;
														case 'net-not-supported':
															$this->warnings[] = 'Network not supported';
															break;
														case 'pong':
															$this->warnings[] = 'PONG found on no ping';
													}
													break;
												case '<':	//Easy way to detect an HTML doc.
													$this->warnings[] = 'HTML-like format detected';
											}
										}
										else {
											switch ($v2_break_feed[0]) {
												case 'u':
												case 'h':
												case 'i':
												case 'd':	//Used by jon atkin's cache... (debug)
												case 'ukhl':	//Reserved
												case 'uhc':	//Reserved
													$this->info->v2_cache = true;
													$this->warnings[] = 'Incomplete data tag found';
													break 2;
												default:
													$this->info->v1_cache = true;
													
											}
											if (stripos($line, 'ERROR: Network not supported') === 0) {
												$this->warnings[] = 'Network not supported';
											}
											elseif (stripos($line, 'ERROR') === 0) {
												$this->warnings[] = 'Query Error';
											}
											elseif (strpos($line, 'PONG') === 0) {
												$this->warnings[] = 'PONG found on no ping';
											}
											elseif (stripos($line, 'http://') === 0) {
												$this->info->url_count++;
												$this->url_v1_found_in_cache = true;
											}
											elseif (stripos($line, '<') !== false) {
												$this->warnings[] = 'HTML-like format detected';
											}
											elseif ($line[0] == '[') {
												if ($this->ipv6_check($line)) {
													$this->ip_v1_found_in_cache = true;
													$this->info->host_count++;
												}
												else {
													$this->warnings[] = 'Invalid IP found';
												}
											}
											elseif (substr_count($line, '.') == 3 && strpos($line, ':') !== false) {
												if ($this->ipv4_check($line)) {
													$this->ip_v1_found_in_cache = true;
													$this->info->host_count++;
												}
												else {
													$this->warnings[] = 'Invalid IP found';
												}
											}
											elseif (stripos($line, 'WARNING') === 0) {
												$this->warnings[] = 'Warning message found';
											}
											else {
												$this->warnings[] = 'Invalid data';
											}
										}
									}
									if (empty($this->warnings)) {
										if (!$this->info->v2_cache) {
											if ($this->network != 'gnutella' && $this->network != 'mute') {
												$this->warnings[] = 'No GWC-type(v2) output detected';
											}
											elseif ($this->network == 'mute' && !$mute_cache) {
												$this->warnings[] = 'URL is not a MUTE cache';
											}
											elseif ($this->url_v1_found_in_cache) {
												$this->warnings[] = 'Invalid GWC-type(v1) output detected';
											}
											elseif (!$this->ip_v1_found_in_cache) {
												$this->warnings[] = 'No GWC-type(v1) output detected';
											}
										}
										elseif (!$this->ip_v2_found_in_cache && $this->v2_h_block_found) {
											$this->warnings[] = 'Invalid GWC-type(v2) IP output detected';
										}
										elseif (!$this->url_v2_found_in_cache && $this->v2_u_block_found) {
											$this->warnings[] = 'Invalid GWC-type(v2) URL output detected';
										}
										if (empty($this->warnings)) {
											if (settings::UPDATE_SELF_TO_REMOTE) {
												$this->obtain_socket_out($query_base.$query_net.$query_update_url, false);
											}
											$this->save('url');
											$this->success = true;
										}
									}
								}
								else {
									$this->warnings[] = 'Failed to connect';
								}
							}
						}
						else {
							$this->warnings[] = 'Failed to connect';
						}
						if (!empty($this->warnings) && !$this->success) {
							$this->info->gwc_variables['bad_url'] = $this->info->gwc_variables['url'];
							$this->save('bad_url');
						}
					}
					else {
						$this->save('url');
						$this->success = true;
					}
				}
			}
		}
		else {
			$this->warnings[] = 'URL is of this script';
		}
	}
}
class spec1 {
	public $runtime;
	public $execute;
	function __construct($runtime) {
		$this->runtime = $runtime;
		try {
			$this->decide();
		}
		catch (Exception $error) {
			die('ERROR: '.$this->runtime->strip_chars($error->getMessage())."\r\n");
		}
	}
	private function decide() {
		if (!settings::ENABLE_V1) {	throw new Exception('Specification 1 disabled');	}
		if (!empty($this->runtime->warn)) {	die($this->warn($this->runtime->warn));	}
		if ($this->runtime->gwc_variables['ping']) {	$this->ping();	}
		if ($this->runtime->gwc_variables['getnetworks']) {	$this->getnetworks();	}
		if ($this->runtime->gwc_variables['ip'] !== false || $this->runtime->gwc_variables['ipv6'] !== false) {	$this->cache_host();	}
		if ($this->runtime->gwc_variables['url'] !== false) {	$this->cache_url();	}
		if ($this->runtime->gwc_variables['hostfile'] || $this->runtime->gwc_variables['get']) {	$this->hosts();	}
		if ($this->runtime->gwc_variables['urlfile'] || $this->runtime->gwc_variables['get']) {	$this->urls();	}
		if ($this->runtime->gwc_variables['statfile']) {	$this->stats();	}
		$this->runtime->resolve_services();
	}
	private function ping() {
		echo('PONG '.settings::CACHE_NAME.' '.settings::CACHE_VERSION."\r\n");
	}
	private function getnetworks() {
		echo('nets: '.implode('-', $this->runtime->settings->NETWORKS)."\r\n");
	}
	private function hosts() {
		$grab = new data_manage($this->runtime, 'down', 'ip', $this->runtime->gwc_variables['net']);
		if (!empty($grab->data->output)) {
			foreach ($grab->data->output as $ip) {
				list($host, $time) = explode('|', $ip);
				$time_ = time() - $time;
				echo($host."\r\n");
			}
		}
		else {	echo("0.0.0.0:0\r\n");	}
	}
	private function urls() {
		$grab = new data_manage($this->runtime, 'down', 'url', $this->runtime->gwc_variables['net']);
		if (!empty($grab->data->output)) {
			foreach ($grab->data->output as $url) {
				list($host, $time) = explode('|', $url);
				$time_ = time() - $time;
				echo($this->runtime->convert_out_of_set_chars($host)."\r\n");
			}
		}
		else {	echo('http://'.$this->runtime->convert_out_of_set_chars($this->runtime->env_variables['url'])."\r\n");	}
	}
	private function stats() {
		$this->stats = new statistics($this->runtime, 'request', $this->runtime->gwc_variables['net']);
		echo($this->stats->output());
	}
	private function cache_host() {
		$update_host = new update($this->runtime, 'ip', $this->runtime->gwc_variables['net']);
		echo("OK\r\n");
		$this->execute['ok'] = true;
		if (!empty($update_host->warnings)) {
			$this->warn($update_host->warnings);
		}
	}
	private function cache_url() {
		$update_url = new update($this->runtime, 'url', $this->runtime->gwc_variables['net']);
		if (isset($this->execute['ok']) == false) {
			echo("OK\r\n");
		}
		if (!empty($update_url->warnings)) {
			$this->warn($update_url->warnings);
		}
	}
	private function warn($warnings) {
		foreach ($warnings as $warning) {
			echo('WARNING: '.$this->runtime->strip_chars($warning)."\r\n");
		}
	}
}
class spec2 {
	public $runtime;
	public $execute;
	function __construct($runtime) {
		$this->runtime = $runtime;
		try {
			$this->decide();
		}
		catch (Exception $error) {
			die('I|ERROR|'.$this->runtime->strip_chars($error->getMessage())."\r\n");
		}
	}
	private function decide() {
		if (!settings::ENABLE_V2) {	throw new Exception('Specification 2 disabled');	}
		if (!empty($this->runtime->warn)) {	die($this->warn($this->runtime->warn));	}
		if ($this->runtime->gwc_variables['ping']) {	$this->ping();	}
		if ($this->runtime->gwc_variables['ping'] || $this->runtime->gwc_variables['getnetworks']) {	$this->getnetworks();	}
		if ($this->runtime->gwc_variables['ip'] !== false || $this->runtime->gwc_variables['ipv6'] !== false) {	$this->cache_host();	}
		if ($this->runtime->gwc_variables['url'] !== false) {	$this->cache_url();	}
		if ($this->runtime->gwc_variables['hostfile'] || $this->runtime->gwc_variables['get']) {	$this->hosts();	}
		if ($this->runtime->gwc_variables['urlfile'] || $this->runtime->gwc_variables['get']) {	$this->urls();	}
		if ($this->runtime->gwc_variables['statfile']) {	$this->stats();	}
		if ($this->runtime->gwc_variables['info']) {	$this->extra('info');	}
		if ($this->runtime->gwc_variables['support']) {	$this->extra('support');	}
		$this->runtime->resolve_services();
		echo('I|access|period|3300'."\r\n");
	}
	private function ping() {
		echo('I|pong|'.settings::CACHE_NAME.' '.settings::CACHE_VERSION.'|'.implode('-', $this->runtime->settings->NETWORKS)."\r\n");
	}
	private function getnetworks() {
		echo('I|networks|'.implode('|', $this->runtime->settings->NETWORKS)."\r\n");
		echo('I|nets|'.implode('-', $this->runtime->settings->NETWORKS)."\r\n");
	}
	private function hosts() {
		$grab = new data_manage($this->runtime, 'down', 'ip', $this->runtime->gwc_variables['net']);
		if (!empty($grab->data->output)) {
			foreach ($grab->data->output as $ip) {
				list($host, $time, , $cluster, $leaves, $uptime, $max_leaves, $vendor) = explode('|', $ip);
				$time_ = time() - $time;
				$cluster_ = ((!empty($cluster) && $this->runtime->gwc_variables['getclusters']) ? $cluster : '');
				$leaves_ = (((!empty($leaves) || $leaves === '0') and $this->runtime->gwc_variables['getleaves']) ? $leaves : '');
				$vendor_ = ((!empty($vendor) && $this->runtime->gwc_variables['getvendors']) ? $vendor : '');
				$uptime_ = ((!empty($uptime) || $uptime === '0') and $this->runtime->gwc_variables['getuptime']) ? $uptime : '';
				$max_leaves_ = ((!empty($max_leaves) || $max_leaves === '0') and $this->runtime->gwc_variables['getleaves']) ? $max_leaves : '';
				$request_build = 'H|'.$host.'|'.$time_;
				//Pattern used below to output the available data without 'ghost' || brackets:
				if (strlen($cluster_) || strlen($leaves_) || strlen($vendor_) || strlen($uptime_) || strlen($max_leaves_)) {
					if (strlen($cluster_)) {
						$request_build .= '|'.$cluster_;
					}
					elseif (strlen($leaves_) || strlen($vendor_) || strlen($uptime_) || strlen($max_leaves_)) {
						$request_build .= '|';
					}
					if (strlen($leaves_) || strlen($vendor_) || strlen($uptime_) || strlen($max_leaves_)) {
						if (strlen($leaves_)) {
							$request_build .= '|'.$leaves_;
						}
						elseif (strlen($vendor_) || strlen($uptime_) || strlen($max_leaves_)) {
							$request_build .= '|';
						}
						if (strlen($vendor_) || strlen($uptime_) || strlen($max_leaves_)) {
							if (strlen($vendor_)) {
								$request_build .= '|'.$vendor_;
							}
							elseif (strlen($uptime_) || strlen($max_leaves_)) {
								$request_build .= '|';
							}
							if (strlen($uptime_) || strlen($max_leaves_)) {
								if (strlen($uptime_)) {
									$request_build .= '|'.$uptime_;
								}
								elseif (strlen($max_leaves_)) {
									$request_build .= '|';
								}
								if (strlen($max_leaves_)) {
									$request_build .= '|'.$max_leaves_;
								}
							}
						}
					}
				}
				echo($request_build."\r\n");
			}
		}
		else {	echo('I|NO-HOSTS'."\r\n".'H|0.0.0.0:0'."\r\n");	}
	}
	private function urls() {
		$grab = new data_manage($this->runtime, 'down', 'url', $this->runtime->gwc_variables['net']);
		if (!empty($grab->data->output)) {
			foreach ($grab->data->output as $url) {
				list($host, $time) = explode('|', $url);
				$time_ = time() - $time;
				echo('U|'.$this->runtime->convert_out_of_set_chars($host).'|'.$time_."\r\n");
			}
		}
		else {	echo('I|NO-URL'."\r\n".'U|http://'.$this->runtime->convert_out_of_set_chars($this->runtime->env_variables['url'])."\r\n");	}
	}
	private function cache_host() {
		$update_host = new update($this->runtime, 'ip', $this->runtime->gwc_variables['net']);
		echo('I|update|OK'.(($update_host->success) ? ((!empty($update_host->warnings)) ? '|HOST|WARNING|'.$this->runtime->strip_chars(implode('; ', $update_host->warnings)) : '|HOST|GOOD') : '|HOST|WARNING|BAD|'.$this->runtime->strip_chars(implode('; ', $update_host->warnings)))."\r\n");
		echo('I|update|period|'.(settings::EXPIRE_HOSTS * 3600)."\r\n");	$this->execute['update'] = true;
	}
	private function cache_url() {
		$update_url = new update($this->runtime, 'url', $this->runtime->gwc_variables['net']);
		echo('I|update|OK'.(($update_url->success) ? ((!empty($update_url->warnings)) ? '|URL|WARNING|'.$this->runtime->strip_chars(implode('; ', $update_url->warnings)) : '|URL|GOOD') : '|URL|WARNING|BAD|'.$this->runtime->strip_chars(implode('; ', $update_url->warnings)))."\r\n");
		if ($this->execute['update'] == false) {	echo('I|update|period|'.(settings::EXPIRE_HOSTS * 3600)."\r\n");	}
	}
	private function stats() {
		$this->stats = new statistics($this->runtime, 'request', $this->runtime->gwc_variables['net']);
		echo($this->stats->output());
	}
	private function extra($type) {
		switch ($type) {
			case 'info':
				echo('I|name|'.settings::CACHE_NAME."\r\n");
				echo('I|ver|'.settings::CACHE_VERSION."\r\n");
				echo('I|vendor|'.settings::CACHE_VENDOR."\r\n");
				echo('I|gwc-site|http://sourceforge.net/projects/beaconcache/'."\r\n");
				echo('I|open-source|1'."\r\n");
				$stats1 = $stats2 = $stats3 = array();
				foreach ($this->runtime->settings->NETWORKS as $temp_net) {
					$this->stats = new statistics($this->runtime, 'request', $temp_net);
					$stats_out_dump = $this->stats->output();
					echo('I|stats|'.$temp_net.'|'.implode('|', explode("\r\n", $stats_out_dump))."\r\n");
					list($stats1[], $stats2[], $stats3[]) = explode("\r\n", $stats_out_dump);
				}
				echo('I|combined-stats|'.array_sum($stats1).'|'.array_sum($stats2).'|'.array_sum($stats3)."|\r\n");
				break;
			case 'support':
				if (is_array($this->runtime->settings->NETWORKS)) {
					foreach ($this->runtime->settings->NETWORKS as $network) {
						echo('I|support|'.$network."\r\n");
					}
				}
				if (is_array($this->runtime->settings->NETWORKS_ALT)) {
					if (!empty($this->runtime->settings->NETWORKS_ALT)) {
						foreach ($this->runtime->settings->NETWORKS_ALT as $alt_network=>$network) {
							echo('I|alternate-net-names|'.$alt_network.'|'.$network."\r\n");
						}
					}
				}
				echo('I|storage-type|'.settings::STORAGE."\r\n");
				echo('I|hosts-in|'.settings::HOSTS_IN."\r\n");
				echo('I|hosts-out|'.settings::HOSTS_OUT."\r\n");
				echo('I|urls-in|'.settings::URLS_IN."\r\n");
				echo('I|urls-out|'.settings::URLS_OUT."\r\n");
				echo('I|banned-urls-in|'.settings::BANNED_URLS_IN."\r\n");
				echo('I|shuffle-hosts|'.settings::SHUFFLE_HOSTS."\r\n");
				echo('I|shuffle-urls|'.settings::SHUFFLE_URLS."\r\n");
				echo('I|expire-hosts|'.settings::EXPIRE_HOSTS."\r\n");
				echo('I|expire-urls|'.settings::EXPIRE_URLS."\r\n");
				echo('I|expire-banned-urls|'.settings::EXPIRE_BANNED_URLS."\r\n");
				echo('I|default-net|'.settings::DEFAULT_NET."\r\n");
				echo('I|socket-timeout|'.settings::TIMEOUT."\r\n");
				echo('I|ip-as-url|'.((settings::IP_ALT_CACHES) ? '1' : '0')."\r\n");
				echo('I|socket-non-80|'.((settings::NON_HTTP) ? '1' : '0')."\r\n");
				echo('I|retry-urls|'.((settings::RETRY_URLS) ? '1' : '0')."\r\n");
				echo('I|retry-bad-urls|'.((settings::RETRY_BAD_URLS) ? '1' : '0')."\r\n");
				echo('I|web-front|'.((settings::WEB_FRONT) ? '1' : '0')."\r\n");
				echo('I|blocks-no-useragent|'.((settings::BLOCK_NO_USER_AGENT) ? '1' : '0')."\r\n");
				echo('I|url-adds|'.((settings::WEBFRONT_URL_ADDS) ? '1' : '0')."\r\n");
				echo('I|stats-enabled|'.((settings::ENABLE_HIT_STATS) ? '1' : '0')."\r\n");
				echo('I|client-stats-enabled|'.((settings::ENABLE_CLIENT_STATS) ? '1|throttle|'.settings::STATS_THROTTLE.'|flush-multiple|'.settings::STATS_CLIENT_FLUSH : '0')."\r\n");
				echo('I|gwc-advertise|'.((settings::UPDATE_SELF_TO_REMOTE) ? '1' : '0')."\r\n");
				echo('I|fsockopen|'.((settings::FSOCKOPEN) ? '1' : '0')."\r\n");
				echo('I|crude-gwc-grading|'.((settings::CHECKS_ALLOWED) ? '1' : '0')."\r\n");
				break;
		}
	}
	private function warn($warnings) {
		foreach ($warnings as $warned) {
			echo('I|WARNING|'.$this->runtime->strip_chars($warned)."\r\n");
		}
	}
}
class spec_xml {
	public $runtime;
	private $xml;
	public $execute;
	function __construct($runtime) {
		$this->runtime = $runtime;
		$this->xml = new XMLWriter();
		$this->xml->openMemory();
		$this->xml->startDocument();
		$this->xml->setIndent(true);
		$this->xml->startElement('gwc');
		$this->xml->writeAttribute('xmlns', 'http://beacon.grantgalitz.com/');
		$this->xml->writeAttribute('xmlns:xsi', 'http://www.w3.org/2001/XMLSchema-instance');
		$this->xml->writeAttribute('xsi:schemaLocation', 'http://beacon.grantgalitz.com/ http://beacon.grantgalitz.com/Xml-Spec.xsd');
		$this->xml->startElement('instance');
		$this->xml->writeAttribute('network', $this->runtime->gwc_variables['net']);
		$this->xml->endElement();
		try {
			header('Content-Type: text/xml');	//This is XML...
			$this->decide();
		}
		catch (Exception $error) {
			$this->error(array($error->getMessage()));
		}
		$this->xml->endElement();
		echo($this->xml->outputMemory());
	}
	private function decide() {
		if (!settings::ENABLE_V3) {
			throw new Exception('Specification 3 disabled');
			return;
		}
		if (!empty($this->runtime->warn)) {
			$this->warn($this->runtime->warn);
			return;
		}
		if ($this->runtime->gwc_variables['ping']) {	$this->ping();	}
		if ($this->runtime->gwc_variables['ping'] || $this->runtime->gwc_variables['getnetworks']) {	$this->getnetworks();	}
		if ($this->runtime->gwc_variables['ip'] !== false || $this->runtime->gwc_variables['ipv6'] !== false) {	$this->cache_host();	}
		if ($this->runtime->gwc_variables['url'] !== false) {	$this->cache_url();	}
		if ($this->runtime->gwc_variables['hostfile'] || $this->runtime->gwc_variables['get']) {	$this->hosts();	}
		if ($this->runtime->gwc_variables['urlfile'] || $this->runtime->gwc_variables['get']) {	$this->urls();	}
		if ($this->runtime->gwc_variables['statfile']) {	$this->stats();	}
		if ($this->runtime->gwc_variables['info']) {	$this->extra('info');	}
		if ($this->runtime->gwc_variables['support']) {	$this->extra('support');	}
		$this->runtime->resolve_services();
		$this->xml->startElement('period');
		$this->xml->writeAttribute('type', 'access');
		$this->xml->writeAttribute('limit', '3300');
		$this->xml->endElement();
	}
	private function ping() {
		$this->xml->startElement('pong');
		$this->xml->writeAttribute('name', settings::CACHE_NAME);
		$this->xml->writeAttribute('version', settings::CACHE_VERSION);
		$this->xml->endElement();
		$this->getnetworks();
	}
	private function getnetworks() {
		static $networks_executed = false;
		if (!$networks_executed) {
			$this->xml->startElement('networks');
			foreach ($this->runtime->settings->NETWORKS as $network) {
				$this->xml->writeElement('network', $network);
			}
			$this->xml->endElement();
		}
		$networks_executed = true;
	}
	private function hosts() {
		$grab = new data_manage($this->runtime, 'down', 'ip', $this->runtime->gwc_variables['net']);
		if (!empty($grab->data->output)) {
			$this->xml->startElement('hosts');
			foreach ($grab->data->output as $ip) {
				list($host, $time, , $cluster, $leaves, $uptime, $max_leaves, $vendor, $ip_version) = explode('|', $ip);
				$time_ = time() - $time;
				$cluster_ = ((!empty($cluster) && $this->runtime->gwc_variables['getclusters']) ? $cluster : '');
				$leaves_ = (((!empty($leaves) || $leaves === '0') and $this->runtime->gwc_variables['getleaves']) ? $leaves : '');
				$vendor_ = ((!empty($vendor) && $this->runtime->gwc_variables['getvendors']) ? $vendor : '');
				$uptime_ = ((!empty($uptime) || $uptime === '0') and $this->runtime->gwc_variables['getuptime']) ? $uptime : '';
				$max_leaves_ = ((!empty($max_leaves) || $max_leaves === '0') and $this->runtime->gwc_variables['getleaves']) ? $max_leaves : '';
				$this->xml->startElement('host');
				$this->xml->writeAttribute('type', 'ipv'.$ip_version);
				$this->xml->writeAttribute('age', $time_);
				if (strlen($cluster_)) {
					$this->xml->writeAttribute('cluster', $cluster_);
				}
				if (strlen($leaves_)) {
					$this->xml->writeAttribute('leaves', $leaves_);
				}
				if (strlen($vendor_)) {
					$this->xml->writeAttribute('vendor', $vendor_);
				}
				if (strlen($uptime_)) {
					$this->xml->writeAttribute('uptime', $uptime_);
				}
				if (strlen($max_leaves_)) {
					$this->xml->writeAttribute('maximum', $max_leaves_);
				}
				$this->xml->text($host);
				$this->xml->endElement();
			}
			$this->xml->endElement();
		}
	}
	private function urls() {
		$grab = new data_manage($this->runtime, 'down', 'url', $this->runtime->gwc_variables['net']);
		if (!empty($grab->data->output)) {
			$this->xml->startElement('urls');
			foreach ($grab->data->output as $url) {
				list($host, $time, ,$pong) = explode('|', $url);
				$time_ = time() - $time;
				$this->xml->startElement('url');
				$this->xml->writeAttribute('age', $time_); 
				$this->xml->writeAttribute('pong', $pong);
				$this->xml->text($host);
				$this->xml->endElement();
			}
			$this->xml->endElement();
		}
	}
	private function cache_host() {
		$this->xml->startElement('update');
		$this->xml->writeAttribute('type', 'ip');
		$update_host = new update($this->runtime, 'ip', $this->runtime->gwc_variables['net']);
		$this->xml->startElement('process');
		$this->xml->writeAttribute('status', (($update_host->success) ? 'ok' : 'bad'));
		$this->xml->endElement();
		if (!empty($update_host->warnings)) {
			$this->warn($update_host->warnings);
		}
		$this->xml->startElement('period');
		$this->xml->writeAttribute('type', 'update');
		$this->xml->writeAttribute('limit', settings::EXPIRE_HOSTS * 3600);
		$this->xml->endElement();
		$this->xml->endElement();
	}
	private function cache_url() {
		$this->xml->startElement('update');
		$this->xml->writeAttribute('type', 'url');
		$update_url = new update($this->runtime, 'url', $this->runtime->gwc_variables['net']);
		$this->xml->startElement('process');
		$this->xml->writeAttribute('status', (($update_url->success) ? 'ok' : 'bad'));
		$this->xml->endElement();
		if (!empty($update_url->warnings)) {
			$this->warn($update_url->warnings);
		}
		$this->xml->startElement('period');
		$this->xml->writeAttribute('type', 'update');
		$this->xml->writeAttribute('limit', settings::EXPIRE_URLS * 3600);
		$this->xml->endElement();
		$this->xml->endElement();
	}
	private function warn($warnings) {
		foreach ($warnings as $warning) {
			$this->xml->writeElement('warning', $warning);
		}
	}
	private function error($errors) {
		foreach ($errors as $error) {
			$this->xml->writeElement('error', $error);
		}
	}
	private function stats() {
		$stats1 = $stats2 = $stats3 = array();
		$this->xml->startElement('stats');
		foreach ($this->runtime->settings->NETWORKS as $temp_net) {
			$this->stats = new statistics($this->runtime, 'request', $temp_net);
			$stats_out_dump = $this->stats->output();
			$stats = explode("\r\n", $stats_out_dump);
			$this->out_extra('stat', array('network'=>$temp_net, 'total-hits'=>$stats[0], 'hour-requests'=>$stats[1], 'hour-updates'=>$stats[2]));
			$stats1[] = $stats[0];	$stats2[] = $stats[1];	$stats3[] = $stats[2];
		}
		$this->out_extra('stat', array('combined'=>count($this->runtime->settings->NETWORKS), 'total-hits'=>array_sum($stats1), 'hour-requests'=>array_sum($stats2), 'hour-updates'=>array_sum($stats3)));
		$this->xml->endElement();
	}
	private function out_extra($group, $data) {
		$this->xml->startElement($group);
		foreach ($data as $key=>$value) {
			$this->xml->writeAttribute($key, $value);
		}
		$this->xml->endElement();
	}
	private function extra($type) {
		$this->xml->startElement(($type == 'info') ? 'infos' : 'supports');
		switch ($type) {
			case 'info':
				$this->out_extra($type, array('name'=>settings::CACHE_NAME));
				$this->out_extra($type, array('version'=>settings::CACHE_VERSION));
				$this->out_extra($type, array('vendor'=>settings::CACHE_VENDOR));
				$this->out_extra($type, array('gwc-site'=>'http://sourceforge.net/projects/beaconcache/'));
				$this->out_extra($type, array('open-source'=>'yes'));
				break;
			case 'support':
				if (is_array($this->runtime->settings->NETWORKS)) {
					foreach ($this->runtime->settings->NETWORKS as $network) {
						$this->out_extra($type, array('support'=>$network));
					}
				}
				if (is_array($this->runtime->settings->NETWORKS_ALT)) {
					if (!empty($this->runtime->settings->NETWORKS_ALT)) {
						foreach ($this->runtime->settings->NETWORKS_ALT as $alt_network=>$network) {
							$this->out_extra($type, array('alternate-net-names'=>$network, 'alt'=>$alt_network));
						}
					}
				}
				$this->out_extra($type, array('storage-type'=>settings::STORAGE));
				$this->out_extra($type, array('hosts-in'=>settings::HOSTS_IN));
				$this->out_extra($type, array('hosts-out'=>settings::HOSTS_OUT));
				$this->out_extra($type, array('urls-in'=>settings::URLS_IN));
				$this->out_extra($type, array('urls-out'=>settings::URLS_OUT));
				$this->out_extra($type, array('banned-urls-in'=>settings::BANNED_URLS_IN));
				$this->out_extra($type, array('shuffle-hosts'=>settings::SHUFFLE_HOSTS));
				$this->out_extra($type, array('shuffle-urls'=>settings::SHUFFLE_URLS));
				$this->out_extra($type, array('expire-hosts'=>settings::EXPIRE_HOSTS));
				$this->out_extra($type, array('expire-urls'=>settings::EXPIRE_URLS));
				$this->out_extra($type, array('expire-banned-urls'=>settings::EXPIRE_BANNED_URLS));
				$this->out_extra($type, array('default-net'=>settings::DEFAULT_NET));
				$this->out_extra($type, array('socket-timeout'=>settings::TIMEOUT));
				$this->out_extra($type, array('ip-as-url'=>((settings::IP_ALT_CACHES) ? 'yes' : 'no')));
				$this->out_extra($type, array('socket-non-80'=>((settings::NON_HTTP) ? 'yes' : 'no')));
				$this->out_extra($type, array('retry-urls'=>((settings::RETRY_URLS) ? 'yes' : 'no')));
				$this->out_extra($type, array('retry-bad-urls'=>((settings::RETRY_BAD_URLS) ? 'yes' : 'no')));
				$this->out_extra($type, array('web-front'=>((settings::WEB_FRONT) ? 'yes' : 'no')));
				$this->out_extra($type, array('blocks-no-useragent'=>((settings::BLOCK_NO_USER_AGENT) ? 'yes' : 'no')));
				$this->out_extra($type, array('url-adds'=>((settings::WEBFRONT_URL_ADDS) ? 'yes' : 'no')));
				$this->out_extra($type, array('stats-enabled'=>((settings::ENABLE_HIT_STATS) ? 'yes' : 'no')));
				$this->out_extra($type, array('client-stats-enabled'=>((settings::ENABLE_CLIENT_STATS) ? 'yes' : 'no'), 'throttle'=>settings::STATS_THROTTLE, 'flush-multiple'=>settings::STATS_CLIENT_FLUSH));
				$this->out_extra($type, array('gwc-advertise'=>((settings::UPDATE_SELF_TO_REMOTE) ? 'yes' : 'no')));
				$this->out_extra($type, array('fsockopen'=>((settings::FSOCKOPEN) ? 'yes' : 'no')));
				$this->out_extra($type, array('crude-gwc-grading'=>((settings::CHECKS_ALLOWED) ? 'yes' : 'no')));
				break;
		}
		$this->xml->endElement();
	}
}
class gwc {
	public $externals;
	public $spec;
	public $warn;
	public $error;
	public $env_variables;
	public $gwc_variables;
	public $settings;
	public $pong;
	public $host_count;
	public $url_count;
	public $v1_cache;
	public $v2_cache;
	public $final_ip;
	public $ip;
	public $ipv6;
	public $url_ip;
	private $banning;
	private $gwc_connect;
	function __construct() {
		gwc::server_variables();
		gwc::check_address();
		gwc::get_vars();
		gwc::process_variables();
		gwc::specification();
	}
	public function strip_chars($string, $header_group=false) {
		$string = (string)$string;
		$string = str_ireplace("\r", '', $string);
		$string = str_ireplace("\n", '', $string);
		$string = str_ireplace("\0", '', $string);
		$string = str_ireplace("\v", '', $string);
		$string = str_ireplace("\f", '', $string);
		$string = str_ireplace("\t", '', $string);
		$string = str_ireplace('|', '', $string);
		$string = (get_magic_quotes_gpc() && $header_group) ? stripslashes($string) : $string;	//If system has directive set, decode string...
		return $string;
	}
	private function server_variables() {
		if (isset($_SERVER)) {
			(isset($_SERVER['REMOTE_ADDR'])) ? $this->env_variables['client_ip'] = $_SERVER['REMOTE_ADDR'] : die('ERROR: Remote IP not detected!');
			(isset($_SERVER['SERVER_PORT'])) ? $this->env_variables['port'] = $_SERVER['SERVER_PORT'] : $this->env_variables['port'] = 80;
			(isset($_SERVER['HTTP_USER_AGENT'])) ? $this->env_variables['user_agent'] = $_SERVER['HTTP_USER_AGENT'] : $this->env_variables['user_agent'] = false;
			(isset($_SERVER['SERVER_NAME'])) ? $this->env_variables['server_name'] = $_SERVER['SERVER_NAME'] : ((isset($_SERVER['SERVER_HOST'])) ? $this->env_variables['server_name'] = $_SERVER['SERVER_HOST'] : die('ERROR: Server name not detected!'));
			(isset($_SERVER['PHP_SELF'])) ? ($this->env_variables['url'] = $this->env_variables['server_name'].(($this->env_variables['port'] != 80) ? ':'.$this->env_variables['port'] : '').$_SERVER['PHP_SELF']) : die('ERROR: File directory reference not detected!');
			$this->env_variables['give_rem_ip'] = (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $this->env_variables['client_ip'];
			$this->env_variables['https'] = (isset($_SERVER['HTTPS'])) ? $_SERVER['HTTPS'] : '';
			(!empty($this->env_variables['https'])) ? die('ERROR: HTTPS is not allowed for GWebCache connections.') : $this->env_variables['https'] = 'http://';	//HTTPS is not allowed, as pretty much almost all GWebCaches cannot test each other with HTTPS through sockets.
		}
		else {
			die('ERROR: Environment variables missing!');
		}
		$this->settings = new settings();
		if (empty($this->settings->NETWORKS) or (!settings::ENABLE_V1 && !settings::ENABLE_V2))	{	die('ERROR: Offline');	}		
	}
	public function convert_out_of_set_chars($url) {
		if (strlen($url) >= 1) {
			$url = urlencode($url);	//To encode out-of-set chars...
			$url_decode_array = array(
				'%21'=>'!',
				'%2A'=>'*',
				'%27'=>'\'',
				'%28'=>'(',
				'%29'=>')',
				'%3B'=>';',
				'%3A'=>':',
				'%40'=>'@',
				'%26'=>'&',
				'%3D'=>'=',
				'%2B'=>'+',
				'%24'=>'$',
				'%2C'=>',',
				'%2F'=>'/',
				'%3F'=>'?',
				'%25'=>'%',
				'%23'=>'#',
				'%5B'=>'[',
				'%5D'=>']',
				'+'=>'%20'
			);
			foreach ($url_decode_array as $key=>$value) {
				$url = str_replace($key, $value, $url);	//To de-encode reserved filepath chars....
			}
		}
		return $url;
	}
	public function check_address() {
		if (settings::CACHE_ADDRESS) {
			if ('http://'.$this->env_variables['url'] != settings::CACHE_ADDRESS) {
				header('HTTP/1.1 301 Moved Permanently');
				die(header('Location: '.$this->convert_out_of_set_chars(settings::CACHE_ADDRESS)));
			}
		}
	}
	private function get_vars() {
		if (isset($_GET)) {
			foreach ($_GET as $key=>$value) {
				$key = strtolower($key);
				$this->externals[$key] = (isset($value)) ? $this->strip_chars($value, true) : false;
			}
		}
	}
	private function determine_bool($id, $reverse=false) {
		$this->gwc_variables[$id] = (isset($this->externals[$id])) ? (($this->externals[$id] !== '0') ? true : false) : (($reverse) ? true : false);
		$this->gwc_connect = (isset($this->externals[$id])) ? true : $this->gwc_connect;
	}
	private function determine_exact($id, $id_mask='') {
		$this->gwc_variables[((strlen((string)$id_mask)) ? $id_mask : $id)] = (isset($this->externals[$id])) ? $this->externals[$id] : ((isset($this->gwc_variables[((strlen((string)$id_mask)) ? $id_mask : $id)])) ? $this->gwc_variables[((strlen((string)$id_mask)) ? $id_mask : $id)] : false);
		$this->gwc_connect = (isset($this->externals[$id])) ? true : $this->gwc_connect;
	}
	private function process_variables() {
		$this->gwc_connect = false;
		$this->gwc_variables = array();
		if (isset($this->externals)) {
			//Preparing GWC parameters:
			$this->determine_exact('url1', 'url');
			$this->determine_exact('url');
			$this->determine_exact('ip1', 'ip');
			$this->determine_exact('ip');
			$this->determine_exact('client');
			$this->determine_exact('version');
			$this->determine_exact('net');
			$this->determine_exact('cluster');
			$this->determine_exact('x_leaves');
			$this->determine_exact('spec');
			$this->determine_exact('pv');
			$this->determine_bool('get');
			$this->determine_bool('hostfile');
			$this->determine_bool('urlfile');
			$this->determine_bool('bfile');
			$this->determine_bool('statfile');
			$this->determine_bool('gwcs');
			$this->determine_bool('ping');
			$this->determine_bool('info');
			$this->determine_bool('support');
			$this->determine_bool('multi');												//Used for compatibility workaround with Skulls GWC.
			$this->determine_bool('cache');												//Used as an added check to block a cache from updating an IP address.
			$this->determine_bool('update');
			//Extensions to specification 2, via 2.1:
			$this->determine_bool('getclusters', true);									//Output clusters (Spec 2 default is to do so).
			$this->determine_bool('getleaves');											//Output leaf counts.
			$this->determine_bool('getnetworks');										//Output supported networks (Automatically given on v2 ping requests).
			$this->determine_bool('getvendors');										//Output vendor codes for host requests.
			$this->determine_exact('uptime');											//Input for uptime.
			$this->determine_bool('getuptime');											//Output for uptime.
			$this->determine_exact('x_max');											//Input for maximum leaf slots available.
			//XML Output:
			$this->determine_bool('xml');												//Request option for whether to output XML-style or not.
			$this->determine_exact('ipv6');												//IP update in IPv6 format ('ip' param can still be passed with it for IPv4 alternate).
			$this->determine_bool('getv6');											//Allowing IPv6 addresses in requests.
		}
	}
	private function specification() {
		if (!empty($this->gwc_variables) && $this->gwc_connect) {
			$this->warn = array();
			$this->spec = 1;	//ALWAYS default to GWebCache specification 1.
			if ($this->gwc_variables['client'] === false) {
				$this->warn[] = 'Client Name Required';
			}
			elseif (strlen($this->gwc_variables['client']) <= 4) {
				if (strlen($this->gwc_variables['client']) < 4) {
					$this->warn[] = 'Improper Client Name';
				}
				elseif ($this->gwc_variables['version'] === false || strlen($this->gwc_variables['version']) === 0) {
					$this->warn[] = 'Version Number Required';
				}
			}
			elseif (strlen($this->gwc_variables['client']) > 20) {
				$this->warn[] = 'Improper Client Name';
			}
			if ($this->gwc_variables['version'] !== false && strlen($this->gwc_variables['version']) > 16) {
				$this->warn[] = 'Improper Version Length';
			}
			if ($this->gwc_variables['bfile']) {
				$this->gwc_variables['hostfile'] = true;
				$this->gwc_variables['urlfile'] = true;
			}
			elseif ($this->gwc_variables['gwcs']) {
				$this->gwc_variables['urlfile'] = true;
			}
			if ($this->gwc_variables['net'] === false) {
				$this->gwc_variables['net'] = settings::DEFAULT_NET;
			}
			elseif (strlen($this->gwc_variables['net']) === 0) {
				$this->gwc_variables['net'] = settings::DEFAULT_NET;
				$this->spec = 2;
			}
			else {
				$this->gwc_variables['net'] = strtolower($this->gwc_variables['net']);
				$this->spec = 2;
			}
			if ($this->gwc_variables['get']) {
				$this->spec = 2;
			}
			elseif ($this->gwc_variables['info']) {
				$this->spec = 2;
			}
			elseif ($this->gwc_variables['support']) {
				$this->spec = 2;
			}
			elseif ($this->gwc_variables['multi']) {
				$this->spec = 2;
			}
			elseif (isset($this->externals['getclusters'])) {
				$this->spec = 2;
			}
			elseif ($this->gwc_variables['getleaves']) {
				$this->spec = 2;
			}
			elseif ($this->gwc_variables['getnetworks']) {
				$this->spec = 2;
			}
			elseif ($this->gwc_variables['getvendors']) {
				$this->spec = 2;
			}
			elseif ($this->gwc_variables['uptime'] !== false) {
				$this->spec = 2;
			}
			elseif ($this->gwc_variables['getuptime']) {
				$this->spec = 2;
			}
			if ($this->gwc_variables['ipv6'] !== false) {
				$this->spec = 2;
				/*if ($this->gwc_variables['ip'] === false) {
					$this->warn[] = 'IPv6 not yet supported';	//As update class only has ipv4 processing...
				}*/
			}
			if ($this->gwc_variables['update'] || $this->gwc_variables['cluster'] !== false || $this->gwc_variables['x_leaves'] !== false || $this->gwc_variables['uptime'] !== false || $this->gwc_variables['x_max'] !== false) {
				$this->spec = 2;
				if ($this->gwc_variables['x_leaves'] !== false) {
					(ctype_digit($this->gwc_variables['x_leaves'])) ? ((((int)$this->gwc_variables['x_leaves']) >= 2048) ? $this->gwc_variables['x_leaves'] = false : $this->gwc_variables['x_leaves'] = $this->gwc_variables['x_leaves']) : $this->warn[] = 'Bad leaf count';
				}
				if ($this->gwc_variables['x_max'] !== false) {
					(ctype_digit($this->gwc_variables['x_max'])) ? ((((int)$this->gwc_variables['x_max']) >= 2048) ? $this->gwc_variables['x_max'] = false : $this->gwc_variables['x_max'] = $this->gwc_variables['x_max']) : $this->warn[] = 'Bad maximum leaf slots count';
				}
				if ($this->gwc_variables['uptime'] !== false) {
					(ctype_digit($this->gwc_variables['uptime'])) ? ((((int)$this->gwc_variables['uptime']) >= 31536000) ? $this->gwc_variables['uptime'] = false : $this->gwc_variables['uptime'] = $this->gwc_variables['uptime']) : $this->warn[] = 'Bad uptime count';
				}
				if ($this->gwc_variables['cluster'] !== false) {
					$this->gwc_variables['cluster'] = (strlen($this->gwc_variables['cluster']) > 256) ? false : $this->gwc_variables['cluster'];
				}
				if ($this->gwc_variables['ip'] === false && $this->gwc_variables['ipv6'] === false) {
					if ($this->gwc_variables['cluster'] !== false || $this->gwc_variables['x_leaves'] !== false || $this->gwc_variables['uptime'] !== false || $this->gwc_variables['x_max'] !== false) {
						$this->warn[] = 'Improper IP Update';
					}
					elseif ($this->gwc_variables['update'] && $this->gwc_variables['url'] === false) {
						$this->warn[] = 'Improper Update';
					}
				}
			}
			if ($this->gwc_variables['spec']) {
				if (ctype_digit($this->gwc_variables['spec'])) {
					$this->spec = ($this->gwc_variables['spec'] == 1 || $this->gwc_variables['spec'] == 2) ? ((int) $this->gwc_variables['spec']) : $this->spec;
				}
			}
			if ($this->gwc_variables['pv']) {
				if (ctype_digit($this->gwc_variables['pv'])) {
					if ($this->gwc_variables['pv'] < $this->spec && $this->gwc_variables['pv'] >= 1) {
						$this->spec = (int) $this->gwc_variables['pv'];
					}
				}
			}
			if ($this->gwc_variables['xml']) {
				$this->spec = 3;
			}
			if ($this->gwc_variables['client'] !== false) {
				if ($this->gwc_variables['ip'] === false && $this->gwc_variables['url'] === false && $this->gwc_variables['hostfile'] == false &&
				$this->gwc_variables['urlfile'] == false && $this->gwc_variables['statfile'] == false && $this->gwc_variables['gwcs'] == false && $this->gwc_variables['ping'] == false &&
				$this->gwc_variables['get'] == false && $this->gwc_variables['info'] == false && $this->gwc_variables['support'] == false) {
					$this->warn[] = 'Incomplete Request';
				}
				$this->gwc_variables['vendor_only'] = substr($this->gwc_variables['client'], 0, 4);	//To avoid overwrites from user-agent matchings on specific vendor codes.
				if ($this->env_variables['user_agent']) {
					//Client vendor code overrides for finding clones, fakes, mod, etc:
					if ('RAZA' == substr($this->gwc_variables['client'], 0, 4) and (strpos($this->env_variables['user_agent'], 'Shareaza') !== 0 || stripos($this->env_variables['user_agent'], 'pro') !== false || stripos($this->env_variables['user_agent'], 'lite') !== false)) {
						$this->gwc_variables['client'] = $this->strip_chars($this->env_variables['user_agent']);
						$this->gwc_variables['version'] = false;
					}
					elseif ('LIME' == substr($this->gwc_variables['client'], 0, 4) && strpos($this->env_variables['user_agent'], 'LimeWire') === 0 && strpos($this->env_variables['user_agent'], '(Cabos/') !== false) {
						$this->gwc_variables['client'] = 'CABO';
					}
					if ($this->gwc_variables['client'] == 'MUTE' && stripos($this->env_variables['user_agent'], 'Mutella') !== false) {
						$this->gwc_variables['client'] = 'MTLL';
					}
				}
			}
			$this->headers();
			$this->network();
			$this->banning = new client_check($this);
			($this->spec == 1) ? $this->proto_1() : (($this->spec == 2) ? $this->proto_2() : $this->proto_xml());
		}
		else {	(settings::WEB_FRONT) ? $this->web_front() : die('This is '.settings::CACHE_NAME.' '.settings::CACHE_VERSION);	}
	}
	private function headers() {
		header('Content-Type: text/plain');
		header('X-Remote-IP: '.$this->env_variables['give_rem_ip']);
		header('X-GWC-URL: http://'.$this->env_variables['url']);
	}
	private function proto_1() {
		$this->override_default_network();
		$this->warn = $this->banning->bans($this->warn);
		$handle_spec1 = new spec1($this);
	}
	private function proto_2() {
		$this->warn = $this->banning->bans($this->warn);
		$handle_spec2 = new spec2($this);
	}
	private function proto_xml() {
		$this->warn = $this->banning->bans($this->warn);
		$handle_xml = new spec_xml($this);
	}
	private function web_front() {
		$webfront = new web_front($this);
	}
	private function override_default_network() {
		if (!empty($this->settings->NET_SPEC1)) {
			if ($this->gwc_variables['client'] !== false) {
				$joined_vend = $this->gwc_variables['client'];
				if ($this->gwc_variables['version']) {
					$joined_vend .= $this->gwc_variables['version'];
				}
			}
			else {	$joined_vend = false;	}
			foreach ($this->settings->NET_SPEC1 as $key=>$value) {
				if ($joined_vend !== false) {
					if (substr($joined_vend, 0, strlen($key)) == $key) {
						$this->gwc_variables['net'] = $value;
					}
				}
				else {	break;	}
			}
		}
	}
	private function network() {
		if (!empty($this->settings->NETWORKS_ALT)) {
			if (array_key_exists($this->gwc_variables['net'], $this->settings->NETWORKS_ALT)) {
				$this->gwc_variables['net'] = $this->settings->NETWORKS_ALT[$this->gwc_variables['net']];
			}
		}
		if (!in_array($this->gwc_variables['net'], $this->settings->NETWORKS)) {	die('ERROR: Network not supported');	}
	}
	public function resolve_services() {
		//Run retry list and update stats...
		$this->stats = new statistics($this, (($this->gwc_variables['ip'] !== false || $this->gwc_variables['url'] !== false) ? 'update' : 'request'), $this->gwc_variables['net']);
		$this->stats->update();
		$update_retry = new update($this, 'retry', $this->gwc_variables['net']);
		$this->stats = new statistics($this, 'client', $this->gwc_variables['net']);
		$this->stats->update();
		$this->stats = new statistics($this, 'client');
		$this->stats->update();
	}
}
class web_front {
	private $settings;
	private $network;
	function __construct($runtime) {
		$this->runtime = $runtime;
		$this->runtime->env_variables['url'] = $this->runtime->convert_out_of_set_chars($this->runtime->env_variables['url']);
		if ($this->check_xhtml_support()) {
			$this->display();
		}
		else {
			$this->no_support();
		}
	}
	private function convert_age($timestamp) {
		$timestamp_diff = ((time() - (int)$timestamp) > 0) ? (time() - (int)$timestamp) : 0;
		$hour = floor($timestamp_diff / 3600);
		$minute_handle = $timestamp_diff - ($hour * 3600);
		$minute = floor($minute_handle / 60);
		$second = $minute_handle - ($minute * 60);
		return $hour.':'.$minute.':'.$second;
	}
	private function convert_name($client) {
		$client = (strlen($client) > 20) ? substr($client, 0, 20).'...' : $client;	$matched = false;
		if (strlen($client) >= 1) {
			$client = htmlentities($client);
			if (!empty($this->runtime->settings->VENDOR_CODE_MATCHINGS)) {
				foreach ($this->runtime->settings->VENDOR_CODE_MATCHINGS as $known_client=>$details) {
					if (strlen($client) >= strlen($known_client)) {
						if ($known_client == substr($client , 0, strlen($known_client))) {
							list($name, $url) = $details;
							$client = str_replace($known_client, $name.' ', $client);
							if ($url !== false) {	$client = '<a href="'.$url.'" class="table_address">'.$client.'</a>';	}
							$matched = true; break;
						}
					}
				}
			}
			if (!$matched) {
				if (stripos($client, 'TEST') === 0) {
					$client = str_replace($client, 'WebCache( '.substr($client, 4).' )', $client);
				}
				else {
					$client = str_replace($client, '<span class="shadow_text">Unknown( '.$client.' )</span>', $client);
				}
			}
		}
		return $client;
	}
	private function convert_pong($pong) {
		$pong = htmlentities($pong);
		if (strlen($pong) >= 1) {
			$known_pongs = array(
				'Cachechu'=>'http://code.google.com/p/cachechu/',
				'GWebCache'=>'http://www.gnucleus.com/gwebcache/',
				'jumswebcache'=>'http://www1.mager.org/GWebCache/',
				'GhostWhiteCrab'=>'http://wiki.limewire.org/index.php?title=GhostWhiteCrab',
				'PHPGnuCacheII'=>'http://gwcii.sourceforge.net/',
				'Bazooka'=>'http://www.bazookanetworks.com/',
				'Skulls'=>'http://sourceforge.net/projects/skulls/',
				'Beacon Cache'=>'http://sourceforge.net/projects/beaconcache/',
				'GERRY'=>'http://www.edazzle.net/',
				'Lynn'=>'https://www.planet-source-code.com/vb/scripts/ShowCode.asp?txtCodeId=7846&lngWId=4'
			);
			foreach ($known_pongs as $known_pong=>$url) {
				if (strlen($pong) >= strlen($known_pong)) {
					if ($known_pong == substr($pong , 0, strlen($known_pong))) {
						$pong = '<a href="'.$url.'" class="table_address">'.$pong.'</a>';
						break;
					}
				}
			}
		}
		return $pong;
	}
	private function grab_hosts(&$track) {
		$grab = new data_manage($this, 'down', 'ip', $this->network);
?>
			<tr>
				<td class="table_top_cell">
					Hosts<?php echo(((!empty($grab->data->contents)) ? ' (Out of '.count($grab->data->contents).')' : '')); ?>:
				</td>
			</tr>
			<tr>
				<td>
					<table class="sub_table">
<?php
		if (!empty($grab->data->contents)) {
?>
						<tr class="bottom_rows">
							<td class="cell1">Address:</td>
							<td class="cell2">Client:</td>
							<td class="cell3">Age (<abbr title="Hours:Minutes:Seconds">h:m:s</abbr>):</td>
						</tr>
<?php
			foreach ($grab->data->contents as $ip) {
				$ip = trim($ip);
				$client = '';	$host = '';	$timestamp = 0;	$leaves = ''; $extras = array();
				list($host, $timestamp, $client, /*$cluster*/, $leaves, $uptime, $max_leaves) = explode('|', $ip);
				if (!empty($uptime) || $uptime === '0') {	$extras[] = '<abbr title="uptime">u</abbr>:'.$this->convert_age(time() - ((int)$uptime));	}
				if (!empty($leaves) || $leaves === '0') {	$extras[] = '<abbr title="current leaves">l</abbr>:'.$leaves;	}
				if (!empty($max_leaves) || $max_leaves === '0') {	$extras[] = '<abbr title="maximum leaves">m</abbr>:'.$max_leaves;	}
				echo("\t\t\t\t\t\t".'<tr class="table_cell'.((!$track) ? '' : '2').'"><td class="cell1"><a href="'.$this->network.':host:'.$host.'" class="table_address">'.$host.'</a>'.((!empty($extras)) ? ' ( '.implode(', ', $extras).' )' : '').'</td><td class="cell2">'.$this->convert_name($client).'</td><td class="cell3">'.$this->convert_age($timestamp).'</td></tr>'."\r\n");
				(!$track) ? $track = true : $track = false;
			}
		}
		else {	echo("\t\t\t\t\t\t".'<tr class="no_list"><td>No '.htmlentities($this->network).' hosts stored.</td></tr>'."\r\n");	}
?>
					</table>
				</td>
			</tr>
<?php
	}
	private function shorten_url($url) {
		 if (strlen($url) > 8) {
			$url = substr($url, 7);
			if (strpos($url, '/')) {	$url = substr($url, 0, strpos($url, '/'));	}
			$url = htmlentities($url);
		 }
		return $url;
	}
	private function grab_urls(&$track) {
		$grab = new data_manage($this, 'down', 'url', $this->network);
?>
			<tr>
				<td class="table_top_cell">
					URLs<?php echo(((!empty($grab->data->contents)) ? ' (Out of '.count($grab->data->contents).')' : '')); ?>:
				</td>
			</tr>
			<tr>
				<td>
					<table class="sub_table">
<?php
		if (!empty($grab->data->contents)) {
?>
						<tr class="bottom_rows">
							<td class="cell1">Address:</td>
							<td class="cell2">Cache:</td>
							<td class="cell2">Submission By:</td>
							<td class="cell3">Age (<abbr title="Hours:Minutes:Seconds">h:m:s</abbr>):</td>
						</tr>
<?php
			foreach ($grab->data->contents as $url) {
				$url = trim($url);
				$client = '';	$$host_unsafe = '';	$timestamp = 0;
				list($host_unsafe, $timestamp, $client, $pong) = explode('|', $url);
				(empty($pong)) ? $pong = '[Unknown]' : (strlen($pong) > 40) ? $pong = substr($pong, 0, 40) : $pong = $pong;
				$host = $this->runtime->convert_out_of_set_chars($host_unsafe);
				echo("\t\t\t\t\t\t".'<tr class="table_cell'.((!$track) ? '' : '2').'"><td class="cell1">'.((settings::ADD_URL_TO_SHAREAZA) ? '<a href="shareaza:gwc:'.$host.'" class="table_address no_underline">+</a> ' : '').'<a href="'.$host.'" class="table_address">'.$this->shorten_url($host).'</a>'.((settings::CHECKS_ALLOWED) ? ' <a href="http://'.htmlentities($this->runtime->env_variables['url']).'?display='.$this->query_safe($this->network).'&amp;query='.$this->query_safe($host_unsafe).'" class="table_address no_underline">*</a>' : '').'</td><td class="cell2">'.$this->convert_pong($pong).'</td><td class="cell2">'.$this->convert_name($client).'</td><td class="cell3">'.$this->convert_age($timestamp).'</td></tr>'."\r\n");
				$track = (!$track) ? true :  false;
			}
		}
		else {	echo("\t\t\t\t\t\t".'<tr class="no_list"><td>No '.htmlentities($this->network).' URLs stored.</td></tr>'."\r\n");	}
?>
					</table>
				</td>
			</tr>
<?php
	}
	private function url_add(&$track, $url_to_add) {
		$this->runtime->gwc_variables['client'] = 'URL-ADD';
		$this->runtime->gwc_variables['url'] = $url_to_add;
		$update_url = new update($this->runtime, 'url', $this->network);
		if (isset($update_url->warnings[0])) {
?>
			<tr class="table_top_cell">
				<td class="red">Submission Failed</td>
			</tr>
			<tr class="table_cell<?php echo(((!$track) ? '' : '2')); $track = (!$track) ? true : false; ?>">
				<td class="cell2">Error Message: <span class="yellow"><?php echo($update_url->warnings[0]); ?></span></td>
			</tr>
<?php	
		}
		else {
?>
			<tr class="table_top_cell">
				<td class="green">Submission Passed</td>
			</tr>
<?php
			$this->check_url($track, $url_to_add);
		}
	}
	private function check_url(&$track, $url_to_check) {
		$grab = new data_manage($this, 'down', 'url', $this->network);
		if (!empty($grab->data->contents)) {
			foreach ($grab->data->contents as $url) {
				$url = trim($url);
				$client = '';	$host = '';	$timestamp = 0; $host_count = 0; $url_count = 0; $grade = 100;
				list($host, $timestamp, $client, $pong, $host_count, $url_count, $v1_support, $v2_support) = explode('|', $url);
				(empty($pong)) ? $pong = '[Unknown]' : (strlen($pong) > 40) ? $pong = substr($pong, 0, 40) : $pong = $pong;
				$host_count = (!$host_count) ? 0 : $host_count;
				$url_count = (!$url_count) ? 0 : $url_count;
				if ($host == $url_to_check) {
					$host = $this->runtime->convert_out_of_set_chars($host);
					if ($host_count == 0 || $host_count > 500) {
						$grade -= 30;
					}
					elseif ($host_count < 5 || $host_count > 250) {
						$grade -= 15;
					}
					elseif ($host_count < 10 || $host_count > 100) {
						$grade -= 10;
					}
					if ($url_count == 0) {
						$grade -= 20;
					}
					elseif ($url_count > 500) {
						$grade -= 30;
					}
					elseif ($url_count == 1 || $url_count > 250) {
						$grade -= 15;
					}
					elseif ($url_count < 10 || $url_count > 100) {
						$grade -= 5;
					}
					if (!strlen($pong)) {
						$grade -= 20;
					}
					if (((bool)$v1_support) && ((bool)$v2_support)) {
						$grade -= 30;
					}
					$grade = ($grade > 0) ? $grade : 0;
?>
			<tr>
				<td>
					<table class="sub_table">
						<tr class="bottom_rows">
							<td class="cell1">Address:</td>
							<td class="cell2">Cache:</td>
							<td class="cell2">Submission By:</td>
							<td class="cell3">Age (<abbr title="Hours:Minutes:Seconds">h:m:s</abbr>):</td>
						</tr>
<?php
					echo("\t\t\t\t\t\t".'<tr class="table_cell'.((!$track) ? '' : '2').'"><td class="cell1">'.((settings::ADD_URL_TO_SHAREAZA) ? '<a href="shareaza:gwc:'.$host.'" class="table_address no_underline">+</a> ' : '').'<a href="'.$host.'" class="table_address">'.$this->shorten_url($host).'</a></td><td class="cell2">'.$this->convert_pong($pong).'</td><td class="cell2">'.$this->convert_name($client).'</td><td class="cell3">'.$this->convert_age($timestamp).'</td></tr>'."\r\n");
					$track = (!$track) ? true :  false;
?>
					</table>
				</td>
			</tr>
			<tr>
				<td class="table_top_cell">
					Quality Check:
				</td>
			</tr>
			<tr>
				<td>
					<table id="cell_debug" class="sub_table">
						<tr class="table_cell<?php echo(((!$track) ? '' : '2')); $track = (!$track) ? true : false; ?>">
							<td class="cell_debug_head">V1 On Query:</td>
							<td><?php echo(((bool)$v1_support) ? 'true' : 'false'); ?></td>
						</tr>
						<tr class="table_cell<?php echo(((!$track) ? '' : '2')); $track = (!$track) ? true : false; ?>">
							<td class="cell_debug_head">V2 On Query:</td>
							<td><?php echo(((bool)$v2_support) ? 'true' : 'false'); ?></td>
						</tr>
						<tr class="table_cell<?php echo(((!$track) ? '' : '2')); $track = (!$track) ? true : false; ?>">
							<td class="cell_debug_head">Host Count:</td>
							<td><?php echo((string)$host_count); ?></td>
						</tr>
						<tr class="table_cell<?php echo(((!$track) ? '' : '2')); $track = (!$track) ? true : false; ?>">
							<td class="cell_debug_head">URL Count:</td>
							<td><?php echo((string)$url_count); ?></td>
						</tr>
						<tr class="table_cell<?php echo(((!$track) ? '' : '2')); $track = (!$track) ? true : false; ?>">
							<td class="cell_debug_head">Final Grade:</td>
							<td class="<?php echo((string)($grade >= 70) ? (($grade >= 80) ? 'green' : 'yellow') : 'red'); ?>"><?php echo($grade); ?></td>
						</tr>
					</table>
				</td>
			</tr>
<?php
					return;
				}
			}
			echo("\t\t\t".'<tr class="no_list"><td>URL '.htmlentities($url_to_check).' not found.</td></tr>'."\r\n");
		}
		else {	echo("\t\t\t".'<tr class="no_list"><td>No '.htmlentities($this->network).' URLs stored.</td></tr>'."\r\n");	}
	}
	private function client_stats(&$color_track, $network='') {
		if (settings::ENABLE_CLIENT_STATS) {
			$count_grand_total = 0;	$client_count = $client_stats = array();
			$stats_download = new data_manage($this, 'down', 'stats_client', $network);
			if (!empty($stats_download->data->contents)) {
				while (count($stats_download->data->contents) > settings::STATS_THROTTLE) {
					array_shift($stats_download->data->contents);
				}
				if (!empty($stats_download->data->contents)) {
					foreach ($stats_download->data->contents as $client_line) {
						list($client_vend, $ip, $url, $ping, $get, $stats) = explode('|', $client_line);
						$client_stats[$client_vend] = (!isset($client_stats[$client_vend])) ? array( 0, 0, 0, 0, 0, 0) : $client_stats[$client_vend];
						$client_stats[$client_vend] = array(
							0=>(($ip === '1') ? $client_stats[$client_vend][0] + 1 : $client_stats[$client_vend][0]),
							1=>(($url === '1') ? $client_stats[$client_vend][1] + 1 : $client_stats[$client_vend][1]),
							2=>(($ping === '1') ? $client_stats[$client_vend][2] + 1 : $client_stats[$client_vend][2]),
							3=>(($get === '1') ? $client_stats[$client_vend][3] + 1 : $client_stats[$client_vend][3]),
							4=>(($stats === '1') ? $client_stats[$client_vend][4] + 1 : $client_stats[$client_vend][4]),
							5=>($client_stats[$client_vend][5] + 1)
						);
						$count_grand_total++;
					}
					foreach ($client_stats as $client=>$info) {
						$client_count[$client] = $info[5];
					}
					natcasesort($client_count);
				}
			}
			if (!empty($client_stats)) {
?>
			<tr>
				<td class="table_top_cell">
					Client Hits<?php if ($count_grand_total !== 0)	{	echo(' (Out of '.$count_grand_total.')');	} ?>:
				</td>
			</tr>
			<tr>
				<td>
					<table class="sub_table">
						<tr class="bottom_rows">
							<td class="cell1">Clients:</td>
							<td class="cell2">IP Updates:</td>
							<td class="cell2">URL Updates:</td>
							<td class="cell2">Pings:</td>
							<td class="cell2">Requests:</td>
							<td class="cell2">Other:</td>
							<td class="cell3">Total Hits:</td>
						</tr>
<?php
				foreach (array_reverse($client_count) as $client=>$count) {
?>
						<tr class="table_cell<?php echo((!$color_track) ? '' : '2'); (!$color_track) ? $color_track = true : $color_track = false; ?>">
							<td class="cell1"><?php echo(trim($this->convert_name($client))); ?></td>
							<td class="cell2"><?php echo($client_stats[$client][0]); ?></td>
							<td class="cell2"><?php echo($client_stats[$client][1]); ?></td>
							<td class="cell2"><?php echo($client_stats[$client][2]); ?></td>
							<td class="cell2"><?php echo($client_stats[$client][3]); ?></td>
							<td class="cell2"><?php echo($client_stats[$client][4]); ?></td>
							<td class="cell3"><?php echo($count); ?></td>
						</tr>
<?php
				}
?>
					</table>
				</td>
			</tr>
<?php
			}
		}
	}
	private function query_safe($input) {
		return (htmlentities(urlencode($input)));
	}
	private function error_table_row($error) {
?>
			<tr class="error_message_block">
				<td><?php echo(htmlentities($error->getMessage())); ?></td>
			</tr>
<?php
	}
	private function no_support() {
		if (isset($_COOKIE['xhtml_override'])) {
			$this->display();
		}
		elseif (isset($this->runtime->externals['override_proceed'])) {
			setcookie('xhtml_override', '1', time() + 3600, $_SERVER['PHP_SELF'], $this->env_variables['server_name'], false);
			$this->display(true);
		}
		else {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 3.2 Final//EN">
<html>
	<head>
		<meta name="robots" content="noindex,nofollow,noarchive">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title><?php echo(htmlentities('ERROR | '.settings::CACHE_NAME.' '.settings::CACHE_VERSION)); ?></title>
	</head>
	<body bgcolor="#CDCDCD">
		<center><h2><font color="#FF0000">Please Upgrade Browser:</font></h2></center>
		<hr>
		<br>
		<center><em>If you are receiving this message, then your browser does not support XHTML.</em></center>
		<center><em>Click <a href="http://<?php echo(htmlentities($this->runtime->env_variables['url'])); ?>?override_proceed=1">here</a> to still proceed.</em></center>
		<br>
		<hr>
		<p><b><font color="#FF0000">ERROR: </font></b>The HTTP Accept header signaling support for XHTML was not sent by your browser.<br>
		<b><font color="#0000FF">Browser: </font></b><code><i><?php echo(htmlentities($this->runtime->env_variables['user_agent'])); ?></i></code></p>
	</body>
</html>
<?php
		}
	}
	private function check_xhtml_support() {
		if (isset($_SERVER['HTTP_ACCEPT'])) {
			//Seems that we must manually declare document as XHTML, otherwise some browsers will treat output as html.
			if (stripos($_SERVER['HTTP_ACCEPT'], 'application/xhtml+xml') !== false) {
				header('Content-Type: application/xhtml+xml; charset=utf-8');
				return true;
			}
		}
		return false;
	}
	private function display($override=false) {
		echo('<?xml version="1.0" encoding="UTF-8"?>');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US">
	<head>
		<meta name="robots" content="noindex,nofollow,noarchive" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?php echo(htmlentities(settings::CACHE_NAME.' '.settings::CACHE_VERSION)); ?></title>
		<style type="text/css">
<?php
		//For proper XML, even the CSS must have xml entities escaped.
		$CSS = 
'			body {
				background-color: #FFFFFF;
				font-family: "Times New Roman", "Palatino Linotype", "Book Antiqua", Palatino, serif, sans-serif, Arial, Helvetica;
			}
			#title, .table_net_cell, .table_top_cell, .no_list, #unknown_parameter, #back_to_main, #support_info, #network_tabs, .error_message_block td {
				text-align: center;
			}
			.table_cell, .table_cell2, .bottom_rows {
				text-align: left;
			}
			#title, .data_table {
				margin: auto;
			}
			#title {
				width: 95%;
				background-color: #DEDEFF;
			}
			#title, #network_tabs span {
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
			.data_table {
				border-color: #000000;
				border-width: medium;
				border-style: solid;
				'.((strpos($this->runtime->env_variables['user_agent'], 'AppleWebKit') !== false) ? '' : 'min-').'width: 80%;
			}
			.table_net_cell	{
				background-color: #BABABA;
				font-size: large;
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
			.table_cell:hover td, .table_cell2:hover td {
				color: #4A0000;
			}
			.table_cell td:hover, .table_cell2 td:hover {
				color: #990000;
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
			.sub_table {
				width: 100%;
				border-collapse: collapse;
			}
			.bottom_rows {
				background-color: #F1F1F1;
			}
			.no_list {
				background-color: #FFFFFF;
			}
			#network_tabs {
				margin-top: 15px;
				margin-bottom: 15px;
				margin-left: auto;
				margin-right: auto;
				padding: 0px;
			}
			#network_tabs span {
				background-color: #FFEEEE;
				vertical-align: middle;
				padding: 5px;
				color: #444444;
			}
			#network_tabs span:hover {
				background-color: #FFE1E1;
				color: #222222;
			}
			#network_tabs a:link, #network_tabs a:visited {
				color: #4545FF;
			}
			#network_tabs a:hover, #network_tabs a:active {
				color: #662200;
			}
			.shadow_text {
				color: #989898;
			}
			a.table_address:link, a.table_address:visited {
				color: #3333FF;
			}
			a.table_address:hover, a.table_address:active {
				color: #FF3333;
			}
			#unknown_parameter, #support_info {
				margin-top: 10px;
			}
			#support_info {
				margin-bottom: 20px;
			}
			#back_to_main {
				margin-top: 40px;
			}
			.cell_debug_head {
				width: 150px;
				padding-left: 5px;
				padding-right: 15px;
			}
			#cell_debug tr td {
				text-decoration: none;
			}
			#cell_debug tr:hover td {
				text-decoration: underline;
			}
			#cell_debug tr td + td {
				padding-right: 20px;
			}
			.green {
				color: #33BB33;
			}
			.yellow {
				color: #BBBB33;
			}
			.red {
				color: #BB3333;
			}
			a.no_underline {
				text-decoration: none;
			}
			abbr[title="current leaves"], abbr[title="uptime"] , abbr[title="maximum leaves"], .error_message_block td, .table_net_cell, #unknown_parameter {
				font-weight: bold;
			}
			.error_message_block td {
				background-color: #CC0000;
				color: #000000;
			}
			.error_message_block td:hover {
				background-color: #DD6666;
				color: #703000;
			}
';
echo((isset($_COOKIE['xhtml_override']) || $override) ? "\t\t\t<!--\r\n".$CSS."\t\t\t-->\r\n" : htmlentities($CSS));
?>
		</style>
	</head>
	<body>
		<table id="title">
			<tr>
				<td>
					<a href="http://sourceforge.net/projects/beaconcache/" class="title_text"><?php echo(htmlentities(settings::CACHE_NAME.' '.settings::CACHE_VERSION)); ?></a>
				</td>
			</tr>
		</table>
		<div id="network_tabs"><span> Networks: [ 
<?php
		foreach ($this->runtime->settings->NETWORKS as $network) {
?>
			<a href="<?php echo('http://'.$this->runtime->env_variables['url']); ?>?display=<?php echo($this->query_safe($network)); ?>"><?php echo(htmlentities($network)); ?></a>
<?php
		}
?>
		]</span></div>
<?php
		if (isset($this->runtime->externals['display'])) {
			if (in_array($this->runtime->externals['display'], $this->runtime->settings->NETWORKS)) {
				$this->network = $this->runtime->externals['display'];
				$html_safe_network = htmlentities($this->runtime->externals['display']);	//If, for what ever reason, the network name is irregular, it will be parsed right in html by html safe-encoding it...
				$color_track = false;
?>
		<table class="data_table">
			<tr>
				<td class="table_net_cell"><?php	echo($html_safe_network);	?></td>
			</tr>
<?php
				if (isset($_POST['cache_submit']) && settings::WEBFRONT_URL_ADDS) {
					try {
						$this->url_add($color_track, $this->runtime->strip_chars($_POST['cache_submit'], true));
					}
					catch (Exception $error) {
						$this->error_table_row($error);
					}
				}
				elseif (isset($this->runtime->externals['query']) && settings::CHECKS_ALLOWED) {
					try {
						$this->check_url($color_track, $this->runtime->externals['query']);
					}
					catch (Exception $error) {
						$this->error_table_row($error);
					}
				}
				else {
					try {
						$this->grab_hosts($color_track);	//Execute the hosts output.
					}
					catch (Exception $error) {
						$this->error_table_row($error);
					}
					try {
						$this->grab_urls($color_track);		//Execute the URLs output.
					}
					catch (Exception $error) {
						$this->error_table_row($error);
					}
					if (settings::WEBFRONT_URL_ADDS) {
?>
			<tr>
				<td>
					<table class="sub_table">
						<tr class="bottom_rows">
							<td class="cell1">
								Add a <?php echo($html_safe_network); ?> URL:
							</td>
							<td class="cell2">
								<form method="post" action="<?php echo('http://'.$this->runtime->env_variables['url'].'?display='.$this->query_safe($this->runtime->externals['display'])); ?>">
									<div>
										<input name="cache_submit" type="text" />
										<input type="submit" value="Add" />
									</div>
								</form>
							</td>
						</tr>
					</table>
				</td>
			</tr>
<?php
					}
					try {
						$this->client_stats($color_track, $this->network);	//Execute the client table....
					}
					catch (Exception $error) {
						$this->error_table_row($error);
					}
					try {
						if (settings::ENABLE_HIT_STATS) {
							$stats_get = new data_manage($this, 'down', 'stats_total_requests', $this->network);
							$stat_total_requests = (int)((!empty($stats_get->data->contents)) ? $stats_get->data->contents[0] : 0);
							$stats_get = new data_manage($this, 'down', 'stats_total_updates', $this->network);
							$stat_total_updates = (int)((!empty($stats_get->data->contents)) ? $stats_get->data->contents[0] : 0);
							$stats_get = new data_manage($this, 'down', 'stats_requests', $this->network);
							$stat_requests_rate = (int)((!empty($stats_get->data->contents)) ? count($stats_get->data->contents) : 0);
							$stats_get = new data_manage($this, 'down', 'stats_updates', $this->network);
							$stat_updates_rate = (int)((!empty($stats_get->data->contents)) ? count($stats_get->data->contents) : 0);
?>
			<tr>
				<td>
					<table class="sub_table">
						<tr class="bottom_rows">
							<td class="cell1">Total Hits: <?php echo($stat_total_requests + $stat_total_updates); ?></td>
							<td class="cell2">Hits per hour: <?php echo($stat_requests_rate + $stat_updates_rate); ?></td>
							<td class="cell2">Total Requests: <?php echo($stat_total_requests); ?></td>
							<td class="cell2">Total Updates: <?php echo($stat_total_updates); ?></td>
							<td class="cell2">Requests per hour: <?php echo($stat_requests_rate); ?></td>
							<td class="cell3">Updates per hour: <?php echo($stat_updates_rate); ?></td>
						</tr>
					</table>
				</td>
			</tr>
<?php
						}
					}
					catch (Exception $error) {
						$this->error_table_row($error);
					}
				}
?>
		</table>
		<div id="back_to_main">[ <a href="<?php echo('http://'.$this->runtime->env_variables['url']); ?>" class="table_address">Main</a> ]</div>
<?php
				try {
					$update_retry = new update($this->runtime, 'retry', $this->network);
				}
				catch (Exception $error) {}
			}
			else {
?>
		<div id="unknown_parameter">Unknown parameter given.</div>
<?php
			}
		}
		else {
?>
		<div id="support_info">This web cache supports: <?php echo(htmlentities(implode(', ', $this->runtime->settings->NETWORKS))); ?></div>
<?php
			if (settings::ENABLE_HIT_STATS || settings::ENABLE_CLIENT_STATS) {
?>
		<table class="data_table">
<?php
				try {
					if (settings::ENABLE_HIT_STATS) {
						$stat_total_requests = $stat_total_updates = $stat_requests_rate = $stat_updates_rate = 0;
						foreach ($this->runtime->settings->NETWORKS as $temp_net) {
							$stats_get = new data_manage($this, 'down', 'stats_total_requests', $temp_net);
							$stat_total_requests += (int)((!empty($stats_get->data->contents)) ? $stats_get->data->contents[0] : 0);
							$stats_get = new data_manage($this, 'down', 'stats_total_updates', $temp_net);
							$stat_total_updates += (int)((!empty($stats_get->data->contents)) ? $stats_get->data->contents[0] : 0);
							$stats_get = new data_manage($this, 'down', 'stats_requests', $temp_net);
							$stat_requests_rate += (int)((!empty($stats_get->data->contents)) ? count($stats_get->data->contents) : 0);
							$stats_get = new data_manage($this, 'down', 'stats_updates', $temp_net);
							$stat_updates_rate += (int)((!empty($stats_get->data->contents)) ? count($stats_get->data->contents) : 0);
						}
?>
			<tr>
				<td class="table_top_cell">
					Full Statistics:
				</td>
			</tr>
			<tr>
				<td>
					<table class="sub_table">
						<tr class="bottom_rows">
							<td class="cell1">Total Hits: <?php echo($stat_total_requests + $stat_total_updates); ?></td>
							<td class="cell2">Hits per hour: <?php echo($stat_requests_rate + $stat_updates_rate); ?></td>
							<td class="cell2">Total Requests: <?php echo($stat_total_requests); ?></td>
							<td class="cell2">Total Updates: <?php echo($stat_total_updates); ?></td>
							<td class="cell2">Requests per hour: <?php echo($stat_requests_rate); ?></td>
							<td class="cell3">Updates per hour: <?php echo($stat_updates_rate); ?></td>
						</tr>
					</table>
				</td>
			</tr>
<?php
					}
				}
				catch (Exception $error) {
					$this->error_table_row($error);
				}
				try {
					$this->client_stats($color_track);	//Execute the client table...
				}
				catch (Exception $error) {
					$this->error_table_row($error);
				}
?>
		</table>
<?php	
			}	
		}
?>
	</body>
</html>
<?php
	}
}
$main = new gwc();
?>