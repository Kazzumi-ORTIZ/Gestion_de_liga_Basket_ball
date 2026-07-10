<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Partido - Liga de Básquetbol</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 antialiased text-gray-800">

<div class="py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-2xl mx-auto">
        <div class="bg-white shadow-sm rounded-xl overflow-hidden border border-gray-200">
            <div class="p-6 sm:p-10">
                <h1 class="text-3xl font-extrabold text-gray-900 mb-8 flex items-center gap-2">
                    <span>⚔️</span> Editar Partido
                </h1>

                <form action="{{ route('games.update', $game) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Equipos (Responsivo) -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <!-- Equipo Local -->
                        <div>
                            <label for="home_team_id" class="block text-sm font-semibold text-gray-700 mb-2">Equipo Local</label>
                            <select id="home_team_id" name="home_team_id" 
                                    class="w-full border border-gray-300 rounded-lg px-4 py-3 bg-white focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all @error('home_team_id') border-red-500 ring-1 ring-red-500 @enderror" required>
                                @foreach ($teams as $team)
                                    <option value="{{ $team->id }}" @selected(old('home_team_id', $game->home_team_id) == $team->id)>
                                        {{ $team->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('home_team_id')
                                <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Equipo Visitante -->
                        <div>
                            <label for="away_team_id" class="block text-sm font-semibold text-gray-700 mb-2">Equipo Visitante</label>
                            <select id="away_team_id" name="away_team_id" 
                                    class="w-full border border-gray-300 rounded-lg px-4 py-3 bg-white focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all @error('away_team_id') border-red-500 ring-1 ring-red-500 @enderror" required>
                                @foreach ($teams as $team)
                                    <option value="{{ $team->id }}" @selected(old('away_team_id', $game->away_team_id) == $team->id)>
                                        {{ $team->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('away_team_id')
                                <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Fecha y Hora -->
                    <div>
                        <label for="match_date" class="block text-sm font-semibold text-gray-700 mb-2">Fecha y Hora del Partido</label>
                        <input type="datetime-local" id="match_date" name="match_date" 
                               value="{{ old('match_date', $game->match_date?->format('Y-m-d\TH:i')) }}"
                               class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all @error('match_date') border-red-500 ring-1 ring-red-500 @enderror" required>
                        @error('match_date')
                            <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Marcador (Responsivo) -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <!-- Puntos Local -->
                        <div>
                            <label for="home_score" class="block text-sm font-semibold text-gray-700 mb-2">Puntos Local</label>
                            <input type="number" id="home_score" name="home_score" 
                                   value="{{ old('home_score', $game->home_score) }}"
                                   class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all @error('home_score') border-red-500 ring-1 ring-red-500 @enderror">
                            @error('home_score')
                                <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Puntos Visitante -->
                        <div>
                            <label for="away_score" class="block text-sm font-semibold text-gray-700 mb-2">Puntos Visitante</label>
                            <input type="number" id="away_score" name="away_score" 
                                   value="{{ old('away_score', $game->away_score) }}"
                                   class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all @error('away_score') border-red-500 ring-1 ring-red-500 @enderror">
                            @error('away_score')
                                <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Estado -->
                    <div>
                        <label for="status" class="block text-sm font-semibold text-gray-700 mb-2">Estado</label>
                        <select id="status" name="status" 
                                class="w-full border border-gray-300 rounded-lg px-4 py-3 bg-white focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all @error('status') border-red-500 ring-1 ring-red-500 @enderror">
                            @foreach(['programado' => 'Programado', 'jugado' => 'Jugado', 'cancelado' => 'Cancelado'] as $value => $label)
                                <option value="{{ $value }}" @selected(old('status', $game->status) == $value)>
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                        @error('status')
                            <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Botones de Acción -->
                    <div class="flex items-center justify-end gap-4 pt-4 border-t border-gray-100">
                        <a href="{{ route('games.index') }}" 
                           class="px-5 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg font-medium transition-colors text-center min-w-[100px]">
                            Cancelar
                        </a>
                        <button type="submit" 
                                class="px-6 py-3 bg-purple-600 hover:bg-purple-700 text-white rounded-lg font-medium transition-colors shadow-sm shadow-purple-200">
                            Actualizar Partido
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>