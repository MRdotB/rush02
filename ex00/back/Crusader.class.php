<?php
include_once('Spaceship.class.php'); 

class Crusader extends Spaceship {
	public function __construct($name, $position, $weapon) {
		parent::__construct(array(
			'name' => $name, 'size' => [2, 7], 'position' => $position,
			'lives' => 8, 'pp' => 12, 'speed' => 10, 'manoeuvrability' => 4,
			'shield' => 0, 'sprite' => '/assets/spaceship.png',
			'weapon' => $weapon
			));
		}
}
?>
