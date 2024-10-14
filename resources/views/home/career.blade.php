@extends('home.homeBase')
@section('title', 'Career')
@section('content')
    {{-- <div class="bg-gray-100 text-gray-800">
    <main class="container mx-auto px-6 py-12">
        <section class="text-center">
            <h2 class="text-4xl font-semibold text-gray-900">Our Story</h2>
            <p class="mt-4 text-lg text-gray-600">Discover the journey behind Mithila Idli and our passion for authentic South Indian cuisine.</p>
        </section>
        <div class="flex mt-12">
            <div class=" w-3/4 " id="callingData">
             
            </div>
        </div>
    </main>
</div> --}}
    <div class="bg-gray-100 text-gray-800">
        <main class="container mx-auto px-6 py-12">
            <section class="text-center">
                <h2 class="text-4xl font-semibold text-gray-900">Career with us</h2>
                <p class="mt-4 text-lg text-gray-600">Discover the journey behind Mithila Idli and our passion for authentic
                    South Indian cuisine.</p>
            </section>
            <div class="flex flex-col md:flex-row mt-12">
                <div class="w-full md:w-3/4" id="callingData">
                </div>
            </div>
        </main>
    </div>

    <script>
        $(document).ready(function() {
            // Function to fetch and display appointment
            let callingData = () => {
                $.ajax({
                    type: "GET",
                    url: "{{ route('career.index') }}",
                    success: function(response) {
                        let card = $("#callingData");
                        card.empty();
                        let data = response.data;

                        data.filter(data => data.status == 1).forEach((data) => {
                            card.append(`

                            <div class="card w-full md:w-5/6 mb-4 capitalize">
                                <div class="block max-w-full md:w-5/6 p-4 bg-white border border-purple-300 rounded-lg hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                                    <div class="flex flex-col md:flex-row justify-between">
                                        <div class="flex flex-col md:flex-row gap-5">
                                            <div class="logo">
                                                <img src="{{ asset('/career/image/${data.image}') }}" class="rounded w-20 h-20" alt="">
                                            </div>
                                            <div class="name flex flex-col">
                                                <h5 class="font-semibold text-black">${data.title}</h5>
                                                <p class="text-gray-500 text-sm capitalize">${data.company}</p>
                                                <p class="text-gray-500 text-xs capitalize">${data.city},${data.state}</p>
                                            </div>
                                        </div>
                                        <div class="mt-4 md:mt-0">
                                            <p class="text-gray-600 text-sm"><strong class="text-red-600">Opening Date:</strong> ${data.opening_date}</p>
                                            <p class="text-gray-600 text-sm"><strong class="text-blue-600">Website:</strong> <a target="_blank" href='${data.website}' class='lowercase hover:underline'>${data.website}</a></p>
                                            <div class="mb-2">
                                                <h5 class="text-sm font-normal flex gap-2">
                                                    <p class='font-semibold text-gray-500'>No. of Post:</p>
                                                    <p class="text-sm">${data.no_of_post}</p>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="body mt-2 mb-2">
                                        <h5 class="text-sm font-normal text-gray-500 flex gap-2">
                                            <p class='font-semibold text-gray-500'>Job Profile:</p>
                                            <p class="text-sm">${data.profile}</p>
                                        </h5>
                                    </div>
                                    <div class="mb-2 mt-2">
                                        <h5 class="text-sm font-normal text-gray-500 flex gap-2">
                                            <p class='font-semibold text-gray-500'>Job Type:</p>
                                            <p class="text-sm">${data.job_type}</p>
                                        </h5>
                                    </div>
                                    <div class="main flex flex-col md:flex-row justify-start text-gray-500">
                                        <div class="mb-2">
                                            <h5 class="text-sm font-normal flex gap-2">
                                                <p class='font-semibold text-gray-500'>Experience:</p>
                                                <p class="text-sm">${data.min_experience}-${data.max_experience} Years</p>
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="main flex flex-col md:flex-row justify-start text-gray-500">
                                        <div class="mb-2">
                                            <h5 class="text-sm font-normal flex gap-2">
                                                <p class='font-semibold text-gray-500'>Language Required:</p>
                                                <p class="text-sm">${data.language}</p>
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="main flex flex-col md:flex-row justify-start text-gray-500">
                                        <div class="mb-2">
                                            <h5 class="text-sm font-normal flex gap-2">
                                                <p class='font-semibold text-gray-500'>Qualification:</p>
                                                <p class="text-sm">${data.qualification}</p>
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="main flex flex-col md:flex-row justify-start text-gray-500">
                                        <div class="mb-2">
                                            <h5 class="text-sm font-normal flex gap-2">
                                                <p class='font-semibold text-gray-500'>Salary:</p>
                                                <p><i class="fa-solid fa-indian-rupee-sign fa-xs"></i>${data.min_salary}</p> -<p><i class="fa-solid fa-indian-rupee-sign fa-xs"></i>${data.max_salary}</p>
                                            </h5>
                                        </div>
                                    </div>
                                    <hr class="bg-gray-500">
                                    <div class="footer flex gap-6 font-medium mt-2 capitalize text-xs">
                                        <p class="description line-clamp-2">${data.description}</p>
                                        <button class="toggleButton text-blue-500"><i class="fa-solid fa-angle-down"></i></button>
                                    </div>
                                    <div class="button flex flex-col md:flex-row gap-5 mt-5">
                                        <a href="{{ url('/career-applied/${data.id}') }}" class="bg-green-600 rounded hover:bg-green-700 text-center text-white py-1 w-full md:w-1/2">Apply For Job</a>
                                        <button class="share-btn rounded text-green-700 border border-green-700 text-center px-auto flex justify-center py-1 w-full md:w-1/2"> 
                                            <img src="{{ asset('/icons/share.png') }}" class="h-6 mr-1" alt="">Share
                                        </button>
                                    </div>
                                </div>
                            </div>
                        `);
                        });

                        // Activate sharing on clicking share button
                        $(".share-btn").on("click", function() {
                            let jobTitle = $(this).closest('.card').find('.name h5').text();
                            let jobUrl = $(this).closest('.card').find('a').attr('href');

                            // Use Web Share API if supported
                            if (navigator.share) {
                                navigator.share({
                                    title: jobTitle,
                                    text: "Check out this job opening: " + jobTitle,
                                    url: jobUrl
                                }).then(() => {
                                    console.log('Thanks for sharing!');
                                }).catch((error) => {
                                    console.error('Error sharing:', error);
                                });
                            } else {
                                // Fallback for desktops: Open a modal with share options
                                alert('Share this job link: ' + jobUrl);
                            }
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




@endsection
