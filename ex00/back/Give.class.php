<?PHP
	include_once('doc.trait.php');
	include_once('Spaceship.class.php');
	
	class Give extends Spaceship
	{
		use RollDice;
		$out['gun'] = $_POST['gun'];
		$out['shield'] = $_POST['shield'];
		$out['speed'] = $_POST['speed'];
		$repair = $_POST['repair'];
		while ($repair > 0)
		{
			if (RollDice() == 6)
				$this->lives++;	
			$repair--;
		}
		$out['lives'] = $this->lives;
		$data = json_encode($out);
		echo $data;
	}
?>
