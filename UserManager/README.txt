PROYECTO 3 – USERMANAGER
Aplicaciones Web

--------------------------------------------------
REQUISITOS
--------------------------------------------------
- Servidor web con PHP 
- MySQL
- Navegador web

--------------------------------------------------
INSTALACIÓN
--------------------------------------------------
1. Copiar la carpeta del proyecto "UserManager"

2. Crear la base de datos y la tabla ejecutando el archivo:
   users.sql

3. Configurar la conexión a la base de datos en:
   /includes/db.php
   (usuario, contraseña y nombre de la base de datos)

--------------------------------------------------
USO DE LA APLICACIÓN
--------------------------------------------------
1. Crear el primer usuario administrador manualmente desde la base de datos.
   Este usuario será el encargado de gestionar el resto de usuarios.

2. Acceder a la aplicación desde:
   http://localhost/UserManager/

3. Iniciar sesión con un usuario existente.

4. Según el rol:
   - Usuario normal: acceso al dashboard
   - Administrador: acceso al panel de gestión de usuarios (CRUD)

--------------------------------------------------
AUTOR
--------------------------------------------------
Nombre del alumno: Gabriel Catalin Voicu
Ciclo: Grado Medio SMR
Asignatura: Aplicaciones Web
