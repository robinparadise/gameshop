# Examen de Gameshop


**Instrucciones:**
- Este examen consta de varias tareas relacionadas con la creación de un sitio web llamado Gameshop.
- Lee cuidadosamente cada tarea y sigue las instrucciones proporcionadas.
- Puedes utilizar HTML, CSS, JavaScript y PHP para completar el examen.
- Se te evaluará tanto por la precisión como por la calidad de tu código.
- ¡Buena suerte!

---

**Configuración:** Configuración de la base de datos

Crea la base de datos `gameshop` con una tabla `games` que tenga los siguientes campos:
- id (int)
- title (varchar)
- category (varchar)
- description (text)
- image (varchar)

Asegúrate de que la función `populateData();` en `config.php` esté descomentada para añadir datos a la base de datos. Luego, recuerda volver a comentarla. Además, asegúrate de introducir tu usuario y contraseña de MySQL en `config.php`.

---

**Tarea 1 (3 puntos):** Página de `games`.


Crea una página llamada `index.php` que utilice un grid con cards de Bootstrap para mostrar los artículos de la tabla `games`. Cada card debe mostrar el **título**, la **categoría** y la **imagen** del artículo.

Se valorará:
- La capacidad de hacer el grid responsive.
- El uso de componentes de Bootstrap para el diseño.
- Guarda en `/components` los componentes que se repiten en las páginas. Usa los componentes `card.php`, `grid.php`
- Recomendación: Al menos 3 productos por fila en desktop y 1 en mobile.

---

**Tarea 2 (3 puntos):** Favoritos.

La página `favourites.php` debe contener:

- Usando la sessión de PHP, añade un botón a las cards de los artículos para añadir un juego a la lista de favoritos. Usa el campo `id` de la tabla `games` para identificar cada juego.
- Recuerda usar `$_SESSION` para guardar los juegos favoritos.
- Añade un botón para eliminar un juego favorito de la card.
- Un grid que muestre los juegos favoritos. Cada card debe mostrar el título y la categoría del juego.

---

**Tarea 3 (2 puntos):** Modal

Crea un modal que se abra al hacer clic en una card de los artículos.

- El modal debe de mostrar en orden: el **título**, la **categoría** y la **imagen** del artículo.
- Muestra la categoría en un elemento de tipo `badge`: https://getbootstrap.com/docs/5.3/components/badge/#background-colors

---

**Tarea 4.a (3 puntos):** Gráfica

Muestra una gráfica de tarta `pie` que muestre la cantidad de favoritos vs total de juegos.

- La gráfica debe estar en la página `pie.php`.
- Utiliza Chartist.js para crear la gráfica.
- Guarda los datos de la gráfica en un array de PHP y pásalos a JavaScript.
- Usa la function `total` y la funcion `totalFavourites` para obtener los datos.


---

**Tarea 4.b (3 puntos):** Pdf

Crea un botón en la página `index.php` para descargar un PDF con la lista de juegos.

- Utiliza la librería `jsPdf` para generar el PDF.
- Guarda el PDF con el nombre `gameshop.pdf`

---

**Entrega:**

1. Sube tu código a un repositorio de GitHub [opcional].
2. Envía el enlace de tu repositorio a `robinchogiles@gmail.com`
3. Renombra la carpeta y comprímela en un archivo `.zip` con tu nombre y apellido.



**Puntuación total: 10 puntos**

¡Buena suerte!