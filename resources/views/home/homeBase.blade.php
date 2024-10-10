<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description"
        content="Enjoy the best Mithila Idli across Purnea for Rs. 20 per plate. Find our street carts and enjoy fresh, affordable street food!">
    <meta name="keywords"
        content="Mithila Idli, Idli in Purnea, Street Food in Purnea, Best Idli Bihar, Cheap Idli Purnea">
    <meta name="author" content="Mithila Idli">
    <meta name="description" content="Find our Mithila Idli cart at in Purnea for fresh and affordable street food.">
    <meta name="keywords" content="Idli in Purnea, Street Food Purnea, Mithila Idli, Affordable Idli Bihar">
    {{-- @vite('resources/css/app.css') --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    {{-- <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/assets_web/img/favicons/favicon-96x96.png')}}"> --}}
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('/logo/header-logo.png') }}">

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>@yield('title') - {{ env('APP_NAME') }}</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }

        .carousel-item {
            display: none;
        }

        .carousel-item.active {
            display: block;
        }

        .modal {
            transition: opacity 0.25s ease;
        }

        body.modal-active {
            overflow-x: hidden;
            overflow-y: visible !important;
        }

        .vertical-text {
            writing-mode: vertical-rl;
            text-orientation: mixed;
        }

        #loader {
            position: fixed;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            z-index: 9999;
        }
    </style>
</head>

