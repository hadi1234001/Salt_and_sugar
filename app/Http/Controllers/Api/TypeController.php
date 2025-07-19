<?php

namespace App\Http\Controllers\Api;

use App\Models\Type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TypeController extends Controller
{
    public function index()
    {
        return response()->json(Type::all());
    }

    public function store(Request $request)
    {
        $type = Type::create($request->all());
        return response()->json($type, 201);
    }

    public function show(Type $type)
    {
        return response()->json($type);
    }

    public function update(Request $request, Type $type)
    {
        $type->update($request->all());
        return response()->json($type);
    }

    public function destroy(Type $type)
    {
        $type->delete();
        return response()->json(null, 204);
    }
}
