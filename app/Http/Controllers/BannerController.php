<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function getHomeBanner(): JsonResponse
    {
        $banners = Banner::where('page_id', 1)->get();

        return response()->json($banners);
    }
}
