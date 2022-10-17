window.addEventListener("load", main);
let agenda = new Agenda();


function main(){
    document.getElementById("idBotonAgregar").addEventListener("click", agregarContacto);
}

function agregarContacto(){
    if(document.getElementById("idFormulario").reportValidity()){
        let nom=document.getElementById("idNombre").value;
        let ape=document.getElementById("idApellido").value;
        let edad=document.getElementById("idEdad").value;
        let tel=document.getElementById("idTelefono").value;

        agenda.agregar(new Contacto(nom, ape, edad, tel));
        document.getElementById("idFormulario").reset();
        

    }
    lista();
}

function lista(){
    let ul = document.getElementById("idLista");
    let li= document.createElement("li");
    let text = document.createTextNode("-");

    li.appendChild(text);
    ul.appendChild(li);
    document.body.appendChild("holasasas");
}