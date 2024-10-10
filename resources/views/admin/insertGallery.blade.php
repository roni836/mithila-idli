@extends('admin.adminBase')
@section('content')
    <div class="  flex justify-center items-center h-screen">
        <div class="bg-gray-100 p-8 rounded-lg shadow-md w-full max-w-lg">
            <h2 class="text-2xl font-bold mb-6 text-center">Add News Form</h2>
            <form action="#" method="POST" class="space-y-4 " id="addData">
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                    <input type="title" id="title" name="title"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <p id="error-title" class="text-red-500 text-xs font-semibold error-message"></p>
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
                <div>
                    <button type="submit" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Add News Now</button>
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
                    url: "{{ route('gallery.store') }}",
                    data: formData,
                    dataType: "JSON",
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(response) {
                        swal("Success", response.message, "success");
                        $("#addData").trigger("reset");
                        window.open("{{url('/admin/manage-gallery')}}", "_self");
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
