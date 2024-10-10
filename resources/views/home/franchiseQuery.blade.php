@extends('home.homeBase')
@section('title', 'Franchise Inquiry')
@section('content')
    <div class="bg-gray-100 text-gray-800">
        <main class="container mx-auto px-6 py-12">
            <section class="text-center">
                <h2 class="text-4xl font-semibold text-gray-900">Franchise Inquiry</h2>
                <p class="mt-4 text-lg text-gray-600">Join the Mithila Idli family and bring authentic South Indian cuisine to your community.</p>
            </section>

            <section class="mt-12">
                <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-lg">
                    <h3 class="text-2xl font-semibold text-gray-900 mb-6">Fill Out the Form Below</h3>
                    <form action="" method="POST" class="space-y-6" id="addData">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                            <input type="text" name="name" id="name" 
                                class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <p id="error-name" class="text-red-500 text-xs font-semibold error-message"></p>
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                            <input type="email" name="email" id="email" 
                                class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <p id="error-email" class="text-red-500 text-xs font-semibold error-message"></p>
                        </div>

                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
                            <input type="tel" name="mobile" pattern="[6789][0-9]{9}" id="mobile" 
                                class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <p id="error-mobile" class="text-red-500 text-xs font-semibold error-message"></p>
                        </div>

                        <div>
                            <label for="location" class="block text-sm font-medium text-gray-700">Proposed Location</label>
                            <input type="text" name="location" id="location" 
                                class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <p id="error-location" class="text-red-500 text-xs font-semibold error-message"></p>
                        </div>

                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700">Additional
                                Information</label>
                            <textarea name="message" id="message" rows="4"
                                class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
                        </div>

                        <div>
                            <button type="submit"
                                class="w-full py-2 px-4 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Submit
                                Inquiry</button>
                        </div>
                    </form>
                    <div id="loader" style="display: none;">
                        <img src="{{ asset('logo/loader.gif') }}" alt="Loading..." />
                    </div>
                </div>
            </section>
        </main>
    </div>

    <script>
        $(document).ready(function() {
            // Insert application details
            $("#addData").submit(function(e) {
                e.preventDefault();
                $('#loader').show();
                let formData = new FormData(this);
                $.ajax({
                    type: "POST",
                    url: "{{ route('franchise.store') }}",
                    data: formData,
                    dataType: "JSON",
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(response) {
                        $('#loader').hide();
                        swal("Success", response.message, "success");
                        $("#addData").trigger("reset");
                        setTimeout(function() {
                            window.open("{{url('/')}}", "_self");
                        }, 3000); 
                    },
                    error: function(xhr) {
                        $('#loader').hide();
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
        })
    </script>

@endsection
