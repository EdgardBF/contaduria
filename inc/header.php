<?php
require('lib/database.php');
require('lib/validator.php');
require('lib/page.php');
?>
<!DOCTYPE html>
<!--Con la siguiente linea de codigo se le dice al navegador que la pagina esta en idioma español-->
<html lang = "es">
<!--Aqui inicia el Head-->
  <head>
      <!--La siguiente linea de codigo sirve para poner las tildes-->
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximun-scale=1, minimun-scale=1">
      <title>Inicio</title>
      <!--Se llaman los archivos CSS-->
      <link type='text/css' rel="stylesheet" href="css/materialize.min.css"/>
      <link type='text/css' rel="stylesheet" href="css/estilos.css"/>
      <link type='text/css' rel='stylesheet' href='css/sweetalert2.min.css'/>
      <script type='text/javascript' src='js/sweetalert2.min.js'></script>
      <link type='text/css' type='text/css' rel='stylesheet' href='css/icon.css'/>
      <link rel="shortcut icon" href="img/logo.png">
  </head>
  <!--Aqui comienza el body-->
  <body>
<!-- Dropdown Structure -->
<nav>
  <div class="nav-wrapper cyan darken-3">
    <a href='#!' class='brand-logo logo'><img src='img/logo.png' width='50' height='50'></a>
    <ul class="right hide-on-med-and-down">
      <li><a class="dropdown-button" href="#!" data-activates="dropdown1">AGUINALDO<i class="material-icons left">arrow_drop_down</i></a></li>
      <li><a class="dropdown-button" href="#!" data-activates="dropdown2">VACACIONES<i class="material-icons left">arrow_drop_down</i></a></li>
      <li><a class="dropdown-button" href="#!" data-activates="dropdown3">INDEMNIZACION<i class="material-icons left">arrow_drop_down</i></a></li>
      <li><a class="dropdown-button" href="#!" data-activates="dropdown4">INDEMNIZACION POR RENUNCIA<i class="material-icons left">arrow_drop_down</i></a></li>
      <li><a class="dropdown-button" href="#!" data-activates="dropdown5">HORAS EXTRAS<i class="material-icons left">arrow_drop_down</i></a></li>
      <li><a class="dropdown-button" href="#!" data-activates="dropdown6">DESCANSO SEMANAL<i class="material-icons left">arrow_drop_down</i></a></li>
      <li><a class="dropdown-button" href="#!" data-activates="dropdown7">OTROS<i class="material-icons left">arrow_drop_down</i></a></li>
    </ul>
  </div>
</nav>
<ul id="dropdown1" class="dropdown-content">
  <li><a href="calcular_aguinaldo.php">Calcular</a></li>
  <li class="divider"></li>
  <li><a href="vista_aguinaldo.php">Vista</a></li>s
</ul>
<ul id="dropdown2" class="dropdown-content">
  <li><a href="calcular_vacacion.php">Calcular</a></li>
  <li class="divider"></li>
  <li><a href="vista_vacacion.php">Vista</a></li>
</ul>
<ul id="dropdown3" class="dropdown-content">
  <li><a href="calcular_indemnizacion.php">Calcular</a></li>
  <li class="divider"></li>
  <li><a href="vista_indemnizacion.php">Vista</a></li>
</ul>
<ul id="dropdown4" class="dropdown-content">
  <li><a href="calcular_indemnizacion_renuncia.php">Calcular</a></li>
  <li class="divider"></li>
  <li><a href="vista_indemnizacion_renuncia.php">Vista</a></li>
</ul>
<ul id="dropdown5" class="dropdown-content">
  <li><a href="calcular_horas_extra.php">Calcular</a></li>
  <li class="divider"></li>
  <li><a href="vista_horas_extra.php">Vista</a></li>
</ul>
<ul id="dropdown6" class="dropdown-content">
  <li><a href="calcular_descanso_semanal.php">Calcular</a></li>
  <li class="divider"></li>
  <li><a href="vista_descanso_semanal.php">Vista</a></li>
</ul>
<ul id="dropdown7" class="dropdown-content">
  <li><a href="calcular_isafin.php">Calcular ISSS, AFP, INSFORP</a></li>
  <li class="divider"></li>
  <li><a href="vista_isafin.php">Vista de ISSS, AFP, INSFORP</a></li>
</ul>