@extends('admin.adminBase')
@section('content')
    <div class="  flex justify-center items-center">
        <div class="bg-gray-100 p-8 rounded-lg shadow-md w-full max-w-lg mt-20">
            <h2 class="text-2xl font-bold mb-6 text-center">Online Order Form</h2>
            <form action="{{ url('/admin/order/update/' . $user->id) }}" method="POST" class="space-y-4" id="addData">

                @csrf
                @method('PUT')

                <!-- Full Name Field -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                    <input type="text" id="name" name="name" value="{{ $user->name }}"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        readonly>
                    <p id="error-name" class="text-red-500 text-xs font-semibold"></p>
                </div>

                <!-- Mobile Number Field -->
                <div>
                    <label for="mobile" class="block text-sm font-medium text-gray-700">Mobile Number</label>
                    <input type="tel" id="mobile" name="mobile" value="{{ $user->mobile }}" pattern="[6789][0-9]{9}"
                        required
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        readonly>
                    <p id="error-mobile" class="text-red-500 text-xs font-semibold"></p>
                </div>
                <div>
                    <label for="mobile" class="block text-sm font-medium text-gray-700">Alternate Mobile Number</label>
                    <input type="tel" id="alt_mobile" name="alt_mobile" value="{{ $user->alt_mobile }}"
                        pattern="[6789][0-9]{9}" required
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        readonly>
                    <p id="error-alt_mobile" class="text-red-500 text-xs font-semibold"></p>
                </div>

                <!-- Booking Date Field -->
                <div class="mb-6">
                    <label for="booking_date" class="block text-sm font-medium text-gray-700 mb-2">
                        Booking Date & Time <span class="text-xs">(Orders must be placed at least one day in advance)</span>
                    </label>

                    <div class="flex flex-col md:flex-row md:space-x-4">
                        <!-- Booking Date Input -->
                        <div class="md:w-1/2">
                            <input type="date" id="booking_date" value="{{ $user->booking_date }}" name="booking_date"
                                class="block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm bg-white focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition duration-300 ease-in-out"
                                readonly>
                        </div>

                        <!-- Booking Time Select -->
                        <div class="md:w-1/2 mt-4 md:mt-0">
                            <input type="text" id="booking_date" value="{{ $user->booking_time }}" name="booking_date"
                            class="block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm bg-white focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition duration-300 ease-in-out"
                            readonly>
                            {{-- <select name="booking_time" id="booking_time" value="{{ $user->booking_time }}"
                                class="block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm bg-white focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition duration-300 ease-in-out"
                                readonly>
                                <input type="text">
                                <option value="">Choose time</option>
                                <option value="09 am to 10 am">09 am to 10 am</option>
                                <option value="10 am to 11 am">10 am to 11 am</option>
                                <option value="11 am to 12 pm">11 am to 12 pm</option>
                                <option value="12 pm to 01 pm">12 pm to 01 pm</option>
                                <option value="01 pm to 02 pm">01 pm to 02 pm</option>
                                <option value="02 pm to 03 pm">02 pm to 03 pm</option>
                                <option value="03 pm to 04 pm">03 pm to 04 pm</option>
                                <option value="04 pm to 05 pm">04 pm to 05 pm</option>
                                <option value="05 pm to 06 pm">05 pm to 06 pm</option>
                                <option value="06 pm to 07 pm">06 pm to 07 pm</option>
                                <option value="07 pm to 08 pm">07 pm to 08 pm</option>
                                <option value="08 pm to 09 pm">08 pm to 09 pm</option>
                                <option value="09 pm to 10 pm">09 pm to 10 pm</option>
                            </select> --}}
                        </div>
                    </div>
                    <p id="error-booking_date" class="text-red-500 text-xs font-semibold mt-2"></p>
                    <p id="error-booking_time" class="text-red-500 text-xs font-semibold mt-2"></p>
                </div>

                <div>
                    <label for="area" class="block text-sm font-medium text-gray-700">Full Address</label>
                    <input type="text" id="booking_date" value="{{ $user->address }}" name="booking_date"
                    class="block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm bg-white focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition duration-300 ease-in-out"
                    readonly>
                    {{-- <textarea id="address" name="address" value="{{ $user->address }}" rows="2"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea> --}}
                    <p id="error-address" class="text-red-500 text-xs font-semibold"></p>
                </div>
                <!-- Pincode Field -->
                <div class="flex flex-col md:flex-row md:space-x-4">
                    <!-- Pincode Field -->
                    <div class="md:w-1/2">
                        <label for="pincode" class="block text-sm font-medium text-gray-700">Pincode</label>
                        <input type="number" id="pincode" value="{{ $user->pincode }}" name="pincode"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            readonly>
                        <p id="error-pincode" class="text-red-500 text-xs font-semibold"></p>
                    </div>

                    <!-- City Field -->
                    <div class="md:w-1/2 mt-4 md:mt-0">
                        <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                        <select name="city" id="city"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            readonly>
                            <option value="" selected>Purnea</option>
                        </select>
                    </div>
                </div>

                <div class="flex flex-col md:flex-row gap-5">
                    <!-- Quantity Field -->
                    <div class="md:w-1/2">
                        <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity (Minimum 50
                            Plates)</label>
                        <input type="number" value="{{ $user->quantity }}" id="quantity" name="quantity"
                            min="50"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            readonly>
                        <p id="error-quantity" class="text-red-500 text-xs font-semibold"></p>
                    </div>

                    <!-- Total Amount Field -->
                    <div class="md:w-1/2">
                        <label for="total_amount" class="block text-sm font-medium text-gray-700">Total Amount (1
                            Plate = ₹20)</label>
                        <input type="text" id="total_amount" value="{{ $user->price }}" name="price" readonly
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-100 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                </div>

