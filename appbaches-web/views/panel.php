<!DOCTYPE html >
<html lang="en">
  <head>
    <meta charset = "utf-8">
    <meta name="viewport" content="initial-scale=1.0, width=device-width"/>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <title>Bienvenido a AppBaches Web</title>
    <link rel = "stylesheet" href = "panel.css"/>
    <meta http-equiv="refresh" content="10"/>
    <script src = "http://localhost/appbaches-web/etc/xml_parser.php"></script>
  </head>

  <body>
    <div id="menu">
      <ul>
        <li><b>Bienvenido</b> <?php echo $user->getNombre();  ?></li>
        <li class="buttons"><a href="include/logout.php">Cerrar sesion&nbsp;&nbsp;&nbsp;</a><a href="views/mgmt_reportes.php">Administrar reportes</a></li>
      </ul>
    </div>

    <div id="map"></div>

    <script>

      var customLabel = {
        restaurant: {
          label: 'R'
        },
        bar: {
          label: 'B'
        }
      };

        function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(29.0844527, -110.9646707,17),
          zoom: 12
        });
        var infoWindow = new google.maps.InfoWindow;

          // Leer XML
          downloadUrl('http://localhost/appbaches-web/etc/reportes_new.xml', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
              var id = markerElem.getAttribute('id');
              var fecha = markerElem.getAttribute('fecha');
              var estatus = markerElem.getAttribute('estatus');
              var id_user = markerElem.getAttribute('id_user');
              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('latitud')),
                  parseFloat(markerElem.getAttribute('longitud')));
              var diraprox = markerElem.getAttribute('dir_aprox');

              var infowincontent = document.createElement('div');
              var strong = document.createElement('strong');
              strong.textContent = fecha;
              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.textContent = 'Creado por: ' + id_user;
              infowincontent.appendChild(text);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.textContent = 'Direccion aproximada: ' + diraprox;
              infowincontent.appendChild(text);
              infowincontent.appendChild(document.createElement('br'));              


              var icon = customLabel[id_user] || {};

              if(estatus == 1){
                var contentString_r = 'ID del reporte: ' + id;
                var text = document.createElement('text');
                text.textContent = contentString_r;
                infowincontent.appendChild(text);
                infowincontent.appendChild(document.createElement('br'));

                var strong = document.createElement('strong');
                strong.textContent = '¡Caso resuelto!';
                infowincontent.appendChild(strong);
                infowincontent.appendChild(document.createElement('br'))

                var marker = new google.maps.Marker({
                  map: map,
                  position: point,
                  label: icon.label,
                  icon: {
                    url: "http://localhost/appbaches-web/etc/media/green-dot.png"
                  }
                });
              }

              if(estatus == 2){
                var contentString_r = 'ID del reporte: ' + id;
                var text = document.createElement('text');
                text.textContent = contentString_r;
                infowincontent.appendChild(text);
                infowincontent.appendChild(document.createElement('br'));

                var strong = document.createElement('strong');
                strong.textContent = 'Caso en proceso.';
                infowincontent.appendChild(strong);
                infowincontent.appendChild(document.createElement('br'));

                var marker = new google.maps.Marker({
                  map: map,
                  position: point,
                  label: icon.label,
                  icon: {
                    url: "http://localhost/appbaches-web/etc/media/yellow-dot.png"
                  }
                });
              }

              if(estatus == 3){
                var contentString_r = 'ID del reporte: ' + id;
                var text = document.createElement('text');
                text.textContent = contentString_r;
                infowincontent.appendChild(text);
                infowincontent.appendChild(document.createElement('br'));

                var strong = document.createElement('strong');
                strong.textContent = 'Caso sin revisar.';
                infowincontent.appendChild(strong);
                infowincontent.appendChild(document.createElement('br'))
                var marker = new google.maps.Marker({
                  map: map,
                  position: point,
                  label: icon.label,
                  icon: {
                    url: "http://localhost/appbaches-web/etc/media/red-dot.png"
                  }
                });
              }

              marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
              });
            });
          });
        }



      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }

      function doNothing() {}
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC98pnjZkySWsG3tj98asFpCTbFiAB8X1g&callback=initMap">
    </script>
  </body>
</html>
