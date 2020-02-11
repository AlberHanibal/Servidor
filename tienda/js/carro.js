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