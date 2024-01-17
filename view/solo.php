<!----------------debut: CORPS DE LA PAGE -------------------------->
<main class="main-corpsPageSujetAccueil">
    
    <form method="post" action="">

        <button class="cercle_transparent" nome="cercle_transparent" >
            <?php

                include(MODEL_ROOT."solo.class.php");
                $objetSolo = new solo($connexionBd);
        
                $tirage_existant = $objetSolo->getAfficheTirageSolo();
                $nombre_tirage_existant = count($tirage_existant);

                if(isset($_POST["boutton_rouge"]))
                {   
                    if($_POST["traitement_boutton"] === 'true')
                    {
                        //TEST POUR COONNAITRE LE NOMBRE DES CHIFFRES DEJA TIRRER ET CEUX QUI NE SONT PAS ENCORE TIRRER
                        $nbr_chiffre_deja_tirer = 0;
                        $nbr_chiffre_non_tirer = 0;
                        foreach($tirage_existant as $n)
                        {
                            if($n->tirage_solo !== NULL || $n->tirage_solo > 0 )
                            {
                                $nbr_chiffre_deja_tirer++; 
                            }
                            if($n->tirage_solo === NULL || $n->tirage_solo === 0){
                                $nbr_chiffre_non_tirer++;
                            }
                        }



                            $nombre_aleatoir = random_int(1, 100);
                            
                            $test = "";
                            while(key_exists($nombre_aleatoir, $tirage_existant))
                            {
                                $test = "chiffre_exist";
                                echo $test."<br>";
                                $nombre_aleatoir = random_int(1, 100);
                                $test = "chiffre_nexiste_pas";
                            }



                        if($test === "chiffre_nexiste_pas" || empty($test))
                        {
                            echo $nombre_aleatoir."<br>";
                            
                            echo "T=".$nbr_chiffre_deja_tirer."<br>";
                            echo "NT=".$nbr_chiffre_non_tirer;
                            $objetSolo->setInsererTirageSolo($nombre_aleatoir);

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
