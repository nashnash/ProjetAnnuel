<?php
class CheckInscription{


    private $id;
    private $mail;
    private $mdp;
    private $mdp2;
    private $type;
    private $nom;
    private $prenom;
    private $adresse;
    private $num_rue;
    private $ville;
    private $code_postale;

    public function __construct( $id, $mail, $password, $password2, $type, $nom, $prenom, $rue, $numero, $ville, $code_postale )
    {
        $this ->mail = htmlspecialchars($mail);
		$this->mdp = hash('sha256', $password);
		$this->mdp2 = hash('sha256', $password2);
		$this->type = htmlspecialchars($type);
		$this->nom = htmlspecialchars($nom);
		$this->prenom = htmlspecialchars($prenom);
		$this->adresse = htmlspecialchars($rue);
		$this->num_rue = htmlspecialchars($numero);
		$this->ville = htmlspecialchars($ville);
		$this->code_postale = htmlspecialchars($code_postale);
    }

    public function notEmpty(): array{
        $empty;
        if(empty($this->id)){

        }

        return $empty;
    }
}

?>