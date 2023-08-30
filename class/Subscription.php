<?php
class Subscription {	
   
	private $subscribeTable = 'subscription';	
	private $conn;
	
	public function __construct($db){
        $this->conn = $db;
    }	    
	
	public function insert(){
		
		if($this->name && $this->email && $this->verify_token) {

			$stmt = $this->conn->prepare("
			INSERT INTO ".$this->subscribeTable."(`name`, `email`, `verify_token`)
			VALUES(?,?,?)");
		
			$this->name = htmlspecialchars(strip_tags($this->name));
			$this->email = htmlspecialchars(strip_tags($this->email));
			$this->verify_token = htmlspecialchars(strip_tags($this->verify_token));					
			
			$stmt->bind_param("sss", $this->name, $this->email, $this->verify_token);
			
			if($stmt->execute()){
				return true;
			}		
		}
	}
	
	public function update(){
		
		if($this->verify_token) {			
			
			$stmt = $this->conn->prepare("
			UPDATE ".$this->subscribeTable." 
			SET is_verified= ? WHERE verify_token = ?");
	 
			$this->verify_token = htmlspecialchars(strip_tags($this->verify_token));
					
			$stmt->bind_param("is", $this->is_verified, $this->verify_token);
			
			if($stmt->execute()){
				return true;
			}
			
		}	
	}
	
	public function getSusbscriber() {
		if($this->email) {
			$stmtSubscriber = $this->conn->prepare("SELECT * FROM ".$this->subscribeTable." WHERE email = '".$this->email."'");
			$stmtSubscriber->execute();
			$allResult = $stmtSubscriber->get_result();
			$susbscriberRows = $allResult->num_rows;
			return $susbscriberRows;
		}
	}
	
	public function isValidToken() {
		if($this->verify_token) {
			$stmtSubscriber = $this->conn->prepare("SELECT * FROM ".$this->subscribeTable." WHERE verify_token = '".$this->verify_token."'");
			$stmtSubscriber->execute();
			$allResult = $stmtSubscriber->get_result();
			$susbscriberRows = $allResult->num_rows;
			return $susbscriberRows;
		}
	}
}
?>