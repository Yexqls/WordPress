<?php
if (! function_exists('mt_pagina_prueba')) {
    add_action('admin_menu', 'mt_pagina_prueba');

    function mt_pagina_prueba()
    {

        add_menu_page(
            'MT Pruebas', //titulo
            'Pruebas', //titulo menu
            'manage_options', //cacpacidades del usuario
            'mt_pruebas', //el menu slug
            'mt_pruebas_html', //tienne que conincidir con el callback o el html que se motraea
            get_theme_file_uri('image/test-tube-svgrepo-com.svg'), //icono
            15 //bloque donde estara
        );

        add_menu_page(
            'MT Pruebas 2', //titulo
            'Pruebas 2', //titulo menu
            'manage_options', //cacpacidades del usuario
            'mt_pruebas2', //el menu slug
            'mt_pruebas_html2', //tienne que conincidir con el callback o el html que se motraea
            get_theme_file_uri('image/test-tube-svgrepo-com.svg'), //icono
            25 //bloque donde estara
        );

        //con este remueve la parte del menu colocado, mediante el slug, sirve incluso con los ya existentes por defectos
        remove_menu_page('mt_pruebas2');
        //AGREGA un subtema al padre en la pestalla, sirven tambien los ya existentes por defecto
        add_submenu_page(
            'index.php', //slug padre
            'MT Sub Pruebas', //titutlo pagina
            'Sub pruebas', // titutlo MENu
            'manage_options', //capacidad
            'mt_subpruebas', //slug
            'mt_subpruebas_html' // callback padre
        );

        //agregar submenu en pages pero, no se necesita el slug del padre
        add_pages_page(
            'MT Sub Pruebas Page', //titutlo pagina
            'Sub pruebas page', // titutlo MENu
            'manage_options', //capacidad
            'mt_subpruebas_page', //slug
            'mt_subpruebas_page_html' // callback padre
        );


        //Remover el submenu donde se referencia 
        remove_submenu_page('edit.php?post_type=page', 'mt_subpruebas_page');
    }
}


if (! function_exists('mt_pruebas_html')) {

    function mt_pruebas_html()
    {
?>

        <div class="wrap">
            <form action="" method="post">
                <input type="text" placeholder="Texto">
                <?php submit_button('Enviar') ?>
            </form>
        </div>

    <?php
    }
}

if (! function_exists('mt_subpruebas_html')) {
    function mt_subpruebas_html()
    {
    ?>
        <h1><?php echo get_admin_page_title(); ?></h1>
        <h1>Pagina Subpruebas</h1>
    <?php


    }
}

//Agrega el un sub menu en page / es la funcion callback
if (! function_exists('mt_subpruebas_page_html')) {
    function mt_subpruebas_page_html()
    {
    ?>
        <h1><?php echo get_admin_page_title(); ?></h1>
        <h1>Pagina Subpruebas Page</h1>
<?php


    }
}


function mt_cargando_librerias_admin($page)
{
    //muestra el slug de la page
    //var_dump($page);
    //si no es igual se termina de inmediato
    if ($page != 'toplevel_page_mt_pruebas') return;
    wp_enqueue_style(
        'mt_admin_estilos',
        get_theme_file_uri('admin/css/mt-admin.css'),
        [],
        '1.0',
        'all'
    );

    wp_enqueue_script(
        'mt_admin_script',
        get_theme_file_uri('admin/js/mt-admin.js'),
        [],
        '1.0',
        'all'
    );
}

add_action('admin_enqueue_scripts', 'mt_cargando_librerias_admin');


function mt_cargando_librerias_public()
{
    wp_enqueue_style(
        'mt_public_estilos',
        get_theme_file_uri('public/css/mt-public.css'),
        [],
        '1.0',
        'all'
    );
}

add_action('wp_enqueue_scripts', 'mt_cargando_librerias_public');

function mt_cargando_librerias_login()
{
    wp_enqueue_style(
        'mt_login_estilos',
        get_theme_file_uri('admin/css/mt-login.css'),
        [],
        '1.0',
        'all'
    );
}

add_action('login_enqueue_scripts', 'mt_cargando_librerias_login');
?>