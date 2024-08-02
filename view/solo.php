<!----------------debut: CORPS DE LA PAGE -------------------------->
<script src="<?=ASSET_HOST?>js.js" defer></script>
<main class="main-corpsPageSujetAccueil">
    <form method="post" action="">
        <button id="output" nome="cercle_transparent">
            <?php
                include(MODEL_ROOT."solo.class.php");
                $objetSolo = new solo($connexionBd);

                $listeDesTirages = $objetSolo->AfficheListeDeTirages_Solo();
                $tirages = array();
                foreach($listeDesTirages as $tirage) {
                    if($tirage->tirage_solo === NULL) {
                        $tirages[] = (int)0; 
                    } else {
                        $tirages[] = $tirage->tirage_solo;
                    }
                }

                $nombreDesTirages = count($listeDesTirages);
                $NombreDesQuestions = array();
                for($i = 0; $i <= $nombreDesTirages; $i++) {
                    $NombreDesQuestions[$i] = $i;
                }

                if(isset($_POST["boutton_rouge"])) {   
                    if($_POST["traitement_boutton"] === 'true') {
                        $nbr_chiffre_deja_tirer = 0;
                        $nbr_chiffres_non_tirer = 0;

                        foreach($listeDesTirages as $ligne) {
                            $valeur = $ligne->tirage_solo;
                            if($valeur == 0 OR $valeur == NULL OR empty($valeur)) {
                                $nbr_chiffres_non_tirer++;
                            } else {
                                $nbr_chiffre_deja_tirer++; 
                            }
                        }

                        $test = true;
                        do {
                            $nombre_aleatoir = random_int(1, 100);
                            if(!in_array((int)0, $tirages)) {
                                ?><script>alert("ATTENTION: TOUS LES JEUX ONT ÉTÉ PIOCHÉS. VEUILLEZ VIDER LA COLONNE << tirage_solo >> DE LA BASE DE DONNÉE ET RÉESSAYER")</script><?php
                                break;
                                exit;
                            }
                        } while(!in_array($nombre_aleatoir, $NombreDesQuestions) OR in_array($nombre_aleatoir, $tirages));
                        
                        if(in_array((int)0, $tirages)) {
                            $test = false;
                            if($test == false) {
                                echo "<script>";
                                echo "document.addEventListener('DOMContentLoaded', function() {";
                                echo "let nombreAlea = '" . $nombre_aleatoir . "';";
                                echo "animationChiffre(nombreAlea);";
                                echo "});";
                                echo "</script>";
                                // $objetSolo->setInsererTirageSolo($nombre_aleatoir);
                                header("Refresh: 3.5; URL=". HOST ."mainSolo.php?id=$nombre_aleatoir");
                                exit;
                            }
                        }
                    }
                }
            ?>
        </button> 

        <input type="hidden" id="traitement_boutton" name="traitement_boutton" value=""/>
        <input type="submit" class="boutton_rouge" name="boutton_rouge" value="Top" onclick="document.getElementById('traitement_boutton').value = 'true';"/>                                                   
    </form>
</main>
<!----------------fin: CORPS DE LA PAGE -------------------------->
