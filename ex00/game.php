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
	$game->player1->draw_ship($game->player1->armada[0], $game->map);
	$game->player1->draw_ship($game->player1->armada[1], $game->map);
	$game->player1->draw_ship($game->player1->armada[2], $game->map);
	$game->player2->draw_ship($game->player2->armada[0], $game->map);
	$game->player2->draw_ship($game->player2->armada[1], $game->map);
	$game->player2->draw_ship($game->player2->armada[2], $game->map);
	$_SESSION['game'] = $game;
	$_SESSION['currPlayer'] = 'player1';
}

//
//				IMPORTANT METTRE DES $SHIP_RANK = GET_SHIP_RANK
//					A CHAQUE PHASE POUR LES APPELS AVEC SHIP PLIZ
//						ET REMPLACER TOUS LES SHIP PAR DES ARMADA[$SHIP_RANK]
//

Router::listenPost(function ($data) {
	$res = [];
	$game = $_SESSION['game'];
	$player = $_SESSION['currPlayer'];
	$sh_rank = $game->get_ship_rank($player);
	if ($data["phase"] == "clean") {
		$_SESSION = array();
		echo json_encode(array("success" => "clean"));
	}
	else if ($data["phase"] == "order") {
		$game->$player->give($game->$player->armada[$sh_rank], $data);
		print_r($game->$player);
	}
	else if ($data["phase"] == "move") {
		if ($data["move"] == "forward") {
			$r = $game->$player->move($game->$player->armada[$sh_rank], array('move' => 'forward'), $game->map);
		} else if ($data["move"] == "right") {
			$r = $game->$player->move($game->$player->armada[$sh_rank], array('move' => 'right'), $game->map);
		} else if ($data["move"] == "left") {
			$r = $game->$player->move($game->$player->armada[$sh_rank], array('move' => 'left'), $game->map);
		}
		if ($r) {
			$res["map"] = $game->map->getSpace();
			echo json_encode($res);
		}
	} else if ($data["phase"] == "gun") {
		$player == 'player1' ? $nemesis = 'player2' : $nemesis = 'player1';
		$game->$player->gun($game->$player->armada[$sh_rank], $game->map, $game->$nemesis);
		$game->ship_cleaner();
		if ($game->$player->armada[$sh_rank + 1])
		{
			$game->$player->armada[$sh_rank]->desactive();
			$game->$player->armada[$sh_rank + 1]->active();
		}
		else
		{
			$game->$player->armada[$sh_rank]->desactive();
			$game->$player->armada[0]->active();
			$_SESSION['currPlayer'] = $nemesis;
		}
		$game->tour++;
	} else if ($data["phase"] == "info") {
		$info = [];
		$info["player"] = $player;
		$info["lives"] = $game->$player->armada[$sh_rank]->lives;
		$info["shield"] = $game->$player->armada[$sh_rank]->shield;
		echo json_encode($info);
	}
})

?>
