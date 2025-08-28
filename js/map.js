// MAP VARIABLES
let map;
let tileLayer;
let userMarker;

// MAP INITIALIZER
export function initMap() {
    // Create map only once
    if (!map) {
        map = L.map("map", {
            zoomControl: false,
            attributionControl: false,
        }).setView([0, 0], 2);
    }

    // Remove the old tileLayer if it exists
    if (tileLayer) {
        map.removeLayer(tileLayer);
    }

    // Apply correct style based on theme
    if (document.body.classList.contains("dark")) {
        tileLayer = L.tileLayer(
            "https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png",
            { subdomains: "abcd", maxZoom: 20 }
        ).addTo(map);
    } else {
        tileLayer = L.tileLayer(
            "https://{s}.basemaps.cartocdn.com/rastertiles/voyager/{z}/{x}/{y}{r}.png",
            { subdomains: "abcd", maxZoom: 20 }
        ).addTo(map);
    }
}

window.onload = () => {
    initMap();

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (pos) {
            const lat = pos.coords.latitude;
            const lng = pos.coords.longitude;

            // Animate zoom & center to location
            map.flyTo([lat, lng], 15, {
                animate: true,
                duration: 2, // seconds for zoom animation
            });

            const blinkingDot = L.divIcon({
                className: "blinking-dot",
                iconSize: [12, 12],
            });

            // Only add marker once
            if (!userMarker) {
                userMarker = L.marker([lat, lng], { icon: blinkingDot }).addTo(
                    map
                );
            } else {
                userMarker.setLatLng([lat, lng]);
            }
        });
    }
};
