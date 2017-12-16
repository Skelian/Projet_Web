<?php
class Bd {
	private $host;
	private $user;
	private $bdd;
	private $passwd;
	private $co;
	function __construct() {
		$this->host = "localhost";
		$this->user = "root";
		$this->bdd = "bd-projet";
		$this->passwd="";
	}
	public function connexion(){
		$this->co=mysqli_connect($this->host,$this->user,$this->passwd,$this->bdd)or die("erreur de connexion");
	}
	public function getCo(){
		return $this->co;
	}
	public function deconnexion(){
		mysqli_close($this->co);
	}
}
?>