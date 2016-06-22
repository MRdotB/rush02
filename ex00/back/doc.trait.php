<?php

trait Doc {
	public static function display() {
		$doc_path = self::$doc_path;
		if (file_exists($doc_path)) {
			return file_get_contents($doc_path);
		}
	}
}

?>
