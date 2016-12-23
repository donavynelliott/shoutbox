<?php

class Database {

	private $connection;
	public $status;

	public function __construct($host, $user, $password, $db_name) {
		//create a database connection
		$this->connection = ( isset($this->connection) ) ? $this->connection : $this->connectToDb($host, $user, $password, $db_name);

		if ( $this->status )
			date_default_timezone_set('America/Los_Angeles');
	}

	public function connectToDb($host, $user, $password, $db_name) {
		$link = new mysqli($host, $user, $password, $db_name);

		if($link->connect_errno) {
			echo 'failed to connectA to MySQL: ' . $mysqli_connect_error;
			$this->status = false;
			die();
		} else {
			$this->status = true;
		}
		return $link;
	}

	public function getShouts() {
		$query = "SELECT * FROM `shouts` ORDER BY time DESC";

		$shouts = $this->connection->query($query);

		if($shouts) {
			while ($row = $shouts->fetch_object()) {
				$return[] = $row;
			}

			$shouts->close();
		}

		return $return;
	}

	public function cleanInput($input) {
		return mysqli_escape_string( $this->connection, $input );
	}

	public function submitShout($username, $message) {
		$time = date('h:i:s a', time() );
		$query = "INSERT INTO shouts (user, message, time) VALUES ('${username}', '${message}', '${time}')";

		if (!$this->status)
			return false;

		return $this->connection->query($query);
	}
}
