<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="CSS/bootstrap.min.css" >

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>
<body>


<div class="row">
    <div class="col">SUBIR <br>
        <input type="text" id="inicialSubir" placeholder="dialecto"><br>
        <input type="text" id="nameSubir" placeholder="erbmon"><br><br>
        <button class="btn-success" id="subir">Subir</button>            
    </div>
    <div class="col">BORRAR <br>
        <input type="text" id="inicialBorrar" placeholder="INICIAL"><br>
        <input type="text" id="idBorrar" placeholder="ID"><br><br>
        <button class="btn-success" id="borrar">Borrar</button>            
    </div>
    <div class="col">EDITAR <br>
        <input type="text" id="inicialEditar" placeholder="INICIAL"><br>
        <input type="text" id="idEditar" placeholder="ID"><br>
        <input type="text" id="nameEditar" placeholder="NOMBRE"><br><br>
        <button class="btn-success" id="editar">Editar</button>            
    </div>
</div>
<div class="row">
    <div class="col">LISTAR <br>
        <input type="text" id="inicialListar" placeholder="INICIAL"><br>
        <button class="btn-success" id="listar">Cargar</button>            
        <table id="table1" class="table table-bordered border-dark table-primary">
            <tr id="noBorrar"><th>ID</th><th>Nombre</th></tr>
        </table>
    </div>
    <div class="col">BUSCAR <br>
        <input type="text" id="nameBuscar" placeholder="NOMBRE"><br>
        <button class="btn-success" id="buscar">Buscar</button>            
        <br><br>
        <table id="table2">
            <tr><th>ID</th><th>Nombre</th></tr>
            <tr><th>Para agregar elementos voy a hacer tablas o array para colocar los elementos en un div</th></tr>
        </table>
    </div>
    <div class="col">CONSEGUIR <br>

        <input type="text" id="inicialConseguir" placeholder="INICIAL">
        <input type="text" id="idConseguir" placeholder="ID"><br>
        <button class="btn-success" id="conseguir">Conseguir</button>            
        <br><br>

        <table id="table3">
            <tr><th>ID</th><th>Nombre</th></tr>
        </table>
    </div>
</div>






</body>
<!--SCRIPTS-->
    <script src="JS/ADMIN.js"></script>
    </html>
