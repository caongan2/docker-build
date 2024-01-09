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

    public function store(Request $request) {
        $data = $request->only('name', 'email', 'password');
        $data['password'] = bcrypt($data['password']);

        $user = User::create($data);

        if($user) {
            return response()->json(['message' => 'Add contact successfully']);
        } else {
            return response()->json(['message' => 'Add contact failed']);
        }
    }
}
