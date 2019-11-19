# AppBaches
Actualmente en Hermosillo como en la mayoría de los municipios del estado de Sonora, existe el problema de los baches en las vialidades. Además del problema presupuestal que esto representa para el municipio, existe otro relacionado con la falta de herramientas que permitan en tiempo real reportar la aparición de los baches a las autoridades. Es por esto, que nos hemos dado a la tarea de crear una aplicación móvil que permita a la ciudadanía en general reportar baches, la cual hemos denominado **AppBaches**. 

**AppBaches** es una aplicación móvil que permitirá a la ciudadanía hermosillense reportar el mal estado de las carreteras. En este caso, podrán reportar los baches que se encuentran en las calles de la ciudad de Hermosillo.
![logo](PicsArt_09-27-09.00.35.png)

**AppBaches Web Client** es un cliente web para administrar los reportes generados por la aplicacion, en ella puedes gestionar los reportes (ubicar los reportes en un mapa con graficos, cambiar el estatus del reporte y generar e imprimir un documento con los reportes) 

**Instalacion del cliente web** 

Para el cliente web puedes utilizar XAMPP, Laragon o cualquier otro software que te permita gestionar bases de datos mysql.

**Procedimiento** 

- clona (git clone https://github.com/jesuseedc/AppBaches-main.git), descarga el proyecto como zip o usa github desktop para clonar el proyecto

- agrega la carpeta con el proyecto appbaches-web a tu wamp, lamp o mamp

- importa la bd a tu software de gestion mysql (ej. phpmyadmin) y nombra "appbaches" a tu base de datos

- descarga la libreria fpdf http://fpdf.org/es/dl.php?v=181&f=zip, descomprime su contenido en una carpeta y nombra a la misma "pdf" 

- mueve la carpeta pdf a appbaches-web/views

- haz login con un usuario de tipo 'adm' y estaras listo para probar el proyecto

*Referencias* 
  1. [Ayuntamiento de Hermosillo Son.](https://www.hermosillo.gob.mx/entidades/?id=14)
  2. [UNIRADIO Noticias](https://www.uniradionoticias.com/noticias/hermosillo/572807/baches-en-tu-colonia-reportalos.html)
  3. [Marquesina.mx](http://marquesina.mx/52870/)

