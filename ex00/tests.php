<?php
include_once('back/Map.class.php'); 
include_once('back/Game.class.php'); 
include_once('back/Weapon.class.php'); 
include_once('back/Crusader.class.php'); 
include_once('back/Player.class.php'); 
include_once('back/RollDice.trait.php'); 
include_once('back/FatherOfDespair.class.php'); 

// Map tests
$map = new Map(array('size' => [75, 50], 'max_X' => 74, 'max_Y' => 49, 'obstacles' => []));
//print(Map::doc());
//print_r($map->getMap());
// Spaceship

// Game tests
$game = new Game(array('map' => $map));

$sorrwo_boy = new FatherOfDespair('A', [4, 35]);
$enemy = new FatherOfDespair('a', [12, 5]);
echo "father exists\n";


$player = new Player(array('name' => 'sorrow_boy', 'ship' => $sorrwo_boy));

$player->draw_ship($sorrwo_boy, $map);
$game->displayMap($map);

$sorrwo_boy->speed = 8;

$player->move($sorrwo_boy, array('move' => 'left'), $map);
$game->displayMap($map);
$player->move($sorrwo_boy, array('move' => 'forward'), $map);
$game->displayMap($map);
$player->move($sorrwo_boy, array('move' => 'forward'), $map);
$game->displayMap($map);
$player->move($sorrwo_boy, array('move' => 'forward'), $map);
$game->displayMap($map);
$player->move($sorrwo_boy, array('move' => 'forward'), $map);
$game->displayMap($map);
$player->move($sorrwo_boy, array('move' => 'forward'), $map);
$game->displayMap($map);
$move = array('move' => 'left');
$player->move($sorrwo_boy, $move, $map);
$game->displayMap($map);
//print(Weapon::doc());
//printf("Name: %s | range: [ %d, %d, %d ] | charge: %d | impact: %d\n", $laser->getName(), $laser->getRange()[0], $laser->getRange()[1], $laser->getRange()[2], $laser->getCharge(), $laser->getImpact());
//$laser->chargeUp();
//printf("Name: %s | range: [ %d, %d, %d ] | charge: %d | impact: %d\n", $laser->getName(), $laser->getRange()[0], $laser->getRange()[1], $laser->getRange()[2], $laser->getCharge(), $laser->getImpact());
//$laser->chargeDown();
//printf("Name: %s | range: [ %d, %d, %d ] | charge: %d | impact: %d\n", $laser->getName(), $laser->getRange()[0], $laser->getRange()[1], $laser->getRange()[2], $laser->getCharge(), $laser->getImpact());
//printf("Name: %s | range: [ %d, %d, %d ] | charge: %d | impact: %d\n", $laser->getName(), $laser->getRange()[0], $laser->getRange()[1], $laser->getRange()[2], $laser->getCharge(), $laser->getImpact());
//$fatherOfDespair = new Crusader('father of despair', [0, 0], $laser);
?>
