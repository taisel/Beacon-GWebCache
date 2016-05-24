<?php
///////This is NOT the cache, as gwc.php is the cache.
class env_detect {
	public $env_variables;
	function __construct() {
		env_detect::server_variables();
	}
	public function server_variables() {
		if (isset($_SERVER)) {
			(isset($_SERVER['SERVER_PORT'])) ? $this->env_variables['port'] = $_SERVER['SERVER_PORT'] : $this->env_variables['port'] = 80;
			(isset($_SERVER['SERVER_NAME'])) ? $this->env_variables['server_name'] = $_SERVER['SERVER_NAME'] : ((isset($_SERVER['SERVER_HOST'])) ? $this->env_variables['server_name'] = $_SERVER['SERVER_HOST'] : die('ERROR: Server name not detected!'));
			(isset($_SERVER['PHP_SELF'])) ? ($this->env_variables['url'] = $this->env_variables['server_name'].(($this->env_variables['port'] != 80) ? ':'.$this->env_variables['port'] : '').dirname($_SERVER['PHP_SELF']).((dirname($_SERVER['PHP_SELF']) == '/') ? '' : '/')) : die('ERROR: File directory reference not detected!');
		}
		else {
			die('ERROR: Environment variables missing!');
		}
	}
	public function convert_out_of_set_chars($url) {
		if (strlen($url) >= 1) {
			$url = urlencode($url);	//To encode out-of-set chars...
			$url_decode_array = array(
				'%21'=>'!',
				'%2A'=>'*',
				'%27'=>"'",
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
}
$env_detection = new env_detect();
header('HTTP/1.1 301 Moved Permanently');
die(header('Location: http://'.$env_detection->convert_out_of_set_chars($env_detection->env_variables['url']).((file_exists('gwc.php') && !file_exists('part.txt')) ? 'gwc.php' : 'installer.php')));
?>