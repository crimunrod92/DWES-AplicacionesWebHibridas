<?php
/**
 * Función para buscar información de un Pokémon en la PokeAPI.
 * 
 * @param int $numeroPokemon El número del Pokémon que se desea buscar.
 * @return mixed Los datos del Pokémon en formato JSON o un mensaje de error..
 */
function buscarPokemon($numeroPokemon) {
    // URL para consultar la API
    $url = 'https://pokeapi.co/api/v2/pokemon/' . $numeroPokemon . '/';

    // Solicitud a la API y obtiene la respuesta.
    $response = file_get_contents($url);

    // Verifica si se obtiene respuesta.
    if ($response === false) {
        // Si no hay respuesta, devuelve un mensaje de error en formato JSON.
        return json_encode(['error' => 'No se pudo obtener la información del Pokémon.']);
    } else {
        // Si hay respuesta devuelve los datos en JSON.
        $pokemon = json_decode($response, true);
        return json_encode($pokemon);
    }
}

// Verifica si se proporciona el número de Pokémon en el formulario
if (isset($_GET['numeroPokemon'])) {
    // Obtiene el número de Pokémon del formulario
    $numeroPokemon = $_GET['numeroPokemon'];

    // Llama a la función para buscar el Pokémon y muestra el resultado.
    echo buscarPokemon($numeroPokemon);
} 
?>
