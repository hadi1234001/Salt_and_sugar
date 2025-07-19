<?php

namespace App\Http\Controllers\Api;

use App\Models\SubType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubTypeController extends Controller
{
    public function index()
    {
        return response()->json(SubType::with('type')->get());
    }

    public function store(Request $request)
    {
        $subType = SubType::create($request->all());
        return response()->json($subType, 201);
    }

    public function show(SubType $subType)
    {
        return response()->json($subType->load('type'));
    }

    public function update(Request $request, SubType $subType)
    {
        $subType->update($request->all());
        return response()->json($subType);
    }

    public function destroy(SubType $subType)
    {
        $subType->delete();
        return response()->json(null, 204);
    }
}
