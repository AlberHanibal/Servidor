$('document').ready(function() {
    $('#contenedorProductos').hide();
})

function mostrarCarro() {
    if ($('#contenedorProductos').is(":hidden")) {
        $('#contenedorProductos').show("slow");
    } else {
        $('#contenedorProductos').hide("slow");
    }
}

function borrarProducto(id_producto) {
    fetch(URL_PATH + "/api/borrarProducto/" + id_producto)
        .then((res) => res.json())
        .then((res) => {
            $('#'+ id_producto).remove();
            pedidoTotal = $('#pedidoTotal').text();
            pedidoTotal = pedidoTotal - (res.producto[0].cantidad * res.producto[0].precio);
            $('#pedidoTotal').text(pedidoTotal);
        })
}

function modificarCantidad(id_producto, mod) {
    fetch(URL_PATH + "/api/modificarCantidad/" + id_producto + "/" + mod)
        .then((res) => res.json())
        .then((res) => {
            let producto = res.producto[0];
            $('#cantidad' + producto.id_producto).text(producto.cantidad);
            $('#precioTotal' + producto.id_producto).text((producto.cantidad * producto.precio) + "€");
            pedidoTotal = $('#pedidoTotal').text();
            if (mod == "+") {
                pedidoTotal = parseInt(pedidoTotal) + producto.precio;
            } else if(mod == "-") {
                pedidoTotal = pedidoTotal - producto.precio;
            }
            $('#pedidoTotal').text(pedidoTotal);
            if (producto.cantidad == 0) {
                borrarProducto(id_producto);
            }
        })
}