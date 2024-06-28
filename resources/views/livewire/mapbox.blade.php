<?php

use function Livewire\Volt\{computed, state, mount, updated};

?>
<div>
    <link href="https://api.mapbox.com/mapbox-gl-js/v3.4.0/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v3.4.0/mapbox-gl.js"></script>
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        #map {
            height: 600px;
            width: 100%;
        }
    </style>
    <div id="map" class="mapboxgl-map"></div>
    <script>
        mapboxgl.accessToken = "{{ env('MAPBOX_TOKEN') }}";
        const map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v9',
            projection: 'globe', // Display the map as a globe, since satellite-v9 defaults to Mercator
            zoom: 12,
            center: [9.919535826421177, 49.79075468055614]
        });
        const getHTML = (house) => {
            console.log(house)
            return "<p style='color:black'>Hello World</p>"
        }
        let markerMap = new Map()
        const createmarker = function(data) {
            console.log(data)
            // const houses = JSON.parse(data)
            const houses = data
            markerMap.forEach((marker, key) => {
                marker.remove()
            })
            markerMap = new Map()
            houses.forEach((house) => {
                const marker = new mapboxgl.Marker()
                    .setLngLat([house.laengengrad, house.breitengrad])
                    .addTo(map)
                    .setPopup(new mapboxgl.Popup()
                        .setHTML(getHTML(house))
                    )
                markerMap.set(house.id, marker);
            })
        }

        const marker = new mapboxgl.Marker({
                draggable: true,
            })
            .setLngLat([9.919535826421177, 49.79075468055614])
            .addTo(map)
            .setPopup(new mapboxgl.Popup().setHTML("<h1>Hello World!</h1>"))
        document.addEventListener('alpine:init', () => {
            Alpine.data('mapdatakeyword', () => ({
                render: createmarker,
                init() {
                    // console.log('init is running')
                }
            }))
        })
    </script>

</div>