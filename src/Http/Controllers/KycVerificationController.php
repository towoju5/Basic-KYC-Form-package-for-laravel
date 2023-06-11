<?php

namespace Towoju5\KycForm\Http\Controllers;

use Towoju5\KycForm\Models\KycVerification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KycVerificationController
{

    public function index()
    {
        $pendingVerifications = KycVerification::whereNull('approved_at')->get();
        return view('kyc-form::kyc.index', compact('pendingVerifications'));
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
        return view('kyc-form::kyc.create');
    }

    public function show($kycId)
    {
        $kycVerification = KycVerification::findOrFail($kycId);
        return view('kyc-form::kyc.show', compact('kycVerification'));
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

        if($request->hasFile('id_document')){
            $data['id_document'] = KycVerification::save_image('kyc', $request->id_document);
        }

        if($request->hasFile('proof_of_address')){
            $data['proof_of_address'] = KycVerification::save_image('kyc', $request->proof_of_address);
        }

        if($request->hasFile('additional_document')){
            $data['additional_document'] = KycVerification::save_image('kyc', $request->additional_document);
        }

        KycVerification::create($data);
        if(null != (config('kyc-form.success_page'))){
            return view(config('kyc-form.success'));
        }
        if(null != (config('kyc-form.success_url'))){
            return redirect(config('kyc-form.success_url'));
        }
        return view('kyc-form::kyc_success');
    }
}
