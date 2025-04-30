<?php
$text_creditos = apply_filters('mt_credito_filtro',
 'Creado por Yucli', 'Beziertheme', '1.0');

?>
<h3><?php echo $text_creditos ?></h3>

<!-- gancho de accion que permite agregar cualquier credito -->
<?php

$nombretema = 'Beziertheme';
$versiontema = '1.0';

do_action('mt_creditos', $nombretema, $versiontema);
?>

<!-- Agrega todas las funciones callbacks con wp_footer -->
<?php wp_footer(); ?>

</body>

</html>