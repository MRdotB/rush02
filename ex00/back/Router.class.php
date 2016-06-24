<?php
class Router {
	public static function listenPost($callback) {
		$callback($_POST);
	}
}

?>
