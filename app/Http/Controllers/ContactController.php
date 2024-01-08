<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ContactResource;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index(Request $request) {
        $perPage    = $request->per_page ?? 5;
        $name    = $request->name;
        $contacts = Contact::query()
            ->name($name)
            ->paginate($perPage);
        return ContactResource::collection($contacts);
    }

    public function delete($id) {
        $contact = Contact::find($id);
        $contactCount = Contact::count();
        if ($contact) {
            $contact->delete();
            return response()->json(['message' => 'Deleted user successfully', 'count' => $contactCount]);
        }
        return response()->json(['error' => 'User not found'], 404);
    }
    
    public function storeContact(Request $request) {
        $contact = Contact::create($request->all());

        if($contact) {
            return response()->json(['message' => 'Add contact successfully']);
        }
        return response()->json(['message' => 'Add contact failed']);
    }

    public function show($id) {
        $contact = Contact::find($id);

        if($contact) {
            return response()->json(['status' => 'success', 'data' => new ContactResource($contact)]);
        }
        
        return response()->json(['message' => "Contact doesn't exist"]);
    }
}
