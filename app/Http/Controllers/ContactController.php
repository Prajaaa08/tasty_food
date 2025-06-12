<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::orderBy('created_at', 'desc')->get();
        return view('contacts.index')->with([
            'contacts' => $contacts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('contacts.form')->with([
            'contact' => null,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
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

        return redirect()->route('contacts.index')->with(['success' => 'Pesan Berhasil Dikirim']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $contact = Contact::findOrFail($id);
        return view('contacts.index')->with([
            'contact' => $contact,
        ]);   
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // $contact = Contact::findOrFail($id);
        // return view('contacts.form')->with([
        //     'contact' => $contact,
        // ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $contact = Contact::findOrFail($id);

        // $validated = $request->validate([
        //     'subject' => 'required|max:255',
        //     'name' => 'required|max:255',
        //     'email' => 'required|email|max:255',
        //     'message' => 'required',
        // ], [
        //     'subject.required' => 'Subjek wajib diisi.',
        //     'name.required' => 'Nama wajib diisi.',
        //     'email.required' => 'Email wajib diisi.',
        //     'email.email' => 'Format email tidak valid.',
        //     'message.required' => 'Pesan wajib diisi.',
        // ]);

        // $contact->subject = $validated['subject'];
        // $contact->name = $validated['name'];
        // $contact->email = $validated['email'];
        // $contact->message = $validated['message'];
        // $contact->save();
        // if (!$contact) {
        //     return back()->with(['error' => 'Gagal Memperbarui Pesan']);
        // }
        // return redirect()->route('contacts.index')->with(['success' => 'Pesan Berhasil Diperbarui']);


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        if (!$contact) {
            return back()->with(['error' => 'Gagal Menghapus Pesan']);
        }

        return redirect()->route('contacts.index')->with(['success' => 'Pesan Berhasil Dihapus']);
    }
}
