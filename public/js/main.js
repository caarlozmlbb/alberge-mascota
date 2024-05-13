const carrusel = document.querySelector(".carrusel-items");

if (carrusel) {
  let maxScrollLeft = carrusel.scrollWidth - carrusel.clientWidth;
  let intervalo = null;
  let step = 1; // Usa un valor pequeño para un movimiento suave

  const start = () => {
    intervalo = setInterval(function () {
      carrusel.scrollLeft += step;

      if (carrusel.scrollLeft === maxScrollLeft) {
        step = -step; // Cambiar la dirección del desplazamiento
      } else if (carrusel.scrollLeft === 0) {
        step = -step; // Cambiar la dirección del desplazamiento
      }
    }, 10); // Ajusta este valor para controlar la velocidad del carrusel
  };

  const stop = () => {
    clearInterval(intervalo);
  };

  start(); // Iniciar el carrusel automáticamente
}