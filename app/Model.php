<?php
class Model
{
	private $meldung;
	private $daten;
	private $result;
	private $query;

	private $dbhost = '127.0.0.1';
	private $dbuser = 'root';
	private $dbpass = 'root';
	private $dbname = 'goTutorial'; 
	private $conn;


	public function __construct() {
		//Verbindung zu Datenbank erstellen
		try{
			$this->conn = new PDO("mysql:host=$this->dbhost;dbname=$this->dbname", $this->dbuser, $this->dbpass, [
				PDO::ATTR_ERRMODE			=> PDO::ERRMODE_EXCEPTION,
				PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
			]);
			return $this->conn;
		} catch (PDOException $e) {
			die('Keine Verbindung zur Datenbank möglich: ' . $e->getMessage());
		}
	}

	public function sqlQuery()
	{
		try {
			$this->result = $this->conn->prepare($this->query);
			$this->result ->execute();
			$this->status = 200;
		} catch (Exception $e) {
			$this->status = 401;
			$this->daten = false;
			die('Datenverbindung nicht erfolgreich: ' . $e->getMessage());
		}
	}

	public function setQuery($query) {
		$this->query = $query;
	}

	public function getData() {
        if($this->status == 200) {
            $this->daten = $this->result->fetchAll();       
        } else {
            $this->daten = array('status' => false, 'meldung' => 'Nicht erfolgreich');
        }

        // HTTP Status ändern
        http_response_code($this->status);
        
        // Daten zurückliefern
        return json_encode($this->daten);
    }

	public function getEintrag($id){
		if ($id != 0){
			$this->query = "SELECT * FROM tutorial_eintraege WHERE id =" . $id;
		} else {
			$this->query = "SELECT * FROM tutorial_eintraege ORDER BY id"; 
		}
		$this->sqlQuery();
	}

	public function addEintrag($eintrag){
		$id = $eintrag->getID();
		$beschreib = $eintrag->getBeschreib();
		$what = $eintrag->getwhat();
		$website = $eintrag->getWebsite();

		if ($id == 0) {
			$this->query = "INSERT INTO tutorial_eintraege (tutorial_beschreib, tutorial_what, tutorial_url) VALUES (\"$beschreib\",\"$what\", \"$website\")";
		} else {
			$this->query = "UPDATE tutorial_eintraege SET tutorial_beschreib = \"$beschreib\", tutorial_what = \"$what\", tutorial_url = \"$website\" WHERE private.id=" - $id;
		}
		$this->sqlQuery();
	}

	public function deleteEintrag($id){
		if ($id != 0) {
			$this->query = "DELETE FROM tutorial_eintraege WHERE tutorial_eintraege.id=" . $id;
			$this->sqlQuery();
		}
	}

	public function install(){
		$this->query = "CREATE DATABASE IF NOT EXISTS goTutorial CHARACTER SET utf8 COLLATE utf8_general_ci;
						USE goTutorial;
						CREATE TABLE IF NOT EXISTS tutorial_eintraege(
						    id int(11) PRIMARY KEY AUTO_INCREMENT,
						    tutorial_beschreib varchar(255),
						    tutorial_what varchar(255),
						    tutorial_url varchar(255)
						    );";

						    $this->conn = new PDO ("mysql:host=$this->dbhost" , $this->dbuser , $this->dbpass);

						    sqlQuery();
		}

}

?>