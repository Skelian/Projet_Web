<?php
require_once("bd.php");
class Benevole {
	private $co;
	private $identifiant;
	private $prenom;
	private $nom;
	private $mdp;
	private $email;
    private $telephone;
	private $dateNaissance;
	private $codePostal
	private $id;
	
	function __construct($co,$login,$mdp) {
            $this->co=$co;
			$requete="SELECT `numBenevole` as num,`personne`.`nomPersonne` as nom, `personne`.`prenomPersonne` as prenom,
			`personne`.`mailPersonne` as mail, `personne`.`telPersonne` as tel, `personne`.`codePostal` as CP, `personne`.`dateNaissance` as dateNaissance 
                      FROM `benevole`, `personne` 
                      WHERE `benevole`.`numPersonne`=`personne`.`numPersonne` 
                      AND `loginBenevole`='$login' AND `mdpBenevole`='$mdp'";

			$resultat=mysqli_query($this->co,$requete) or die("erreur de requete");
			if(mysqli_num_rows($resultat)>0) {
                $ligne = mysqli_fetch_assoc($resultat);
                $this->id = $ligne['num'];
                $this->email = $ligne['mail'];
                $this->nom=$ligne['nom'];
                $this->prenom=$ligne['prenom'];
                $this->telephone = $ligne['tel'];
				$this->dateNaissance = $ligne['dateNaissance'];
				$this->codePostal = $ligne['CP'];
                $this->identifiant =$login;
                $this->mdp = $mdp;
            }
	}
	public function connexion(){
		session_start();
		echo "connexion $this->prenom";
		$_SESSION["benevole"]=$this;
	}
    /**
     * @return mixed
     */
    public function getIdentifiant()
    {
        return $this->identifiant;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @return mixed
     */
    public function getMdp()
    {
        return $this->mdp;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getTelephone()
    {
        return $this->telephone;
    }
	
	public function getDateNaissance()
    {
        return $this->dateNaissance;
    }
	
	public function getCodePostal()
    {
        return $this->codePostal;
    }	

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

	public function deconnexion(){
		session_destroy();
	}
	
}
?>