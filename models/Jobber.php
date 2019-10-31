<?php 

class Jobber
{

	private $first_name;
	private $last_name;
	private $email;
	private $phone;
	private $job;
	private $resume;

	public function setFirstName ( $value )
	{
		$this -> first_name = $value;
	}

	public function getFirstName ( )
	{
		return $this -> first_name;
	}

	public function setLastName ( $value )
	{
		$this -> last_name = $value;
	}

	public function getLastName ( )
	{
		return $this -> last_name;
	}

	public function setEmail ( $value )
	{
		$this -> email = $value;
	}

	public function getEmail ( )
	{
		return $this -> email;
	}

	public function setPhone ( $value )
	{
		$this -> phone = $value;
	}

	public function getPhone ( )
	{
		return $this -> phone;
	}

	public function setJob ( $value )
	{
		$this -> job = $value;
	}

	public function getJob ( )
	{
		return $this -> job;
	}

	public function setResume ( $value )
	{
		$this -> resume = $value;
	}

	public function getResume ( )
	{
		return $this -> resume;
	}
}
