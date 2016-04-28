<?php
require_once "DB/pdoDbManager.php";
require_once "DB/DAO/ReservationDAO.php";
require_once "Validation.php";


class ReservationModel 
{
	private $ReservationDAO; // list of DAOs used by this model
	private $dbmanager; // dbmanager
	public $apiResponse; // api response
	private $validationSuite; // contains functions for validating inputs
	
	public function __construct() 
	{
		$this->dbmanager = new pdoDbManager ();
		$this->ReservationDAO = new ReservationDAO ( $this->dbmanager );
		$this->dbmanager->openConnection ();
		$this->validationSuite = new Validation ();
	}
	
	public function makeNewReservation($newReserv)
	{
		// compulsory values
		if (! empty ( $newReserv ["FName"] ) && ! empty ( $newReserv ["SName"] ) && ! empty ( $newReserv ["Email"] ) && ! empty ( $newReserv ["NumPeople"] )&& ! empty ( $newReserv ["Time"] )&& ! empty ( $newReserv ["Date"] ))
		{
			//validation check
			//check if values given can work by passing them into the validation suite
			//if()
			//{
				if ($newId = $this->ReservationDAO->createNewReservation ( $newReserv ))
				{
					return ($newId);
				}
			//}
		}
		
		// if validation fails or insertion fails
		return (false);
	}
	
	//cancel a reservation
	public function cancelReservation($Rid)
	{
		//check id given
		if (is_numeric ( $Rid )) 
		{
			$deletedRows = $this->ReservationDAO->delete ( $Rid );
			
			if ($deletedRows > 0)
				return (true);
		}
		return (false);
	}
	
}
?>