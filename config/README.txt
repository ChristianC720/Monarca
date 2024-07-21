-----------------------------------------------------------------------

IMPORTAR BASE DE DATOS:
Para importar la base de datos en XAMPP con phpMyAdmin, primero creo una base de datos llamada monarca, dentro de la bd vas a la opción en la barra superior y le das a Importar, seleccionas el archivo monarca.sql y le das a continuar.
Con eso tendrías importada la estructura de la BD lista.

-----------------------------------------------------------------------

CONFIGBD.PHP:
Dentro de este archivo se encuentra la configuración para acceder a la BD de monarca, la conexión se encuentra de la siguiente manera:

$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

Asumiendo que estas corriendo de manera local XAMPP con phpMyAdmin, las credenciales son las siguientes:
Servidor:       localhost
Usuario:        user
Contraseña:     password
Base de Datos:  monarca
Para crear un nuevo usuario en phpMyAdmin, simplemente ve al inicio de este y en la barra superior dirígete a Cuentas de usuarios, luego agrega una nueva cuenta con nombre de usuario 'user' y contraseña 'password', y en la parte de privilegios selecciona el recuadro de Datos.

-----------------------------------------------------------------------

USO CORRECTO DE CONFIGBD.PHP:
Para utilizar el archivo de configuración de la BD, simplemente añade lo siguiente a tu código php:

require_once "config/configbd.php";
mysqli_set_charset($link,"utf8");

Dependiendo igual del directorio de donde se encuentra tu archivo, modifica el código de acuerdo a tus necesidades.
----------------------
Para realizar un query a MySQL añade lo siguiente:

##Ejemplo 1##
$sql= " UPDATE libros SET isbn = '$isbn', nombre = '$name', autor = '$author', precio = '$price', editorial = '$publisher' WHERE id = '$id' ";
$resultado = mysqli_query($link, $sql);

Este Query actualiza datos ya escritos dentro de la tabla libros, especificando el id del registro a actualizar.
----------------------
##Ejemplo 2##
$sql= " INSERT INTO libros (isbn, nombre, autor, precio, editorial, imagen) VALUES ('$isbn', '$name', '$author', '$price', '$publisher', '$image') ";
$resultado = mysqli_query($link, $sql);

Este Query realiza un nuevo registro dentro de la tabla libros.
----------------------
##Ejemplo 3##
$sql = "DELETE FROM libros where id='$id'";
$result = mysqli_query($link, $sql);

Este Query elimina un registro dentro de la tabla libros, especificando el id del registro.

-----------------------------------------------------------------------
