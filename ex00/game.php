<?php
include_once('back/Map.class.php'); 
include_once('back/Game.class.php'); 
include_once('back/Weapon.class.php'); 
include_once('back/Crusader.class.php'); 
include_once('back/Player.class.php'); 
include_once('back/FatherOfDespair.class.php'); 
include_once('back/Router.class.php'); 

session_start();

// Game tests
if (!$_SESSION['game'])  {
	$map = new Map(array('size' => [75, 50], 'max_X' => 75, 'max_Y' => 50, 'obstacles' => []));
	$game = new Game(array('map' => $map));
	$sorrwo_boy = new FatherOfDespair('A', [2, 2]);
	$enemy = new FatherOfDespair('a', [2, 2]);
	$player = new Player(array('name' => 'sorrow_boy', 'ship' => $sorrwo_boy));
	$player->draw_ship($sorrwo_boy, $map);

	$sorrwo_boy->speed = 5;

	$_SESSION['game'] = $game;
	$_SESSION['map'] = $map;
	$_SESSION['player'] = $player;
	$_SESSION['sorrow_boy'] = $sorrwo_boy;
}

Router::listenPost(function ($data) {
//	echo json_encode(array_values($map->getSpace()));
	$res = [];
	$res["map"] = $_SESSION['map']->getSpace();
	echo json_encode($res);
	if ($data["phase"] == "move") {
		if ($data["move"] == "forward") {
			$_SESSION['player']->move($_SESSION['sorrow_boy'], array('move' => 'left'), $_SESSION['map']);
		}
	}
	else if ($data["phase"] == "order") {

	}
})

?>
