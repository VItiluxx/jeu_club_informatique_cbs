  <!----------------debut: CORPS DE LA PAGE -------------------------->
<main id="body-form_publierEEC">
    <div class="div-form_contenu">
    
        <form method="post">
            
            <p id="p-form_admin"> PUBLIER UN JEU </p>
           
                <label for="choix_jeux">Choisir le type de jeu: </label>
                
                <select name="choix_jeux" id="choix_jeux">
                    <option value="">Quel est votre choix</option>
                    <option value="solo">SOLO</option>
                    <option value="duel">DUEL</option>
                </select>
          
            
            <div>
                <label for="libelle_exe">LA QUESTION: </label>
                    <textarea class="textarea-form_admin" name="question" placeholder="Ennocé du jeu" required></textarea>
                </div>
                <div>
                    <label for="libelle_exe">REPONSE A: </label>
                    <textarea class="textarea-form_admin" name="reponse_a" placeholder="Ennocé du jeu" required></textarea>
                </div>
                <div>
                    <label for="libelle_exe">REPONSE B: </label>
                    <textarea class="textarea-form_admin" name="reponse_b" placeholder="Ennocé du jeu" required></textarea>
                </div>
                <div>
                    <label for="libelle_exe">REPONSE C </label>
                    <textarea class="textarea-form_admin" name="reponse_c" placeholder="Ennocé du jeu" required></textarea>
                </div>
                <div>
                    <label for="libelle_exe">REPONSE D: </label>
                    <textarea class="textarea-form_admin" name="reponse_d" placeholder="Ennocé du jeu" required></textarea>
                </div>

            <div>
                <label for="libelle_bonne_reponse">Saisir la Bonne reponse du jeu ici: </label>
                <textarea class="textarea-form_admin" name="bonne_reponse" placeholder="Ennocé de la reponse correcte"></textarea>
            </div>
    
            <button type="submit" name="soumettre"> ENVOYER </button>
    
        </form>
    
    </div>

</main>
<!----------------fin: CORPS DE LA PAGE ---------------------------->
