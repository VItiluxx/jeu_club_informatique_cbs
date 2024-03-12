function animationChiffre(nombreAleatoire){
    let from = 150;
    let to = nombreAleatoire ;
    let step = to > from ? 1 : -1;
    let interval = 10;

    if(from == to){
        document.querySelector("#output").
        textContent = from;
        return;
    }

    let counter = setInterval(function(){
        from += step;
        document.querySelector("#output").
        textContent = from;

        if(from == to){
            clearInterval(counter);
        }
    }, interval);  

}
