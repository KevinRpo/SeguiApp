
	mapboxgl.accessToken = 'pk.eyJ1IjoiMTAwMDg4OTExMCIsImEiOiJjazd3YW5qbDMwMDc2M2psbmw1YWZoZW83In0.rOmqScX0s9aSaV1RhS_9Ng';
    var map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v11',
        center: [-75.545404, 6.273314 ],
        zoom: 13
    });

    map.addControl(
        new mapboxgl.GeolocateControl({
        positionOptions: {
        enableHighAccuracy: false
        },
        trackUserLocation: false
        })
        );
//acceso a las rutas//
        map.addControl(
            new MapboxDirections({
                language: 'de-ES',
            accessToken: mapboxgl.accessToken,
            mapboxgl: mapboxgl
            }),
            'top-left'
            );

//botones de acercar//
            map.addControl(new mapboxgl.NavigationControl(), 'top-right' );


    var geocoder = new MapboxGeocoder({
        accessToken: mapboxgl.accessToken,
        mapboxgl: mapboxgl
    });

    document.getElementById('geocoder').appendChild(geocoder.onAdd(map));
