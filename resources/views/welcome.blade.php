<!doctype html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>FHRS</title>
   <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ config('services.maps.key') }}&libraries=geometry&callback=initMap"/>
   @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="flex flex-col max-screen-2xl  ">
<div class=" w-full flex flex-col ">
   @foreach($establishments as $item)
      <div class="py-4  ">{{$item->BusinessName}}</div>
   @endforeach

</div>
<div id="map" class="map border  h-screen w-full"></div>

<script>
    function initMap() {

        const coords = {!! $establishments->map->only(['latitude', 'longitude', 'BusinessName', 'FHRSID'])->toJson() !!};
        const centerMap = new google.maps.LatLng(parseFloat(coords[0]['latitude']), parseFloat(coords[0]['longitude']));

        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 12,
            mapTypeId: "roadmap",
            center: centerMap,
        });
        const infoWindow = new google.maps.InfoWindow();

        coords.forEach((pin, i) => {
            let position = new google.maps.LatLng(parseFloat(pin['latitude']), parseFloat(pin['longitude']));
            const marker = new google.maps.Marker({
                position,
                map,
                title: `${pin['BusinessName']}`,
                label: `${i + 1}`,
                optimized: false,
            });
            // marker.addListener("click", () => {
            //     infoWindow.close();
            //     infoWindow.setContent("<a class='underline my-4' href=/place/" + pin.hid + ">" + marker.getTitle() + " </a>");
            //     infoWindow.open(marker.getMap(), marker);
            // });
        });

    }

</script>

</body>
</html>