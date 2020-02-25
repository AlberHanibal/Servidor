function comprar(id_producto) {
    cantidad = $('#' + id_producto).val();
    fetch(URL_PATH + "/api/comprar/" + id_producto + "/" + cantidad)
        .then((res) => res.json())
        .then((res) => {
            $('#numArticulos').text(" " + res.numArticulos);
            $('#contenedorProductos div').remove();
            for (const producto of res.cesta) {
                $('#contenedorProductos').append('<div class="mt-1">' + '<img src="' + URL_PATH + '/assets/photos/' + producto.foto + '" class="imagen-cesta w-25" alt="' + producto.foto + '"></img>'
                    + '<div class="info">(x' + producto.cantidad + ')' + producto.nombre + '-' + producto.precio + '€</div></div>');
            }
            $('#contenedorProductos div').hover(function () {
                $('.info').show("slow");
            }, function () {
                $('.info').hide("slow");
            });
            $('#contenedorProductos').show("slow");
            $('.info').hide();
        })
}