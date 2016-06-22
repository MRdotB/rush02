<?php
include_once('back/Map.class.php'); 
include_once('back/doc.trait.php'); 

// Map tests
$map = new Map(array('size' => [150, 100], 'obstacles' => [[75, 20], [20, 30]]));
//print(Map::display());
//print_r($map->getMap());
// Spaceship

// Game tests
//$game = new Game(array('players' => [150, 100], 'obstacles' => [[75, 20], [20, 30]]));


?>
