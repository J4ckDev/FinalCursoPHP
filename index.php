<?php
    if (isset($_GET['result'])){
        $message = $_GET['result'];
    }
    if (isset($_GET['dist'])){
        $dist = $_GET['dist'];
    }else{
        $dist = "L L L L L L L L L L L L L L L L L L L L L L L L L"; //Inicializar interfaz
    }
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="Assets/css/style.css" />
    <title>Teatro Guillermo León Valencia - Gestor de sillas</title>
  </head>
  <body>
    <h1>Bienvenid@ al Gestor de Sillas del Teatro Guillermo León Valencia</h1>
    <div class="content">
        <section id="Distribution">
            <h2>Distribución del Teatro</h2>
          <img src="Assets/img/stage.png" alt="Escenario" id="stage" title="Escenario"/>
          <div id="Sillas">
            <?php require_once "App/Views/Distribution.php"; ?>
          </div>
        </section>
        <section id="Data">
            <h2>Modificador del estado de las sillas</h2>
            <p>Por favor rellene los datos del siguiente formulario para modificar si una silla 
                ha sido liberada (L), reservada (R) o vendida (V). Tenga en cuenta lo siguiente:
                <ol>
                    <li>De estado L puede pasar a estado V o R.</li>
                    <li>De estado R puede pasar a estado V o L.</li>
                    <li>Si tiene estado V, ya no puede ser modificado.</li>
                </ol>
            </p>

            <?php require_once "App/Views/Messages.php"; ?>

            <form action="App/Controllers/Controller.php" method="post">
                <div class="fila">
                    <label for="row">
                        Fila donde se ubica la silla
                    </label>
                    <input id="row" type="number" name="row" max="5" min="1" value="1">
                </div>
                <div class="puesto">
                    <label for="seat">
                        Número de la silla (1 al 5)
                    </label>
                    <input id="seat" type="number" name="seat" max="5" min="1" value="1">
                </div>
                <div class="estado">
                    <label for="state">
                        Estado de la silla
                    </label>
                    <select name="state" id="state">
                        <option value disabled selected>Seleccione una opción</option>
                        <option value="L">Liberar</option>
                        <option value="R">Reservar</option>
                        <option value="V">Vender</option>
                    </select>
                </div>

                <textarea name="positions" id="position" cols="30" rows="10"><?php print $dist;?></textarea>

                <button class="submit" type="submit">
                    Actualizar estado
                </button>
            </form>
            <p>Cuando una función del teatro termine, presione el siguiente botón para
                reiniciar el estado de todas las sillas a Libres y pueda volver a 
            ofrecer los puestos del teatro.</p>   
            <form action="App/Controllers/Controller.php" method="post">
                <input type="hidden" name="reset" value="reset">
                <button class="submit" type="submit">
                    Reiniciar estado
                </button>
            </form>         
        </section>
    </div>    
  </body>
</html>
