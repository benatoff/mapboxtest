<?php

use function Livewire\Volt\{computed, state, mount, updated};

?>
<div>
    <link href="https://api.mapbox.com/mapbox-gl-js/v3.4.0/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v3.4.0/mapbox-gl.js"></script>
    <style>
        #map {
            height: 600px;
            /* width: 100%; */
        }
    </style>
    <div id="map" class="w-full"></div>
    <script>
        mapboxgl.accessToken = "{{ env('MAPBOX_TOKEN') }}";
        const map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v9',
            projection: 'globe',
            zoom: 12,
            center: [9.919535826421177, 49.79075468055614]
        });
        const markerPopupHTML = (house) => {
            return `<a href='/house/${house.house_id}'><img src="/storage/house.jpeg"></a>`
        }
        let markerMap = new Map()
        const createmarker = function(data) {
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
                        .setHTML(markerPopupHTML(house))
                    )
                markerMap.set(house.id, marker);
            })
        }
        document.addEventListener('alpine:init', () => {
            Alpine.data('mapdatakeyword', () => ({
                render: createmarker,
            }))
        })
    </script>

</div>