<?php

class Process{
	public $errors = array();
	private $connection;
	function __construct($connection) {
		$this->connection = $connection;

		if ( empty($_POST['username']) )
			$this->errors[] = 'Please provide a username';
		if ( empty( $_POST['message'] )  )
			$this->errors[] = 'Please provide a shout!';

		if ( empty($this->errors) ) {
			$username = $this->connection->cleanInput( $_POST['username'] );
			$message = $this->connection->cleanInput( $_POST['message'] );

			$this->connection->submitShout( $username, $message );
		}

	}


}


