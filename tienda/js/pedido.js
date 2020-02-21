function procesarPedido() {
    let usuarioRegistro;
    let params;
    if (usuarioAutenticado) {
        params = {
            method: "post",
            body: JSON.stringify({ usuario: usuarioAutenticado })
        }
    } else {
        usuarioRegistro = true;
        if ($('#email').val() === "") {
            $('#email').addClass("is-invalid");
            usuarioRegistro = false;
        } else if (!($('#email').hasClass("is-valid"))) {
            usuarioRegistro = false;
        }
        if ($('#password').val() === "") {
            $('#password').addClass("is-invalid");
            $('#password2').addClass("is-invalid");
            usuarioRegistro = false;
        } else if (!($('#password').hasClass("is-valid"))) {
            usuarioRegistro = false;
        }
        $('#nombre').removeClass("is-valid is-invalid");
        if ($('#nombre').val() === "") {
            $('#nombre').addClass("is-invalid");
            usuarioRegistro = false;
        } else {
            $('#nombre').addClass("is-valid");
        }
        $('#direccion').removeClass("is-valid is-invalid");
        if ($('#direccion').val() === "") {
            $('#direccion').addClass("is-invalid");
            usuarioRegistro = false;
        } else {
            $('#direccion').addClass("is-valid");
        }
        if (usuarioRegistro) {
            params = {
                method: "post",
                body: JSON.stringify({
                    login: $('#email').val(),
                    contrasena: $('#password').val(),
                    nombre: $('#nombre').val(),
                    direccion: $('#direccion').val()
                })
            }
        } else {
            // generar mensaje de error
        }
    }
    if (usuarioAutenticado || usuarioRegistro) {
        fetch(URL_PATH + "/api/procesarPedido", params)
            .then((res) => res.json())
            .then((res) => {
                console.log(res);
                if (true) {
                    location.href = "/Servidor/pasarela-simulacion?cod_comercio=7777&cod_pedido=4&importe=51&concepto=pagoPedido";
                } else {
                    // exception 500
                }

            });
    }

}