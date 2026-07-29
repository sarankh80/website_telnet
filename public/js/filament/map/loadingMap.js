
    function coverageChecker() {
        return {

            /* =========================================================
             * STATE
             * ========================================================= */

            searchQuery: '',
            searchedLocation: '',
            isLoading: false,

            status: null,
            distance: null,
            nearestBranch: null,

            totalZones: '---',

            presetRegions: [],

            map: null,
            markers: null,
            branchZones: null,

            searchMarker: null,

            allMarkers: [],

            layerControl: null,

            searchIcon: null,

            defaultCenter: [12.5657, 104.9910],
            defaultZoom: 7,

            /*
             * Coverage radius
             * 40 KM from branch
             */
            coverageKm: 40,


            /* =========================================================
             * INITIALIZE
             * ========================================================= */

            init() {

                this.$nextTick(() => {
                    this.initMap();
                });

                this.$el.addEventListener(
                    'alpine:destroy',
                    () => this.destroyMap()
                );
            },


            /* =========================================================
             * INITIALIZE MAP
             * ========================================================= */

            initMap() {

                const el = this.$refs.mapEl;

                if (!el) return;


                /*
                 * Remove previous map
                 */
                if (this.map) {

                    this.map.remove();

                    this.map = null;
                }


                /*
                 * Prevent Leaflet duplicate initialization
                 */
                if (el._leaflet_id) {

                    el._leaflet_id = null;

                    el.innerHTML = '';
                }


                /*
                 * Create map
                 *
                 * scrollWheelZoom: true
                 * allows mouse wheel zoom
                 */
                this.map = L.map(el, {

                    scrollWheelZoom: true,

                    zoomControl: true,

                    doubleClickZoom: true,

                    dragging: true,

                    touchZoom: true

                }).setView(
                    this.defaultCenter,
                    this.defaultZoom
                );


                /* =====================================================
                 * SEARCH ICON
                 * ===================================================== */

                this.searchIcon = L.icon({

                    iconUrl: '{{ asset("images/MAP.png") }}',

                    shadowUrl: '{{ asset("images/marker-shadow.png") }}',

                    iconSize: [30, 50],

                    iconAnchor: [15, 50],

                    popupAnchor: [0, -50]

                });


                /* =====================================================
                 * BASE MAPS
                 * ===================================================== */

                const osm = L.tileLayer(

                    'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',

                    {
                        maxZoom: 19,

                        attribution: '&copy; OpenStreetMap contributors'
                    }

                );


                const googleStreet = L.tileLayer(

                    'https://mt1.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',

                    {
                        maxZoom: 20,

                        attribution: '&copy; Google'
                    }

                );


                const googleSatellite = L.tileLayer(

                    'https://mt1.google.com/vt/lyrs=s&x={x}&y={y}&z={z}',

                    {
                        maxZoom: 20,

                        attribution: '&copy; Google'
                    }

                );


                const googleHybrid = L.tileLayer(

                    'https://mt1.google.com/vt/lyrs=y&x={x}&y={y}&z={z}',

                    {
                        maxZoom: 20,

                        attribution: '&copy; Google'
                    }

                );


                /*
                 * Default map
                 */
                osm.addTo(this.map);


                /* =====================================================
                 * COVERAGE MARKERS
                 * ===================================================== */

                this.markers =
                    L.markerClusterGroup();


                this.map.addLayer(
                    this.markers
                );


                /* =====================================================
                 * COVERAGE ZONES
                 * ===================================================== */

                this.branchZones =
                    L.layerGroup();


                this.map.addLayer(
                    this.branchZones
                );


                /* =====================================================
                 * LAYER CONTROL
                 * ===================================================== */

                this.layerControl =
                    L.control.layers(

                        {

                            'OpenStreetMap': osm,

                            'Google Streets': googleStreet,

                            'Google Satellite': googleSatellite,

                            'Google Hybrid': googleHybrid

                        },

                        {

                            'Coverage Markers': this.markers,

                            '40 KM Coverage Zones': this.branchZones

                        },

                        {

                            collapsed: true,

                            position: 'topright'

                        }

                    ).addTo(this.map);


                /* =====================================================
                 * LOAD DATA
                 * ===================================================== */

                this.loadMarkers();
            },


            /* =========================================================
             * DESTROY MAP
             * ========================================================= */

            destroyMap() {

                if (this.map) {

                    this.map.remove();
                }

                this.map = null;

                this.markers = null;

                this.branchZones = null;

                this.searchMarker = null;

                this.layerControl = null;

                this.allMarkers = [];

            },


            /* =========================================================
             * BRANCH POPUP
             * ========================================================= */

            createBranchPopup(item) {

                const name =
                    item.name_en ||
                    item.name ||
                    'Unknown Location';


                const status =
                    item.status ||
                    'Unknown';


                const isAvailable =
                    status.toLowerCase() ===
                    'available';


                const lat =
                    parseFloat(item.lat);


                const lng =
                    parseFloat(item.lng);


                return `

                <div class="coverage-popup">

                    <!-- HEADER -->

                    <div class="coverage-popup-header">

                        <div class="coverage-popup-title">

                            ${name}

                        </div>


                        <div class="
                            coverage-status
                            ${isAvailable
                                ? 'available'
                                : 'unavailable'}
                        ">

                            <span
                                class="coverage-status-dot"
                            ></span>

                            ${status}

                        </div>

                    </div>


                    <!-- BODY -->

                    <div class="coverage-popup-body">

                        <div class="coverage-info-row">

                            <span
                                class="coverage-info-label"
                            >
                                Latitude
                            </span>

                            <span
                                class="coverage-info-value"
                            >
                                ${
                                    !isNaN(lat)
                                        ? lat.toFixed(6)
                                        : '-'
                                }
                            </span>

                        </div>


                        <div class="coverage-info-row">

                            <span
                                class="coverage-info-label"
                            >
                                Longitude
                            </span>

                            <span
                                class="coverage-info-value"
                            >
                                ${
                                    !isNaN(lng)
                                        ? lng.toFixed(6)
                                        : '-'
                                }
                            </span>

                        </div>

                    </div>


                    <!-- FOOTER -->

                    <div class="coverage-popup-footer">

                        <div class="coverage-radius">

                            <div
                                class="coverage-radius-icon"
                            >
                                ◉
                            </div>


                            <div>

                                <div
                                    style="
                                        font-weight:600;
                                        color:#334155;
                                    "
                                >
                                    Coverage Zone
                                </div>

                                <div>
                                    ${this.coverageKm}
                                    km radius
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            `;
            },


            /* =========================================================
             * COVERAGE ZONE POPUP
             * ========================================================= */

            createZonePopup(branch) {

                return `

                <div class="coverage-popup">

                    <!-- HEADER -->

                    <div class="coverage-popup-header">

                        <div class="coverage-popup-title">

                            ${branch.name_en}

                        </div>


                        <div
                            class="
                                coverage-status
                                available
                            "
                        >

                            <span
                                class="
                                    coverage-status-dot
                                "
                            ></span>

                            Coverage

                        </div>

                    </div>


                    <!-- BODY -->

                    <div class="coverage-popup-body">

                        <div class="coverage-info-row">

                            <span
                                class="coverage-info-label"
                            >
                                Coverage Radius
                            </span>

                            <span
                                class="coverage-info-value"
                            >
                                ${this.coverageKm} km
                            </span>

                        </div>


                        <div class="coverage-info-row">

                            <span
                                class="coverage-info-label"
                            >
                                Coverage Area
                            </span>

                            <span
                                class="coverage-info-value"
                            >
                                ${this.coverageKm * 2}
                                ×
                                ${this.coverageKm * 2}
                                km
                            </span>

                        </div>


                        <div class="coverage-info-row">

                            <span
                                class="coverage-info-label"
                            >
                                Branch Latitude
                            </span>

                            <span
                                class="coverage-info-value"
                            >
                                ${branch.lat.toFixed(6)}
                            </span>

                        </div>


                        <div class="coverage-info-row">

                            <span
                                class="coverage-info-label"
                            >
                                Branch Longitude
                            </span>

                            <span
                                class="coverage-info-value"
                            >
                                ${branch.lng.toFixed(6)}
                            </span>

                        </div>

                    </div>


                    <!-- FOOTER -->

                    <div class="coverage-popup-footer">

                        <div class="coverage-radius">

                            <div
                                class="coverage-radius-icon"
                            >
                                ◉
                            </div>


                            <div>

                                <div
                                    style="
                                        font-weight:600;
                                        color:#334155;
                                    "
                                >
                                    TELNET Coverage Zone
                                </div>

                                <div>
                                    Service coverage
                                    around this branch
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            `;
            },


            /* =========================================================
             * SEARCH RESULT POPUP
             * ========================================================= */

            createSearchPopup(
                lat,
                lng,
                name,
                nearest
            ) {

                const insideCoverage =
                    nearest &&
                    nearest.distance <=
                    this.coverageKm;


                return `

                <div class="coverage-popup">

                    <!-- HEADER -->

                    <div class="coverage-popup-header">

                        <div class="coverage-popup-title">

                            ${name || 'Selected Location'}

                        </div>


                        <div class="
                            coverage-status
                            ${
                                insideCoverage
                                    ? 'available'
                                    : 'unavailable'
                            }
                        ">

                            <span
                                class="
                                    coverage-status-dot
                                "
                            ></span>

                            ${
                                insideCoverage
                                    ? 'Covered'
                                    : 'Not Covered'
                            }

                        </div>

                    </div>


                    <!-- LOCATION -->

                    <div class="coverage-popup-body">

                        <div class="coverage-info-row">

                            <span
                                class="coverage-info-label"
                            >
                                Latitude
                            </span>

                            <span
                                class="coverage-info-value"
                            >
                                ${lat.toFixed(6)}
                            </span>

                        </div>


                        <div class="coverage-info-row">

                            <span
                                class="coverage-info-label"
                            >
                                Longitude
                            </span>

                            <span
                                class="coverage-info-value"
                            >
                                ${lng.toFixed(6)}
                            </span>

                        </div>


                        ${
                            nearest
                                ? `

                                    <div
                                        class="
                                            coverage-info-row
                                        "
                                    >

                                        <span
                                            class="
                                                coverage-info-label
                                            "
                                        >
                                            Nearest Branch
                                        </span>

                                        <span
                                            class="
                                                coverage-info-value
                                            "
                                        >
                                            ${nearest.name_en}
                                        </span>

                                    </div>


                                    <div
                                        class="
                                            coverage-info-row
                                        "
                                    >

                                        <span
                                            class="
                                                coverage-info-label
                                            "
                                        >
                                            Distance
                                        </span>

                                        <span
                                            class="
                                                coverage-info-value
                                                ${
                                                    insideCoverage
                                                        ? 'distance-good'
                                                        : 'distance-bad'
                                                }
                                            "
                                        >
                                            ${nearest.distance.toFixed(2)}
                                            km
                                        </span>

                                    </div>

                                `
                                : ''
                        }

                    </div>


                    <!-- COVERAGE RESULT -->

                    <div
                        class="
                            coverage-result
                            ${
                                insideCoverage
                                    ? 'coverage-result-good'
                                    : 'coverage-result-bad'
                            }
                        "
                    >

                        <div
                            class="
                                coverage-result-icon
                            "
                        >
                            ${
                                insideCoverage
                                    ? '✓'
                                    : '!'
                            }
                        </div>


                        <div>

                            <div
                                class="
                                    coverage-result-title
                                "
                            >
                                ${
                                    insideCoverage
                                        ? 'Service Available'
                                        : 'Outside Coverage'
                                }
                            </div>


                            <div
                                class="
                                    coverage-result-text
                                "
                            >
                                ${
                                    insideCoverage
                                        ? `
                                            This location is
                                            within the
                                            ${this.coverageKm} km
                                            coverage zone.
                                        `
                                        : `
                                            This location is
                                            outside the nearest
                                            ${this.coverageKm} km
                                            coverage zone.
                                        `
                                }
                            </div>

                        </div>

                    </div>

                </div>

            `;
            },


            /* =========================================================
             * LOAD MARKERS
             * ========================================================= */

            loadMarkers() {

                $('#spinner')
                    .removeClass('hidden');


                $.get(
                        '{{ route("coverage.data") }}'
                    )

                    .done(response => {

                        if (!this.map)
                            return;


                        /*
                         * Clear old data
                         */

                        this.markers
                            .clearLayers();


                        this.branchZones
                            .clearLayers();


                        this.allMarkers = [];


                        /*
                         * Branch data
                         */

                        const branches =
                            response.branches ||
                            response.data || [];


                        /*
                         * Popular regions
                         */

                        this.presetRegions =
                            branches

                            .filter(item =>
                                item.lat != null &&
                                item.lng != null
                            )

                            .map(item => ({

                                id: item.id,

                                name_en: item.name_en ||
                                    item.name ||
                                    '',

                                name_km: item.name_km ||
                                    '',

                                lat: parseFloat(
                                    item.lat
                                ),

                                lng: parseFloat(
                                    item.lng
                                ),

                                status: item.status ||
                                    null

                            }))

                            .filter(item =>
                                !isNaN(item.lat) &&
                                !isNaN(item.lng)
                            );


                        /* =================================================
                         * ICONS
                         * ================================================= */

                        const activeIcon =
                            L.icon({

                                iconUrl: '{{ asset("images/MAP.png") }}',

                                shadowUrl: '{{ asset("images/marker-shadow.png") }}',

                                iconSize: [30, 50],

                                iconAnchor: [15, 50],

                                popupAnchor: [0, -50]

                            });


                        const inactiveIcon =
                            L.icon({

                                iconUrl: '{{ asset("images/MAP_INACTIVE.png") }}',

                                shadowUrl: '{{ asset("images/marker-shadow.png") }}',

                                iconSize: [30, 50],

                                iconAnchor: [15, 50],

                                popupAnchor: [0, -50]

                            });


                        /* =================================================
                         * COVERAGE DATA
                         * ================================================= */

                        const coverageData =
                            response.data || [];


                        coverageData.forEach(item => {

                            const lat =
                                parseFloat(
                                    item.lat
                                );


                            const lng =
                                parseFloat(
                                    item.lng
                                );


                            if (
                                isNaN(lat) ||
                                isNaN(lng)
                            ) {
                                return;
                            }


                            const name =
                                item.name_en ||
                                item.name ||
                                '';


                            const status =
                                item.status ||
                                'Unknown';


                            /*
                             * Marker
                             */

                            const marker =
                                L.marker(

                                    [lat, lng],

                                    {

                                        icon: status ===
                                            'Available'

                                            ?
                                            activeIcon

                                            :
                                            inactiveIcon

                                    }

                                );


                            marker.regionName =
                                name;


                            marker.regionStatus =
                                status;


                            /*
                             * Popup
                             */

                            marker.bindPopup(

                                this.createBranchPopup(
                                    item
                                ),

                                {

                                    className: 'coverage-popup-container',

                                    maxWidth: 340,

                                    minWidth: 260,

                                    closeButton: true,

                                    autoPan: true

                                }

                            );


                            /*
                             * Add marker
                             */

                            this.markers
                                .addLayer(
                                    marker
                                );


                            this.allMarkers
                                .push(
                                    marker
                                );

                        });


                        /*
                         * Create branch zones
                         */

                        this.createBranchZones();


                        /*
                         * Total
                         */

                        if (
                            response.total != null
                        ) {

                            this.totalZones =
                                response.total;

                        }

                    })

                    .fail(xhr => {

                        console.error(
                            'Coverage data error:',
                            xhr.responseJSON ||
                            xhr
                        );

                    })

                    .always(() => {

                        $('#spinner')
                            .addClass('hidden');

                    });

            },


            /* =========================================================
             * CREATE 40 KM COVERAGE ZONES
             * ========================================================= */

            createBranchZones() {

                if (!this.branchZones)
                    return;


                this.branchZones
                    .clearLayers();


                const km =
                    this.coverageKm;


                this.presetRegions
                    .forEach(branch => {

                        const lat =
                            branch.lat;


                        const lng =
                            branch.lng;


                        /*
                         * Latitude
                         */

                        const latOffset =
                            km / 111;


                        /*
                         * Longitude
                         */

                        const lngOffset =
                            km /
                            (
                                111 *
                                Math.cos(
                                    lat *
                                    Math.PI /
                                    180
                                )
                            );


                        /*
                         * Square bounds
                         */

                        const bounds = [

                            [

                                lat -
                                latOffset,

                                lng -
                                lngOffset

                            ],

                            [

                                lat +
                                latOffset,

                                lng +
                                lngOffset

                            ]

                        ];


                        /*
                         * Draw square
                         */

                        const zone =
                            L.rectangle(

                                bounds,

                                {

                                    color: '#8FC74A',

                                    weight: 2,

                                    opacity: 0.7,

                                    fillColor: '#8FC74A',

                                    fillOpacity: 0.08,

                                    dashArray: '8, 6'

                                }

                            );


                        /*
                         * Zone popup
                         */

                        zone.bindPopup(

                            this.createZonePopup(
                                branch
                            ),

                            {

                                className: 'coverage-popup-container',

                                maxWidth: 340,

                                minWidth: 260

                            }

                        );


                        this.branchZones
                            .addLayer(
                                zone
                            );

                    });

            },


            /* =========================================================
             * PARSE LAT / LNG
             * ========================================================= */

            parseLatLng(value) {

                const match =
                    value
                    .trim()
                    .match(
                        /^(-?\d+(?:\.\d+)?)\s*[, ]\s*(-?\d+(?:\.\d+)?)$/
                    );


                if (!match)
                    return null;


                const lat =
                    parseFloat(
                        match[1]
                    );


                const lng =
                    parseFloat(
                        match[2]
                    );


                if (

                    isNaN(lat) ||

                    isNaN(lng) ||

                    lat < -90 ||

                    lat > 90 ||

                    lng < -180 ||

                    lng > 180

                ) {

                    return null;

                }


                return {
                    lat,
                    lng
                };

            },


            /* =========================================================
             * DISTANCE
             * ========================================================= */

            calculateDistance(
                lat1,
                lng1,
                lat2,
                lng2
            ) {

                const R =
                    6371;


                const dLat =
                    (
                        lat2 -
                        lat1
                    ) *
                    Math.PI /
                    180;


                const dLng =
                    (
                        lng2 -
                        lng1
                    ) *
                    Math.PI /
                    180;


                const a =

                    Math.sin(
                        dLat / 2
                    ) ** 2

                    +

                    Math.cos(
                        lat1 *
                        Math.PI /
                        180
                    )

                    *

                    Math.cos(
                        lat2 *
                        Math.PI /
                        180
                    )

                    *

                    Math.sin(
                        dLng / 2
                    ) ** 2;


                return (

                    R *

                    2 *

                    Math.atan2(

                        Math.sqrt(a),

                        Math.sqrt(
                            1 - a
                        )

                    )

                );

            },


            /* =========================================================
             * FIND NEAREST BRANCH
             * ========================================================= */

            findNearestBranch(
                lat,
                lng
            ) {

                if (
                    !this.presetRegions.length
                ) {

                    return null;

                }


                let nearest =
                    null;


                let shortest =
                    Infinity;


                this.presetRegions
                    .forEach(branch => {

                        const distance =
                            this.calculateDistance(

                                lat,

                                lng,

                                branch.lat,

                                branch.lng

                            );


                        if (
                            distance <
                            shortest
                        ) {

                            shortest =
                                distance;


                            nearest = {

                                ...branch,

                                distance

                            };

                        }

                    });


                return nearest;

            },


            /* =========================================================
             * MOVE TO COORDINATES
             * ========================================================= */

            flyToCoordinates(
                lat,
                lng,
                name = null,
                status = null
            ) {

                if (!this.map)
                    return;


                lat =
                    parseFloat(lat);


                lng =
                    parseFloat(lng);


                if (

                    isNaN(lat) ||

                    isNaN(lng)

                ) {

                    return;

                }


                /*
                 * Zoom to location
                 */

                this.map.flyTo(

                    [lat, lng],

                    12,

                    {

                        duration: 0.75

                    }

                );


                this.searchedLocation =
                    name ||
                    `${lat}, ${lng}`;


                this.status =
                    status ||
                    null;


                /*
                 * Find nearest branch
                 */

                const nearest =
                    this.findNearestBranch(
                        lat,
                        lng
                    );


                this.nearestBranch =
                    nearest;


                this.distance =
                    nearest ?
                    nearest.distance :
                    null;


                /*
                 * Remove previous
                 * search pointer
                 */

                if (
                    this.searchMarker
                ) {

                    this.map.removeLayer(
                        this.searchMarker
                    );


                    this.searchMarker =
                        null;

                }


                /*
                 * Create new pointer
                 */

                this.searchMarker =
                    L.marker(

                        [lat, lng],

                        {

                            icon: this.searchIcon,

                            zIndexOffset: 1000

                        }

                    )


                    .addTo(
                        this.map
                    );


                /*
                 * Search popup
                 */

                this.searchMarker
                    .bindPopup(

                        this.createSearchPopup(

                            lat,

                            lng,

                            name,

                            nearest

                        ),

                        {

                            className: 'coverage-popup-container',

                            maxWidth: 360,

                            minWidth: 280,

                            closeButton: true,

                            autoPan: true

                        }

                    )

                    .openPopup();

            },


            /* =========================================================
             * SELECT POPULAR BRANCH
             * ========================================================= */

            selectRegion(branch) {

                if (!branch)
                    return;


                this.searchQuery =
                    branch.name_en;


                this.flyToCoordinates(

                    branch.lat,

                    branch.lng,

                    branch.name_en,

                    branch.status

                );

            },


            /* =========================================================
             * SEARCH EXISTING MARKER
             * ========================================================= */

            flyToRegionByName(name) {

                if (!name)
                    return;


                const marker =
                    this.allMarkers.find(

                        marker =>

                        marker.regionName &&

                        marker.regionName
                        .toLowerCase() ===

                        name.toLowerCase()

                    );


                if (marker) {

                    const position =
                        marker.getLatLng();


                    this.flyToCoordinates(

                        position.lat,

                        position.lng,

                        marker.regionName,

                        marker.regionStatus

                    );

                } else {

                    this.checkCoverage(
                        name
                    );

                }

            },


            /* =========================================================
             * MAIN SEARCH
             * ========================================================= */

            checkCoverage(
                query = null
            ) {

                const term = (

                    query ||

                    this.searchQuery ||

                    ''

                ).trim();


                if (!term)
                    return;


                /*
                 * Search lat,lng first
                 */

                const coords =
                    this.parseLatLng(
                        term
                    );


                if (coords) {

                    this.isLoading =
                        true;


                    this.status =
                        null;


                    this.flyToCoordinates(

                        coords.lat,

                        coords.lng,

                        `${coords.lat}, ${coords.lng}`

                    );


                    this.isLoading =
                        false;


                    return;

                }


                /*
                 * Search location
                 */

                this.isLoading =
                    true;


                this.status =
                    null;


                $.get(

                        '{{ route("coverage.check") }}',

                        {

                            keyword: term

                        }

                    )

                    .done(response => {

                        this.searchedLocation =
                            response.name ||
                            term;


                        this.status =
                            response.status ||
                            null;


                        if (

                            response.lat !=
                            null &&

                            response.lng !=
                            null

                        ) {

                            this.flyToCoordinates(

                                response.lat,

                                response.lng,

                                response.name ||
                                term,

                                response.status

                            );

                        }

                    })

                    .fail(xhr => {

                        alert(

                            xhr.responseJSON?.message ||

                            'An unexpected error occurred.'

                        );

                    })

                    .always(() => {

                        this.isLoading =
                            false;

                    });

            },


            /* =========================================================
             * RESET
             * ========================================================= */

            resetMap() {

                this.searchQuery =
                    '';


                this.searchedLocation =
                    '';


                this.status =
                    null;


                this.distance =
                    null;


                this.nearestBranch =
                    null;


                /*
                 * Remove search marker
                 */

                if (
                    this.searchMarker
                ) {

                    this.map.removeLayer(

                        this.searchMarker

                    );


                    this.searchMarker =
                        null;

                }


                /*
                 * Close popup
                 */

                this.map.closePopup();


                /*
                 * Return to Cambodia
                 */

                this.map.flyTo(

                    this.defaultCenter,

                    this.defaultZoom,

                    {

                        duration: 0.75

                    }

                );

            }

        };
    }
