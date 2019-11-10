# Libros
En este tutorial hablaremos de nuestro sistema de gestión de una biblioteca para crear nuestra base de datos hemos usado la base de datos mysql, lenguaje de programación php y creamos nuestro diagrama de entidad relación con el programa Sql Power Architect, entorno de desarrollo netbeans ide 8, con estas herramientas pudimos crear varios movimientos que requiere un sistema para una biblioteca, el sistema cuenta con restricciones en la base de datos, triggers, constrains y validaciones en las páginas, se ha utilizado JavaScript y css los lenguajes de programación de las paginas web hemos utilizado el tipo de conexión pdo para poder conectar, consultar, insertar y eliminar datos

Formulario Menú Inicio del sistema
Desde este formulario se podrá acceder a los principales movimientos de nuestro sistema bibliotecas, para ello debes posicionarte sobre los nombres del movimiento que quieras abrir con un click y accederás inmediatamente a cualquier movimiento.
Formulario de registro de libros
Si te posicionas sobre registrar libros podrás acceder al formulario registro de libros desde donde podrás registrar nuevo libro eliminar modificar o buscar un libro, podrás volver al menú inicio si lo deseas. Botón Registrar libro: Con este botón al dar click sobre él se desplegara un modal en donde podrás ingresar un nuevo libro que ingresara a stock en los campos de textos se te pedirá que ingrese datos validos podrás registrar un libro una sola vez, se te pedirá una confirmación antes de registrar el nuevo libro. Campo de texto buscar libro: En este campo de texto podrás ingresar cualquier dato del libro que quieras buscar y se filtrara en la tabla de consulta. Botón editar: Al seleccionar este botón que se encuentra en la tabla de consulta se desplegara un modal donde podrás editar cualquier dato del libro que quieras actualizar, debes ingresar datos validos antes de registrar la edición. Botón eliminar: Con este botón que se encuentra en la tabla de consulta del libro podrás eliminar un libro también se te pedirá mediante un mensaje de confirmación la eliminación del registro.
Formulario de Registro de lectores
Si te posicionas sobre registrar lector podrás acceder al formulario registro de lectores desde donde podrás registrar nuevo lector eliminar modificar o buscar un lector, podrás volver al menú inicio si lo deseas. Botón Registrar lector: Con este botón al dar click sobre él se desplegara un modal en donde podrás ingresar un nuevo lector en el sistema en los campos de textos se te pedirá que ingrese datos validos podrás registrar un lector una sola vez, se te pedirá una confirmación antes de registrar el nuevo lector. Campo de texto buscar lector: En este campo de texto podrás ingresar cualquier dato del lector que quieras buscar y se filtrara en la tabla de consulta. Botón editar: Al seleccionar este botón que se encuentra en la tabla de consulta se desplegara un modal donde podrás editar cualquier dato del lector que quieras actualizar, debes ingresar datos validos antes de registrar la edición. Botón eliminar: Con este botón que se encuentra en la tabla de consulta de lectores podrás eliminar un lector también se te pedirá mediante un mensaje de confirmación la eliminación del registro.
Formulario Registrar Prestamos
Si te posicionas sobre registrar préstamo podrás acceder al formulario registro de préstamo desde donde podrás registrar nuevo préstamo podrás registrar varios prestamos, desde este formulario puedes acceder a las consultas de préstamos y devoluciones puedes volver al menú inicio si lo deseas. Combo Buscar lector: Al seleccionar un lector se desplegara una lista en donde podrás buscar todos los lectores que se encuentran inscriptos y poder utilizarlo para el préstamo a realizarse. Combo buscar libros: Con este botón podrás buscar los libros para realizar el préstamo antes debes posicionarte sobre el combo y se desplegara una lista de los libros a buscar después de seleccionar el libro a prestar deberás presionar el botón más que se encuentra en la tabla detalle para que se cargue en el detalle, podrás buscar uno o más libros para prestar, se te pedirá ingresar las cantidades antes de insertar podrás ver en la tabla detalle las cantidades, precios y existencia del libro. Botón Insertar: Con este botón al dar click sobre él se desplegara un mensaje donde deberás confirmar antes de registrar el nuevo préstamo debes ingresar todos los datos fecha, lector y libro antes de insertar de lo contrario no se podrá insertar el registro, al registrar un préstamo se descontara de nuestro stock el libro prestado.
Formulario Registro de Devoluciones
Si te posicionas sobre registrar devolución desde el menú inicio podrás acceder al formulario registro de devolución desde donde podrás buscar y filtrar un préstamo podrás registrar una devolucion, desde la consulta con el botón registrar devolución, al dar click sobre registrar devolucion desde la consulta se desplegará un detalle del préstamo listo para ser devuelto, desde este formulario también puedes acceder a las consultas de préstamos y devoluciones puedes volver al menú inicio si lo deseas. Botón Registrar Devolución: Con este botón al dar click sobre él se desplegara un mensaje donde deberás confirmar antes de registrar la nueva devolucion solo debes ingresar la fecha de devolución antes de insertar la devolucion se registrara na sola vez al registrar la devolucion la cantidad del libro volverá a ingresar a stock.
Formulario Consulta de Prestamos
Si te posicionas sobre el botón consultar prestamos desde el menú inicio accederás al formulario consulta de préstamos pendientes de devolucion, donde veras los préstamos que están aún pendientes de devolucion, desde este formulario podrás registrar una devolucion filtrar datos e imprimir un préstamo realizado, tienes la opción de volver al inicio si lo deseas