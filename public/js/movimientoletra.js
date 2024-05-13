$(document).ready(function() {
    var textos = [
      "Encuentra un amigo fiel y cambia vidas: ¡adopta!",
      "Descubre la compañía leal y cambia vidas: ¡adopta tu mascota ideal!",
      "Descubrien quien es tu mejor Amigo :)"
    ];
    var index = 0;
    var currentText = '';
    var isDeleting = false;

    function typeEffect() {
      var texto = textos[index];

      if (isDeleting) {
        currentText = currentText.substring(0, currentText.length - 1);
      } else {
        currentText = texto.substring(0, currentText.length + 1);
      }

      $('#header-text').text(currentText);

      var typeSpeed = 50;
      if (isDeleting) {
        typeSpeed /= 2;
      }

      if (!isDeleting && currentText === texto) {
        isDeleting = true;
        setTimeout(typeEffect, 2000);
      } else if (isDeleting && currentText === '') {
        isDeleting = false;
        index = (index + 1) % textos.length;
        setTimeout(typeEffect, 500);
      } else {
        setTimeout(typeEffect, typeSpeed);
      }
    }

    typeEffect();
  });