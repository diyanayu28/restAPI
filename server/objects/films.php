<?php
class Films{
    // database connection and table name
    private $conn;
    private $table_name = "films";
 
    // object properties
    public $id;
    public $title;
    public $sutradara;
    public $tanggal_tayang;
    public $genre;
	
	// constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
	
	// read films
	function read(){
		// select all query
		$query = "SELECT * FROM " . $this->table_name . " ORDER BY id DESC";
		//$query = "SELECT * FROM films JOIN supplier USING(id_supplier)";
	 
		// prepare query statement
		$stmt = $this->conn->prepare($query);
	 
		// execute query
		$stmt->execute();
	 
		return $stmt;
	}
	
	// create films
	function create(){
		// query to insert record
		$query = "INSERT INTO ".$this->table_name." SET title=?, sutradara=?, tanggal_tayang=?,genre=?";
	 
		// prepare query
		$stmt = $this->conn->prepare($query);
	 
        // sanitize
        $this->title = $this->title;
		$this->sutradara = $this->sutradara;
		$this->tanggal_tayang = $this->tanggal_tayang;
		$this->genre = $this->genre;
	 
		// bind values
        $stmt->bindParam(1, $this->title);
        $stmt->bindParam(2, $this->sutradara);
		$stmt->bindParam(3, $this->tanggal_tayang);
		$stmt->bindParam(4, $this->genre);
	 
		// execute query
		if($stmt->execute()){
			return true;
		}
		return false;
	}
	
	function readOne(){
		// query to read single record
		$query = "SELECT * FROM " . $this->table_name . " WHERE id = ? LIMIT 0,1";
		
		// prepare query statement
		$stmt = $this->conn->prepare( $query );
	 
		// bind id of films to be updated
		$stmt->bindParam(1, $this->id);
	 
		// execute query
		$stmt->execute();
	 
		// get retrieved row
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
	 
		// set values to object properties
		$this->title = $row['title'];
		$this->sutradara = $row['sutradara'];
		$this->tanggal_tayang = $row['tanggal_tayang'];
		$this->genre = $row['genre'];
	}
	
	// delete films
	function delete(){
		// query to insert record
		$query = "DELETE FROM ".$this->table_name." WHERE id = ?";
	 
		// prepare query
		$stmt = $this->conn->prepare($query);
	 
        // sanitize
        $this->id = $this->id;
	 
		// bind values
        $stmt->bindParam(1, $this->id);
	 
		// execute query
		if($stmt->execute()){
			return true;
		}
		return false;
	}

	function update(){
		// query to insert record
		$query = "UPDATE ".$this->table_name." SET title=?, sutradara=?, tanggal_tayang=?,genre=? WHERE id=?";
	 
		// prepare query
		$stmt = $this->conn->prepare($query);
	 
        // sanitize
  //       $this->title = $this->title;
		// $this->sutradara = $this->sutradara;
		// $this->tanggal_tayang = $this->tanggal_tayang;
		// $this->genre = $this->genre;
	 
		// bind values
        $stmt->bindParam(1, $this->title);
        $stmt->bindParam(2, $this->sutradara);
		$stmt->bindParam(3, $this->tanggal_tayang);
		$stmt->bindParam(4, $this->genre);
		$stmt->bindParam(5, $this->id);
	 
		// execute query
		if($stmt->execute()){
			return true;
		}
		return false;
	}
}