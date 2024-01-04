<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\Contact;

class UserController extends Controller
{
    public function index() {
        $users = User::select('id', 'username', 'mail_address', 'first_name', 'family_name')->take(5)->get();
        return response()->json(UserResource::collection($users));
    }

    public function delete($id) {
        $user = User::find($id);
        $userCount = User::count();
        if ($user) {
            $user->delete();
            return response()->json(['message' => 'User deleted successfully', 'count' => $userCount]);
        } else {
            return response()->json(['error' => 'User not found'], 404);
        }
    }
    
    public function storeContact(Request $request) {
        $contact = Contact::create($request->all());

        if($contact) {
            return response()->json(['message' => 'Add contact successfully']);
        } else {
            return response()->json(['message' => 'Add contact falled']);
        }
        
    }
}
