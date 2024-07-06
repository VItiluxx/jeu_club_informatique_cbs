<script src="<?=ASSET_HOST?>js.js"></script>
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
        }
    }
?>

<div class="question">
    <p class="p-question"><?=@$Q;?></p>
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
        <button id="button-jouerANouveau">JOUER A NOUVEAU</button>
    </a>
    <div id="emojiContainer" class="emoji-container">😢😭😝</div>
</div>

<style>
.emoji-container {
    display: none; /* Caché par défaut */
    font-size: 70px;
    position: absolute;
    top: 40%;
    left: 50%;
    transform: translate(-50%, -50%);
    animation: bounce 1s ease-in-out;
}

@keyframes bounce {
    0% { transform: translate(-50%, -50%) scale(0); }
    50% { transform: translate(-50%, -50%) scale(1.2); }
    100% { transform: translate(-50%, -50%) scale(1); }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const choices = document.querySelectorAll('.choice');
    const goodAnswerNonFormater = "<?=$BR;?>"; // Supposons que 'C. Paris' est la bonne réponse
    const goodAnswer = goodAnswerNonFormater.trim();
    const emojiContainer = document.getElementById('emojiContainer');

    choices.forEach(choice => {
        choice.addEventListener('click', function() {
            const selectedAnswer = this.textContent.trim(); // Récupérer le texte du choix sélectionné sans les espaces

            // Réinitialiser les couleurs de tous les choix
            choices.forEach(c => c.classList.remove('selected', 'correct', 'wrong'));

            // Marquer le choix sélectionné
            this.classList.add('selected');

            // Comparer le choix sélectionné avec la bonne réponse
            if (selectedAnswer === goodAnswer) {
                this.classList.add('correct');
                // Lancer les confettis si la réponse est correcte
                confetti({
                    particleCount: 400,
                    spread: 200,
                    origin: { y: 0.5 },
                    shapes: ['circle', 'square', 'rect'],
                    // colors: ['#bb0000', '#ffffff'],
                    scalar: 1.9,
                    ticks: 300, // Duration of the confetti
                    gravity: 0.5 // Simulate spiral by adjusting gravity
                });
            } else {
                this.classList.add('wrong');
                
                // Trouver et marquer la bonne réponse
                choices.forEach(c => {
                    if (c.textContent.trim() === goodAnswer) {
                        c.classList.add('correct');
                    }
                });

                // Afficher et animer l'emoji de pleurs
                emojiContainer.style.display = 'block';
                setTimeout(() => {
                    emojiContainer.style.display = 'none';
                }, 10000); // Cache l'emoji après 1 seconde
            }
        });
    });
});
</script>

<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.4.0/dist/confetti.browser.min.js"></script>
