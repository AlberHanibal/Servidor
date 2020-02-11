function comprar(id_producto) {
    fetch(URL_PATH + "/api/comprar/" + id_producto)
        .then((res) => res.json())
        .then((res) => {
            // actualizar numero carrito y mostrar o ejecutar animacion del carro
            console.log("Dentro del fetch");
            document.querySelector("#numArticulos").textContent = " " + res.numArticulos;
        })
}