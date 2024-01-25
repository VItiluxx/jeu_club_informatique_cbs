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
                <label for="libelle_exe">Libelle du jeu ici: </label>
                <textarea class="textarea-form_admin" name="libelle_exe" placeholder="Ennocé du jeu"></textarea>
            </div>
            <div>
                <label for="libelle_bonne_reponse">Saisir la Bonne reponse du jeu ici: </label>
                <textarea class="textarea-form_admin" name="libelle_bonne_reponse" placeholder="Ennocé de la reponse correcte"></textarea>
            </div>
    
            <button type="submit" name="soumettre"> SOUMETTRE </button>
    
        </form>
    
    </div>

</main>
<!----------------fin: CORPS DE LA PAGE ---------------------------->
