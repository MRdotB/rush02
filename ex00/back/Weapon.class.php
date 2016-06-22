<?php

include_once('doc.trait.php'); 

class Weapon {
	use Doc;
	private static $doc_path = 'back/Weapon.doc.txt';

	private $name;
	private $range = [];
	private $charge = 0;
	private $impact;

	public function __construct(array $kwargs) {
		if (!isset($kwargs['range'])) {
			throw new Exception('Class Weapon missing $kwargs["range"].');
		} else if (!isset($kwargs['impact'])) {
			throw new Exception('Class Weapon missing $kwargs["impact"].');
		} else if (!isset($kwargs['name'])) {
			throw new Exception('Class Weapon missing $kwargs["name"].');
		}

		$this->name = $kwargs['name'];
		$this->range = $kwargs['range'];
		$this->impact = $kwargs['impact'];
	}


	public function __get($name) { throw new Exception('You have to use the appropriate getter!'); }
	public function __set($name, $value) { throw new Exception('The attributes of Class Weapon are not writeable if they have no setter!'); }

	public function getName() { return $this->name; }
	public function getRange() { return $this->range; }
	public function getImpact() { return $this->impact; }
	public function getCharge() { return $this->charge; }

	public function chargeUp() { $this->charge++; }
	public function chargeDown() {
		if ($this->charge > 0) {
			$this->charge--;
		}
	}
}
?>
