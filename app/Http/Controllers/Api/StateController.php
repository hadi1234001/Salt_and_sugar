<?php

namespace App\Http\Controllers\Api;

use App\Models\State;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StateController extends Controller
{
    public function index()
    {
        return response()->json(State::all());
    }

    public function store(Request $request)
    {
        $state = State::create($request->all());
        return response()->json($state, 201);
    }

    public function show(State $state)
    {
        return response()->json($state);
    }

    public function update(Request $request, State $state)
    {
        $state->update($request->all());
        return response()->json($state);
    }

    public function destroy(State $state)
    {
        $state->delete();
        return response()->json(null, 204);
    }
}
