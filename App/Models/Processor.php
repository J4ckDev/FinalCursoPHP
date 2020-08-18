<?php declare(strict_types=1); //Asegurar que se respeten los tipos definidos en las funciones

/**
 *
 * Desarrollado por Jonathan Aldana C.
 * Desarrollo web con PHP - Taller “Uso de formularios para transferencia”
 *
 * Definición de las funciones para hacer el procesamiento de la información.
 * 
 */

 /**
 * Función para convertir el texto que representa todas las sillas a un array matricial, esto con el 
 * fin de generar el vector que será usado para realizar las modificaciones del estado de la silla.
 * 
 * @param string Posiciones
 * @return array Distribución
 * 
 */
function textToArray(string $positions) : array {
    $distribution = [];
    $values = explode(' ',$positions);
    $puestosFila = [];
    $numFila = 1;
    $numSilla = 1;
    foreach ($values as $key => $val) {
        $puestosFila[$numSilla] = $val;
        $numSilla += 1;
        if (($key+1) % 5 == 0) {
            $distribution[$numFila] = $puestosFila;
            $numFila += 1;
            $numSilla = 1;
            $puestosFila = [];
        }
    }
    return $distribution;
}

/**
 * Función para convertir el array que representa todas las sillas a texto, esto con el fin de
 * generar el texto que será retornado a la vista y se actualice el estado de las sillas.
 * 
 * @param array Distribución
 * @return string Distribución en Texto
 * 
 */
function arrayToText(array $arrayPositions) : string {
    $distributionString = '';
    foreach ($arrayPositions as $numFila => $fila) {
        foreach ($fila as $numSilla => $silla) {
            if ($numFila == 1 && $numSilla == 1) {
                $distributionString = $silla . ' ';
            }elseif ($numFila == 5 && $numSilla == 5) {
                $distributionString .= $silla;
            }else{
                $distributionString .= $silla . ' ';
            }
        }    
    }
    return $distributionString;
}

/**
 * Función para actualizar el estado de una silla del teatro, teniendo en cuenta que los estados son 
 * liberada (L), reservada (R) o vendida (V) y tienen las siguientes condiciones:
 * - De estado L puede pasar a estado V o R
 * - De estado R puede pasar a estado V o L
 * - Si tiene estado V, ya no puede ser modificado 
 * 
 * @param int Fila
 * @param int Silla
 * @param string Estado
 * @param string Posiciones
 * @return array (mensaje, Distribución Actualizada)
 * 
 */
function updatePositions(int $row, int $seat, string $state, string $positions) : array {
    $arrayPositions = textToArray($positions);
    if ($arrayPositions[$row][$seat] == 'L' && ($state == 'V' || $state == 'R')) {
        $arrayPositions[$row][$seat] = $state;
        return ['ok',arrayToText($arrayPositions)];
    }elseif ($arrayPositions[$row][$seat] == 'R' && ($state == 'V' || $state == 'L')) {
        $arrayPositions[$row][$seat] = $state;
        return ['ok',arrayToText($arrayPositions)];
    }elseif ($arrayPositions[$row][$seat] == $state){
        return ['info',$positions];
    }else{
        return ['error',$positions];
    }
}