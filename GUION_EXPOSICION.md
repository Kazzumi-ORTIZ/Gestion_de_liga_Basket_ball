# Guion de Exposición — Gestión de Liga de Básquetbol

**Duración total estimada:** 7 minutos  
**Integrantes:** Herminia Ortiz Pachacute, Dante Nayhua Huaman, Huarayo Leon Ruben Jamyl

---

## Primera Parte — Herminia Ortiz Pachacute (~2 min)

### Presentación del proyecto

> "Hola, buenos días. Soy Herminia Ortiz y voy a presentarles el proyecto que hemos desarrollado para la gestión de una liga de básquetbol."

### Nombre del sistema

> "El sistema se llama **Gestión de Liga de Básquetbol** y está desarrollado en Laravel 13, que es la versión más reciente del framework."

### Problema que resuelve

> "En muchas ligas deportivas locales, la administración se hace de forma manual: se apuntan los equipos en hojas de cálculo, los resultados se anotan en papel y la tabla de clasificación se calcula a mano. Esto genera errores, pérdida de tiempo y falta de organización.
>
> Nuestro sistema resuelve este problema digitalizando todo el proceso: permite registrar equipos y jugadores, programar partidos con sus resultados, y lo más importante, calcula automáticamente la tabla de clasificación cada vez que se registra un resultado."

### Objetivo

> "El objetivo del proyecto es brindar una herramienta web fácil de usar que permita administrar una liga de básquetbol de principio a fin, desde el registro de equipos hasta la generación automática de la tabla de posiciones."

### Tecnologías utilizadas

> "Las tecnologías que utilizamos son:
>
> - **Laravel 13** como framework principal de PHP.
> - **MySQL** como base de datos relacional.
> - **Blade** como motor de plantillas.
> - **Tailwind CSS** para los estilos.
> - **Font Awesome** para los iconos.
> - **Laravel Breeze** para el sistema de autenticación.
> - Y **Vite** como empaquetador de recursos frontend."

### Arquitectura general

> "La aplicación sigue la arquitectura MVC de Laravel, que separa la lógica en tres capas:
>
> - **Modelos**: representan las entidades de la base de datos (Equipos, Jugadores, Partidos, Usuarios).
> - **Vistas**: archivos Blade que renderizan la interfaz de usuario.
> - **Controladores**: gestionan las peticiones HTTP y conectan los modelos con las vistas.
>
> El flujo es el siguiente: el usuario hace una petición desde su navegador, Laravel la enruta al controlador correspondiente, el controlador interactúa con el modelo para obtener o guardar datos, y finalmente devuelve una vista con la información."

### Estructura del proyecto

> "En cuanto a la estructura de carpetas, dentro de `app/Models` tenemos los cuatro modelos del sistema. En `app/Http/Controllers` están los controladores. Las vistas están organizadas en `resources/views` por cada módulo: teams, players, games, standings, auth, profile y layouts. Las rutas se definen en `routes/web.php` y `routes/auth.php`."

### Inicio de demostración

> "A continuación, mi compañero Dante va a hacer una demostración completa del funcionamiento del sistema."

---

## Segunda Parte — Dante Nayhua Huaman (~3 min)

### Inicio de sesión

> "Gracias, Herminia. Vamos a iniciar la demostración. Lo primero que vemos es la pantalla de inicio. Como pueden ver, en la parte superior hay un botón para iniciar sesión y otro para registrarse. Voy a hacer clic en 'Iniciar Sesión'."

*Mostrar pantalla de login*

> "Aquí ingreso mi correo electrónico y contraseña. Si no tuviera cuenta, podría registrarme desde el enlace 'Registrarse'. Una vez autenticado, ingresamos al sistema."

### Dashboard

> "Estamos en el **Dashboard** o panel principal. Aquí tenemos un resumen visual con cuatro tarjetas:
>
> - La primera muestra la cantidad de equipos registrados.
> - La segunda, los jugadores.
> - La tercera, los partidos totales y cuántos se han jugado.
> - La cuarta, la clasificación.
>
> En la parte inferior izquierda están los últimos partidos registrados. A la derecha, accesos directos para crear nuevo equipo, nuevo jugador o nuevo partido. También podemos navegar usando el menú lateral izquierdo."

### Módulo de Equipos

> "Voy a hacer clic en 'Equipos' en el menú. Aquí vemos el listado de equipos registrados. Podemos crear un nuevo equipo haciendo clic en 'Nuevo Equipo'."

*Mostrar formulario de creación*

> "El formulario pide nombre del equipo, ciudad y entrenador (opcional). Llenamos los datos y hacemos clic en 'Crear Equipo'. El sistema valida que el nombre sea único y que la ciudad sea obligatoria. Si todo está bien, redirige al listado con un mensaje de éxito.
>
> Cada equipo tiene botones para editar y eliminar. Al editar, se carga el formulario con los datos actuales. Al eliminar, pide confirmación antes de borrar."

### Módulo de Jugadores

> "Ahora vamos a 'Jugadores'. Aquí se listan todos los jugadores con su equipo, número de camiseta y posición. Las posiciones disponibles son: Base (PG), Escolta (SG), Alero (SF), Ala-Pívot (PF) y Pívot (C).
>
> Al crear un jugador, debemos seleccionar a qué equipo pertenece, gracias a la relación entre las tablas. Esto valida que el equipo exista en la base de datos. El sistema también permite editar y eliminar jugadores."

### Módulo de Partidos

> "Vamos a 'Partidos'. Aquí se muestran todos los partidos con el equipo local, visitante, fecha, marcador y estado. Podemos crear un nuevo partido seleccionando el equipo local y visitante (no pueden ser el mismo), y la fecha del encuentro."

