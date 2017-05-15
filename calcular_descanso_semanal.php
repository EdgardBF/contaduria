<?php 
include ('inc/header.php')
?>
<?php
if(empty($_GET['id'])) 
{
    $id = null;
    $id_empleado = null;
    $salario = 0;
    $dias_trabajados = 0;
    $salario_dia = 0;
    $salario_dia_descanso = 0;
    $total = 0;
}
else
{
    $id = $_GET['id'];
    $sql = "SELECT * FROM descanso_semanal WHERE id = ?";
    $params = array($id);
    $data = Database::getRow($sql, $params);
    $id_empleado = $data['id_empleado'];
    $salario = $data['salario'];
    $dias_trabajados = $data['dias_trabajados'];
    $salario_dia = $data['salario_dia'];
    $salario_dia_descanso = $data['salario_dia_descanso'];
    $total = $data['total'];
}
if(!empty($_POST))
{
    $id_empleado = $_POST['empleados'];
    $salario = $_POST['salario'];
    $dias_trabajados = $_POST['dias_trabajados'];
    try 
    {
      	if($id_empleado != "")
        {
            if($salario >= 1)
            {
                if($dias_trabajados >= 0 && $dias_trabajados <=5)
                {
                    $salario_dia = $salario/30;
                    $salario_dia_descanso = $salario_dia + ($salario_dia * 0.5);
                    $total = ($salario - ($dias_trabajados * $salario_dia)) + ($salario_dia_descanso * $dias_trabajados);
                    //Guarda los registros en la Base de Datos
                    if($id == null)
                    {
                        $sql = "INSERT INTO descanso_semanal(id_empleado, salario, dias_trabajados, salario_dia, salario_dia_descanso, total) VALUES(?,?,?,?,?,?)";
                $params = array($id_empleado, $salario, $dias_trabajados, $salario_dia, $salario_dia_descanso, $total);
                    }
                    else
                    {           
                         $sql = "UPDATE descanso_semanal SET id_empleado = ?, salario = ?, dias_trabajados = ?, salario_dia = ?, salario_dia_descanso = ?, total = ? WHERE id = ?";
                        $params = array($id_empleado, $salario, $dias_trabajados, $salario_dia, $salario_dia_descanso, $total, $id);
                    }
                    Database::executeRow($sql, $params);
                    page::showMessage(1, "El salario a pagar por el dia de descanso semanal trabajado es: $".$salario_dia_descanso." y el total a cobrar: $".$total, "calcular_descanso_semanal.php");
                }
                else
                {
                    throw new Exception("Debe ingresar una cantidad de dias adecuados");
                }
            }
            else
            {
                throw new Exception("Debe ingresar un salario adecuado");
            }
        }
        else
        {
            throw new Exception("Debe ingresar el nombre");
        }
    }
    catch (Exception $error)
    {
        page::showMessage(2, $error->getMessage(), null);
    }
}
else
{
    $id = null;
    $id_empleado = null;
    $salario = 0;
    $dias_trabajados = 0;
    $salario_dia = 0;
    $salario_dia_descanso = 0;
    $total = 0;
}
?>
<br>
<!--Formulario con el cual se muestran los datos y el unico habilitado es el combobox-->
<form form method='post'>
    <div class='row'>
            <div class='input-field col s12 m6'>
            <?php
            $sql = "SELECT id, nombre FROM empleados";
            page::setCombo("Empleados", "empleados", $id_empleado, $sql);
            ?>
        </div>
        <div class='input-field col s12 m6'>
          	<i class='material-icons prefix'>euro_symbol</i>
          	<input id='salario' type='number' name='salario' class='validate' value='<?php print($salario); ?>' required/>
          	<label for='salario'>Salario</label>
        </div>
        <div class='input-field col s12 m6'>
            <i class='material-icons prefix'>today</i>
            <input id='dias_trabajados' type='number' name='dias_trabajados' class='validate' value='<?php print($dias_trabajados); ?>' required/>
            <label for='dias_trabajados'>Dias trabajados durante los descansos semanales</label>
        </div>
    </div>
    <div class='row center-align'>
        <a href='vista_descanso_semanal.php' class='btn waves-effect red'><i class='material-icons'>cancel</i></a>
        <button type='submit' class='btn waves-effect blue'>Calcular</button>
    </div>
</form>
<?php
        include ('inc/footer.php')
?>