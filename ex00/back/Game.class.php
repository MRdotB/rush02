<?php

include_once('doc.trait.php'); 

class Game {
	use Doc;
	private static $doc_path = 'back/Game.doc.txt';

	private $turn = 0;
	private $phase;
	private $players = [];
	private $currentPlayer;
	private $map;
}
?>
