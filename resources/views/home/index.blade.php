@extends('home.homeBase')
@section('title', 'Home Delivery of Mithila Idli in Purnea – Fresh & Fast')
@section('description', 'Order Mithila Idli at home with fast delivery in Purnea. Fresh, affordable idli at just Rs. 20 per plate.')
@section('content')

    {{-- <div class="bg-[#6ab04c] h-full">
        <div class="main flex w-full pt-20 h-[100%] mb-20">
            <div class="w-1/2 px-6">
                <div id="default-carousel" class="relative w-full z-10" data-carousel="slide">
                    <!-- Carousel wrapper -->
                    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                        <!-- Item 1 -->
                        <div class="carousel-item active duration-700 ease-in-out" data-carousel-item>
                            <img src="/logo/idli3.JPG"
                                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="...">
                        </div>
                        <!-- Item 2 -->
                        <div class="carousel-item duration-700 ease-in-out" data-carousel-item>
                            <img src="/logo/idli2.JPG"
                                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="...">
                        </div>
                        <!-- Item 3 -->
                        <div class="carousel-item duration-700 ease-in-out" data-carousel-item>
                            <img src="/logo/idli1.png"
                                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="...">
                        </div>
                        <!-- Item 4 -->
                        <div class="carousel-item duration-700 ease-in-out" data-carousel-item>
                            <img src="/logo/idli1.png"
                                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="...">
                        </div>
                        <!-- Item 5 -->
                        <div class="carousel-item duration-700 ease-in-out" data-carousel-item>
                            <img src="/logo/idli2.JPG"
                                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="...">
                        </div>
                    </div>
                    <!-- Slider indicators -->
                    <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1"
                            data-carousel-slide-to="0"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
                            data-carousel-slide-to="1"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3"
                            data-carousel-slide-to="2"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4"
                            data-carousel-slide-to="3"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5"
                            data-carousel-slide-to="4"></button>
                    </div>
                    <!-- Slider controls -->
                    <button type="button"
                        class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                        data-carousel-prev>
                        <span
                            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 1 1 5l4 4" />
                            </svg>
                            <span class="sr-only">Previous</span>
                        </span>
                    </button>
                    <button type="button"
                        class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                        data-carousel-next>
                        <span
                            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 9 4-4-4-4" />
                            </svg>
                            <span class="sr-only">Next</span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="w-1/2 px-6 ">
                <h3 class="text-6xl text-white font-bold leading-snug mb-3">
                    START YOUR DAY WITH OUR TASTY AND DELICIOUS MITHILA IDLI.
                </h3>
                <p class="text-white font-medium  border-t-2 border-yellow-600  pt-2">To create new entrepreneurs by opening
                    branches at different places and through it to provide employment to numerous youths.</p>
                <a href="/order-now">
                    <button
                        class="px-3 py-2 font-medium text-[#6ab04c] bg-white  hover:bg-[] hover:text-black mt-2 rounded-lg "><i
                            class="fa-solid fa-circle-arrow-right"></i> Enjoy Our Special Idlis
                    </button>
                </a>
            </div>
        </div>
        <div class="card flex gap-10 px-8">
            <div class="w-1/2 flex bg-black px-4 py-12 rounded-xl">
                <div class="w-3/4 text-white">
                    <h3 class="text-3xl font-semibold">THE GREAT TASTE FROM THE SOUTH INDIA</h3>
                    <p class="text-base">Best breakfast in the town</p>
                </div>
                <div class="w-1/4">
                    <img src="/logo/idli5.png" alt="" class="h-40 ">
                </div>
            </div>
            <div class="w-1/2 flex bg-black px-4 py-12 rounded-xl">
                <div class="w-3/4 text-white">
                    <h3 class="text-3xl font-semibold">SPEND YOUR DAY WITH A CUP OF HOT COFEE</h3>
                    <p class="text-base">perfect mode for the day</p>
                </div>
                <div class="w-1/4">
                    <img src="/logo/cofee.png" alt="" class="h-40">
                </div>
            </div>
        </div>
        <div class="main flex w-full py-20 h-[100%] px-20">
            <div class="w-1/2 px-6 rounded-xl"><img src="/logo/idli4.jpg" class="h-80 rounded-xl" alt="">
            </div>
            <div class="w-1/2 px-6 mt-8">
                <h3 class="text-4xl text-white font-bold leading-snug mb-3">
                    FIND YOUR BEST TASTED FOOD & DRINK JUST IN ONE PLACE </h3>
                <p class="text-white font-medium  border-t-2 border-yellow-600  pt-2">The taste of southexidli idli is
                    because of these things that creep on everyone’s tongue and remind them constantly. There will be no
                    oily feeling while tasting the Sambar and Chutney made from wet coconut, which gives a sweet taste to
                    the tongue. People are fans of it.</p>
                <a href="/blog-page">
                    <button
                        class="px-3 py-2 font-medium text-[#6ab04c] bg-white  hover:bg-[] hover:text-black mt-2 rounded-md "><i
                            class="fa-solid fa-circle-arrow-right"></i> About Us</button>
                </a>
            </div>
        </div>
    </div>
    <div class="w-full flex gap-5 mt-5 mb-3 px-5">
        <div class="w-1/2 flex justify-center h-[400px] ">
            <div class="bg-white p-5 rounded-lg w-full shadow-lg">
                <h2 class="text-xl font-semibold mb-2">Ratings & Reviews</h2>
                <div class="flex items-center mb-4">
                    <span class="text-4xl font-bold">4.4</span>
                    <span class="text-yellow-500 ml-2">★</span>
                    <span class="ml-2 text-gray-500">(<span id="counting"></span> Ratings & <span
                            id="countingReview"></span> Reviews)</span>
                </div>
                <div class="space-y-1">
                    <div class="flex items-center">
                        <span class="w-8 text-right">5 ★</span>
                        <div class="w-full bg-gray-200 rounded-lg mx-2">
                            <div class="bg-green-500 h-2 rounded-lg" style="width: 0%" id="progressBar5"></div>
                        </div>
                        <span class="w-12 text-right" id="star5Count">4,754</span>
                    </div>
                    <div class="flex items-center">
                        <span class="w-8 text-right">4 ★</span>
                        <div class="w-full bg-gray-200 rounded-lg mx-2">
                            <div class="bg-green-400 h-2 rounded-lg" style="width: 0%" id="progressBar4"></div>
                        </div>
                        <span class="w-12 text-right" id="star4Count">1,708</span>
                    </div>
                    <div class="flex items-center">
                        <span class="w-8 text-right">3 ★</span>
                        <div class="w-full bg-gray-200 rounded-lg mx-2">
                            <div class="bg-yellow-400 h-2 rounded-lg" style="width: 0%" id="progressBar3"></div>
                        </div>
                        <span class="w-12 text-right" id="star3Count">439</span>
                    </div>
                    <div class="flex items-center">
                        <span class="w-8 text-right">2 ★</span>
                        <div class="w-full bg-gray-200 rounded-lg mx-2">
                            <div class="bg-yellow-400 h-2 rounded-lg" style="width: 0%" id="progressBar2"></div>
                        </div>
                        <span class="w-12 text-right" id="star2Count">166</span>
                    </div>
                    <div class="flex items-center">
                        <span class="w-8 text-right">1 ★</span>
                        <div class="w-full bg-gray-200 rounded-lg mx-2">
                            <div class="bg-red-500 h-2 rounded-lg" style="width: 0%" id="progressBar1"></div>
                        </div>
                        <span class="w-12 text-right"id="star1Count">448</span>
                    </div>
                </div>
                <div class="flex justify-end mt-5">
                    <button id="rateBtn"
                        class="bg-yellow-300 mt-5 hover:bg-yellow-500 text-white px-2 py-2 rounded-lg shadow">
                        Rate Now
                    </button>
                </div>
            </div>
        </div>
        <div class="w-1/2 mx-auto bg-white p-6 rounded-lg shadow-lg" id="callingReview">
            <div class="text-center mt-4">
                <a href="#" class="text-blue-600 hover:underline">All reviews</a>
            </div>
        </div>
    </div> --}}
    <div class="bg-[#6ab04c] h-full">
        <div class="main flex flex-col lg:flex-row w-full pt-20 h-auto mb-20">
            {{-- <div class="w-full lg:w-1/2 px-6">
                <div id="default-carousel" class="relative w-full z-10" data-carousel="slide">
                    <!-- Carousel wrapper -->
                    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                        <!-- Item 1 -->
                        <div class="carousel-item active duration-700 ease-in-out" data-carousel-item>
                            <img src="/logo/idli3.JPG"
                                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="...">
                        </div>
                        <!-- Item 2 -->
                        <div class="carousel-item duration-700 ease-in-out" data-carousel-item>
                            <img src="/logo/idli2.JPG"
                                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="...">
                        </div>
                        <!-- Item 3 -->
                        <div class="carousel-item duration-700 ease-in-out" data-carousel-item>
                            <img src="/logo/idli5.jpg"
                                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="...">
                        </div>
                        <!-- Item 4 -->
                        <div class="carousel-item duration-700 ease-in-out" data-carousel-item>
                            <img src="/logo/idli3.jpg"
                                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="...">
                        </div>
                        <!-- Item 5 -->
                        <div class="carousel-item duration-700 ease-in-out" data-carousel-item>
                            <img src="/logo/idli2.JPG"
                                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="...">
                        </div>
                    </div>
                    <!-- Slider indicators -->
                    <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1"
                            data-carousel-slide-to="0"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
                            data-carousel-slide-to="1"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3"
                            data-carousel-slide-to="2"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4"
                            data-carousel-slide-to="3"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5"
                            data-carousel-slide-to="4"></button>
                    </div>
                    <!-- Slider controls -->
                    <button type="button"
                        class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                        data-carousel-prev>
                        <span
                            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 1 1 5l4 4" />
                            </svg>
                            <span class="sr-only">Previous</span>
                        </span>
                    </button>
                    <button type="button"
                        class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                        data-carousel-next>
                        <span
                            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 9 4-4-4-4" />
                            </svg>
                            <span class="sr-only">Next</span>
                        </span>
                    </button>
                </div>
            </div> --}}
            <div class="w-full lg:w-1/2 px-6">
                <div id="default-carousel" class="relative w-full z-10" data-carousel="slide">
                    <!-- Carousel wrapper -->
                    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                        <!-- Item 1 -->
                        <div class="carousel-item active duration-700 ease-in-out" data-carousel-item>
                            <img src="{{asset('/logo/idli3.jpg')}}"
                                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="...">
                        </div>
                        <!-- Item 2 -->
                        <div class="carousel-item duration-700 ease-in-out" data-carousel-item>
                            <img src="{{asset('/logo/idli2.jpg')}}"
                                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="...">
                        </div>
                        <!-- Item 3 -->
                        <div class="carousel-item duration-700 ease-in-out" data-carousel-item>
                            <img src="{{asset('/logo/idli5.jpg')}}"
                                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="...">
                        </div>
                        <!-- Item 4 -->
                        <div class="carousel-item duration-700 ease-in-out" data-carousel-item>
                            <img src="{{asset('/logo/idli3.jpg')}}"
                                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="...">
                        </div>
                        <!-- Item 5 -->
                        <div class="carousel-item duration-700 ease-in-out" data-carousel-item>
                            <img src="{{asset('/logo/idli2.jpg')}}"
                                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="...">
                        </div>
                    </div>
                    <!-- Slider indicators -->
                    <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1"
                            data-carousel-slide-to="0"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
                            data-carousel-slide-to="1"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3"
                            data-carousel-slide-to="2"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4"
                            data-carousel-slide-to="3"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5"
                            data-carousel-slide-to="4"></button>
                    </div>
                    <!-- Slider controls -->
                    <button type="button"
                        class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                        data-carousel-prev>
                        <span
                            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 1 1 5l4 4" />
                            </svg>
                            <span class="sr-only">Previous</span>
                        </span>
                    </button>
                    <button type="button"
                        class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                        data-carousel-next>
                        <span
                            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 9 4-4-4-4" />
                            </svg>
                            <span class="sr-only">Next</span>
                        </span>
                    </button>
                </div>
            </div>
            
            <div class="w-full lg:w-1/2 px-6 mt-6 lg:mt-0">
                <h3 class="text-3xl md:text-6xl text-white font-bold leading-snug mb-3">
                    START YOUR DAY WITH OUR TASTY AND DELICIOUS MITHILA IDLI.
                </h3>
                <p class="text-white font-medium border-t-2 border-yellow-600 pt-2">To create new entrepreneurs by opening
                    branches at different places and through it to provide employment to numerous youths.</p>
                <a href="{{asset('/order-now')}}">
                    <button
                        class="px-3 py-2 font-medium text-[#6ab04c] bg-white hover:bg-[] hover:text-black mt-2 rounded-lg"><i
                            class="fa-solid fa-circle-arrow-right"></i> Enjoy Our Special Idlis
                    </button>
                </a>
            </div>
        </div>
        <div class="card flex flex-col lg:flex-row gap-10 px-8 mt-10">
            <div class="w-full lg:w-1/2 flex bg-black px-4 py-12 rounded-xl mb-6 lg:mb-0">
                <div class="w-3/4 text-white">
                    <h3 class="text-3xl font-semibold">THE GREAT TASTE FROM THE SOUTH INDIA</h3>
                    <p class="text-base">Best breakfast in the town</p>
                </div>
                <div class="w-1/4">
                    <img src="{{asset('/logo/idli5.png')}}" alt="" class="h-40">
                </div>
            </div>
            <div class="w-full lg:w-1/2 flex bg-black px-4 py-12 rounded-xl">
                <div class="w-3/4 text-white">
                    <h3 class="text-3xl font-semibold">START YOUR DAY WITH A PLATE OF DOSA</h3>
                    <p class="text-base">Perfect mode for the day</p>
                </div>
                <div class="w-1/4">
                    <img src="{{asset('/logo/dosa.png')}}" alt="" class="h-40">
                </div>
            </div>
        </div>
        <div class="main flex flex-col lg:flex-row w-full py-20 h-auto px-6 lg:px-20">
            <div class="w-full lg:w-1/2 px-6 rounded-xl mb-6 lg:mb-0"><img src="{{asset('/logo/idli4.jpg')}}" class="h-80 rounded-xl" alt="">
            </div>
            <div class="w-full lg:w-1/2 px-6 mt-8 lg:mt-0">
                <h3 class="text-3xl md:text-4xl text-white font-bold leading-snug mb-3">
                    FIND YOUR BEST TASTED FOOD & DRINK JUST IN ONE PLACE </h3>
                <p class="text-white font-medium border-t-2 border-yellow-600 pt-2">The taste of southexidli idli is because of these things that creep on everyone’s tongue and remind them constantly. There will be no oily feeling while tasting the Sambar and Chutney made from wet coconut, which gives a sweet taste to the tongue. People are fans of it.</p>
                <a href="{{url('/whyus')}}">
                    <button
                        class="px-3 py-2 font-medium text-[#6ab04c] bg-white hover:bg-[] hover:text-black mt-2 rounded-md"><i
                            class="fa-solid fa-circle-arrow-right"></i> Why Us</button>
                </a>
            </div>
        </div>
        <div class="w-full flex flex-col lg:flex-row gap-5 mt-5 mb-3 px-5 bg-white">
            <div class="w-full lg:w-1/2 flex justify-center h-auto lg:h-[400px] mb-6 lg:mb-0">
                <div class="bg-white p-5 rounded-lg w-full shadow-lg">
                    <h2 class="text-xl font-semibold mb-2">Ratings & Reviews</h2>
                    <div class="flex items-center mb-4">
                        <span class="text-4xl font-bold">4.4</span>
                        <span class="text-yellow-500 ml-2">★</span>
                        <span class="ml-2 text-gray-500">(<span id="counting"></span> Ratings & <span
                                id="countingReview"></span> Reviews)</span>
                    </div>
                    <div class="space-y-1">
                        <div class="flex items-center">
                            <span class="w-8 text-right">5 ★</span>
                            <div class="w-full bg-gray-200 rounded-lg mx-2">
                                <div class="bg-green-500 h-2 rounded-lg" style="width: 0%" id="progressBar5"></div>
                            </div>
                            <span class="w-12 text-right" id="star5Count">4,754</span>
                        </div>
                        <div class="flex items-center">
                            <span class="w-8 text-right">4 ★</span>
                            <div class="w-full bg-gray-200 rounded-lg mx-2">
                                <div class="bg-green-400 h-2 rounded-lg" style="width: 0%" id="progressBar4"></div>
                            </div>
                            <span class="w-12 text-right" id="star4Count">1,708</span>
                        </div>
                        <div class="flex items-center">
                            <span class="w-8 text-right">3 ★</span>
                            <div class="w-full bg-gray-200 rounded-lg mx-2">
                                <div class="bg-yellow-400 h-2 rounded-lg" style="width: 0%" id="progressBar3"></div>
                            </div>
                            <span class="w-12 text-right" id="star3Count">439</span>
                        </div>
                        <div class="flex items-center">
                            <span class="w-8 text-right">2 ★</span>
                            <div class="w-full bg-gray-200 rounded-lg mx-2">
                                <div class="bg-yellow-400 h-2 rounded-lg" style="width: 0%" id="progressBar2"></div>
                            </div>
                            <span class="w-12 text-right" id="star2Count">166</span>
                        </div>
                        <div class="flex items-center">
                            <span class="w-8 text-right">1 ★</span>
                            <div class="w-full bg-gray-200 rounded-lg mx-2">
                                <div class="bg-red-500 h-2 rounded-lg" style="width: 0%" id="progressBar1"></div>
                            </div>
                            <span class="w-12 text-right"id="star1Count">448</span>
                        </div>
                    </div>
                    <div class="flex justify-end mt-5">
                        <button id="rateBtn"
                            class="bg-yellow-400 mt-5 hover:text-black hover:bg-yellow-500 text-white px-2 py-2 rounded-lg shadow">
                            Rate Now
                        </button>
                    </div>
                </div>
            </div>
            <div class="w-full lg:w-1/2 mx-auto bg-white p-6 rounded-lg shadow-lg" id="callingReview">
                <div class="text-center mt-4">
                    <a href="#" class="text-blue-600 hover:underline">All reviews</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
    const carousel = document.querySelector('[data-carousel="slide"]');
    const items = carousel.querySelectorAll('[data-carousel-item]');
    let currentIndex = 0;
    const totalItems = items.length;

    function showItem(index) {
        items.forEach((item, i) => {
            item.classList.remove('active');
            if (i === index) {
                item.classList.add('active');
            }
        });
    }

    function nextItem() {
        currentIndex = (currentIndex + 1) % totalItems;
        showItem(currentIndex);
    }

    function prevItem() {
        currentIndex = (currentIndex - 1 + totalItems) % totalItems;
        showItem(currentIndex);
    }

    // Set interval for automatic slide
    setInterval(nextItem, 3000); // Change slide every 3 seconds

    // Attach event listeners for next and prev buttons
    carousel.querySelector('[data-carousel-next]').addEventListener('click', nextItem);
    carousel.querySelector('[data-carousel-prev]').addEventListener('click', prevItem);

    // Attach event listeners for indicators
    const indicators = carousel.querySelectorAll('[data-carousel-slide-to]');
    indicators.forEach((indicator, index) => {
        indicator.addEventListener('click', () => {
            currentIndex = index;
            showItem(currentIndex);
        });
    });
});

    </script>

    <script>
        $(document).ready(function() {
            // Function to fetch and display comments
            let callingData = (showAll = false) => {
                $.ajax({
                    type: "GET",
                    url: "{{ route('rate.index') }}",
                    success: function(response) {
                        let table = $("#callingReview");
                        table.empty();
                        let data = response.data;

                        // Filter comments based on status and non-null comments
                        let filteredData = data.filter(item => item.status === 1 && item.comment);

                        // Update appointment count
                        let total = data.length;
                        $("#counting").html(total);

                        let totalRev = filteredData.length;
                        $("#countingReview").html(totalRev);

                        let totalRate = filteredData.reduce((acc, item) => acc + item.rate, 0);
                        let avg = totalRate / total;
                        $("#average").html(avg.toFixed(2));

                        // Count star ratings
                        let starCounts = countStarRatings(data);
                        displayStarCounts(starCounts);

                        // progressbar
                        updateProgressBars(starCounts);

                        // Determine comments to display
                        let commentsToDisplay = showAll ? filteredData : filteredData.slice(-4);

                        commentsToDisplay.forEach((data) => {
                            let formattedDate = new Date(data.created_at)
                                .toLocaleDateString('en-US', {
                                    year: 'numeric',
                                    month: 'long',
                                    day: 'numeric'
                                });

                            table.append(`
                            <div class="border-b border-gray-200 pb-4 mb-4">
                                <div class="flex items-center mb-2">
                                    <div class="flex items-center bg-green-600 text-white rounded-md px-2">
                                        <span class="text-base font-semibold">${data.rate} ★</span>
                                    </div>
                                    <h3 class="text-lg font-semibold ml-2 truncate">${data.comment}</h3>
                                </div>
                                <div class="text-sm text-gray-500 flex flex-col items-start mt-2">
                                    <span class="ml-2 font-semibold">${data.name}, Our Valuable Customer</span>
                                    <span class="ml-2">Commented on : ${formattedDate}</span>
                                </div>
                            </div>   
                        `);
                        });

                        // Append "View All" button if not showing all comments
                        if (!showAll && filteredData.length > 4) {
                            table.append(`
                            <div class="text-center mt-4">
                                <button id="viewAllBtn" class="bg-blue-500 text-white px-4 py-2 rounded-md">View All</button>
                            </div>
                        `);

                            $("#viewAllBtn").on("click", function() {
                                callingData(true);
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            }
            // Function to count star ratings
            let countStarRatings = (data) => {
                let starCounts = {
                    1: 0,
                    2: 0,
                    3: 0,
                    4: 0,
                    5: 0
                };

                data.forEach(item => {
                    if (item.rate >= 1 && item.rate <= 5) {
                        starCounts[item.rate]++;
                    }
                });

                return starCounts;
            }

            // Function to display star counts
            let displayStarCounts = (starCounts) => {
                for (let star in starCounts) {
                    $(`#star${star}Count`).html(starCounts[star]);
                }
            }

            // Function to update progress bars
            let updateProgressBars = (starCounts) => {
                let totalStars = Object.values(starCounts).reduce((acc, count) => acc + count, 0);
                for (let star in starCounts) {
                    str = Number(starCounts[star]);
                    let percentage = (str / totalStars * 100);
                    $(`#progressBar${star}`).css("width", `${percentage}%`);
                }
            }

            // Initial call to fetch and display comments
            callingData();
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
        const button1 = document.getElementById('rateBtn');
        const button2 = document.getElementById('rateUsButton');

        button1.addEventListener('click', () => {
            button2.click();  // Trigger click event on button2 when button1 is clicked
        });

        button2.addEventListener('click', () => {
            console.log('Rate Us button  clicked!');
            // Add any other logic for button2 click event here
        });
    });
    </script>

    <style>
        .truncate {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
@endsection
