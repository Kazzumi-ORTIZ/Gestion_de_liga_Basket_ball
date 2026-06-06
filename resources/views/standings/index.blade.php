<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Clasificación</title>
    <!-- Cargamos los estilos de Tailwind -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900 antialiased font-sans">
    <div class="max-w-5xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        
        <!-- Encabezado -->
        <div class="mb-8 text-center">
            <h1 class="text-4xl font-extrabold text-blue-700 tracking-tight">Liga de Básquetbol</h1>
            <p class="mt-2 text-lg text-gray-600">Tabla de Clasificación Automática</p>
        </div>
        
        <!-- Contenedor de la Tabla -->
        <div class="bg-white shadow-lg rounded-xl overflow-hidden border border-gray-200">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-blue-600">
                    <tr>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">#</th>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">Equipo</th>
                        <th scope="col" class="px-6 py-4 text-center text-xs font-bold text-white uppercase tracking-wider" title="Partidos Jugados">PJ</th>
                        <th scope="col" class="px-6 py-4 text-center text-xs font-bold text-white uppercase tracking-wider" title="Partidos Ganados (2 pts)">G</th>
                        <th scope="col" class="px-6 py-4 text-center text-xs font-bold text-white uppercase tracking-wider" title="Partidos Perdidos (1 pt)">P</th>
                        <th scope="col" class="px-6 py-4 text-center text-xs font-bold text-yellow-300 uppercase tracking-wider">Puntos</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <!-- Iteramos sobre los datos enviados desde el Controlador -->
                    @foreach ($standings as $index => $team)
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-500">
                                {{ $index + 1 }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-bold text-gray-900">{{ $team['equipo'] }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-600">
                                {{ $team['jugados'] }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-center text-green-600 font-bold">
                                {{ $team['ganados'] }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-center text-red-500 font-bold">
                                {{ $team['perdidos'] }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-lg text-center text-blue-700 font-extrabold">
                                {{ $team['puntos'] }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Condiciones de satisfacción (Recordatorio visual) -->
        <div class="mt-6 bg-blue-50 border-l-4 border-blue-500 p-4 rounded-r-md">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-blue-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-blue-700">
                        <strong>Regla de puntuación:</strong> Se asignan 2 puntos al ganador y 1 punto al perdedor tras finalizar un partido.
                    </p>
                </div>
            </div>
        </div>

    </div>
</body>
</html>