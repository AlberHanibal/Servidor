function confirmarLogout() {
    if (confirm("¿Seguro que quiere cerrar sesión?")) {
        location.href=URL_PATH + "/cerrarSesion";
    }
}