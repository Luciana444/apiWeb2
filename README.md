Esta documentacion de la Api videojuegos ofrece una descripcion detallada de los metodos disponibles, con ejemplos de las respuestas que se obtienen si la utilizamos de manera correcta e incorrecta.
Todas las respuestas son devueltas en formato JSON.
El recurso de esta Api es videojuegos.

Endpoints

Verbo GET
http://localhost/apiWeb2/api/videojuegos

Con esta url recibiremos todos los recursos que se encuentran en la base de datos en formato Json (se espera un codigo 200).
En caso de que la base de datos se encuentre vacia, se espera un codigo de respuesta 400 con un mensaje que indique que no se encontraron videojuegos

http://localhost/apiWeb2/api/videojuegos/:id

Con esta url recibiremos un videojuego especifico indicando el id del mismo que deseamos traernos, este mismo vendra en formato Json con un codigo de respuesta 200, en caso de ingresar un id no existente, se espera un codigo de respuesta 404 con un mensaje que indique que el videojuego con ese id no existe.
por otra parte si se intenta ingresar una letra en vez de un numero para indicar el id se espera un codigo de respuesta 404 con un mensaje pidiendo que se ingrese un id valido de tipo numero

Verbo Delete
http://localhost/apiWeb2/api/videojuegos/:id

Con esta url indicaremos que videojuego especifico deseamos eliminar indicando su id, si el videojuego con el id escrito existe se devoldera un codigo de respuesta 200 y se mostrar el Json del videojuego eliminado con un mensaje de borrado exitoso, de lo contrario si el id indicado no existe se espera un codigo de respuesta 404 con un mensaje que indica que no hay ningun videojuego existente con ese id.
Por su parte si se intenta ingresar una letra en vez de un numero para indicar el id, se espera un codigo de respuesta 404 con un mensaje pidiendo que se ingrese un id valido de tipo numero

Verbo Post
http://localhost/apiWeb2/api/videojuegos
Con esta url se podra crear un videojuego, para ello se tendra que escribir el Json completo en el body del videojuego que se quiera agregar, indicando todos sus campos y atributos, obtendremos un codigo de respues 201 con un mensaje de creado exitoso y se mostrara el Json enviado, si alguno de los campos no fueron indicados en el Json a mandar, se espera un codigo de respuesta 404 indicando que se completen todos los campos.
Por su parte si se intenta mandar un tipo string en campos de tipo numero se espera un codigo de respuesta 404 con un mensaje que avisa ese error de tipos.

Verbo Put
http://localhost/apiWeb2/api/videojuegos/:id
Con esta url se podra editar un videojuego para ello se tendra que indicar el id del videojuego que se desea editar y en el body armar un Json con todos los campos y los atributos, si todo esta correcto se espera un codigo de respuesta 200 con un mensaje de editado exitoso, si se ingresa un id no existente se obtendra un 404 cuatro indicando con un mensaje que el videojuego que desea editar no esxiste.
En el caso de no completar todos los campos del Json se espera un codigo de respuesta 404 con un mensaje indicando que se completen todos los campos.
Ademas si se intenta mandar un tipo string en campos de tipo numero se espera un codigo de respuesta 404 con un mensaje que avisa ese error de tipos.
Tambien si se intenta ingresar una letra en vez de un numero para indicar el id se espera un codigo de respuesta 404 con un mensaje pidiendo que se ingrese un id valido de tipo numero

Por ultimo con el verbo GET tambien podremos indicar en la url por que columna deseamos ordenar y en que orden
http://localhost/apiWeb2/api/videojuegos?ordenarPor="nombre de la columna que se quiera ordenar"&orden="si queremos que sea ASC o DESC"

ejemplo: http://localhost/apiWeb2/api/videojuegos?ordenarPor=descripcion&orden=DESC

Si todo esta correctamente escrito y especificado con campos existentes, se espera un codigo de respuesta 200 y se mostraran los Json de todos los videojuegos por la columna que se pidio ordenar y en el orden indicado, con esto se espera un codigo de respuesta 200, en el caso de escribir mal los parametros "ordenarPor" y "orden" o que falte alguno se espera un codigo de respuesta 404 con un mensaje que indica que se deben de mandar ambos campos.



