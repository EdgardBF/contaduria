<html>
    <head>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      <?php
      if(!empty($_POST))
        {
            $nombre=$_POST['nombre'];
            $nocturna=$_POST['diurna'];
            $diurna=$_POST['nocturna'];
            
            $diario = round(($nombre/30)/8, 2);
            $salDD = round(($diario*1)+$diario, 2);
            $salD = round($salDD * $diurna, 2);

            $salND = round(($diario*1.25)+$diario, 2);
            $salN = round($salND * $nocturna, 2);

            $horas_extras = $salD+$salN;

            //ECHO $diario;
            echo $horas_extras;


        }   
        else
        {
            $nombre=null;
            $nocturna=0;
            $diurna=0;
        }
    ?>
<form method='post'>
    <div class='row'>
        <div class='input-field col s12 m6'>
            <i class='material-icons prefix'>note_add</i>
            <input id='nombre' type='text' name='nombre' class='validate' value='<?php print($nombre); ?>' required/>
            <label for='nombre'>Numero</label>
        </div>
        <div class='input-field col s12 m6'>
            <i class='material-icons prefix'>note_add</i>
            <input id='nombre' type='text' name='diurna' class='validate' value='<?php print($nocturna); ?>' required/>
            <label for='nombre'>Nocturna</label>
        </div>
        <div class='input-field col s12 m6'>
            <i class='material-icons prefix'>note_add</i>
            <input id='nombre' type='text' name='nocturna' class='validate' value='<?php print($diurna); ?>' required/>
            <label for='nombre'>Diurna</label>
        </div>
    </div>
    <div class='row center-align'>
        <a href='index.php' class='btn waves-effect grey'><i class='material-icons'>cancel</i></a>
        <button type='submit' class='btn waves-effect blue'><i class='material-icons'>save</i></button>
    </div>
</form>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
    </body>
  </html>