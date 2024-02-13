<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('contacts.index', [
            'contacts' => Contact::query()->paginate(6),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContactRequest $request)
    {
        try {
            Contact::create([
                'name' => $request->input('contact.name'),
                'email' => $request->input('contact.email'),
                'contact' => $request->input('contact.contact'),
            ]);

            return redirect()->route('home')->with('message', 'Contact created successfully!');
        } catch (\Throwable $th) {
            return redirect()->route('home')->with('message', 'Contact could not be created. Please contact dev to understand more');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        return view('contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        return view('contacts.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ContactRequest $request, Contact $contact)
    {
        try {
            $contact->update([
                'name' => $request->input('contact.name'),
                'email' => $request->input('contact.email'),
                'contact' => $request->input('contact.contact'),
            ]);

            return redirect()->route('home')->with('message', 'Contact updated successfully!');
        } catch (\Throwable $th) {
            return redirect()->route('home')->with('message', 'Contact could not be updated. Please contact dev to understand more');
        }
    }

    public function confirmDelete(Contact $contact) {
        return view('contacts.confirm', compact('contact'));

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        try {
            // Soft delete the contact
        $contact->delete();

        // Redirect back or to the contact list with a success message
        return redirect()->route('home')->with('message', 'Contact deleted successfully!');
    } catch (\Throwable $th) {
        return redirect()->route('home')->with('message', 'Contact could not be deleted. Please contact dev to understand more');
        }

    }
}
