<?php
    include_once("connexionBd.php");
    
    class duel
    {
        private $connexionBd;

        public function __construct($connexion) {
            $this->connexionBd = $connexion;
        }

        public function AfficheJeu_duel($id_duel)
        {
            $requette = $this->connexionBd->prepare('SELECT jeux_duel FROM duel WHERE id_duel = :id_duel');
            $requette->bindParam(':id_duel', $id_duel, PDO::PARAM_INT);
            $requette->execute();
            $donnees = $requette->fetchAll(PDO::FETCH_OBJ);
            return $donnees;
        }


        public function AfficheListeDesChiffres_duel()
        {
            $requette = $this->connexionBd->query('SELECT tirage_duel FROM duel');
            $donnees = $requette->fetchAll(PDO::FETCH_OBJ);
            return $donnees;
        }
        
        public function setInsererTirage_duel($tirage_duel)
        {
            $requette = $this->connexionBd->prepare('UPDATE duel SET tirage_duel = :tirage WHERE id_duel = :id');
            $requette->bindParam(':tirage', $tirage_duel, PDO::PARAM_INT);
            $requette->bindParam(':id', $tirage_duel, PDO::PARAM_INT);
            $requette->execute();
        }

        public function setUpdateJeu_duel($libelle,$id_duel)
        {
            $requette = $this->connexionBd->prepare('UPDATE duel SET jeux_duel = :libelle WHERE id_duel = :id_duel');
            $requette->bindParam(':libelle', $libelle, PDO::PARAM_STR);
            $requette->bindParam(':id_duel', $id_duel, PDO::PARAM_INT);
            $requette->execute();
        }
    }

    ?>