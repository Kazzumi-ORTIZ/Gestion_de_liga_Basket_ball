<div align="center">
  <br>
  <img src="https://img.shields.io/badge/Laravel-13.8-F9322C?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel">
  <img src="https://img.shields.io/badge/PHP-8.4-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP">
  <img src="https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL">
  <img src="https://img.shields.io/badge/Tailwind_CSS-06B6D4?style=for-the-badge&logo=tailwind-css&logoColor=white" alt="Tailwind CSS">
  <img src="https://img.shields.io/badge/Vite-646CFF?style=for-the-badge&logo=vite&logoColor=white" alt="Vite">
  <br><br>
  <h1>🏀 Gestión de Liga de Básquetbol</h1>
  <p>Sistema web para la administración de equipos, jugadores y partidos de una liga de básquetbol</p>
</div>

---

## 📋 Descripción

**Gestión de Liga de Básquetbol** es una aplicación web desarrollada en Laravel 13 que permite administrar una liga deportiva de básquetbol de forma eficiente. El sistema cuenta con autenticación de usuarios, gestión completa de equipos y jugadores, programación de partidos con registro de marcadores y una tabla de clasificación automática que calcula las posiciones según los resultados registrados.

## 🎯 Objetivo

Brindar una herramienta digital que facilite la administración de una liga de básquetbol, permitiendo registrar y gestionar equipos, jugadores y partidos, así como generar automáticamente la tabla de clasificación en función de los resultados de los encuentros deportivos.

## ✨ Funcionalidades

- **Autenticación de usuarios** — Registro, inicio de sesión, recuperación de contraseña y verificación de correo electrónico.
- **Dashboard** — Panel principal con resumen visual de equipos, jugadores, partidos y clasificación.
- **CRUD de Equipos** — Registrar, listar, editar y eliminar equipos (nombre, ciudad, entrenador).
- **CRUD de Jugadores** — Registrar, listar, editar y eliminar jugadores asociados a un equipo (nombre, número de camiseta, posición, altura, fecha de nacimiento).
- **CRUD de Partidos** — Programar, editar y eliminar partidos con equipos local y visitante, fecha, marcador y estado (programado, jugado, cancelado).
- **Tabla de Clasificación Automática** — Visualización pública de la tabla de posiciones con cálculos automáticos (2 puntos por victoria, 1 punto por derrota).
- **Perfil de Usuario** — Editar perfil, cambiar contraseña y eliminar cuenta.
- **Diseño Responsive** — Interfaz adaptable a dispositivos móviles y de escritorio.

## 🛠️ Tecnologías

