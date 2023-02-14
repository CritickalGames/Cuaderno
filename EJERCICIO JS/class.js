class clase{
    nombreP="";
    edadP="";
    validoP=false;
    constructor(nombre, edad, valido){
        this.nombreP=nombre;
        this.edadP=edad;
        this.validoP=valido;
    }

    getAll(){
        return "¡Hola! "+this.nombreP+"^-^"+this.edadP+"^-^"+this.validoP;
    }
}

function empresa(nombre, edad) {
    edadMaxima= 60;
    if (edad<=edadMaxima) {
        objt= new clase(nombre, edad, true)
        return "¡Bienvenido! "+objt.nombreP+" de "+objt.edadP+". Su estado de de valides es: "+objt.validoP;
    }else{
        alert(edad+" es mayor que la edad máxima:"+edadMaxima);
    }
}

function persona(nombre, edad) {
    return empresa(nombre, edad);
}

nombre= prompt("¿Cómo se llama?: ");
edad= prompt("¿Qué edad tiene?: ");



$("p").text(persona(nombre, edad));