function comprar(id_producto) {
    fetch(URL_PATH + "/api/comprar/" + id_producto)
        .then((res) => res.json())
        .then((res) => {
            // actualizar numero carrito y mostrar o ejecutar animacion del carro
            $('#numArticulos').text(" " + res.numArticulos);
            $('#contenedorProductos').append("<div>" + res.productoAnnadido.nombre + " - " + res.productoAnnadido.precio + "€</div >");
            $('#contenedorProductos').toggleClass("d-none");
            setTimeout(function () { 
                $('#contenedorProductos').toggleClass("d-none");
            }, 4000);
            
        })
}