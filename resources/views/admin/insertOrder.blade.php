@extends('admin.adminBase')
@section('content')

<div class="  flex justify-center items-center h-screen">
    <div class="bg-gray-100 p-8 rounded-lg shadow-md w-full max-w-lg">
        <h2 class="text-2xl font-bold mb-6 text-center">Online Order Form</h2>
        <form action="#" method="POST" class="space-y-4 " id="addData">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                <input type="text" id="name" name="name"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <p id="error-name" class="text-red-500 text-xs font-semibold error-message"></p>

            </div>
            <div>
                <label for="mobile" class="block text-sm font-medium text-gray-700">Mobile Number</label>
                <input type="tel" id="mobile" name="mobile"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <p id="error-mobile" class="text-red-500 text-xs font-semibold error-message"></p>
            </div>
            <div>
                <label for="address" class="block text-sm font-medium text-gray-700">Delivery Address</label>
                <textarea id="address" name="address" rows="2" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
                <p id="error-address" class="text-red-500 text-xs font-semibold error-message"></p>
            </div>
            <div>
                <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity (Minimum 10 Plates & 1 Plate = 2 piece idli)</label>
                <input type="number" id="quantity" name="quantity" min="1"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <p id="error-quantity" class="text-red-500 text-xs font-semibold error-message"></p>
            </div>
            <div class="flex justify-between items-center">
                <label class="flex items-center text-sm font-medium text-gray-700">
                    <input type="checkbox" name="terms" class="h-4 w-4 text-indigo-600 border-gray-300 rounded">
                    <span class="ml-2">I agree to the terms and conditions</span>
                </label>
            </div>
            <div>
                <button type="submit"
                    class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Confirm
                    Order</button>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Insert application details
        $("#addData").submit(function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            $.ajax({
                type: "POST",
                url: "{{ route('order.store') }}",
                data: formData,
                dataType: "JSON",
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                    swal("Success", response.message, "success");
                    $("#addData").trigger("reset");
                    window.open("{{url('/admin')}}", "_self");
                },
                error: function(xhr) {
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
    })
</script>

@endsection
