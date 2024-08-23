<style>
    .dark-blurred-background {
        position: relative;
        height: 20vh;
        background-image: url('happypeoplestore/dist/img/fondo-tendencia.jpg');
        background-size: cover;
        background-position: center;
        overflow: hidden;
    }

    .dark-blurred-background::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        background-color: rgba(0, 0, 0, 0.5);
        /* Dark overlay */
        filter: blur(10px);
        /* Blur effect */
        z-index: 1;
    }

    .dark-blurred-background h2 {
        position: relative;
        z-index: 2;
        color: white;
        text-align: center;
        margin: 0;
        line-height: 20vh;
    }

    .dark-titulo-background {
        position: relative;
        height: 20vh;
        background-image: url('happypeoplestore/dist/img/fondo baner.jpg');
        background-size: cover;
        background-position: center;
        overflow: hidden;
    }

    .dark-titulo-background::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        background-color: rgba(0, 0, 0, 0.7);
        /* Dark overlay */
        filter: blur(10px);
        /* Blur effect */
        z-index: 1;
    }

    .dark-titulo-background h1 {
        position: relative;
        z-index: 2;
        color: white;
        text-align: center;
        margin: 0;
        line-height: 20vh;
        font-size: 50px;
    }
</style>
<div class="dark-blurred-background">
    </div>
<div class="dark-titulo-background">
    <h1>Carrito de compras</h1>
</div>
<div class="carro row">
    <table class="table table-striped table-inverse" id="tablaCarrito">
        <thead class="thead-inverse">
            <tr>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Total por Producto</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

    <div class="col-md-6" style="margin: 20px 0 0 0"> <!-- La mitad del ancho en pantallas medianas y más grandes -->
        <a style="text-decoration: none; background-color: #f20519; color:white; border-radius: 25px; padding:15px; font-size: 16px; font-weight: 600;"
            class="mr-2" href="index.php?modulo=productos" role="button">Ir a productos</a>
    </div>

    <div class="col-md-6 text-right" style="margin: 20px 0 20px 0"> <!-- La otra mitad del ancho en pantallas medianas y más grandes, y alinea a la derecha -->
        <a style=" text-decoration: none; background-color: #fce6b4; color:black; border-radius: 25px; padding:15px;
        font-size: 16px; font-weight: 600;" class="mr-2" href="index.php?modulo=pago" id="irapagar" role="button">Ir a
        pagar</a>
    </div>

    <div class="vacio"></div>
</div>

<style>
    .carro {
        padding: 0 150px;
        background-image: radial-gradient(circle at 49.04% 55.42%, #ffffff 0, #fffbfc 25%, #f5f5f5 50%, #eaefee 75%, #e0e9e6 100%);
    }

    .vacio {
        padding: 0 0 50px 0;
    }
</style>