<body>
    <nav class="bg-[#f39c12] shadow-lg">
        <div class="max-w-full mx-auto px-2 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16 md:mx-16">
                <!-- Logo Section -->
                <div class="flex items-center">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('/logo/header-logo.png') }}" alt="Logo" style="height: 4rem"
                            class="w-auto sm:h-14">
                    </a>
                </div>

                <!-- Menu for Desktop -->
                <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="hidden sm:block sm:ml-6">
                        <div class="flex space-x-4 items-center">
                            <a href="{{ url('/') }}"
                                class="text-white hover:text-black px-3 py-2 rounded-md text-base font-medium transition duration-300">Home</a>
                            <a href="{{ url('/whyus') }}"
                                class="text-white hover:text-black px-3 py-2 rounded-md text-base font-medium transition duration-300">Why
                                Us</a>
                            <a href="{{ url('/brand-story') }}"
                                class="text-white hover:text-black px-3 py-2 rounded-md text-base font-medium transition duration-300">Brand
                                Story</a>
                            <a href="{{ url('/career-page') }}"
                                class="text-white hover:text-black px-3 py-2 rounded-md text-base font-medium transition duration-300">Careers</a>
                            <a href="{{ url('/franchise-query') }}"
                                class="text-white hover:text-black px-3 py-2 rounded-md text-base font-medium transition duration-300">Franchise
                                Query</a>
                            <a href="{{ url('/cart-locator') }}"
                                class="text-white hover:text-black px-3 py-2 rounded-md text-base font-medium transition duration-300">Cart
                                Locator</a>
                            <a href="{{ url('/blog-page') }}"
                                class="text-white hover:text-black px-3 py-2 rounded-md text-base font-medium transition duration-300">Blogs</a>
                        </div>
                    </div>
                </div>

                <!-- Buttons for Desktop -->
                <div class="md:flex hidden md:flex-row md:gap-5 gap-1">
                    {{-- <a href="{{ url('/book-event-page') }}"
                        class="w-full md:w-auto px-4 text-sm md:text-normal md:py-2 py-1 font-medium text-[#6ab04c] bg-white hover:text-black rounded-lg transition duration-300">
                        <i class="fa-solid fa-gift mr-2"></i>Book An Event
                    </a> --}}
                    <a href="{{ url('/order-now') }}"
                        class="w-full md:w-auto px-4 text-sm md:text-normal md:py-2 py-1 font-medium text-[#6ab04c] bg-white hover:text-black rounded-lg transition duration-300">
                        <i class="fas fa-cart-plus mr-2"></i>Order Now
                    </a>
                    <a href="{{ url('/track-now') }}"
                        class="w-full md:w-auto px-4 text-sm md:text-normal md:py-2 py-1 font-medium text-[#6ab04c] bg-white hover:text-black rounded-lg transition duration-300">
                        <i class="fa-solid fa-location-dot mr-2"></i>Track Order
                    </a>
                </div>

                <!-- Hamburger menu for Mobile -->
                <div class=" inset-y-0 right-0 flex items-center sm:hidden">
                    <button type="button"
                        class="inline-flex items-center justify-center p-2 rounded-md text-white hover:text-black focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                        aria-controls="mobile-menu" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16m-7 6h7" />
                        </svg>
                        <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu -->
        <div class="hidden" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="{{ url('/') }}"
                    class="text-white hover:text-black block px-3 py-2 rounded-md text-base font-medium transition duration-300">Home</a>
                <a href="{{ url('/whyus') }}"
                    class="text-white hover:text-black block px-3 py-2 rounded-md text-base font-medium transition duration-300">Why
                    Us</a>
                <a href="{{ url('/brand-story') }}"
                    class="text-white hover:text-black block px-3 py-2 rounded-md text-base font-medium transition duration-300">Brand
                    Story</a>
                <a href="{{ url('/career-page') }}"
                    class="text-white hover:text-black block px-3 py-2 rounded-md text-base font-medium transition duration-300">Careers</a>
                <a href="{{ url('/franchise-query') }}"
                    class="text-white hover:text-black block px-3 py-2 rounded-md text-base font-medium transition duration-300">Franchise
                    Query</a>
                <a href="{{ url('/cart-locator') }}"
                    class="text-white hover:text-black block px-3 py-2 rounded-md text-base font-medium transition duration-300">Cart
                    Locator</a>
                <a href="{{ url('/blog-page') }}"
                    class="text-white hover:text-black block px-3 py-2 rounded-md text-base font-medium transition duration-300">Blogs</a>
            </div>
        </div>
    </nav>



    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuButton = document.querySelector('button[aria-controls="mobile-menu"]');
            const mobileMenu = document.getElementById('mobile-menu');

            menuButton.addEventListener('click', function() {
                const expanded = menuButton.getAttribute('aria-expanded') === 'true' || false;
                menuButton.setAttribute('aria-expanded', !expanded);
                mobileMenu.classList.toggle('hidden');
            });
        });
    </script>

    <div class="fixed md:hidden bottom-0 left-0 z-50 w-full h-16 bg-white border-t border-gray-200 ">
        <div class="grid h-full max-w-lg grid-cols-4 mx-auto font-medium">
            <a href="{{ url('') }}" type="button"
                class="inline-flex flex-col items-center justify-center px-5 hover:bg-gray-50  group">
                <svg class="w-[32px] h-[32px] text-gray-800 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                        d="m4 12 8-8 8 8M6 10.5V19a1 1 0 0 0 1 1h3v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h3a1 1 0 0 0 1-1v-8.5" />
                </svg>

                <span
                    class="text-sm text-gray-500 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500">Home</span>
            </a>
            <a href="{{ url('order-now') }}" type="button"
                class="inline-flex flex-col items-center justify-center px-5 hover:bg-gray-50  group">
                <svg class="w-[32px] h-[32px] text-gray-800 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                        d="M9 10V6a3 3 0 0 1 3-3v0a3 3 0 0 1 3 3v4m3-2 .917 11.923A1 1 0 0 1 17.92 21H6.08a1 1 0 0 1-.997-1.077L6 8h12Z" />
                </svg>
                <span
                    class="text-sm truncate text-gray-500 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500">Order
                    Now</span>
            </a>

            {{-- <a href="{{url('book-event-page')}}" type="button"
                class="inline-flex flex-col items-center justify-center hover:bg-gray-50  group">
                <svg class="w-[32px] h-[32px] text-gray-800 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                        d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7H7.312" />
                </svg>
                <span
                    class="text-sm text-gray-500 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500">Event Order</span> --}}
            </a>
            <a href="{{ url('track-now') }}" type="button"
                class="inline-flex flex-col items-center justify-center px-5 hover:bg-gray-50  group">
                <svg class="w-[30px] h-[30px] text-gray-800 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                        d="M12 12c2.21 0 4-1.79 4-4S14.21 4 12 4 8 5.79 8 8s1.79 4 4 4Zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4Z" />
                </svg>

                <span
                    class="text-sm text-gray-500 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500">Track</span>
            </a>
            <button type="button" id="rateUsButtonMob"
            class="inline-flex flex-col items-center justify-center px-5 hover:bg-gray-50  group">
            {{-- <svg class="w-[32px] h-[32px] text-gray-800 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                    d="M8.891 15.107 15.11 8.89m-5.183-.52h.01m3.089 7.254h.01M14.08 3.902a2.849 2.849 0 0 0 2.176.902 2.845 2.845 0 0 1 2.94 2.94 2.849 2.849 0 0 0 .901 2.176 2.847 2.847 0 0 1 0 4.16 2.848 2.848 0 0 0-.901 2.175 2.843 2.843 0 0 1-2.94 2.94 2.848 2.848 0 0 0-2.176.902 2.847 2.847 0 0 1-4.16 0 2.85 2.85 0 0 0-2.176-.902 2.845 2.845 0 0 1-2.94-2.94 2.848 2.848 0 0 0-.901-2.176 2.848 2.848 0 0 1 0-4.16 2.849 2.849 0 0 0 .901-2.176 2.845 2.845 0 0 1 2.941-2.94 2.849 2.849 0 0 0 2.176-.901 2.847 2.847 0 0 1 4.159 0Z" />
            </svg> --}}
            <svg class="w-[32px] h-[32px] text-gray-500" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <path  stroke-width="1" d="M12 21C12 21 4.5 13.67 4.5 8.5 4.5 5.74 6.5 4 9 4c1.64 0 3.04.78 3.95 2.05C14.96 4.78 16.36 4 18 4c2.5 0 4.5 1.74 4.5 4.5 0 5.17-7.5 12.5-7.5 12.5z"/>
            </svg>

            <span
                class="text-sm text-gray-500 dark:text-gray-800 group-hover:text-blue-600 dark:group-hover:text-blue-500">Rate Us</span>
        </button>

        </div>
    </div>


    <div class="md:fixed md:top-1/2 md:right-0 hidden md:block md:transform md:-translate-y-1/2 md:z-20">
        <button id="rateUsButton"
            class="bg-yellow-400 hover:text-black hover:bg-yellow-500 text-white px-2 py-6 rounded-l-lg shadow vertical-text">
            Rate Us
        </button>
    </div>

    <div id="rateUsModal"
        class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 z-30 flex items-center justify-center modal">
        <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all max-w-lg w-full p-6 ">
            <div class="text-right">
                <button id="closeModal" class="text-gray-500 text-4xl">&times;</button>
            </div>
            <h2 class="text-2xl mb-4">Rate Us</h2>
            <form id="rateUsForm" class="space-y-4">
                {{-- <label class="block mb-2">Rating:</label> --}}
                <div class="flex justify-between md:w-full">
                    <button type="button"
                        class="rating-star md:p-8 px-3 py-3 text-4xl text-gray-400 hover:text-yellow-400"
                        data-rating="1">&#9733;</button>
                    <button type="button"
                        class="rating-star md:p-8 px-3 py-3 text-4xl text-gray-400 hover:text-yellow-400"
                        data-rating="2">&#9733;</button>
                    <button type="button"
                        class="rating-star md:p-8 px-3 py-3 text-4xl text-gray-400 hover:text-yellow-400"
                        data-rating="3">&#9733;</button>
                    <button type="button"
                        class="rating-star md:p-8 px-3 py-3 text-4xl text-gray-400 hover:text-yellow-400"
                        data-rating="4">&#9733;</button>
                    <button type="button"
                        class="rating-star md:p-8 px-3 py-3 text-4xl text-gray-400 hover:text-yellow-400"
                        data-rating="5">&#9733;</button>
                </div>
                <p id="error-rate" class="text-red-500 text-xs font-semibold error-message"></p>
                <div>
                    <label for="name" class="block mb-2">Name:</label>
                    <input type="text" id="name" name="name" class="w-full border rounded p-2">
                    <p id="error-name" class="text-red-500 text-xs font-semibold error-message"></p>
                </div>
                <div>
                    <label for="mobile" class="block mb-2">Mobile:</label>
                    <input type="tel" id="mobile" name="mobile" class="w-full border rounded p-2">
                    <p id="error-mobile" class="text-red-500 text-xs font-semibold error-message"></p>
                </div>
                <div>
                    <label for="comment" class="block mb-2">Comment :</label>
                    <textarea id="comment" name="comment" rows="3" class="w-full border rounded p-2"></textarea>
                    <p id="error-comment" class="text-red-500 text-xs font-semibold error-message"></p>
                </div>

                <div class="text-right">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded shadow">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
        const button3 = document.getElementById('rateUsButtonMob');
        const button2 = document.getElementById('rateUsButton');

        button3.addEventListener('click', () => {
            button2.click();  // Trigger click event on button2 when button1 is clicked
        });

        button2.addEventListener('click', () => {
            console.log('Rate Us button  clicked!');
            // Add any other logic for button2 click event here
        });
    });
    </script>

    <script>
        // Get elements
        const rateUsButton = document.getElementById('rateUsButton');
        const rateUsModal = document.getElementById('rateUsModal');
        const closeModal = document.getElementById('closeModal');
        const ratingStars = document.querySelectorAll('.rating-star');
        let selectedRating = 0;

        // Show modal
        rateUsButton.addEventListener('click', () => {
            rateUsModal.classList.remove('hidden');
            document.body.classList.add('modal-active');
        });

        // Hide modal
        closeModal.addEventListener('click', () => {
            rateUsModal.classList.add('hidden');
            document.body.classList.remove('modal-active');
        });

        // Select rating
        ratingStars.forEach(star => {
            star.addEventListener('click', () => {
                selectedRating = star.getAttribute('data-rating');
                ratingStars.forEach(s => s.classList.remove('text-yellow-500'));
                for (let i = 0; i < selectedRating; i++) {
                    ratingStars[i].classList.add('text-yellow-500');
                }
            });
        });

        // Submit form
        document.getElementById('rateUsForm').addEventListener('submit', function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            formData.append('rate', selectedRating);
            $.ajax({
                type: "POST",
                url: "{{ route('rate.store') }}",
                data: formData,
                dataType: "JSON",
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                    swal("Thanking So Much", response.message, "success");
                    $("#rateUsForm").trigger("reset");
                    setTimeout(function() {
                        window.open("{{ url('/') }}", "_self");
                    }, 4000);
                },
                error: function(xhr) {
                    $('.error-message').html('');
                    if (xhr.status === 422) {
                        var errors = xhr.responseJSON.errors;
                        $('.error-message').html(''); // Clear previous error messages
                        $.each(errors, function(key, value) {
                            $('#error-' + key).html(value[0]).show();
                        });
                    } else {
                        alert('An error occurred. Please try again.');
                    }
                }
            });
        });
    </script>


    @yield('content')
