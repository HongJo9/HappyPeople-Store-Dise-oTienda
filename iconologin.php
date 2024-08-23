<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <title>Botón Flotante con Opciones</title>
  <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>
  <style>
    /* Estilos para el botón flotante */
    .btn-container {
      position: fixed;
      bottom: 25px;
      left: 25px;
      z-index: 100;
      opacity: 0;
      transition: opacity 0.5s ease;
    }

    .btn-float {
      width: 60px;
      height: 60px;
      background: #c00425;
      color: #FFF;
      border: none;
      border-radius: 50%;
      font-size: 25px;
      display: flex;
      align-items: center;
      justify-content: center;
      box-shadow: 0px 1px 10px rgba(0, 0, 0, 0.3);
      cursor: pointer;
      transition: all 300ms ease;
    }

    .btn-float:hover {
      background: #FF0000;
      color: #3EBA00;
    }

    /* Estilos para las opciones */
    .options {
      display: none;
      position: absolute;
      bottom: 70px;
      left: 0;
      background: #fff;
      border-radius: 8px;
      box-shadow: 0px 1px 10px rgba(0, 0, 0, 0.3);
      overflow: hidden;
      transition: all 300ms ease;
      width: 150px;
    }

    .option {
      display: block;
      padding: 10px 20px;
      text-decoration: none;
      color: #333;
      border-bottom: 1px solid #eee;
      transition: background 300ms ease;
    }

    .option:hover {
      background: #f0f0f0;
    }

    .option:last-child {
      border-bottom: none;
    }

    .show {
      opacity: 1;
    }
  </style>
</head>

<body>
  <div class="btn-container" id="btn-container">
    <button class="btn-float" id="btn-float">
      <img style="width: 25px;" src="happypeoplestore/dist/img/Happy-people-logo-oficial-blanco-3.png" alt="">
    </button>
    <div class="options" id="options">
      <?php
      if (!isset($_SESSION['idCliente'])) {
        ?>
        <!-- Opciones cuando el usuario no ha iniciado sesión -->
        <a href="happypeoplestore/panel.php" class="option"><i class="fa fa-id-card-o" aria-hidden="true"></i>
          Administración</a>
        <div class="dropdown-divider"></div>
        <a href="login.php" class="option"> <i class="fas fa-door-open mr-2"></i> Iniciar sesión</a>
        <div class="dropdown-divider"></div>
        <a href="registro.php" class="option"><i class="nav icon fas fa-sign-in-alt mr-2"></i> Registrarse</a>
        <?php
      } else {
        ?>

        <a href="happypeoplestore/panel.php" class="option"><i class="fa fa-id-card-o" aria-hidden="true"></i>
          Administración</a>
        <div class="dropdown-divider"></div>
        <a href="index.php?modulo=perfil" class="option"> <i class="fas fa-user text-primary mr-2"></i>Mi Espacio</a>
        <div class="dropdown-divider"></div>
        <form style="background-color: #FF0000" action="index.php" method="post">
          <button
            style="color:white; background-color: #FF0000; border: solid #FF0000; width: 150px; text-align: start; padding: 10px 15px"
            name="accion" type="submit" value="cerrar"> <i class="fas fa-door-closed mr-2"></i>Cerrar Sesión</button>
        </form>
        <?php
      }
      ?>
    </div>
  </div>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const btnContainer = document.getElementById('btn-container');
      const options = document.getElementById('options');
      const btnFloat = document.getElementById('btn-float');

      window.addEventListener('scroll', function () {
        if (window.scrollY > 100) {
          btnContainer.classList.add('show');
        } else {
          btnContainer.classList.remove('show');
          options.style.display = 'none';
        }
      });

      btnFloat.addEventListener('click', function () {
        if (options.style.display === 'none' || options.style.display === '') {
          options.style.display = 'block';
        } else {
          options.style.display = 'none';
        }
      });

      document.addEventListener('click', function (event) {
        if (!btnFloat.contains(event.target) && !options.contains(event.target)) {
          options.style.display = 'none';
        }
      });
    });
  </script>
</body>

</html>