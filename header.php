<header>
     <!-- Encabezado -->       

      <div class="my-3 ms-3"><a href="#"><img src="imagenes/logo.png" alt="logo" id="img1"></a><span class="ms-5">Encabezado: Logo y Titulo</span></div>
            

       <!-- Menú de Navegación -->  
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
    
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">

       <?php
       // BARRA NAVEGACION PARA TODOS
        if (!isset($_SESSION['dniadmin']) && !isset($_SESSION['dnioperador'])){?>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="Institucional.php">Institucional</a>
        </li>
       <li class="nav-item">
          <a class="nav-link" href="Novedades.php">Novedades</a>
        </li> </ul>
        <!-- DE AQUI hacia abajo barra del administrador-->
        <?php }?>

        <?php if (isset($_SESSION['dniadmin'])){?>
          <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="Administrador.php">Administrador</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Usuario.php">Usuario</a>
        </li>
        </ul>

        <!-- DE ACA HACIA ABAJO OPERADOR-->
        <?php }else{
          if (isset($_SESSION['dnioperador'])){?>
          <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="operador.php">Operador</a>
          </li>
          <li class="nav-item">
                    <div class="container-fluid">
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                <ul class="navbar-nav">
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Tramites
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                      <li><a class="dropdown-item" href="listadoEscuela.php">Tramites Escolares</a></li>
                      <li><a class="dropdown-item" href="listadoPersona.php">Tramites Personales</a></li>
                      <li><a class="dropdown-item" href="listadoInstitucion.php">Otras instituciones</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>

             <!-- <a class="nav-link" href="listado.php">Listado</a> -->
          </li>
          </ul>
          <?php }}?>


       
      
      
        <?php if (!isset($_SESSION['dniadmin']) && !isset($_SESSION['dnioperador'])) { ?>
        <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Ingreso</a>
        </li>	
        </ul>
        <?php }  ?> 
       
        <?php if (isset($_SESSION['dniadmin']) || isset($_SESSION['dnioperador']) ) { ?>
        <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="salir.php">Salir</a>
        </li>
        </ul>
        <?php }  ?> 
      </div>
      </div>
      </nav>       
</header>
    
    