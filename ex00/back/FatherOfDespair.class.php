<?php
include_once('Spaceship.class.php'); 

class FatherOfDespair extends Spaceship {
	public function __construct($id, $position) {
		parent::__construct(array(
			'id' => $id, 'size' => [1, 3], 'pos' => $position,
			'lives' => 8, 'pp' => 20, 'speed' => 10, 'movable' => 5,
			'shield' => 0
			));
		}
}
?>
