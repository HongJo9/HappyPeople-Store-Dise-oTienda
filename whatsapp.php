<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <title>Boton Flotante - WhatsApp</title>
  <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>
</head>
<body>
    <a href="https://api.whatsapp.com/send?phone=984358846&text=%F0%9F%8C%9F%20Estoy%20emocionado%20por%20adquirir%20un%20producto%20de%20su%20tienda%20en%20l%C3%ADnea.%20%C2%BFPodr%C3%ADan%20brindarme%20asesor%C3%ADa%20para%20la%20compra%3F%20%F0%9F%9B%92%F0%9F%8C%9F%0A%0A%C2%A1Espero%20su%20pronta%20respuesta%21%20%F0%9F%93%B1%0A%0A" class="btn-wsp" target="_blank" placeholder="">
        <i class="icon fa fa-whatsapp icono"></i>
    </a>
</body>
<style>
  .btn-wsp{
    position:fixed;
    width:60px;
    height:60px;
    line-height: 63px;
    bottom:24px;
    right:24px;
    background:#00a651;
    color:#FFF;
    border-radius:50px;
    text-align:center;
    font-size:35px;
    box-shadow: 0px 1px 10px rgba(0,0,0,0.3);
    z-index:100;
    transition: all 300ms ease;
}

.btn-wsp:hover{
    background: #fff;
    color: #3EBA00;
}

.btn-wsp .icon {
    font-size: 40px; /* Tamaño más grande al hacer hover */
}

.btn-wsp:hover .icon {
    font-size: 41px; /* Tamaño más grande al hacer hover */
}

@media only screen and (min-width:320px) and (max-width:768px){
    .btn-wsp{
        width:63px;
        height:63px;
        line-height: 66px;
    }

    .btn-wsp .icon {
        font-size: 40px; /* Ajusta el tamaño del ícono para pantallas más pequeñas */
    }
}
</style>
</html>
