@extends('home.homeBase')
@section('title', 'Order Now')
@section('content')
    <div class="bg-gray-200 flex justify-center items-center min-h-screen p-4">
        <div class="bg-white p-6 md:p-8 rounded-lg shadow-lg w-full max-w-lg">
            <h2 class="text-2xl font-bold mb-6 text-center"> Order Online</h2>
            <form action="#" method="POST" class="space-y-4" id="addData">
                <!-- Full Name Field -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                    <input type="text" id="name" name="name"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <p id="error-name" class="text-red-500 text-xs font-semibold"></p>
                </div>

                <!-- Mobile Number Field -->
                <div>
                    <label for="mobile" class="block text-sm font-medium text-gray-700">Mobile Number</label>
                    <input type="tel" id="mobile" name="mobile" pattern="[6789][0-9]{9}" required
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <p id="error-mobile" class="text-red-500 text-xs font-semibold"></p>
                </div>
                <div>
                    <label for="mobile" class="block text-sm font-medium text-gray-700">Confirm Mobile Number</label>
                    <input type="tel" id="confirm_mobile" name="confirm_mobile" pattern="[6789][0-9]{9}" required
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <p id="error-confirm_mobile" class="text-red-500 text-xs font-semibold"></p>
                </div>
                <div>
                    <label for="mobile" class="block text-sm font-medium text-gray-700">Alternate Mobile Number</label>
                    <input type="tel" id="alt_mobile" name="alt_mobile" pattern="[6789][0-9]{9}" required
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <p id="error-alt_mobile" class="text-red-500 text-xs font-semibold"></p>
                </div>
                <div>
                    <label for="event_type" class="block text-sm font-medium text-gray-700">Booking For</label>
                    <select id="event_type" name="event_type"
                        class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="">Select Event Type</option>
                        <option value="wedding-party">Wedding Party</option>
                        <option value="birthday-party">Birthday Party</option>
                        <option value="anniversary-party">Anniversary Party</option>
                        <option value="kitty-party">Kitty Party</option>
                        {{-- <option value="office-party">Office Party</option> --}}
                        <option value="other">Any Other Event</option>
                    </select>
                    <p id="error-event_type" class="text-red-500 text-xs font-semibold"></p>
                </div>

                <!-- Booking Date Field -->
                <div class="mb-6">
                    <label for="booking_date" class="block text-sm font-medium text-gray-700 mb-2">
                        Booking Date & Time <span class="text-xs">(Orders must be placed at least one day in advance)</span>
                    </label>

                    <div class="flex flex-col md:flex-row md:space-x-4">
                        <!-- Booking Date Input -->
                        <div class="md:w-1/2">
                            <input type="date" id="booking_date" name="booking_date"
                                class="block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm bg-white focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition duration-300 ease-in-out">
                        </div>

                        <!-- Booking Time Select -->
                        <div class="md:w-1/2 mt-4 md:mt-0">
                            <select name="booking_time" id="booking_time"
                                class="block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm bg-white focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition duration-300 ease-in-out">
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
                            </select>
                        </div>
                    </div>
                    <p id="error-booking_date" class="text-red-500 text-xs font-semibold mt-2"></p>
                    <p id="error-booking_time" class="text-red-500 text-xs font-semibold mt-2"></p>
                </div>

                <div>
                    <label for="area" class="block text-sm font-medium text-gray-700">Full Address</label>
                    <textarea id="address" name="address" rows="2"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
                    <p id="error-address" class="text-red-500 text-xs font-semibold"></p>
                </div>
                <!-- Pincode Field -->
                <div class="flex flex-col md:flex-row md:space-x-4">
                    <!-- Pincode Field -->
                    <div class="md:w-1/2">
                        <label for="pincode" class="block text-sm font-medium text-gray-700">Pincode</label>
                        <input type="number" id="pincode" name="pincode"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <p id="error-pincode" class="text-red-500 text-xs font-semibold"></p>
                    </div>

                    <!-- City Field -->
                    <div class="md:w-1/2 mt-4 md:mt-0">
                        <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                        <select name="city" id="city"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value="" selected>Purnea</option>
                        </select>
                    </div>
                </div>

                <div class="flex flex-col md:flex-row gap-5">
                    <!-- Quantity Field -->
                    <div class="md:w-1/2">
                        <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity (Minimum 50
                            Plates)</label>
                        <input type="number" id="quantity" name="quantity" min="50"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <p id="error-quantity" class="text-red-500 text-xs font-semibold"></p>
                    </div>

                    <!-- Total Amount Field -->
                    <div class="md:w-1/2">
                        <label for="total_amount" class="block text-sm font-medium text-gray-700">Total Amount (1
                            Plate = ₹20)</label>
                        <input type="text" id="total_amount" name="price" readonly
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-100 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                </div>


                <!-- Terms and Conditions -->
                <div class="flex justify-between items-center">
                    <label class="flex items-center text-sm font-medium text-gray-700">
                        <input type="checkbox" name="terms" class="h-4 w-4 text-indigo-600 border-gray-300 rounded">
                        <span class="ml-2">I agree to the terms and conditions</span>
                    </label>
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit"
                        class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Confirm Order
                    </button>
                </div>
            </form>
        </div>
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
                // let formData = {
                //     price: $('#total_amount').val(),
                // }

                $.ajax({
                    type: "POST",
                    url: "{{ route('order.store') }}",
                    data: formData,
                    dataType: "JSON",
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(response) {
                        $('#loader').hide();
                        const confirmUrl = "{{ url('confirm-order') }}/" + response.token;
                        window.location.href = confirmUrl; // Redirect to confirmation page
                    },
                    error: function(xhr) {
                        $('#loader').hide();
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
        });
    </script>
    <script>
        // Price per plate
        const pricePerPlate = 20;

        document.getElementById('quantity').addEventListener('input', function() {
            const quantity = parseInt(this.value, 10);
            if (!isNaN(quantity) && quantity >= 50) {
                const totalPrice = quantity * pricePerPlate;
                document.getElementById('total_amount').value = '₹ ' + totalPrice;
            } else {
                document.getElementById('total_amount').value = '';
            }
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get the date input field
            let dateInput = document.getElementById('booking_date');

            // Create a new date object for tomorrow
            let tomorrow = new Date();
            tomorrow.setDate(tomorrow.getDate() + 1);

            // Format the date to YYYY-MM-DD (required by the input[type="date"])
            let day = ("0" + tomorrow.getDate()).slice(-2);
            let month = ("0" + (tomorrow.getMonth() + 1)).slice(-2);
            let year = tomorrow.getFullYear();
            let tomorrowFormatted = `${year}-${month}-${day}`;

            // Set the min attribute and value for the date input field
            dateInput.min = tomorrowFormatted;
            dateInput.value = tomorrowFormatted;
        });
    </script>
@endsection
