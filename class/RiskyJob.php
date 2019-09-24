<?php  

class RiskyJob {

	private $job_id;
	private $title;
	private $description;
	private $city;
	private $state;
	private $zip;
	private $company;
	private $date_posted;

	public function __construct ( $job_id = 0, $title = '', $description = '', $city = '', $state = '', $zip = '',
		$company = '' ) {

		$this -> setJobID ( $job_id );
		$this -> setTitle ( $title );
		$this -> setDescription ( $description );
		$this -> setCity ( $city );
		$this -> setState ( $state );
		$this -> setZIP ( $zip );
		$this -> setCompany ( $company );

	}

	public function getJobID ( ) {
		return $this -> job_id;
	}

	public function setJobID ( $value ) {
		$this -> job_id = $value;
	}

	public function getTitle ( ) {
		return $this -> title;
	}

	public function setTitle ( $value ) {
		$this -> title = $value;
	}

	public function getDescription ( ) {
		return $this -> description;
	}

	public function setDescription ( $value ) {
		$this -> description = $value;
	}

	public function getCity ( ) {
		return $this -> city;
	}

	public function setCity ( $value ) {
		$this -> city = $value;
	}

	public function getState ( ) {
		return $this -> state;
	}

	public function setState ( $value ) {
		$this -> state = $value;
	}

	public function getZIP ( ) {
		return $this -> zip;
	}

	public function setZIP ( $value ) {
		$this -> zip = $value;
	}

	public function getCompany ( ) {
		return $this -> company;
	}

	public function setCompany ( $value ) {
		$this -> company = $value;
	}

	public function getDatePosted ( ) {
		return $this -> date_posted;
	}

	
}

?>