@extends('layouts.app')

@section('title', 'Iniciar Sesión')

@section('content')
<div class="min-h-[calc(100vh-12rem)] flex items-center justify-center">
    <div class="w-full max-w-sm mx-auto">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
            <div class="text-center mb-8">
                <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center mx-auto mb-4 shadow-lg shadow-blue-500/25">
                    <span class="text-3xl">🏀</span>
                </div>
                <h1 class="text-xl font-bold text-gray-900">Liga de Básquetbol</h1>
                <p class="text-sm text-gray-500 mt-1">Inicia sesión para continuar</p>
            </div>

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-700 mb-1.5">Correo electrónico</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400"><i class="far fa-envelope text-sm"></i></div>
                            <input type="email" name="email" id="email" required
                                   class="input-focus w-full border border-gray-200 rounded-xl pl-10 pr-4 py-2.5 text-sm bg-gray-50/50 focus:bg-white"
                                   placeholder="tu@correo.com">
                        </div>
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-semibold text-gray-700 mb-1.5">Contraseña</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400"><i class="fas fa-lock text-sm"></i></div>
                            <input type="password" name="password" id="password" required
                                   class="input-focus w-full border border-gray-200 rounded-xl pl-10 pr-4 py-2.5 text-sm bg-gray-50/50 focus:bg-white"
                                   placeholder="••••••••">
                        </div>
                    </div>
                    <button type="submit"
                            class="btn w-full py-2.5 bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-xl text-sm font-bold hover:from-blue-700 hover:to-blue-800 shadow-lg shadow-blue-600/25 flex items-center justify-center gap-2">
                        <i class="fas fa-sign-in-alt"></i> Iniciar sesión
                    </button>
                </div>
            </form>

            <p class="text-center mt-6 text-sm text-gray-500">
                ¿No tienes cuenta?
                <a href="{{ route('register') }}" class="text-blue-600 hover:text-blue-700 font-semibold">Regístrate aquí</a>
            </p>
        </div>
    </div>
</div>
@endsection