@extends('home.homeBase')
@section('title', 'Cart Locator')
@section('content')
    <!-- Cart Locator Content -->
    <div class="container mx-auto p-6 bg-white rounded-lg shadow-lg mt-6 mb-5">
        <div class="heading mb-6 text-center">
            <h2 class="text-3xl font-semibold text-gray-800">Find a Mithila Idli Cart Near You</h2>
            <p class="text-gray-600 mt-2">Locate our delicious idli carts by checking the maps below or call us directly.</p>
        </div>
        
        <!-- Flex container for maps and cart details -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Cart Location 1 -->
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h3 class="text-xl font-semibold text-gray-900 mb-4 text-center">Near Astha Mandir</h3>
                <div class="map-container w-full h-64 bg-gray-200 rounded-lg shadow-md overflow-hidden mb-4">
                    <iframe class="w-full h-full"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3592.8050149183796!2d87.47467669999999!3d25.7770032!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eff9714d4284b5%3A0x4dd132afb38faaa9!2sAastha%20Mandir!5e0!3m2!1sen!2sin!4v1726820858431!5m2!1sen!2sin"
                        frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
                <p class="text-gray-600">Astha Mandir, Taxi stand, Purnea, Bihar</p>
            </div>

            <!-- Cart Location 2 -->
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h3 class="text-xl font-semibold text-gray-900 mb-4 text-center">Sanoli Chowk</h3>
                <div class="map-container w-full h-64 bg-gray-200 rounded-lg shadow-md overflow-hidden mb-4">
                    <iframe class="w-full h-full"
                        src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d28742.990411930034!2d87.5092775!3d25.7747316!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2s!5e0!3m2!1sen!2sin!4v1726820921183!5m2!1sen!2sin"
                        frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
                <p class="text-gray-600">Sanoli Chowk, Gulabbagh, Purnea, Bihar</p>
            </div>

            <!-- Cart Location 3 -->
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h3 class="text-xl font-semibold text-gray-900 mb-4 text-center">Line Bazar Chowk</h3>
                <div class="map-container w-full h-64 bg-gray-200 rounded-lg shadow-md overflow-hidden mb-4">
                    <iframe class="w-full h-full"
                        src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d28742.990411930034!2d87.5092775!3d25.7747316!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2s!5e0!3m2!1sen!2sin!4v1726821078296!5m2!1sen!2sin"
                        frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
                <p class="text-gray-600">Line Bazar Chowk, Purnea, Bihar</p>
            </div>
        </div>
    </div>
@endsection
