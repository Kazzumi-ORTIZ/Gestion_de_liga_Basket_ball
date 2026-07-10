<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Jugador - Liga de Básquetbol</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 antialiased text-gray-800">

<div class="py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-2xl mx-auto">
        <div class="bg-white shadow-sm rounded-xl overflow-hidden border border-gray-200">
            <div class="p-6 sm:p-10">
                <h1 class="text-3xl font-extrabold text-gray-900 mb-8 flex items-center gap-2">
                    <span>👟</span> Nuevo Jugador
                </h1>

                <form action="{{ route('players.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <!-- Nombre Completo -->
                    <div>
                        <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Nombre Completo</label>
                        <input type="text" id="name" name="name" 
                               value="{{ old('name') }}"
                               class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all @error('name') border-red-500 ring-1 ring-red-500 @enderror"
                               placeholder="Ej. Juan Pérez" required>
                        @error('name')
                            <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Camiseta y Posición (Responsivo) -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <!-- # Camiseta -->
                        <div>
                            <label for="jersey_number" class="block text-sm font-semibold text-gray-700 mb-2"># Camiseta</label>
                            <input type="number" id="jersey_number" name="jersey_number" 
                                   value="{{ old('jersey_number') }}"
                                   min="0" max="99"
                                   class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all @error('jersey_number') border-red-500 ring-1 ring-red-500 @enderror"
                                   placeholder="Ej. 23" required>
                            @error('jersey_number')
                                <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Posición (Convertido a select para estandarizar datos) -->
                        <div>
                            <label for="position" class="block text-sm font-semibold text-gray-700 mb-2">Posición</label>
                            <select id="position" name="position" 
                                    class="w-full border border-gray-300 rounded-lg px-4 py-3 bg-white focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all @error('position') border-red-500 ring-1 ring-red-500 @enderror" required>
                                <option value="">Selecciona posición...</option>
                                @foreach(['PG' => 'PG - Base', 'SG' => 'SG - Escolta', 'SF' => 'SF - Alero', 'PF' => 'PF - Ala-Pívot', 'C' => 'C - Pívot'] as $value => $label)
                                    <option value="{{ $value }}" @selected(old('position') == $value)>{{ $label }}</option>
                                @endforeach
                            </select>
                            @error('position')
                                <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Equipo -->
                    <div>
                        <label for="team_id" class="block text-sm font-semibold text-gray-700 mb-2">Equipo</label>
                        <select id="team_id" name="team_id" 
                                class="w-full border border-gray-300 rounded-lg px-4 py-3 bg-white focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all @error('team_id') border-red-500 ring-1 ring-red-500 @enderror" required>
                            <option value="">Selecciona un equipo...</option>
                            @foreach ($teams as $team)
                                <option value="{{ $team->id }}" @selected(old('team_id') == $team->id)>
                                    {{ $team->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('team_id')
                            <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Botones de Acción -->
                    <div class="flex items-center justify-end gap-4 pt-4 border-t border-gray-100">
                        <a href="{{ route('players.index') }}" 
                           class="px-5 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg font-medium transition-colors text-center min-w-[100px]">
                            Cancelar
                        </a>
                        <button type="submit" 
                                class="px-6 py-3 bg-green-600 hover:bg-green-700 text-white rounded-lg font-medium transition-colors shadow-sm shadow-green-200">
                            Crear Jugador
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>