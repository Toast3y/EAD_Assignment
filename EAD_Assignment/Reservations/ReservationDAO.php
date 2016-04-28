<?php

class ReservationDAO 
{
	private $dbManager;
	function ReservationDAO($DBMngr) 
	{
		$this->dbManager = $DBMngr;
	}
	
	public function createNewReservation($parametersArray)
	{
		// insertion assumes that all the required parameters are defined and set
		$sql = "INSERT INTO PendingReservations (FName, SName, Email, NumPeople, Time, Date) ";
		$sql .= "VALUES (?,?,?,?,?,?) ";
		
		$stmt = $this->dbManager->prepareQuery ( $sql );
		
		$this->dbManager->bindValue ( $stmt, 1, $parametersArray ["FName"], $this->dbManager->STRING_TYPE );
		$this->dbManager->bindValue ( $stmt, 2, $parametersArray ["SName"], $this->dbManager->STRING_TYPE );
		$this->dbManager->bindValue ( $stmt, 3, $parametersArray ["Email"], $this->dbManager->STRING_TYPE );
		$this->dbManager->bindValue ( $stmt, 4, $parametersArray ["NumPeople"], $this->dbManager->INT_TYPE );
		$this->dbManager->bindValue ( $stmt, 5, $parametersArray ["Time"], $this->dbManager->TIME_TYPE );
		$this->dbManager->bindValue ( $stmt, 6, $parametersArray ["Date"], $this->dbManager->DATE_TYPE );
		
		
		return ($this->dbManager->getLastInsertedID ());
	}
	
	public function delete($Rid)
	{
		$sql = "DELETE FROM PendingReservations ";
		$sql .= "WHERE PendingReservations.id = ?";
		
		$stmt = $this->dbManager->prepareQuery ( $sql );
		$this->dbManager->bindValue ( $stmt, 1, $Rid, $this->dbManager->INT_TYPE );
		
		$this->dbManager->executeQuery ( $stmt );
		$rowCount = $this->dbManager->getNumberOfAffectedRows ( $stmt );
		return ($rowCount);
	}
}
?>