@extends('home.homeBase')
@section('title', 'Confirmation')
@section('content')
    <div class="bg-gray-100 min-h-screen p-6">
        <div class="max-w-lg mx-auto bg-white p-8 shadow-lg rounded-lg">
            <h2 class="text-2xl font-extrabold mb-6 text-center text-indigo-600">Confirm Your Order</h2>
            <div class="space-y-4">
                <p><strong>Order ID:</strong> <span class="text-gray-600">{{ $orderDetails['order_id'] }}</span></p>
                <p><strong>Name:</strong> <span class="text-gray-600">{{ $orderDetails['name'] }}</span></p>
                <p><strong>Contact No.:</strong> <span class="text-gray-600">{{ $orderDetails['mobile'] }}</span></p>
                <p><strong>Quantity:</strong> <span class="text-gray-600">{{ $orderDetails['quantity'] }} Plate (1 plate = 2pcs idli)</span></p>
                <p><strong>Amount:</strong> <span class="text-green-500 font-bold">₹{{ number_format($orderDetails['amount'], 2) }}</span></p>
                <p><strong>Address:</strong> <span class="text-gray-600">{{ $orderDetails['address'] }}, Purnea - {{ $orderDetails['pincode'] }}</span></p>
            </div>

            <!-- Payment Method Selection -->
            <div class="mt-6">
                <h3 class="text-lg font-semibold mb-4 text-gray-700">Select Payment Method</h3>
                <div class="flex items-center justify-around">
                    <label class="inline-flex items-center cursor-pointer">
                        <input type="radio" name="payment_method" value="cod" checked onclick="showPaymentOption('cod')" class="form-radio text-indigo-600">
                        <span class="ml-2 text-gray-800">Cash on Delivery (COD)</span>
                    </label>
                    <label class="inline-flex items-center cursor-pointer">
                        <input type="radio" name="payment_method" value="upi" onclick="showPaymentOption('upi')" class="form-radio text-indigo-600">
                        <span class="ml-2 text-gray-800">Pay with UPI</span>
                    </label>
                </div>
            </div>

            <!-- UPI Payment Section -->
            <div id="upi-section" class="hidden mt-6 transition-opacity duration-500">
                <h3 class="text-lg font-semibold mb-2 text-gray-700">Pay with UPI</h3>
                <!-- Display QR code image -->
                <div class="mb-4 flex justify-center">
                    <img src="{{ asset('/logo/scanner.jpg') }}" alt="UPI QR Code" class="w-40 h-40">
                </div>
                <p class="text-sm text-gray-600 text-center">Scan this QR code to pay via UPI:</p>

                <!-- Display UPI ID -->
                <div class="text-center mt-2">
                    <p class="text-sm text-gray-700 font-bold">UPI ID: {{ $orderDetails['upi_id'] }}</p>
                </div>
            </div>

            <!-- Confirm Payment Button -->
            <button class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold px-6 py-3 rounded-lg mt-6 w-full transition-all duration-300 ease-in-out transform hover:scale-105"
                onclick="confirmOrder()">
                Confirm Order
            </button>
        </div>
    </div>
    <script>
        // Show UPI Section when UPI is selected
        function showPaymentOption(option) {
            const upiSection = document.getElementById("upi-section");
            upiSection.classList.toggle('hidden', option !== 'upi');
        }
    
        // Function to confirm order based on selected payment method
        function confirmOrder() {
            const selectedPaymentMethod = document.querySelector('input[name="payment_method"]:checked').value;
    
            if (!selectedPaymentMethod) {
                alert('Please select a payment method.');
                return;
            }
    
            // Prepare data to send via AJAX
            const data = {
                payment_method: selectedPaymentMethod,
                order_id: "{{ $orderDetails['order_id'] }}", 
            };
    
            $.ajax({
                type: "POST",
                url: "{{ route('order.confirm') }}",
                data: data,
                dataType: "JSON",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.status === 200) {
                        // swal("Thanking You", response.message, "success");
                        window.location.href= "{{ url('/order/success') }}/" + response.token;
                    } else {
                        swal("Error", response.message, "error");
                    }
                },
                error: function(xhr) {
                    // Handle errors
                    alert('An error occurred. Please try again. Status: ' + xhr.status);
                }
            });
        }
    </script>
    
    
@endsection

 {{-- <script>
        // Show UPI Section when UPI is selected
        function showPaymentOption(option) {
            const upiSection = document.getElementById("upi-section");
            if (option === 'upi') {
                upiSection.classList.remove('hidden');
            } else {
                upiSection.classList.add('hidden');
            }
        }

        // Function to confirm order based on selected payment method
        function confirmOrder() {
            const selectedPaymentMethod = document.querySelector('input[name="payment_method"]:checked').value;

            if (selectedPaymentMethod === 'cod') {
                alert('Order placed with Cash on Delivery. Your order is confirmed!');
                // Implement logic to handle COD confirmation (e.g., redirect to confirmation page)
            } else if (selectedPaymentMethod === 'upi') {
                alert('Please complete the payment via your UPI app.');
                // Implement logic to verify UPI payment
            }
        }
    </script> --}}