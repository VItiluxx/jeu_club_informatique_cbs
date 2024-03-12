<!----------------debut: CORPS DE LA PAGE -------------------------->
<script src="<?=ASSET_HOST?>js.js"></script>

<main class="main-corpsPageSujetAccueil">
    
    <form method="post" action="">

        <button nome="cercle_transparent" id="output">
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



                        $nombre_aleatoir = random_int(1, 100);
                        // echo $nombre_aleatoir;

                        $test = true;
                        do{
                            for($i = 0; $i < $nombreDesChiffres; $i++)
                            {
                                foreach($listeDesChiffres as $n)
                                {
                                    $nbr = (int)$n->tirage_solo;
                                    if($nombre_aleatoir === $nbr)
                                    {
                                        $nombre_aleatoir = random_int(1, 100);
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
                                echo "<script>";
                                echo "let nombreAlea = '" . $nombre_aleatoir . "';";
                                echo "</script>";
                                ?>
                                    <script>animationChiffre(nombreAlea);</script>
                                <?php 
                                // echo "SOLO N°".$nombre_aleatoir."<br>";
                                // echo $nombre_aleatoir."<br>";
                                // echo "T=".$nbr_chiffre_deja_tirer."<br>";
                                // echo "NT=".$nbr_chiffres_non_tirer;
                                $objetSolo->setInsererTirageSolo($nombre_aleatoir);
                                header("Refresh: 3; URL=".HOST."mainSolo.php?id=$nombre_aleatoir");
                                exit;
                            }
                    }
                }
            ?>
        </button> 

        <input type="hidden" id="traitement_boutton" name="traitement_boutton" value=""/>
        <input type="submit" class="boutton_rouge" name="boutton_rouge" value="Top" onclick="document.getElementById('traitement_boutton').value = 'true';" onclick="startAnimation()"/>                                                   

    </form>

    

</main>
<!----------------fin: CORPS DE LA PAGE -------------------------->
