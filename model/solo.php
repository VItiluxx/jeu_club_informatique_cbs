<?php
    include_once("connexionBd.php");
    
    class solo
    {
        private $connexionBd;

        public function __construct($connexion) {
            $this->connexionBd = $connexion;
        }

        public function getAfficheJeuSolo($id_solo)
        {
            $requette = $this->connexionBd->prepare('SELECT * FROM solo WHERE id_solo = :id_solo');
            $requette->bindParam(':id_solo', $id_solo, PDO::PARAM_INT);
            $donnees = $requette->fetchAll(PDO::FETCH_OBJ);
            return $donnees;
        }


        public function getAfficheTirageSolo()
        {
            $requette = $this->connexionBd->query('SELECT tirage_solo FROM solo');
            $donnees = $requette->fetchAll(PDO::FETCH_OBJ);
            return $donnees;
        }
        public function setInsererTirageSolo($tirage_solo)
        {
            $requette = $this->connexionBd->prepare('UPDATE solo SET tirage_solo = :tirage_solo WHERE id_solo = :tirage_solo');
            $requette->bindParam(':tirage_solo', $tirage_solo, PDO::PARAM_INT);
            $requette->bindParam(':id_solo', $tirage_solo, PDO::PARAM_INT);
            $requette->execute();
        }

        public function setInsererJeuSolo($libelle)
        {
            $requette = $this->connexionBd->prepare('INSERT INTO solo(jeux_solo) VALUE (:libelle) ');
            $requette->bindParam(':libelle', $libelle, PDO::PARAM_STR);
            $requette->execute();
        }

        public function setUpdateJeuSolo($libelle,$id_solo)
        {
            $requette = $this->connexionBd->prepare('UPDATE solo SET jeux_solo = :libelle WHERE id_solo = :id_solo');
            $requette->bindParam(':libelle', $libelle, PDO::PARAM_STR);
            $requette->bindParam(':id_solo', $id_solo, PDO::PARAM_INT);
            $requette->execute();
        }
    }

    ?>