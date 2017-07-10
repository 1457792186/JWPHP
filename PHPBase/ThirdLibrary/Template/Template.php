<?php
/**
 * Template class
 * @author dotcoo zhao <dotcoo@163.com>
 * @link http://www.dotcoo.com/template
 */
class Template {
	public $source;
	public $target;

	function __construct($source = "templates", $target = "templates") {
		$this->source = realpath($source);
		$this->target = realpath($target);
	}

	public function parse ($text) {
		// $text = preg_replace('/^\s+/m', 						"",													$text);
		// $text = preg_replace('/\s+$/m', 						"",													$text);
		// $text = preg_replace("/\r+/", 						"",													$text);
		// $text = preg_replace("/\n+/", 						"",													$text);
		$text = preg_replace("/\\\\/", 							"\\\\",												$text);
		// $text = preg_replace("/\'/", 						"\\'",												$text);
		$text = preg_replace('/{{(\/\*(.+?)\*\/)}}/', 			'<?php $1 ?>', 										$text);
		$text = preg_replace('/{{if \.(.+?)}}/', 				'<?php if (!empty($data["$1"])) { ?>', 				$text);
		$text = preg_replace('/{{if (.+?)}}/', 					'<?php if ($1) { ?>', 								$text);
		$text = preg_replace('/{{else}}/', 						'<?php } else { ?>', 								$text);
		$text = preg_replace('/{{else ?if \.(.+?)}}/', 			'<?php } elseif (!empty($data["$1"])) { ?>', 		$text);
		$text = preg_replace('/{{else ?if (.+?)}}/', 			'<?php } elseif ($1) { ?>', 						$text);
		$text = preg_replace('/{{end}}/', 						'<?php } ?>', 										$text);
		$text = preg_replace('/{{range \.(.+?)}}/', 			'<?php foreach ($data["$1"] as $i => $data) { ?>', 	$text);
		$text = preg_replace('/{{range (.+?)}}/', 				'<?php foreach ($1) { ?>', 							$text);
		$text = preg_replace('/{{endrange}}/', 					'<?php $data = $_data; } ?>', 						$text);
		$text = preg_replace('/{{template (\S+?)}}/', 			'<?php $this->render("$1", $data); ?>', 			$text);
		$text = preg_replace('/{{template (\S+?) \.(.+?)}}/', 	'<?php $this->render("$1", $data["$2"]); ?>', 		$text);
		$text = preg_replace('/{{template (\S+?) (.+?)}}/', 	'<?php $this->render("$1", $2); ?>', 				$text);
		$text = preg_replace('/{{code (.+?)}}/', 				'<?php $1; ?>', 									$text);
		$text = preg_replace('/{{html \.(.+?)}}/', 				'<?php echo $data["$1"]; ?>', 						$text);
		$text = preg_replace('/{{html (.+?)}}/', 				'<?php echo $1; ?>', 								$text);
		$text = preg_replace('/{{\.(.+?)}}/', 					'<?php echo htmlspecialchars($data["$1"]); ?>', 	$text);
		$text = preg_replace('/{{(.+?)}}/', 					'<?php echo htmlspecialchars($1); ?>', 				$text);
		// $text = preg_replace("/\n+/", 						"\n",												$text);
		return $text;
	}

	public function build($source, $target) {
		$text = file_get_contents($source);
		$text = $this->parse($text);
		file_put_contents($target, $text);
	}

	public function builds() {
		$tpls = glob("{$this->source}/*.tpl");
		foreach ($tpls as $tpl) {
			$name = pathinfo($tpl, PATHINFO_FILENAME);
			$source = "{$this->source}/$name.tpl";
			$target = "{$this->source}/$name.php";
			$this->build($source, $target);
		}
	}

	public function render($name, $_data) {
		$filename = "{$this->target}/$name.php";
		if (!file_exists($filename)) {
			return "template $name not found!";
		}
		$data = $_data;
		require $filename;
	}
}
