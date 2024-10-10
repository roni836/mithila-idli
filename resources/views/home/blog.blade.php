@extends('home.homeBase')
@section('title', 'Blogs')
@section('content')
    <div class="bg-gray-100 text-gray-800">
        <main class="container mx-auto px-6 py-12">
            
        <div class="relative">
            <div class="container mx-auto px-4 py-8 mt-20 ">
                <h1 class="text-4xl font-bold text-center text-blue-900 mb-8">Latest News Updates</h1>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-3" id="callingNewsData">
                    <!-- Update 1 -->
                    {{-- <a href="#" class="block">
                        <div class="bg-white shadow-md rounded-lg overflow-hidden hover:shadow-lg transition-shadow duration-300">
                            <img src="https://www.akshayapatra.org/includefiles/news/News_Droupadi-Murmu_600x400_22.jpg"
                                alt="Update 1 Image" class="w-full h-48 object-cover">
                            <div class="p-4">
                                <p class="text-blue-700 font-semibold">June 4, 2024</p>
                                <h2 class="text-xl font-bold text-gray-900 mb-2">Cargill and Akshaya Patra paint 1000 blackboards;
                                    set new Asia record</h2>
                                <span class="text-blue-500 hover:underline">Read More</span>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="block">
                        <div class="bg-white shadow-md rounded-lg overflow-hidden hover:shadow-lg transition-shadow duration-300">
                            <img src="https://www.akshayapatra.org/includefiles/news/News_Droupadi-Murmu_600x400_22.jpg"
                                alt="Update 1 Image" class="w-full h-48 object-cover">
                            <div class="p-4">
                                <p class="text-blue-700 font-semibold">June 4, 2024</p>
                                <h2 class="text-xl font-bold text-gray-900 mb-2">Cargill and Akshaya Patra paint 1000 blackboards;
                                    set new Asia record</h2>
                                <span class="text-blue-500 hover:underline">Read More</span>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="block">
                        <div class="bg-white shadow-md rounded-lg overflow-hidden hover:shadow-lg transition-shadow duration-300">
                            <img src="https://www.akshayapatra.org/includefiles/news/News_Droupadi-Murmu_600x400_22.jpg"
                                alt="Update 1 Image" class="w-full h-48 object-cover">
                            <div class="p-4">
                                <p class="text-blue-700 font-semibold">June 4, 2024</p>
                                <h2 class="text-xl font-bold text-gray-900 mb-2">Cargill and Akshaya Patra paint 1000 blackboards;
                                    set new Asia record</h2>
                                <span class="text-blue-500 hover:underline">Read More</span>
                            </div>
                        </div>
                    </a> --}}


                </div>

            </div>
        </div>
            <section class="text-center">
                <h2 class="text-4xl font-semibold text-gray-900 ">Our Blog</h2>
                <p class="mt-4 text-lg text-gray-600">Explore our latest articles, recipes, and tips on South Indian cuisine.
                </p>
            </section>

            <section class="mt-12 ">
                <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3" id="callingData"></div>
            </section>
            
        </main>
    </div>

    <script>
        $(document).ready(function() {
            // Function to fetch and display YouTube video data
            let fetchYouTubeData = () => {
                $.ajax({
                    type: "GET",
                    url: "{{ route('home.blog.index') }}", // Replace with your route to fetch YouTube video data
                    success: function(response) {
                        let card = $("#callingData");
                        card.empty();
                        let videos = response.data;
                        videos.forEach((video) => {
                            card.append(`
                                <div class="bg-white p-4 rounded-lg shadow-lg">
                                    <div class='text-center'>
                                        <iframe width="100%" height="315" src="${getYouTubeEmbedUrl(video.link)}" frameborder="0" allowfullscreen></iframe>
                                    </div>
                                    <h3 class="mt-4 text-xl font-semibold text-gray-900">${video.title}</h3>

                                     <p class="description line-clamp-3 mt-2 text-gray-600">${video.description}</p>

                                    <a href="${video.link}" target="_blank" rel="noopener noreferrer" class="mt-4 inline-block text-indigo-600 hover:underline">Watch on YouTube</a>
                                </div>
                            `);
                            console.log(getYouTubeEmbedUrl(video.link));
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            };
    
            // Function to get YouTube embed URL
            function getYouTubeEmbedUrl(link) {
                let videoId = getYouTubeVideoId(link);
                return `https://www.youtube.com/embed/${videoId}?autoplay=0&enablejsapi=1&controls=1&fs=1&rel=0&modestbranding=1&iv_load_policy=3`;
            }
    
            // Helper function to extract YouTube video ID
            function getYouTubeVideoId(url) {
                if (url.includes('/shorts/')) {
                    // If URL contains '/shorts/', extract video ID from shorts link
                    let videoId = url.match(/\/shorts\/([a-zA-Z0-9_-]{11})/);
                    if (videoId) {
                        return videoId[1];
                    }
                } else if (url.includes('youtu.be/')) {
                    // If URL contains 'youtu.be/', extract video ID from regular YouTube link
                    let videoId = url.match(/youtu\.be\/([a-zA-Z0-9_-]{11})/);
                    if (videoId) {
                        return videoId[1];
                    }
                } else if (url.includes('/embed/')) {
                    // If URL contains '/embed/', extract video ID from embed link
                    let parts = url.split('/');
                    let videoId = parts[parts.length - 1];
                    return videoId;
                } else {
                    // Default: extract video ID from regular YouTube link
                    let parts = url.split('/');
                    let videoId = parts[parts.length - 1];
                    return videoId;
                }
                return null; // Return null if no valid ID found
            }
    
            // Initial call to fetch YouTube data
            fetchYouTubeData();

            $(document).on('click', '.toggleButton', function() {
                const description = $(this).siblings('.description');
                if (description.hasClass('line-clamp-2')) {
                    description.removeClass('line-clamp-2');
                    $(this).html('<i class="fa-solid fa-angle-up"></i>');
                } else {
                    description.addClass('line-clamp-2');
                    $(this).html('<i class="fa-solid fa-angle-down"></i>');
                }
            });
        });
    </script>
     <script>
        $(document).ready(function() {
            // Function to fetch and display appointment
            let callingData = () => {
                $.ajax({
                    type: "GET",
                    url: "{{ route('home.gallery.all') }}",
                    success: function(response) {
                        let table = $("#callingNewsData");
                        table.empty();
                        let data = response.data;

                        console.log(data);
                        let len = data.length;
                        $("#counting").html(len);

                        data.forEach((data, key) => {
                            // Format created date
                            let date = new Date(data.delete_reason);
                            let formattedDate = date.toLocaleDateString('en-US', {
                                year: 'numeric',
                                month: 'long',
                                day: 'numeric'
                            });
                            table.append(`
                             <a href="${data.link}" target='_blank' class="block">
                                <div class="bg-white h-96 shadow-md rounded-lg overflow-hidden hover:shadow-lg transition-shadow duration-300">
                                    <img src="{{asset('/gallery/image/${data.image}')}}"
                                        alt="${data.title}" class="w-full h-52 object-cover">
                                    <div class="p-3">
                                        <p class="text-blue-700 text-base font-semibold">${formattedDate}</p>
                                        <h2 class="text-base font-bold text-gray-900 mb-1 line-clamp-2">${data.title}</h2>
                                        <p class="text-sm font-light text-gray-800 mb-1 line-clamp-3">${data.description}</p>                                        

                                        <span class="text-blue-500 hover:underline ">Visit now</span>
                                    </div>
                                </div>
                            </a>
                            `);
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            }
            callingData();

             $(document).on('click', '.toggleButton', function() {
                const description = $(this).siblings('.description');
                if (description.hasClass('line-clamp-2')) {
                    description.removeClass('line-clamp-2');
                    $(this).html('<i class="fa-solid fa-angle-up"></i>');
                } else {
                    description.addClass('line-clamp-2');
                    $(this).html('<i class="fa-solid fa-angle-down"></i>');
                }
            });
        });
    </script>
    

 {{-- code working but only for y-shorts  --}}
    {{-- <script>
        $(document).ready(function() {
            // Function to fetch and display YouTube video data
            let fetchYouTubeData = () => {
                $.ajax({
                    type: "GET",
                    url: "{{ route('blog.index') }}", // Replace with your route to fetch YouTube video data
                    success: function(response) {
                        let card = $("#callingData");
                        card.empty();
                        let videos = response.data;
                        videos.forEach((video) => {
                            card.append(`
                                <div class="bg-white p-4 rounded-lg shadow-lg">
                                    <div class='text-center'>
                                        <iframe width="100%" height="315" src="${getYouTubeEmbedUrl(video.link)}" frameborder="0" allowfullscreen></iframe>
                                    </div>
                                    <h3 class="mt-4 text-xl font-semibold text-gray-900">${video.title}</h3>
                                    <p class="mt-2 text-gray-600">${video.description}</p>
                                    <a href="${video.link}" target="_blank" rel="noopener noreferrer" class="mt-4 inline-block text-indigo-600 hover:underline">Watch on YouTube</a>
                                </div>
                            `);
                            console.log(getYouTubeEmbedUrl(video.link));
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            };

            // Function to get YouTube embed URL
            function getYouTubeEmbedUrl(link) {
                let videoId = getYouTubeVideoId(link);
                return `https://www.youtube.com/embed/${videoId}?autoplay=0&enablejsapi=1&controls=1&fs=1&rel=0&modestbranding=1&iv_load_policy=3`;
            }

            // Helper function to extract YouTube video ID
            function getYouTubeVideoId(url) {
                if (url.includes('/shorts/')) {
                    // If URL contains '/shorts/', extract video ID from shorts link
                    let videoId = url.match(/\/shorts\/([a-zA-Z0-9_-]{11})/)[1];
                    return videoId;
                } else if (url.includes('youtu.be/')) {
                    // If URL contains 'youtu.be/', extract video ID from regular YouTube link
                    let videoId = url.match(/youtu\.be\/([a-zA-Z0-9_-]{11})/)[1];
                    return videoId;
                } else if (url.includes('/embed/')) {
                    const parts = url.split('/'); // Split URL by '/'
                    const videoId = parts[parts.length - 1]; // Last part of the URL is the video ID
                    return videoId;
                } else {
                    const parts = url.split('/'); // Split URL by '/'
                    const videoId = parts[parts.length - 1]; // Last part of the URL is the video ID
                    return videoId;
                }
            }

            // Initial call to fetch YouTube data
            fetchYouTubeData();
        });
    </script> --}}


    {{-- below code is working properly  --}}

    {{-- <script>
        $(document).ready(function() {
            // Function to fetch and display appointment
            let callingData = () => {
                $.ajax({
                    type: "GET",
                    url: "{{ route('blog.index') }}",
                    success: function(response) {
                        let card = $("#callingData");
                        card.empty();
                        let data = response.data;
                        data.forEach((data) => {
                            card.append(`
                                <div class="bg-white p-4 rounded-lg shadow-lg ">
                                    <div class='text-center'>
                                        <img src="/blog/image/${data.image}" alt="Blog 1" class="h-64 w-full object-cover rounded-lg mx-auto">
                                    </div>
                                    <h3 class="mt-4 text-xl font-semibold text-gray-900">${data.title}</h3>
                                    <p class="mt-2 text-gray-600">${data.description}</p>
                                    <a href="${data.link}" target="_blank" rel="noopener noreferrer" class="mt-4 inline-block text-indigo-600 hover:underline">Read More</a>
                                </div>
                            `);
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            }
            callingData();
        });
    </script> --}}
@endsection
