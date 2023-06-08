<?php

namespace Towoju5\KycForm\Controllers;

use App\KycVerification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KycVerificationController extends Controller
{

    public function index()
    {
        $pendingVerifications = KycVerification::whereNull('approved_at')->get();
        return view('kyc.index', compact('pendingVerifications'));
    }

    public function approve(Request $request, $id)
    {
        $verification = KycVerification::findOrFail($id);
        $verification->approved_at = now();
        $verification->save();

        return redirect()->route('kyc.index')->with('success', 'KYC verification approved successfully.');
    }

    public function reject(Request $request, $id)
    {
        $verification = KycVerification::findOrFail($id);
        $verification->delete();

        return redirect()->route('kyc.index')->with('success', 'KYC verification rejected successfully.');
    }

    public function create()
    {
        return view('kyc.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'full_name' => 'required',
            'address' => 'required',
            'email' => 'required|email',
            'id_number' => 'required',
            'date_of_birth' => 'required',
            'id_document' => 'required',
            'proof_of_address' => 'required',
            'additional_document' => 'required',
        ]);

        KycVerification::create($data);

        return redirect()->back()->with('success', 'KYC verification submitted successfully.');
    }
}
