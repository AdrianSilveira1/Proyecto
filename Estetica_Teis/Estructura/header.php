<?php  
require_once("./connection/conexion.php");
require_once("./funcionalidad/Sesion.php")
?>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<link rel="stylesheet" href="./css/bootstrap.min.css" >

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" ></script>
<script src="./js/script.js"></script>
<link rel="stylesheet" href="./css/style.css">
<div id="contenedor">
<div id="header" class="header">
  <div id="branding">
    <h1 class="logo-site-name">
    <a href="#"  class="active">Estética Teis</a>
    </h1>
    <div id="site-slogan">Gestionando citas estéticas desde 2023</div>
  </div>
</div>
<nav class="navbar navbar-expand-lg navbar-light " >
  <a class="navbar-brand" href="./Inicio.php" >Estética Teis</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link" href="#">Inicio <span class="sr-only"></span></a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="javascript:window.open('documento/documento.pdf');">Información</a>
      </li>
      
      <?php if(isset($_SESSION['administrador']) && $_SESSION['administrador'] == 1){
      echo '<li class="nav-item">';
        echo '<a class="nav-link" href="./clientes.php">Clientes</a>';
      echo '</li>';
      echo '<li class="nav-item dropdown">';
       echo '<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >Usuarios </a>';
           
       
        echo '<div class="dropdown-menu" aria-labelledby="navbarDropdown">';
       echo '<a class="dropdown-item" href="./usuarios.php">Visualizar</a>';
         echo  '<a class="dropdown-item" href="./crea-usuarios.php">Crear</a>';
          echo '<a class="dropdown-item" href="./modificar-usuarios.php">Modificar</a>';
          
        echo '</div>';
      echo '</li>';
      echo '<li class="nav-item dropdown">';
        echo '<a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >Citas</a>';
          
        
        echo '<div class="dropdown-menu" aria-labelledby="navbarDropdown">';
        echo '<a class="dropdown-item" href="./vista-citas.php">Visualizar</a>';
          echo '<a class="dropdown-item" href="./citas.php">Crear</a>';
          
          
        echo '</div>';
      echo '</li>';
       } ?>
       <?php if(isset($_SESSION['administrador']) && $_SESSION['administrador'] == 0){
      echo '<li class="nav-item">';
        echo '<a class="nav-link" href="#">Clientes</a>';
      echo '</li>';
      
      echo '<li class="nav-item dropdown">';
        echo '<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >Citas</a>';
        echo '<div class="dropdown-menu" aria-labelledby="navbarDropdown">';
        echo '<a class="dropdown-item" href="./vista-citas.php">Visualizar</a>';
          echo '<a class="dropdown-item" href="./citas.php">Crear</a>';
          
        echo '</div>';
      echo '</li>';
       } ?>
    </ul><?php if(isset($_SESSION['administrador'])){
      echo '<a class="navbar-brand right" href="./funcionalidad/logout.php" >Log Out</a>';
    }
    else{
      echo '<a class="navbar-brand right" href="./Vista-login.php" >Log In</a>';
    }?>
  </div>
</nav>
</div>