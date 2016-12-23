<?php


class Homepage{

	public $database;
	public $shouts;
	public $errors = array();

	function __construct() {
		require_once('class-shoutbox-database.php');
		require_once('class-shoutbox-process.php');

		$host = 'localhost';
		$user = 'root';
		$password = 'pass';
		$db_name = 'shouts';

		$this->database = new Database($host, $user, $password, $db_name);

		if ( isset( $_POST['submit'] ) && $this->database->status ) {
			$processor = new Process($this->database);
			$this->errors = $processor->errors;
		}

		if($this->database->status) {
			$this->shouts = $this->database->getShouts();
		}
	}
}