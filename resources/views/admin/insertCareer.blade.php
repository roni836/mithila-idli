@extends('admin.adminBase')
@section('content')
    <div class="  flex justify-center ">
        <div class="bg-gray-100 p-8 rounded-lg shadow-md w-full mt-20">
            <form action="#" method="POST" class="space-y-4 " id="addData">
                <h2 class="text-2xl font-bold mb-6 text-center ">Add New Career</h2>
                <div class="flex flex-col w-full gap-5">
                    <div class="w-1/2">
                        <label for="title" class="block text-sm font-medium text-gray-700">Job Title</label>
                        <input type="text" id="title" name="title"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <p id="error-title" class="text-red-500 text-xs font-semibold error-message"></p>
                    </div>
                    <div class="w-1/2">
                        <label for="profile" class="block text-sm font-medium text-gray-700">Profile</label>
                        <input type="text" id="profile" name="profile"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <p id="error-profile" class="text-red-500 text-xs font-semibold error-message"></p>
                    </div>
                </div>
                <div>
                    <label for="company" class="block text-sm font-medium text-gray-700">Company Name</label>
                    <input type="text" id="company" name="company"
                        class="mt-1 block px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm  w-1/2">
                    <p id="error-company" class="text-red-500 text-xs font-semibold error-message"></p>
                </div>
                <div class="flex gap-5">
                    <div>
                        <label for="no_of_post" class="block text-sm font-medium text-gray-700">No Of Post</label>
                        <input type="number" id="no_of_post" name="no_of_post"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <p id="error-no_of_post" class="text-red-500 text-xs font-semibold error-message"></p>
                    </div>
                    <div>
                        <label for="website" class="block text-sm font-medium text-gray-700">Website</label>
                        <input type="text" id="website" name="website"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                </div>
                <div class="flex gap-5">
                    <div>
                        <label for="mobile" class="block text-sm font-medium text-gray-700">No Of mobile</label>
                        <input type="tel" id="mobile" name="mobile"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <p id="error-mobile" class="text-red-500 text-xs font-semibold error-message"></p>
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">email</label>
                        <input type="email" id="email" name="email"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                </div>
                <div>
                    <label for="job_type" class="block text-sm font-medium text-gray-700">Job Type</label>
                    <select name="job_type" id="job_type"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm capitalize">
                        <option value="">Select Job Type</option>
                        <option value="permanent">permanent</option>
                        <option value="temporary">temporary</option>
                        <option value="part-time">part-time</option>
                        <option value="full-time">full-time</option>
                        <option value="work-from-home">work-from-home</option>
                    </select>
                    <p id="error-job_type" class="text-red-500 text-xs font-semibold error-message"></p>
                </div>
                <div>
                    <label for="language" class="block text-sm font-medium text-gray-700">Preferred Language</label>
                    <select name="language" id="language"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm capitalize">
                        <option value="">Select Language</option>
                        <option value="English + Hindi">English + Hindi</option>
                        <option value="English">English</option>
                        <option value="Hindi">Hindi</option>
                    </select>
                    <p id="error-language" class="text-red-500 text-xs font-semibold error-message"></p>
                </div>
                <div>
                    <label for="qualification" class="block text-sm font-medium text-gray-700">Qualification</label>
                    <select name="qualification" id="qualification"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm capitalize">
                        <option value="">Select Qualification Required</option>
                        <option value="no education required">no education required</option>
                        <option value="10th Pass">10th Pass</option>
                        <option value="12th Pass">12th Pass</option>
                        <option value="Graduated">Graduated</option>
                        <option value="Masters">Masters</option>
                    </select>
                    <p id="error-qualification" class="text-red-500 text-xs font-semibold error-message"></p>
                </div>
                <div>
                    <label for="min_salary" class="block text-sm font-medium text-gray-700">Min Salary</label>
                    <input type="number" id="min_salary" name="min_salary"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <p id="error-min_salary" class="text-red-500 text-xs font-semibold error-message"></p>
                </div>
                <div>
                    <label for="max_salary" class="block text-sm font-medium text-gray-700">Max Salary</label>
                    <input type="number" id="max_salary" name="max_salary"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <p id="error-max_salary" class="text-red-500 text-xs font-semibold error-message"></p>
                </div>
                <div>
                    <label for="min_experience" class="block text-sm font-medium text-gray-700">Min Experience</label>
                    <input type="number" id="min_experience" name="min_experience"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <p id="error-min_experience" class="text-red-500 text-xs font-semibold error-message"></p>
                </div>
                <div>
                    <label for="max_experience" class="block text-sm font-medium text-gray-700">Max Experience</label>
                    <input type="number" id="max_experience" name="max_experience"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <p id="error-max_experience" class="text-red-500 text-xs font-semibold error-message"></p>
                </div>
                <div class="flex gap-5">
                    <div>
                        <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                        <input type="text" id="city" name="city"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <p id="error-city" class="text-red-500 text-xs font-semibold error-message"></p>
                    </div>
                    <div>
                        <label for="state" class="block text-sm font-medium text-gray-700">State</label>
                        <select name="state" id="state"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm capitalize">
                            <option value="">Select State</option>
                            <option value="Andhra Pradesh">Andhra Pradesh</option>
                            <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                            <option value="Assam">Assam</option>
                            <option value="Bihar">Bihar</option>
                            <option value="Chhattisgarh">Chhattisgarh</option>
                            <option value="Goa">Goa</option>
                            <option value="Gujarat">Gujarat</option>
                            <option value="Haryana">Haryana</option>
                            <option value="Himachal Pradesh">Himachal Pradesh</option>
                            <option value="Jharkhand">Jharkhand</option>
                            <option value="Karnataka">Karnataka</option>
                            <option value="Kerala">Kerala</option>
                            <option value="Madhya Pradesh">Madhya Pradesh</option>
                            <option value="Maharashtra">Maharashtra</option>
                            <option value="Manipur">Manipur</option>
                            <option value="Meghalaya">Meghalaya</option>
                            <option value="Mizoram">Mizoram</option>
                            <option value="Nagaland">Nagaland</option>
                            <option value="Odisha">Odisha</option>
                            <option value="Punjab">Punjab</option>
                            <option value="Rajasthan">Rajasthan</option>
                            <option value="Sikkim">Sikkim</option>
                            <option value="Tamil Nadu">Tamil Nadu</option>
                            <option value="Telangana">Telangana</option>
                            <option value="Tripura">Tripura</option>
                            <option value="Uttar Pradesh">Uttar Pradesh</option>
                            <option value="Uttarakhand">Uttarakhand</option>
                            <option value="West Bengal">West Bengal</option>
                            <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                            <option value="Chandigarh">Chandigarh</option>
                            <option value="Dadra and Nagar Haveli and Daman and Diu">Dadra and Nagar Haveli and Daman
                                and Diu</option>
                            <option value="Lakshadweep">Lakshadweep</option>
                            <option value="Delhi">Delhi</option>
                            <option value="Puducherry">Puducherry</option>
                            <option value="Ladakh">Ladakh</option>
                            <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                        </select>
                        <p id="error-state" class="text-red-500 text-xs font-semibold error-message"></p>
                    </div>
                </div>
                <div>
                    <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                    <input type="file" id="image" name="image"
                        class="mt-1 block w-full px-3 py-2 rounded-md sm:text-sm">
                    <p id="error-image" class="text-red-500 text-xs font-semibold error-message"></p>
                </div>
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="description" id="description" rows="3"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
                </div>

                <div>
                    <button type="submit"
                        class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Add
                        Job Now</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Insert application details
            $("#addData").submit(function(e) {
                e.preventDefault();
                let formData = new FormData(this);

                // Get the current date and format it as needed
                var currentDate = new Date();
                var formattedDate = ('0' + currentDate.getDate()).slice(-2) + '-' + ('0' + (currentDate
                    .getMonth() + 1)).slice(-2) + '-' + currentDate.getFullYear();

                // Append the date to the FormData object
                formData.append('opening_date', formattedDate);
                $.ajax({
                    type: "POST",
                    url: "{{ route('career.store') }}",
                    data: formData,
                    dataType: "JSON",
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(response) {
                        swal("Success", response.message, "success");
                        $("#addData").trigger("reset");
                        window.open("{{url('/admin/manage-career')}}", "_self");
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
