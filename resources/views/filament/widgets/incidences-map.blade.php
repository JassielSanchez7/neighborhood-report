<x-filament-widgets::widget>

    

    <x-filament::section heading="Mapa de Incidencias">
        
        <div style="display:flex; gap:1rem;margin-bottom:1.5rem;">

            <div>
                🔴 Seguridad Ciudadana
            </div>

            <div>
                🟢 Infraestructura
            </div>

            <div>
                🔵 Limpieza Pública
            </div>
            <div>
                ⚫ Via Publica
            </div>
            <div>
                🟡 Alumbrado Público
            </div>

        </div>

        <div
            x-data="{
                init() {

                    console.log('Mapa iniciado');

                    const redIcon = new L.Icon({
                        iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-red.png',
                        shadowUrl: 'https://unpkg.com/leaflet@1.9.4/dist/images/marker-shadow.png',
                        iconSize: [25, 41],
                        iconAnchor: [12, 41]
                    });

                    const blueIcon = new L.Icon({
                        iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-blue.png',
                        shadowUrl: 'https://unpkg.com/leaflet@1.9.4/dist/images/marker-shadow.png',
                        iconSize: [25, 41],
                        iconAnchor: [12, 41]
                    });

                    const greenIcon = new L.Icon({
                        iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-green.png',
                        shadowUrl: 'https://unpkg.com/leaflet@1.9.4/dist/images/marker-shadow.png',
                        iconSize: [25, 41],
                        iconAnchor: [12, 41]
                    });

                    const yellowIcon = new L.Icon({
                        iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-gold.png',
                        shadowUrl: 'https://unpkg.com/leaflet@1.9.4/dist/images/marker-shadow.png',
                        iconSize: [25, 41],
                        iconAnchor: [12, 41]
                    });

                    const blackIcon = new L.Icon({
                        iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-black.png',
                        shadowUrl: 'https://unpkg.com/leaflet@1.9.4/dist/images/marker-shadow.png',
                        iconSize: [25, 41],
                        iconAnchor: [12, 41]
                    });

                    setTimeout(() => {

                        const incidences = {{ Js::from($incidences) }};

                        const map = L.map(this.$refs.map)
                            .setView([-6.8004, -79.8409], 14);

                        L.tileLayer(
                            'https://tile.openstreetmap.org/{z}/{x}/{y}.png',
                            {
                                maxZoom: 19,
                            }
                        ).addTo(map);
                        

                        incidences.forEach(incidence => {

                            let icon = blueIcon;

                            switch (incidence.type_incidence_id) {

                                case 1:
                                    icon = yellowIcon;
                                    break;

                                case 2:
                                    icon = blackIcon;
                                    break;

                                case 5:
                                    icon = greenIcon;
                                    break;

                                case 6:
                                    icon = blueIcon;
                                    break;
                                case 7:
                                    icon = redIcon;
                                    break;
                            }

                            L.marker([
                                incidence.latitude,
                                incidence.longitude
                            ],{
                                icon: icon
                            })
                            .addTo(map)
                            .bindPopup(`
                                <strong>${incidence.description}</strong>
                                <br>
                                ${incidence.location}
                            `);

                        });

                        map.invalidateSize();

                    }, 500);
                }
            }"
        >
            <div
                x-ref="map"
                style="height:480px;"
            ></div>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>