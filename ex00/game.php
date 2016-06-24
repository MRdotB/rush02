<?php
include_once('back/Map.class.php'); 
include_once('back/Game.class.php'); 
include_once('back/Player.class.php'); 
include_once('back/FatherOfDespair.class.php'); 
include_once('back/Router.class.php'); 

session_start();

// Game tests
if (!$_SESSION['game'])  {
	$game = new Game();
	$player = 'players_low';
	$game->$player->ship->speed = 100;
	$game->$player->draw_ship($game->$player->ship, $game->map);
	$game->displayMap($game->map);
	$game->$player->move($game->$player->ship, array('move' => 'left'), $game->map);
	$game->displayMap($game->map);
	$_SESSION['game'] = $game;
}

Router::listenPost(function ($data) {
	$res = [];
	$game = $_SESSION['game'];
	$player = 'players_low';
	if ($data["phase"] == "clean") {
		$_SESSION = array();
		echo json_encode(array("success" => "clean"));
	}
	else if ($data["phase"] == "order") {
		$game->$player->give($game->$player->ship, $data);
		print_r($game->$player->ship);
	}
	else if ($data["phase"] == "move") {
		if ($data["move"] == "forward") {
			$game->$player->move($game->$player->ship, array('move' => 'forward'), $game->map);
		} else if ($data["move"] == "right") {
			$game->$player->move($game->$player->ship, array('move' => 'right'), $game->map);
		} else if ($data["move"] == "left") {
			$game->$player->move($game->$player->ship, array('move' => 'left'), $game->map);
		}
		$res["map"] = $game->map->getSpace();
		echo json_encode($res);
	}
})

?>
