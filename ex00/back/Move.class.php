<?PHP
class Move extends Spaceship
{
	$tab = $_POST;
	if ($tab['speed'] == 0)
		return (/*got to phase gun*/);
	if ($tab['action'] != 'avancer')
	{
		if ($tab['last_move'] < $this->movable)
			return (false);
		else
		{
			if ($tab['action'] == 'left')
				$this->aim == 1 ? $this->aim = 4 : $this->aim--;
			else
				$this->aim == 4 ? $this->aim = 1 : $this->aim++;
		}
	}
	else
	{
		$this->pos = $this->update_pos($this->pos, $this->aim);
		$tab['speed']--;
		isset($tab['last_move']) ? $tab['last_move']++ : $tab['last_move'] = 1;
		$data = json_encode($tab);
		echo $data;
	}

	function update_pos($pos, $aim)
	{
		if ($aim == 1)
			return ($pos[y][x++]);
		else if ($aim == 2)
			return ($pos[y++][x]);
		else if ($aim == 3)
			return ($pos[y][x--]);
		else if ($aim == 4)
			return ($pos[y--][x]);
	}
}
?>
