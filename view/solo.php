<!----------------debut: CORPS DE LA PAGE -------------------------->
<main class="main-corpsPageSujetAccueil">
    
    <form method="post" action="">

        <button class="cercle_transparent" nome="cercle_transparent" >
            <?php

                include(MODEL_ROOT."solo.class.php");
                $objetSolo = new solo($connexionBd);
        
                $listeDesChiffres = $objetSolo->AfficheListeDesChiffres_Solo();
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
                            $nbr = (int)$n->tirage_solo;
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
                                    $nbr = (int)$n->tirage_solo;
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

                            if($test === false)
                            {
                                // echo "SOLO N°".$nbrombre_aleatoir."<br>";
                                 echo $nbrombre_aleatoir."<br>";
                                // echo "T=".$nbr_chiffre_deja_tirer."<br>";
                                // echo "NT=".$nbr_chiffres_non_tirer;
                                $objetSolo->setInsererTirageSolo($nbrombre_aleatoir);
                            }
                    }
                }
            ?>
        </button> 

        <input type="hidden" id="traitement_boutton" name="traitement_boutton" value=""/>
        <input type="submit" class="boutton_rouge" name="boutton_rouge" value="Top" onclick="document.getElementById('traitement_boutton').value = 'true';" onclick="startAnimation()"/>                                                   
        
        <?php 
            if(isset($_POST["boutton_rouge"]))
                {   
                    if($_POST["traitement_boutton"] === 'true')
                    {
                        header("Refresh: 4; URL=".HOST."mainSolo.php?id=$nbrombre_aleatoir");
                        exit;
                    }
                }
        ?>

    </form>

    

</main>
<!----------------fin: CORPS DE LA PAGE -------------------------->
