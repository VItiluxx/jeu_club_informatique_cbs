<?php
    include_once("connexionBd.php");
    
    class jeu
    {
        private $connexionBd;

        public function __construct($connexion) {
            $this->connexionBd = $connexion;
        }

        public function setInsererJeuSolo($libelle)
        {
            $requette = $this->connexionBd->prepare('INSERT INTO solo(jeux_solo) VALUE (:jeux_solo) ');
            $requette->bindParam(':jeux_solo', $libelle, PDO::PARAM_STR);
            $requette->execute();
            return true;
        }

        public function setInsererJeuDuel($libelle)
        {
            $requette = $this->connexionBd->prepare('INSERT INTO duel(jeux_duel) VALUE (:jeux_duel) ');
            $requette->bindParam(':jeux_duel', $libelle, PDO::PARAM_STR);
            $requette->execute();
            return true;
        }
    }

 ?>