<?PHP

include_once('back/RollDice.trait.php');

class Player
{//map et pos sont put as [X][Y]
	public $name;
	public $ship;
	//	public $armada = array(); BONUS

	use RollDice;

	public function gun($ship, $map, $nemesis)//prend armada ennemie normalement
	{
		if ($this->hay_target($ship, $map, $nemesis) == NULL);//get target name normaly
		{
			echo ("You can't reach anything, you lose your PP stupidly\n");
			return ;
		}
		while ($ship->gun)
		{
			$shoot = RollDice();
			echo "You throw a dice and obtain $shoot\n";
			if ($shoot >= 4)
			{
				echo "You harm you nemesis ! Keep going !\n";
				$nemesis->ship->shield ? $nemesis->ship->shield-- : $nemesis->ship->lives--;
				if ($shoot == 6)
					$nemesis->ship->lives--;
			}
			else
				echo "You miss. Fear the upcoming revenge of your nemesis's Armada\n";
			if ($nemesis->ship->lives = 0)
				$this->remove_ship($nemesis->ship, $map);
			$ship->gun--;
		}
	}

	private function hay_target($ship, $map, $nemesis)
	{
		$back = $ship->pos;
		$range = 5;//peut etre variable du coup
		while ($range)
		{
			$this->forward($ship->pos, $ship->aim);
			if ($map[$ship->pos[0]][$ship->pos[1]] == $nemesis->ship->id)//enemy name
			{
				$ship->pos = $back;
				return ($nemesis->ship->id);
			}
			$range--;
		}
		$ship->pos = $back;
		return (NULL);
	}

	public function give($ship, $data) //instance de class Spaceship + data web
	{
		$ship->shield = $data['shield'];//HOW INFO FROM HTML IS FORMATED
		$ship->gun = $data['gun'];
		$ship->speed = $data['speed'];
		$repair = $data['repair'];
		while ($repair)
		{
			if (RollDice() == 6 && $ship->lives < $ship->max_lives)
				$ship->lives++;
			$repair--;
		}
	}

	public function move($ship, $data, $map)
	{
		if (!$ship->speed)
		{
			echo "passe phase suivante\n";
			return ;
		}
		$ship->speed--;
		if ($data['move'] != 'forward')
		{
			if ($ship->last_move < $ship->movable)
			{
				echo "You can't turn so far\n";
				return ;
			}
			else
			{
				$this->remove_ship($ship, $map);
				$this->turn($ship, $data['move']);
				$ship->last_move = 0;
			}
		}
		else
		{
			$this->remove_ship($ship, $map);
			$this->forward($ship);
			$ship->last_move++;
		}
		if ($this->is_crashed($ship, $map) == TRUE)
			echo "You crashed your ship\n";
		else
			$this->draw_ship($ship, $map);
	}

	public function turn($ship, $where)
	{
		if ($where === 'left')
			$ship->aim == 1 ? $ship->aim = 4 : $ship->aim--;
		else
			$ship->aim == 4 ? $ship->aim = 1 : $ship->aim++;
	}

	public function remove_ship($ship, $map)
	{
		$map->space[$ship->pos[0]][$ship->pos[1]] = ".";
		if ($ship->aim % 2 == 0)
		{
			$map->space[$ship->pos[0]][$ship->pos[1] - 1] = ".";//id = LETTRE
			$map->space[$ship->pos[0]][$ship->pos[1] + 1] = ".";
		}
		else
		{
			$map->space[$ship->pos[0] - 1][$ship->pos[1]] = ".";//id = LETTRE
			$map->space[$ship->pos[0] + 1][$ship->pos[1]] = ".";
		}
		return ($map);
	}

	public function draw_ship($ship, $map)
	{//bonus = implementer un draw map pour tous types vaisseaux
		print_r($ship->pos);
		$map->space[$ship->pos[0]][$ship->pos[1]] = $ship->id;
		if ($ship->aim % 2 == 0)
		{
			$map->space[$ship->pos[0]][$ship->pos[1] - 1] = $ship->id;//id = LETTRE
			$map->space[$ship->pos[0]][$ship->pos[1] + 1] = $ship->id;
		}
		else
		{
			$map->space[$ship->pos[0] - 1][$ship->pos[1]] = $ship->id;//id = LETTRE
			$map->space[$ship->pos[0] + 1][$ship->pos[1]] = $ship->id;
		}
		return ($map);
	}

	private function get_area($ship, $map)
	{
		$area = array();
		array_push($area, [[$ship->pos[0]], [$ship->pos[1]]]);
		if ($ship->aim % 2 == 0)
		{
			array_push($area, [[$ship->pos[0]], [$ship->pos[1] - 1]]);
			array_push($area, [[$ship->pos[0]], [$ship->pos[1] + 1]]);
		}
		else
		{
			array_push($area, [[$ship->pos[0] - 1], [$ship->pos[1]]]);
			array_push($area, [[$ship->pos[0] + 1], [$ship->pos[1]]]);
		}
		return ($area);
	}

	private function is_crashed($ship, $map)
	{
		$area = $this->get_area($ship, $map);
		print_r($area);
		foreach ($area as $el)
		{
			if ($el[0] > $map->max_X || $el[1] > $map->max_y
				|| $el[0] < 1 || $el[1] < 1 || $map->space[$el[0]][$el[1]] != '.')
				return TRUE;
		}
		return FALSE;
	}

	public function forward($ship)
	{
		if ($ship->aim == 1)
			($ship->pos[1]--);
		else if ($ship->aim == 2)
			($ship->pos[0]++);
		else if ($ship->aim == 3)
			($ship->pos[1]++);
		else if ($ship->aim == 4)
			($ship->pos[0]--);
	}
}
?>
