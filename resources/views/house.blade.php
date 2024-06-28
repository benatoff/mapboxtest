<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased text-gray-900">
    <div class="flex flex-col items-center min-h-screen pt-6 bg-gray-100 sm:justify-center sm:pt-0">
        <div class="w-full px-6 py-4 mt-6 overflow-hidden bg-white shadow-md sm:max-w-md sm:rounded-lg">
            <img src="{{url('storage/house.jpeg')}}" alt="">
        </div>

        <div class="w-full px-6 py-4 mt-6 overflow-hidden bg-white shadow-md sm:max-w-md sm:rounded-lg">

            <x-input-label for="art" value="Vermarktungsart" />
            <x-text-input value="{{ $house['vermarktungsart'] }}" id="art" disabled class="block w-full mt-1" />


            <x-input-label for="strasse" value="Straße" />
            <x-text-input :value="$house['strasse']" id="strasse" disabled class="block w-full mt-1" />

            <div class="grid grid-cols-2 gap-2">
                <div>
                    <x-input-label for="ort" value="Ort" />
                    <x-text-input :value="$house['ort']" id="ort" disabled class="block w-full mt-1" />

                </div>
                <div>
                    <x-input-label for="plz" value="PLZ" />
                    <x-text-input :value="$house['plz']" id="strasse" disabled class="block w-full mt-1" />
                </div>
            </div>
            @if($house['vermarktungsart']=='kauf')
            <x-input-label for="preis" value="Kaufpreis" />
            <x-text-input :value="$house['kaufpreis']" id="art" class="block w-full mt-1" />
            @else
            <x-input-label for="preis" value="Preis" />
            <x-text-input :value="$house['warmmiete']" id="art" class="block w-full mt-1" />
            @endif
            <x-input-label for="lage" value="Lage" />
            <textarea diabled id="lage" rows="6" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ $house['lage'] }}</textarea>
        </div>
    </div>
</body>

</html>