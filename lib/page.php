<?php
    class page {
            //este metodo es usado para la alertas de sweet alert en donde se pido el tipo el mensaje que llevara y adonde se redirijira
            public static function showMessage($type, $message, $url)
        {
            $text = addslashes($message);
            switch($type)
            {
                case 1:
                    $title = "Éxito";
                    $icon = "success";
                    break;
                case 2:
                    $title = "Error";
                    $icon = "serror";
                    break;
                case 3:
                    $title = "Advertencia";
                    $icon = "warning";
                    break;
                case 4:
                    $title = "Aviso";
                    $icon = "info";
            }
            if($url != null)
            {
                print("<script>swal({title: '$title', text: '$text', type: '$icon', confirmButtonText: 'Aceptar', allowOutsideClick: false, allowEscapeKey: false}).then(function(){location.href = '$url'})</script>");
            }
            else
            {
                print("<script>swal({title: '$title', text: '$text', type: '$icon', confirmButtonText: 'Aceptar', allowOutsideClick: false, allowEscapeKey: false})</script>");
            }
        }

       public static function setCombo($label, $name, $value, $query)
	{
		$data = Database::getRows($query, null);
		print("<select name='$name' required>");
		if($data != null)
		{
			if($value == null)
			{
				print("<option value='' disabled selected>Seleccione una opción</option>");
			}
			foreach($data as $row)
			{
				if(isset($_POST[$name]) == $row[0] || $value == $row[0])
				{
					print("<option value='$row[0]' selected>$row[1]</option>");
				}
				else
				{
					print("<option value='$row[0]'>$row[1]</option>");
				}
			}
		}
		else
		{
			print("<option value='' disabled selected>No hay registros</option>");
		}
		print("
			</select>
			<label>$label</label>
		");
	}
    }
?>