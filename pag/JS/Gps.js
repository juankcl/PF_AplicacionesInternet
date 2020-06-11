$(document).ready(function ()
{
    //Click al boton para pedir permisos
    $("#pedirvan").click(Ubicacion);
    $("#mostMapa").click(Mapa);
});

function Ubicacion()
{
    //Si el navegador soporta geolocalizacion
    if (!!navigator.geolocation)
    {
        //Pedimos los datos de geolocalizacion al navegador
        navigator.geolocation.getCurrentPosition
        (
                //Si el navegador entrega los datos de geolocalizacion los imprimimos
                function (position)
                {
                    window.alert("Latitud: " + position.coords.latitude);
                    window.alert("Longitud: " + position.coords.longitude);

                    //Aqui va el procedimiento para mandar a la base de datos
                },
                //Si no los entrega manda un alerta de error
                function ()
                {
                    window.alert("No se pudo obtener la ubicación");
                }
        );
    }
}

function Mapa()
{
    //Si el navegador soporta geolocalizacion
    if (!!navigator.geolocation)
    {
        //Pedimos los datos de geolocalizacion al navegador
        navigator.geolocation.getCurrentPosition
        (
                //Si el navegador entrega los datos de geolocalizacion los imprimimos
                function (position)
                {
                    var coords = {lat: position.coords.latitude,lng: position.coords.longitude};

                    var Map = new google.maps.Map(document.getElementById('mapa'),
                    {
                        zoom: 10,
                        center: coords
                    });

                    var Marker = new google.maps.Marker({
                        position: coords,
                        map: Map
                    });
                },
                //Si no los entrega manda un alerta de error
                function ()
                {
                    window.alert("nav no permitido");
                }
        );
    }
}