@show


{{-- <footer class="bg-gray-900 text-gray-400 py-12">
        <div class="container mx-auto px-4 md:px-5">
            <div class="flex justify-between">
                <div class="w-full md:w-1/4 mb-6">
                    <h4 class="text-white text-lg mb-4">About Us</h4>
                    <p class="text-gray-400">Welcome to our Mithila Idli ! We offer the finest cuisine with fresh
                        ingredients and a welcoming atmosphere.</p>
                </div>

                <div class="w-full md:w-1/4 mb-6">
                    <h4 class="text-white text-lg mb-4">Quick Links</h4>
                    <ul class="list-none">
                        <li><a href="#" class="hover:text-white">Home</a></li>
                        <li><a href="#" class="hover:text-white">Menu</a></li>
                        <li><a href="#" class="hover:text-white">About</a></li>
                        <li><a href="#" class="hover:text-white">Contact</a></li>
                    </ul>
                </div>

                <div class="w-full md:w-1/4 mb-6">
                    <h4 class="text-white text-lg mb-4">Contact Us</h4>
                    <p><i class="fas fa-map-marker-alt mr-2"></i>Panchwati Chowk, Purnea, Bihar</p>
                    <p><i class="fas fa-phone mr-2"></i>(123) 456-7890</p>
                    <p><i class="fas fa-envelope mr-2"></i>info@mithilaidli.com</p>
                </div>

                <div class="w-full md:w-1/4 mb-6">
                    <h4 class="text-white text-lg mb-4">Follow Us</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white"><i
                                class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>

            <div class="mt-8 border-t border-gray-700 pt-6 text-center">
                <p>&copy; 2024 Mithila Idli. All rights reserved.</p>
            </div>
        </div>
    </footer> --}}

