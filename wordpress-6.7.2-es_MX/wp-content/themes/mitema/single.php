single.php
<?php
get_header();
get_template_part('contenidos/contenido', 'entradas');
get_footer();

if (post_type_exists('page')) {
    # code...
    echo 'Si existe';
}

?>