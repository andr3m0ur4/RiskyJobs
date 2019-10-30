<?php  

class SQL extends MySQLi {

	private $conn;

	public function __construct ( $host, $user, $pass, $dbname ) {

		$this -> conn = new mysqli ( $host, $user, $pass, $dbname );

		if ( $this -> conn -> connect_error ) {
			die ( 'Erro de conexão (' . $this -> conn -> connect_errno . '): ' . $this -> conn -> connect_error );
		}

	}

	public function select ( $rawQuery ) {

		$result = $this -> conn -> query ( $rawQuery );

		//for ( $set = array ( ); $row = $result -> fetch_assoc ( ); $set[] = $row );

		return $result;

	}
	
	public function __destruct ( ) {

		$this -> conn -> close ( );

	}
}

?>