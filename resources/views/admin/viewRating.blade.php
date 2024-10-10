@extends('admin.adminBase')
@section('content')
    <div class=" flex flex-col  mt-20  justify-between mb-5 ">
        <p class="text-lg font-semibold ">Average Rating of <span id="counting"></span> People is <span>4.5</span></p>
        {{-- <h1 class="text-lg font-semibold  py-2">Ratings (<span id="counting">0</span>)</h1> --}}
    </div>
    <div class="overflow-x-auto">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="min-w-full bg-white border border-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border-b border-gray-200 px-3 py-2 text-sm">S.no</th>
                        <th class="border-b border-gray-200 px-3 py-2 text-sm">Name</th>
                        <th class="border-b border-gray-200 px-3 py-2 text-sm">Mobile</th>
                        <th class="border-b border-gray-200 px-3 py-2 text-sm">Rating</th>
                        <th class="border-b border-gray-200 px-3 py-2 text-sm">Status</th>
                        <th class="border-b border-gray-200 px-3 py-2 text-sm">Comment</th>
                        <th class="border-b border-gray-200 px-3 py-2 text-sm">Action</th>
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
                    <h5 class="text-lg font-semibold mb-4">Update Rating Details</h5>
                    <form id="editForm" method="POST" enctype="multipart/form-data">
                        <input type="hidden" id="id" name="id">
                        <div class="flex gap-2 mb-4">
                            <div class="w-1/2">
                                <label for="Name" class="block text-sm font-medium text-gray-700">Customer's Name</label>
                                <input type="text" id="name" name="name"
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                    required>
                            </div>
                            <div class="w-1/2">
                                <label for="mobile" class="block text-sm font-medium text-gray-700">Customer's Mobile No.</label>
                                <input type="text" id="mobile" name="mobile"
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                    required>
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="comment" class="block text-sm font-medium text-gray-700">Comment</label>
                            <textarea name="comment" id="comment" rows="2"  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 p-2 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>

                        </div>
                        <div class="mb-4 w-1/2">
                            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                            <select name="status" id="status"  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2 shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                                <option value="">Choose Status</option>
                                <option value="1">Approve Now</option>
                                <option value="0">Not Approve</option>
                            </select>
                        </div>
                        <div class="flex justify-between">
                            <button type="button" id="cancelEdit"
                            class="inline-block px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">Cancel</button>
                            <button type="submit"
                                class="inline-block px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Save
                                changes</button>
                          
                            {{-- <button type="button" id="delete"
                                class="delete-btn inline-block px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600" disabled>Delete</button> --}}
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
                    url: "{{ route('rate.index') }}",
                    success: function(response) {
                        let table = $("#callingData");
                        table.empty();
                        let data = response.data;

                        // Update appointment count
                        let total = data.length;
                        $("#counting").html(total);

                        // alert(avg);

                        data.forEach((data,key) => {
                            table.append(`
                                <tr class="mt-5">
                                    <td class="border-b border-gray-200 px-3 text-center py-2 text-sm">${key+1}</td> 
                                    <td class="border-b border-gray-200 px-3 text-center py-2 text-sm">${data.name}</td> 
                                    <td class="border-b border-gray-200 px-3 text-center py-2 text-sm">${data.mobile}</td> 
                                    <td class="border-b border-gray-200 px-3 text-center py-2 text-sm">${data.rate}</td> 
                                    <td class="border-b border-gray-200 px-3 text-center py-2 text-sm">${data.status==1 ? `<p class='text-white bg-green-600 p-1 rounded-md' >Approved</p>` : `<p class='text-white bg-red-500 p-1 rounded-md' >Pending</p>` }</td> 
                                    <td class="border-b border-gray-200 px-3 text-center py-2 text-sm">${data.comment}</td> 
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
                    url: `{{url('/api/rating/view/${id}')}}`,
                    success: function(response) {
                        $('#id').val(response.data.id);
                        $('#name').val(response.data.name);
                        $('#mobile').val(response.data.mobile);
                        $('#comment').val(response.data.comment);
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
                    mobile: $('#mobile').val(),
                    comment: $('#comment').val(),
                    status: $('#status').val(),
                };
                $.ajax({
                    type: 'PUT',
                    url: `{{url('/api/rating/edit/${id}')}}`,
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
                if (confirm("Are you sure you want to delete this Rating?")) {
                    $.ajax({
                        type: 'DELETE',
                        // url: `/api/rating/delete/${id}`,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            // console.log('Plan deleted successfully:', response);
                            $('#default-modal').addClass('hidden');
                            swal("success", response.message, "message");
                            callingPlans();
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
