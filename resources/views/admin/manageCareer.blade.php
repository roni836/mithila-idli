@extends('admin.adminBase')
@section('content')
    <div class="flex-1 flex mt-20 items-center justify-between ">
        <h1 class="text-lg font-semibold  py-2">Manage Careers (<span id="counting">0</span>)</h1>
        <a href="{{ url('/admin/manage-career/insert') }}"
            class="bg-indigo-500 hover:bg-indigo-800 text-white px-3 py-2 rounded mb-4">
            <i class="fas fa-plus"></i>Add New Carrer</a>
    </div>
    <div class="overflow-x-auto">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="min-w-full bg-white border border-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border-b border-gray-200 px-3 py-2 text-sm">Id</th>
                        <th class="border-b border-gray-200 px-3 py-2 text-sm">Title</th>
                        <th class="border-b border-gray-200 px-3 py-2 text-sm">No. Of Post</th>
                        <th class="border-b border-gray-200 px-3 py-2 text-sm">Type</th>
                        <th class="border-b border-gray-200 px-3 py-2 text-sm">Status</th>
                        <th class="border-b border-gray-200 px-3 py-2 text-sm">Location</th>
                        <th class="border-b border-gray-200 px-3 py-2 text-sm">Actions</th>
                    </tr>
                </thead>
                <tbody id="callingData"></tbody>
                <tfoot>
                    <tr>
                        <th colspan="10" class="p-3 flex items-center justify-center">
                            <div id="pagination" class=""></div>
                        </th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    {{-- edit modal --}}
    <div id="default-modal" class="fixed inset-0 z-50 overflow-y-auto hidden" aria-hidden="true">
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                role="dialog" aria-modal="true" aria-labelledby="editHirePlanModalLabel">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="flex justify-between">
                        <h5 class="text-lg font-semibold mb-4">Edit career Data</h5>
                        <button type="button" id="cancelEdit"
                        class="inline-block p-2 pt-0 text-gray-700 rounded-md hover:bg-gray-100 text-4xl">&times;</button>
    
                    </div>
                    <form id="editForm" method="POST" enctype="multipart/form-data">
                        <input type="hidden" id="id" name="id">
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
                            <label for="language" class="block text-sm font-medium text-gray-700">Preferred
                                Language</label>
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
                            <label for="qualification"
                                class="block text-sm font-medium text-gray-700">Qualification</label>
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
                            <label for="min_experience" class="block text-sm font-medium text-gray-700">Min
                                Experience</label>
                            <input type="number" id="min_experience" name="min_experience"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <p id="error-min_experience" class="text-red-500 text-xs font-semibold error-message"></p>
                        </div>
                        <div>
                            <label for="max_experience" class="block text-sm font-medium text-gray-700">Max
                                Experience</label>
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
                                    <option value="Dadra and Nagar Haveli and Daman and Diu">Dadra and Nagar Haveli and
                                        Daman
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
                        <div class="flex gap-2 mb-4">
                            <div class="w-1/2">
                                <label for="opening_date" class="block text-sm font-medium text-gray-700">Opening date</label>
                                <input type="date" id="opening_date" name="opening_date"
                                class="mt-1 block w-full px-3 py-2 rounded-md sm:text-sm">
                            </div>
                            <div class="w-1/2">
                                <label for="status" class="block text-sm font-medium text-gray-700">Form Status</label>
                                <select name="status" id="status" class="mt-1 focus:ring-indigo-500 p-2 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    <option value="" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">Choose</option>
                                    <option value="0" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">Not Confirmed</option>
                                    <option value="1" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">Confirmed</option>
                                </select>

                            </div>
                        </div>

                        <div class="flex justify-between mt-2">
                            <button type="button" id="delete"
                                class="delete-btn inline-block px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600">Delete</button>
                            <button type="submit"
                                class="inline-block px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Save
                                changes</button>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Function to fetch and display appointment
            let callingData = () => {
                $.ajax({
                    type: "GET",
                    url: "{{ route('career.index') }}",
                    success: function(response) {
                        let table = $("#callingData");
                        table.empty();
                        let data = response.data;

                        // Update appointment count
                        let len = data.length;
                        $("#counting").html(len);

                        data.forEach((data, key) => {
                            table.append(`
                                <tr class="mt-5">
                                    <td class="border-b border-gray-200 px-3 text-center py-2 text-sm">${key+1}</td> 
                                    <td class="border-b border-gray-200 px-3 text-center py-2 text-sm">${data.title}</td> 
                                    <td class="border-b border-gray-200 px-3 text-center py-2 text-sm">${data.no_of_post}</td> 
                                    <td class="border-b border-gray-200 px-3 text-center py-2 text-sm">${data.job_type}</td> 
                                     <td class="border-b border-gray-200 px-3 text-center py-2 text-sm">${data.status==1 ? `<p class='text-white bg-green-600 p-1 rounded-md' >Active</p>` : `<p class='text-white bg-red-500 p-1 rounded-md' >Inactive</p>` }</td> 
                                    <td class="border-b border-gray-200 px-3 text-center py-2 text-sm">${data.city}-${data.state}</td> 
                                    <td class="border-b border-gray-200 px-3 text-center py-2 text-sm">
                                        <button class=" py-1 px-2 editBtn "data-id='${data.id}'><svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 512 512"><path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/></svg></button>
                                    </td>
                                </tr>    
                            `);
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            }
            // Edit  Work

            $(document).on('click', '.editBtn', function() {
                let id = $(this).data('id');
                $.ajax({
                    type: 'GET',
                    url: `{{ url('/api/career/view/${id}') }}`,
                    success: function(response) {
                        $('#id').val(response.data.id);
                        $('#title').val(response.data.title);
                        $('#company').val(response.data.company);
                        $('#profile').val(response.data.profile);
                        $('#mobile').val(response.data.mobile);
                        $('#email').val(response.data.email);
                        $('#no_of_post').val(response.data.no_of_post);
                        $('#city').val(response.data.city);
                        $('#state').val(response.data.state);
                        $('#job_type').val(response.data.job_type);
                        $('#language').val(response.data.language);
                        $('#qualification').val(response.data.qualification);
                        $('#min_salary').val(response.data.min_salary);
                        $('#max_salary').val(response.data.max_salary);
                        $('#min_experience').val(response.data.min_experience);
                        $('#max_experience').val(response.data.max_experience);
                        $('#opening_date').val(response.data.opening_date);
                        $('#website').val(response.data.website);
                        $('#description').val(response.data.description);
                        $('#status').val(response.data.status);
                        $('#default-modal').removeClass('hidden');
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching  details for editing:', error);
                    }
                });
            });

            $('#editForm').submit(function(e) {
                e.preventDefault();
                let id = $('#id').val();
                let formData = {
                    title: $('#title').val(),
                    company: $('#company').val(),
                    profile: $('#profile').val(),
                    mobile: $('#mobile').val(),
                    email: $('#email').val(),
                    no_of_post: $('#no_of_post').val(),
                    city: $('#city').val(),
                    state: $('#state').val(),
                    job_type: $('#job_type').val(),
                    language: $('#language').val(),
                    qualification: $('#qualification').val(),
                    min_salary: $('#min_salary').val(),
                    max_salary: $('#max_salary').val(),
                    min_experience: $('#min_experience').val(),
                    max_experience: $('#max_experience').val(),
                    opening_date: $('#opening_date').val(),
                    website: $('#website').val(),
                    description: $('#description').val(),
                    status: $('#status').val(),
                };
                $.ajax({
                    type: 'PUT',
                    url: `{{ url('/api/career/edit/${id}') }}`,
                    data: formData,
                    success: function(response) {
                        swal("Success", response.message, "message");
                        $('#default-modal').addClass('hidden');
                        swal("Success", response.message, "message");
                        callingData();
                    },
                    error: function(xhr, status, error) {
                        console.error('Error updating Data:', error);
                    }
                });
            });

            // Cancel edit Doctor button click handler
            $('#cancelEdit').click(function() {
                $('#default-modal').addClass('hidden');
            });

            $(document).on('click', '.delete-btn', function() {
                let id = $('#id').val();

                // Confirm deletion
                if (confirm("Are you sure you want to delete this Data?")) {
                    $.ajax({
                        type: 'DELETE',
                        url: `{{url('/api/career/delete/${id}')}}`,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            // console.log('Plan deleted successfully:', response);
                            $('#default-modal').addClass('hidden');
                            swal("success", response.message, "message");
                            callingData();
                        },
                        error: function(xhr, status, error) {
                            console.error('Error deleting Data:', error);
                        }
                    });
                }
            });
            callingData();
        });
    </script>
@endsection
