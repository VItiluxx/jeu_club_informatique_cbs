<!---------------debut: ENTETE OU BANNIERE DE LA PAGE --------------------------> 
<?php require_once("entetePage.php"); ?>
<!----------------fin: ENTETE DE LA PAGE ----------------------------------------->

<?php
    include(MODEL_ROOT."jeu.php");
    $objetJeu = new jeu($connexionBd);
    if(isset($_POST["soumettre"]))
    {
        $jeu = $_POST["libelle_exe"];
        if($_POST["choix_jeux"] === "solo")
        {
            $tirage_existant = $objetJeu->setInsererJeuSole($jeu);
        }
        if($_POST["choix_jeux"] === "duel")
        {
            $tirage_existant = $objetJeu->setInsererJeuDuel($jeu);
        }
    }



?>     
        <!----------------debut: CORPS DE LA PAGE -------------------------->
        <main id="body-form_publierEEC">
            <div class="div-form_contenu">
            
                <form method="post">
                    
                    <p id="p-form_admin"> PUBLIER UN JEU </p>
                    <div>
                        <label for="libelle_exe">Choisir le type de jeu: </label>
                        <select name="choix_jeux" id="choix_jeux">
                            <option value="solo">SOLO</option>
                            <option value="duel">DUEL</option>
                        </select>

                    </div>
                    <div>
                        <label for="libelle_exe">Libelle du jeu ici: </label>
                        <textarea class="textarea-form_admin" name="libelle_exe" placeholder="Ennocé du jeu"></textarea>
                    </div>
            
                    <button type="submit" name="soumettre"> SOUMETTRE </button>
            
                </form>
            
            </div>
        
        </main>
        <!----------------fin: CORPS DE LA PAGE ---------------------------->

<!----------------DEBUT: PIED DE LA PAGE -------------------------->
<?php   require("piedPage.php"); ?> 
<!----------------fin: PIED DE LA PAGE ---------------------------->