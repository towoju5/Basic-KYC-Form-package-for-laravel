<!-- resources/views/kyc/show.blade.php -->

@extends(config('kyc-form.layout'))


@section('content')
    <script src="https://cdn.tailwindcss.com"></script>
    
    <div class="py-5">
        <h2 class="text-2xl font-bold mb-4">Submitted KYC Data</h2>
        <div class="border border-gray-200 rounded-lg p-6">
            <div class="grid grid-cols-2 gap-4">
                <div class="col-span-2 sm:col-span-1">
                    <h3 class="text-xl font-semibold mb-2">Personal Information</h3>
                    <p><span class="font-semibold">Full Name:</span> {{ $kycVerification->full_name }}</p>
                    <p><span class="font-semibold">Date of Birth:</span> {{ $kycVerification->date_of_birth }}</p>
                    <p><span class="font-semibold">Address:</span> {{ $kycVerification->address }}</p>
                    
                    <p><span class="font-semibold">Email:</span> {{ $kycVerification->email }}</p>
                    <p><span class="font-semibold">ID Numberr:</span> {{ $kycVerification->id_number }}</p>
                    <!-- Add more fields as needed -->
                </div>
            </div>
            <div class="mt-6">
                <h3 class="text-xl font-semibold">Documents</h3>
                <small>Click on image to open in full width on a new Tab</small>
                <hr class=" my-3">
                <div class="flex flex-row space-x-5 justify-between text-center">
                    @if (!empty($kycVerification->id_document))
                        <div>
                            <span class="font-semibold pb-3">Identity Document:</span>
                            <a href="{{ asset($kycVerification->id_document) }}" target="_blank">
                                <img src="{{ asset($kycVerification->id_document) }}" width="300px" alt="Identity document">
                            </a>
                        </div>
                    @endif
                    @if (!empty($kycVerification->proof_of_address))
                        <div>
                            <span class="font-semibold pb-3">Proof of Address Document:</span>
                            <a href="{{ asset($kycVerification->proof_of_address) }}" target="_blank">
                                <img src="{{ asset($kycVerification->proof_of_address) }}" width="300px" alt="Identity document">
                            </a>
                        </div>
                    @endif
                    @if (!empty($kycVerification->additional_document))
                        <div>
                            <span class="font-semibold pb-3">Additional Document:</span>
                            <a href="{{ asset($kycVerification->additional_document) }}" target="_blank">
                                <img src="{{ asset($kycVerification->additional_document) }}" width="300px" alt="Identity document">
                            </a>
                        </div>
                    @endif
                </div>
            </div>

            <div class="mt-6 flex justify-end space-x-4">
                <form action="{{ route('kyc.approve', $kycVerification->id) }}" method="POST" class="mr-2">
                    @csrf
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded">Approve</button>
                </form>
                <form action="{{ route('kyc.reject', $kycVerification->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded">Reject</button>
                </form>

                <a href="{{ route('kyc.index') }}">
                    <button type="button" class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded">Go
                        back</button>
                </a>
            </div>
        </div>
    </div>
@endsection