*Mostrar creación de partido*

> "Una vez creado, aparece en la lista como 'Programado'. Para registrar el resultado, editamos el partido y llenamos los marcadores. También podemos cambiar el estado a 'Jugado' o 'Cancelado'."

### Tabla de Clasificación

> "Finalmente, vamos a 'Clasificación'. Esta es una de las funcionalidades más importantes. La tabla de clasificación se genera automáticamente. Podemos ver la posición de cada equipo, los partidos jugados, ganados, perdidos y los puntos acumulados.
>
> El sistema asigna **2 puntos por victoria** y **1 punto por derrota**, y ordena la tabla de mayor a menor puntaje. Esta vista es pública, cualquier persona puede verla sin necesidad de iniciar sesión."

### Cierre de demostración

> "Hemos visto todas las funcionalidades del sistema. A continuación, mi compañero Huarayo explicará la parte técnica del desarrollo."

---

## Tercera Parte — Huarayo Leon Ruben Jamyl (~2 min)

### Organización del proyecto

> "Gracias, Dante. Yo voy a explicar cómo está organizado el proyecto a nivel técnico."

### Carpetas importantes

> "El proyecto sigue la estructura estándar de Laravel. Las carpetas más importantes son:
>
> - `app/Models`: contiene los cuatro modelos del sistema: Team, Player, Game y User.
> - `app/Http/Controllers`: contiene los controladores, incluyendo TeamController, PlayerController, GameController, StandingsController y los controladores de autenticación generados por Breeze.
> - `resources/views`: contiene todas las plantillas Blade organizadas por módulo.
> - `routes/web.php` y `routes/auth.php`: contienen todas las rutas de la aplicación."

### Rutas

> "En `routes/web.php` tenemos las rutas principales. La ruta raíz '/' carga la vista welcome. La ruta '/clasificacion' es pública y llama a StandingsController. Luego, todas las rutas de equipos, jugadores y partidos están protegidas con el middleware 'auth'. Esto significa que solo los usuarios autenticados pueden acceder a los CRUDs.
>
> Las rutas de autenticación se importan desde `routes/auth.php`, que incluye registro, inicio de sesión, verificación de correo y recuperación de contraseña."

### Controladores

> "Los controladores implementan un CRUD completo para cada entidad. Por ejemplo, **TeamController** tiene los métodos index, create, store, show, edit, update y destroy. En el método store y update se hacen validaciones, como que el nombre del equipo sea único.
>
> El **GameController** tiene validaciones adicionales: el equipo local y visitante no pueden ser el mismo (regla 'different'), y el estado solo puede ser 'programado', 'jugado' o 'cancelado'."

### Modelos y relaciones

> "Los modelos definen las relaciones Eloquent. En **Team.php** tenemos:
>
> - `hasMany(Player::class)` — un equipo tiene muchos jugadores.
> - `hasMany(Game::class, 'home_team_id')` — un equipo tiene muchos partidos como local.
> - `hasMany(Game::class, 'away_team_id')` — un equipo tiene muchos partidos como visitante.
>
> En **Player.php** tenemos `belongsTo(Team::class)` — un jugador pertenece a un equipo.
>
> En **Game.php** tenemos dos relaciones `belongsTo`: una con Team como 'home_team_id' y otra como 'away_team_id'. Además, el modelo Game usa la tabla 'matches' mediante la propiedad `$table = 'matches'`."

### Migraciones

> "En migraciones tenemos 6 archivos. Las migraciones personalizadas son:
>
> - `create_teams_table.php`: tabla con id, name (único), city, coach (nullable), logo (nullable) y timestamps.
> - `create_players_table.php`: tabla con name, jersey_number, position, height (nullable), birth_date (nullable), team_id con clave foránea a teams y borrado en cascada.
> - `create_matches_table.php`: tabla con home_team_id y away_team_id como claves foráneas a teams, match_date, home_score y away_score (nullable), status como enum con valores 'programado', 'jugado', 'cancelado'."

### Base de datos

> "En producción usamos **MySQL** con una base de datos llamada `gestion_liga_basquetbol`. El esquema está configurado en el archivo `.env`."

### Lógica de clasificación

> "Un componente importante es el **StandingsController**. Este recorre todos los equipos, filtra los partidos con estado 'jugado', cuenta las victorias y derrotas, calcula los puntos (2 por ganar, 1 por perder) y ordena la tabla de mayor a menor puntaje. Todo se hace en memoria usando las colecciones de Laravel, sin necesidad de consultas SQL complejas."

### Flujo de una petición en Laravel

> "Para resumir el flujo: el navegador hace una petición a una URL, por ejemplo `/teams`. El archivo `routes/web.php` asocia esa ruta con el método `index` de TeamController. Laravel ejecuta el controlador, que consulta todos los equipos usando el modelo Team, y devuelve la vista `teams.index` con los datos. Finalmente, Blade renderiza el HTML que el usuario ve en su navegador."

### Conclusiones

> "En conclusión, el proyecto cumple con todos los objetivos planteados:
>
> - Sistema de autenticación completo con Laravel Breeze.
> - CRUD funcional para equipos, jugadores y partidos.
> - Tabla de clasificación automática.
> - Interfaz moderna, responsive y temática de básquetbol.
> - Relaciones entre tablas correctamente implementadas con Eloquent."

### Posibles mejoras

> "Como posibles mejoras futuras, se podría agregar subida de logos para los equipos, estadísticas avanzadas, exportación de reportes, roles de usuario o un calendario visual de partidos."

### Despedida

> "Muchas gracias por su atención. Este ha sido nuestro proyecto de Gestión de Liga de Básquetbol. ¿Alguna pregunta?"
