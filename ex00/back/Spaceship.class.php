<?php
include_once('doc.trait.php'); 

class Spaceship {
	use Doc;
	private static $doc_path = 'back/Spaceship.doc.txt';

	private $active = false;
	private $name;
	private $size = [];
	private $position = [];
	private $lives;
	private $energy;
	private $speed;
	private $shield = 0;
	private $sprite;

	public $weapon;

	public function __construct(array $kwargs) {
		if (!isset($kwargs['name'])) {
			throw new Exception('Class Spaceship missing $kwargs["name"].');
		} else if (!isset($kwargs['size'])) {
			throw new Exception('Class Spaceship missing $kwargs["size"].');
		} else if (!isset($kwargs['position'])) {
			throw new Exception('Class Spaceship missing $kwargs["position"].');
		} else if (!isset($kwargs['lives'])) {
			throw new Exception('Class Spaceship missing $kwargs["lives"].');
		} else if (!isset($kwargs['energy'])) {
			throw new Exception('Class Spaceship missing $kwargs["energy"].');
		} else if (!isset($kwargs['speed'])) {
			throw new Exception('Class Spaceship missing $kwargs["speed"].');
		} else if (!isset($kwargs['sprite'])) {
			throw new Exception('Class Spaceship missing $kwargs["sprite"].');
		}

		$this->name = $kwargs['name'];
		$this->size = $kwargs['size'];
		$this->position = $kwargs['position'];
		$this->lives = $kwargs['lives'];
		$this->energy = $kwargs['energy'];
		$this->speed = $kwargs['speed'];
		$this->shield = $kwargs['shield'];
		$this->sprite = $kwargs['sprite'];
		$this->weapon = $kwargs['weapon'];
	}

	public function __get($name) { throw new Exception('You have to use instance.getAttr() !'); }
	public function __set($name, $value) { throw new Exception('You have to use instance.setAttr() !'); }

	public function getName() {  };
?>
