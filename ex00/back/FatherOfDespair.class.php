<?php
include_once('Spaceship.class.php'); 
include_once('doc.trait.php'); 

class FatherOfDespair extends Spaceship {
	use Doc;
	private static $doc_path = 'back/FatherOfDespair.doc.txt';

	public function __construct($id, $position) {
		parent::__construct(array(
			'id' => $id, 'pos' => $position,
			'lives' => 8, 'pp' => 50, 'movable' => 2,
			'gap_x' => 2, 'gap_y' => 1
			));
		}
}
?>
