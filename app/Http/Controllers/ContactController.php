<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Support\Facades\Gate;

class ContactController extends Controller
{
    public function index()
    {
        Gate::authorize('access-contact');
        
        $contacts = Contact::latest()->get();
        return view('admin.contacts.index', compact('contacts'));
    }

    public function show($id)
    {
        Gate::authorize('access-contact');
        $contact = Contact::findOrFail($id);
        return view('admin.contacts.show', compact('contact'));
    }

    // public function destroy($id)
    // {
    //     $contact = Contact::findOrFail($id);
    //     $contact->delete();

    //     return redirect()->route('admin.admin.contacts.index')->with('success', 'Pesan berhasil dihapus.');
    // }
}