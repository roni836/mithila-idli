@extends('home.homeBase')
@section('title', 'Why Us')
@section('content')
<div class="bg-gray-100 text-gray-800">
<main class="container mx-auto px-6 py-12 ">
    <section class="text-center">
        <h2 class="text-4xl font-semibold text-gray-900">Why Choose Us</h2>
        <p class="mt-4 text-lg text-gray-600">Discover what makes Mithila Idli the best choice for your Idli cravings!</p>
    </section>

    <section class="mt-12">
        <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <div class="flex items-center justify-center h-16 w-16 rounded-full bg-indigo-500 text-white mx-auto">
                    <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11h.01M12 3v6m0 0v6m0-6h6m-6 0H6m2 4h.01M9 16h.01M6 12h.01M3 8h.01M4 4h.01M21 16h.01M19 20h.01M21 12h.01M17 8h.01M12 8h.01M7 8h.01M6 12h.01M12 4h.01M18 4h.01M21 12h.01M17 16h.01M12 16h.01M7 16h.01M6 20h.01M4 4h.01"></path>
                    </svg>
                </div>
                <h3 class="mt-4 text-xl font-semibold text-gray-900">Authentic Taste</h3>
                <p class="mt-2 text-gray-600">Our Idlis are made using traditional recipes, ensuring an authentic and delightful experience.</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-lg">
                <div class="flex items-center justify-center h-16 w-16 rounded-full bg-indigo-500 text-white mx-auto">
                    <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11h.01M12 3v6m0 0v6m0-6h6m-6 0H6m2 4h.01M9 16h.01M6 12h.01M3 8h.01M4 4h.01M21 16h.01M19 20h.01M21 12h.01M17 8h.01M12 8h.01M7 8h.01M6 12h.01M12 4h.01M18 4h.01M21 12h.01M17 16h.01M12 16h.01M7 16h.01M6 20h.01M4 4h.01"></path>
                    </svg>
                </div>
                <h3 class="mt-4 text-xl font-semibold text-gray-900">Fresh Ingredients</h3>
                <p class="mt-2 text-gray-600">We use only the freshest ingredients to prepare our Idlis, ensuring quality and flavor in every bite.</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-lg">
                <div class="flex items-center justify-center h-16 w-16 rounded-full bg-indigo-500 text-white mx-auto">
                    <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19c-3.3 0-6-2.7-6-6s2.7-6 6-6 6 2.7 6 6-2.7 6-6 6zM9 4h.01M9 10h.01M4.22 4.22a8 8 0 0111.31 0L9 10m-4.78-5.78a8 8 0 0111.31 0L9 10m-4.78-5.78a8 8 0 0111.31 0L9 10M21 12c0 4.97-4.03 9-9 9m0-18c4.97 0 9 4.03 9 9m0 0H9"></path>
                    </svg>
                </div>
                <h3 class="mt-4 text-xl font-semibold text-gray-900">Hygienic Preparation</h3>
                <p class="mt-2 text-gray-600">Our kitchens maintain the highest standards of cleanliness and hygiene to ensure your safety.</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-lg">
                <div class="flex items-center justify-center h-16 w-16 rounded-full bg-indigo-500 text-white mx-auto">
                    <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11h.01M12 3v6m0 0v6m0-6h6m-6 0H6m2 4h.01M9 16h.01M6 12h.01M3 8h.01M4 4h.01M21 16h.01M19 20h.01M21 12h.01M17 8h.01M12 8h.01M7 8h.01M6 12h.01M12 4h.01M18 4h.01M21 12h.01M17 16h.01M12 16h.01M7 16h.01M6 20h.01M4 4h.01"></path>
                    </svg>
                </div>
                <h3 class="mt-4 text-xl font-semibold text-gray-900">Quick Delivery</h3>
                <p class="mt-2 text-gray-600">We understand your time is precious, so we ensure that your order reaches you quickly and hot.</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-lg">
                <div class="flex items-center justify-center h-16 w-16 rounded-full bg-indigo-500 text-white mx-auto">
                    <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8V4m0 16v-4m-4 4H4m16 0h-4m-2-8a4 4 0 110-8 4 4 0 010 8zm0 6a4 4 0 110-8 4 4 0 010 8z"></path>
                    </svg>
                </div>
                <h3 class="mt-4 text-xl font-semibold text-gray-900">Affordable Prices</h3>
                <p class="mt-2 text-gray-600">Enjoy delicious Idlis at prices that won't break the bank.</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-lg">
                <div class="flex items-center justify-center h-16 w-16 rounded-full bg-indigo-500 text-white mx-auto">
                    <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c1.05 0 2.09-.16 3.09-.47l.71-1.79m-3.8-1.32A5.97 5.97 0 0012 6m3.09 1.53l-.71-1.79m-2.38 1.32A6.02 6.02 0 0012 18a5.97 5.97 0 01-3.09-.47l-.71-1.79m3.8 1.32A5.97 5.97 0 0012 18m-3.09-1.53l.71-1.79m2.38-1.32a6.02 6.02 0 01-3.09-5.53m3.8 1.32l-.71-1.79M12 6c1.05 0 2.09-.16 3.09-.47l.71-1.79m-3.8-1.32A5.97 5.97 0 0012 6m3.09 1.53l-.71-1.79m-2.38 1.32A6.02 6.02 0 0012 18a5.97 5.97 0 01-3.09-.47l-.71-1.79m3.8 1.32A5.97 5.97 0 0012 18m-3.09-1.53l.71-1.79m2.38-1.32a6.02 6.02 0 01-3.09-5.53m3.8 1.32l-.71-1.79M12 6c1.05 0 2.09-.16 3.09-.47l.71-1.79m-3.8-1.32A5.97 5.97 0 0012 6m3.09 1.53l-.71-1.79m-2.38 1.32A6.02 6.02 0 01-12 18c-1.05 0-2.09-.16-3.09-.47l-.71-1.79m3.8 1.32A5.97 5.97 0 00-12 18m-3.09-1.53l.71-1.79m2.38-1.32a6.02 6.02 0 00-3.09-5.53m3.8 1.32l-.71-1.79M-12 6c1.05 0 2.09-.16 3.09-.47l.71-1.79m-3.8-1.32A5.97 5.97 0 00-12 6m3.09 1.53l-.71-1.79m-2.38 1.32A6.02 6.02 0 00-12 18c-1.05 0-2.09-.16-3.09-.47l-.71-1.79m3.8 1.32A5.97 5.97 0 00-12 18m-3.09-1.53l.71-1.79m2.38-1.32a6.02 6.02 0 00-3.09-5.53m3.8 1.32l-.71-1.79M-12 6c1.05 0 2.09-.16 3.09-.47l.71-1.79"></path>
                    </svg>
                </div>
                <h3 class="mt-4 text-xl font-semibold text-gray-900">Customer Satisfaction</h3>
                <p class="mt-2 text-gray-600">We prioritize our customers' satisfaction and strive to exceed their expectations with every order.</p>
            </div>
        </div>
    </section>
</main>
</div>

@endsection