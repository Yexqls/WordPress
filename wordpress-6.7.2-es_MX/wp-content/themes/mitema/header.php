<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <!-- recupera estilos, js y otras cosas -->
    <?php wp_head(); ?>
</head>

<!-- Recuperar las clases de body -->

<body <?php body_class(); ?>>

<header>
    <br>
    <!-- devuelve un bool para validar si es correcta la ruta -->
    <?php 
/* ETIQUETAS CONDICIONALES */
global $post;

/*     if (is_single(array('Naturaleza', 8)  )) {
        # code...
        echo "Verdadero es un post -> {$post->post_title} ";
    }else{
        echo "Falso no es un post -> {$post->post_title} ";
    }

echo ' | ';

    if (is_page(array('Mi pagina', 2)  )) {
        # code...
        echo "Verdadero es una pagina -> {$post->post_title} ";
    }else{
        echo "Falso no es una pagina -> {$post->post_title} ";
    } */


/* Condicional para verififcar si estas usando una plantilla personalizada */
    if (is_page_template('otraplantilla.php')) {
        # code...
        echo "Esta pagina es una plantilla personalizada 'otraplantilla.php'";
    }else{
        echo "No tiene plantilla personalizada 'otraplantilla.php'";
    }
    ?>
        <br>
        <br>
        <h3 style="color: red;">Estilos por defecto del header
        </h3>
</header> 