<?php
/**
 * Script para buscar información de un Pokémon en la PokeAPI.
 * 
 * @category Buscar_pokemon
 * @package  Tarea 9
 * @author   Cristina Muñoz Rodríguez
 * @version  1.0
*/


// Verifica si se proporcionó el número de Pokémon en la solicitud GET.
if (isset($_GET['numeroPokemon'])) {
    // Obtiene el número de Pokémon de la solicitud GET.
    $numeroPokemon = $_GET['numeroPokemon'];

    // Construye la URL para consultar la API
    $url = 'https://pokeapi.co/api/v2/pokemon/' . $numeroPokemon . '/';

    // Realiza la solicitud GET a la API y obtiene la respuesta.
    $response = file_get_contents($url);

    // Verifica si se pudo obtener la respuesta.
    if ($response === false) {
        // Si no se pudo obtener la respuesta, devuelve un mensaje de error en formato JSON.
        echo json_encode(['error' => 'No se pudo obtener la información del Pokémon.']);
    } else {
        // Si se obtuvo la respuesta, decodifica los datos JSON y los devuelve en formato JSON.
        $pokemon = json_decode($response, true);
        echo json_encode($pokemon);
    }
} 
?>