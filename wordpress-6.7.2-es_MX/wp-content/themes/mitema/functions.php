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
        <br>
        <!-- Ejecuta el js de mt-admin -->
        <button class="btn-ejecutar">Ejecutar</button>

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
    //el register precarga lso estilos y con wp_enque se cargan
    if ($page != 'toplevel_page_mt_pruebas') return;
    wp_register_style(
        'mt_admin_estilos',
        get_theme_file_uri('admin/css/mt-admin.css'),
        [],
        '1.0',
        'all'
    );

    //para los scritps
    wp_register_script(
        'mt_admin_script',
        get_theme_file_uri('admin/js/mt-admin.js'),
        ['jquery'],
        '1.0',
        true
    );

    wp_enqueue_script('mt_admin_script');
    wp_enqueue_style('mt_admin_estilos');
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


function mt_quitar_estilos_script()
{
    wp_dequeue_style('mt_admin_estilos');
    wp_dequeue_script('mt_admin_script');
    //con estos ya no se puden usar a futuro

    wp_deregister_style('mt_admin_estilos');
    wp_enqueue_style('mt_admin_estilos');

    /*     wp_deregister_script('jquery');
 */
}

add_action('admin_enqueue_scripts', 'mt_quitar_estilos_script');


///shortcode function
function mi_primer_shortcode($atts, $contenido)
{
    return $contenido;
}

add_shortcode('mt_primer_shortcode', 'mi_primer_shortcode');

//remove_shortcode('mt_primer_shortcode');

///shortcode function
function mt_span_red($atts, $contenido)
{
    return "<span style='color:red'>$contenido</span>";
}

add_shortcode('mt_span_red', 'mt_span_red');


function mt_container($atts, $contenido)
{
    return "<div class='container'>" . do_shortcode($contenido)  . "</div>";
}

add_shortcode('mt_container', 'mt_container');

//Muy util en caso de poner un estilo en la etiqueta en el page de wordpress se respetara el otro
function mt_button_enlace($attr_new, $contenido)
{
    $attr_default = [
        'texto' => '',
        'size' => '16px',
        'color' => 'white',
        'bgcolor' => 'green',
        'padding' => '5px 10px',
        'url' => '#',
        'target' => '_blank'
    ];
    //transformamos las letras en minusculas
    $attr_new = array_change_key_case((array)$attr_new, CASE_LOWER);
    //el attr_new remplazara los valores del default - con extr_prefix, nos permite poner el array y usarlos como varibles
    extract(shortcode_atts($attr_default, $attr_new, 'mt_enlace'), EXTR_PREFIX_ALL, 'mt');
    //Se le da el valor en la etiqueta en el page de wordpress
    if ($mt_texto == '') return 'Por favor ingrese un texto para utilizar el shortcode';

    $style = "
    background-color: $mt_bgcolor; color: $mt_color;font_size: $mt_size;padding: $mt_padding;";

    return "<a href='$mt_url' target ='$mt_target' style='$style'>$mt_texto</a>";
}

add_shortcode('mt_enlace', 'mt_button_enlace');


/* function mt_filtrando_shortcode($out,$pairs,$atts,$shortcode){
    echo "<pre>";
    var_dump($out);
        var_dump($pairs);
    var_dump($atts);
    var_dump($shortcode);

        echo "<pre>";

    return $out;
}

add_filter('shortcode_atts_mt_enlace','mt_filtrando_shortcode', 10 , 4); */