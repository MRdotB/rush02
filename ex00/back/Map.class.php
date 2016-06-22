<?php

include_once('doc.trait.php'); 

class Map {
	use Doc;
	private static $doc_path = 'back/Map.doc.txt';

	private $map = [];

	public function __construct(array $kwargs) {
		if (!isset($kwargs['size'])) {
			throw new Exception('Class Map missing $kwargs["size"].');
		} else if (!isset($kwargs['obstacles'])) {
			throw new Exception('Class Map missing $kwargs["obstacles"].');
		}

		$this->map['size'] = $kwargs['size'];
		$this->map['obstacles'] = $kwargs['obstacles'];
	}

	public function __get($name) { throw new Exception('You have to use instance.getMap() !'); }
	public function __set($name, $value) { throw new Exception('The attributes of Map Class is read only !'); }

	public function getMap() { return $this->map; }
}
?>
