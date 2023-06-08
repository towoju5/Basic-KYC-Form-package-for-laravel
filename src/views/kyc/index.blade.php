<!-- resources/views/kyc/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="text-2xl font-bold mb-4">Pending KYC Verifications</h2>
        @if (session('success'))
            <div class="bg-green-200 text-green-800 py-2 px-4 mb-4">{{ session('success') }}</div>
        @endif
        @if ($pendingVerifications->isEmpty())
            <p>No pending KYC verifications.</p>
        @else
            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Email</th>
                        <th class="px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pendingVerifications as $verification)
                        <tr>
                            <td class="px-4 py-2">{{ $verification->full_name }}</td>
                            <td class="px-4 py-2">{{ $verification->email }}</td>
                            <td class="px-4 py-2">
                                <form action="{{ route('kyc.approve', $verification->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded">Approve</button>
                                </form>
                                <form action="{{ route('kyc.reject', $verification->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded">Reject</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
