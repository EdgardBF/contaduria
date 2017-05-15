  <!DOCTYPE html>
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
            if($nombre<=685.70)
            {
                $isss = round($nombre*0.03, 2);
            }
            else if($nombre>=685.71 && $nombre<700)
            {
                $isss = 20.57;
            }
            else if($nombre>=700 && $nombre<750)
            {
                $isss = 21;
            }
            else if($nombre>=750 && $nombre<800)
            {
                $isss = 22.50;
            }
            else if($nombre>=800 && $nombre<850)
            {
                $isss = 24;
            }
            else if($nombre>=850 && $nombre<900)
            {
                $isss = 25.50;
            }
            else if($nombre>=900 && $nombre<950)
            {
                $isss = 27;
            }
            else if($nombre>=950 && $nombre<100)
            {
                $isss = 28.50;
            }
            else if($nombre>=1000)
            {
                $isss = 30;
            }
            $afp = round($nombre*0.0625, 2);
            $combi = round($isss+$afp,2);
            $salario = round($nombre-$combi, 2);
            if($salario>=472.01 && $salario<=895.24)
            {
                $isr = round((($salario-472)*0.10)+17.67, 2);
                $total= $salario-$isr;
            }
            else if ($salario>=895.25 && $salario<=2038.10)
            {
                $isr = round((($salario-895.24)*0.20)+60, 2);
                $total= $salario-$isr;

            }
            else if($salario>=2038.11)
            {
                $isr = round((($salario-2038.10)*0.30)+288.57, 2);
                $total= $salario-$isr;

            }
            else{
                 $total=$salario;
            }
            echo round($combi, 2);

        }   
        else
        {
            $nombre=null;
        }
    ?>
<form method='post'>
    <div class='row'>
        <div class='input-field col s12 m6'>
            <i class='material-icons prefix'>note_add</i>
            <input id='nombre' type='text' name='nombre' class='validate' value='<?php print($nombre); ?>' required/>
            <label for='nombre'>Numero</label>
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