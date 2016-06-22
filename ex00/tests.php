<?php
include_once('back/Map.class.php'); 
include_once('back/Weapon.class.php'); 
include_once('back/Crusader.class.php'); 

// Map tests
$map = new Map(array('size' => [150, 100], 'obstacles' => [[75, 20], [20, 30]]));
//print(Map::doc());
//print_r($map->getMap());
// Spaceship

// Game tests
//$game = new Game(array('players' => [150, 100], 'obstacles' => [[75, 20], [20, 30]]));

// Weapon tests
$laser = new Weapon(array('name' => 'laser', 'range' => [5, 10, 15], 'impact' => 10));
//print(Weapon::doc());
//printf("Name: %s | range: [ %d, %d, %d ] | charge: %d | impact: %d\n", $laser->getName(), $laser->getRange()[0], $laser->getRange()[1], $laser->getRange()[2], $laser->getCharge(), $laser->getImpact());
//$laser->chargeUp();
//printf("Name: %s | range: [ %d, %d, %d ] | charge: %d | impact: %d\n", $laser->getName(), $laser->getRange()[0], $laser->getRange()[1], $laser->getRange()[2], $laser->getCharge(), $laser->getImpact());
//$laser->chargeDown();
//printf("Name: %s | range: [ %d, %d, %d ] | charge: %d | impact: %d\n", $laser->getName(), $laser->getRange()[0], $laser->getRange()[1], $laser->getRange()[2], $laser->getCharge(), $laser->getImpact());
//printf("Name: %s | range: [ %d, %d, %d ] | charge: %d | impact: %d\n", $laser->getName(), $laser->getRange()[0], $laser->getRange()[1], $laser->getRange()[2], $laser->getCharge(), $laser->getImpact());
$fatherOfDespair = new Crusader('father of despair', [0, 0], $laser);
?>
