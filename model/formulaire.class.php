<?php
    include_once("connexionBd.php");
    
    class formulaire
    {
        private $connexionBd;

        public function __construct($connexion) {
            $this->connexionBd = $connexion;
        }

        public function setInsererJeuSolo($question_solo,$reponse_a_solo,$reponse_b_solo,$reponse_c_solo,$reponse_d_solo,$bonne_reponse_solo)
        {
            $requette = $this->connexionBd->prepare('INSERT INTO solo(question_solo,reponse_a_solo,reponse_b_solo,reponse_c_solo,reponse_d_solo,bonne_reponse_solo) VALUE (:question_solo,:reponse_a_solo,:reponse_b_solo,:reponse_c_solo,:reponse_d_solo,:bonne_reponse_solo) ');
            $requette->bindParam(':question_solo',  $question_solo, PDO::PARAM_STR);
            $requette->bindParam(':reponse_a_solo', $reponse_a_solo, PDO::PARAM_STR);
            $requette->bindParam(':reponse_b_solo', $reponse_b_solo, PDO::PARAM_STR);
            $requette->bindParam(':reponse_c_solo', $reponse_c_solo, PDO::PARAM_STR);
            $requette->bindParam(':reponse_d_solo', $reponse_d_solo, PDO::PARAM_STR);
            $requette->bindParam(':bonne_reponse_solo', $bonne_reponse_solo, PDO::PARAM_STR);
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