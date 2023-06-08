<!-- resources/views/kyc/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="text-2xl font-bold mb-4">Submitted KYC Data</h2>
        <div class="border border-gray-200 rounded-lg p-6">
            <div class="grid grid-cols-2 gap-4">
                <div class="col-span-2 sm:col-span-1">
                    <h3 class="text-xl font-semibold mb-2">Personal Information</h3>
                    <p><span class="font-semibold">Full Name:</span> {{ $kycVerification->full_name }}</p>
                    <p><span class="font-semibold">Date of Birth:</span> {{ $kycVerification->date_of_birth }}</p>
                    <p><span class="font-semibold">Gender:</span> {{ $kycVerification->gender }}</p>
                    <!-- Add more fields as needed -->
                </div>
                <div class="col-span-2 sm:col-span-1">
                    <h3 class="text-xl font-semibold mb-2">Contact Information</h3>
                    <p><span class="font-semibold">Email:</span> {{ $kycVerification->email }}</p>
                    <p><span class="font-semibold">Phone Number:</span> {{ $kycVerification->phone_number }}</p>
                    <!-- Add more fields as needed -->
                </div>
            </div>
            <div class="mt-6">
                <h3 class="text-xl font-semibold mb-2">Address</h3>
                <p><span class="font-semibold">Street:</span> {{ $kycVerification->street }}</p>
                <p><span class="font-semibold">City:</span> {{ $kycVerification->city }}</p>
                <p><span class="font-semibold">State:</span> {{ $kycVerification->state }}</p>
                <p><span class="font-semibold">Postal Code:</span> {{ $kycVerification->postal_code }}</p>
                <p><span class="font-semibold">Country:</span> {{ $kycVerification->country }}</p>
            </div>

            <div class="mt-6 flex justify-end">
                <form action="{{ route('kyc.approve', $kycVerification->id) }}" method="POST" class="mr-2">
                    @csrf
                    <button type="submit" class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded">Approve</button>
                </form>
                <form action="{{ route('kyc.reject', $kycVerification->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded">Reject</button>
                </form>
            </div>
        </div>
    </div>
@endsection
