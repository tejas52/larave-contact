<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Validator;

class ContactImportController extends Controller
{
    public function showImportForm()
    {
        return view('contacts.import'); // Create a Blade file named import.blade.php
    }

    public function import(Request $request)
    {
        // Validate file
        $request->validate([
            'xml_file' => 'required|file|mimes:xml',
        ]);

        // Load XML file
        $xmlFile = $request->file('xml_file');
        $xmlContent = simplexml_load_file($xmlFile->getRealPath());

        if (!$xmlContent) {
            return back()->with('error', 'Invalid XML file.');
        }

        // Loop through XML and insert into database
        foreach ($xmlContent->contact as $contact) {
            // Validate XML structure
            $validator = Validator::make((array) $contact, [
                'name' => 'required|string|max:255',
                'lastname' => 'nullable|string|max:255',
                'phone' => 'required|string|max:15|unique:contacts,phone',
            ]);

            if ($validator->fails()) {
                continue; // Skip invalid records
            }

            // Insert into database
            Contact::create([
                'name' => (string) $contact->name,
                'lastname' => (string) $contact->lastname ?? null,
                'phone' => (string) $contact->phone,
            ]);
        }

        return back()->with('success', 'Contacts imported successfully.');
    }
}
