<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BusinessInformation;
use Illuminate\Support\Facades\Gate;

class BusinessInformationController extends Controller
{
    // Langsung tampilkan form edit
    public function edit()
    {
        Gate::authorize('access-business-information');
        $info = BusinessInformation::first();

        if (!$info) {
            $info = new BusinessInformation(); // untuk form kosong
        }

        return view('admin.business.edit', compact('info'));
    }

    // Simpan perubahan
    public function update(Request $request)
    {
        Gate::authorize('access-business-information');
        
        $request->validate([
            'phone' => 'required|string|max:20',
            'email' => 'required|email',
            'location' => 'required|string',
            'longitude' => 'required|numeric',
            'latitude' => 'required|numeric',
        ]);

        $info = BusinessInformation::first();

        if (!$info) {
            $info = new BusinessInformation();
        }

        $info->phone = $request->phone;
        $info->email = $request->email;
        $info->location = $request->location;
        $info->longitude = $request->longitude;
        $info->latitude = $request->latitude;
        $info->save();

        return redirect()->route('admin.business.edit')->with('success', 'Informasi bisnis berhasil disimpan.');
    }
}
