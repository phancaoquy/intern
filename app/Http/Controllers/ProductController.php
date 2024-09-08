<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getNewArrival(): JsonResponse
    {
        $users = Product::orderBy('created_at', 'desc')->get();

        return response()->json($users);
    }

    public function getTopSeller(): JsonResponse
    {
        $users = Product::orderBy('sold_quantity', 'desc')->get();

        return response()->json($users);
    }
}
