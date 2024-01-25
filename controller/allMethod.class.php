<?php 
class allMethod
{
    public function affichePageFormulaire()
    {
        require(MODEL_ROOT."formulaire.class.php");
        $objet = new formulaire($connexionBd);
    
        if(isset($_POST["soumettre"]))
        {
            $jeu = $_POST["libelle_exe"];
            $reponse = $_POST["libelle_bonne_reponse"];

            if($_POST["choix_jeux"] === "solo")
            {
                $testInsertion = $objet->setInsererJeuSolo($jeu,$reponse);
 
                if($testInsertion === true)
                {
                    ?><script>alert("QUIZ SOLO inserer avec succes");</script><?php
                }
            }

            if($_POST["choix_jeux"] === "duel")
            {
                $testInsertion = $objet->setInsererJeuDuel($jeu);

                if($testInsertion === true)
                {
                    ?><script>alert("QUIZ DUEL inserer avec succes");</script><?php
                }
            }
        }

        require(VIEW_ROOT."formulaire.php");
    }

   /*============================================================================================================================ */    

    public function affichePageAccueil()
    {

        require(VIEW_ROOT."accueil.php");
    }

    /*============================================================================================================================ */    
    
    public function affichePageJeux()
    {

        require(VIEW_ROOT."jeu.php");
    }



    /*============================================================================================================================ */    

    public function affichePageFiliere()
    {

        include(VIEW_ROOT."filiere.php");
    }

    /*============================================================================================================================ */    

    public function affichePageSolo()
    {


        include(VIEW_ROOT."solo.php");
    }

    /*============================================================================================================================ */    

    public function affichePageDuel()
    { 

        include(VIEW_ROOT."duel.php");
    }
}
    

?>