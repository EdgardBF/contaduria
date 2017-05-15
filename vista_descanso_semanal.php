<?php
        include ('inc/header.php')
?>
<?php
//Busca registros en la Base de datos
if(!empty($_POST))
{
	$search = trim($_POST['buscar']);
	$sql = "SELECT descanso_semanal.id, empleados.nombre, descanso_semanal.salario, descanso_semanal.dias_trabajados, descanso_semanal.salario_dia, descanso_semanal.salario_dia_descanso, descanso_semanal.total FROM descanso_semanal,empleados WHERE empleados.id = descanso_semanal.id_empleado AND nombre LIKE ?";
	$params = array("%$search%");
}
else
{
	$sql = "SELECT descanso_semanal.id, empleados.nombre, descanso_semanal.salario, descanso_semanal.dias_trabajados, descanso_semanal.salario_dia, descanso_semanal.salario_dia_descanso, descanso_semanal.total FROM descanso_semanal,empleados WHERE empleados.id = descanso_semanal.id_empleado";
	$params = null;
}
$data = Database::getRows($sql, $params);
if($data != null)
{
?>
<!--Crea un buscador-->
<form method='post'>
	<div class='row'>
		<div class='input-field col s6 m4'>
			<i class='material-icons prefix'>search</i>
			<input id='buscar' type='text' name='buscar'/>
			<label for='buscar'>Buscar</label>
		</div>
		<div class='input-field col s6 m4'>
			<button type='submit' class='btn waves-effect #00838f cyan darken-3'><i class='material-icons'>check_circle</i></button> 	
		</div>
	</div>
</form>
<!--Crea la tabla en donde los registros estaran-->
<table class='striped'>
	<thead>
		<tr>
			<th>Nombres</th>
            <th>Salarios</th>
            <th>Salarios por dias Normales</th>
            <th>Dias Trabajados durante los Descansos Semanales</th>
            <th>Salario Ganado en los Dias Trabajados</th>
            <th>Total</th>
            <th>Acciones</th>
		</tr>
	</thead>
	<tbody>
<?php
$mensaje = false;
//Ingresa los registros en la tabla
	foreach($data as $row)
	{
		print("
			<tr>
				<td>".$row['nombre']."</td>
                <td>".$row['salario']."</td>
                <td>".$row['salario_dia']."</td>
                <td>".$row['dias_trabajados']."</td>
                <td>".$row['salario_dia_descanso']."</td>
                <td>".$row['total']."</td>
                <td>
					<a href='calcular_descanso_semanal.php?id=".$row['id']."' class='waves-effect waves-light'><i class='material-icons cyan-text text-darken-3'>update</i></a>
					<a class='waves-effect waves-light' href='#modal1-".$row['id']."'><i class='material-icons red-text text-darken-4'>highlight_off</i></a>
					<div id='modal1-".$row['id']."' class='modal'>
						<div class='modal-content'>
							<h4>¡CUIDADO!</h4>
							<p>ESTA A PUNTO DE ELIMINAR UN REGISTRO, ¿ESTA SEGURO?</p>
						</div>
						<div class='modal-footer'>
							<a href='#!' onclick='eliminarDS(".$row['id'].")' class='modal-action modal-close waves-effect waves-green btn-flat'>Si</a>
							<a href='#!' class='modal-action modal-close waves-effect waves-green btn-flat'>No</a>
						</div>
					</div>
				</td>
			</tr>
		");
	}
	print("
		</tbody>
	</table>
	");
} //Fin de if que comprueba la existencia de registros. 
else
{
	page::showMessage(4, "No hay registros disponibles", "");
}
?>
<?php
        include ('inc/footer.php')
?>