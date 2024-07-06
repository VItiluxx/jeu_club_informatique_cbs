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

// Lorsqu'il est cliqué, la fonction confetti de la bibliothèque canvas-confetti est appelée pour créer l'animation.
const buttons = document.querySelectorAll('.correct');
buttons.forEach(button => {
    button.addEventListener('click', () => {
        confetti({
            particleCount: 100,
            spread: 70,
            origin: { y: 0.6 }
        });
    });
});

import confetti from 'https://cdn.skypack.dev/canvas-confetti';
const btn = document.querySelectorAll('.correct')
function makeConfetti(){
    confetti()
}

btn.addEventListener("click", makeConfetti)