<a href="https://wa.me/9955232260" target="_blank" class="fixed md:bottom-10 bottom-20 right-2 md:right-10 z-20">
    <div class="bg-green-500 rounded-full p-5 shadow-lg text-white hover:text-gray-100 hover:bg-green-600">
        <i class="fa-brands fa-whatsapp fa-2xl  " style="line-height: 1;"></i>
    </div>
</a>

<footer class="bg-gray-900 text-gray-400 py-12">
    <div class="container mx-auto px-4 md:px-5">
        <div class="flex flex-col md:flex-row justify-between md:gap-10">
            <div class="w-full md:w-1/4 mb-6">
                <h4 class="text-white text-lg mb-4">About Us</h4>
                <p class="text-gray-400">Welcome to our Mithila Idli ! We offer the finest cuisine with fresh
                    ingredients and a welcoming atmosphere.</p>
            </div>

            <div class="w-full md:w-1/4 mb-6">
                <h4 class="text-white text-lg mb-4">Quick Links</h4>
                <ul class="list-none">
                    <li><a href="{{ url('/') }}" class="hover:text-white">Home</a></li>
                    {{-- <li><a href="#" class="hover:text-white"></a></li> --}}
                    <li><a href="{{ url('brand-story') }}" class="hover:text-white">About</a></li>
                    <li><a href="{{ url('order-now') }}" class="hover:text-white">Contact</a></li>
                </ul>
            </div>

            <div class="w-full md:w-1/4 mb-6">
                <h4 class="text-white text-lg mb-4">Contact Us</h4>
                <p><i class="fas fa-map-marker-alt mr-2"></i>Rambagh, Purnea, Bihar</p>
                <p><i class="fas fa-phone mr-2"></i>(+91) {{ env('PHONE_NO') }}</p>
                <p><i class="fas fa-envelope mr-2"></i>mithilaidli@gmail.com</p>
            </div>

            <div class="w-full md:w-1/4 mb-6">
                <h4 class="text-white text-lg mb-4">Follow Us</h4>
                <div class="flex space-x-4">
                    <a href="#" class="text-gray-400 hover:text-white"><i
                            class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
        </div>

        <div class="mt-8 border-t border-gray-700 pt-6 text-center">
            <p>&copy; 2024 Mithila Idli. All rights reserved.</p>
        </div>
    </div>
</footer>

</body>

</html>
