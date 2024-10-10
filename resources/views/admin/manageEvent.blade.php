@extends('admin.adminBase')
@section('content')
    <div class="flex-1 flex mt-20 items-center justify-between ">
        <h1 class="text-lg font-semibold  py-2">Manage Events (<span id="counting">0</span>)</h1>
        {{-- <a href="{{url('/admin/manage-event/insert')}}" class="bg-indigo-500 hover:bg-indigo-800 text-white px-3 py-2 rounded mb-4">
            <i class="fas fa-plus"></i>Add New Event</a> --}}
    </div>
    <div class="overflow-x-auto">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="min-w-full bg-white border border-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border-b border-gray-200 px-3 py-2 text-sm">Id</th>
                        <th class="border-b border-gray-200 px-3 py-2 text-sm">Name</th>
                        <th class="border-b border-gray-200 px-3 py-2 text-sm">Mobile</th>
                        <th class="border-b border-gray-200 px-3 py-2 text-sm">Event-Type</th>
                        <th class="border-b border-gray-200 px-3 py-2 text-sm">Status</th>
                        <th class="border-b border-gray-200 px-3 py-2 text-sm">Quantity</th>
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
                    <h5 class="text-lg font-semibold mb-4">Event Booking Form</h5>
                    <form id="editForm" method="POST" enctype="multipart/form-data">
                        <input type="hidden" id="id" name="id">
                        <div class="flex gap-2 mb-4">
                            <div class="w-1/2">
                                <label for="Name" class="block text-sm font-medium text-gray-700">Name</label>
                                <input type="text" id="name" name="name"
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                    required>
                            </div>
                            <div class="w-1/2">
                                <label for="mobile" class="block text-sm font-medium text-gray-700">Mobile</label>
                                <input type="tel" id="mobile" name="mobile"
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                    required>
                            </div>
                        </div>
                        <div class="flex gap-2 mb-4">
                            <div class="w-1/2">
                                <label for="pincode" class="block text-sm font-medium text-gray-700">Pincode</label>
                                <input type="number" id="pincode" name="pincode"
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                    required>
                            </div>
                            <div class="w-1/2">
                                <label for="alt_mobile" class="block text-sm font-medium text-gray-700">Alternative Mobile</label>
                                <input type="tel" id="alt_mobile" name="alt_mobile"
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                    required>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                            <textarea name="address" id="address" rows="2"
                                class="mt-1 focus:ring-indigo-500 p-2 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                required></textarea>
                        </div>
                        <div class="flex gap-2 mb-4">
                            <div class="w-1/2">
                                <label for="booking_date" class="block text-sm font-medium text-gray-700">Booking Date</label>
                                <input type="date" id="booking_date" name="booking_date"
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                    required>
                            </div>
                            <div class="w-1/2">
                                <label for="booking_time" class="block text-sm font-medium text-gray-700">Booking Time</label>
                                <input type="text" id="booking_time" name="booking_time"
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                    required placeholder="e.g. 1500">
                            </div>
                        </div>
                        <div class="flex gap-2 mb-4">
                            <div class="w-1/2">
                                <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity</label>
                                <input type="number" id="quantity" name="quantity"
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                    required>
                            </div>
                            <div class="w-1/2">
                                <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                                <input type="number" id="price" name="price"
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                     placeholder="e.g. 1500">
                            </div>
                        </div>
                        <div class="flex gap-2 mb-4">
                            <div class="w-1/2">
                                <label for="delivered_by" class="block text-sm font-medium text-gray-700">Delivered By</label>
                                <input type="text" id="delivered_by" name="delivered_by"
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                    >
                            </div>
                            <div class="w-1/2">
                                <label for="isDelivered" class="block text-sm font-medium text-gray-700">Delivery Status</label>
                                <select name="isDelivered" id="isDelivered" class="mt-1 focus:ring-indigo-500 p-2 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    <option value="0" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">Not Delivered</option>
                                    <option value="1" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">Delivered</option>
                                </select>

                            </div>
                        </div>

                        <div class="flex gap-2 mb-4">
                            <div class="w-1/2">
                                <label for="payment" class="block text-sm font-medium text-gray-700">Payment Status</label>
                                <select name="payment" id="payment" class="mt-1 focus:ring-indigo-500 p-2 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    <option value="0" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">Not Paid</option>
                                    <option value="1" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">Paid</option>
                                </select>
                            </div>
                            <div class="w-1/2">
                                <label for="status" class="block text-sm font-medium text-gray-700">Confirmation Status</label>
                                <select name="status" id="status" class="mt-1 focus:ring-indigo-500 p-2 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    <option value="0" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">Not Confirmed</option>
                                    <option value="1" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">Confirmed</option>
                                </select>

                            </div>
                        </div>
                        
                        <div class="flex justify-between">
                            <button type="submit"
                                class="inline-block px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Save
                                changes</button>
                            <button type="button" id="cancelEdit"
                                class="inline-block px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">Cancel</button>
                            <button type="button" id="delete"
                                class="delete-btn inline-block px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600">Delete</button>
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
                    url: "{{ route('book.event.index') }}",
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
                                    <td class="border-b border-gray-200 px-3 text-center py-2 text-sm">${data.event_type}</td>
                                    <td class="border-b border-gray-200 px-3 text-center py-2 text-sm">${data.isDelivered==1 ? `<p class='text-white bg-green-600 p-1 rounded-md' >Delivered</p>` : `<p class='text-white bg-red-500 p-1 rounded-md' >Pending</p>` }</td> 
                                    <td class="border-b border-gray-200 px-3 text-center py-2 text-sm">${data.quantity}</td> 
                                    <td class="border-b border-gray-200 px-3 text-center py-2 text-sm">${data.address}</td> 

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
                    url: `{{url('/api/book-event/view/${id}')}}`,
                    success: function(response) {
                        $('#id').val(response.data.id);
                        $('#name').val(response.data.name);
                        $('#alt_mobile').val(response.data.alt_mobile);
                        $('#mobile').val(response.data.mobile);
                        $('#pincode').val(response.data.pincode);
                        $('#quantity').val(response.data.quantity);
                        $('#booking_date').val(response.data.booking_date);
                        $('#booking_time').val(response.data.booking_time);
                        $('#address').val(response.data.address);
                        $('#delivered_by').val(response.data.delivered_by);
                        $('#isDelivered').val(response.data.isDelivered);
                        $('#price').val(response.data.price);
                        $('#payment').val(response.data.payment);
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
                    alt_mobile: $('#alt_mobile').val(),
                    mobile: $('#mobile').val(),
                    pincode: $('#pincode').val(),
                    quantity: $('#quantity').val(),
                    booking_date: $('#booking_date').val(),
                    booking_time: $('#booking_time').val(),
                    address: $('#address').val(),
                    delivered_by: $('#delivered_by').val(),
                    isDelivered: $('#isDelivered').val(),
                    price: $('#price').val(),
                    payment: $('#payment').val(),
                    status: $('#status').val(),
                };
                $.ajax({
                    type: 'PUT',
                    url: `{{url('/api/book-event/edit/${id}')}}`,
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

            // $(document).on('click', '.delete-btn', function() {
            //     let id = $('#id').val();

            //     // Confirm deletion
            //     if (confirm("Are you sure you want to delete this Plan?")) {
            //         $.ajax({
            //             type: 'DELETE',
            //             url: `/api/book-event/delete/${id}`,
            //             headers: {
            //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //             },
            //             success: function(response) {
            //                 // console.log('Plan deleted successfully:', response);
            //                 $('#default-modal').addClass('hidden');
            //                 swal("success", response.message, "message");
            //                 callingData();
            //             },
            //             error: function(xhr, status, error) {
            //                 console.error('Error deleting Data:', error);
            //             }
            //         });
            //     }
            // });
            callingData();
        });
    </script>
@endsection
