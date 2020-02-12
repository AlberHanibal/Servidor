function comprar(id_producto) {
    cantidad = $('#' + id_producto).val();
    fetch(URL_PATH + "/api/comprar/" + id_producto + "/" + cantidad)
        .then((res) => res.json())
        .then((res) => {
            // actualizar numero carrito y mostrar o ejecutar animacion del carro
            $('#numArticulos').text(" " + res.numArticulos);
            $('#contenedorProductos div').remove();
            for (const producto of res.cesta) {
                $('#contenedorProductos').prepend("<div>(x" + producto.cantidad + ")" + producto.nombre + " - " + producto.precio + "€</div >");
            }
            
            $('#contenedorProductos').show("fast").delay(5000).hide("slow");
            
        })
}