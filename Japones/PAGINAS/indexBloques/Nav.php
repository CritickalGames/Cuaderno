<nav class="navbar navbar-expand-lg navbar-dark bg-danger" id="navbar">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="IMG/logo.png" alt="" width="150">
        </a>
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" ></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <h3 class="ml-auto">
            <ul class="navbar-nav ">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Inicio</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Summer pack</a></li>
                <?php
                  include("PAGINAS/indexBloques/Nav-Sublista.html");
                ?>
                <?php
                    include("PAGINAS/indexBloques/Nav-Registro_Formulario.html");
                ?>
                <li class="nav-item">
                    <?php
                        include("PAGINAS/indexBloques/Nav-Inicio_VentanaModal.html");
                    ?>
                </li>
                <form class="d-flex " method=GET action="http://www.google.com/search" role="search" target="_blank">
                    <input class="form-control me-2" name=q type="search" placeholder="Buscar y dale enter ;)" aria-label="Buscar">
                    <input Type=hidden name=hl value="es">
                    <button class="btn btn-success" type="submit">Buscar</button> 
                </form>
            </ul>
        </h3>
        </div>
    </div>
</nav>