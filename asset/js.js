function animationChiffre(nombreAlea) {
    const output = document.getElementById('output');
    console.log("Starting animation with number: " + nombreAlea);
    
    let from = 150;
    let to = nombreAlea;
    let step = to > from ? 1 : -1;
    let interval = 50; // Ajustez l'intervalle selon vos besoins

    if (from == to) {
        output.textContent = from;
        return;
    }

    let counter = setInterval(function() {
        from += step;
        output.textContent = from;

        if (from == to) {
            
            clearInterval(counter);
            console.log("Animation completed with number: " + from);
        }
    }, interval);
}



// Lorsqu'il est cliqué, la fonction confetti de la bibliothèque canvas-confetti est appelée pour créer l'animation.
// const buttons = document.querySelectorAll('.correct');
// buttons.forEach(button => {
//     button.addEventListener('click', () => {
//         confetti({
//             particleCount: 100,
//             spread: 70,
//             origin: { y: 0.6 }
//         });
//     });
// });

// import confetti from 'https://cdn.skypack.dev/canvas-confetti';
// const btn = document.querySelectorAll('.correct')
// function makeConfetti(){
//     confetti()
// }

// btn.addEventListener("click", makeConfetti)