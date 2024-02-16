<?php

    include(MODEL_ROOT."solo.class.php");
    $objetSolo = new solo($connexionBd);

    $id = $_GET['id'];
    if(empty($id) OR $id > 100 OR !(INT)$id){
        echo "DESOLER PAS DE JEUX DISPONIBLE";
    }
    else{
        $jeuDemander = $objetSolo->AfficheJeu_Solo($id);
  
        foreach($jeuDemander as $jeu)
        {
            if(isset($jeuDemander) AND !empty($jeuDemander)){
                $Q = $jeu->question_solo;
                $RA = $jeu->reponse_a_solo;
                $RB = $jeu->reponse_b_solo;
                $RC = $jeu->reponse_c_solo;
                $RD = $jeu->reponse_d_solo;
                $BR = $jeu->bonne_reponse_solo;
            }
            if(!isset($jeuDemander) OR empty($jeuDemander)){
                $Q = "DESOLER PAS DE JEUX DISPONIBLE POUR CE CHIFFRE";
                $RA = "";
                $RB = "";
                $RC = "";
                $RD = "";
                $BR = "";
            }
    
    
            // header("Refresh: 0; URL=destination.php");
        }
    }

?>

<div class="question">
        <p><?=@$Q;?></p>
        <div class="choices">
            <div class="top-choices">
                <button class="choice" data-answer=""><?=@$RA;?></button>
                <button class="choice" data-answer=""><?=@$RB;?></button>
            </div>
            <div class="bottom-choices">
                <button class="choice" data-answer=""><?=@$RC;?></button>
                <button class="choice" data-answer=""><?=@$RD;?></button>
            </div>
        </div>
        <a href="solo.php">
                <button id="button-jouerANouveau"> JOUER A NOUVEAU </button>
        </a>


</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const choices = document.querySelectorAll('.choice');
    const goodAnswer = "<?=$BR;?>"; // Supposons que 'C. Paris' est la bonne réponse
    
    choices.forEach(choice => {
        choice.addEventListener('click', function() {
            const selectedAnswer = this.textContent.trim(); // Récupérer le texte du choix sélectionné sans les espaces
            
            // Marquer le choix sélectionné
            this.classList.add('selected');

            // // Réinitialiser les couleurs de tous les choix
            // choices.forEach(c => c.classList.remove('selected', 'correct', 'wrong'));
            
            // Comparer le choix sélectionné avec la bonne réponse
            if (selectedAnswer === goodAnswer) {
                this.classList.add('correct');
            } else {
                this.classList.add('wrong');
                
                // Trouver et marquer la bonne réponse
                choices.forEach(c => {
                    if (c.textContent.trim() === goodAnswer) {
                        c.classList.add('correct');
                    }
                });
            }
        });
    });
});

/*
Avec ce code JavaScript ci haut, la variable goodAnswer stocke la bonne réponse du QCM.
Lorsqu'un choix est sélectionné, le texte de ce choix est comparé avec la bonne réponse.
 Si le choix correspond à la bonne réponse, son background devient vert. Sinon, 
 le background du choix sélectionné est mis en rouge et la bonne réponse est également affichée en vert.*/
</script>

