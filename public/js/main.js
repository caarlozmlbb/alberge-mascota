
document.addEventListener("DOMContentLoaded", function() {
    const carruselItems = document.querySelector('.carrusel-items');
    const cards = Array.from(carruselItems.children);
    const totalCards = cards.length;

    // Clona las tarjetas para crear un efecto continuo
    cards.forEach(card => {
        const clone = card.cloneNode(true);
        carruselItems.appendChild(clone);
    });

    // Ajusta la animación para que se repita correctamente
    const clonedCards = document.querySelectorAll('.carrusel-item');
    const totalWidth = totalCards * 250; // 250px es el ancho de cada tarjeta
    const animationDuration = totalCards * 5; // Ajusta la duración de la animación según el número de tarjetas

    carruselItems.style.width = `${totalWidth * 2}px`; // Ajusta el ancho del contenedor
    carruselItems.style.animation = `scroll ${animationDuration}s linear infinite`;
});

