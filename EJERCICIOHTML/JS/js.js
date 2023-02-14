window.addEventListener("load", main);
function main() {
    
    $("#nombre").attr("placeholder", "Nombre");
    $("#apellido").attr("placeholder", "Apellido");
    $("#correo").attr("placeholder", "Correo");

    $("#ciudad").attr("placeholder", "Ciudad");
    $("#codigoPostal").attr("placeholder", "Codigo Postal");

    $("#user").attr("placeholder", "Usuario");
    $("#pass").attr("placeholder", "Contraseña");
    $("#passOtraVez").attr("placeholder", "Contraseña Otra vez");
}