<template>
    <div>
        <div>loaded</div>
        <div id="map">
            <VMap 
            class="w-full h-96 mapboxgl-map"
            :options="state.map" 
            @load="onMapLoaded" @loaded="onMapLoaded"/>
        </div>
    </div>
    <!-- <VMap :accessToken="accessToken" :mapStyle="mapStyle" /> -->
  </template>
  
<script>
import 'mapbox-gl/dist/mapbox-gl.css'
import mapbox from "mapbox-gl";
import { VMap } from "v-mapbox";
import { reactive } from "vue";

export default {
components: {
    VMap
},
data() {
    const createmarker = ()=>{
        console.log('createmarker')
    }
    // document.addEventListener('alpine:init', () => {
    //     Alpine.data('mapdatakeyword', () => ({
    //         render: createmarker,
    //         init() {
    //             // console.log('init is running')
    //         }
    //     }))
    // })
    const state = reactive({
      map: {
        accessToken:ACCESSTOKEN,
        // style: "mapbox://styles/mapbox/streets-v11?optimize=true",
        style:{
            "version": 8,
            "name": "Meteorites",
            "metadata": {
                "mapbox:origin": "basic-template-v1",
                "mapbox:autocomposite": true,
                "mapbox:type": "template",
                "mapbox:sdk-support": {
                "js": "0.45.0",
                "android": "6.0.0",
                "ios": "4.0.0"
                }
            },
            "center": [
                74.24426803763072,
                -2.2507114487818853
            ],
            "zoom": 0.6851443156248076,
            "bearing": 0,
            "pitch": 0,
            "sources": {
                "composite": {
                "url": "mapbox://mapbox.mapbox-streets-v8,examples.0fr72zt8",
                "type": "vector"
                }
            },
            "sprite": "mapbox://sprites/examples/cjikt35x83t1z2rnxpdmjs7y7",
            "glyphs": "mapbox://fonts/{username}/{fontstack}/{range}.pbf",
            "layers": [
                {
                "id": "background",
                "type": "background",
                "layout": {},
                "paint": {
                    "background-color": [ ]
                }
                },
            ],
            "created": "2015-10-30T22:18:31.111Z",
            "id": "cjikt35x83t1z2rnxpdmjs7y7",
            "modified": "2015-10-30T22:22:06.077Z",
            "owner": "examples",
            "visibility": "public",
            "draft": false
            },
        // style: "https://basemaps.cartocdn.com/gl/dark-matter-gl-style/style.json",
        // center: [73.8567, 18.5204],
        container: 'map',
        // maxZoom: 22,
        // crossSourceCollisions: false,
        // failIfMajorPerformanceCaveat: false,
        // attributionControl: false,
        // preserveDrawingBuffer: true,
        // hash: false,
        // minPitch: 0,
        // maxPitch: 60,
        // style: 'mapbox://styles/mapbox/streets-v9',
        projection: 'globe', // Display the map as a globe, since satellite-v9 defaults to Mercator
        zoom: 12,
        center: [9.919535826421177, 49.79075468055614]
      },
    });
    return {  
        state,    // accessToken: "pk.eyJ1IjoidGZseiIsImEiOiJjbHh4OTB2M2sycTYwMnFzaDlqZGx4cTZmIn0.H_RQv35r7gySjJ4XFUJ0IA",
    // mapStyle: {
    //     "version": 8,
    //     "name": "Meteorites",
    //     "metadata": {
    //         "mapbox:origin": "basic-template-v1",
    //         "mapbox:autocomposite": true,
    //         "mapbox:type": "template",
    //         "mapbox:sdk-support": {
    //         "js": "0.45.0",
    //         "android": "6.0.0",
    //         "ios": "4.0.0"
    //         }
    //     },
    //     "center": [
    //         74.24426803763072,
    //         -2.2507114487818853
    //     ],
    //     "zoom": 0.6851443156248076,
    //     "bearing": 0,
    //     "pitch": 0,
    //     "sources": {
    //         "composite": {
    //         "url": "mapbox://mapbox.mapbox-streets-v8,examples.0fr72zt8",
    //         "type": "vector"
    //         }
    //     },
    //     "sprite": "mapbox://sprites/examples/cjikt35x83t1z2rnxpdmjs7y7",
    //     "glyphs": "mapbox://fonts/{username}/{fontstack}/{range}.pbf",
    //     "layers": [
    //         {
    //         "id": "background",
    //         "type": "background",
    //         "layout": {},
    //         "paint": {
    //             "background-color": [ ]
    //         }
    //         },
    //     ],
    //     "created": "2015-10-30T22:18:31.111Z",
    //     "id": "cjikt35x83t1z2rnxpdmjs7y7",
    //     "modified": "2015-10-30T22:22:06.077Z",
    //     "owner": "examples",
    //     "visibility": "public",
    //     "draft": false
    //     } // your map style
    };
},
methods:{
    onMapLoaded(event) {
        console.log('load_event')
        console.log(event)
        this.map = event
    //     this.map = event.map;
    //   // or just to store if you want have access from other components
    //   this.$store.map = event.map;
    },
},
created() {
    // We need to set mapbox-gl library here in order to use it in template
    this.mapbox = mapbox;
}
};
</script>