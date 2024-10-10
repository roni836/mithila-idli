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
    </style>

    <div class="relative">

        <div class="container mx-auto flex items-center justify-center h-96 md:min-h-screen">
            <div class="bg-white shadow-lg rounded-lg p-6 text-center relative z-10">
                <button class="absolute text-2xl  top-2 right-2 text-gray-600"
                    onclick="window.location.href='{{url('')}}'">&times;</button>
                <h3 class="text-2xl font-semibold mb-4">Thank You!</h3>
                <p class="text-gray-700 mb-2">We will call you soon for order verification.</p>
                <p class="text-gray-700 mb-4">Please make sure your mobile number is correct.</p>
                <p class="mb-4">If you have any questions, you can connect with us on WhatsApp.</p>

                <!-- WhatsApp Button -->
                <a href="https://wa.me/{{ env('PHONE_NO') }}" target="_blank" class=" ">
                    <button class="py-2 px-4 bg-green-500 text-white rounded hover:bg-green-600 transition">
                        Connect on WhatsApp
                    </button></a>

                <!-- Print Receipt Button -->
                <button onclick="printReceipt()"
                    class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 transition mt-3" disabled>Print
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
