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
    // post
    function comprobarLogin() {
        let login = $('#emailLogin').val();
        let password = $('#passwordLogin').val();
        fetch(URL_PATH + "/api/comprobarUsuario/", {
            method: "post",
            body: JSON.stringify({ login: login, password: password })
        }).then((res) => res.json()).then((res) => {
            console.log(res);
            let campoLogin = $('#emailLogin');
            let campoPassword = $('#passwordLogin');
    
        });
    // get
    /* fetch(URL_PATH + "/api/comprobarUsuario/" + login + "/" + password)
        .then((res) => res.json())
        .then((res) => {
            console.log(res);
            let campoLogin = $('#emailLogin');
            let campoPassword = $('#passwordLogin');

        }); */
}