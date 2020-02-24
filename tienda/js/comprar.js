function comprar(id_producto) {
    cantidad = $('#' + id_producto).val();
    fetch(URL_PATH + "/api/comprar/" + id_producto + "/" + cantidad)
        .then((res) => res.json())
        .then((res) => {
            $('#numArticulos').text(" " + res.numArticulos);
            $('#contenedorProductos div').remove();
            for (const producto of res.cesta) {
                $('#contenedorProductos').append("<div>(x" + producto.cantidad + ")" + producto.nombre + " - " + producto.precio + "€</div >");
            }
            $('#contenedorProductos').show("fast");

        })
}