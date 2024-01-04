<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    public function index() {
        $users = User::select('id', 'username', 'mail_address', 'first_name', 'family_name')->take(10)->get();
        return response()->json(UserResource::collection($users));
    }
}
