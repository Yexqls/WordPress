<?php
get_header();
//Si es una ruta de archivos la eliminara, amenos que se fuerze como un array
$url = esc_url("file://yucliemmanuel.vercel.app/caerca de", array('file'));
$url ="file://yucliemmanuel.vercel.app/caerca de";

$output = "<a href=\"$url\">Sitio de Yucli</a>";

//echo esc_html($output) ;
//echo $output;
$elem_permitidos = [
    'a' => [
        'href' => []
    ]
];

$protocolos = [
    'file'
];

echo wp_kses($output, $elem_permitidos, $protocolos );


?>
<br>
home.php

<?php get_footer(); ?>

&lt;a

