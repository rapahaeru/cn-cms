<?php
/**
 * Plugin Name: [CN] Cadastro das feiras
 * Plugin URI: http://link.onde.seu.plugin.esta.hospedado
 * Description: Manipula e insere todas as feiras para orgânicas para utilizar no mapa
 * Version: 0.1
 * Author: rapahaeru
 * Author URI: http://github.com/rapahaeru
 */

define('PATH_PLUGIN', WP_PLUGIN_URL.'/feiras/');

function loadcss(){
	global $post;

	//if (is_single() && $post->post_type == 'filme'){
		wp_register_style('feiras',PATH_PLUGIN.'css/feiras.css'); // registra o restilo
		wp_enqueue_style('feiras'); //carrega o estilo efetivamente ( precisa que seja registrada antes)
	//}
}

add_action('wp_enqueue_scripts','loadcss'); // chama tanto scripts quanto estilos para ser carregado


function cn_ativacao(){ 

	cn_feiras();
	cn_feirantes();
	cn_produtos();
	flush_rewrite_rules(); // limpa links permanentes para facilitar a atualização na hora de criar novos post_types

}

register_activation_hook(__FILE__,'cn_ativacao');

// NOVO POST TYPE

function cn_feiras(){
	$labels = array (
					'name' 					=> 'Feiras',
					'singular_name' 		=> 'Feira',
					'add_new_item' 			=> 'Adicionar feira',
					'edit_item' 			=> 'Editar feira',
					'new_item' 				=> 'Adicionar feira',
					'all_items' 			=> 'Todas as feiras',
					'view_item' 			=> 'Ver feiras',
					'search_items' 			=> 'Procurar feiras',
					'not_found' 			=> 'Nenhuma feira encontrada',
					'not_found_in_trash' 	=> 'Nenhuma feira encontrada na lixeira',
					'menu_name' 			=> 'Feiras'
		);

		$args = array(
					'labels' => $labels,
					'public'	=> true,
					//'menu_position' => 5,
					//'menu_icon' => get_admin_url(). '/images/media-button-other.gif',
					'supports' => array('title','editor','excerpt','thumbnail','custom-fields'), //,'thumbnail','excerpt','custom-fields'
					'has_archive' => true // importante utilizar  : através do item do t emplate chamado archive.php voce vai conseguir mostrar seu custom post type
		);

		register_post_type('feira', $args);
}

add_action('init','cn_feiras');

function cn_feirantes(){
	$labels = array (
					'name' 					=> 'Feirantes',
					'singular_name' 		=> 'Feirante',
					'add_new_item' 			=> 'Adicionar feirante',
					'edit_item' 			=> 'Editar feirante',
					'new_item' 				=> 'Adicionar feirante',
					'all_items' 			=> 'Todos os feirantes',
					'view_item' 			=> 'Ver feirantes',
					'search_items' 			=> 'Procurar feirantes',
					'not_found' 			=> 'Nenhum feirante encontrado',
					'not_found_in_trash' 	=> 'Nenhum feirante encontrado na lixeira',
					'menu_name' 			=> 'Feirantes'
		);

		$args = array(
					'labels' => $labels,
					'hierarchical' => true,
					//'supports' => array('title','editor','thumbnail','custom-fields'), //,'thumbnail','excerpt','custom-fields'
					'rewrite'  => array('slug' => 'feira/feirante')
		);

		register_taxonomy('feirante',array('feira'), $args); 
}

add_action('init','cn_feirantes');


function cn_produtos(){
	$labels = array (
					'name' 					=> 'Produtos',
					'singular_name' 		=> 'Produto',
					'add_new_item' 			=> 'Adicionar produto',
					'edit_item' 			=> 'Editar produto',
					'new_item' 				=> 'Adicionar produto',
					'all_items' 			=> 'Todos os produtos',
					'view_item' 			=> 'Ver produtos',
					'search_items' 			=> 'Procurar produtos',
					'not_found' 			=> 'Nenhum produto encontrado',
					'not_found_in_trash' 	=> 'Nenhum produto encontrado na lixeira',
					'menu_name' 			=> 'Produtos'
		);

		$args = array(
					'labels' => $labels,
					'hierarchical' => true,
					//'supports' => array('title','editor','thumbnail','custom-fields'), //,'thumbnail','excerpt','custom-fields'
					'rewrite'  => array('slug' => 'feira/produto')
		);

		register_taxonomy('produto',array('feira'), $args); 
}

add_action('init','cn_produtos');

//include the main class file
//require_once(PATH_PLUGIN . "/lib/Tax-meta-class/Tax-meta-class.php");


function cn_custom_to_query($query){

	if (is_admin()) return $query;

	if ($query->is_main_query()): 
	//if ($query->is_main_query() && !$query->is_home()): 	// não mostra na home
		$query->set('post_type',array('post','page','feira')); //
	endif;

	return $query;

}

add_action('pre_get_posts','cn_custom_to_query');