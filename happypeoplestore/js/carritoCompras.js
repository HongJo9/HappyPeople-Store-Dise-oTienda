// Espera a que el documento HTML esté completamente cargado y listo.
$(document).ready(function(){
    //ajax para el carrito emergente
    $.ajax({
        type: "post",
        url: "ajax/leerCarrito.php",
        dataType: "json",
        success: function (response) {
            llenarCarrito(response)
            // Almacenar TOTAL en una cookie
            setCookie("TOTAL", response.TOTAL, 1);
            
        },
    });

    //ajax para el carrito en general 
    $.ajax({
        type: "post",
        url: "ajax/leerCarrito.php",
        dataType: "json",
        success: function (response) {
            llenarTablaCarrito(response)
        }
    });

    function llenarTablaCarrito(response){
        //sirve para borrar la tabla y ser reemplazada por una actualizada cada que aumente la cantidad
        $("#tablaCarrito tbody").text("");
        var TOTAL=0;
        response.forEach(element => {
            var totalProducto = (element['cantidad'] * parseFloat(element['precio'])).toFixed(2);
            TOTAL = TOTAL + parseFloat(totalProducto);
            document.cookie = "TOTAL=" + TOTAL.toFixed(2);
            
            $("#tablaCarrito tbody").append(
              `
                <tr>
                    <td> <img src="../tiendavirtual/happypeoplestore/${element['imgProducto']}" class="img-size-50"></td>
                    <td>${element['nombre']} </td>
                    <td>
                        ${element['cantidad']}
                        <button type="button" class="btn-xs btn-success mas" 
                        data-id="${element['id']}"
                        data-tipo="mas"
                        >+</button>

                        <button type="button" class="btn-xs btn-danger menos" 
                        data-id="${element['id']}"
                        data-tipo="menos"
                        >-</button>
                    </td>
                    <td>S/. ${element['precio']} </td>
                    <td>S/. ${totalProducto} </td>
                    <td style="cursor: pointer;">
                        <i class="fa fa-trash text-danger borrarProducto" data-id="${element['id']}"></i>
                    </td>
                </tr>
              `
            );
        });
        $("#tablaCarrito tbody").append(
            `
              <tr>
                  <td colspan="4" class="text-right"><strong>Total:</strong></td>
                  <td>S/. ${TOTAL.toFixed(2)} </td>
                  <td></td>
              </tr>
            `
          );
    }





    //creacion de variables de productos insertados
    //clonacion funcion para el pago
    $.ajax({
        type: "post",
        url: "ajax/leerCarrito.php",
        dataType: "json",
        success: function (response) {
            llenarVariables(response)
        }
    });

    function llenarVariables(response) {
        // Array para almacenar la información de cada producto
        var productosArray = [];
    
        // Sirve para poder ver la tabla de pedidos desde la boleta
        $("#tablaVariable tbody").text("");
        var TOTAL = 0;
    
        response.forEach((element, index) => {
            var totalProducto = (element['cantidad'] * parseFloat(element['precio'])).toFixed(2);
            TOTAL = TOTAL + parseFloat(totalProducto);
            document.cookie = "TOTAL=" + TOTAL.toFixed(2);
    
            // Nombre del array para el producto actual
            var nombreArray = "producto" + (index + 1);
    
            // Almacena la información del producto en el array
            var producto = {
                id: element['id'],
                nombre : element['nombre'],
                precio: element['precio'],
                cantidad: element['cantidad'],
                total: totalProducto
            };
    
            // Agrega el producto al array
            productosArray.push({ [nombreArray]: producto });
    
            $("#tablaVariable tbody").append(
                `
                <tr>
                    <td>${producto.nombre}</td>
                    <td>S/. ${producto.precio}</td>
                    <td>${producto.cantidad}</td>
                    <td>S/. ${producto.total}</td>
                </tr>
                `
            );
        });

        // Convertir el array a JSON
        var productosArrayJSON = JSON.stringify(productosArray);

        // Crear una cookie con el JSON
        document.cookie = "productosArray=" + encodeURIComponent(productosArrayJSON);
    
        window.productosArrayGlobal = productosArray;
    }
    
    







    // llenara los productos a la ventana emergente
    function llenarCarrito(response){
        var cantidad = Object.keys(response).length;
        // devuelve el numero de veces que se pide de productos, poniendo un numero en rojo en el icono
        $("#badgeProducto").text(cantidad);
        $("#listaCarrito").text("");
        response.forEach(element => {
            $("#listaCarrito").append(
                `
                <a href="index.php?modulo=detalleProducto&id=${element['id']}" class="dropdown-item">
                <!-- Inicio del mensaje -->
                <div class="media">
                    <img src="../tiendavirtual/happypeoplestore/${element['imgProducto']}" class="img-size-50 img-circle mr-3">
                    <div class="media-body">
                        <h3 class="dropdown-item-title">
                            ${element['nombre']}
                        </h3>
                        <p class="text-sm">Cantidad: ${element['cantidad']}</p>
                    </div>
                </div>
                <!-- Fin del mensaje -->
                </a>
    
                <!-- linea dividora -->
                <div class="dropdown-divider"></div>
                `
            );
        });
        $("#listaCarrito").append(
            `
            <div class="dropdown-divider"></div>
            <a href="index.php?modulo=carrito" class="dropdown-item dropdown-footer bg-success text-light">
                Ver Carrito
                <i class="fa fa-cart-plus"></i>
            </a>
            <!-- linea dividora -->
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer bg-danger text-white" id="borrarCarrito">
                Borrar carrito
                <i class="fa fa-trash"></i>
            </a>
            `
        );
    };

    //botones de mas y menos
    $(document).on("click",".mas,.menos",function(e){
        e.preventDefault();
        var id=$(this).data('id');
        var tipo=$(this).data('tipo');
        $.ajax({
            type:"post",
            url:"ajax/cambiaPedidos.php",
            data: {"id":id,"tipo":tipo},
            dataType:"json",
            success: function(response){
                llenarTablaCarrito(response);
                llenarCarrito(response);
            }
        })
    });

    // boton para eliminar una fila
    $(document).on("click",".borrarProducto",function(e){
        e.preventDefault();
        var id=$(this).data('id');
        $.ajax({
            type:"post",
            url:"ajax/borrarProducto.php",
            data: {"id":id},
            dataType:"json",
            success: function(response){
                llenarTablaCarrito(response);
                llenarCarrito(response);
            }
        })
    });

    //agrega los productos al carrito
    // Cuando se hace clic en el elemento con el ID "agregarCarrito", se ejecuta la siguiente función.
    $("#agregarCarrito").click(function(e){
        // Previene el comportamiento predeterminado de un enlace o botón, que en este caso es evitar que se recargue la página.
        e.preventDefault();
        var id=$(this).data('id');
        var nombre=$(this).data('nombre');
        var imgProducto = $(this).data('img');
        var cantidad=$("#cantidadProducto").val();
        var precio=$(this).data('precio');
        // Realiza una solicitud AJAX al servidor.
        $.ajax({
            type: "post",
            url: "ajax/agregarCarrito.php",
            data: {
                "id": id,
                "nombre": nombre,
                "imgProducto": imgProducto,
                "cantidad": cantidad,
                "precio":precio
            },
            dataType: "json",
            success: function (response) {
                llenarCarrito(response)
                // hace que parpadee cuando se inserte algun producto a comprar
                $("#badgeProducto").hide(500).show(500).hide(500).show(500).hide(500).show(500);
                //hace que la ventana anuncie que esta insertando un producto
                $("#iconoCarrito").click();
            },
        });   
    });

    $("#agregarCarrito").click(function(e){
        // Previene el comportamiento predeterminado de un enlace o botón, que en este caso es evitar que se recargue la página.
        e.preventDefault();
        var id=$(this).data('id');
        var nombre=$(this).data('nombre');
        var imgProducto = $(this).data('img');
        var cantidad=$("#cantidadProducto").val();
        var precio=$(this).data('precio');
        // Realiza una solicitud AJAX al servidor.
        $.ajax({
            type: "post",
            url: "ajax/tablaCarrito.php",
            data: {
                "id": id,
                "nombre": nombre,
                "imgProducto": imgProducto,
                "cantidad": cantidad,
                "precio":precio
            },
            dataType: "json",
            success: function (response) {
                llenarCarrito(response)
                // hace que parpadee cuando se inserte algun producto a comprar
                $("#badgeProducto").hide(500).show(500).hide(500).show(500).hide(500).show(500);
                //hace que la ventana anuncie que esta insertando un producto
                $("#iconoCarrito").click();
            },
        });   
    });



    // para cuando quiero borrar los productos del carrito
    $(document).on("click","#borrarCarrito",function(e){
        e.preventDefault();
        $.ajax({
            type: "post",
            url: "ajax/borrarCarrito.php",
            dataType: "json",
            success: function(response){
                llenarCarrito(response);
            }
        });
    });
});
