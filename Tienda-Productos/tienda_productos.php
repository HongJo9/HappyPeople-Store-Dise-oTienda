<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CarpiShop</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        :root {
            --clr-main: #FCE6B4;
            --clr-white: #fff;
            --clr-black: #000000;
            --clr-primary: #007bff;
            --clr-secondary: #6c757d;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'jost', sans-serif;
        }

        .wrapper {
            display: flex;
            justify-content: center;
            background-color: var(--clr-main);
            padding: 80px;
        }

        aside {
            padding: 2rem;
            padding-right: 0;
            color: var(--clr-black);
            position: sticky;
            top: 110px;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            margin-top: 50px;
        }

        .menu {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            list-style-type: none;
        }

        .boton-menu {
            background-color: transparent;
            border: 0;
            color: var(--clr-black);
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 1rem;
            font-weight: 500;
            padding: 1.5rem;
            font-size: 20px;
            width: 100%;
            transition: background-color 0.3s, color 0.3s;
        }

        .boton-menu.active {
            background-color: var(--clr-white);
            color: var(--clr-black);
            border-top-left-radius: 1rem;
            border-bottom-left-radius: 1rem;
        }

        main {
            background-color: var(--clr-white);
            margin: 20px 10px 20px 0;
            border-radius: 2rem;
            padding: 2rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            flex-grow: 1;
            overflow: hidden; /* Para evitar que la paginación sobresalga */
        }

        .titulo-principal {
            text-align: center;
            color: var(--clr-black);
            margin-bottom: 2rem;
            font-size: 2rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .titulo-principal img {
            margin-left: 1rem;
        }

        .producto-contenido {
            display: none;
        }

        .producto-contenido.visible {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 3fr));
            gap: 3rem;
            margin-top: 1rem; /* Agregamos un margen superior */
        }

        .producto-item {
            border: 2px solid #ccc;
            border-radius: 1rem;
            text-align: center;
            padding: 1rem;
            background-color: #fff;
            transition: box-shadow 0.3s;
        }

        .producto-item:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.7);
        }

        .producto-item img {
            width: 50%;
            border-radius: 1rem;
        }

        .card-body {
            padding: 0 0 20px 0;
            text-align: center;
        }

        .card-text {
            font-size: 20px;
            margin-bottom: 1.5rem;
        }

        .card-text-title {
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 0.5rem;
        }

        .boton-tienda{
            text-align: center;
            background-color: #FF0000;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            color: white;
            border-radius: 5px;
            margin: 10px 0 0 0;
        }

        .boton-tienda:hover {
            background-color: #c00425;
            color: white;
            text-decoration: none;
        }

        .pagination {
            display: flex;
            justify-content: center;
            list-style: none;
            padding: 0;
            margin-top: 2rem;
            margin-bottom: 2rem; /* Agregamos un margen inferior */
        }

        .pagination li {
            margin: 0 5px;
        }

        .pagination button {
            background-color: transparent;
            border: 1px solid #ccc;
            padding: 5px 10px;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
        }

        .pagination button.active {
            background-color: var(--clr-main);
            color: var(--clr-black);
            border-color: var(--clr-main);
        }

        .pagination button:hover {
            background-color: var(--clr-primary);
            color: var(--clr-white);
            border-color: var(--clr-primary);
        }
        
    </style>
</head>

