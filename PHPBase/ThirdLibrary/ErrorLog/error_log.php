<?php
// author: dotcoo
// link: http://www.dotcoo.com/php_error_log

function dotcoo_log($type, $data) {
	file_put_contents(__DIR__ . '/log.txt', json_encode(array("date" => date('Y-m-d H:i:s'), "remote_addr" => $_SERVER["REMOTE_ADDR"], "remote_port" => $_SERVER["REMOTE_PORT"], "type" => $type, "data" => $data), JSON_UNESCAPED_UNICODE) . "\n", FILE_APPEND);
}

function dotcoo_request($log_server = false) {
	dotcoo_log("Request", array("server" => $log_server ? $_SERVER : null, "get" => $_GET, "post" => $_POST, "cookie" => $_COOKIE));
}

function dotcoo_error_handler($errno, $errstr, $errfile, $errline) {
	dotcoo_log("error", compact("errfile", "errline", "errno", "errstr"));
}

function dotcoo_exception_handler($e) {
	dotcoo_log("exception", array("file" => $e->getFile(), "line" => $e->getLine(), "code" => $e->getCode(), "message" => $e->getMessage()));
}

function dotcoo_response() {
	dotcoo_log("response", ob_get_flush());
}

$backtraces = debug_backtrace();
if (!empty($backtraces)) {
	ob_start();
	dotcoo_request();
	set_error_handler('dotcoo_error_handler');
	set_exception_handler('dotcoo_exception_handler');
	register_shutdown_function('dotcoo_response');
	return;
}

$fd = fopen(__DIR__ . "/log.txt", "r");
if ($fd === false) {
	exit("file log.txt not found");
}
fseek($fd, -10000, SEEK_END);
fgets($fd);
$lines = array();
while (!feof($fd)) {
	if (count($lines) > 10) {
		array_shift($lines);
	}
	$lines[] = fgets($fd);
}
fclose($fd);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dotcoo Debug</title>
<style type="text/css">
textarea {width:98%}
</style>
</head>
<body>
<?php foreach (array_reverse($lines) as $i => $line) { if (empty($line)) { continue; } ?>
<textarea rows="2"><?php echo $line; ?></textarea>
<?php } ?>
<script type="text/javascript">
var texts = document.getElementsByTagName("textarea");
for (var i = 0; i < texts.length; i++) {
	var text = texts[i];
	var log = null;
	try {
		log = JSON.parse(text.value);
	} catch(e) {
		continue;
	}
	if (log.type != "response") {
		text.value = JSON.stringify(log, null, "\t");
	} else {
		var data = log.data;
		log.data = null;
		text.value = JSON.stringify(log, null, "\t") + "\n" + data.replace(/\\n/g, "\n");
	}
	text.onfocus = function() {
		this.rows = this.value.split("\n").length;
	};
	text.onblur = function() {
		this.rows = 2;
	};
}
</script>
</body>
</html>
