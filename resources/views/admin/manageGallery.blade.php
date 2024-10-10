@extends('admin.adminBase')
@section('content')
    <div class="flex-1 flex mt-20 items-center justify-between ">
        <h1 class="text-lg font-semibold  py-2">Manage News (<span id="counting">0</span>)</h1>
        <a href={{ url('/admin/manage-gallery/insert') }}
            class="bg-indigo-500 hover:bg-indigo-800 text-white px-3 py-2 rounded mb-4">
            <i class="fas fa-plus"></i>Add News</a>
    </div>
    <div class=" ">
        <div class="relative  w-full shadow-md sm:rounded-lg">
            <table class="min-w-full bg-white border border-gray-200">
                <thead class="bg-gray-100 w-full">
                    <tr>
                        <th class="border-b border-gray-200 px-3 py-2 text-sm">Sl No.</th>
                        <th class="border-b border-gray-200 px-3 py-2 text-sm">Image</th>
                        <th class="border-b border-gray-200 px-3 py-2 text-sm">Title</th>
                        <th class="border-b border-gray-200 px-3 py-2 text-sm">Date</th>
                        <th class="border-b border-gray-200 px-3 py-2 text-sm">Link</th>
                        <th class="border-b border-gray-200 px-3 py-2 text-sm">Status</th>
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
                        <h5 class="text-lg font-semibold mb-4">Edit Gallery</h5>
                        <button type="button" id="cancelEdit"
                        class="inline-block p-2 pt-0 text-gray-700 rounded-md hover:bg-gray-100 text-4xl">&times;</button>
    
                    </div>
                    <form id="editForm" method="POST" enctype="multipart/form-data">
                        <input type="hidden" id="id" name="id">
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                            <input type="title" id="title" name="title"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <p id="error-link" class="text-red-500 text-xs font-semibold error-message"></p>
                        </div>
                        <div>
                            <label for="image" class="block text-sm font-medium text-gray-700">Blog Image</label>
                            <input type="file" id="image" name="image" class="mt-1 block w-full px-3 py-2">
                            <p id="error-image" class="text-red-500 text-xs font-semibold error-message"></p>
                        </div>
                        <div>
                            <label for="link" class="block text-sm font-medium text-gray-700">Web Link</label>
                            <input type="url" id="link" name="link"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <p id="error-link" class="text-red-500 text-xs font-semibold error-message"></p>
                        </div>
                        <div>
                            <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
                            <input type="date" id="date" name="date"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <p id="error-date" class="text-red-500 text-xs font-semibold error-message"></p>
                        </div>
                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea id="description" name="description" rows="2"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
                            <p id="error-description" class="text-red-500 text-xs font-semibold error-message"></p>
                        </div>
                        <div class="mb-4 w-1/2">
                            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                            <select name="status" id="status"
                                class="mt-1 p-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                required>
                                <option value="">Choose Status</option>
                                <option value="1">Approve Now</option>
                                <option value="0">Not Approve</option>
                            </select>
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
        // Function to fetch and display news
        let callingData = () => {
            $.ajax({
                type: "GET",
                url: "{{ route('gallery.index') }}",
                success: function(response) {
                    let table = $("#callingData");
                    table.empty();
                    let data = response.data;

                    // Update the count of news
                    let len = data.length;
                    $("#counting").html(len);

                    data.forEach((data, key) => {
                        table.append(`
                            <tr class="mt-5">
                                <td class="border-b border-gray-200 px-3 text-center py-2 text-sm">${key + 1}</td> 
                                <td class="border-b border-gray-200 px-3 text-center py-2 text-sm">
                                    <div class='text-center'>
                                        <img src="{{ asset('/gallery/image/${data.image}') }}" alt="Blog 1" class="h-16 w-20 object-cover rounded-lg mx-auto">
                                    </div>
                                </td> 
                                <td class="border-b border-gray-200 px-3 text-center py-2 text-sm">${data.title}</td> 
                                <td class="border-b border-gray-200 px-3 text-center py-2 text-sm">${data.delete_reason}</td> 
                                <td class="border-b border-gray-200 px-3 text-center py-2 text-sm">${data.link}</td> 
                                <td class="border-b border-gray-200 px-3 text-center py-2 text-sm">${data.status==1 ? `<p class='text-white bg-green-600 p-1 rounded-md' >Active</p>` : `<p class='text-white bg-red-500 p-1 rounded-md' >Inactive</p>` }</td> 
                                <td class="border-b border-gray-200 px-3 text-center py-2 text-sm">
                                    <button class="py-1 px-2 editBtn" data-id='${data.id}'>
                                        <svg class="w-5 h-5 text-gray-500 hover:text-gray-900" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 512 512">
                                            <path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/>
                                        </svg>
                                    </button>
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

        // Handle Edit Button Click
        $(document).on('click', '.editBtn', function() {
            let id = $(this).data('id');
            $.ajax({
                type: 'GET',
                url: `{{ url('/api/gallery/view/${id}') }}`,
                success: function(response) {
                    let data = response.data;
                    $('#id').val(data.id);
                    $('#title').val(data.title);
                    $('#link').val(data.link);
                    $('#description').val(data.description);
                    $('#status').val(data.status);
                    $('#date').val(data.delete_reason);
                    // $('#date').val(data.date);
                    // $('#image').val(data.image);
                    $('#default-modal').removeClass('hidden');
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching details for editing:', error);
                }
            });
        });

        // Handle Edit Form Submission
        $('#editForm').submit(function(e) {
            e.preventDefault();

            let id = $('#id').val();
                let formData = {
                    title: $('#title').val(),
                    image: $('#image').val(),
                    link: $('#link').val(),
                    // date: $('#date').val(),
                    delete_reason: $('#date').val(),
                    status: $('#status').val(),
                    description: $('#description').val(),

                };
                $.ajax({
                    type: 'PUT',
                    url: `{{url('/api/gallery/edit/${id}')}}`,
                    data: formData,
                    success: function(response) {
                        swal("Success", response.message, "message");
                        $('#default-modal').addClass('hidden');
                        swal("Success", response.message, "message");
                        callingData();
                    },
                error: function(xhr, status, error) {
                    console.error('Error updating data:', error);
                }
            });
        });

        // Cancel edit button
        $('#cancelEdit').click(function() {
            $('#default-modal').addClass('hidden');
        });

        $(document).on('click', '.delete-btn', function() {
                let id = $('#id').val();

                // Confirm deletion
                if (confirm("Are you sure you want to delete this Data?")) {
                    $.ajax({
                        type: 'DELETE',
                        url: `{{url('/api/gallery/delete/${id}')}}`,
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

        // Initialize data fetching
        callingData();
    });
    </script>
@endsection
