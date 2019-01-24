<?php
    function peticion_ajax() {
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';    
    }

    $nombre = htmlspecialchars($_POST['nombre']);
    $numero = htmlspecialchars($_POST['numero']);

    try {
        require_once('funciones/bd_conexion.php');
        $sql = "INSERT INTO `contactos` (`id`, `nombre`, `numero`) ";
        $sql .= "VALUES (NULL, '{$nombre}', '{$numero}');";

        $resultado = $dbc->query($sql);
        
        if (peticion_ajax() ) {
        echo json_encode(array(
            'Respuesta' => $resultado,
            'nombre' => $nombre,
            'numero' => $numero,
            'id' => $dbc->insert_id));
        } else {
            exit;
        }
        
    } catch (Exception $e) {
        $error = $e->getMessage();
    }
    
    $dbc->close();

?>