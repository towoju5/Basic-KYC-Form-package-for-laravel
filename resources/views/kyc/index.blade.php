<!-- resources/views/kyc/index.blade.php -->

@extends(config('kyc-form.layout'))

@section('content')
    <script src="https://cdn.tailwindcss.com"></script>

        <h2 class="text-2xl font-bold mb-4 p-3">Pending KYC Verifications</h2>
        @if (session('success'))
            <div class="bg-green-200 text-green-800 py-2 px-4 mb-4">{{ session('success') }}</div>
        @endif
        @if ($pendingVerifications->isEmpty())
            <p>No pending KYC verifications.</p>
        @else
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Customer Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3">
                                ID Number
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Date of Birth
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Address
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pendingVerifications as $verification)
                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $verification->full_name }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $verification->email }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $verification->id_number }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $verification->date_of_birth }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ Str::limit($verification->address, 30) }}
                                </td>
                                <td class="px-6 py-4 flex flex-row space-x-2">
                                    <a href="{{ route('kyc.show', $verification->id) }}">
                                        <button type="button" class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded">Show full details</button>
                                    </a>
                                    <form action="{{ route('kyc.approve', $verification->id) }}" method="POST">
                                        @csrf
                                        <button type="submit"
                                            class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded">Approve</button>
                                    </form>
                                    <form action="{{ route('kyc.reject', $verification->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded">Reject</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
        
@endsection
