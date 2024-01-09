<!---------------debut: ENTETE OU BANNIERE DE LA PAGE --------------------------> 
<?php require_once("entetePage.php"); ?>
<!----------------fin: ENTETE DE LA PAGE ----------------------------------------->


<!----------------debut: CORPS DE LA PAGE -------------------------->
<main class="main-corpsPageSujetAccueil">
    
    <form method="post" action="">

        <button class="cercle_transparent" nome="cercle_transparent" >
            <?php
                // include("_config.php");
                include(MODEL_ROOT."solo.php");
                $objetSolo = new solo($connexionBd);
        
                $tirage_existant = $objetSolo->getAfficheTirageSolo();
                $nombre_tirage_existant = count($tirage_existant);

                // print_r($tirage_existant);

                // var_dump($tirage_existant);

                if(isset($_POST["boutton_rouge"]))
                {   
                    if($_POST["traitement_boutton"] === 'true')
                    {
                        //TEST POUR COONNAITRE LE NOMBRE DES CHIFFRES DEJA TIRRER ET CEUX QUI NE SONT PAS ENCORE TIRRER
                        $nbr_chiffre_deja_tirer = 0;
                        $nbr_chiffre_non_tirer = 0;
                        foreach($tirage_existant as $n)
                        {
                            if($n->tirage_solo > 0 || $n->tirage_solo !== NULL )
                            {
                                $nbr_chiffre_deja_tirer++; 
                            }
                            if($n->tirage_solo === 0 || $n->tirage_solo === NULL){
                                $nbr_chiffre_non_tirer++;
                            }
                        }

                            $nombre_aleatoir = random_int(1, 100);
                        
                        // for($i=0; $i < $nombre_tirage_existant; $i++)
                        // {
                            // if($nombre_aleatoir == $tirage_existant[$i])
                            $test = "";
                            while(key_exists($nombre_aleatoir, $tirage_existant))
                            {
                                $test = "chiffre_exist";
                                echo $test."<br>";
                                $nombre_aleatoir = random_int(1, 100);
                                $test = "chiffre_nexiste_pas";
                                // $i = 0; 
                                // if($nombre_tirage_existant == 100)
                                // {
                                //     echo "DESOLER TOUT LES JEUX ONT ETE TIRER VEILLEZ VIDER COLONNE <tirage_solo> DE LA BASE DE DONNEE";
                                // }
                            }
                            // else
                            // {
                            //     $test = "ok";
                            //     break;
                            // }
                        // }
                        if($test === "chiffre_nexiste_pas")
                        {
                            echo $nombre_aleatoir."<br>";
                            
                            echo $nbr_chiffre_deja_tirer."<br>";
                            echo $nbr_chiffre_non_tirer;
                            $objetSolo->setInsererTirageSolo($nombre_aleatoir);
                            // for($i=0; $i < $nombre_tirage_existant; $i++)
                            // {

                            //     echo $nombre_tirage_existant;
                            // }
                        
                            // $tirage_existant[$nombre_tirage_existant] = $nombre_aleatoir;
                        }

                    }
                }
            ?>
        </button> 

        <input type="hidden" id="traitement_boutton" name="traitement_boutton" value=""/>
        <input type="submit" class="boutton_rouge" name="boutton_rouge" value="Top" onclick="document.getElementById('traitement_boutton').value = 'true';" />                                                   
        
    </form>


</main>
<!----------------fin: CORPS DE LA PAGE -------------------------->


<!----------------DEBUT: PIED DE LA PAGE -------------------------->
<?php   require("piedPage.php"); ?> 
<!----------------fin: PIED DE LA PAGE ---------------------------->