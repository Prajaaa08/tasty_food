<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\BusinessInformation;

class ContactClientController extends Controller
{
    public function index()
    {
        $info = BusinessInformation::first();

        return view('clients.contact.index' , compact('info')); ;
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'subject' => 'required|max:255',
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required',
        ], [
            'subject.required' => 'Subjek wajib diisi.',
            'name.required' => 'Nama wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'message.required' => 'Pesan wajib diisi.',
        ]);

        $contact = Contact::create(
            [
                'subject' => $validated['subject'],
                'name' => $validated['name'],
                'email' => $validated['email'],
                'message' => $validated['message'],
            ]
        );

        if (!$contact) {
            return back()->with(['error' => 'Gagal Mengirim Pesan']);
        }

        return redirect()->route('contact.index')->with(['success' => 'Pesan Berhasil Dikirim']);
    }
}
