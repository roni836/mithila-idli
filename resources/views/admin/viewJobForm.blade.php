@extends('admin.adminBase')
@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gray-100 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto w-full space-y-8">
            <div class="bg-white shadow-xl rounded-lg p-10 transform transition duration-300 ">
                <h2 class="text-center text-xl font-bold text-gray-800 mb-8">Job Application Form (View Mode)</h2>

                <!-- Passport Sized Photo in the center -->
                <div class="flex justify-center mb-8">
                    <a href="{{ asset('career/candidate/photo/' . $data->photo) }}" target="_blank" rel="noopener noreferrer">
                        <img src="{{ asset('career/candidate/photo/' . $data->photo) }}" alt="Passport Photo"
                        class="w-32 h-32 rounded-full shadow-lg border-4 border-gray-200">
                    </a>
                   
                </div>

                <!-- Form Details Display -->
                <div class="grid grid-cols-2 gap-6">
                    <!-- Name -->
                    <div class="flex gap-3">
                        <span class="font-semibold text-gray-700">Name:</span>
                        <span class="text-gray-900">{{$data->name}}</span>
                    </div>

                    <!-- Date of Birth -->
                    <div class="flex gap-3">
                        <span class="font-semibold text-gray-700">Date of Birth:</span>
                        <span class="text-gray-900">{{$data->dob}}</span>
                    </div>

                    <!-- Mother's Name -->
                    <div class="flex gap-3">
                        <span class="font-semibold text-gray-700">Mother's Name:</span>
                        <span class="text-gray-900">{{$data->mother}}</span>
                    </div>

                    <!-- Father's Name -->
                    <div class="flex gap-3">
                        <span class="font-semibold text-gray-700">Father's Name:</span>
                        <span class="text-gray-900">{{$data->father}}</span>
                    </div>

                    <!-- Gender -->
                    <div class="flex gap-3">
                        <span class="font-semibold text-gray-700">Gender:</span>
                        <span class="text-gray-900">{{$data->gender}}</span>
                    </div>

                    <!-- Religion -->
                    <div class="flex gap-3">
                        <span class="font-semibold text-gray-700">Religion:</span>
                        <span class="text-gray-900">{{$data->religion}}</span>
                    </div>

                    <!-- Community -->
                    <div class="flex gap-3">
                        <span class="font-semibold text-gray-700">Community:</span>
                        <span class="text-gray-900">{{$data->community}}</span>
                    </div>

                    <!-- Mobile -->
                    <div class="flex gap-3">
                        <span class="font-semibold text-gray-700">Mobile:</span>
                        <span class="text-gray-900">{{$data->mobile}}</span>
                    </div>

                    <!-- Email -->
                    <div class="flex gap-3">
                        <span class="font-semibold text-gray-700">Email:</span>
                        <span class="text-gray-900">{{$data->email}}</span>
                    </div>

                    <!-- Experience -->
                    <div class="flex gap-3">
                        <span class="font-semibold text-gray-700">Experience:</span>
                        <span class="text-gray-900">{{$data->experience}}</span>
                    </div>

                    <!-- Skills -->
                    <div class="flex gap-3">
                        <span class="font-semibold text-gray-700">Skills:</span>
                        <span class="text-gray-900">{{$data->skills}}</span>
                    </div>

                    <!-- Area -->
                    <div class="flex gap-3">
                        <span class="font-semibold text-gray-700">Area:</span>
                        <span class="text-gray-900">{{$data->area}}</span>
                    </div>

                    <!-- Pincode -->
                    <div class="flex gap-3">
                        <span class="font-semibold text-gray-700">Pincode:</span>
                        <span class="text-gray-900">{{$data->pincode}}</span>
                    </div>

                    <!-- City -->
                    <div class="flex gap-3">
                        <span class="font-semibold text-gray-700">City:</span>
                        <span class="text-gray-900">{{$data->city}}</span>
                    </div>

                    <!-- State -->
                    <div class="flex gap-3">
                        <span class="font-semibold text-gray-700">State:</span>
                        <span class="text-gray-900">{{$data->state}}</span>
                    </div>

                    <!-- Qualification -->
                    <div class="flex gap-3">
                        <span class="font-semibold text-gray-700">Qualification:</span>
                        <span class="text-gray-900">{{$data->qualification}}</span>
                    </div>

                    <!-- Choose Job -->
                    <div class="flex gap-3">
                        <span class="font-semibold text-gray-700">Applied For Job:</span>
                        <span class="text-gray-900">{{$data->career->title}}</span>
                    </div>

                </div>

                <!-- Resume Section -->
                <div class="mt-10">
                    <h3 class="text-lg font-bold text-gray-800 mb-2">Resume</h3>
                    <div class="bg-gray-50 p-6 rounded-lg shadow-inner transition duration-300 hover:bg-gray-100">

                        <p class="text-gray-700"><a href="{{ asset('career/candidate/document/' . $data->document) }}" target="_blank" rel="noopener noreferrer"><img src="{{ asset('career/candidate/document/' . $data->document) }}" alt=""></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
