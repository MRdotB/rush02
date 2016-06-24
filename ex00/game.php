<?php
include_once('back/Map.class.php'); 
include_once('back/Game.class.php'); 
include_once('back/Player.class.php'); 
include_once('back/FatherOfDespair.class.php'); 
include_once('back/Router.class.php'); 

session_start();

// Game tests
if (!$_SESSION['game'])  {
	$map = new Map(array('size' => [75, 50], 'max_X' => 75, 'max_Y' => 50, 'obstacles' => []));
	$game = new Game(array('map' => $map));
	$sorrwo_boy = new FatherOfDespair('A', [10, 10]);
	$player = new Player(array('name' => 'sorrow_boy', 'ship' => $sorrwo_boy));
	$player->draw_ship($sorrwo_boy, $map);

	$sorrwo_boy->speed = 100;

	$_SESSION['game'] = $game;
	$_SESSION['map'] = $map;
	$_SESSION['player'] = $player;
	$_SESSION['sorrow_boy'] = $sorrwo_boy;
}

Router::listenPost(function ($data) {
	$res = [];
	if ($data["phase"] == "clean") {
		$_SESSION = array();
		echo json_encode(array("success" => "clean"));
	}
	else if ($data["phase"] == "move") {
		if ($data["move"] == "forward") {
			$_SESSION['player']->move($_SESSION['sorrow_boy'], array('move' => 'forward'), $_SESSION['map']);
		} else if ($data["move"] == "right") {
			$_SESSION['player']->move($_SESSION['sorrow_boy'], array('move' => 'right'), $_SESSION['map']);
		} else if ($data["move"] == "left") {
			$_SESSION['player']->move($_SESSION['sorrow_boy'], array('move' => 'left'), $_SESSION['map']);
		}
		$res["map"] = $_SESSION['map']->getSpace();
		echo json_encode($res);
	}
})

?>
