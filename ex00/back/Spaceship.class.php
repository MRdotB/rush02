<?php
include_once('doc.trait.php'); 

class Spaceship {
	use Doc;
	private static $doc_path = 'back/Spaceship.doc.txt';

	private $active = false;
	private $name;
	private $size = [];
	private $position = [];
	private $basePP;
	private $currPP;
	private $lives;
	private $speed;
	private $inertia = 0;
	private $manoeuvrability;
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
		} else if (!isset($kwargs['pp'])) {
			throw new Exception('Class Spaceship missing $kwargs["pp"].');
		} else if (!isset($kwargs['speed'])) {
			throw new Exception('Class Spaceship missing $kwargs["speed"].');
		} else if (!isset($kwargs['sprite'])) {
			throw new Exception('Class Spaceship missing $kwargs["sprite"].');
		} else if (!isset($kwargs['weapon'])) {
			throw new Exception('Class Spaceship missing $kwargs["weapon"].');
		} else if (!($kwargs['weapon'] instanceof Weapon)) {
			throw new Exception('$kwargs["weapon"] has to be an instance of Weapon Class.');
		}

		$this->name = $kwargs['name'];
		$this->size = $kwargs['size'];
		$this->position = $kwargs['position'];
		$this->lives = $kwargs['lives'];
		$this->basePP = $kwargs['pp'];
		$this->speed = $kwargs['speed'];
		$this->shield = $kwargs['shield'];
		$this->sprite = $kwargs['sprite'];
		$this->weapon = $kwargs['weapon'];
	}

	public function __get($name) { throw new Exception('You have to use instance.getAttr() !'); }
	public function __set($name, $value) { throw new Exception('You have to use instance.setAttr() !'); }

	public function getName() { return $this->name; }
	public function getSize() { return $this->size; }
	public function getPosition() { return $this->position; }
	public function getPP() { return $this->currPP; }
	public function getLives() { return $this->lives; }
	public function getSpeed() { return $this->speed; }
	public function getInertia() { return $this->inertia; }
	public function getManoeuvrability() { return $this->manoeuvrability; }
	public function getShield() { return $this->shield; }
	public function getSprite() { return $this->sprite; }

	public function shieldUp() { $this->shield++; }
	public function shieldDown() { if ($this->shield > 0) $this->shield--; }
	public function livesUp() { $this->shield++; }
	public function livesDown() { if ($this->shield > 0) $this->shield--; }
	public function PPDown() { if ($this->currPP > 0) $this->currPP--; }

	public function restorePP() {
		$this->currPP = $this->basePP;
	}

	public function active() { return $this->active; }
	public function reverseActive() { $this->active != $this->active; }

	public function buf($item) {
		if ($this->currPP > 0) {
			switch ($item) {
			case "speed":
				$this->speed++;
				break;
			case "gun":
				$this->gun++;
				break;
			case "shield":
				$this->shield++;
				break;
			case "repair":
				$this->repair++;
				break;;
			}
		} else {
			// changement de phase
			// fin phase give
		}
	}
/*
	public function possibleMove() {
		$this->position;
		$this->speed;
		$this->manoeuvrability;
		return
	}

	public function move($pos) {
		$this->position;
		$this->speed;
		$this->manoeuvrability;
	};

 */
}
?>
