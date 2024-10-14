@extends('admin.adminBase')
@section('content')
    <div class="flex-1 flex mt-20 items-center justify-between ">
        <h1 class="text-lg font-semibold  py-2">Manage Job Form (<span id="counting">0</span>)</h1>
    </div>
    <div class="overflow-x-auto">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="min-w-full bg-white border border-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border-b border-gray-200 px-3 py-2 text-sm">Id</th>
                        <th class="border-b border-gray-200 px-3 py-2 text-sm">Name</th>
                        <th class="border-b border-gray-200 px-3 py-2 text-sm">Mobile</th>
                        <th class="border-b border-gray-200 px-3 py-2 text-sm">Applied For</th>
                        <th class="border-b border-gray-200 px-3 py-2 text-sm">Status</th>
                        <th class="border-b border-gray-200 px-3 py-2 text-sm">Address</th>
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
                        <h5 class="text-lg font-semibold mb-4">Edit Job Form</h5>
                        <button type="button" id="cancelEdit"
                        class="inline-block p-2 pt-0 text-gray-700 rounded-md hover:bg-gray-100 text-4xl">&times;</button>
    
                    </div>
                    <form id="editForm" method="POST" enctype="multipart/form-data">
                        <input type="hidden" id="id" name="id">
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
                                    <label for="document" class="block text-gray-700 font-medium mb-2">Document</label>
                                    <input type="file" id="document" name="document"
                                        class="w-full px-3 py-2  rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                                    <p id="error-document" class="text-red-500 text-xs font-semibold error-message"></p>
                                </div>
                            </div>
                        <div class="flex justify-between">
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

            $.ajax({
                type: "GET",
                url: "{{ route('career.index') }}",
                success: function(response) {
                    let select = $("#career_id");
                    response.data.forEach((data) => {
                        select.append(`<option value="${data.id}">${data.title}</option>`);
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching calling plans:', error);
                }
            });
            // Function to fetch and display appointment
            let callingData = () => {
                $.ajax({
                    type: "GET",
                    url: "{{ route('job.applied.index') }}",
                    success: function(response) {
                        let table = $("#callingData");
                        table.empty();
                        let data = response.data;

                        // Update appointment count
                        let len = data.length;
                        $("#counting").html(len);

                        data.forEach((data,key) => {
                            table.append(`
                                <tr class="mt-5">
                                    <td class="border-b border-gray-200 px-3 text-center py-2 text-sm">${key+1}</td> 
                                    <td class="border-b border-gray-200 px-3 text-center py-2 text-sm">${data.name}</td> 
                                    <td class="border-b border-gray-200 px-3 text-center py-2 text-sm">${data.mobile}</td> 
                                    <td class="border-b border-gray-200 px-3 text-center py-2 text-sm">${data.career.title}</td> 
                                     <td class="border-b border-gray-200 px-3 text-center py-2 text-sm" style="text-align:center;">
                                        <label class="inline-flex items-center mb-5 cursor-pointer">
                                                <input type="checkbox" class="sr-only peer status-toggle" data-id="${data.id}" ${data.status == 1 ? 'checked' : ''}>
                                                <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:w-5 after:h-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                        </label>
                                    </td>
                                    <td class="border-b border-gray-200 px-3 text-center py-2 text-sm">${data.city},${data.state}</td> 

                                    <td class="border-b flex justify-center gap-3 border-gray-200 px-3 text-center py-4 text-sm">
                                         <a href="{{url('/admin/manage-job-form/${data.id}')}}" class=" py-1 px-2 editBtn "data-id='${data.id}'><svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 hover:text-gray-800   text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.522 5 12 5c4.478 0 8.268 2.943 9.542 7-.823 2.536-2.601 4.64-4.908 5.79-2.306 1.15-5.097 1.15-7.404 0C5.06 16.64 3.281 14.536 2.458 12z" />
                                        </svg>
                                        </a>
                                        <button class=" editBtn "data-id='${data.id}'><svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 512 512"><path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/></svg></button>
                                       
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
                    url: `{{ url('/api/job-applied/view/${id}') }}`,
                    success: function(response) {
                        $('#id').val(response.data.id);
                        $('#name').val(response.data.name);
                        $('#mother').val(response.data.mother);
                        $('#career_id').val(response.data.career_id);
                        $('#father').val(response.data.father);
                        $('#dob').val(response.data.dob);
                        $('#gender').val(response.data.gender);
                        $('#religion').val(response.data.religion);
                        $('#community').val(response.data.community);
                        $('#mobile').val(response.data.mobile);
                        $('#email').val(response.data.email);
                        $('#experience').val(response.data.experience);
                        $('#skills').val(response.data.skills);
                        $('#area').val(response.data.area);
                        $('#city').val(response.data.city);
                        $('#state').val(response.data.state);
                        $('#pincode').val(response.data.pincode);
                        $('#qualification').val(response.data.qualification);
                        // $('#photo').val(response.data.photo);
                        // $('#document').val(response.data.document);
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
                    name: $('#name').val(),
                    career_id: $('#career_id').val(),
                    mother: $('#mother').val(),
                    father: $('#father').val(),
                    dob: $('#dob').val(),
                    gender: $('#gender').val(),
                    religion: $('#religion').val(),
                    community: $('#community').val(),
                    mobile: $('#mobile').val(),
                    email: $('#email').val(),
                    experience: $('#experience').val(),
                    skills: $('#skills').val(),
                    area: $('#area').val(),
                    city: $('#city').val(),
                    state: $('#state').val(),
                    pincode: $('#pincode').val(),
                    qualification: $('#qualification').val(),
                    status: $('#status').val(),
                };
                $.ajax({
                    type: 'PUT',
                    url: `{{ url('/api/job-applied/edit/${id}') }}`,
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

            $(document).on('change', '.status-toggle', function() {
                let id = $(this).data('id');
                let status = $(this).is(':checked') ? 1 : 0;
                
                $.ajax({
                    type: 'PUT',
                    url: `{{url('/api/job-form/status/${id}')}}`,
                    data: { status: status },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        console.log(response); 
                        swal("Success", response.message, "success");
                        callingSarkariJobs(); 
                    },
                    error: function(xhr, status, error) {
                        console.error('Error updating Details:', error);
                    }
                });
            });

            $(document).on('click', '.delete-btn', function() {
                let id = $('#id').val();

                // Confirm deletion
                if (confirm("Are you sure you want to delete this Data?")) {
                    $.ajax({
                        type: 'DELETE',
                        url: `{{url('/api/job-applied/delete/${id}')}}`,
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
