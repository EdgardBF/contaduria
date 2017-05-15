<?php
        include ('inc/header.php')
?>
<?php
    //Revisa si el metodo get del id, no esta vacio
    if(!empty($_GET)){
        try{
                $id = $_GET['id'];
                //Elimina un registro y muestra un mensaje
                $sql = "DELETE FROM descanso_semanal WHERE id = ?";
                $params = array($id);
                Database::executeRow($sql, $params);
                master::showMessage(1, "Se elimino el Registro", "vista_descanso_semanal.php");
                
        }
        catch(Exception $error)
        {
                master::showMessage(2, $error->getMessage(), null);
        }
        
    }
?>
<?php
        include ('inc/footer.php')
?>