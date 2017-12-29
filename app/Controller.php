<?php

require("Model.php");

class Controller
{

	private $id;
	private $beschreib;
	private $what;
	private $website;
	private $result;
	private $daten;
	private $model;

	public function __construct()
	{
		$this->daten = true;
		$this->model = new Model();	
	}

	public function setID($id){
		$this->id = $id;
	}

	public function setBeschreib($beschreib){
		$this->beschreib = $beschreib;
	}

	public function setWhat($what){
		$this->what = $what;
	}

	public function setWebsite($website){
		$this->website = $website;
	}

	public function getID(){
		return $this->id;
	}

	public function getBeschreib(){
		return $this->beschreib;
	}

	public function getWhat(){
		return $this->what;
	}

	public function getWebsite(){
		return $this->website;
	}

	public function getEintrag(){
		$this->model->getEintrag(0);
		echo $this->model->getData();
	}

	public function addEintrag($id = 0, $beschreib, $what, $website){
		if (!empty($beschreib) && !empty($what) && !empty($website)) {
			$this->setID($id);
			$this->setBeschreib($beschreib);
			$this->setWhat($what);
			$this->setWebsite($website);

			$this->model->addEintrag($this);
		}else {
			echo false;
		}
	}

	public function deleteEintrag(){
		$this->model->deleteEintrag($this->id);
	}

	public function editEintrag(){
		$this->model->getEintrag($this->id);
		echo $this->model->getData();
	}

	public function install(){
		$this->model->install();
	}

}
?>