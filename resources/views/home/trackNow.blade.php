@extends('home.homeBase')
@section('title', 'Track Your Order')
@section('content')
    <div class="container  mx-auto mt-10">
        <div class="max-w-lg mx-auto bg-white p-6 rounded shadow-md">
            <h2 class="text-xl font-bold mb-4 text-center">Track Your Order</h2>

            {{-- <div id="errorMessage" class="bg-red-500 text-white p-2 rounded mb-4 hidden"></div> --}}

            <form id="trackOrderForm">
                @csrf
                <div class="mb-4">
                    <label for="search_input" class="block font-medium text-gray-700">Order ID or Mobile Number</label>
                    <input type="text" name="search_input" id="search_input"
                        class="mt-1 p-2 block w-full border rounded focus:outline-none focus:border-blue-500" required>
                </div>
                <p id="errorMessage" class="text-red-500 text-xs font-semibold error-message hidden"></p>
                <div>
                    <button type="button" disabled class="w-full bg-blue-500 text-white p-2 rounded hover:bg-blue-600">Track
                        Order</button>
                </div>
            </form>

            <div id="orderDetails" class="mt-6 hidden">
                <!-- Order details will be appended here -->
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            let typingTimer; // Timer identifier
            let doneTypingInterval = 500; // Time in ms to wait before making the request
    
            $('#search_input').on('keyup', function() {
                clearTimeout(typingTimer); // Clear the previous timer
                var searchInput = $(this).val();
    
                // Wait for doneTypingInterval before making the request
                typingTimer = setTimeout(function() {
                    triggerSearch(searchInput);  // Call the function to trigger the search
                }, doneTypingInterval);
            });
    
            function triggerSearch(searchInput) {
                $.ajax({
                    url: "{{ route('track.order') }}",
                    type: 'POST',
                    data: {
                        _token: $('input[name="_token"]').val(), 
                        search_input: searchInput
                    },
                    success: function(response) {
                        if(response.status === 200) {
                            let card = $("#orderDetails");
                            card.empty(); // Clear previous results
    
                            let data = response.data;
                            if (data.length > 0) {
                                data.forEach((order) => {
                                    card.append(`
                                        <div class='mt-5'>
                                            <div class="bg-green-100 shadow-lg rounded-lg p-6 max-w-lg mx-auto">
                                                <h3 class="text-xl font-bold mb-4 text-center text-blue-600">Order Details</h3>
                                                <div class="border-b mb-4 pb-2">
                                                    <p class="text-gray-600"><strong>Order ID:</strong> ${order.order_id}</p>
                                                    <p class="text-gray-600"><strong>Name:</strong> ${order.name ?? 'N/A'}</p>
                                                </div>
                                                <div class="grid grid-cols-2 gap-4 border-b mb-4 pb-4">
                                                    <div>
                                                        <p class="text-gray-600"><strong>Quantity:</strong> ${order.quantity}</p>
                                                    </div>
                                                    <div>
                                                        <p class="text-gray-600"><strong>Total Amount:</strong> ₹${order.quantity * 20}</p>
                                                    </div>
                                                </div>
                                                <div class="border-b mb-4 pb-2">
                                                    <p class="text-gray-600"><strong>Address:</strong> ${order.address ?? 'N/A'}, ${order.pincode ?? 'N/A'}</p>
                                                    <p class="text-gray-600"><strong>Booking Date & Time:</strong> ${order.booking_date ?? 'N/A'} at ${order.booking_time ?? 'N/A'}</p>
                                                </div>
                                                <div class="mb-4">
                                                    <p class="text-gray-600"><strong>Delivery Status:</strong> 
                                                        <span class="${order.isDelivered ? 'text-green-500' : 'text-red-500'}">
                                                            ${order.isDelivered ? 'Delivered' : 'Not Delivered'}
                                                        </span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    `);
                                });
                                card.removeClass('hidden');
                            } else {
                                $('#errorMessage').html('<p>No orders found.</p>').removeClass('hidden');
                            }
                        }
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            var errors = xhr.responseJSON.errors;
                            var errorMessages = '';
                            $.each(errors, function(key, value) {
                                errorMessages += `<p>${value}</p>`;
                            });
                            $('#errorMessage').html(errorMessages).removeClass('hidden');
                        } else if (xhr.status === 404) {
                            $('#errorMessage').html('<p>Order not found.</p>').removeClass('hidden');
                        }
                    }
                });
            }
        });
    </script>
    
    

@endsection


{{-- <div class="text-center">
    <p class="text-lg font-semibold ${order.status === 'completed' ? 'text-green-600' : 'text-yellow-500'}">
        ${order.status.charAt(0).toUpperCase() + order.status.slice(1) ?? 'N/A'}
    </p>
</div> --}}
