function datosViaje(viajeid) {

    fetch(URL_PATH + "/api/descripcionViaje/" + viajeid)
        .then((res) => res.json())
        .then((res) => {
            document.getElementById("titulo").textContent = res.titulo;
            document.getElementById("descripcion").innerHTML = res.descripcion;
            document.getElementById("precioprivado").textContent = res.precioprivado + "€";
        })
}