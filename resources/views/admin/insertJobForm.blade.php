@extends('home.adminBase')
@section('content')
    <div class="max-w-4xl mx-auto my-10 bg-gray-200 p-8 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold text-gray-700 mb-8 text-center">Job Application Form</h1>
        <form action="" method="POST" enctype="multipart/form-data" id="addData">
            <!-- Name -->
            <div class="mb-4 flex gap-5">
                <div class="w-1/2">
                    <label for="name" class="block text-gray-700 font-medium mb-2">Name</label>
                    <input type="text" id="name" name="name"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                    <p id="error-name" class="text-red-500 text-xs font-semibold error-message"></p>
                </div>
                <!-- Date of Birth -->
                <div class="w-1/2">
                    <label for="dob" class="block text-gray-700 font-medium mb-2">Date of Birth</label>
                    <input type="date" id="dob" name="dob"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                    <p id="error-dob" class="text-red-500 text-xs font-semibold error-message"></p>
                </div>
            </div>

            <!-- Mother -->
            <div class="mb-4 flex gap-5">
                <div class="w-1/2">
                    <label for="mother" class="block text-gray-700 font-medium mb-2">Mother's Name</label>
                    <input type="text" id="mother" name="mother"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                    <p id="error-mother" class="text-red-500 text-xs font-semibold error-message"></p>
                </div>

                <!-- Father -->
                <div class="w-1/2">
                    <label for="father" class="block text-gray-700 font-medium mb-2">Father's Name</label>
                    <input type="text" id="father" name="father"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                    <p id="error-father" class="text-red-500 text-xs font-semibold error-message"></p>
                </div>
            </div>

            <!-- Gender -->
            <div class="mb-4 w-1/2">
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

            <!-- Religion -->
            <div class="mb-4 flex gap-5">
                <div class="w-1/2">
                    <label for="religion" class="block text-gray-700 font-medium mb-2">Religion</label>
                    <input type="text" id="religion" name="religion"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                    <p id="error-religion" class="text-red-500 text-xs font-semibold error-message"></p>
                </div>

                <!-- Community -->
                <div class="w-1/2">
                    <label for="community" class="block text-gray-700 font-medium mb-2">Community</label>
                    <input type="text" id="community" name="community"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                    <p id="error-community" class="text-red-500 text-xs font-semibold error-message"></p>
                </div>
            </div>

            <!-- Mobile -->
            <div class="mb-4 flex gap-5">
                <div class="w-1/2">
                    <label for="mobile" class="block text-gray-700 font-medium mb-2">Mobile</label>
                    <input type="tel" id="mobile" name="mobile"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                    <p id="error-mobile" class="text-red-500 text-xs font-semibold error-message"></p>
                </div>

                <!-- Email -->
                <div class="w-1/2">
                    <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                    <input type="email" id="email" name="email"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                    <p id="error-email" class="text-red-500 text-xs font-semibold error-message"></p>
                </div>
            </div>

            <!-- Experience -->
            <div class="flex gap-5">
                <div class="mb-4 w-1/2">
                    <label for="experience" class="block text-gray-700 font-medium mb-2">Experience</label>
                    <input type="text" id="experience" name="experience"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                    <p id="error-experience" class="text-red-500 text-xs font-semibold error-message"></p>
                </div>

                <!-- Skills -->
                <div class="mb-4 w-1/2">
                    <label for="skills" class="block text-gray-700 font-medium mb-2">Skills</label>
                    <input type="text" id="skills" name="skills"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                    <p id="error-skills" class="text-red-500 text-xs font-semibold error-message"></p>
                </div>
            </div>

            <!-- Area -->
            <div class="flex gap-5">
                <div class="mb-4 w-1/2">
                    <label for="area" class="block text-gray-700 font-medium mb-2">Area</label>
                    <input type="text" id="area" name="area"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                    <p id="error-area" class="text-red-500 text-xs font-semibold error-message"></p>
                </div>
                <!-- Pincode -->
                <div class="mb-4 w-1/2">
                    <label for="pincode" class="block text-gray-700 font-medium mb-2">Pincode</label>
                    <input type="number" id="pincode" name="pincode"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                    <p id="error-pincode" class="text-red-500 text-xs font-semibold error-message"></p>
                </div>
            </div>

            <!-- City -->
            <div class="flex gap-5">
                <div class="mb-4 w-1/2">
                    <label for="city" class="block text-gray-700 font-medium mb-2">City</label>
                    <input type="text" id="city" name="city"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                    <p id="error-city" class="text-red-500 text-xs font-semibold error-message"></p>
                </div>

                <!-- State -->
                <div class="mb-4 w-1/2">
                    <label for="state" class="block text-gray-700 font-medium mb-2">State</label>
                    <input type="text" id="state" name="state"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                    <p id="error-state" class="text-red-500 text-xs font-semibold error-message"></p>
                </div>
            </div>

            <!-- Qualification -->
            <div class="mb-4">
                <label for="qualification" class="block text-gray-700 font-medium mb-2">Qualification</label>
                <input type="text" id="qualification" name="qualification"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                <p id="error-qualification" class="text-red-500 text-xs font-semibold error-message"></p>
            </div>
            <div class="mb-4 w-1/2">
                <label for="career_id" class="block text-gray-700 font-medium mb-2">Choose Job</label>
                <select id="career_id" name="career_id"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                    <option value="">Select Career</option>
                </select>
                <p id="error-gender" class="text-red-500 text-xs font-semibold error-message"></p>
            </div>

            <!-- Photo -->
            <div class="mb-4 flex gap-5">
                <div class="mb-4 w-1/2">
                    <label for="photo" class="block text-gray-700 font-medium mb-2">Photo</label>
                    <input type="file" id="photo" name="photo"
                        class="w-full px-3 py-2  rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                    <p id="error-photo" class="text-red-500 text-xs font-semibold error-message"></p>
                </div>

                <!-- Document -->
                <div class="mb-4 w-1/2">
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
    </div>

    <script>
        $(document).ready(function() {
            // Insert application details
            $("#addData").submit(function(e) {
                e.preventDefault();
                let formData = new FormData(this);
                $.ajax({
                    type: "POST",
                    url: "{{ route('job.applied.store') }}",
                    data: formData,
                    dataType: "JSON",
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(response) {
                        swal("Success", response.message, "success");
                        $("#addData").trigger("reset");
                        window.open("{{url('/career-page')}}", "_self");
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
        })
    </script>
@endsection