| Tecnología | Versión |
|---|---|
| [Laravel](https://laravel.com/) | 13.8 |
| [PHP](https://www.php.net/) | 8.4 |
| [MySQL](https://www.mysql.com/) | — |
| [Laravel Breeze](https://laravel.com/docs/starter-kits) | 2.4 (Blade) |
| [Tailwind CSS](https://tailwindcss.com/) | 3.x (CDN) |
| [Font Awesome](https://fontawesome.com/) | 6.5 |
| [Vite](https://vitejs.dev/) | 8.x |
| [Alpine.js](https://alpinejs.dev/) | 3.4 |
| [Axios](https://axios-http.com/) | 1.16 |

## 📋 Requisitos Previos

- PHP >= 8.3
- Composer
- MySQL
- Node.js >= 18
- NPM
- Extensión `pdo_mysql` habilitada en PHP

## 🚀 Instalación

```bash
# 1. Clonar el repositorio
git clone https://github.com/jamih130402/gestion-liga-basquetbol.git
cd gestion-liga-basquetbol

# 2. Instalar dependencias de PHP
composer install

# 3. Instalar dependencias de frontend
npm install

# 4. Copiar archivo de entorno y generar clave
cp .env.example .env
php artisan key:generate
```

## 🔧 Configuración del archivo `.env`

Edita el archivo `.env` con los datos de tu base de datos:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=gestion_liga_basquetbol
DB_USERNAME=root
DB_PASSWORD=
```

## 🗄️ Configuración de Base de Datos

```bash
# Crear la base de datos en MySQL
mysql -u root -p -e "CREATE DATABASE gestion_liga_basquetbol;"

# Ejecutar migraciones
php artisan migrate
```

## ▶️ Ejecución del Proyecto

```bash
# Iniciar servidor de desarrollo de Laravel
php artisan serve

# En otra terminal, compilar assets de frontend (modo desarrollo)
npm run dev
```

Luego ingresa a `http://localhost:8000` en tu navegador.

### Comandos adicionales

```bash
# Compilar assets para producción
npm run build

# Ejecutar seeders (población inicial)
php artisan db:seed

# Limpiar caché de configuración
php artisan config:clear
```

## 📁 Estructura del Proyecto

```
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Auth/               # Controladores de autenticación (Breeze)
│   │   │   ├── TeamController.php   # CRUD de equipos
│   │   │   ├── PlayerController.php # CRUD de jugadores
│   │   │   ├── GameController.php   # CRUD de partidos
│   │   │   ├── StandingsController.php  # Tabla de clasificación
│   │   │   ├── ProfileController.php   # Gestión de perfil
│   │   │   └── Controller.php
│   ├── Models/
│   │   ├── User.php
│   │   ├── Team.php                 # Relación: hasMany Player, hasMany Game
│   │   ├── Player.php               # Relación: belongsTo Team
│   │   └── Game.php                 # Relación: belongsTo Team (home/away)
│   └── Providers/
├── config/                          # Configuraciones de Laravel
├── database/
│   ├── migrations/                  # Migraciones de tablas
│   │   ├── ...create_users_table.php
│   │   ├── ...create_cache_table.php
│   │   ├── ...create_jobs_table.php
│   │   ├── ...create_teams_table.php
│   │   ├── ...create_players_table.php
│   │   └── ...create_matches_table.php
│   └── seeders/
├── resources/
│   ├── css/
│   ├── js/
│   └── views/
│       ├── layouts/                 # Layout app, guest, navigation
│       ├── components/              # Componentes Blade reutilizables
│       ├── auth/                    # Vistas de autenticación
│       ├── teams/                   # Vistas del CRUD de equipos
│       ├── players/                 # Vistas del CRUD de jugadores
│       ├── games/                   # Vistas del CRUD de partidos
│       ├── standings/               # Vista de clasificación
│       ├── profile/                 # Vista de perfil
│       ├── dashboard.blade.php
│       └── welcome.blade.php
├── routes/
│   ├── web.php                      # Rutas principales
│   └── auth.php                     # Rutas de autenticación
├── vendor/                          # Dependencias de Composer
├── .env.example
├── composer.json
├── package.json
├── tailwind.config.js
└── vite.config.js
```

## 🖼️ Capturas de Pantalla

> *Aquí puedes agregar capturas de pantalla del sistema:*
> - Pantalla de inicio / Dashboard
> - Listado de equipos
> - Listado de jugadores
> - Calendario de partidos
> - Tabla de clasificación
> - Formularios de creación/edición

## 🔮 Posibles Mejoras Futuras

- Agregar roles y permisos (admin, editor, visitante).
- Estadísticas avanzadas por jugador y equipo.
- Subida de logos e imágenes de jugadores.
- Historial de temporadas.
- Exportación de reportes en PDF/Excel.
- Calendario visual de partidos.
- Notificaciones por correo electrónico.
- API REST para consumo externo.
- Pruebas automatizadas (PHPUnit).

## 👥 Integrantes

- **Herminia Ortiz Pachacute**
- **Dante Nayhua Huaman**
- **Huarayo Leon Ruben Jamyl**

## 📄 Licencia

Este proyecto es de uso académico y está bajo la licencia [MIT](https://opensource.org/licenses/MIT).
