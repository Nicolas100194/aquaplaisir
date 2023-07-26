let mapOptions = {
    center: [48.3256715495736, 4.1137299926075075],
    zoom: 25
}

let map = new L.map('maCarte', mapOptions)

let layer = new L.TileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
map.addLayer(layer);

let customIcon = {
    iconUrl: "/aqua-plaisir/wp-content/themes/aquaplaisir/assets/icons/location-blue.svg",
    iconSize:[80,80]
}

let myIcon = L.icon(customIcon);

let iconOptions = {

    icon:myIcon
}

let marker = new L.Marker([48.3256715495736, 4.1137299926075075], iconOptions)
marker.addTo(map)




