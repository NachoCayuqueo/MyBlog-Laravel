# Mi Blog en Laravel

<div style="text-align: center; margin-bottom:50px">
  <img src="public/images/My_Blog_logo.png" alt="Logo_Doggy_Friends">
</div>

Bienvenidos a **My Blog**, un proyecto de blog desarrollado con Laravel. Este proyecto permite a los usuarios crear, editar y comentar publicaciones en un entorno amigable.

## Descripción

My Blog es una aplicación web donde los usuarios pueden compartir sus ideas y opiniones a través de publicaciones. Los usuarios pueden ver publicaciones, dejar comentarios, tambien pueden crear y editar sus propias publicaciones.

## Tecnologías Utilizadas

-   **Laravel** v11
-   **PHP** v8.3.7
-   **Composer** v2.7.1
-   **TailwindCSS**
-   **SweetAlert2**

## Instalación

Sigue estos pasos para configurar el proyecto en tu máquina local:

1. **Clona el repositorio:**

    ```bash
    git clone git@github.com:NachoCayuqueo/MyBlog-Laravel.git
    ```

2. **Instala las dependencias:**

    ```bash
    composer install
    npm install
    ```

3. **Configura el archivo `.env`:**
   Copia el archivo `.env.example` y renómbralo a `.env`. Configura tus credenciales de base de datos y otras variables de entorno necesarias.

4. **Migra y llena la base de datos:**

    ```bash
    php artisan migrate --seed
    ```

5. **Compila los assets de la aplicación:**

    ```bash
    npm run dev
    ```

6. **Inicia el servidor de desarrollo:**

    ```bash
    php artisan serve
    ```

    Abre tu navegador y visita `http://127.0.0.1:8000`.

## Uso

Después de instalar y configurar el proyecto, puedes comenzar a usar la aplicación

## Créditos

-   [Cayuqueo, Nacho Emanuel](https://github.com/NachoCayuqueo) - Desarrollador Principal
