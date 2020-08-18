<?php
//Procesar la variable de texto con el estado de cada silla
$sillas = explode(' ', $dist); //Crear el vector
$numFila = 1;
$numSilla = 1;
//Dependiendo del estado de la silla, mostrar la imagen corrrespondiente
foreach ($sillas as $id => $silla):    
    if ($silla == 'L'): ?>
		<img class="silla" src="Assets/img/Libre.png" alt="Silla libre" title="<?php echo 'Puesto ' . $numSilla . ' Fila ' . $numFila; ?>"/>
	<?php elseif ($silla == 'R'): ?>
        <img class="silla" src="Assets/img/Reservado.png" alt="Silla Reservada" title="<?php echo 'Puesto ' . $numSilla . ' Fila ' . $numFila; ?>"/>
    <?php else: ?>
        <img class="silla" src="Assets/img/Vendido.png" alt="Silla Vendida" title="<?php echo 'Puesto ' . $numSilla . ' Fila ' . $numFila; ?>"/>
    <?php endif;
$numSilla += 1;
if (($id + 1) % 5 == 0) {
    $numSilla = 1;
    $numFila += 1;
}
endforeach;