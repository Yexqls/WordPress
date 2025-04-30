
<article>

<?php

echo "Archivo contenido .php<br>";

if (have_posts()) :
    while (have_posts()) :
        /* Itera el indice de la publicacion en el bucle */
        the_post();

        $titulo = get_the_title();
/*         $contenido = apply_filters('get_the_content', get_the_content());
 */        
$contenido = apply_filters('get_the_excerpt', get_the_content());

 $url_post = get_the_permalink();
        $id = get_the_ID();
        $time = get_the_time();

        $output = "
            <h1>$time</h1>
            <h1 class='titulo'>$titulo</h1>
            <p class='contenido'>$contenido</p>
            <p> id = $id</p>

    <a href='$url_post'>Leer mas</a>
    ";

        echo $output;

    endwhile;
else : _e('No hay publicaciones', 'bct');
endif;

?>
    
    </article>
