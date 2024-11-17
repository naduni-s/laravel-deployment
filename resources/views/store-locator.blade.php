@extends('layouts.layout')
@section('title', 'Store Locator')
@section('content')

<div class="container mx-auto py-8 px-4">
    <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">Store Locator</h1>

    <!-- Store Locator Form -->
    <div class="flex justify-center mb-8">
        <input id="search-address" type="text" class="px-4 py-2 rounded-full w-96" placeholder="Enter your nearest city to find stores">
        <button id="search-button" class="bg-blue-500 text-white px-6 py-2 rounded-full ml-4 hover:bg-blue-600">Search</button>
    </div>

    <!-- Google Map -->
    <div id="map" class="w-full h-96 rounded-lg shadow-lg"></div>
</div>
<script>
    // Define the stores array globally
    const stores = [
        {
            name: "Colombo",
            address: "No 45, Flower Road, Colombo 07",
            lat: 6.9271,
            lng: 79.8612,
            details: "Offers a wide variety of perfume decants and refilling services."
        },
        {
            name: "Kandy",
            address: "No 123, Colombo Street, Kandy",
            lat: 7.2944,
            lng: 80.6365,
            details: "Known for its exclusive collection of niche perfume decants. Offers refilling services with eco-friendly packaging."
        },
        {
            name: "Galle",
            address: "No 78, Lighthouse Street, Galle Fort",
            lat: 6.0328,
            lng: 80.2170,
            details: "Located in the historic Galle Fort, this store offers premium perfume decants and convenient refilling options."
        },
        {
            name: "Anuradhapura",
            address: "No 50, Anuradhapura Main Street",
            lat: 8.3114,
            lng: 80.4037,
            details: "Popular for its local perfume selections and exclusive decant options."
        },
        {
            name: "Kurunegala",
            address: "No 20, Kurunegala City Mall",
            lat: 7.4863,
            lng: 80.3647,
            details: "Known for its range of affordable perfume decants and quality refilling services."
        },
        {
            name: "Ratnapura",
            address: "No 15, Gem Street, Ratnapura",
            lat: 6.6828,
            lng: 80.3994,
            details: "Features a unique collection of rare perfume decants and convenient refilling options."
        }
    ];

    // Define initMap globally
    window.initMap = function() {
        const map = new google.maps.Map(document.getElementById('map'), {
            center: { lat: 6.9271, lng: 79.8612 }, // Default center (Sri Lanka)
            zoom: 8
        });

        const infowindow = new google.maps.InfoWindow();

        // Place markers for all stores
        stores.forEach(store => {
            const marker = new google.maps.Marker({
                map: map,
                position: { lat: store.lat, lng: store.lng },
                title: store.name
            });

            google.maps.event.addListener(marker, 'click', function() {
                infowindow.setContent(`
                    <div>
                        <h3>${store.name}</h3>
                        <p>${store.address}</p>
                        <p>${store.details}</p>
                    </div>
                `);
                infowindow.open(map, marker);
            });
        });

        // Trigger search when the search button is clicked
        document.getElementById('search-button').addEventListener('click', function() {
            searchStores(map, infowindow);
        });
    };

    // Search function
    function searchStores(map, infowindow) {
        const address = document.getElementById('search-address').value.trim().toLowerCase();
        let selectedStore;

        // Define city arrays for each store
        const colomboCities = ['kadawatha', 'dehiwala', 'colombo', 'nugegoda', 'kollupitiya', 'kaduwela', 'malabe','negombo','panadura','kalutara'];
        const galleCities = ['galle', 'matara', 'hikkaduwa', 'tangalle', 'deniyaya', 'weligama','akuressa','hambanthota','ambalangoda'];
        const kandyCities = ['kandy', 'kegalle', 'matale', 'gampola', 'rambukkana', 'pilimathalawa','nuwaraeliya','katugasthota','nawalapitiya'];
        const anuradhapuraCities = ['anuradhapura', 'mihintale', 'habarana', 'thambuththegama','kekirawa','polonnaruwa','medawachchiya'];
        const kurunegalaCities = ['kurunegala', 'mawathagama', 'kuliyapitiya', 'polgahawela','dambulla','narammala','giriulla','alawwa','maho'];
        const ratnapuraCities = ['ratnapura', 'pelmadulla', 'balangoda', 'opanayaka','embilipitiya','badulla','belihuloya','haputale','kuruvita'];

        // Determine the store based on the searched city
        if (colomboCities.includes(address)) {
            selectedStore = stores[0];
        } else if (kandyCities.includes(address)) {
            selectedStore = stores[1];
        } else if (galleCities.includes(address)) {
            selectedStore = stores[2];
        } else if (anuradhapuraCities.includes(address)) {
            selectedStore = stores[3];
        } else if (kurunegalaCities.includes(address)) {
            selectedStore = stores[4];
        } else if (ratnapuraCities.includes(address)) {
            selectedStore = stores[5];
        } else {
            alert("No store found for this location. Please try another nearby city.");
            return;
        }

        // Set map center and display the relevant store info
        map.setCenter({ lat: selectedStore.lat, lng: selectedStore.lng });
        map.setZoom(15);

        const marker = new google.maps.Marker({
            map: map,
            position: { lat: selectedStore.lat, lng: selectedStore.lng },
            title: selectedStore.name
        });

        infowindow.setContent(`
            <div>
                <h3>${selectedStore.name} Store</h3>
                <p>${selectedStore.address}</p>
                <p>${selectedStore.details}</p>
            </div>
        `);
        infowindow.open(map, marker);
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCQ1-sdpIHmBI8fyl_F4xT-a-PBoz5qvQY&libraries=places&callback=initMap" defer></script>
@endsection
