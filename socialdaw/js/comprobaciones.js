function confirmarLogout() {
    if (confirm("¿Seguro que quiere cerrar sesión?")) {
        location.href=URL_PATH + "/cerrarSesion";
    }
}

function comprobacionRegistro() {
    let datosBuenos = true;
    let login = document.getElementById("login");
    if (login.value == "") {
        document.getElementById("errorLogin").textContent = "Login vacío";
        datosBuenos = false;
    }
    let nombre = document.getElementById("nombre");
    if (nombre.value == "") {
        document.getElementById("errorNombre").textContent = "Nombre vacío";
        datosBuenos = false;
    }
    let password = document.getElementById("password");
    let password2 = document.getElementById("password2");
    if (password.value != password2.value) {
        document.getElementById("errorContrasena").textContent = "Contraseña distinta";
        password2.value = "";
        datosBuenos = false;
    }
    return datosBuenos;
}

function confirmarBorrarPost(postId) {
    if (confirm("¿Seguro que quiere borrar este post?")) {
        location.href=URL_PATH + "/borrarPost/" + postId;
    }
}

function confirmarBorrarUsuario(login) {
    if (confirm("¿Seguro que quiere borrar este usuario?")) {
        location.href=URL_PATH + "/borrarUsuario/" + login;
    }
}

function existeLogin() {
    let login = document.getElementById("login");
    fetch(URL_PATH + "/api/existeLogin/" + login.value)
        .then((res) => res.json())
        .then((res) => {
            let inputLogin = document.getElementById("login");
            let errorLogin = document.getElementById("errorLogin");
            if (inputLogin.hasAttribute("class", "is-invalid")) {
                inputLogin.classList.remove("is-invalid");
                errorLogin.textContent = "";
            }
            if (inputLogin.hasAttribute("class", "is-valid")) {
                inputLogin.classList.remove("is-valid");
            }
            if (res.estado) {
                errorLogin.textContent = "Login duplicado";
                inputLogin.classList.add("is-invalid");
            } else {
                inputLogin.classList.add("is-valid");
            }
        })
}