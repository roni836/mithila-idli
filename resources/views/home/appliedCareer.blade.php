@extends('home.homeBase')
@section('title', 'Career')
@section('content')
<div class="max-w-4xl mx-auto my-10 bg-gray-200 p-8 rounded-lg shadow-lg">
    <h1 class="text-2xl font-bold text-gray-700 mb-8 text-center">Job Application Form</h1>
    <form action="/submit" method="POST" enctype="multipart/form-data" id="addData">
        <div class="mb-4 flex flex-col md:flex-row gap-5">
            <div class="w-full md:w-1/2">
                <label for="name" class="block text-gray-700 font-medium mb-2">Name</label>
                <input type="text" id="name" name="name"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                <p id="error-name" class="text-red-500 text-xs font-semibold error-message"></p>
            </div>
            <div class="w-full md:w-1/2">
                <label for="dob" class="block text-gray-700 font-medium mb-2">Date of Birth</label>
                <input type="date" id="dob" name="dob"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                <p id="error-dob" class="text-red-500 text-xs font-semibold error-message"></p>
            </div>
        </div>

        <div class="mb-4 flex flex-col md:flex-row gap-5">
            <div class="w-full md:w-1/2">
                <label for="mother" class="block text-gray-700 font-medium mb-2">Mother's Name</label>
                <input type="text" id="mother" name="mother"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                <p id="error-mother" class="text-red-500 text-xs font-semibold error-message"></p>
            </div>

            <div class="w-full md:w-1/2">
                <label for="father" class="block text-gray-700 font-medium mb-2">Father's Name</label>
                <input type="text" id="father" name="father"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                <p id="error-father" class="text-red-500 text-xs font-semibold error-message"></p>
            </div>
        </div>

        <div class="mb-4">
            <label for="gender" class="block text-gray-700 font-medium mb-2">Gender</label>
            <select id="gender" name="gender"
                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                <option value="">Select Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>
            <p id="error-gender" class="text-red-500 text-xs font-semibold error-message"></p>
        </div>

        <div class="mb-4 flex flex-col md:flex-row gap-5">
            <div class="w-full md:w-1/2">
                <label for="religion" class="block text-gray-700 font-medium mb-2">Religion</label>
                <input type="text" id="religion" name="religion"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                <p id="error-religion" class="text-red-500 text-xs font-semibold error-message"></p>
            </div>

            <div class="w-full md:w-1/2">
                <label for="community" class="block text-gray-700 font-medium mb-2">Community</label>
                <input type="text" id="community" name="community"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                <p id="error-community" class="text-red-500 text-xs font-semibold error-message"></p>
            </div>
        </div>

            <div class="mb-4 flex flex-col md:flex-row gap-5">
                <div>
                    <label for="mobile" class="block text-sm font-medium text-gray-700">Mobile Number</label>
                    <input type="tel" id="mobile" name="mobile" pattern="[6789][0-9]{9}" required
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <p id="error-mobile" class="text-red-500 text-xs font-semibold"></p>
                </div>

                <div class="w-full md:w-1/2">
                    <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                    <input type="email" id="email" name="email"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                    <p id="error-email" class="text-red-500 text-xs font-semibold error-message"></p>
                </div>
            </div>

            <div class="mb-4 flex flex-col md:flex-row gap-5">
                <div class="w-full md:w-1/2">
                    <label for="experience" class="block text-gray-700 font-medium mb-2">Experience</label>
                    <input type="text" id="experience" name="experience"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                    <p id="error-experience" class="text-red-500 text-xs font-semibold error-message"></p>
                </div>

                <div class="w-full md:w-1/2">
                    <label for="skills" class="block text-gray-700 font-medium mb-2">Skills</label>
                    <input type="text" id="skills" name="skills"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                    <p id="error-skills" class="text-red-500 text-xs font-semibold error-message"></p>
                </div>
            </div>

            <div class="mb-4 flex flex-col md:flex-row gap-5">
                <div class="w-full md:w-1/2">
                    <label for="area" class="block text-gray-700 font-medium mb-2">Area</label>
                    <input type="text" id="area" name="area"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                    <p id="error-area" class="text-red-500 text-xs font-semibold error-message"></p>
                </div>
                <div class="w-full md:w-1/2">
                    <label for="pincode" class="block text-gray-700 font-medium mb-2">Pincode</label>
                    <input type="number" id="pincode" name="pincode"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                    <p id="error-pincode" class="text-red-500 text-xs font-semibold error-message"></p>
                </div>
            </div>

            <div class="mb-4 flex flex-col md:flex-row gap-5">
                <div class="w-full md:w-1/2">
                    <label for="city" class="block text-gray-700 font-medium mb-2">City</label>
                    <input type="text" id="city" name="city"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                    <p id="error-city" class="text-red-500 text-xs font-semibold error-message"></p>
                </div>

                <div class="w-full md:w-1/2">
                    <label for="state" class="block text-gray-700 font-medium mb-2">State</label>
                    <input type="text" id="state" name="state"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                    <p id="error-state" class="text-red-500 text-xs font-semibold error-message"></p>
                </div>
            </div>

            <div class="mb-4">
                <label for="qualification" class="block text-gray-700 font-medium mb-2">Qualification</label>
                <input type="text" id="qualification" name="qualification"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                <p id="error-qualification" class="text-red-500 text-xs font-semibold error-message"></p>
            </div>

            <div class="mb-4 flex flex-col md:flex-row gap-5">
                <div class="w-full md:w-1/2">
                    <label for="photo" class="block text-gray-700 font-medium mb-2">Photo</label>
                    <input type="file" id="photo" name="photo"
                        class="w-full px-3 py-2  rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                    <p id="error-photo" class="text-red-500 text-xs font-semibold error-message"></p>
                </div>

                <div class="w-full md:w-1/2">
                    <label for="document" class="block text-gray-700 font-medium mb-2">Document ( Upload Your Resume )</label>
                    <input type="file" id="document" name="document"
                        class="w-full px-3 py-2  rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                    <p id="error-document" class="text-red-500 text-xs font-semibold error-message"></p>
                </div>
            </div>

            <div class="text-center">
                <button type="submit"
                    class="px-6 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 focus:outline-none focus:ring focus:border-blue-300">Submit
                    Application</button>
            </div>
        </form>
        <div id="loader" style="display: none;">
            <img src="{{ asset('logo/loader.gif') }}" alt="Loading..." />
        </div>
        
    </div>

    <script>
        $(document).ready(function() {
            // Insert application details
            $("#addData").submit(function(e) {
                e.preventDefault();

                $('#loader').show();
                let formData = new FormData(this);
                careerId = getIdFromUrlPath();
                formData.append('career_id', careerId);
                $.ajax({
                    type: "POST",
                    url: "{{ route('job.applied.store') }}",
                    data: formData,
                    dataType: "JSON",
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(response) {
                        $('#loader').hide();
                        swal("Success", response.message, "success");
                        $("#addData").trigger("reset");
                        window.open("{{url('/career-page')}}", "_self");
                    },
                    error: function(xhr) {
                        $('.error-message').html('');
                        if (xhr.status === 422) {
                            $('#loader').hide();
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

            // Function to extract ID from URL path
            function getIdFromUrlPath() {
                let pathArray = window.location.pathname.split('/');
                return pathArray[pathArray.length - 1];
            }
        })
    </script>
@endsection
