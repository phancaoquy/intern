<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getAmbassor(): JsonResponse
    {
        $users = User::whereHas('roles', function ($query) {
            $query->where('title', 'ambassador');
        })->get();
        return response()->json($users);
    }
}
