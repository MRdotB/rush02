<?php

trait talk {
	public function comm($message) {
		echo json_encode(array("message" => $message));
	}
}

?>