{{-- 
                <div class="flex flex-col md:flex-row gap-3 ">
                    <!-- Quantity Field -->
                    <div class="md:w-1/2">
                        <label for="status" class="block text-sm font-medium text-gray-700">Payment Method</label>
                        <select name="payment_method" value="{{ $user->payment_method }}" id="payment_method"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            readonly>
                            <p id="error-quantity" class="text-red-500 text-xs font-semibold">
                                <option value="">Not Selected</option>
                                <option value="cod">Cash on delivery</option>
                                <option value="upi">UPI</option>
                        </select>
                    </div>
                    <div class="md:w-1/2">
                        <label for="status" class="block text-sm font-medium text-gray-700">Payment Status</label>
                        <select name="payment" value="{{ $user->payment }}" id="payment"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            readonly>
                            <p id="error-quantity" class="text-red-500 text-xs font-semibold">
                                <option value="">Not Selected</option>
                                <option value="1">Paid</option>
                                <option value="0">Not Paid</option>
                        </select>
                    </div>
                </div>
                <div class="flex flex-col md:flex-row ">
                    <!-- Quantity Field -->
                    <div class="md:w-full">
                        <label for="status" value="{{ $user->isDelivered }}"
                            class="block text-sm font-medium text-gray-700">Delivery Status</label>
                        <select name="isDelivered" id="isDelivered"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            readonly>
                            <p id="error-quantity" class="text-red-500 text-xs font-semibold">
                                <option value="0">Not Delivered</option>
                                <option value="1">Delivered</option>
                        </select>
                    </div>
                </div> --}}

            
                {{-- <div class="mt-4">
                    <button type="button" id="editButton"
                        class="w-full bg-yellow-500 text-white py-2 px-4 rounded-md shadow-sm hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                        Edit Details
                    </button>
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit"
                        class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Update Now
                    </button>
                </div> --}}
            </form>
        </div>
    </div>

    {{-- <script>
        $(document).ready(function() {
            // Handle form submission
            $("#addData").submit(function(e) {
                e.preventDefault();
                
                // Get the form data
                let formData = new FormData(this);
                let orderId = {{$user->id}}; // Assuming the order ID is 2, you can dynamically set this value
                
                $.ajax({
                    type: "PUT", // Use PUT for updating resources
                    url: "{{ url('/api/order/update/') }}/" + orderId, // Dynamic order ID in URL
                    data: formData,
                    dataType: "JSON",
                    contentType: false, // Important for sending FormData correctly
                    cache: false,
                    processData: false,
                    success: function(response) {
                        // Handle success response
                        swal("Success", response.message, "success"); // Show success message
                        $("#addData").trigger("reset"); // Reset the form
                        window.open("{{ url('/admin') }}", "_self"); // Redirect to the admin page
                    },
                    error: function(xhr) {
                        // Clear previous error messages
                        $('.error-message').html('');
                        
                        if (xhr.status === 422) {
                            // Handle validation errors
                            var errors = xhr.responseJSON.errors;
                            $('.error-message').html(''); // Clear any existing errors
                            
                            $.each(errors, function(key, value) {
                                $('#error-' + key).html(value[0]).show(); // Show errors on the corresponding fields
                            });
                        } else {
                            // Handle any other errors
                            alert('An error occurred. Please try again.');
                        }
                    }
                });
            });
        });
    </script> --}}
    

{{-- 
    <script>
        $(document).ready(function() {
            $('#editButton').click(function() {
                // Toggle readonly attribute for each input field
                $('#addData').find('input, select, textarea').each(function() {
                    if ($(this).attr('readonly')) {
                        $(this).removeAttr('readonly');
                    } else {
                        $(this).attr('readonly', true);
                    }
                });
            });
        });
    </script> --}}
@endsection
