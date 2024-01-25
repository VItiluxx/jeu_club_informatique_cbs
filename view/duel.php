<!----------------debut: CORPS DE LA PAGE -------------------------->
<main class="main-corpsPageSujetAccueil">
    
    <form method="post" action="">

        <button class="cercle_transparent" nome="cercle_transparent" >
            <?php

                include(MODEL_ROOT."duel.class.php");
                $objetduel = new duel($connexionBd);
        
                $listeDesChiffres = $objetduel->AfficheListeDesChiffres_duel();
                $nombreDesChiffres = (int)count($listeDesChiffres);

                if(isset($_POST["boutton_rouge"]))
                {   
                    if($_POST["traitement_boutton"] === 'true')
                    {
                        // TEST POUR COONNAITRE LE NOMBRE DES CHIFFRES DEJA TIRRER ET CEUX QUI NE SONT PAS ENCORE TIRRER
                        $nbr_chiffre_deja_tirer = 0;
                        $nbr_chiffres_non_tirer = 0;

                        foreach($listeDesChiffres as $n)
                        {
                            $nbr = (int)$n->tirage_duel;
                            // echo $nbr."<br/>";
                            
                            if($nbr == 0 OR $nbr == NULL OR empty($nbr))
                            {
                                $nbr_chiffres_non_tirer++;
                            }
                            else{
                                $nbr_chiffre_deja_tirer++; 
                            }
                        }



                        $nbrombre_aleatoir = random_int(1, 100);
                        // echo $nbrombre_aleatoir;

                        $test = true;
                        do{
                            for($i = 0; $i < $nombreDesChiffres; $i++)
                            {
                                foreach($listeDesChiffres as $n)
                                {
                                    $nbr = (int)$n->tirage_duel;
                                    if($nbrombre_aleatoir === $nbr)
                                    {
                                        $nbrombre_aleatoir = random_int(1, 100);
                                        $i = 0; 
                                        break;
                                    }
                                }   
                            }
                            $test = false;
                        }
                        while($test === true);

                        // if(key_exists($nbrombre_aleatoir, $listeDesChiffres))
                        // {
                        //     $test = "chiffre_exist";
                        //     echo $test."<br>";
                        //     $nbrombre_aleatoir = random_int(1, 100);
                        //     $test = "chiffre_nexiste_pas";
                        // }


                            if($test === false)
                            {
                                echo "DUEL N°".$nbrombre_aleatoir."<br>";

                                // echo "T=".$nbr_chiffre_deja_tirer."<br>";
                                // echo "NT=".$nbr_chiffres_non_tirer;
                                $objetduel->setInsererTirage_duel($nbrombre_aleatoir);
                            }
                    }
                }
            ?>
        </button> 

        <input type="hidden" id="traitement_boutton" name="traitement_boutton" value=""/>
        <input type="submit" class="boutton_rouge" name="boutton_rouge" value="Top" onclick="document.getElementById('traitement_boutton').value = 'true';" />                                                   
        
        <?php 
            if(isset($_POST["boutton_rouge"]))
                {   
                    if($_POST["traitement_boutton"] === 'true')
                    {
                        $jeuDemander = $objetduel->AfficheJeu_duel($nbrombre_aleatoir);
                        foreach($jeuDemander as $jeu)
                        {
                            // var_dump($jeu);
                            echo "<pre>".$jeu->jeux_duel."</pre>";
                        }
                    }
                }
        ?>

    </form>

</main>
<!----------------fin: CORPS DE LA PAGE -------------------------->
