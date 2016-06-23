<?php
include_once('Spaceship.class.php'); 

class FatherOfDespair extends Spaceship {
	public function __construct($id, $position, $weapon) {
		parent::__construct(array(
			'id' => $id, 'size' => [3, 7], 'position' => $position,
			'lives' => 8, 'pp' => 12, 'speed' => 10, 'manoeuvrability' => 5,
			'shield' => 0, 'sprite' => '/assets/spaceship.png',
			'weapon' => $weapon
			));
		}
}
?>
