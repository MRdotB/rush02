<?PHP
include_once('FatherOfDespair.class.php');

class SpaceshipFactory
{
    public static function create($type, $id, $position)
	{
		return new $type($id, $position);
	}
}	
?>
