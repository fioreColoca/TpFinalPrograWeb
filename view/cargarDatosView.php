{{> header}}

<main class="cuerpoindex">

    <div class="container text-center">
        <h2 class="titulosindex">Reporte</h2>
        <hr>
        <form action="/reporte/guardarCosteo/idViaje={{idViaje}}" method="post" enctype="multipart/form-data" class="mt-3">
                    <div class="text-left">
                        <div class="form-row mt-4 mb-3">
                            <div class="col">
                                <p>Presione el boton para agregar las coordenadas a traves del navegador</p>
                                <button type=button class="btn btn-outline-info" onclick="getLocation()">Obtener</button>
                                <br>
                                <input type="hidden" id="idLatitud" required name="latitud">
                                <input type="hidden" id="idLongitud" required name="longitud">
                                <p id="resultado"></p>
                                <div class="container text-center mb-4">
                                    <div style="width: 460px; height: 300px" id="map"></div>
                                </div>
                                <label for="kilometros">Kilometros</label>
                                <input type="number" class="form-control" style="margin-bottom: 2%"
                                       placeholder="Kilometros"
                                       required name="kilometros">

                                <label for="combustible">Combustible</label>
                                <input type="number" class="form-control" style="margin-bottom: 2%"
                                       placeholder="Combustible"
                                       required name="combustible">

                                <label for="horaSalida">Tiempo estimado de salida</label>
                                <input type="time" class="form-control" style="margin-bottom: 2%"
                                       placeholder="ETD"
                                       required name="horaSalida">

                                <label for="horaLlegada">Tiempo estimado de llegada</label>
                                <input type="time" class="form-control" style="margin-bottom: 2%"
                                       placeholder="ETA"
                                       required name="horaLlegada">

                                <label for="viaticos">Viaticos</label>
                                <input type="number" class="form-control" style="margin-bottom: 2%"
                                       placeholder="Viaticos"
                                       required name="viaticos">

                                <label for="peajes">Peajes y pesajes</label>
                                <input type="number" class="form-control" style="margin-bottom: 2%"
                                       placeholder="Peajes y Pesajes"
                                       required name="peajes">

                                <label for="extras">Extras</label>
                                <input type="number" class="form-control" style="margin-bottom: 2%"
                                       placeholder="Extras"
                                       required name="extras">

                                <label for="hazardClass">Hazard</label>
                                <select id="hazardClass" name="hazardClass" class="form-control"
                                        style="margin-bottom: 2%">
                                    <option value="" selected>Clases - Descripcion</option>
                                    {{#imoClases}}
                                    <option value="{{clase}}">{{clase}} - {{descripcion}}</option>
                                    {{/imoClases}}
                                </select>

                                <label for="reeferCosto">Reefer</label>
                                <input type="number" class="form-control" style="margin-bottom: 2%"
                                       placeholder="Reefer"
                                       required name="reeferCosto">

                                <label for="fee">Fee</label>
                                <input type="number" class="form-control" style="margin-bottom: 2%"
                                       placeholder="Fee"
                                       required name="fee">

                                <button type="submit" class="btn btn-block btn-dark mt-5">Enviar Reporte</button>
                            </div>
                        </div>
                    </div>
                </div>
    </form>
    </div>
</main>

<script>

    var x = document.getElementById("resultado");

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition, showError);
        } else {
            x.innerHTML = "La Geolocalizacion no esta soportada en este browser.";
        }
    }

    function showPosition(position) {
        var inputLatitud = document.getElementById("idLatitud");
        inputLatitud.value = position.coords.latitude;
        var inputLongitud = document.getElementById("idLongitud");
        inputLongitud.value = position.coords.longitude;
        iniciarMap(position.coords.latitude, position.coords.longitude);
    }

    function showError(error) {
        switch (error.code) {
            case error.PERMISSION_DENIED:
                x.innerHTML = "El Usuario a denegado el acceso a la Geolocalizacion."
                break;
            case error.POSITION_UNAVAILABLE:
                x.innerHTML = "La Informacion no esta disponible."
                break;
            case error.TIMEOUT:
                x.innerHTML = "Time Out."
                break;
            case error.UNKNOWN_ERROR:
                x.innerHTML = "Error desconocido."
                break;
        }
    }

    function iniciarMap(x, y){
        var coord = {lat: x ,lng: y};
        var map = new google.maps.Map(document.getElementById('map'),{
            zoom: 10,
            center: coord
        });
        var marker = new google.maps.Marker({
            position: coord,
            map: map
        });
    }

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDaeWicvigtP9xPv919E-RNoxfvC-Hqik&callback=iniciarMap"></script>

<script>
/*
    var x = document.getElementById("resultado");

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition, showError);
        } else {
            x.innerHTML = "La Geolocalizacion no esta soportada en este browser.";
        }
    }

    function showPosition(position) {
        var inputLatitud = document.getElementById("idLatitud");
        inputLatitud.value = position.coords.latitude;
        var inputLongitud = document.getElementById("idLongitud");
        inputLongitud.value = position.coords.longitude;
        loadMap(position.coords.latitude, position.coords.longitude);
    }

    function showError(error) {
        switch (error.code) {
            case error.PERMISSION_DENIED:
                x.innerHTML = "El Usuario a denegado el acceso a la Geolocalizacion."
                break;
            case error.POSITION_UNAVAILABLE:
                x.innerHTML = "La Informacion no esta disponible."
                break;
            case error.TIMEOUT:
                x.innerHTML = "Time Out."
                break;
            case error.UNKNOWN_ERROR:
                x.innerHTML = "Error desconocido."
                break;
        }
    }

    function loadMap(y, x) {

        var platform = new H.service.Platform({
            'app_id': 'urmTFThQRs4F3dmHX2as',
            'app_code': 'XXNfTdj2E7O_Tl3rKK70FQ'
        });

        var maptypes = platform.createDefaultLayers();

        var map = new H.Map(
            document.getElementById('mapContainer'),
            maptypes.normal.map,
            {
                zoom: 16,
                center: {lng: x, lat: y}
            });
    }
*/
</script>

{{> footer}}