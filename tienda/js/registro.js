function emailExiste() {
    let email = $('#email').val();
    fetch(URL_PATH + "/api/comprobarEmail/" + email)
        .then((res) => res.json())
        .then((res) => {
            let campoEmail = $('#email');
            campoEmail.removeClass("is-invalid is-valid");
            if (res.emailExiste !== 0) {
                campoEmail.addClass("is-invalid");
            } else {
                campoEmail.addClass("is-valid");
            }
        });
}

function comprobarRepetirContrasena() {
    let password = $('#password');
    password.removeClass("is-valid is-invalid");
    let password2 = $('#password2');
    password2.removeClass("is-valid is-invalid");
    if (password.val() === "") {
        password.addClass("is-invalid");
    } else {
        if (password.val() === password2.val()) {
            password.addClass("is-valid");
            password2.addClass("is-valid");
        } else {
            password2.addClass("is-invalid");
        }
    }
}
function comprobarLogin() {
    let login = $('#emailLogin').val();
    let password = $('#passwordLogin').val();
    fetch(URL_PATH + "/api/comprobarUsuario", {
        method: "post",
        body: JSON.stringify({ login: login, password: password })
    })
        .then((res) => res.json())
        .then((res) => {
            let campoLogin = $('#emailLogin');
            campoLogin.removeClass("is-valid is-invalid");
            let campoPassword = $('#passwordLogin');
            campoPassword.removeClass("is-valid is-invalid");
            if (res.usuarioCorrecto) {
                campoLogin.addClass("is-valid");
                campoPassword.addClass("is-valid");
                usuarioAutenticado = campoLogin.val();
            } else {
                campoLogin.addClass("is-invalid");
                campoLogin.val("");
                campoPassword.addClass("is-invalid");
                campoPassword.val("");
            }
        });
}

function comprobarNombre() {
    let campoNombre = $('#nombre');
    campoNombre.removeClass("is-valid is-invalid");
    if (campoNombre.val() === "") {
        campoNombre.addClass("is-invalid");
    } else {
        campoNombre.addClass("is-valid");
    }
}

function comprobarDireccion() {
    let campoDireccion = $('#direccion');
    campoDireccion.removeClass("is-valid is-invalid");
    if (campoDireccion.val() === "") {
        campoDireccion.addClass("is-invalid");
    } else {
        campoDireccion.addClass("is-valid");
    }
}

function comprobarContrasena() {
    $('#password').removeClass("is-valid is-invalid");
    $('#password2').removeClass("is-valid is-invalid");
    $('#password2').val("");
}