<body>
    <div class="wrapper">
        <aside>
            <nav>
                <ul class="menu">
                    <li>
                        <button id="todos-btn" class="boton-menu boton-categoria active" style="color:#c00425">
                            <img style="width: 23px;"
                                src="happypeoplestore/dist/img/Happy-people-logo-oficial-COLOR1.png" alt="">
                            Todos los productos
                        </button>
                    </li>
                    <li>
                        <button id="simples-btn" class="boton-menu boton-categoria">
                            <img style="width: 23px;"
                                src="happypeoplestore/dist/img/Happy-people-logo-oficial-COLOR1.png" alt="">
                            Simples
                        </button>
                    </li>
                    <li>
                        <button id="kits-btn" class="boton-menu boton-categoria">
                            <img style="width: 23px;"
                                src="happypeoplestore/dist/img/Happy-people-logo-oficial-COLOR1.png" alt="">
                            Kits
                        </button>
                    </li>
                </ul>
            </nav>
        </aside>
        <main>
            <div class="contenedor-productos">
                <h2 class="titulo-principal" id="titulo-principal" style="color:#c00425">
                    Todos los productos
                    <img style="width: 40px;" src="happypeoplestore/dist/img/Happy-people-logo-oficial-COLOR1.png"
                        alt="">
                </h2>
                <div id="todos" class="producto-contenido visible">
                    <?php
                    // Aquí va la lógica PHP para obtener los productos
                    $query = "SELECT * FROM productos ORDER BY id DESC";
                    $resultado = mysqli_query($con, $query);

                    $productos = [];
                    while ($fila = mysqli_fetch_assoc($resultado)) {
                        $productos[] = $fila;
                    }
                    $totalPaginas = ceil(count($productos) / 6);
                    ?>

                    <?php for ($i = 0; $i < count($productos); $i++) { ?>
                        <div class="producto-item" style="display: none;" data-page="<?php echo ceil(($i + 1) / 6); ?>">
                            <div class="carta-ancha">
                                <img src="happypeoplestore/<?php echo $productos[$i]['imgProducto']; ?>" alt=""
                                    style="width:250px; border-radius:50%; padding:10px;">
                            </div>
                            <div class="card-body">
                                <h4 class="card-text-title"><?php echo $productos[$i]['nombre']; ?></h4>
                                <p class="card-text">Precio: S/. <?php echo $productos[$i]['precio']; ?></p>
                                <a href="index.php?modulo=detalleProductoPerso&id=<?php echo $productos[$i]['id']; ?>"
                                    class="boton-tienda">Ver más</a>
                            </div>
                        </div>
                    <?php } ?>
                    <div></div>
                    <ul class="pagination" id="pagination-todos">
                        <?php for ($i = 1; $i <= $totalPaginas; $i++) { ?>
                            <li><button class="page-btn <?php echo $i == 1 ? 'active' : ''; ?>"
                                    data-page="<?php echo $i; ?>"><?php echo $i; ?></button></li>
                        <?php } ?>
                    </ul>
                </div>

                <div id="simples" class="producto-contenido">
                    <?php
                    $query = "SELECT * FROM productos WHERE categoria = 'Simples' ORDER BY id DESC";
                    $resultado = mysqli_query($con, $query);

                    $productos = [];
                    while ($fila = mysqli_fetch_assoc($resultado)) {
                        $productos[] = $fila;
                    }
                    $totalPaginas = ceil(count($productos) / 6);
                    ?>

                    <?php for ($i = 0; $i < count($productos); $i++) { ?>
                        <div class="producto-item" style="display: none;" data-page="<?php echo ceil(($i + 1) / 6); ?>">
                            <div>
                                <img src="happypeoplestore/<?php echo $productos[$i]['imgProducto']; ?>" alt=""
                                    style="width:250px; border-radius:50%; padding:10px;">
                            </div>
                            <div class="card-body">
                                <h4 class="card-text-title"><?php echo $productos[$i]['nombre']; ?></h4>
                                <p class="card-text">Precio: S/. <?php echo $productos[$i]['precio']; ?></p>
                                <a href="index.php?modulo=detalleProductoPerso&id=<?php echo $productos[$i]['id']; ?>"
                                    class="boton-tienda">Ver más</a>
                            </div>
                        </div>
                    <?php } ?>
                    <div></div>
                    <div></div>
                    <ul class="pagination" id="pagination-simples">
                        <?php for ($i = 1; $i <= $totalPaginas; $i++) { ?>
                            <li><button class="page-btn <?php echo $i == 1 ? 'active' : ''; ?>"
                                    data-page="<?php echo $i; ?>"><?php echo $i; ?></button></li>
                        <?php } ?>
                    </ul>
                </div>

                <div id="kits" class="producto-contenido">
                    <?php
                    $query = "SELECT * FROM productos WHERE categoria = 'Kits' ORDER BY id DESC";
                    $resultado = mysqli_query($con, $query);

                    $productos = [];
                    while ($fila = mysqli_fetch_assoc($resultado)) {
                        $productos[] = $fila;
                    }
                    $totalPaginas = ceil(count($productos) / 6);
                    ?>

                    <?php for ($i = 0; $i < count($productos); $i++) { ?>
                        <div class="producto-item" style="display: none;" data-page="<?php echo ceil(($i + 1) / 6); ?>">
                            <div>
                                <img src="happypeoplestore/<?php echo $productos[$i]['imgProducto']; ?>" alt=""
                                    style="width:250px; border-radius:50%; padding:10px;">
                            </div>
                            <div class="card-body">
                                <h4 class="card-text-title"><?php echo $productos[$i]['nombre']; ?></h4>
                                <p class="card-text">Precio: S/. <?php echo $productos[$i]['precio']; ?></p>
                                <a href="index.php?modulo=detalleProductoPerso&id=<?php echo $productos[$i]['id']; ?>"
                                    class="boton-tienda">Ver más</a>
                            </div>
                        </div>
                    <?php } ?>
                        <div></div>
                        <div></div>
                    <ul class="pagination" id="pagination-kits">
                        <?php for ($i = 1; $i <= $totalPaginas; $i++) { ?>
                            <li><button class="page-btn <?php echo $i == 1 ? 'active' : ''; ?>"
                                    data-page="<?php echo $i; ?>"><?php echo $i; ?></button></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </main>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const buttons = document.querySelectorAll('.boton-menu');
            const tituloPrincipal = document.getElementById('titulo-principal');
            const contenedorProductos = document.querySelectorAll('.producto-contenido');
            const productos = {
                "todos-btn": "Todos los productos",
                "simples-btn": "Simples",
                "kits-btn": "Kits"
            };

            buttons.forEach(button => {
                button.addEventListener('click', () => {
                    buttons.forEach(btn => btn.classList.remove('active'));
                    button.classList.add('active');

                    const category = button.id;
                    tituloPrincipal.innerHTML = `${productos[category]} <img style="width: 40px;" src="happypeoplestore/dist/img/Happy-people-logo-oficial-COLOR1.png" alt="">`;

                    contenedorProductos.forEach(producto => {
                        producto.classList.remove('visible');
                    });

                    const selectedProduct = document.getElementById(category.replace('-btn', ''));
                    selectedProduct.classList.add('visible');
                    updatePagination(category.replace('-btn', ''));
                });
            });

            function updatePagination(category) {
                const paginationButtons = document.querySelectorAll(`#pagination-${category} .page-btn`);
                paginationButtons.forEach(button => {
                    button.addEventListener('click', () => {
                        const page = button.getAttribute('data-page');
                        const productItems = document.querySelectorAll(`#${category} .producto-item`);
                        productItems.forEach(item => {
                            item.style.display = item.getAttribute('data-page') == page ? 'block' : 'none';
                        });
                        paginationButtons.forEach(btn => btn.classList.remove('active'));
                        button.classList.add('active');
                    });
                });

                const firstButton = document.querySelector(`#pagination-${category} .page-btn`);
                if (firstButton) firstButton.click();
            }

            updatePagination('todos');
        });
    </script>
</body>

</html>