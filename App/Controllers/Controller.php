<?php

/**
 *
 * Desarrollado por Jonathan Aldana C.
 * Desarrollo web con PHP - Taller “Uso de formularios para transferencia”
 *
 * Controlador encargado de procesar y recibir los datos dependiendo de la interacción del usuario.
 */

require_once "../Models/Processor.php";

if (isset($_POST['reset'])) {    
    header('Location: http://localhost/sena/');
} elseif (isset($_POST['row']) && isset($_POST['seat']) && isset($_POST['state']) && isset($_POST['positions'])) {
    $row = intval($_POST['row']);
    $seat = intval($_POST['seat']);
    $state = $_POST['state'];
    $positions = $_POST['positions'];
    $result = updatePositions($row,$seat,$state,$positions);
    header("Location: http://localhost/sena/index.php?result=$result[0]&dist=$result[1]");
} else {
    header('Location: http://localhost/sena/index.php?result=error');
}
