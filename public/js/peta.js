function initMap() {
    const myLatlng = {
        lat: -7.5017,
        lng: 111.2578,
    };
    const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 7,
        center: myLatlng,
    });

    const pin = myLatlng;
    let marker = new google.maps.Marker({
        position: pin,
        map: map,
        draggable: true,
        title: "geser atau klik",
    });

    google.maps.event.addListener(marker, "position_changed", function () {
        let lat = marker.position.lat();
        let lng = marker.position.lng();
        $("#lat").val(lat);
        $("#lng").val(lng);
    });

    google.maps.event.addListener(map, "click", function (event) {
        pos = event.latLng;
        marker.setPosition(pos);
    });
}
