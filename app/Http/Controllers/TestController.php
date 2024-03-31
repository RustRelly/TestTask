<?php

namespace App\Http\Controllers;

use App\FirstTask\Hawking;
use http\Exception;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        try {
            $hawking = new Hawking();
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
        return response()->json($hawking->production());
    }
}
