<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;

use App\Models\Contact;

use App\Http\Resources\ContactResource;

class ContactController extends Controller
{
    public function index()
    {
        return view('contacts.index', ['contacts' => ContactResource::collection(Contact::all())]);
    }

    public function create()
    {
        return view('contacts.form', ['type' => 'create']);
    }

    public function store(ContactRequest $request)
    {
        Contact::create($request->validated());

        return redirect('contacts');
    }

    public function show(Contact $contact)
    {
        return view('contacts.form', ['type' => 'show', 'contact' => new ContactResource($contact)]);
    }

    public function edit(Contact $contact)
    {
        return view('contacts.form', ['type' => 'edit', 'contact' => new ContactResource($contact)]);
    }

    public function update(ContactRequest $request, Contact $contact)
    {
        $contact->update($request->validated());

        return redirect('contacts');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect('contacts');
    }
}
