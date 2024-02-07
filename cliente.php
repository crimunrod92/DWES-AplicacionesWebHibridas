<?php /**
 * Cliente para buscar información de un Pokémon en la PokeAPI.
 * 
 * @category Cliente
 * @package  Tarea 9
 * @author   Cristina Muñoz Rodríguez
 * @version  1.0
*/
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DWES: Tarea 9</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <h1>POKEMON</h1>
    <div id="form">
        <!-- Formulario para buscar un Pokémon por su número -->
        <form id="formulario">
            <label for="numeroPokemon">Introduce el número del Pokemon:</label>
            <input type="number" id="numeroPokemon" name="numeroPokemon" min="1"><br><br>
            <div id="boton">
                ¡Pulsa en la pokeball! <br><br>
                <!-- Se llama a la función buscarPokemon() cuando se hace clic en la pokeball -->
                <img src="media/pokeball.png" alt="Buscar Pokémon" onclick="buscarPokemon()">
            </div>
        </form>

        <div id="pokemonInfo">
            <!-- Aquí se mostrará la información del Pokémon -->
        </div>
    </div>
    <script>
        /**
         * Petición AJAX para buscar la información de un Pokémon.
         */
        function buscarPokemon() {
            var numeroPokemon = document.getElementById("numeroPokemon").value;

            $.ajax({
                url: 'buscar_pokemon.php',
                type: 'GET',
                data: { numeroPokemon: numeroPokemon },
                dataType: 'json',
                success: function(data) {
                    if (data.error) {
                        alert(data.error);
                    } else {
                        mostrarInformacionPokemon(data);
                    }
                },
                error: function() {
                    alert('No se pudo obtener la información del Pokémon.');
                }
            });
        }

        /**
         * Muestra la información del Pokémon en la página.
         *
         * @param {object} pokemon - Objeto JSON que contiene la información del Pokémon.
         */
        function mostrarInformacionPokemon(pokemon) {
            var infoDiv = document.getElementById("pokemonInfo");
            infoDiv.innerHTML = "<h4>Información del Pokemon</h4>" +
                               "<p>Nombre: " + pokemon.name + "</p>" +
                               "<p>Tipo: " + pokemon.types[0].type.name + "</p>" +
                               "<img src='" + pokemon.sprites.front_default + "' alt='Imagen del Pokemon'>";
        }
    </script>
</body>
</html>
