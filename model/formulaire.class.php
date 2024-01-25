<?php
    include_once("connexionBd.php");
    
    class formulaire
    {
        private $connexionBd;

        public function __construct($connexion) {
            $this->connexionBd = $connexion;
        }

        public function setInsererJeuSolo($libelle,$reponse)
        {
            $requette = $this->connexionBd->prepare('INSERT INTO solo(jeux_solo,bonne_reponse_jeu_solo) VALUE (:jeux_solo,:reponse) ');
            $requette->bindParam(':jeux_solo', $libelle, PDO::PARAM_STR);
            $requette->bindParam(':reponse', $reponse, PDO::PARAM_STR);
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