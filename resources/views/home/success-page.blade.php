@extends('home.homeBase')
@section('title', 'Franchise Inquiry')
@section('content')
    <style>
        .fireworks {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: -1;
        }

        .firework {
            position: absolute;
            bottom: 100%;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            opacity: 0.7;
            animation: explode 0.5s forwards;
        }

        @keyframes explode {
            0% {
                transform: translateY(0) scale(1);
                opacity: 0.7;
            }

            100% {
                transform: translateY(-300px) scale(1.5);
                opacity: 0;
            }
        }

        /* @media print {
            body * {
                visibility: hidden;
            }

            #bill-section,
            #bill-section * {
                visibility: visible;
            }

            #bill-section {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                display: block;
                flex
            }
        } */

        @media print {
        body * {
            visibility: hidden;
        }

        #bill-section,
        #bill-section * {
            visibility: visible;
        }

        #bill-section {
            position: absolute;
            left: 50%;
            top: 0;
            transform: translateX(-50%);
            width: 100%; /* Full page width */
            max-width: 700px; /* Adjust this value to fit content to one page */
            height: auto;
            display: block;
        }

        /* Prevent page breaks inside important sections */
        #bill-section, #bill-section * {
            page-break-inside: avoid;
        }
    }

    /* On screen adjustments */
    #bill-section {
        margin: 0 auto;
        max-width: 700px;
        padding: 20px;
        background: white;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }
    </style>


    <div id="bill-section" class="max-w-lg mx-auto hidden bg-white shadow-lg rounded-lg p-6">
        <!-- Header -->
        <div class="text-center mb-6">
            <h1 class="text-2xl font-bold">Mithila Idli</h1>
            <h1 class="text-base font-normal">Customer Bill</h1>
            <p class="text-gray-500">Thank you for your order!</p>
        </div>
    
        <!-- Customer Details -->
        <div class="mb-6">
            <h2 class="text-xl font-semibold mb-2">Customer Details</h2>
            <div class="text-gray-700">
                <p><strong>Order ID:</strong> {{ $data->order_id }}</p>
                <p><strong>Name:</strong> {{ $data->name }}</p>
                <p><strong>Mobile:</strong> {{ $data->mobile }}</p>
                <p><strong>Alternate Mobile:</strong> {{ $data->alt_mobile }}</p>
                <p><strong>Pincode:</strong> {{ $data->pincode }}</p>
                <p><strong>Address:</strong> {{ $data->address }}</p>
            </div>
        </div>
    
        <!-- Order Details -->
        <div class="mb-6">
            <h2 class="text-xl font-semibold mb-2">Order Details</h2>
            <div class="text-gray-700">
                <p><strong>Quantity:</strong> {{ $data->quantity }}</p>
                <p><strong>Price (per unit):</strong> ₹20</p>
                <p><strong>Total Price:</strong> ₹{{ $data->quantity*20 }}</p>
                <p><strong>Booking Date:</strong> {{ $data->booking_date }}</p>
                <p><strong>Booking Time:</strong> {{ $data->booking_time }}</p>
            </div>
        </div>
    
        <!-- Footer -->
        <div class="text-center mt-8">
            <p class="text-gray-600">We hope to serve you again soon!</p>
        </div>
    </div>

    <div class="relative">

        <div class="container mx-auto flex items-center justify-center h-96 md:min-h-screen">
            <div class="bg-white shadow-lg rounded-lg p-6 text-center relative z-10">
                <button class="absolute text-2xl  top-2 right-2 text-gray-600"
                    onclick="window.location.href='{{ url('') }}'">&times;</button>
                <h3 class="text-2xl font-semibold mb-4">Thank You!</h3>
                <p class="text-gray-700 mb-2">We will call you soon for order verification.</p>
                <p class="text-gray-700 mb-4">Please make sure your mobile number is correct.</p>
                <p class="mb-4">If you have any questions, you can connect with us on WhatsApp.</p>

                <!-- WhatsApp Button -->
                <a href="https://wa.me/9955232260" target="_blank" class=" ">
                    <button class="py-2 px-4 bg-green-500 text-white rounded hover:bg-green-600 transition">
                        Connect on WhatsApp
                    </button></a>

                <!-- Print Receipt Button -->
                <button onclick="printReceipt()"
                    class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 transition mt-3">Print
                    Receipt</button>
            </div>
            <div class="fireworks"></div>
        </div>

        <script>
            function printReceipt() {
                window.print();
            }

            function createFirework() {
                const firework = document.createElement('div');
                firework.className = 'firework';
                firework.style.left = `${Math.random() * 100}vw`;
                firework.style.backgroundColor = `hsl(${Math.random() * 360}, 100%, 50%)`;
                firework.style.transition = 'transform 0.5s ease-out, opacity 0.5s ease-out';

                // Append the firework to the fireworks container
                document.querySelector('.fireworks').appendChild(firework);

                // Trigger animation
                setTimeout(() => {
                    firework.style.transform = 'translateY(-300px) scale(1.5)';
                    firework.style.opacity = '0';
                }, 10);

                // Remove the firework after the animation completes
                setTimeout(() => {
                    firework.remove();
                }, 500);
            }

            setInterval(createFirework, 500); // Adjust interval for more or fewer fireworks
        </script>

    </div>
@endsection
