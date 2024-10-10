<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- @vite('resources/css/app.css') --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>@yield('title') - {{env('APP_NAME')}}</title>
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
    </style>
</head>

<body>
    <nav class="bg-[#f39c12] shadow-lg">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Logo Section -->
                <div class="flex items-center">
                    <a href="{{url('/')}}">
                        <img src="{{asset('/logo/header-logo.png')}}" alt="Logo" class="h-12 w-auto sm:h-14">
                    </a>
                </div>
                
                <!-- Menu for Desktop -->
                <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="hidden sm:block sm:ml-6">
                        <div class="flex space-x-4 items-center">
                            <a href="{{url('/')}}" class="text-white hover:text-black px-3 py-2 rounded-md text-base font-medium transition duration-300">Home</a>
                            <a href="{{url('/whyus')}}" class="text-white hover:text-black px-3 py-2 rounded-md text-base font-medium transition duration-300">Why Us</a>
                            <a href="{{url('/brand-story')}}" class="text-white hover:text-black px-3 py-2 rounded-md text-base font-medium transition duration-300">Brand Story</a>
                            <a href="{{url('/career-page')}}" class="text-white hover:text-black px-3 py-2 rounded-md text-base font-medium transition duration-300">Careers</a>
                            <a href="{{url('/franchise-query')}}" class="text-white hover:text-black px-3 py-2 rounded-md text-base font-medium transition duration-300">Franchise Query</a>
                            <a href="{{url('/cart-locator')}}" class="text-white hover:text-black px-3 py-2 rounded-md text-base font-medium transition duration-300">Cart Locator</a>
                            <a href="{{url('/blog-page')}}" class="text-white hover:text-black px-3 py-2 rounded-md text-base font-medium transition duration-300">Blogs</a>
                        </div>
                    </div>
                </div>
                
                <!-- Buttons for Desktop -->
                <div class="flex flex-col md:flex-row md:gap-5 gap-1">
                    <a href="{{url('/book-event-page')}}" class="w-full md:w-auto px-4 text-sm md:text-normal md:py-2 py-1 font-medium text-[#6ab04c] bg-white hover:text-black rounded-lg transition duration-300">
                        <i class="fa-solid fa-gift mr-2"></i>Book An Event
                    </a>
                    <a href="{{url('/order-now')}}" class="w-full md:w-auto px-4 text-sm md:text-normal md:py-2 py-1 font-medium text-[#6ab04c] bg-white hover:text-black rounded-lg transition duration-300">
                        <i class="fas fa-cart-plus mr-2"></i>Bulk Order
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
                        <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" aria-hidden="true">
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
                <a href="{{url('/')}}" class="text-white hover:text-black block px-3 py-2 rounded-md text-base font-medium transition duration-300">Home</a>
                <a href="{{url('/whyus')}}" class="text-white hover:text-black block px-3 py-2 rounded-md text-base font-medium transition duration-300">Why Us</a>
                <a href="{{url('/brand-story')}}" class="text-white hover:text-black block px-3 py-2 rounded-md text-base font-medium transition duration-300">Brand Story</a>
                <a href="{{url('/career-page')}}" class="text-white hover:text-black block px-3 py-2 rounded-md text-base font-medium transition duration-300">Careers</a>
                <a href="{{url('/franchise-query')}}" class="text-white hover:text-black block px-3 py-2 rounded-md text-base font-medium transition duration-300">Franchise Query</a>
                <a href="{{url('/cart-locator')}}" class="text-white hover:text-black block px-3 py-2 rounded-md text-base font-medium transition duration-300">Cart Locator</a>
                <a href="{{url('/blog-page')}}" class="text-white hover:text-black block px-3 py-2 rounded-md text-base font-medium transition duration-300">Blogs</a>
            </div>
        </div>
    </nav>
    
    
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const menuButton = document.querySelector('button[aria-controls="mobile-menu"]');
            const mobileMenu = document.getElementById('mobile-menu');
    
            menuButton.addEventListener('click', function () {
                const expanded = menuButton.getAttribute('aria-expanded') === 'true' || false;
                menuButton.setAttribute('aria-expanded', !expanded);
                mobileMenu.classList.toggle('hidden');
            });
        });
    </script>
    

    <div class="fixed top-1/2 right-0 transform -translate-y-1/2 z-20">
        <button id="rateUsButton" class="bg-yellow-400 hover:text-black hover:bg-yellow-500 text-white px-2 py-6 rounded-l-lg shadow vertical-text">
            Rate Us
        </button>
    </div>

    <div id="rateUsModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 z-30 flex items-center justify-center modal">
        <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all max-w-lg w-full p-6 ">
            <div class="text-right">
                <button id="closeModal" class="text-gray-500 text-4xl">&times;</button>
            </div>
            <h2 class="text-2xl mb-4">Rate Us</h2>
            <form id="rateUsForm" class="space-y-4">
                    {{-- <label class="block mb-2">Rating:</label> --}}
                    <div class="flex justify-between md:w-full">
                        <button type="button" class="rating-star md:p-8 px-3 py-3 text-4xl hover:text-yellow-400" data-rating="1">&#9733;</button>
                        <button type="button" class="rating-star md:p-8 px-3 py-3 text-4xl hover:text-yellow-400" data-rating="2">&#9733;</button>
                        <button type="button" class="rating-star md:p-8 px-3 py-3 text-4xl hover:text-yellow-400" data-rating="3">&#9733;</button>
                        <button type="button" class="rating-star md:p-8 px-3 py-3 text-4xl hover:text-yellow-400" data-rating="4">&#9733;</button>
                        <button type="button" class="rating-star md:p-8 px-3 py-3 text-4xl hover:text-yellow-400" data-rating="5">&#9733;</button>
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
                    <label for="comment" class="block mb-2">Comment (Optional) :</label>
                    <textarea id="comment" name="comment" rows="3" class="w-full border rounded p-2"></textarea>
                </div>
    
                <div class="text-right">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded shadow">Submit</button>
                </div>
            </form>
        </div>
    </div>
    
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
                        window.open("{{url('/')}}", "_self");
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
                        <li><a href="{{url('/')}}" class="hover:text-white">Home</a></li>
                        {{-- <li><a href="#" class="hover:text-white"></a></li> --}}
                        <li><a href="{{url('brand-story')}}" class="hover:text-white">About</a></li>
                        <li><a href="{{url('order-now')}}" class="hover:text-white">Contact</a></li>
                    </ul>
                </div>
    
                <div class="w-full md:w-1/4 mb-6">
                    <h4 class="text-white text-lg mb-4">Contact Us</h4>
                    <p><i class="fas fa-map-marker-alt mr-2"></i>Rambagh, Purnea, Bihar</p>
                    <p><i class="fas fa-phone mr-2"></i>(+91) {{env('PHONE_NO')}}</p>
                    <p><i class="fas fa-envelope mr-2"></i>mithilaidli@gmail.com</p>
                </div>
    
                <div class="w-full md:w-1/4 mb-6">
                    <h4 class="text-white text-lg mb-4">Follow Us</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-facebook-f"></i></a>
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
