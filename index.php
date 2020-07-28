<?php

/*
Plugin Name: Configura el pie de página de tu blog.
Description: Crea un menú de configuración de un texto para mostrar en el pie del blog.
Author: Juan Ramón González Morales
Author URI: https://www.jrgonzalez.es/
*/


add_action("admin_menu", "plugin_menu_pie");
function plugin_menu_pie() {
  add_menu_page('Configuración del pie', 'Configuración del pie', 'manage_options', 'menu_config_pie', 'crear_menu_pie');
}

add_action('wp_footer', 'agregar_en_footer');
function agregar_en_footer() {
  if($texto_pie = get_option('valor_footer')) {
    echo "<p style=\"text-align: center;\">{$texto_pie}</p>";
  }
}

function crear_menu_pie() {
  if($_POST && $_POST['textopie']) {
    $texto = $_POST['textopie'];
    if(update_option('valor_footer', $texto)) {
      echo '<p>El valor ha sido almacenado</p>';
    } else {
      echo '<p>No se pudo configurar el texto del pie</p>';
    }
  }
  include('formulario-pie.php');
}