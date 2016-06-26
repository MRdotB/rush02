<?php
include_once('back/Map.class.php'); 
include_once('back/Game.class.php'); 
include_once('back/Player.class.php'); 
include_once('back/RollDice.trait.php'); 
include_once('back/FatherOfDespair.class.php'); 
include_once('back/Factory.class.php'); 

// Map tests
//print(Map::doc());
//print_r($map->getMap());
// Spaceship

// Game tests
$game = new Game();

echo "father exists\n";
$player = 'players_low';
$game->$player->ship->speed = 8;
$game->$player->draw_ship($game->$player->ship, $game->map);
$game->displayMap($game->map);
$game->$player->move($game->$player->ship, array('move' => 'left'), $game->map);

$game->displayMap($game->map);

