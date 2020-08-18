<?php if(isset($message) && ($message == 'ok' || $message == 'info' || $message == 'error')): ?>
    <input type="radio" id="show" name="group" checked>
    <div id="alert"
        <?php
            if ($message == 'ok') {
                echo 'class="ok"';
            }if ($message == 'info') {
                echo 'class="info"';
            } else {
                echo 'class="error"';
            }            
        ?>  
    > 
        <?php 
            if ($message == 'ok') {
                echo '<p id="mensaje" class="icon-ok-circled">Cambio realizado correctamente</p>';
            }elseif ($message == 'info') {
                echo '<p id="mensaje" class="icon-info-circled">Solicitud procesada pero no aplicada</p>';
            } else {
                echo '<p id="mensaje" class="icon-attention-circled">No se pudo procesar su solicitud</p>';
            }
        ?> 
    <label for="flag" class="close icon-cancel"></label>
    <input id="flag" type="radio" name=group>
</div>
<?php endif;?>