<div class="relleno-seccion3">
  <div class="izquierda">
    <img src="happypeoplestore/dist/img/regalos-izquierda.png" alt="">
  </div>
  <div class="derecha">
    <img src="happypeoplestore/dist/img/regalos--derecha.png" alt="">
  </div>
</div>

<style>
  .relleno-seccion3 {
    position: absolute;
    background-color: transparent;
    width: 100%;
    z-index: 3;
    display: flex;
    margin-top: -140px;
    height: 350px; /* Ajusta la altura según tu diseño */
    overflow: hidden;
  }

  .izquierda img, .derecha img {
    width: 100%;
    position: relative;
    transition: transform 0.8s linear; /* Transición suave para el efecto parallax */
  }
</style>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    var rellenoSeccion = document.querySelector('.relleno-seccion3');
    var izquierdaImg = document.querySelector('.izquierda img');
    var derechaImg = document.querySelector('.derecha img');

    function parallaxEffect() {
      var scrollPosition = window.scrollY;
      var rellenoTop = rellenoSeccion.offsetTop;
      var rellenoHeight = rellenoSeccion.clientHeight;
      var windowHeight = window.innerHeight;

      if (scrollPosition + windowHeight > rellenoTop && scrollPosition < rellenoTop + rellenoHeight) {
        var offset = ((scrollPosition + windowHeight - rellenoTop) / (windowHeight + rellenoHeight)) * 100;

        // Limitar el desplazamiento para que se detenga en el centro
        if (offset > 50) offset = 50; // Detenerse cuando están juntos en el centro

        izquierdaImg.style.transform = 'translateX(' + (-50 + offset) + '%)';
        derechaImg.style.transform = 'translateX(' + (50 - offset) + '%)';
      }
    }

    window.addEventListener('scroll', parallaxEffect);
  });
</script>
