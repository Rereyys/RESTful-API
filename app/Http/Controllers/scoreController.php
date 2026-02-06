<?php

namespace App\Http\Controllers;

use App\Models\score;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class scoreController extends Controller
{
    public function index()
    {
        $data = score::all();
        return view('view-score', compact('data'));
        // return $data;
        // return scoreResource::collection($data);
        // return $data->toJson();
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }
}
