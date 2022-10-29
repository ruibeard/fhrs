<!doctype html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>FHRS</title>
   <script src="https://cdn.tailwindcss.com"></script>

   @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="flex flex-col max-w-screen-xl mx-auto items-center">
<div class="text-center my-20">
   <h1 class="text-4xl font-bold">Welcome to the Food Hygiene Rating Service</h1>
   <p class="text-xl my-4">Search for a city or county to see the results</p>
</div>
<div class="py-10">
   <form action="{{route('home')}}" method="get">
      <label for="address">City or County</label>
      <input type="text" value="" placeholder="Ex: Manchester" class="border px-4 py-2 rounded-sm" id="address" name="address"/>
      <input type="submit" value="Search" class="border px-4 py-2 rounded-sm">
   </form>

</div>
<div class=" w-full flex flex-col justify-center mx-auto  ">
   @if($establishments->count() >0)
      <table>
         <thead>
         <tr>
            <th>Rating</th>
            <th>Name</th>
            <th>Address</th>
         </tr>
         </thead>
         <tbody>

         @forelse($establishments as $item)
            <tr class="bg-gray-100">
               <td class=" py-2 px-4  text-center">{{$item->RatingValue}}</td>
               <td class=" py-2 px-4 ">  <a href="https://google.com/search?q={{$item->BusinessName . $item->PostCode}}" target="_blank">{{$item->BusinessName}}</a></td>
               <td class=" py-2 px-4 ">
                  {{$item->AddressLine1}}
                  {{$item->AddressLine2 }} |
                  {{$item->AddressLine3}} |
                  {{$item->PostCode}} |
                  @if($item->AddressLine4)
                     {{$item->AddressLine4}}
                  @endif
               </td>
            </tr>
         @empty
            <tr>
               <td colspan="4" class="text-center py-2">No results found</td>
            </tr>
         @endforelse
         </tbody>
      </table>
   @endif

</div>
<div class="h-96 w-full mt-10" id="map"></div>

<script>
    window.initMap = function () {

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
            marker.addListener("click", () => {
                infoWindow.close();
                infoWindow.setContent("<a class='underline my-4' target='_blank' href=https://google.com/search?q=" + encodeURI(pin['BusinessName']) + ">" + marker.getTitle() + " </a>");
                infoWindow.open(marker.getMap(), marker);
            });
        });

    }

</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key={{config('services.maps.key')}}&libraries=geometry&callback=initMap"></script>

</body>
</html>