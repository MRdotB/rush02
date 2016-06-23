<?php

include_once('doc.trait.php'); 

class Game {
	use Doc;
	private static $doc_path = 'back/Game.doc.txt';

	private $turn = 0;
	private $players = [];
	private $currentPlayer;
	public $map;

	public function __construct(array $kwargs) {
		$this->map = $kwargs['map'];
	}

//	public function __get($name) { throw new Exception('You have to use instance.getAttr() !'); }
//	public function __set($name, $value) { throw new Exception('You have to use instance.setAttr() !'); }

	public function displayMap() {
		for ($y = 0; $y < $this->map->getSize()[1]; $y++) {
			for ($x = 0; $x < $this->map->getSize()[0]; $x++) {
				echo $this->map->getSpace()[$x][$y];
			}
			echo "\n";
		}
	}
}
?>
