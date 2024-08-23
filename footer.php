<body>
    <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>
    <!--::::Pie de Pagina::::::-->
    <footer class="pie-pagina">
        <div class="grupo-1" style="display:flex; justify-content: center; ">
            <div class="box image">
                <figure>
                    <a href="index.php">
                        <img class="logofooter" src="happypeoplestore/dist/img/footer-logo.png" alt="LOGO Happy People Store">
                    </a>
                </figure>
            </div>
            <div class="box" style="width: 500px;">
                <h2 style="color:#FCE6B4; font-size: 30px;">Contáctanos</h2>
                <p style="width: 310px; font-size:20px">Calle Santo Domingo 205 int 108, Arequipa, Perú</p>
                <div>
                    <a title="Facebook" href="https://www.facebook.com/happyPeopleStore">
                        <img style="width: 50px; margin: 0 50px 0 0" src="happypeoplestore/dist/img/icono-whastapp.png" alt="">
                    </a>
                    <a title="Instagram" href="https://www.instagram.com/happypeoplestore_/">
                        <img style="width: 50px; margin: 0 50px 0 0" src="happypeoplestore/dist/img/icono-facebook.png" alt=""></a>
                    <a title="Instagram" href="https://www.instagram.com/happypeoplestore_/">
                        <img style="width: 50px; margin: 0 50px 0 0" src="happypeoplestore/dist/img/icono-instagram.png" alt=""></a>
                </div>
            </div>

            <div class="box">
                <h2 style="color:#FCE6B4; font-size: 20px;">¿Quieres conoces nuevos productos para personalizar?</h2>
                <form action="">
                    <input style="border-radius: 25px; padding: 5px 5px 5px 15px;; margin:5px; width:250px;" type="email" placeholder="Ingresa tu correo">
                    <input style="border-radius: 5px; padding:10px; background-color:#FCE6B4" type="submit">
                </form>
            </div>
        </div>
    </footer>
    <div class="grupo-2">
            <small>&copy; 2024 <b>Happy People Store</b> - Todos los Derechos Reservados.</small>
        </div>
</body>
<style>
    html,
    body {
        height: 100%;
        margin: 0;
        padding: 0;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .pie-pagina {
        background-image: url("happypeoplestore/dist/img/fondo-footer.jpg");
        color: #fff;
        padding: 20px 0;
        z-index: 90;
    }

    .pie-pagina .grupo-1 {
        max-width: 1200px;
        margin: auto;
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
    }

    .pie-pagina .grupo-1 .box {
        padding: 20px;
    }

    .pie-pagina .grupo-1 .box h2 {
        font-size: 18px;
        margin-bottom: 10px;
    }

    .pie-pagina .grupo-1 .box p {
        font-size: 14px;
        line-height: 1.4;
    }


    .pie-pagina .grupo-1 .red-social a {
        display: inline-block;
        text-decoration: none;
        width: 45px;
        height: 45px;
        line-height: 45px;
        color: #fff;
        margin-right: 10px;
        text-align: center;
        transition: all 300ms ease;
        border-radius: 50%;
        justify-content: center;
    }

    .pie-pagina .grupo-1 .red-social a:hover {
        color: #f8c778;
    }

    .grupo-2 {

        text-align: center;
        padding: 10px 0;
        background-color: #000;
    }

    .grupo-2 small {
        font-size: 12px;
        color: white;
    }

    .mapa {
        position: relative;
    }

    .mapa h2 {
        position: relative;
        text-align: center;
    }

    .mapa iframe {
        position: relative;
        width: 100%;
        height: 150px;
    }

    .logofooter {
        height: 200px;
        display: block;
        margin: 0 auto;
    }

    @media screen and (max-width:800px) {
        .pie-pagina .grupo-1 {
            grid-template-columns: repeat(1, 1fr);
        }

        .pie-pagina .grupo-1 .box {
            padding: 20px;
            border: 1px solid #333;
        }

        .image {
            display: none;
        }
    }
</style>