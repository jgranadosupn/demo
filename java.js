function agregaMarcas(data, devices) {



    for (i = 0; i < data.length; i++) {

        var position = data[i];
        var deviceId = position.deviceId;
        var coordenada = position.latitude + position.latitude;
        var device = devices.find(function (device) {
            return device.id === position.deviceId
        });

        var naVehi = device.name;
        var placaVehi = device.placa;
        var colorVehi = device.color;
        var temperaturaac = device.temperatura;
        var sensor_temp = device.sensor_temperatura;
        var temp_min = device.temperatura_minima;
        var temp_max = device.temperatura_maxima;
        var temp_noti = device.notificaciones_sensor_temperatura;
        var usernameacc = device.username;

        //console.log(sensor_temp);


        //Marcadores segun sea el tipo de vehiculo.
        if (device.status == 'online') {
            //Antena gps
            $(".status-icono-" + deviceId).attr("src", base_url + "/thema/assets/img/dispositivos-accesorios/senalon.png");
            //$("#status-" + deviceId).html("GPRS");
            $("#status-" + deviceId).html("");

            //            iconMarker = L.icon({
            //                    iconUrl: '/thema/assets/img/iconos/online/verdef.png',
            //                    iconSize: [25, 35], // size of the icon
            //                    iconAnchor: [25, 35], // point of the icon which will correspond to marker's location
            //                    popupAnchor: [-3, -76] // point from which the popup should open relative to the iconAnchor
            //                });

            iconMarker = L.icon({
                iconUrl: '/thema/assets/img/iconos/online/verdef.png',
                iconSize: [20, 30], // size of the icon
                iconAnchor: [20, 30], // point of the icon which will correspond to marker's location
                popupAnchor: [-3, -76] // point from which the popup should open relative to the iconAnchor
            });

        } else if (device.status == 'offline') {
            //Antena gps
            $(".status-icono-" + deviceId).attr("src", base_url + "/thema/assets/img/dispositivos-accesorios/senaloff.png");
            //$("#status-" + deviceId).html("GPRS");
            $("#status-" + deviceId).html("");

            iconMarker = L.icon({
                iconUrl: '/thema/assets/img/iconos/offline/rojo.png',
                iconSize: [20, 30], // size of the icon
                iconAnchor: [20, 30], // point of the icon which will correspond to marker's location
                popupAnchor: [-3, -76] // point from which the popup should open relative to the iconAnchor
            });

        } else if (device.status == 'unknown') {
            //Antena gps
            $(".status-icono-" + deviceId).attr("src", base_url + "/thema/assets/img/dispositivos-accesorios/senaloff.png");
            //$("#status-" + deviceId).html(device.status);
            $("#status-" + deviceId).html("");

            iconMarker = L.icon({
                iconUrl: '/thema/assets/img/iconos/unknown/gris.png',
                iconSize: [20, 30], // size of the icon
                iconAnchor: [20, 30], // point of the icon which will correspond to marker's location
                popupAnchor: [-3, -76] // point from which the popup should open relative to the iconAnchor
            });
        }


        // Informacion de la Bateria
        if (position.attributes.batteryLevel) {
            if (position.attributes.batteryLevel >= 65) {
                var icobat = '<img src="/thema/assets/img/dispositivos-accesorios/bateria100.png" heigth="30px">'
            }
            if (position.attributes.batteryLevel <= 64) {
                var icobat = '<img src="/thema/assets/img/dispositivos-accesorios/bateria50.png" heigth="30px">'
            }
            if (position.attributes.batteryLevel <= 25) {
                var icobat = '<img src="/thema/assets/img/dispositivos-accesorios/bateria25.png" heigth="30px">'
            }
            $("#bateria-" + deviceId).html(position.batteryLevel + "%");
        } else {
            var icobat = '<img src="/thema/assets/img/dispositivos-accesorios/bateriano.png" heigth="30px">'
        }

        //Verificar si el vehiculo esta en movimiento

        if (position.attributes.motion == true) {
            //            iconMarker = L.icon({
            //                iconUrl: '/thema/assets/img/iconos/online/verdef.png',
            //                iconSize: [25, 35], // size of the icon
            //                iconAnchor: [25, 35], // point of the icon which will correspond to marker's location
            //                popupAnchor: [-3, -76] // point from which the popup should open relative to the iconAnchor
            //            });

            var icoMov = '<img src="/thema/assets/img/dispositivos-accesorios/movimiento.png" heigth="30px">';
            var icoMov2 = '<img src="/thema/assets/img/dispositivos-accesorios/movimiento.png" style="height: 8px; width: auto;"> Movimiento';
        } else {
            //            iconMarker = L.icon({
            //                    iconUrl: '/thema/assets/img/iconos/offline/rojo.png',
            //                    iconSize: [25, 35], // size of the icon
            //                    iconAnchor: [25, 35], // point of the icon which will correspond to marker's location
            //                    popupAnchor: [-3, -76] // point from which the popup should open relative to the iconAnchor
            //                });
            var icoMov = '<img src="/thema/assets/img/dispositivos-accesorios/detenido.png" heigth="30px">';
            var icoMov2 = '<img src="/thema/assets/img/dispositivos-accesorios/detenido.png" style="height: 8px; width: auto;"> Detenido';
        }

        if (position.attributes.motion) {
            $(".movimiento-icono-" + deviceId).attr("src", base_url + "/thema/assets/img/dispositivos-accesorios/movimiento.png");
        } else {
            $(".movimiento-icono-" + deviceId).attr("src", base_url + "/thema/assets/img/dispositivos-accesorios/detenido.png");
        }

        //popUp Content variables


        if (position.attributes.ignition == true) {
            var signalMo = '<img src="/thema/assets/img/dispositivos-accesorios/encendido.png" heigth="30px"> &nbsp;&nbsp;On';
        } else {
            var signalMo = '<img src="/thema/assets/img/dispositivos-accesorios/apagado.png" heigth="30px">  &nbsp;&nbsp;Off';
        }

        if (position.attributes.ignition) {
            $(".ignicion-icono-" + deviceId).attr("src", base_url + "/thema/assets/img/dispositivos-accesorios/encendido.png");
            $("#ignicion-" + deviceId).html("");
        } else {
            $(".ignicion-icono-" + deviceId).attr("src", base_url + "/thema/assets/img/dispositivos-accesorios/apagado.png");
            $("#ignicion-" + deviceId).html("");
        }


        var antenita = '<img src="/thema/assets/img/dispositivos-accesorios/senaloff.png" heigth="30px">  &nbsp;&nbsp;Off';
        var grados = position.course;

        if (grados >= 337.6 && grados <= 360 || grados >= 0 && grados <= 22.5) {
            //var flecha = '<img src="/thema/assets/img/dispositivos-accesorios/brujula/N.png" style="height: 30px; width: auto;">  &nbsp;&nbsp;N';
            var flecha = '<img src="/thema/assets/img/dispositivos-accesorios/brujula/N.png" style="height: 30px; width: auto;">';
        } else if (grados >= 22.6 && grados <= 67.5) {
            //var flecha = '<img src="/thema/assets/img/dispositivos-accesorios/brujula/NE.png" style="height: 30px; width: auto;">  &nbsp;&nbsp;NE ';
            var flecha = '<img src="/thema/assets/img/dispositivos-accesorios/brujula/NE.png" style="height: 30px; width: auto;">';
        } else if (grados >= 67.6 && grados <= 112.5) {
            //var flecha = '<img src="/thema/assets/img/dispositivos-accesorios/brujula/E.png" style="height: 30px; width: auto;">  &nbsp;&nbsp;E';
            var flecha = '<img src="/thema/assets/img/dispositivos-accesorios/brujula/E.png" style="height: 30px; width: auto;">';
        } else if (grados >= 112.6 && grados <= 157.5) {
            //var flecha = '<img src="/thema/assets/img/dispositivos-accesorios/brujula/SE.png" style="height: 30px; width: auto;">  &nbsp;&nbsp;SE';
            var flecha = '<img src="/thema/assets/img/dispositivos-accesorios/brujula/SE.png" style="height: 30px; width: auto;">';
        } else if (grados >= 157.6 && grados <= 202.5) {
            //var flecha = '<img src="/thema/assets/img/dispositivos-accesorios/brujula/S.png" style="height: 30px; width: auto;">  &nbsp;&nbsp;S';
            var flecha = '<img src="/thema/assets/img/dispositivos-accesorios/brujula/S.png" style="height: 30px; width: auto;">';
        } else if (grados >= 202.6 && grados <= 247.5) {
            //var flecha = '<img src="/thema/assets/img/dispositivos-accesorios/brujula/SO.png" style="height: 30px; width: auto;">  &nbsp;&nbsp;SO';
            var flecha = '<img src="/thema/assets/img/dispositivos-accesorios/brujula/SO.png" style="height: 30px; width: auto;">';
        } else if (grados >= 247.6 && grados <= 292.5) {
            //var flecha = '<img src="/thema/assets/img/dispositivos-accesorios/brujula/O.png" style="height: 30px; width: auto;">  &nbsp;&nbsp;O';
            var flecha = '<img src="/thema/assets/img/dispositivos-accesorios/brujula/O.png" style="height: 30px; width: auto;">';
        } else if (grados >= 292.6 && grados <= 337.5) {
            //var flecha = '<img src="/thema/assets/img/dispositivos-accesorios/brujula/NO.png" style="height: 30px; width: auto;">  &nbsp;&nbsp;NO';
            var flecha = '<img src="/thema/assets/img/dispositivos-accesorios/brujula/NO.png" style="height: 30px; width: auto;">';
        }

        var myid = deviceId;
        lat = position.latitude;
        long = position.longitude;
        markerId = 'mark-' + deviceId;
        var tDistancia = Math.round(totDist(position.attributes.totalDistance)) + ' km';
        var rapidez = Math.round(velKm(position.speed)) + ' km/h';

        var altitu = Math.round(velKm(position.altitude));

        if (position.address !== null) {
            var direction = position.address;
        } else {
            var direction = '';
        }

        var MyFech = new Date(position.deviceTime);
        var MyFechServidor = new Date(position.fixTime);
        var cords = '<a href="https://maps.google.com/maps?q=' + lat + ',' + long + '&amp;t=m" target="_blank">' + 'Lng: ' + long + '°, ' + 'Lat: ' + lat + ' °</a>';
        var fecha = MyFech.toLocaleDateString("es", optionsDates);


        $("#fecha-" + deviceId).html('&nbsp;' + fecha);
        $("#mylat" + deviceId).html('&nbsp;' + position.latitude);
        $("#mylong" + deviceId).html('&nbsp;' + position.longitude);
        $("#totalDist" + deviceId).html('&nbsp;' + Math.round(totDist(position.attributes.totalDistance)) + ' km');
        $("#caminando-" + deviceId).html('&nbsp;&nbsp;' + rapidez);
        $("#pila" + deviceId).html('&nbsp;&nbsp;&nbsp;' + icobat);
        $("#movi" + deviceId).html('&nbsp;&nbsp;&nbsp;' + icoMov);
        //$("#estGps"+ this.deviceId).html('&nbsp;&nbsp;&nbsp;'+);
        $("#motor" + deviceId).html('&nbsp;&nbsp;&nbsp;' + signalMo);
        $("#curso-" + deviceId).html('&nbsp;&nbsp;' + flecha);
        //$("#icon-" + deviceId).html(newico);
        $("#direccion" + deviceId).html('&nbsp;' + direction);
        $("#velocidad-" + deviceId).html(rapidez);
        $("#altitude-" + deviceId).html(altitu);
        $("#cords-" + deviceId).html('&nbsp;&nbsp;' + cords);

        //MenuTop
        var fechagps = MyFech.toLocaleDateString("es", optionsDates2);
        var fechaservidor = MyFechServidor.toLocaleDateString("es", optionsDates2);

        $("#tiempogps-" + deviceId).html('&nbsp;' + fechagps);
        $("#tiemposerver-" + deviceId).html('&nbsp;' + fechaservidor);

        $("#velocidadgps-" + deviceId).html('&nbsp;' + rapidez);
        $("#velocidadgrafica-" + deviceId).html('&nbsp;' + rapidez);

        //control velocidad para la grafica
        var rapidez2 = Math.round(velKm(position.speed));
        $("#velocidadGpsInput-" + deviceId).val(rapidez2);


        var latitudlongitud = '<a href="https://www.google.com/maps?q=' + position.latitude + ', ' + position.longitude + '&t=m" target="_blank">' + position.latitude + ' Â°, ' + position.longitude + ' Â°</a>';

        $("#ubicacionlatlon-" + deviceId).html('&nbsp;' + latitudlongitud);


        var us = $("#myusername").val();

        var variable = '' +
                '<div class="btn-group my_button">' +
                '<button class="btn btn-outline-secondary dropdown-toggle waves-effect waves-themed ni ni-map" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' +
                'Reportes' +
                '</button>' +
                '<div class="dropdown-menu">' +
                '<a class="dropdown-item" href="/site/reporte-rutas" target="_blank">Reporte de Ruta</a>' +
                '<a class="dropdown-item" href="/site/reportes" target="_blank">Reporte de Viajes</a>' +
                '<a class="dropdown-item" href="/site/reporte-paradas" target="_blank">Reporte de Paradas</a>' +
                '<a class="dropdown-item" href="/site/reporte-evento" target="_blank">Reporte de Eventos</a>' +
                '</div>' +
                '</div>' +
                '';




        var temp;
        var temperatura;
        if (position.attributes.io3) {



            if (sensor_temp == '0') {
                temperatura = position.attributes.io3 + " C";
            } else {
                var celsius = position.attributes.io3;
                temperatura = ((celsius * 9) / 5) + 32 + " F";
            }

            $("#sensortemp-" + deviceId).html('&nbsp;' + temperatura);


            //Alerta
            Temperatura(temperaturaac, sensor_temp, temp_min, temp_max, temp_noti, position.attributes.io3, naVehi);

            //           alert(position.attributes.io3);
            //           alert(fahrenheit + "F");

            temp = '        <tr>' +
                    '            <td><strong>Temperatura:</strong></td>' +
                    '            <td id="temperatura-' + myid + '">&nbsp;&nbsp;' + temperatura + '</td>' +
                    '        </tr>';
        } else {
            temp = '';
        }
        //botones linea
        var btn01 = '<button class="btn btn-xs btn-outline-secondary btn-pills waves-effect waves-themed" id="car-' + myid + '" type="button" onclick="followVehicle(this)">' + '<spam><i class="fal fa-radar"></i> Seguimiento</spam>' + '</button>';
        var btn02 = '<button class="btn btn-xs btn-outline-secondary btn-pills waves-effect waves-themed" onclick="window.open(\'/site/reporte-rapido?vehiculo=' + myid + '\', \'_blank\');">' + '<spam><i class="fal fa-radar"></i> Recorrido</spam></button>';
        var btn03 = '<button type="button" class="showModalButton btn btn-xs btn-outline-secondary btn-pills waves-effect waves-themed" value="/dispositivos/enviar-comando?vehiculo=' + myid + '" title="Name Action"><spam><i class="fal fa-radar"></i> Comandos</spam></button>';
        var btn04 = '<button class="btn btn-xs btn-outline-secondary btn-pills waves-effect waves-themed" onclick="window.open(\'/site/reporte-evento-rapido?vehiculo=' + myid + '\', \'_blank\');">' + '<spam><i class="fal fa-radar"></i> Eventos</spam></button>';
        //var btn04 = '<button type="button" class="showModalButton btn btn-xs btn-outline-info btn-pills waves-effect waves-themed" value="/dispositivos/detalles?vehiculo=' + myid + '" title="Name Action"><spam><i class="fal fa-radar"></i> Eventos</spam></button>';

        var tabPop =
                '<table cellspacing="5">' +
                '    <tbody>' +
                '        <tr>' +
                '            <td><strong>Vehiculo:</strong></td>' +
                '            <td id="nombre-' + myid + '">&nbsp;&nbsp;' + '<strong>' + naVehi.bold() + '</strong>' + '&nbsp;' + flecha + '</td>' +
                '        </tr>' +
                '           <tr>' +
                '            <td><strong>Cuenta:</strong></td>' +
                '            <td id="cuenta-' + myid + '">&nbsp;&nbsp;' + usernameacc + '</td>' +
                '        </tr>' +
                '        <tr>' +
                '            <td><strong>Dirección:</strong></td>' +
                '            <td id="direccion-' + myid + '">&nbsp;&nbsp;' + direction + '</td>' +
                '        </tr>' +
                '        <tr>' +
                '            <td><strong>Ubicación:</strong></td>' +
                '            <td id="cords-' + myid + '">&nbsp;&nbsp;' + cords + '</td>' +
                '        </tr>' +
                //'        <tr>' +
                //'            <td><strong>Altitude:</strong></td>' +
                //'            <td id="altitude-' + myid + '">&nbsp;&nbsp;' + altitu + '</td>' +
                //'        </tr>' +
                //'        <tr>' +
                //'            <td><strong>Sentido:</strong></td>' +
                //'            <td id="curso-' + myid + '">&nbsp;&nbsp;' + flecha + '</td>' +
                //'        </tr>' +
                '        <tr>' +
                '            <td><strong>Velocidad:</strong></td>' +
                '            <td id="caminando-' + myid + '">&nbsp;&nbsp;' + rapidez + '&nbsp;&nbsp;&nbsp;' + btn03 + '</td>' +
                '        </tr>' +
                '        <tr>' +
                '            <td><strong>Fecha y Hora:</strong></td>' +
                '            <td id="fecha-' + myid + '">&nbsp;&nbsp;' + fecha + '</td>' +
                '        </tr>' +
                temp +
                '        <tr>' +
                '            <td colspan="2">' +
                btn01 + btn02 + btn04 +
                '            </td>' +
                '        </tr>' +
                //                    '        <tr>' + 
                //                    '            <td><strong>Horas Motor:</strong></td>' + 
                //                    '            <td>5770 h 19 min 42 s</td>' + 
                //                    '        </tr>' + 
                '    </tbody>' +
                '</table>';


        //var lab_mar = naVehi+'<br>'+rapidez+' '+icoMov+' '+flecha;
        var lab_mar = naVehi;




        var OldMarker = '';
        $.each(markers.getLayers(), function () {
            if (this.options.id == markerId) {
                OldMarker = this;
            }
        });

        if ($("#chek-" + deviceId).is(':checked')) {
            if (OldMarker) {
                OldMarker.setLatLng([lat, long]).bindPopup('<div style="width: 300px">' + tabPop + '</div>', {maxWidth: 300});
                OldMarker.setRotationAngle(grados);
            } else {
                var myMarker = L.marker([lat, long], {id: markerId, icon: iconMarker, rotationAngle: grados});
                myMarker.bindPopup('<div style="width: 300px">' + tabPop + '</div>', {maxWidth: 300});
                myMarker.bindTooltip(lab_mar, {permanent: true, direction: 'right'});
                markers.addLayer(myMarker); // Agregar el marcador al objeto de agrupación de marcadores
            }

            polyline.addLatLng([lat, long]);
            polyline.snakeIn();
        }

        mymap.addLayer(markers); // Agregar el objeto de agrupación de marcadores al mapa en lugar de los marcadores directamente
    }


}
